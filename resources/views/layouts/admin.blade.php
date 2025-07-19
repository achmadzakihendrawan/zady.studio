<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | ZADY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .sidebar-link {
            @apply flex items-center px-4 py-2 rounded-md transition hover:bg-gray-100 text-gray-700;
        }

        .sidebar-link-active {
            @apply bg-gray-200 font-semibold;
        }

        .logout-btn {
            @apply text-red-600 hover:underline;
        }

        .admin-shadow {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-dark text-white d-flex flex-column shadow">
    <div class="p-4 border-bottom border-secondary">
        <div class="fw-bold fs-5">
            <i class="bi bi-shield-lock me-2"></i> ZADY Admin
        </div>
    </div>
    <nav class="nav flex-column p-3 gap-2">
        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white px-3 py-2 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-secondary' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
        <a href="{{ route('admin.produk.index') }}" class="nav-link text-white px-3 py-2 rounded {{ request()->routeIs('produk.*') ? 'bg-secondary' : '' }}">
            <i class="bi bi-box me-2"></i> Produk
        </a>
 <a href="{{ route('admin.custom_orders') }}" class="nav-link text-white px-3 py-2 rounded {{ request()->routeIs('produk.*') ? 'bg-secondary' : '' }}">
            <i class="bi bi-box me-2"></i> Pesanan custom
        </a>
        <a href="/" class="nav-link text-white px-3 py-2 rounded">
            <i class="bi bi-globe me-2"></i> Lihat Website
        </a>
    </nav>
</aside>


        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            {{-- Navbar --}}
            <header class="bg-white border-b p-4 flex justify-between items-center admin-shadow">
                <div class="text-xl font-semibold text-gray-700">
                    <i class="bi bi-gear-fill text-blue-600 me-2"></i> Panel Admin
                </div>

                {{-- Logout --}}
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
                @endauth
            </header>

            {{-- Page Content --}}
            <main class="p-6 overflow-auto">
                @yield('content')
            </main>
        </div>

    </div>
</body>
</html>
