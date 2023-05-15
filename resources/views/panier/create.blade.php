@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un produit au panier</h1>

    <form action="{{ route('panier.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="produit_id">Produit :</label>
            <select name="produit_id" id="produit_id" class="form-control" required>
                <option value="">Sélectionnez un produit</option>
                @foreach ($produits as $produit)
                <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantite">Quantité :</label>
            <input type="number" name="quantite" id="quantite" class="form-control" min="1" max="10" value="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter au panier</button>
    </form>
</div>
@endsection
