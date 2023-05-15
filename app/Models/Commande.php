<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'total',
        'status',
        // 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function produits()
{
    return $this->belongsToMany(Produit::class)->withPivot('quantite');
}

}
