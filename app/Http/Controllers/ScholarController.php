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
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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

        } catch (ValidationException $e) {
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
        $roleTwoUsers = User::where('role', 3)->select('id', 'name')->get();
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
            $scholars = students::with('pi')->findOrFail($id);

            if (!$scholars) {
                return response()->json(['success' => false, 'message' => 'Student not found'], 404);
            }

            return response()->json($scholars);
        } catch (\Exception $e) {
            Log::error('Error fetching student data: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Error fetching data.'], 500);
        }
    }

    public function updatePersonal(Request $request, $id)
    {
        try {
            $scholars = students::findOrFail($id);

            // Validate the request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'pi_id' => 'required',

                // Set 1 Validation
                'Fdfr1' => 'nullable|numeric|between:0,100',
                'Fexp1' => 'nullable|numeric|between:0,100',
                'Fseuc1' => 'nullable|numeric|between:0,100',
                'Cdfr1' => 'nullable|numeric|between:0,100',
                'Cexp1' => 'nullable|numeric|between:0,100',
                'Cseuc1' => 'nullable|numeric|between:0,100',
                'Odfr1' => 'nullable|numeric|between:0,100',
                'Oexp1' => 'nullable|numeric|between:0,100',
                'Oseuc1' => 'nullable|numeric|between:0,100',

                // Set 2 Validation
                'Fdfr2' => 'nullable|numeric|between:0,100',
                'Fexp2' => 'nullable|numeric|between:0,100',
                'Fseuc2' => 'nullable|numeric|between:0,100',
                'Cdfr2' => 'nullable|numeric|between:0,100',
                'Cexp2' => 'nullable|numeric|between:0,100',
                'Cseuc2' => 'nullable|numeric|between:0,100',
                'Odfr2' => 'nullable|numeric|between:0,100',
                'Oexp2' => 'nullable|numeric|between:0,100',
                'Oseuc2' => 'nullable|numeric|between:0,100',

                // Set 3 Validation
                'Fdfr3' => 'nullable|numeric|between:0,100',
                'Fexp3' => 'nullable|numeric|between:0,100',
                'Fseuc3' => 'nullable|numeric|between:0,100',
                'Cdfr3' => 'nullable|numeric|between:0,100',
                'Cexp3' => 'nullable|numeric|between:0,100',
                'Cseuc3' => 'nullable|numeric|between:0,100',
                'Odfr3' => 'nullable|numeric|between:0,100',
                'Oexp3' => 'nullable|numeric|between:0,100',
                'Oseuc3' => 'nullable|numeric|between:0,100',

                // Set 4 Validation
                'Fdfr4' => 'nullable|numeric|between:0,100',
                'Fexp4' => 'nullable|numeric|between:0,100',
                'Fseuc4' => 'nullable|numeric|between:0,100',
                'Cdfr4' => 'nullable|numeric|between:0,100',
                'Cexp4' => 'nullable|numeric|between:0,100',
                'Cseuc4' => 'nullable|numeric|between:0,100',
                'Odfr4' => 'nullable|numeric|between:0,100',
                'Oexp4' => 'nullable|numeric|between:0,100',
                'Oseuc4' => 'nullable|numeric|between:0,100',

                // Set 5 Validation
                'Fdfr5' => 'nullable|numeric|between:0,100',
                'Fexp5' => 'nullable|numeric|between:0,100',
                'Fseuc5' => 'nullable|numeric|between:0,100',
                'Cdfr5' => 'nullable|numeric|between:0,100',
                'Cexp5' => 'nullable|numeric|between:0,100',
                'Cseuc5' => 'nullable|numeric|between:0,100',
                'Odfr5' => 'nullable|numeric|between:0,100',
                'Oexp5' => 'nullable|numeric|between:0,100',
                'Oseuc5' => 'nullable|numeric|between:0,100',
            ], [
                // Custom error messages
                'name.required' => 'Scholar name is required.',
                'name.max' => 'Scholar name cannot exceed 255 characters.',
                'pi_id.required' => 'Principal Investigator ID is required.',
                'pi_id.exists' => 'Selected Principal Investigator does not exist.',

                // Generic messages for all numeric fields
                '*.numeric' => 'The :attribute must be a number.',
                '*.between' => 'The :attribute must be between 0 and 100.',
                '*.required' => 'The :attribute field is required for Set 1.',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
            $scholars = students::with('faculty')->get();
            $scholars = students::findOrFail($id);

            // Remove _token and _method from request data
            $data = collect($request->all())
                ->except(['_token', '_method'])
                ->toArray();

            $scholars->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Scholar updated successfully',
                'data' => $scholars
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update scholar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $scholars = students::findOrFail($id);
        return response()->json($scholars);
    }

    public function update(Request $request, $id)
    {
        Log::info('Update Request Data:', $request->all());

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string',  // Removed in:p,o,s restriction
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    Rule::unique('students')->ignore($id, 'student_id')  // Ignore current record
                ],
                'sex' => 'required|string',  // Removed in:Male,Female,Other restriction
                'dob' => 'nullable|date',    // Made less restrictive
                // Optional fields
                'category' => 'nullable|string|max:255',
                'designation' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:20',
                'caste' => 'nullable|string|max:255',
                'perm_address' => 'nullable|string',
                'res_address' => 'nullable|string',
                'hostel_joined_on' => 'nullable|date',
                'hostel_vaccated_on' => 'nullable|date',
                'caution_money' => 'nullable|string',  // Changed from numeric
                'funding_agency' => 'nullable|string|max:255',
                'ILS_ID_no' => 'nullable|string|max:255',
                'emergency_contact_no' => 'nullable|string|max:20',
                'student_file_no' => 'nullable|string|max:255',
                'joining_date' => 'nullable|date',
                'tenure_upto' => 'nullable|date',
                'SRF_wef' => 'nullable|date',
                'document_link' => 'nullable|string',  // Changed from url
                'no_of_publication' => 'nullable|integer',
                'no_of_conf_attended' => 'nullable|integer',
                'per_email' => 'nullable|email|max:255',
                'fellowship' => 'nullable|string|max:255',
                // 'pi' => 'nullable|string',  // Changed from pi_id integer
                // 'coPi' => 'nullable|string',  // Changed from co_pi_id integer
                'pi_id' => 'nullable|exists:users,id',
                'co_pi_id' => 'nullable|exists:users,id',
                'registration_no' => 'nullable|string|max:255',
                'registration_date' => 'nullable|date',
                'topic' => 'nullable|string',
                'extension_date' => 'nullable|date',
                'submission_date' => 'nullable|date',
                'award_date' => 'nullable|date',
                'thesis_availability' => 'nullable|string|max:255',
                'completion_date' => 'nullable|date',
                'correspondence' => 'nullable|string',
            ]);

            if ($request->hasFile('photo')) {
                $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
            }

            if ($request->hasFile('document')) {
                $validatedData['document'] = $request->file('document')->store('documents', 'public');
            }

            $scholar = students::findOrFail($id);
            $scholar->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Student updated successfully.',
                'data' => $scholar
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Student update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error updating student.',
                'error' => $e->getMessage()
            ], 500);
        }
    }



}
