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

    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #000;
            padding-top: 20px;
            transition: transform 0.3s ease;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-logo {
            color: #000;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul.nav {
            margin-top: 30px;
        }

        .sidebar .nav-link {
            color: #000;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #2c3036;
            color: #fff;
        }

        .sidebar .nav-link.active {
            background-color: #2c3036;
            color: #fff;
        }

        .sidebar .logout-btn {
            margin-top: 15rem;
        }

        .content {
            margin-left: 0;
            padding: 20px;
            transition: margin 0.3s ease;
        }

        .header {
            background-color: #f8f9fa;
            padding: 20px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin-bottom: 0;
        }

        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0);
            }

            .content {
                margin-left: 250px;
            }
        }

        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(0);
            }

            .content {
                margin-left: 0px;
            }
        }
    </style>
</head>

<body class="bg-light">

    <div class="d-flex">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" data-bs-scroll="true">
            <div class="offcanvas-header">
                <h3 class="offcanvas-title">Foody<span class="text-light">Me</span></h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/clients">
                            <i class="bi bi-person"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-clipboard-check"></i> Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-list-task"></i> Tasks
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
            <h3 class="sidebar-logo">Foody<span class="text-light">Me</span></h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person"></i> Users
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-person-lines-fill"></i> Clients
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-clipboard-check"></i> Project
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-list-task"></i> Tasks
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

        <div class="content">

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

            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                Projects</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet,
                                consectetur adipiscing
                                elit. Nullam at
                                risus
                                justo.</p>
                            <a href="#" class="btn btn-warning">Create Project
                                <i class="bi bi-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title placeholder-glow">Tasks</h5>
                            <p class="card-text placeholder-glow">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Nullam at
                                risus
                                justo.</p>
                            <a href="#" class="btn btn-warning">View Tasks
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">View Clients</h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>VAT</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <a href="#" class="btn btn-warning">View All Clients
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer mt-4 text-center">
                <p>Copyright &copy; <span class="text-primary">CRM</span> Panel Inc. </p>
            </div>
        </div>
    </div>

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
