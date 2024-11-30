<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
   
    public function index()
    {
        $journals = Journal::all(); 
        return view('journals.index', compact('journals')); 
    }
    public function indexJson()
    {
        $journal = Journal::all(); 
        return response()->json($journal); 
    }
   
  
}

