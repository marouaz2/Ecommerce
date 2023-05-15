@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Panier') }}</div>

                    <div class="card-body">
                        @if (session('success_message'))
                            <div class="alert alert-success">
                                {{ session('success_message') }}
                            </div>
                        @endif

                        @if(\Cart::isEmpty())
                            <p>Votre panier est vide.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('images/' . $item->attributes->image) }}" alt="{{ $item->name }}" width="50" height="50">
                                                {{ $item->name }}
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <form action="{{ route('panier.supprimer', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce produit du panier ?') }}')">{{ __('Supprimer') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>Total :</td>
                                        <td>{{ $total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('commandes.create') }}" class="btn btn-primary">Passer commande</a>
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('panier.vider') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Vider le panier</button>
                                </form>
                                
                                
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
