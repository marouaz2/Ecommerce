<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirmation de commande</title>
</head>
<body>
    <h1>Votre commande a été passée avec succès</h1>
    <p>Bonjour {{ $commande->nom }},</p>
    <p>Nous avons bien reçu votre commande et nous la traiterons dans les plus brefs délais. Veuillez trouver ci-dessous les détails de votre commande:</p>
    <ul>
        @foreach ($produits as $produit)
            <li>{{ $produit->nom }} - {{ $produit->pivot->quantite }} x {{ $produit->prix }} €</li>
        @endforeach
    </ul>
    <p>Total: {{ $total }} €</p>
    <p>Nous vous remercions de votre confiance et restons à votre disposition pour toute demande.</p>
    <p>Cordialement,</p>
    <p>L'équipe de notre boutique en ligne</p>
</body>
</html>
