@extends('layouts.app')

@section('content')
    <h1>Historique de commandes </h1>

    @if($commandes->isEmpty())
        <p>Aucune commande trouvée.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Date de commande</th>
                    <th>Total</th>
                    <th>État</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{ $commande->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $commande->total }} €</td>
                        <td>{{ ucfirst($commande->status) }}</td>
                        <td><a href="{{ route('commandes.show', ['id' => $commande->id]) }}">Voir la commande</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
