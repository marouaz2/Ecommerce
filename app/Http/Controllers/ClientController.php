<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
{
    // Retrieve the authenticated user via the Auth facade
    $user = Auth::user();

    // Pass the authenticated user to the view
    return view('clients.index');
}

    public function historiqueCommandes()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer toutes les commandes de l'utilisateur
        $commandes = Commande::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Afficher la vue avec les commandes
        return view('clients.historique', compact('commandes'));
    }
    
}
