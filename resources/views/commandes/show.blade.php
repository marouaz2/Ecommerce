@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Commande n° {{ $commande->id }}</h1>
    <p><strong>Nom :</strong> {{ $commande->nom }}</p>
    <p><strong>Adresse :</strong> {{ $commande->adresse }}</p>
    <p><strong>Téléphone :</strong> {{ $commande->telephone }}</p>
    <p><strong>Email :</strong> {{ $commande->email }}</p>
    <p><strong>Total :</strong> {{ $commande->total }} €</p>
    <p><strong>Status :</strong> {{ $commande->status }}</p>
    <hr>
    <h3>Produits commandés :</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->prix }} €</td>
                <td>{{ $item->pivot->quantite }}</td>
                <td>{{ $item->prix * $item->pivot->quantite }} €</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="card-footer">
        <a href="{{ route('commandes.pdf', $commande->id) }}" class="btn btn-primary">Télécharger le PDF</a>
    </div>
</div>
@endsection
