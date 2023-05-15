<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Models\Produit;

class PanierController extends Controller
{
    public function index()
    {
        $items = \Cart::getContent();
        $total = \Cart::getTotal();

        return view('panier.index', compact('items', 'total'));
    }

    public function ajouter(Request $request, $id)
    {

        $this->validate($request, [
            'quantite' => 'required|integer|min:1'
        ]);
        
        $produit = Produit::findOrFail($id);

        \Cart::add(array(
            'id' => $produit->id,
            'name' => $produit->nom,
            'price' => $produit->prix,
            'quantity' => $request->quantite,
            'attributes' => array(
                'image' => $produit->image,
                'description' => $produit->description
            )
        ));

        return redirect()->route('panier.index')->with('success_message', 'Produit ajouté au panier.');
    }

    public function supprimer($id)
    {
        \Cart::remove($id);

        return back()->with('success_message', 'Produit supprimé du panier.');
    }

    public function vider()
    {
        \Cart::clear();

        return back()->with('success_message', 'Panier vidé.');
    }
}
