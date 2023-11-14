@props(['color'])
@php
    $notifications = auth()->user()->notifications ?? [];
    $unreadNotifications = auth()->user()->unreadNotifications ?? [];
    // dd($unreadNotifications);
@endphp
<nav class="navbar navbar-expand-lg {{ $color ?? 'bg-light' }} navbar-light sticky-top">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand text-danger">Foody<span class="text-warning">Me</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-lg-auto text-center">
                <li class="nav-item"><a href="/" class="nav-link active">Home</a></li>
                <li class="nav-item"><a href="/about" class="nav-link active">About</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link active">Contact</a></li>
                <li class="nav-item"><a href="mailto:ademolademilade362@gmail.com" class="nav-link active">Report a
                        Problem</a></li>
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link active">Products</a></li>
                @auth

                    @can('is-admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link active">Admin Dashboard</a>
                        </li>
                    @endcan
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('cart.list') }}" class="nav-link active position-relative mx-3">
                        <i class="bi bi-cart-fill"></i>
                        <span
                            class="position-absolute top-1 start-100 translate-middle badge bg-danger {{ count(Cart::getContent()) == 0 ? 'd-none' : '' }}">{{ count(Cart::getContent()) }}
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        </span>
                    </a></li>
                @auth
                    <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#Id2" aria-controls="Id2">
                        <a href="#" class="nav-link active position-relative"">
                            <i class="bi bi-bell-fill"></i>
                            @if (count($unreadNotifications) > 0)
                                <span
                                    class="badge bg-danger position-absolute top-1 start-100 translate-middle">{{ count($unreadNotifications) }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            @endif
                        </a>
                    </li>


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
        <h5 class="offcanvas-title" id="staticBackdropLabel">Notifications
            @if (count($unreadNotifications) > 0)
                ({{ count($unreadNotifications) }})
            @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('read-notify') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-danger col-12 mb-3 rounded-0">Mark All
                As
                Read</button>
        </form>
        <p class="text-sm">Unread Notifications</p>
        @forelse ($unreadNotifications as $notification)
            <div class="alert alert-light shadow-sm" role="alert">
                <span class="mb-3">Hello {{ auth()->user()->name }}, {{ $notification['data']['message'] }}

                    @if (isset($notification['data']['quantity']))
                        {{ $notification['data']['quantity'] }}
                    @endif


                    @if (isset($notification['data']['product']))
                        {{ $notification['data']['product'] }}
                    @elseif(isset($notification['data']['name']))
                        {{ $notification['data']['name'] }}
                    @endif
                </span>
                <br>
                <br>
                <div class="text-end text-secondary">
                    <span>{{ $notification['created_at']->diffForHumans() }}</span>
                </div>
            </div>
        @empty
            <p class="text-secondary text-center text-sm">No Unread Notifications Found</p>
        @endforelse

        <p class="text-sm">Read Notifications</p>
        @forelse ($notifications as $notification)
            <div class="alert alert-light shadow-sm" role="alert">
                <span class="mb-3">Hello {{ auth()->user()->name }}, {{ $notification['data']['message'] }}

                    @if (isset($notification['data']['quantity']))
                        {{ $notification['data']['quantity'] }}
                    @endif

                    @if (isset($notification['data']['product']))
                        {{ $notification['data']['product'] }}
                    @elseif(isset($notification['data']['name']))
                        {{ $notification['data']['name'] }}
                    @endif
                </span>
                <br>
                <br>
                <div class="text-end text-secondary">
                    <span>{{ $notification['created_at']->diffForHumans() }}</span>
                </div>
            </div>
        @empty
            <p class="text-secondary text-center text-sm">No Notifications Found</p>
        @endforelse

    </div>
</div>
