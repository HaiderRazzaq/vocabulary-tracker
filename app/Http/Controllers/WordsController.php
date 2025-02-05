<?php

namespace App\Http\Controllers;

use App\Models\Words;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Words::with('examples')->get();
        return view('english.home',compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Words $words)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Words $words)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Words $words)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Words $words)
    {
        //
    }
}
