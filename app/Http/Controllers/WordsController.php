<?php
namespace App\Http\Controllers;

use App\Http\Requests\WordRequestStore;
use App\Models\Example;
use App\Models\Words;
use Doctrine\Inflector\Rules\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $words = Words::with('examples')->latest()->get();
        return view('english.home', compact('words'));
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
    public function store(WordRequestStore $request)
    {
        $word = Words::create([
            'word'    => $request->word,
            'meaning_arabic' => $request->arabic,
        ]);
        foreach ($request->example as $sentence) {
            Example::create([
                'sentence' => $sentence,
                'word_id' => $word->id,
            ]);
        }
        return redirect()->back()->with('success', 'word created successfully');

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
    public function destroy( $id)
    {
        $word=Words::findOrFail($id);
        $word->delete();
        return redirect()->back()->with('deleted', 'Word deleted successfully');
    }
}
