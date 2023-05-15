@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a href="{{ route('admin.clients.index') }}" class="btn btn-info">Nos clients</a><br><br>
                <div class="card">
                    
                    <div class="card-header">Tableau de bord Admin</div>

                    <div class="card-body">
                        
                        <h3>Produits</h3>
                        <a href="{{ route('admin.produits.create') }}" class="btn btn-primary ">Ajouter un produit</a>
                        <a href="{{ route('admin.produits.import') }}" class="btn btn-success">Import Products</a>
                        <a href="{{ route('admin.produits.export') }}" class="btn btn-info">Export Products</a>
                        
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Catégorie</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produits as $produit)
                                    <tr>
                                        <td>{{ $produit->id }}</td>
                                        <td>{{ $produit->nom }}</td>
                                        <td>{{ $produit->description }}</td>
                                        <td>{{ $produit->prix }}</td>
                                        <td>{{ $produit->categorie->nom }}</td>
                                        <td>
                                            <a href="{{ route('admin.produits.edit', $produit->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                            <form action="{{ route('admin.produits.delete', $produit->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce produit?')">Supprimer</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h3>Categories</h3>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Ajouter une categorie</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $categorie)
                                    <tr>
                                        <td>{{ $categorie->id }}</td>
                                        <td>{{ $categorie->nom }}</td>
                                        <td>{{ $categorie->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                            <form action="{{ route('admin.categories.delete', $categorie->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette categorie?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
