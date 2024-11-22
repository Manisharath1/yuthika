<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
class FacultyController extends Controller
{
    public function index()
    {
        $faculties = faculty::whereHas('user', function ($query) {
            $query->where('role', 3);
        })->get();
        return view('faculty.index', compact('faculties'));
    }

    public function create(Request $request)
    {
        try {
            // Log the incoming request data
            Log::info('Faculty creation request:', $request->all());

            // First validate all the data
            $validated = $request->validate([
                'fac_name' => 'nullable|string|max:100',
                'email' => 'required|email|max:255|unique:users,email',
                'designation' => 'nullable|string|max:255',
                'empid' => 'nullable|string|max:20',
                'EPF_PPRN_No' => 'nullable|string|max:50',
                'ltc_availed' => 'nullable|string',
                'pay_level' => 'nullable|string|max:100',
                'basic_pay' => 'nullable|string|max:20',
                'position_held' => 'nullable|string|max:255',
                'photo' => 'nullable|string|max:255',
                'service_book' => 'nullable|string|max:255',
            ]);

            // Start database transaction
            DB::beginTransaction();

            try {
                // First create the user
                $user = User::create([
                    'name' => $validated['fac_name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($request->dob),
                    'role' => 3
                ]);

                // Log user creation
                Log::info('User created successfully:', ['id' => $user->id]);

                // Handle file uploads if present
                if ($request->hasFile('photo')) {
                    $photoPath = $request->file('photo')->store('faculty-photos', 'public');
                    $validated['photo'] = $photoPath;
                }

                if ($request->hasFile('service_book')) {
                    $documentPath = $request->file('document')->store('faculty-service_book', 'public');
                    $validated['service_book'] = $documentPath;
                }

                // Create the scholar record with user_id
                $faculties = new faculty();
                $faculties->fill($validated);
                $faculties->user_id = $user->id;  // Explicitly set the user_id
                $faculties->save();

                // Log scholar creation
                Log::info('Faculty created successfully:', ['id' => $faculties->id]);

                // Commit the transaction
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Faculty created successfully',
                    'data' => $faculties
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
            Log::error('Faculty creation error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the faculty',
                'error' => $e->getMessage()
            ], 500);
        }
    }



}
// 'fac_name' => 'nullable|string|max:100',
//     'photo' => 'nullable|string|max:255',
//     'service_book' => 'nullable|string|max:255',
//     'empid' => 'nullable|string|max:20',
//     'EPF_PPRN_No' => 'nullable|string|max:50',
//     'ltc_availed' => 'nullable|string',
//     'pay_level' => 'nullable|string|max:100',
//     'basic_pay' => 'nullable|string|max:20',
//     'position_held' => 'nullable|string|max:255',
// ]);
