<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\students;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        // Fetch all users to populate the dropdown in the form
        $users = User::all();

        // Return the view and pass the users to the form
        return view('students.create', compact('users'));
    }
    
    //
    public function store(Request $request)
    {
        // Assuming the request has a user_id to link to
        $user = User::find($request->input('user_id'));

        // Validate request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            // other student fields...
        ]);

        // Create a new student and link to the user
        $student = new students();
        $student->user_id = $user->id;
        $student->name = $validatedData['name'];
        // Set other student fields...
        $student->save();

        return redirect()->back()->with('success', 'Student created successfully!');
    }
}
