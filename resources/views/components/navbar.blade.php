@props(['color'])
<nav class="navbar navbar-expand-md {{ $color ?? 'bg-light' }} navbar-light sticky-top">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand text-danger">Foody<span class="text-warning">Me</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="/" class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="/" class="nav-link active">About</a></li>
                <li class="nav-item"><a href="/" class="nav-link active">Contact</a></li>
                <li class="nav-item"><a href="/" class="nav-link active">Services</a></li>
                @auth
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active">Products</a></li>

                    @can('is-admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link active">Admin Dashboard</a>
                        </li>
                    @endcan
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#Id2" aria-controls="Id2">
                        <a href="#" class="nav-link active position-relative"">
                            <i class="bi bi-bell-fill"></i>
                            <span class="badge bg-danger position-absolute top-1 start-100 translate-middle">12
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item"><a href="{{ route('cart.list') }}" class="nav-link active position-relative ms-3">
                            <i class="bi bi-cart-fill"></i>
                            <span
                                class="position-absolute top-1 start-100 translate-middle badge bg-danger {{ count(Cart::getContent()) == 0 ? 'd-none' : '' }}">{{ count(Cart::getContent()) }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a></li>


                    <li class="nav-item dropdown ms-3">
                        <a id="navbarDropdown" class="nav-link active dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{ route('profile.index') }}" class="dropdown-item">
                                <i class="bi bi-person-fill me-2"></i>
                                {{ __('Profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    @if (Route::has('login'))
                        <li class="nav-item me-3">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-danger d-inline-block rounded">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="Id1"
    aria-labelledby="Enable both scrolling & backdrop">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Your Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p>Try scrolling the rest of the page to see this option in action.</p>
    </div>
</div>



{{-- notification offcanvas --}}
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="Id2"
    aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">Notifications (12)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        {{-- <div>
            I will not close if you click outside of me.
        </div> --}}
        <div class="alert alert-light alert-dismissible fade show shadow-sm" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>Lorem, ipsum dolor sit amet consectetur adipisicing.</span>
        </div>

        <div class="alert alert-light alert-dismissible fade show shadow-sm" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>Lorem, ipsum dolor sit amet consectetur adipisicing.</span>
        </div>

        <div class="alert alert-light alert-dismissible fade show shadow-sm" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>Lorem, ipsum dolor sit amet consectetur adipisicing.</span>
        </div>

        <div class="alert alert-light alert-dismissible fade show shadow-sm" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>Lorem, ipsum dolor sit amet consectetur adipisicing.</span>
        </div>

    </div>
</div>
