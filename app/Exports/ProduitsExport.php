<?php
namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProduitsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Produit::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nom',
            'Description',
            'Prix',
            'Catégorie',
            'Image'
        ];
    }
}
