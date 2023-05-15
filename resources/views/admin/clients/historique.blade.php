<!-- admin/clients/historique.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="my-4">Historique des commandes pour {{ $user->email }}</h1>
    @if($commandes->isEmpty())
    <div class="alert alert-warning">
        Aucune commande trouvée.
    </div>
    @else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Produits</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <td>{{ $commande->created_at->format('d/m/Y') }}</td>
                    <td>
                        <ul>
                            @foreach ($commande->produits as $produit)
                                <li>{{ $produit->nom }} ({{ $produit->pivot->quantite }})</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $commande->total }} €</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
