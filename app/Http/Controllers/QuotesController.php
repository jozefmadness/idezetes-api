<?php

namespace App\Http\Controllers;

use App\quoted;
use App\quotes;
use Dingo\Api\Http\Request;

class QuotesController extends Controller
{
    public function __construct(){}
    public function showquotes()
    {
        $quoted = Quoted::all();
        $quotes = Quotes::all();
        return view('quote',['quoted' => $quoted, 'quotes' => $quotes]);
    }
    public function quotemanage()
    {
        $quoted = Quoted::all();
        $quotes = Quotes::all();
        return view('addquote',['quoted' => $quoted, 'quotes' => $quotes]);
    }
    public function addquoted(Request $request)
    {
        $data = new quoted();
        $data->name = $request->name;
        $data->save();
        $msg = "sikeresen hozzáadva";
        return redirect('addquote')->with(['msg' => $msg]);
    }
    public function addquotes(Request $request)
    {
        $data = new quotes();
        $data->quote = $request->quote;
        $data->quoted = $request->quoted;
        $data->category = $request->category;
        $data->source = $request->source;
        $data->save();
        $msg = "sikeresen hozzáadva";
        return redirect('addquote')->with(['msg' => $msg]);}
}