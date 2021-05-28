<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('Backend.index');
    }

    public function file()
    {
    	return view('Backend.file');
    }
}
