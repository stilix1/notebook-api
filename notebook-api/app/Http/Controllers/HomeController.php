<?php

namespace App\Http\Controllers;

use App\Models\NotebookEntry;

class HomeController extends Controller
{
    public function index()
    {
        $perPage = 3; // Количество элементов на странице
        $entries = NotebookEntry::paginate($perPage);
        return view('welcome', ['entries' => $entries]);
    }
}

