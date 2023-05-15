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
<main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
  @yield('content')
</main>
{{-- <ul class="navbar-nav fixed-bottom">
  <li class="nav-item">
    <a class="nav-link" href="#">{{__("Contact")}}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/login">{{__("login")}}</a>
  </li>
</ul> --}}

<style>
    nav {
  background-color: #a8a1a1;
  overflow: hidden;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav li {
  float: left;
}

nav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

nav li a:hover {
  background-color: #111;
}

</style>