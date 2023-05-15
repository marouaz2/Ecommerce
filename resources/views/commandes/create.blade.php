@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Passer une commande</h1>
                <hr>
                <form method="POST" action="{{ route('commandes.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom complet</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" id="adresse" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Numéro de téléphone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <hr>
                    <h2>Récapitulatif de la commande</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }} €</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price * $item->quantity }} €</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-right">Total</td>
                                <td>{{ $total }} €</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary">Passer la commande</button>
                </form>
            </div>
        </div>
    </div>
@endsection
