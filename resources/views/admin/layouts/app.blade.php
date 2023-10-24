<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../main.css">
</head>

<body class="bg-light">

    <div class="d-flex">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" data-bs-scroll="true">
            <div class="offcanvas-header">
                <h3 class="offcanvas-title"><a href="{{ route('home') }}"
                        class="text-decoration-none text-dark">Foody<span class="text-light">Me</span></a>
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link
                    " href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.customers.index') }}">
                            <i class="bi bi-person"></i> Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products') }}">
                            <i class="bi bi-bag"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.orders') }}">
                            <i class="bi bi-clipboard-check"></i> Orders
                        </a>
                    </li>
                </ul>
                <div class="p-2 mt-5">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn btn btn-primary col-12">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="sidebar bg-warning text-dark d-none d-lg-block">
            <h3 class="sidebar-logo"><a href="{{ route('home') }}" class="text-decoration-none text-dark">Foody<span
                        class="text-light">Me</span></a></h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link
                    " href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.customers.index') }}">
                        <i class="bi bi-person"></i> Customers
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products') }}">
                        <i class="bi bi-bag"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders') }}">
                        <i class="bi bi-clipboard-check"></i> Orders
                    </a>
                </li>
            </ul>
            <div class="p-2">

                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn btn btn-dark col-12">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>


        <div class="content" style="width: 100%">
            <div class="d-flex align-items-center justify-content-between">
                <div class="header d-lg-block d-flex align-items-center">
                    <button class="d-lg-none btn btn-outline-dark me-4" data-bs-toggle="offcanvas"
                        data-bs-target="#sidebar">
                        <i class="bi bi-list"></i>
                    </button>
                    <h1>Welcome Admin</h1>
                </div>
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-warning rounded-circle shadow-sm">
                        <i class="bi bi-person-fill"></i>
                    </a>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <footer class="footer mt-4 text-center">
        <p>Copyright &copy; Foody<span class="text-warning">Me</span> Inc. </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/bootstrap-icons.min.js"></script>
    <script>
        const sidebar = document.querySelector('.sidebar');
        const collapseIcon = document.querySelector('.collapse-icon');

        collapseIcon.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
        });
    </script>

</body>

</html>
