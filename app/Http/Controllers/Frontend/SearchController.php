<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Category::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($query) . '%'])->get();
        $categories = Category::all(); // Fetch all categories to be displayed if no search is performed

        return view('categories.index', compact('results', 'categories'));
    }
}
