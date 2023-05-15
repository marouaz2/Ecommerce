<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <div class="logo">
              <span class="flaticon-solidarity"></span>
              <h1 class="navbar-brand">Ecommerce</h1>
          </div>
          <div class="navbar" id="navbarNav">
          <div class="row">
            <ul class="navbar1">
              <li class="nav-item">
                <a class="nav-link" href="/">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#">Promotions</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li> 
            </ul>
          </div>
          <form action="{{ route('produits.index') }}" method="GET" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
              <label for="search" class="sr-only">Recherche</label>
              <input type="text" class="form-control" id="search" name="search" placeholder="Rechercher par nom...">
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="price" class="sr-only">Prix maximum</label>
              <div class="input-group-prepend">
                <div class="input-group-text">€</div>
                <input type="number" class="form-control" id="price" name="price" placeholder="Prix maximum">
              </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
          </form>
          
          {{-- <div id="cart">
              <h2>Panier</h2>
              <ul id="cart-items">
                <!-- les éléments du panier seront ajoutés dynamiquement ici -->
              </ul>
              <p id="total-price">Total: 0€</p>
              <button id="checkout-btn">Payer</button>
            </div>
             --}}
  </div>
  </div>
  </nav>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
           
            <div class="row">
                <div class="col-md-12">
                    <h1>Bienvenue sur notre boutique en ligne</h1>
                    <p>Nous vous proposons une large sélection de produits de qualité à des prix compétitifs.</p>
                </div>
            </div>

            <!-- Page Content -->
            {{-- <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('produits')
              </main> --}}
        </div>
    </body>


</html>
<a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
<a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>

<a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
<a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
<a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
