  <!-- Preloader-->
  {{-- <div class="preloader" id="preloader">
    <div class="spinner-grow text-secondary" role="status">
      <div class="sr-only">Loading...</div>
    </div>
  </div> --}}
  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between">
      <!-- Logo Wrapper-->
      <div class="logo-wrapper"><a href="home.html">
          {{-- <img src="{{ asset('assets/img/core-img/logo-small.png') }}" alt=""> --}}
          <strong ><a href="{{url('/')}}" style="color: #f75448">ℙykari.ℂom</a> </strong>
      </a></div>
      <!-- Search Form-->
      <div class="top-search-form">
        <form action="" method="">
          <input class="form-control" type="search" placeholder="Enter your keyword">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <!-- Navbar Toggler-->
      <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
    </div>
  </div>
  <!-- Sidenav Black Overlay-->
  <div class="sidenav-black-overlay"></div>
  <!-- Side Nav Wrapper-->
  <div class="suha-sidenav-wrapper" id="sidenavWrapper">
    <!-- Sidenav Profile-->
    {{-- <div class="sidenav-profile">
      <div class="user-profile"><img src="{{ asset('assets/img/bg-img/9.jpg') }}" alt=""></div>
      <div class="user-info">
        <h6 class="user-name mb-0">Suha Sarah</h6>
        <p class="available-balance">Credit <span>$<span class="counter">461</span></span></p>
      </div>
    </div> --}}
    <!-- Sidenav Nav-->
    <ul class="sidenav-nav ps-0">
      <li class="suha-dropdown-menu"><a href="wishlist-grid.html"><i class="lni lni-heart"></i>All Pages</a>
        <ul>
          <li><a href="{{url('/')}}">- Home</a></li>
          <li><a href="#">- About Us</a></li>
        </ul>
      </li>

      <li>
        <a href="{{ route('login') }}"><i class="lni lni-user"></i>Sign In</a>
      </li>
      <li>
        <a href="{{ route('regifirststep') }}"><i class="lni lni-user"></i>Register</a>
      </li>
      {{-- <li><a href="notifications.html"><i class="lni lni-alarm lni-tada-effect"></i>Notifications<span class="ms-3 badge badge-warning">3</span></a></li> --}}
      {{-- <li class="suha-dropdown-menu"><a href="#"><i class="lni lni-cart"></i>Shop Pages</a>
        <ul>
          <li><a href="shop-grid.html">- Shop Grid</a></li>
          <li><a href="shop-list.html">- Shop List</a></li>
          <li><a href="single-product.html">- Product Details</a></li>
          <li><a href="featured-products.html">- Featured Products</a></li>
          <li><a href="flash-sale.html">- Flash Sale</a></li>
        </ul>
      </li> --}}
      {{-- <li><a href="pages.html"><i class="lni lni-empty-file"></i>All Pages</a></li> --}}
      
      {{-- <li><a href="settings.html"><i class="lni lni-cog"></i>Settings</a></li> --}}
      <li><a href="{{ route('logout') }}"><i class="lni lni-power-switch"></i>Sign Out</a></li>
    </ul>
    <!-- Go Back Button-->
    <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
  </div>
  <!-- PWA Install Alert-->
  {{-- <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
    <div class="toast-body">
      <div class="content d-flex align-items-center mb-2"><img src="{{ asset('img/icons/icon-72x72.png') }}" alt="">
        <h6 class="mb-0">Add to Home Screen</h6>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
      </div><span class="mb-0 d-block">Add pykari on your mobile home screen. Click the<strong class="mx-1">"Add to Home Screen"</strong>button &amp; enjoy it like a regular app.</span>
    </div>
  </div> --}}