<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'panier_id',
        'produit_id',
        'quantite',
        'prix_unitaire',
        'total'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }
}
