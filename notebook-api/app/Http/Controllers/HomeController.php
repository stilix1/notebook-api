<?php

namespace App\Http\Controllers;

use App\Models\NotebookEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $entries = NotebookEntry::all();
        return view('welcome', ['entries' => $entries]);
    }
}

