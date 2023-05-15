<?php
namespace App\Imports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProduitsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Produit([
            'nom' => $row['nom'],
            'description' => $row['description'],
            'prix' => $row['prix'],
            'categorie_id' => $row['categorie_id'],
            'image' => $row['image'],
        ]);
    }
}
