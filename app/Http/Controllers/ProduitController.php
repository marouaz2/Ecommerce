<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function getCategorie($id)
{
    $categorie = Categorie::findOrFail($id);
    $produits = Produit::where('categorie_id', $id)->get();
    return view('categories.show', compact('categorie', 'produits'));
}

    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }
    public function rechercher(Request $request)
{
    $nom = $request->input('nom');

    $produits = Produit::query();

    if (!empty($nom)) {
        $produits->where('nom', 'like', '%' . $nom . '%');
    }

    $produits = $produits->get();

    return view('produits.index', compact('produits'));
}    
    public function show($id)
    {
        $produit = Produit::findOrFail($id);
        return view('produits.show', compact('produit'));

    }
    

//     public function create()
//     {
//         $categories = Categorie::all();
//         return view('produits.create', compact('categories'));
//     }
    
//     public function store(Request $request)
// {
//     $validatedData = $request->validate([
//         'nom' => 'required',
//         'description' => 'required',
//         'prix' => 'required',
//         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ]);

//     $produit = new Produit;
//     $produit->nom = $request->nom;
//     $produit->description = $request->description;
//     $produit->prix = $request->prix;
//     $produit->categorie_id = $request->categorie;
//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
//         $filename = time() . '.' . $image->getClientOriginalExtension();
//         $image->move(public_path('images'), $filename);
//         $produit->image = $filename;
//     }
//     $produit->save();
    
//     return redirect('/produits');
// }

//     public function edit($id)
//     {
//         $produit = Produit::findOrFail($id);
//         $categories = Categorie::all();
//         return view('produits.edit', compact('produit', 'categories'));
//     }


//     public function update(Request $request, $id)
//     {
//         $produit = Produit::findOrFail($id);
//         $produit->update($request->all());
//         return redirect()->route('produits.show', $produit->id);
//     }



//     public function destroy($id)
//     {
//         $produits = Produit::findOrFail($id);
//         $produits->delete();
//         return redirect()->route('produits.index');
//     }
}
