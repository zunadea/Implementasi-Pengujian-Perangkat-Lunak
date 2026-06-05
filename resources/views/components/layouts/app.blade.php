<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rebox | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        :root {
            --rebox-primary: #024d36;
            --rebox-secondary: #036b4b;
            --rebox-accent: #2ecc71;
<<<<<<< HEAD
=======
            --rebox-soft: rgba(255, 255, 255, 0.10);
>>>>>>> zunadeafiturv1
            --rebox-soft-hover: rgba(255, 255, 255, 0.16);
            --bg-body: #f4f7f6;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            margin: 0;
        }

        .dropdown-toggle::after { display: none !important; }

<<<<<<< HEAD
=======
        /* NAVBAR AREA */
>>>>>>> zunadeafiturv1
        .rebox-navbar-area {
            background: var(--bg-body);
            padding: 14px 18px 0;
            position: sticky;
            top: 0;
<<<<<<< HEAD
            z-index: 9999;
        }

=======
            z-index: 999;
        }

        /* NAVBAR */
>>>>>>> zunadeafiturv1
        .rebox-navbar {
            min-height: 74px;
            background: linear-gradient(135deg, #024d36 0%, #035d41 100%);
            border-radius: 0 0 26px 26px;
            padding: 0 34px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 12px 28px rgba(2, 77, 54, 0.22);
<<<<<<< HEAD
            position: relative;
            z-index: 10000;
        }

=======
        }

        /* BRAND */
>>>>>>> zunadeafiturv1
        .brand-rebox {
            color: #ffffff;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: -0.7px;
            text-decoration: none;
            margin-right: 40px;
            white-space: nowrap;
        }

        .brand-rebox span { color: var(--rebox-accent); }
        .brand-rebox:hover { color: #ffffff; text-decoration: none; }

<<<<<<< HEAD
=======
        /* LEFT MENU */
>>>>>>> zunadeafiturv1
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .rebox-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .rebox-menu .nav-link {
            color: rgba(255, 255, 255, 0.78);
            font-size: 15px;
            font-weight: 700;
            padding: 13px 22px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.25s ease;
            text-decoration: none;
        }

<<<<<<< HEAD
        .rebox-menu .nav-link i {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.70);
        }
=======
        .rebox-menu .nav-link i { font-size: 16px; color: rgba(255, 255, 255, 0.70); }
>>>>>>> zunadeafiturv1

        .rebox-menu .nav-link:hover,
        .rebox-menu .nav-link.active {
            background: var(--rebox-soft-hover);
            color: #ffffff;
        }

        .rebox-menu .nav-link:hover i,
