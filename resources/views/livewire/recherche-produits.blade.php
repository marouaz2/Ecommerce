<div class="container">
    <form>
        <div class="form-inline d-flex">
          <label for="search" class="mr-2">Recherche :</label>
          <input wire:model="search" type="text" class="form-control mr-2" id="search" name="search">
          <label for="prix_min" class="mr-2">Prix minimum :</label>
          <input wire:model="prix_min" type="number" class="form-control mr-2" id="prix_min" name="prix_min">
          <label for="prix_max" class="mr-2">Prix maximum :</label>
          <input wire:model="prix_max" type="number" class="form-control mr-2" id="prix_max" name="prix_max">
        </div>
      </form>
    <div class="row justify-content-center">
        <div class="col-md-8">
            
              

            <div class="form-group">
                <label for="category" class="mr-2">Catégorie :</label>
                <select wire:model="category_id" class="form-control mr-2" id="category" name="category">
                    <option value="">Toutes les catégories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                    @endforeach
                </select>
            </div>
            
            

            {{-- <button wire:model="search" class="btn btn-primary">Rechercher</button> --}}

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
                                            <button type="submit" class="btn btn-success">{{ __('Ajouter au panier') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
