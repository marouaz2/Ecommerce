<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <!-- Show the log out link if the user is authenticated -->
@auth
<a href="{{ route('logout') }}"
   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
  Log out
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
@endauth

<!-- Show the log in and register links if the user is a guest -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Ecommerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.index') }}">Accueil</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
          </li>
      </ul>

      
  </div>
  @guest
  <a href="{{ route('login') }}" class="btn btn-link nav-link">Log in</a>
  <a href="{{ route('register') }}" class="btn btn-link nav-link">Register</a>
  @endguest
</nav>

  <a href="{{ route('panier.index') }}" >Panier</a>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
           
            <div class="row">
                <div class="col-md-12">
                    <h1>Bienvenue sur notre boutique en ligne</h1>
                    <p>Nous vous proposons une large sélection de produits de qualité à des prix compétitifs.</p>
                </div>
            </div>

            <!-- Page Content -->
             <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('content')
              </main>
        </div> 
    </body>


</html>
{{-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
<a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>

<a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
<a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
<a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a> --}}
