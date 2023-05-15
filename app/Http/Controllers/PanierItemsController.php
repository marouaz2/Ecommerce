<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\PanierItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanierItemsController extends Controller
{
    public function store(Request $request)
    {
        $produit_id = $request->input('produit_id');
        $quantite = $request->input('quantite');
        $produit = Produit::findOrFail($produit_id);

        $user = Auth::user();
        if ($user) {
            $panier = $user->panier;

            $panierItem = $panier->items()->where('produit_id', $produit_id)->first();

            if ($panierItem) {
                $panierItem->quantite += $quantite;
                $panierItem->total += $quantite * $produit->prix;
                $panierItem->save();
            } else {
                $panierItem = new PanierItem([
                    'produit_id' => $produit_id,
                    'quantite' => $quantite,
                    'prix_unitaire' => $produit->prix,
                    'total' => $quantite * $produit->prix,
                ]);

                $panier->items()->save($panierItem);
            }
        } else {
            $guest_id = Session::get('guest_id');
            if (!$guest_id) {
                $guest_id = str_random(40);
                Session::put('guest_id', $guest_id);
            }

            $panier = Panier::where([
                ['guest_id', $guest_id],
                ['statut', 'en_attente']
            ])->first();

            if (!$panier) {
                $panier = new Panier([
                    'guest_id' => $guest_id,
                    'statut' => 'en_attente'
                ]);
                $panier->save();
            }

            $panierItem = $panier->items()->where('produit_id', $produit_id)->first();

            if ($panierItem) {
                $panierItem->quantite += $quantite;
                $panierItem->total += $quantite * $produit->prix;
                $panierItem->save();
            } else {
                $panierItem = new PanierItem([
                    'produit_id' => $produit_id,
                    'quantite' => $quantite,
                    'prix_unitaire' => $produit->prix,
                    'total' => $quantite * $produit->prix,
                ]);

                $panier->items()->save($panierItem);
            }
        }

        return redirect()->route('panier.index');
    }

    public function update(Request $request)
    {
        $panierItem = PanierItem::findOrFail($request->input('id'));
    
        $quantite = $request->input('quantite');
        $produit = $panierItem->produit;
    
        $panierItem->quantite = $quantite;
        $panierItem->total = $quantite * $produit->prix;
        $panierItem->save();
    
        return redirect()->route('panier.index');
    }
}    