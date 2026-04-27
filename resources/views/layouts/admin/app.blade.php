<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #1f2937;
            color: #fff;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar a:hover {
            background: #374151;
            color: #fff;
            border-left: 3px solid #3b82f6;
        }

        .sidebar a.active {
            background: #374151;
            color: #fff;
            border-left: 3px solid #3b82f6;
        }

        .sidebar-footer {
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 15px;
        }

        .sidebar i {
            width: 20px;
            text-align: center;
        }

        /* CONTENT */
        .navbar {
            margin-left: 250px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border-radius: 10px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .navbar,
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        {{-- HEADER --}}
        <div class="sidebar-header">
            <h5 class="fw-bold mb-0">ADMIN PANEL</h5>
            <small class="text-muted">Rumah Sakit</small>
        </div>

        {{-- MENU --}}
        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>

        <a href="{{ route('poli.index') }}"
           class="{{ request()->routeIs('poli.*') ? 'active' : '' }}">
            <i class="fas fa-hospital"></i> Poli
        </a>

        <a href="{{ route('dokter.index') }}#">
            <i class="fas fa-user-md"></i> Dokter
        </a>

        <a href="{{ route('antrian.index') }}#">
            <i class="fas fa-list"></i> Antrian
        </a>


    </div>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">

        {{-- Judul kiri --}}
        <span class="navbar-brand">Dashboard Admin</span>

        {{-- KANAN --}}
        <div class="ms-auto d-flex align-items-center">

            {{-- Dropdown User --}}
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">

                    <i class="fas fa-user-circle me-2"></i>
                    {{ Auth::user()->name }}
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="fas fa-user me-2"></i> Profil
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>

    {{-- CONTENT --}}
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>