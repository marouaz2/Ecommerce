<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Categorie;

class RechercheProduits extends Component
{
    public $search = '';
    public $prix_min;
    public $prix_max;
    public $category_id; // Add this property

    public function render()
    {
        $query = Produit::query();

        if ($this->search) {
            $query->where('nom', 'like', '%'.$this->search.'%');
        }
    
        if ($this->prix_min) {
            $query->where('prix', '>=', $this->prix_min);
        }
    
        if ($this->prix_max) {
            $query->where('prix', '<=', $this->prix_max);
        }
    
        // Get the categories from the database
        $categories = Categorie::all();
    
        // Filter the products by category if a category is selected
        if ($this->category_id) {
            $query->where('categorie_id', $this->category_id);
        }
    
        $produits = $query->get();
    
        return view('livewire.recherche-produits', [
            'produits' => $produits,
            'categories' => $categories,
        ]);
    }
}
