<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    protected $fillable = [
        'produit_id',
        'quantite',
        'total',
        'statut'
    ];
    
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}    