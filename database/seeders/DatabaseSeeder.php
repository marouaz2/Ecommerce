<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        $user = new User();
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->email_verified_at = now();
        $user->password = bcrypt('password');
        $user->role = 'admin';
        $user->save();

        
        // Ajouter un utilisateur client
        $user = new User();
        $user->name = "Client";
        $user->email = "client@example.com";
        $user->email_verified_at = now();
        $user->password = bcrypt('password');
        $user->role = 'client';
        $user->save();

         // Créer des catégories
         $categorie1 = Categorie::create([
            'nom' => 'Electronique',
            'description' => 'Produits électroniques',
        ]);
        
        $categorie2 = Categorie::create([
            'nom' => 'Vêtements',
            'description' => 'Vêtements pour hommes et femmes',
        ]);
        
        $categorie3 = Categorie::create([
            'nom' => 'Maison',
            'description' => 'Produits pour la maison',
        ]);
        
        $categorie4 = Categorie::create([
            'nom' => 'Jardin',
            'description' => 'Produits pour le jardin et l\'extérieur',
        ]);
        
        Produit::create([
            'nom' => 'Smartphone',
            'description' => 'Un smartphone dernier cri',
            'prix' => 999.99,
            'image' => 'smartphone.jpg',
            'categorie_id' => $categorie1->id,
        ]);
        
        Produit::create([
            'nom' => 'Robe de soirée',
            'description' => 'Robe de soirée pour femme',
            'prix' => 199.99,
            'image' => 'robe.webp',
            'categorie_id' => $categorie2->id,
        ]);
        
        Produit::create([
            'nom' => 'Table basse',
            'description' => 'Table basse pour salon',
            'prix' => 149.99,
            'image' => 'table-basse.jpg',
            'categorie_id' => $categorie3->id,
        ]);
        
        Produit::create([
            'nom' => 'Tondeuse à gazon',
            'description' => 'Tondeuse à gazon pour jardin',
            'prix' => 299.99,
            'image' => 'tondeuse.webp',
            'categorie_id' => $categorie4->id,
        ]);
        
        Produit::create([
            'nom' => 'Chaussures de sport',
            'description' => 'Chaussures de sport pour homme',
            'prix' => 79.99,
            'image' => 'chaussures.jpg',
            'categorie_id' => $categorie2->id,
        ]);
        
        Produit::create([
            'nom' => 'Lampe de bureau',
            'description' => 'Lampe de bureau design',
            'prix' => 59.99,
            'image' => 'lampe.jpg',
            'categorie_id' => $categorie3->id,
        ]);
        $commande = Commande::create([
            // 'user_id' => $user_id,
            'nom' => 'John Doe',
            'adresse' => '123 Main St',
            'telephone' => '555-555-5555',
            'email' => 'john@example.com',
            'total' => 99.99,
            'status' => 'pending',
            // 'user_id' => Auth::user()->id,
        ]);
        
    }      
      
}
