@extends('layouts.header')

{{-- @section('content') --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liste des catégories') }}</div>
                    {{-- <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success">{{ __('Ajouter') }}</a> --}}
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Nom') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $categorie)
                                    <tr>
                                        <td>{{ $categorie->nom }}</td>
                                        <td>{{ $categorie->description }}</td>
                                        {{-- <td>
                                            <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-success">{{ __('Modifier') }}</a>
                                            <form action="{{ route('categories.destroy', $categorie->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette catégorie ?') }}')">{{ __('Supprimer') }}</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- @endsection --}}
