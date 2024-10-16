<?php
namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;
class AuthorController extends Controller
{
    public function index() //GET
    {}
    public function create() //GET
    {}
    public function store(Request $request) //POST
    {
        $validatedData = $request->validate([
            'nickname' => 'required|string|min:2|max:30',
            'url' => 'required|string|min:10|max:255'
        ]);
        Author::create($validatedData);
        return redirect()->route('spotifys.index')->with('success', 'Author created successfully!');
    }
    public function show(Author $author) //GET
    {
        $author = $author->load('songs');
        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }
        return response()->json([
            'nickname' => $author->nickname,
            'songs' => $author->songs
        ]);
    }
    public function edit(Author $author) //GET
    {}
    public function update(Request $request, Author $author) //PUT, PATCH
    {
        $validatedData = $request->validate([
            'nickname' => 'required|string|max:30',
            'url' => 'required|string|max:255'
        ]);
        $author->update($validatedData);
        return redirect()->route('spotifys.index')->with('success', 'Author updated successfully!');
    }
    public function destroy(Author $author) //DELETE
    {
        $author->delete();
        return redirect()->route('spotifys.index')->with('success', 'Author deleted successfully!');
    }
}