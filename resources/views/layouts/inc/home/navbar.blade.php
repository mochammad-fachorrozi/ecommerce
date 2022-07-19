 <!-- Nav Bar Start -->
 <div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('/product') }}" class="nav-item nav-link">Products</a>
                    {{-- <a href="product-detail.html" class="nav-item nav-link">Product Detail</a> --}}
                    <a href="{{ url('/cart') }}" class="nav-item nav-link">Cart</a>
                    <a href="{{ url('/checkout') }}" class="nav-item nav-link">Checkout</a>
                    <a href="{{ url('/my-account') }}" class="nav-item nav-link">My Account</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/wishlist') }}" class="dropdown-item">Wishlist</a>
                            <a href="{{ url('/login-user') }}" class="dropdown-item">Login & Register</a>
                            <a href="{{ url('/contact') }}" class="dropdown-item">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Login</a>
                            <a href="#" class="dropdown-item">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->      