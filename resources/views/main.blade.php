<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @yield('title')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="{{ asset('img/compactlogo.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ secure_asset('css/search.css') }}">
  @yield('css')
  @yield('js')
</head>

<body id="top">
  <header class="header" data-header>
    <div class="container">
      <div class="overlay" data-overlay></div>
      <a class="logo" href="/">
        <img src="{{ asset('img/dartlogo.png') }}">
      </a>
      <div class="header-actions">
        <form class="example" action="/search" method="GET" id="search-form">
          <input type="text" class="form-control" placeholder="Search.." name="query">
          <select name="type" id="search-type" class="form-select">
            <option value="movie">Movie</option>
            <option value="anime">Anime</option>
          </select>
        </form>
        <!-- <div class="dropdown">
          <button class="dropbtn">Category</button>
          <div class="dropdown-content">
            <a href="#" onclick="setSearchType('movie')">Movie</a>
            <a href="#" onclick="setSearchType('anime')">Anime</a>
          </div>
        </div>
        <script>
          function setSearchType(type) {
            document.getElementById('hidden-search-type').value = type;
          }
        </script> -->
        
        @if(Auth::check() && Auth::user()->hasVerifiedEmail())
          <!-- If user is authenticated and verified, show logout button -->
          <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button class="btn btn-primary" type="submit">Log out</button>
          </form>
        @else
          <!-- If user is not authenticated or not verified, show sign in button -->
          <button class="btn btn-primary" id="signInButton">Sign in</button>
        @endif
      </div>
      
      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>
        <div class="navbar-top">
          <a class="logo">
            <img alt="Dart logo">
          </a>
          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>
        <ul class="navbar-list">
          <li><a class="navbar-link" href="/coming_soon">Recommendation engine</a></li>
          <li><a class="navbar-link">Community</a></li>
          <li><a class="navbar-link">Movie Database</a></li>
        </ul>
      </nav>
    </div>
  </header>

  @yield('content')

  <footer class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="footer-brand-wrapper">
          <a class="logo">
            <img alt="Dart logo" src="{{ asset('img/dartlogo.png') }}">
          </a>
        </div>
        <div class="divider"></div>
        <div class="quicklink-wrapper">
          <a>
            Dart is your one-stop movie site that provides accurate and reliable movie database.
            Find your movies with dart now!
          </a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <p class="copyright">
          &copy; 2024 <a href="#">Dart</a>. All Rights Reserved
        </p>
      </div>
    </div>
  </footer>

  <script>
    // Redirect to login page if the user clicks "Sign in"
    document.getElementById('signInButton').onclick = function() {
        window.location.href = "{{ route('login') }}";
    };
  </script>

</body>

</html>
