<?php

namespace App\Http\Controllers;

use App\Models\project_details;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = project_details::with(['principalInvestigator', 'coInvestigator'])->get()
            ->map(function ($project) {
                $project->pi_name = $project->principalInvestigator->name ?? 'N/A';
                $project->pi2_name = $project->coInvestigator->name ?? 'N/A';
                return $project;
            });

        $users = User::where('role', 3)->get(); // Get all PIs
        Log::info('Users count: ' . $users->count());

        return view('project.index', compact('projects', 'users'));
    }

    public function show($id)
    {
        $projects = project_details::with(['principalInvestigator', 'coInvestigator'])
            ->findOrFail($id);

        // Map the names just like in the index method
        $projects->pi_name = $projects->principalInvestigator->name ?? 'N/A';
        $projects->pi2_name = $projects->coInvestigator->name ?? 'N/A';


        return response()->json($projects);
    }

    public function edit($id)
    {
        $project = project_details::find($id);
        if (!$project) {
            Log::error("Project not found: ID $id");
        }
        return view('project.edit', compact('project'));
    }


    public function update(Request $request, $id)
    {
        try {
            Log::info('Update request received', ['id' => $id, 'data' => $request->all()]);

            // Use the correct primary key field
            $project = project_details::where('pid', $id)->firstOrFail();

            $validated = $request->validate([
                'name' => 'nullable|string|max:255',
                'project_file_no' => 'nullable|string|max:255',
                'sanction_no_date' => 'nullable|string|max:255',
                'funding_agency' => 'nullable|string|max:255',
                'end_date' => 'nullable|date',
                'extension_if_any' => 'nullable|string|max:255',
                'sanctioned_outlay' => 'nullable|numeric',
                'project_cost' => 'nullable|numeric',
                'balance' => 'nullable|numeric',
                'active' => 'nullable|boolean',
            ]);

            // Remove null values
            $validated = array_filter($validated, function($value) {
                return !is_null($value);
            });

            Log::info('Validated data:', ['validated' => $validated]);

            $project->update($validated);

            Log::info('Project updated successfully:', ['project' => $project]);

            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully',
                'data' => $project
            ]);

        } catch (ValidationException $e) {
            Log::error('Validation error:', ['errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating project:', [
                'id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error updating project: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            Log::info('Store request received', ['data' => $request->all()]);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'pi_id' => 'required|exists:users,id',
                'pi2_id' => 'nullable|exists:users,id',
                'project_file_no' => 'required|string|max:255',
                'sanction_no_date' => 'required|string|max:255',
                'funding_agency' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'sanctioned_outlay' => 'required|numeric|min:0',
                'project_cost' => 'required|numeric|min:0'
            ]);

            // Generate new PID
            $lastProject = project_details::orderBy('pid', 'desc')->first();
            $newPid = $lastProject ? $lastProject->pid + 1 : 1;

            // Create new project with all fields
            $project = new project_details();
            $project->pid = $newPid;
            $project->name = $validated['name'];
            $project->pi_id = $validated['pi_id'];
            $project->pi2_id = $validated['pi2_id'];
            $project->project_file_no = $validated['project_file_no'];
            $project->sanction_no_date = $validated['sanction_no_date'];
            $project->funding_agency = $validated['funding_agency'];
            $project->start_date = $validated['start_date'];
            $project->end_date = $validated['end_date'];
            $project->sanctioned_outlay = $validated['sanctioned_outlay'];
            $project->project_cost = $validated['project_cost'];
            $project->active = 1;
            $project->balance = $validated['sanctioned_outlay'];

            $project->save();

            Log::info('Project created successfully:', ['project' => $project]);

            return response()->json([
                'success' => true,
                'message' => 'Project created successfully',
                'data' => $project
            ]);

        } catch (ValidationException $e) {
            Log::error('Validation error:', ['errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating project:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error creating project: ' . $e->getMessage()
            ], 500);
        }
    }
}
