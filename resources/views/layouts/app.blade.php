<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Application')</title>

    {{-- CSS --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />
    @stack('styles')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f0e6;
            color: #5a4631;
        }

        .navbar {
            background-color: #d2b48c !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 1px;
            color: #8b4513 !important;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.8);
        }

        .navbar-brand i {
            font-size: 1.8rem;
        }

        .nav-link {
            font-weight: 600;
            color: #5a4631 !important;
            transition: color 0.3s ease;
            text-shadow: 0 0 1px rgba(255,255,255,0.5);
        }

        .nav-link:hover, .nav-link.active {
            color: #3e2f1c !important;
            text-shadow: 0 0 3px rgba(255,255,255,0.8);
        }

        .sidebar {
            background-color: #f5f5dc;
            color: #5a4631;
            height: 100vh;
            box-shadow: 2px 0 12px rgba(0,0,0,0.1);
            border-right: 2px solid #d2b48c;
        }

        .sidebar .nav-link {
            color: #5a4631;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 10px;
            transition: background-color 0.3s ease;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #d2b48c;
            color: #8b4513;
        }

        main {
            background: #fff8e1;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border: 1px solid #d2b48c;
        }

        .btn-primary {
            background-color: #a67c52;
            border: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            color: white;
        }

        .btn-primary:hover {
            background-color: #8b5e3c;
        }

        .btn-outline-primary {
            color: #a67c52;
            border-color: #a67c52;
        }

        .btn-outline-primary:hover {
            background-color: #a67c52;
            color: white;
        }

        .btn-outline-success {
            color: #a3b18a;
            border-color: #a3b18a;
        }

        .btn-outline-success:hover {
            background-color: #a3b18a;
            color: white;
        }

        .btn-outline-info {
            color: #8b7d6b;
            border-color: #8b7d6b;
        }

        .btn-outline-info:hover {
            background-color: #8b7d6b;
            color: white;
        }

        .btn-outline-secondary {
            color: #c49e6c;
            border-color: #c49e6c;
        }

        .btn-outline-secondary:hover {
            background-color: #c49e6c;
            color: white;
        }

        .card {
            border-radius: 16px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #fff8e1;
            border: 1px solid #d2b48c;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .card-header {
            background-color: #d2b48c;
            color: #8b4513;
            font-weight: 700;
            border-radius: 16px 16px 0 0;
            font-size: 1.25rem;
        }

        .btn-group .btn {
            border-radius: 12px;
            margin-right: 0.5rem;
            font-weight: 600;
        }

        .btn-group .btn:last-child {
            margin-right: 0;
        }

        .display-4 {
            font-size: 3rem;
            color: #d2b48c;
        }

        .lead {
            font-weight: 600;
            color: #8b7d6b;
        }

        .text-primary {
            color: #a67c52 !important;
        }

        .text-muted {
            color: #8b7d6b !important;
        }

        .badge {
            border-radius: 12px;
            font-weight: 600;
        }

        .badge.bg-success {
            background-color: #a3b18a;
            color: #5a4631;
        }

        .badge.bg-warning {
            background-color: #d2b48c;
            color: #8b4513;
        }

        .badge.bg-info {
            background-color: #8b7d6b;
            color: #5a4631;
        }

        .btn-close {
            filter: invert(0.6);
        }

        .table {
            background-color: white;
        }

        .table thead {
            background-color: #f5f5dc;
            color: #5a4631;
        }

        .table tbody tr:hover {
            background-color: #f0e6d2;
        }

        .form-control {
            border-color: #d2b48c;
            background-color: white;
        }

        .form-control:focus {
            border-color: #a67c52;
            box-shadow: 0 0 0 0.2rem rgba(166, 124, 82, 0.25);
        }

        .alert-success {
            background-color: #f0e68c;
            color: #8b4513;
            border-color: #d2b48c;
        }

        .dropdown-menu {
            background-color: #f5f5dc;
            border-color: #d2b48c;
        }

        .dropdown-item {
            color: #5a4631;
        }

        .dropdown-item:hover {
            background-color: #d2b48c;
            color: #8b4513;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-lg sticky-top shadow" style="background-color: #d2b48c;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="color: #8b4513;">
                <i class="bi bi-shop me-2"></i>My Resto
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" style="border-color: #8b4513;">
                <span class="navbar-toggler-icon" style="filter: invert(0.4);"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}" style="color: #5a4631;">
                            <i class="bi bi-house-door me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('menu*') ? 'active' : '' }}" href="{{ route('menu.index') }}" style="color: #5a4631;">
                            <i class="bi bi-menu-button-wide me-1"></i>🍔 Menu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('order*') ? 'active' : '' }}" href="{{ route('order.index') }}" style="color: #5a4631;">
                            <i class="bi bi-receipt me-1"></i>🧾 Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}" style="color: #5a4631;">
                            <i class="bi bi-people me-1"></i>🙋 Customers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}" href="{{ route('suppliers.index') }}" style="color: #5a4631;">
                            <i class="bi bi-truck me-1"></i>Supplier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('hasilpenjualan*') ? 'active' : '' }}" href="{{ url('/hasilpenjualan') }}" style="color: #5a4631;">
                            <i class="bi bi-bar-chart-line me-1"></i>Hasil Penjualan
                        </a>
                    </li>
                </ul>

                <div class="d-flex">
                    <div class="input-group me-2" style="max-width: 300px;">
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search" style="border-color: #d2b48c;">
                        <button class="btn" type="button" style="background-color: #a67c52; color: white; border-color: #a67c52;">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>

                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" style="background-color: #a67c52; color: white; border-color: #a67c52;">
                            <i class="bi bi-person-circle me-1"></i>Admin
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="background-color: #f5f5dc; border-color: #d2b48c;">
                            <li><a class="dropdown-item" href="#" style="color: #5a4631;">Profile</a></li>
                            <li><a class="dropdown-item" href="#" style="color: #5a4631;">Settings</a></li>
                            <li><hr class="dropdown-divider" style="border-color: #d2b48c;"></li>
                            <li><a class="dropdown-item" href="#" style="color: #5a4631;">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar (Optional - can be used for additional tools or reports) --}}
            <nav class="sidebar col-md-3 col-lg-2 d-md-block bg-body-tertiary p-0 border-end">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                                <i class="bi bi-house-door-fill"></i> Dashboard Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-graph-up"></i> Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-file-earmark-text"></i> Documents
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i> Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- Main Content --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center
                    pt-3 pb-2 mb-3 border-bottom"
                >
                    <h1 class="h2">@yield('title')</h1>
                </div>

                {{-- Konten dinamis --}}
                @yield('content')
            </main>
        </div>
    </div>

    {{-- JS --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>
