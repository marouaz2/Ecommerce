<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    
    public function index()
    {
        $categories = Categorie::all();

        return view('categories.index', compact('categories'));
    }

    // public function create()
    // {
    //     return view('categories.create');
    // }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'nom' => 'required',
    //         'description' => 'required',
    //     ]);

    //     Categorie::create($data);

    //     return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    // }

    // public function edit(Categorie $categorie)
    // {
    //     return view('categories.edit', compact('categorie'));
    // }

    // public function update(Request $request, Categorie $categorie)
    // {
    //     $data = $request->validate([
    //         'nom' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $categorie->update($data);

    //     return redirect()->route('categories.index')->with('success', 'Catégorie modifiée avec succès.');
    // }

    // public function destroy(Categorie $categorie)
    // {
    //     $categorie->delete();

    //     return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    // }
}
