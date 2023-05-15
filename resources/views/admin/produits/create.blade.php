@extends('layouts.admin')

@section('content')
    <h1>Create a new Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.produits.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nom">Name:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="prix">Price:</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix') }}">
        </div>
        <div class="form-group">
            <label for="categorie">Category:</label>
            <select class="form-control" id="categorie" name="categorie">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary" action="{{ route('admin.index') }}">Create</button>
    </form>
@endsection
