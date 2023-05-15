@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liste des produits') }}</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($produits as $produit)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        @if($produit->image)
                                            <img class="card-img-top" src="{{ asset('images/' . $produit->image) }}" alt="{{ $produit->nom }}">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $produit->nom }}</h5>
                                            <p class="card-text">{{ $produit->description }}</p>
                                            <p class="card-text">{{ $produit->prix }}</p>
                                            <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-primary">{{ __('Afficher') }}</a>
                                            <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                                                @csrf
                                                <label for="quantite">Quantité :</label>
                                                <input type="number" id="quantite" name="quantite" value="1" min="1">
                                                <button type="submit">Ajouter au panier</button>
                                            </form>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @livewire('recherche-produits')
    </div>
    
    @livewireScripts
    @livewireStyles
@endsection
