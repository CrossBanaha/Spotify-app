<?php
namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
class AuthorController extends Controller
{
    public function index() //GET
    {}
    public function create() //GET
    {
        return view('author.insert');
    }
    public function store(Request $request) //POST
    {
        $validatedData = $request->validate([
            'nickname' => 'required|string|max:30'
        ]);
        Author::create($validatedData);
        session()->flash('modal_message', 'Author created successfully!');
        return redirect()->route('spotifys.index')->with('success', 'Author created successfully!');
    }
    public function show(Author $author) //GET
    {
        $next_direction = 'authors.create';
        return view('author.show', compact('author', 'next_direction'));
    }
    public function edit(Author $author) //GET
    {
        return view('author.insert', compact('author'));
    }
    public function update(Request $request, Author $author) //PUT, PATCH
    {
        $validatedData = $request->validate([
            'nickname' => 'required|string|max:30'
        ]);
        $author->update($validatedData);
        session()->flash('modal_message', 'Author updated successfully!');
        return redirect()->route('spotifys.index')->with('success', 'Author updated successfully!');
    }
    public function destroy(Author $author) //DELETE
    {
        $author->delete();
        session()->flash('modal_message', 'Author deleted successfully!');
        return redirect()->route('spotifys.index')->with('success', 'Author deleted successfully!');
    }
}