<<<<<<< HEAD
        .rebox-menu .nav-link.active i {
            color: #ffffff;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-dropdown-wrap {
            position: relative;
            z-index: 10001;
        }

        .user-dropdown-btn {
            border: 1px solid rgba(255, 255, 255, 0.14);
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff;
            border-radius: 999px;
            padding: 8px 15px 8px 8px;
            display: flex;
            align-items: center;
            gap: 13px;
            min-width: 240px;
            cursor: pointer;
            transition: 0.25s ease;
            position: relative;
            z-index: 10002;
        }

        .user-dropdown-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-1px);
        }

        .user-dropdown-btn:active {
            transform: scale(0.97);
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(46, 204, 113, 0.75);
            background: #ffffff;
            flex-shrink: 0;
        }

        .user-info {
            text-align: left;
            line-height: 1.2;
            flex: 1;
            overflow: hidden;
        }

        .user-name {
            display: block;
            font-size: 14px;
            font-weight: 800;
            color: #ffffff;
            white-space: nowrap;
            max-width: 145px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            display: block;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.4px;
            color: var(--rebox-accent);
            text-transform: uppercase;
            margin-top: 4px;
        }

        .dropdown-arrow {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.9);
            transition: 0.25s ease;
        }

        .user-dropdown-wrap.show .dropdown-arrow {
            transform: rotate(180deg);
        }

        .rebox-dropdown-menu {
            position: absolute !important;
            top: 64px !important;
            right: 0 !important;
            left: auto !important;
            transform: none !important;
            min-width: 285px;
            border: none;
            border-radius: 24px;
            padding: 16px;
            margin-top: 0;
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(18px);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.18);
            z-index: 10003;
            display: block;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform-origin: top right;
            animation: none;
            transition: opacity 0.22s ease, visibility 0.22s ease;
        }

        .user-dropdown-wrap.show .rebox-dropdown-menu {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            animation: dropdownPop 0.24s ease forwards;
        }

        @keyframes dropdownPop {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .dropdown-header-box {
            padding: 10px 12px 14px;
            border-bottom: 1px solid #eef2f1;
            margin-bottom: 10px;
        }

        .dropdown-name {
            font-size: 15px;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .dropdown-role {
            font-size: 11px;
            font-weight: 900;
            color: #00a85a;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .rebox-dropdown-menu .dropdown-item {
            width: 100%;
            min-height: 52px;
            border-radius: 16px;
            padding: 14px 14px;
            font-size: 15px;
            font-weight: 800;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: 0.2s ease;
            text-decoration: none;
            cursor: pointer;
        }

        .rebox-dropdown-menu .dropdown-item i {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .rebox-dropdown-menu .dropdown-item:hover {
            background: #e9f8ef;
            color: var(--rebox-primary);
            transform: translateX(4px);
        }

        .rebox-dropdown-menu .dropdown-item:active {
            transform: scale(0.97);
        }

        .logout-item {
            color: #dc2626 !important;
        }

        .logout-item:hover {
            background: #fee2e2 !important;
            color: #b91c1c !important;
        }

        .content-wrapper {
            background: transparent !important;
            min-height: 100vh;
        }

        @media (max-width: 992px) {
            .rebox-navbar {
                padding: 18px;
                flex-direction: column;
                align-items: stretch;
                gap: 16px;
                border-radius: 0 0 22px 22px;
            }

            .navbar-left {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .rebox-menu {
                flex-wrap: wrap;
                gap: 8px;
            }

            .rebox-menu .nav-link {
                padding: 11px 15px;
                font-size: 13px;
            }

            .navbar-right {
                justify-content: flex-start;
            }

            .user-dropdown-btn {
                width: 100%;
                min-width: 0;
            }

            .rebox-dropdown-menu {
                left: 0 !important;
                right: auto !important;
                width: 100%;
                min-width: 100%;
            }
=======
        .rebox-menu .nav-link.active i { color: #ffffff; }

        /* RIGHT USER */
        .navbar-right { display: flex; align-items: center; gap: 16px; }

        .user-dropdown-wrap { position: relative; }

        .user-dropdown-btn {
            border: 1px solid rgba(255, 255, 255, 0.12);
            background: rgba(255, 255, 255, 0.07);
            color: #ffffff;
            border-radius: 999px;
            padding: 7px 13px 7px 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 230px;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .user-dropdown-btn:hover { background: rgba(255, 255, 255, 0.13); }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgba(46, 204, 113, 0.65);
            background: #ffffff;
        }

        .user-info { text-align: left; line-height: 1.15; flex: 1; }

        .user-name {
            display: block; font-size: 14px; font-weight: 800; color: #ffffff;
            white-space: nowrap; max-width: 135px; overflow: hidden; text-overflow: ellipsis;
        }

        .user-role {
            display: block; font-size: 10px; font-weight: 900; letter-spacing: 1.2px;
            color: var(--rebox-accent); text-transform: uppercase; margin-top: 3px;
        }

        .dropdown-arrow { font-size: 13px; color: rgba(255, 255, 255, 0.85); transition: 0.25s ease; }
        .show .dropdown-arrow { transform: rotate(180deg); }

        /* DROPDOWN */
        .rebox-dropdown-menu {
            border: none; border-radius: 18px; padding: 10px; margin-top: 12px;
            min-width: 230px; box-shadow: 0 18px 38px rgba(15, 23, 42, 0.18); overflow: hidden;
        }

        .rebox-dropdown-menu .dropdown-header-box {
            padding: 12px 12px 10px; border-bottom: 1px solid #eef2f1; margin-bottom: 8px;
        }

        .dropdown-header-box .dropdown-name { font-size: 14px; font-weight: 800; color: #1f2937; margin-bottom: 3px; }
        .dropdown-header-box .dropdown-role { font-size: 11px; font-weight: 800; color: #00a85a; text-transform: uppercase; letter-spacing: 0.8px; }

        .rebox-dropdown-menu .dropdown-item {
            border-radius: 12px; padding: 11px 12px; font-size: 14px; font-weight: 700;
            color: #374151; display: flex; align-items: center; gap: 10px; transition: 0.2s ease; text-decoration: none;
        }

        .rebox-dropdown-menu .dropdown-item:hover { background: #e9f8ef; color: var(--rebox-primary); }

        .logout-item { color: #dc2626 !important; }
        .logout-item:hover { background: #fee2e2 !important; color: #b91c1c !important; }

        .content-wrapper { background: transparent !important; min-height: 100vh; }

        @media (max-width: 992px) {
            .rebox-navbar { padding: 18px; flex-direction: column; align-items: stretch; gap: 16px; border-radius: 0 0 22px 22px; }
            .navbar-left { flex-direction: column; align-items: flex-start; gap: 14px; }
            .rebox-menu { flex-wrap: wrap; gap: 8px; }
            .rebox-menu .nav-link { padding: 11px 15px; font-size: 13px; }
            .navbar-right { justify-content: flex-start; }
            .user-dropdown-btn { width: 100%; min-width: 0; }
>>>>>>> zunadeafiturv1
        }
    </style>

    @livewireStyles
</head>

<body class="hold-transition layout-top-nav">

<div class="wrapper">

    @auth
    <div class="rebox-navbar-area">
        <nav class="rebox-navbar">

            <div class="navbar-left">
                <a href="/dashboard" class="brand-rebox">
                    Re<span>box</span>
                </a>

                <ul class="rebox-menu">
<<<<<<< HEAD
=======
                    {{-- Menu Utama: Dashboard Donasi --}}
>>>>>>> zunadeafiturv1
                    <li>
                        <a href="/dashboard" wire:navigate
                           class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-border-all"></i>
                            Donasi
                        </a>
                    </li>

<<<<<<< HEAD
=======
                    {{-- MENU KHUSUS PENERIMA --}}
>>>>>>> zunadeafiturv1
                    @if(auth()->user()->role === 'penerima')
                    <li>
                        <a href="/permintaan" wire:navigate
                           class="nav-link {{ request()->is('permintaan*') ? 'active' : '' }}">
                            <i class="fas fa-basket-shopping"></i>
                            Minta Barang
                        </a>
                    </li>
<<<<<<< HEAD

=======
>>>>>>> zunadeafiturv1
                    <li>
                        <a href="/riwayat" wire:navigate
                           class="nav-link {{ request()->is('riwayat') ? 'active' : '' }}">
                            <i class="fas fa-clock-rotate-left"></i>
                            Riwayat Saya
                        </a>
                    </li>
                    @endif

<<<<<<< HEAD
=======
                    {{-- MENU KHUSUS DONATUR --}}
>>>>>>> zunadeafiturv1
                    @if(auth()->user()->role === 'donatur')
                    <li>
                        <a href="/riwayat-permintaan" wire:navigate
                           class="nav-link {{ request()->is('riwayat-permintaan*') ? 'active' : '' }}">
                            <i class="fas fa-hand-holding-heart"></i>
                            Daftar Kebutuhan
                        </a>
                    </li>
                    @endif

                    <li>
                        <a href="/profile" wire:navigate
                           class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                            <i class="fas fa-user-gear"></i>
                            Profile
                        </a>
                    </li>
                </ul>
            </div>

            <div class="navbar-right">
<<<<<<< HEAD
                <div class="dropdown user-dropdown-wrap" id="reboxUserDropdown">
                    <button class="user-dropdown-btn"
                            type="button"
                            id="userDropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
=======
                <div class="dropdown user-dropdown-wrap">
                    <button class="user-dropdown-btn dropdown-toggle"
                            type="button" id="userDropdown" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false">
>>>>>>> zunadeafiturv1

                        @if(auth()->user()->profile_photo)
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" class="user-avatar" alt="User">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2ecc71&color=fff&bold=true"
                                 class="user-avatar" alt="User">
                        @endif

                        <span class="user-info">
                            <span class="user-name">{{ auth()->user()->name }}</span>
                            <span class="user-role">{{ auth()->user()->role }}</span>
                        </span>

                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </button>

                    <div class="dropdown-menu dropdown-menu-right rebox-dropdown-menu" aria-labelledby="userDropdown">
                        <div class="dropdown-header-box">
                            <div class="dropdown-name">{{ auth()->user()->name }}</div>
                            <div class="dropdown-role">{{ auth()->user()->role }}</div>
                        </div>

                        <a href="/profile" wire:navigate class="dropdown-item">
<<<<<<< HEAD
                            <i class="fas fa-user"></i>
                            <span>Lihat Profile</span>
                        </a>

                        @if(auth()->user()->role === 'penerima')
                            <a href="/riwayat" wire:navigate class="dropdown-item">
                                <i class="fas fa-clock-rotate-left"></i>
                                <span>Riwayat Permintaan</span>
                            </a>
                        @else
                            <a href="/riwayat-permintaan" wire:navigate class="dropdown-item">
                                <i class="fas fa-heart"></i>
                                <span>Kontribusi Donasi</span>
                            </a>
                        @endif

                        <a href="{{ route('logout') }}" class="dropdown-item logout-item">
                            <i class="fas fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
=======
                            <i class="fas fa-user"></i> Lihat Profile
                        </a>

                        @if(auth()->user()->role === 'penerima')
                        <a href="/riwayat" wire:navigate class="dropdown-item">
                            <i class="fas fa-clock-rotate-left"></i> Riwayat Permintaan
                        </a>
                        @else
                        <a href="/riwayat-permintaan" wire:navigate class="dropdown-item">
                            <i class="fas fa-heart"></i> Kontribusi Donasi
                        </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item logout-item" style="width: 100%; border: 0; text-align: left;">
                                <i class="fas fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
>>>>>>> zunadeafiturv1
                    </div>
                </div>
            </div>

        </nav>
    </div>
    @endauth

<<<<<<< HEAD
    <div class="content-wrapper">
        <div class="content pt-4">
            <div class="container-fluid">
=======
    {{-- CONTENT --}}
    <div class="content-wrapper">
        <div class="content pt-4">
            <div class="container-fluid">
                @auth
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert" style="border-radius: 14px; background-color: #eefbf2; border-color: #d7f2df; color: #14532d;">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @endauth

>>>>>>> zunadeafiturv1
                {{ $slot }}
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@livewireScripts

<<<<<<< HEAD
<script>
    function initReboxDropdown() {
        const wrapper = document.getElementById('reboxUserDropdown');
        const button = document.getElementById('userDropdown');

        if (!wrapper || !button) return;

        button.onclick = function (e) {
            e.preventDefault();
            e.stopPropagation();

            const isOpen = wrapper.classList.contains('show');

            document.querySelectorAll('.user-dropdown-wrap.show').forEach(function (item) {
                item.classList.remove('show');
                const btn = item.querySelector('.user-dropdown-btn');
                if (btn) btn.setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                wrapper.classList.add('show');
                button.setAttribute('aria-expanded', 'true');
            }
        };

        document.addEventListener('click', function (e) {
            if (!wrapper.contains(e.target)) {
                wrapper.classList.remove('show');
                button.setAttribute('aria-expanded', 'false');
            }
        });

        document.querySelectorAll('.rebox-dropdown-menu .dropdown-item').forEach(function (item) {
            item.addEventListener('click', function () {
                item.style.transform = 'scale(0.96)';
                setTimeout(function () {
                    item.style.transform = '';
                }, 120);
            });
        });
    }

    document.addEventListener('DOMContentLoaded', initReboxDropdown);
    document.addEventListener('livewire:navigated', initReboxDropdown);
</script>

</body>
</html>
=======
</body>
</html>
>>>>>>> zunadeafiturv1
