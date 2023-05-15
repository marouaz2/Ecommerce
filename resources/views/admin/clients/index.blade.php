<!-- resources/views/admin/clients/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1 class="mb-4"> Clients</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
                <th>Historique des commandes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->created_at->format('d/m/Y') }}</td>
                    <td><a href="{{ route('admin.clients.historique', ['id' => $client->id]) }}"  class="btn btn-primary">Voir l'historique de commandes</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
