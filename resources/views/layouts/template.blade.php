<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            width: 250px;
            transition: width 0.3s ease;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px 25px;
            font-size: 16px;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            padding-left: 30px;
        }

        .sidebar a.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background-color: #343a40;
        }

        .dropdown-menu a {
            color: white;
        }

        .dropdown-menu a:hover {
            background-color: #495057;
        }

        /* Button Logout */
        .btn-logout {
            background-color: #dc3545;
            color: white;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                width: 0;
                position: fixed;
            }

            .content {
                margin-left: 0;
            }

            .sidebar.active {
                width: 250px;
            }

            .content.active {
                margin-left: 250px;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class="sidebar" id="sidebar">
            <h4 class="text-center text-white mb-4">Admin Dashboard</h4>
            <a href="/admin/dashboard" class="active"><i class="fas fa-home"></i> Dashboard</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-database"></i> Data
                    Master</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/admin/fakultas">Manajemen Fakultas</a>
                    <a class="dropdown-item" href="/admin/prodi">Manajemen Program Studi</a>
                    <a class="dropdown-item" href="/admin/dosen">Manajemen Dosen</a>
                    <a class="dropdown-item" href="/admin/mahasiswa">Manajemen Mahasiswa</a>
                    <a class="dropdown-item" href="/admin/skripsi">Manajemen Skripsi</a>
                </div>
            </div>
            <a href="/admin/skripsi/allskripsi"><i class="fas fa-book"></i> All Skripsi</a>
            <a href="/admin/akun"><i class="fas fa-users"></i> Manajemen Akun</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 10px 20px;">
                @csrf
                <button type="submit" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>

        <div class="content w-100" id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Sistem Pengarsipan >
                        <span class="text-muted fs-6">@yield('title')</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" id="toggle-sidebar">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        // Toggle Sidebar on small screens
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleSidebar = document.getElementById('toggle-sidebar');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        });
    </script>
</body>

</html>
