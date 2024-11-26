<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\User;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Str;

class ScholarController extends Controller
{
    /**
     * Display the Scholar page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $scholars = students::with(['pi', 'coPi'])->get();
        return view('scholar.index', compact('scholars'));


    }




    public function create(Request $request)
    {
        try {
            // Log the incoming request data
            Log::info('Scholar creation request:', $request->all());

            // First validate all the data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|in:p,o,s',
                'category' => 'nullable|string|max:255',
                'designation' => 'nullable|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'phone' => 'nullable|string|max:20',
                'sex' => 'required|string|in:Male,Female,Other',
                'dob' => 'required|date_format:Y-m-d',
                'caste' => 'nullable|string|max:255',
                'perm_address' => 'nullable|string',
                'res_address' => 'nullable|string',
                'hostel_joined_on' => 'nullable|date',
                'hostel_vaccated_on' => 'nullable|date',
                'caution_money' => 'nullable|numeric',
                'funding_agency' => 'nullable|string|max:255',
                'ILS_ID_no' => 'nullable|string|max:255',
                'emergency_contact_no' => 'nullable|string|max:20',
                'student_file_no' => 'nullable|string|max:255',
                'joining_date' => 'nullable|date',
                'tenure_upto' => 'nullable|date',
                'SRF_wef' => 'nullable|date',
                'document_link' => 'nullable|url',
                'no_of_publication' => 'nullable|integer|min:0',
                'no_of_conf_attended' => 'nullable|integer|min:0',
                'per_email' => 'nullable|email|max:255',
                'fellowship' => 'nullable|string|max:255',
                'pi_id' => 'nullable|integer', // Changed to integer
                'co_pi_id' => 'nullable|integer',
                'registration_no' => 'nullable|string|max:255',
                'registration_date' => 'nullable|date',
                'topic' => 'nullable|string',
                'extension_date' => 'nullable|date',
                'submission_date' => 'nullable|date',
                'award_date' => 'nullable|date',
                'thesis_availability' => 'nullable|string|max:255',
                'completion_date' => 'nullable|date',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'correspondence' => 'nullable|string',
                'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ]);

            // Start database transaction
            DB::beginTransaction();

            try {
                // First create the user
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($request->dob),
                    'role' => 4
                ]);

                // Log user creation
                Log::info('User created successfully:', ['id' => $user->id]);

                // Handle file uploads if present
                if ($request->hasFile('photo')) {
                    $photoPath = $request->file('photo')->store('scholar-photos', 'public');
                    $validated['photo'] = $photoPath;
                }

                if ($request->hasFile('document')) {
                    $documentPath = $request->file('document')->store('scholar-documents', 'public');
                    $validated['document'] = $documentPath;
                }

                // Create the scholar record with user_id
                $scholars = new students();
                $scholars->fill($validated);
                $scholars->user_id = $user->id;  // Explicitly set the user_id
                $scholars->save();

                // Log scholar creation
                Log::info('Scholar created successfully:', ['id' => $scholars->id]);

                // Commit the transaction
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Scholar created successfully',
                    'data' => $scholars
                ]);

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error:', ['errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Scholar creation error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the scholar',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getRoleTwoUsers()
    {
        $roleTwoUsers = User::where('role', 2)->select('id', 'name')->get();
        return response()->json($roleTwoUsers);
    }


    public function personal(Request $request)
    {
        try {
            $scholars = students::orderBy('name')->paginate(10);
            return view('scholar.personal', compact('scholars'));
        } catch (\Exception $e) {
            Log::error('Error fetching scholars: ' . $e->getMessage());
            return back()->with('error', 'Unable to fetch scholar data.');
        }
    }

    public function show($id)
{
    try {
        $scholars = students::find($id);

        if (!$scholars) {
            return response()->json(['success' => false, 'message' => 'Student not found'], 404);
        }

        return response()->json($scholars);
    } catch (\Exception $e) {
        Log::error('Error fetching student data: ' . $e->getMessage());

        return response()->json(['success' => false, 'message' => 'Error fetching data.'], 500);
    }
}


   // Method to update student data
   public function update(Request $request, $id)
{
    try {
        $scholars = students::find($id);

        if (!$scholars) {
            return response()->json(['success' => false, 'message' => 'Student not found'], 404);
        }



        for ($i = 1; $i <= 5; $i++) {
            $fdfrKey = "Fdfr{$i}";
            $fexpKey = "Fexp{$i}";
            $fseucKey = "Fseuc{$i}";
            $cdfrKey = "Cdfr{$i}";
            $cexpKey = "Cexp{$i}";
            $cseucKey = "Cseuc{$i}";
            $odfrKey = "Odfr{$i}";
            $oexpKey = "Oexp{$i}";
            $oseucKey = "Oseuc{$i}";

            $scholars->$fdfrKey = $request->input($fdfrKey);
            $scholars->$fexpKey = $request->input($fexpKey);
            $scholars->$fseucKey = $request->input($fseucKey);
            $scholars->$cdfrKey = $request->input($cdfrKey);
            $scholars->$cexpKey = $request->input($cexpKey);
            $scholars->$cseucKey = $request->input($cseucKey);
            $scholars->$odfrKey = $request->input($odfrKey);
            $scholars->$oexpKey = $request->input($oexpKey);
            $scholars->$oseucKey = $request->input($oseucKey);
        }

        $scholars->save();
        return response()->json(['success' => true, 'message' => 'Student updated successfully']);
    } catch (\Exception $e) {
        // Log the error message for debugging
        Log::error('Error updating student: ' . $e->getMessage());

        return response()->json(['success' => false, 'message' => 'Error: Unable to update data.'], 500);
    }
}


}
