<?php

namespace App\Http\Controllers;

use App\Models\project_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index(Request $request){
        try {
            $projects = project_details::orderBy('name')->paginate(10);
            return view('project.index', compact('projects'));
        } catch (\Exception $e) {
            Log::error('Error fetching projects: ' . $e->getMessage());
            return back()->with('error', 'Unable to fetch scholar data.');
        }
    }
}
