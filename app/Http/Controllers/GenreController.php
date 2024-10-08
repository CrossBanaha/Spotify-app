<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index() //GET
    {}
    public function create() //GET
    {
        return view('genre.insert');
    }
    public function store(Request $request) //POST
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:30'
        ]);
        Genre::create($validatedData);
        session()->flash('modal_message', 'Genre created successfully!');
        return redirect()->route('spotifys.index')->with('success', 'Genre created successfully!');
    }
    public function show(Genre $genre) //GET
    {
        return view('genre.show', compact('genre'));
    }
    public function edit(Genre $genre) //GET
    {
        return view('genre.insert', compact('genre'));
    }
    public function update(Request $request, Genre $genre) //PUT, PATCH
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:30'
        ]);
        $genre->update($validatedData);
        session()->flash('modal_message', 'Genre updated successfully!');
        return redirect()->route('spotifys.index')->with('success', 'Genre updated successfully!');
    }
    public function destroy(Genre $genre) //DELETE
    {
        $genre->delete();
        session()->flash('modal_message', 'Genre delete successfully!');
        return redirect()->route('spotifys.index')->with('success', 'Genre deleted successfully!');
    }
}