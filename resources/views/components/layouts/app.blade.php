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
            --rebox-soft: rgba(255, 255, 255, 0.10);
            --rebox-soft-hover: rgba(255, 255, 255, 0.16);
            --bg-body: #f4f7f6;
        }

        * { box-sizing: border-box; }

        @media (min-width: 1025px) {
            html {
                overflow-y: scroll;
                scrollbar-gutter: stable;
            }
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-body);
            margin: 0;
        }

        .dropdown-toggle::after { display: none !important; }

        /* NAVBAR AREA */
        .rebox-navbar-area {
            background: var(--bg-body);
            padding: 14px 18px 0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* NAVBAR */
        .rebox-navbar {
            min-height: 74px;
            background: linear-gradient(135deg, #024d36 0%, #035d41 100%);
            border-radius: 0 0 26px 26px;
            padding: 0 34px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 12px 28px rgba(2, 77, 54, 0.22);
        }

        /* BRAND */
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

        /* LEFT MENU */
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

        .rebox-menu .nav-link i { font-size: 16px; color: rgba(255, 255, 255, 0.70); }

        .rebox-menu .nav-link:hover,
        .rebox-menu .nav-link.active {
            background: var(--rebox-soft-hover);
            color: #ffffff;
        }

        .rebox-menu .nav-link:hover i,
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

        .profile-pill.rebox-profile-identity-pill {
            width: 250px !important;
            max-width: none !important;
            min-height: 64px !important;
            height: auto !important;
            justify-content: flex-start !important;
            gap: 12px !important;
            padding: 7px 16px 7px 8px !important;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, .24) !important;
            border-radius: 999px !important;
            background: #46ad49 !important;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, .28),
                0 14px 30px rgba(0, 80, 20, .16) !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        .profile-pill.rebox-profile-identity-pill:hover,
        .profile-dropdown.is-open .profile-pill.rebox-profile-identity-pill {
            background: #3d9f41 !important;
        }

        .profile-pill.rebox-profile-identity-pill::after {
            content: '';
            position: absolute;
            z-index: -1;
            top: 2px;
            right: 14%;
            left: 14%;
            height: 36%;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(255, 255, 255, .28), transparent);
            opacity: .58;
            filter: blur(5px);
            pointer-events: none;
        }

        .rebox-profile-identity-pill .profile-identity {
            min-width: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 3px;
            line-height: 1.05;
            text-align: left;
        }

        .rebox-profile-identity-pill .profile-name {
            width: 100%;
            overflow: hidden;
            color: #ffffff;
            font-size: 14px;
            font-weight: 750;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .rebox-profile-identity-pill .profile-role {
            color: rgba(255, 255, 255, .78);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0;
            text-transform: capitalize;
        }

        .rebox-profile-identity-pill .profile-caret {
            width: 18px !important;
            height: 18px !important;
            flex: 0 0 18px;
        }

        .rebox-profile-identity-pill .profile-caret::before {
            width: 16px !important;
            height: 13px !important;
            background: #ffffff !important;
        }

        @media (max-width: 992px) {
            .rebox-navbar { padding: 18px; flex-direction: column; align-items: stretch; gap: 16px; border-radius: 0 0 22px 22px; }
            .navbar-left { flex-direction: column; align-items: flex-start; gap: 14px; }
            .rebox-menu { flex-wrap: wrap; gap: 8px; }
            .rebox-menu .nav-link { padding: 11px 15px; font-size: 13px; }
            .navbar-right { justify-content: flex-start; }
            .user-dropdown-btn { width: 100%; min-width: 0; }
        }

        .rebox-mobile-menu-toggle {
            display: none;
        }

        @media (max-width: 1024px) {
            html,
            body {
                max-width: 100%;
                overflow-x: hidden;
            }

            .top-shell:not(.rebox-menu-ready) {
                min-height: 64px !important;
                visibility: hidden !important;
                opacity: 0 !important;
                pointer-events: none !important;
            }

            body.rebox-mobile-menu-active {
                overflow: hidden;
            }

            .top-shell.rebox-menu-ready > .profile-dropdown {
                width: 59px !important;
            }

            .top-shell.rebox-menu-ready > .profile-dropdown .profile-pill.rebox-profile-identity-pill {
                width: 59px !important;
                max-width: 59px !important;
                height: 59px !important;
                min-height: 59px !important;
                justify-content: center !important;
                gap: 0 !important;
                padding: 3px !important;
                border-radius: 50% !important;
                margin: 0 !important;
            }

            .top-shell.rebox-menu-ready > .profile-dropdown .profile-identity,
            .top-shell.rebox-menu-ready > .profile-dropdown .profile-caret {
                display: none !important;
            }

            .rebox-profile-identity-pill img,
            .rebox-profile-identity-pill .profile-avatar-fallback {
                width: 53px !important;
                height: 53px !important;
                flex: 0 0 53px;
            }

            .rebox-profile-identity-pill .profile-name {
                font-size: 12px;
            }

            .top-shell.rebox-menu-ready {
                position: relative;
                left: calc(50% - 50vw + 28px) !important;
                width: calc(100vw - 56px) !important;
                max-width: calc(100vw - 56px) !important;
                min-width: 0 !important;
                min-height: 64px !important;
                display: grid !important;
                grid-template-columns: 48px minmax(0, 1fr) !important;
                align-items: center !important;
                gap: 16px !important;
                margin-left: 0 !important;
                margin-right: 0 !important;
                transform: none !important;
                filter: none !important;
            }

            .request-page > .top-shell.rebox-menu-ready,
            .riwayat-inner > .top-shell.rebox-menu-ready {
                top: 2px !important;
            }

            .profile-inner > .top-shell.rebox-menu-ready {
                top: 0 !important;
            }

            .top-shell.rebox-menu-ready.is-mobile-menu-open {
                z-index: 1200 !important;
            }

            .request-page > .top-shell.rebox-menu-ready.is-mobile-menu-closing {
                z-index: 1200 !important;
            }

            .top-shell.rebox-menu-ready > .rebox-mobile-menu-toggle {
                grid-column: 1;
                grid-row: 1;
                position: relative;
                left: 0 !important;
                top: 0 !important;
                z-index: 1102;
                width: 48px;
                height: 48px;
                display: inline-grid;
                place-items: center;
                justify-self: start;
                padding: 0;
                border: 1px solid rgba(255, 255, 255, .24);
                border-radius: 14px;
                color: #ffffff;
                background: rgba(0, 134, 0, .78);
                box-shadow: 0 12px 26px rgba(0, 80, 0, .16);
                cursor: pointer;
                transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
            }

            .top-shell.rebox-menu-ready > .rebox-mobile-menu-toggle:hover {
                background: #008600;
                transform: translateY(-1px);
                box-shadow: 0 16px 30px rgba(0, 80, 0, .20);
            }

            .top-shell.rebox-menu-ready > .rebox-mobile-menu-toggle:focus-visible {
                outline: 3px solid rgba(139, 209, 125, .52);
                outline-offset: 3px;
            }

            .top-shell.rebox-menu-ready > .rebox-mobile-menu-toggle i {
                font-size: 20px;
            }

            .top-shell.rebox-menu-ready.is-mobile-menu-open > .rebox-mobile-menu-toggle {
                position: fixed;
                top: 14px !important;
                left: 14px !important;
            }

            .top-shell.rebox-menu-ready > .top-nav {
                position: fixed !important;
                top: 0 !important;
                right: auto !important;
                bottom: 0 !important;
                left: 0 !important;
                z-index: 1100;
                width: min(82vw, 340px) !important;
                height: 100dvh !important;
                display: flex !important;
                flex-direction: column !important;
                align-items: stretch !important;
                justify-content: flex-start !important;
                gap: 8px !important;
                margin: 0 !important;
                padding: 86px 18px 24px !important;
                border: 0 !important;
                border-radius: 0 !important;
                background: #46ad49 !important;
                background-image: none !important;
                backdrop-filter: none !important;
                -webkit-backdrop-filter: none !important;
                overflow-x: hidden !important;
                overflow-y: auto !important;
                visibility: hidden;
                opacity: 0;
                pointer-events: none;
                transform: translateX(-105%);
                box-shadow: none !important;
                transition: transform .28s ease, opacity .22s ease, visibility .28s ease;
            }

            .top-shell.rebox-menu-ready.is-mobile-menu-open > .top-nav {
                visibility: visible;
                opacity: 1;
                pointer-events: auto;
                transform: translateX(0);
            }

            .top-shell.rebox-menu-ready > .top-nav a {
                width: 100% !important;
                min-width: 0 !important;
                min-height: 46px;
                height: auto !important;
                display: flex !important;
                align-items: center !important;
                justify-content: flex-start !important;
                padding: 12px 16px !important;
                text-align: left !important;
                white-space: normal;
            }

            .top-shell.rebox-menu-ready > .profile-dropdown,
            .top-shell.rebox-menu-ready > .auth-actions {
                grid-column: 2;
                grid-row: 1;
                min-width: 0;
                max-width: 100%;
                justify-self: end !important;
                margin: 0 !important;
            }

            img,
            video,
            canvas {
                max-width: 100%;
            }
        }

        @media (max-width: 640px) {
            .top-shell.rebox-menu-ready {
                grid-template-columns: 48px minmax(0, 1fr) !important;
                gap: 10px !important;
            }

            .top-shell.rebox-menu-ready > .auth-actions {
                width: auto !important;
                min-width: 0;
            }

            .top-shell.rebox-menu-ready > .auth-actions a,
            .top-shell.rebox-menu-ready > .auth-actions button {
                min-width: 0 !important;
                padding-inline: 14px !important;
            }

            .top-shell.rebox-menu-ready > .profile-dropdown {
                width: 54px !important;
            }

            .top-shell.rebox-menu-ready > .profile-dropdown .profile-pill.rebox-profile-identity-pill {
                width: 54px !important;
                max-width: 54px !important;
                min-height: 54px !important;
                height: 54px !important;
                gap: 0 !important;
                padding: 3px !important;
            }

            .rebox-profile-identity-pill img,
            .rebox-profile-identity-pill .profile-avatar-fallback {
                width: 48px !important;
                height: 48px !important;
                flex-basis: 48px;
            }

            .rebox-profile-identity-pill .profile-name {
                font-size: 11px;
            }

            .rebox-profile-identity-pill .profile-role {
                font-size: 9px;
            }

            .rebox-profile-identity-pill .profile-caret {
                width: 14px !important;
                height: 14px !important;
                flex-basis: 14px;
            }

            .rebox-profile-identity-pill .profile-caret::before {
                width: 13px !important;
                height: 10px !important;
            }

            .top-shell.rebox-menu-ready > .profile-dropdown .profile-menu {
                right: 0 !important;
                left: auto !important;
                max-width: calc(100vw - 28px);
            }

            .profile-inner > .top-shell.rebox-menu-ready {
                top: 6px !important;
            }
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
                    {{-- Menu Utama: Dashboard Donasi --}}
                    <li>
                        <a href="/dashboard" wire:navigate
                           class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-border-all"></i>
                            Donasi
                        </a>
                    </li>

                    {{-- MENU KHUSUS PENERIMA --}}
                    @if(auth()->user()->role === 'penerima')
                    <li>
                        <a href="/permintaan" wire:navigate
                           class="nav-link {{ request()->is('permintaan*') ? 'active' : '' }}">
                            <i class="fas fa-basket-shopping"></i>
                            Minta Barang
                        </a>
                    </li>
                    <li>
                        <a href="/riwayat" wire:navigate
                           class="nav-link {{ request()->is('riwayat') ? 'active' : '' }}">
                            <i class="fas fa-clock-rotate-left"></i>
                            Riwayat Saya
                        </a>
                    </li>
                    @endif

                    {{-- MENU KHUSUS DONATUR --}}
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
                <div class="dropdown user-dropdown-wrap">
                    <button class="user-dropdown-btn dropdown-toggle"
                            type="button" id="userDropdown" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false">

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
                    </div>
                </div>
            </div>

        </nav>
    </div>
    @endauth

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

                {{ $slot }}
            </div>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@livewireScripts

<script>
    (() => {
        if (window.reboxResponsiveNavigationReady) return;
        window.reboxResponsiveNavigationReady = true;

        const syncBodyMenuState = () => {
            document.body.classList.toggle(
                'rebox-mobile-menu-active',
                Boolean(document.querySelector(
                    '.top-shell.rebox-menu-ready.is-mobile-menu-open, .request-page > .top-shell.rebox-menu-ready.is-mobile-menu-closing'
                ))
            );
        };

        const closeMobileMenu = (shell) => {
            if (!shell) return;

            const isRequestMenu = shell.parentElement?.classList.contains('request-page');
            if (shell.reboxCloseTimer) {
                window.clearTimeout(shell.reboxCloseTimer);
                shell.reboxCloseTimer = null;
            }

            if (isRequestMenu && shell.classList.contains('is-mobile-menu-open')) {
                shell.classList.add('is-mobile-menu-closing');
            }

            shell.classList.remove('is-mobile-menu-open');
            const button = shell.querySelector(':scope > .rebox-mobile-menu-toggle');
            const icon = button?.querySelector('i');
            button?.setAttribute('aria-expanded', 'false');
            button?.setAttribute('aria-label', 'Buka menu navigasi');
            icon?.classList.remove('fa-xmark');
            icon?.classList.add('fa-bars');

            if (isRequestMenu && shell.classList.contains('is-mobile-menu-closing')) {
                shell.reboxCloseTimer = window.setTimeout(() => {
                    shell.classList.remove('is-mobile-menu-closing');
                    shell.reboxCloseTimer = null;
                    syncBodyMenuState();
                }, 300);
            }

            syncBodyMenuState();
        };

        const closeAllMobileMenus = (except = null) => {
            document.querySelectorAll('.top-shell.rebox-menu-ready.is-mobile-menu-open').forEach((shell) => {
                if (shell !== except) closeMobileMenu(shell);
            });
        };

        const openMobileMenu = (shell, button) => {
            closeAllMobileMenus(shell);
            if (shell.reboxCloseTimer) {
                window.clearTimeout(shell.reboxCloseTimer);
                shell.reboxCloseTimer = null;
            }
            shell.classList.remove('is-mobile-menu-closing');
            shell.classList.add('is-mobile-menu-open');
            button.setAttribute('aria-expanded', 'true');
            button.setAttribute('aria-label', 'Tutup menu navigasi');
            const icon = button.querySelector('i');
            icon?.classList.remove('fa-bars');
            icon?.classList.add('fa-xmark');
            syncBodyMenuState();
        };

        const initResponsiveNavigation = () => {
            document.querySelectorAll('.top-shell').forEach((shell, index) => {
                const nav = shell.querySelector(':scope > .top-nav');
                if (!nav) return;

                shell.classList.add('rebox-menu-ready');
                const navId = nav.id || `rebox-responsive-nav-${index}`;
                nav.id = navId;

                let button = shell.querySelector(':scope > .rebox-mobile-menu-toggle');
                if (!button) {
                    button = document.createElement('button');
                    button.type = 'button';
                    button.className = 'rebox-mobile-menu-toggle';
                    button.setAttribute('aria-label', 'Buka menu navigasi');
                    button.setAttribute('aria-controls', navId);
                    button.setAttribute('aria-expanded', 'false');
                    button.title = 'Menu navigasi';
                    button.innerHTML = '<i class="fas fa-bars" aria-hidden="true"></i>';
                    shell.insertBefore(button, nav);
                }

                if (nav.id !== button.getAttribute('aria-controls')) {
                    button.setAttribute('aria-controls', nav.id);
                }
            });

            document.querySelectorAll('.top-shell.rebox-menu-ready.is-mobile-menu-open').forEach((shell) => {
                if (window.innerWidth > 1024 || !shell.querySelector(':scope > .top-nav')) {
                    closeMobileMenu(shell);
                }
            });

            syncBodyMenuState();
        };

        document.addEventListener('click', (event) => {
            const toggle = event.target.closest('.rebox-mobile-menu-toggle');

            if (toggle) {
                const shell = toggle.closest('.top-shell.rebox-menu-ready');
                if (!shell) return;

                event.preventDefault();
                event.stopPropagation();

                if (shell.classList.contains('is-mobile-menu-open')) {
                    closeMobileMenu(shell);
                } else {
                    openMobileMenu(shell, toggle);
                }
                return;
            }

            const navLink = event.target.closest('.top-shell.rebox-menu-ready > .top-nav a');
            if (navLink) {
                closeMobileMenu(navLink.closest('.top-shell.rebox-menu-ready'));
                return;
            }

            document.querySelectorAll('.top-shell.rebox-menu-ready.is-mobile-menu-open').forEach((shell) => {
                const nav = shell.querySelector(':scope > .top-nav');
                if (!nav?.contains(event.target)) closeMobileMenu(shell);
            });
        });

        document.addEventListener('keydown', (event) => {
            if (event.key !== 'Escape') return;
            const openButton = document.querySelector('.top-shell.rebox-menu-ready.is-mobile-menu-open > .rebox-mobile-menu-toggle');
            closeAllMobileMenus();
            openButton?.focus();
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 1024) {
                closeAllMobileMenus();
            }
        });

        document.addEventListener('livewire:navigating', () => closeAllMobileMenus());
        document.addEventListener('DOMContentLoaded', initResponsiveNavigation);
        document.addEventListener('livewire:navigated', () => {
            closeAllMobileMenus();
            initResponsiveNavigation();
        });
        document.addEventListener('livewire:initialized', initResponsiveNavigation);

        let navigationInitFrame = null;
        new MutationObserver(() => {
            if (navigationInitFrame) return;
            navigationInitFrame = window.requestAnimationFrame(() => {
                navigationInitFrame = null;
                initResponsiveNavigation();
            });
        }).observe(document.body, {
            childList: true,
            subtree: true,
        });

        initResponsiveNavigation();
    })();
</script>

</body>
</html>
