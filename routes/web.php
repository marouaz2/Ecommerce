<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Livewire\SearchProduits;
use Livewire\Http\Livewire;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProduitController::class, 'index'])->name('produits.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','client')->group(function () {
    // Route pour l'historique des commandes
    Route::get('/historique', [\App\Http\Controllers\ClientController::class, 'historiqueCommandes'])->name('clients.historique');
    Route::get('/client', [ClientController::class, 'index'])->name('clients.index');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/produits', [AdminController::class, 'indexProduits'])->name('admin.produits.index');
Route::get('/admin/produits/create', [AdminController::class, 'createProduit'])->name('admin.produits.create');
Route::post('/admin/produits', [AdminController::class, 'storeProduit'])->name('admin.produits.store');
Route::get('/admin/produits/{id}/edit', [AdminController::class, 'editProduit'])->name('admin.produits.edit');
Route::put('/admin/produits/{id}', [AdminController::class, 'updateProduit'])->name('admin.produits.update');
Route::delete('/admin/produits/{id}', [AdminController::class, 'deleteProduit'])->name('admin.produits.delete');

    Route::get('/categories', [AdminController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [AdminController::class, 'createCategorie'])->name('admin.categories.create');
    Route::post('/categories', [AdminController::class, 'storeCategorie'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [AdminController::class, 'editCategorie'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [AdminController::class, 'updateCategorie'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [AdminController::class, 'deleteCategorie'])->name('admin.categories.delete');
    
    Route::match(['get', 'post'],'/admin/import-produits', [AdminController::class, 'importProduits'])->name('admin.produits.import');
    Route::get('/admin/export-produits', [AdminController::class,'exportProduits'])->name('admin.produits.export');
    Route::get('/admin/clients', [AdminController::class, 'indexClients'])->name('admin.clients.index');
    Route::get('/admin/clients/{id}/historique', [AdminController::class, 'historiqueCommandesClient'])->name('admin.clients.historique');

});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('categories', [CategorieController::class, 'index'])->name('categories.index');
// Route::get('categories/create', [CategorieController::class, 'create'])->name('categories.create');
// Route::post('categories', [CategorieController::class, 'store'])->name('categories.store');
// Route::get('categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
// Route::put('categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
// Route::delete('categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');


Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
// Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
// Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{id}', [ProduitController::class, 'show'])->name('produits.show');
// Route::get('/produits/{id}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
// Route::put('/produits/{id}', [ProduitController::class, 'update'])->name('produits.update');
// Route::delete('/produits/{id}', [ProduitController::class, 'destroy'])->name('produits.destroy');
// Route::get('/produits/rechercher', [ProduitController::class, 'rechercher'])->name('produits.rechercher');
// Route::get('/produits/rechercher', SearchProduits::class)->name('produits.rechercher');
// Route::get('/search-produits', \App\Http\Livewire\SearchProduits::class)->name('produits.rechercher');
Route::get('/categories/{id}', [ProduitController::class, 'getCategorie'])->name('produits.categorie');



Route::get('/panier', [PanierController::class, 'index'])->name('panier.index');

Route::post('/panier/ajouter/{id}', [PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::delete('/panier/supprimer/{id}', [PanierController::class, 'supprimer'])->name('panier.supprimer');
Route::delete('/panier/vider', [PanierController::class, 'vider'])->name('panier.vider');

// Route::get('/')
// Afficher le formulaire de commande
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');

// Soumettre la commande
Route::match(['get', 'post'],'/commande', [CommandeController::class, 'create'])->name('commandes.create');
Route::match(['get', 'post'],'/commandes', [CommandeController::class, 'store'])->name('commandes.store');
Route::match(['get', 'post'],'/commandes/{id}', [CommandeController::class,'show'])->name('commandes.show');
Route::get('/commandes/{commande}/pdf', [CommandeController::class, 'generatePDF'])->name('commandes.pdf');

// Afficher la page de confirmation de commande
Route::get('/commande/confirmation', [CommandeController::class, 'confirmation'])->name('commande.confirmation');


require __DIR__.'/auth.php';
