<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScholarController extends Controller
{
    /**
     * Display the Scholar page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('scholar');
    }
}
