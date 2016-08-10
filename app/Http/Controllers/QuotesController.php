<?php

namespace App\Http\Controllers;

use App\quoted;
use App\quotes;

class QuotesController extends Controller
{
    public function __construct(){}
    public function showquotes()
    {
        $quoted = Quoted::all();
        $quotes = Quotes::all();
        return view('quote',['quoted' => $quoted, 'quotes' => $quotes]);
    }
}