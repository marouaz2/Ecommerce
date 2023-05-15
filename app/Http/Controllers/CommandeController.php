<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\Cart;
use App\Mail\CommandeMail;
use Illuminate\Support\Facades\Mail;
use Dompdf\Dompdf;

class CommandeController extends Controller
{
    public function show($id)
    {
        $commande = Commande::findOrFail($id);
        $items = $commande->produits;
        return view('commandes.show', compact('commande' , 'items'));
    }
    public function index()
    {
        $commandes = Commande::orderBy('created_at', 'desc')->get();
        return view('commandes.index', compact('commandes'));
    }
    public function create()
    {
        $items = \Cart::getContent();
        $total = \Cart::getTotal();
        $commande = Commande::create();
        return view('commandes.create', compact('items', 'total', 'commande'));
    }
    
    public function store(Request $request)
{
    $this->validate($request, [
        'nom' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'email' => 'required|string|email|max:255',
    ]);

    // Check if user with the email already exists
    $user = User::where('email', $request->input('email'))->first();

    // If user doesn't exist, create a new one
    if (!$user) {
        $user = User::create([
            'name' => $request->input('nom'),
            'email' => $request->input('email'),
            'password' => bcrypt('password'), // set a default password for new users
        ]);
    }

    // Get the current user
    $authUser = Auth::user();

    // Create a new order
    $commande = new Commande();
    $commande->nom = $request->input('nom');
    $commande->adresse = $request->input('adresse');
    $commande->telephone = $request->input('telephone');
    $commande->email = $request->input('email');
    $commande->total = \Cart::getTotal();
    $commande->status = 'pending';
    $commande->user_id = $user->id;
    $commande->save();

    // Get the items in the user's cart
    $items = \Cart::getContent();

    // Add the items in the cart to the order
    foreach ($items as $item) {
        $produit = Produit::find($item->id);
        $commande->produits()->attach($produit->id, ['quantite' => $item->quantity]);
    }

    // Clear the cart
    \Cart::clear();

    // Load the order information
    $commande->load('produits');

    // Send the order confirmation email
    Mail::to($commande->email)->send(new CommandeMail($commande));


    // Redirect to the order confirmation page
    return redirect()->route('commandes.show', ['id' => $commande->id])->with('success_message', 'Votre commande a été passée avec succès.');
}




    public function confirmation()
    {
        return view('commande.confirmation');
    }
    public function generatePDF(Commande $commande)
{
    // Fetch the order information from the database
    $commande->load('produits');

    // Get the items and total from the command
    $items = $commande->produits;
    $total = $commande->total;
    $nom = $commande->nom;
    $adresse = $commande->adresse;
    $telephone = $commande->telephone;
    $email = $commande->email;

    // Generate the HTML for the invoice using a Blade view
    $html = view('commandes.pdf', compact('commande', 'items', 'total', 'nom', 'adresse', 'telephone', 'email'))->render();

    // Create a new instance of Dompdf
    $pdf = new Dompdf();

    // Load the HTML into Dompdf
    $pdf->loadHtml($html);

    // Set the paper size and orientation
    $pdf->setPaper('A4', 'portrait');

    // Render the PDF
    $pdf->render();

    // Output the PDF as a download
    return $pdf->stream('commandes.pdf');
}
}
