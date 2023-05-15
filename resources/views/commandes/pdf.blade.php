<!DOCTYPE html>
<html>
<head>
	<title>Facture</title>
	
</head>
<body>
	<h1>Facture</h1>
	<table>
		<thead>
			<tr>
				<th>Produit</th>
				<th>Prix unitaire</th>
				<th>Quantité</th>
				<th>Prix total</th>
			</tr>
		</thead>
		<tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->prix }} €</td>
                <td>{{ $item->pivot->quantite }}</td>
                <td>{{ $item->prix * $item->pivot->quantite }} €</td>
            </tr>
			@endforeach
			<tr>
				<td colspan="3"><strong>Total :</strong></td>
				<td>{{ $total }} €</td>
			</tr>
		</tbody>
	</table>
	<br>
	<p>Nom : {{ $nom }}</p>
	<p>Adresse : {{ $adresse }}</p>
	<p>Téléphone : {{ $telephone }}</p>
	<p>Email : {{ $email }}</p>
</body>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #4CAF50;
        color: white;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
        margin-bottom: 50px;
    }
</style>
</html>
