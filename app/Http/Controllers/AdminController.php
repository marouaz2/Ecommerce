<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Commande;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProduitsImport;
use App\Exports\ProduitsExport;


class AdminController extends Controller
{
    public function index()
    {
        
        $produits = Produit::all();
        $categories = Categorie::all();


        return view('admin.index', compact('produits', 'categories'));
    }
    public function indexProduits()
    {
        $produits = Produit::all();
        return view('admin.produits.index', compact('produits'));
    }


public function createProduit()
{
    $categories = Categorie::all();
    return view('admin.produits.create', compact('categories'));
}


    public function storeProduit(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produit = new Produit;
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->categorie_id = $request->categorie;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $produit->image = $filename;
        }
        $produit->save();
        $produits = Produit::all();
        
        return view('admin.index',compact('produits'));
    }

    public function editProduit($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Categorie::all();
        return view('admin.produits.edit', compact('produit', 'categories'));
    }

    public function updateProduit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produit = Produit::findOrFail($id);
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->categorie_id = $request->categorie;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $produit->image = $filename;
        }
        $produit->save();
        $produits = Produit::all();

        return view('admin.index' , compact('produits'));
    }

    public function deleteProduit($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
        $produits = Produit::all();
        return view('admin.index')->with('success', 'Produit supprimé avec succès!')->with('produits', $produits);
    }

    public function indexCategorie()
    {
        $categories = Categorie::all();
        return view('admin.index', compact('categories'));
    }

    public function createCategorie()
    {
        return view('admin.categories.create');
    }

    public function storeCategorie(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        $categorie = new Categorie;
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        $categorie->save();

        return redirect()->route('admin.index')->with('success', 'Catégorie ajoutée avec succès!');
    }

    public function editCategorie($id)
    {
        $categorie = Categorie::findOrFail($id);
        return view('admin.categories.edit', compact('categorie'));
    }

    public function updateCategorie(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'description' => 'required',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        $categorie->save();

        return redirect()->route('admin.index')->with('success', 'Catégorie modifiée avec succès!');
    }

    public function deleteCategorie($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('admin.index')->with('success', 'Catégorie supprimée avec succès!');
    }
    public function importProduits(Request $request)
{
    $validatedData = $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);

    $file = $request->file('file');
    Excel::import(new ProduitsImport, $file);

    return redirect()->route('admin.index')->with('success', 'Les produits ont été importés avec succès!');
}

public function exportProduits()
{
    return Excel::download(new ProduitsExport, 'produits.xlsx');
}
public function indexClients()
{
    // Retrieve all users who are not admins
    $clients = User::where('role', '!=', 'admin')->get();

    // Pass the clients to the view
    return view('admin.clients.index', compact('clients'));
}
public function historiqueCommandesClient($id)
{
    // Récupérer l'utilisateur avec l'ID spécifié
    $user = User::findOrFail($id);

    // Récupérer toutes les commandes de l'utilisateur
    $commandes = Commande::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    // Afficher la vue avec les commandes
    return view('admin.clients.historique', compact('user', 'commandes'));
}


}


