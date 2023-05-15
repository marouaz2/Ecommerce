@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Détails du produit') }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nom">{{ __('Nom') }} : {{ $produit->nom }}</label>
                            {{-- <p>{{ $produit->nom }}</p> --}}
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }} : {{ $produit->description }}</label>
                            {{-- <p>{{ $produit->description }}</p> --}}
                        </div>

                        <div class="form-group">
                            <label for="prix">{{ __('Prix') }} : {{ $produit->prix }}</label>
                            {{-- <p>{{ $produit->prix }}</p> --}}
                        </div>
                        <div class="form-group">
                            <label for="image">{{ __('image') }}:</label>
                            @if($produit->image)
                            <img class="card-img-top" src="{{ asset('images/' . $produit->image) }}" alt="{{ $produit->nom }}">
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
