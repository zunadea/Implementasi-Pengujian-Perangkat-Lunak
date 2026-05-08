<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rebox | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <style>
        :root {
            --rebox-dark: #024d36;      /* Hijau gelap sidebar */
            --rebox-active: #05664a;    /* Hijau menu aktif */
            --rebox-emerald: #007f4e;   /* Hijau tombol panduan */
            --rebox-text-dim: #94b2a8;  /* Warna teks sekunder/slogan */
            --bg-light: #F8FAFB;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background-color: var(--bg-light); 
        }

        /* Sidebar Styling Fix */
        .main-sidebar { 
            background-color: var(--rebox-dark) !important; 
            padding-top: 20px !important;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .sidebar {
            padding-left: 12px !important;
            padding-right: 12px !important;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .brand-link { 
            padding: 10px 15px !important; 
            margin-bottom: 25px;
        }
        
        .brand-text { 
            font-size: 1.8rem !important; 
            font-weight: 700;
            color: #fff !important;
            line-height: 1;
        }
        
        .slogan-text { 
            color: #2ecc71 !important; 
            font-size: 0.75rem; 
            margin-top: 5px;
            opacity: 0.9;
        }

        .nav-pills .nav-link {
            color: #ffffffd1 !important;
            padding: 12px 18px !important;
            margin: 4px 0 !important;
            border-radius: 12px !important;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }

        .nav-pills .nav-link i {
            margin-right: 15px !important;
            font-size: 1.2rem;
            width: 25px;
            text-align: center;
        }

        .nav-pills .nav-link.active {
            background-color: var(--rebox-active) !important;
            color: #fff !important;
            box-shadow: none !important;
        }

        .help-box {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 20px;
            margin: 20px 5px;
        }

        .help-box .title { color: #fff; font-weight: 600; margin-bottom: 5px; font-size: 0.95rem; }
        .help-box .subtitle { color: var(--rebox-text-dim); font-size: 0.8rem; margin-bottom: 15px; line-height: 1.4; }

        .btn-panduan {
            background-color: var(--rebox-emerald) !important;
            color: white !important;
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            border: none;
            width: 100%;
        }

        /* --- BAGIAN PROFIL BARU --- */
        .sidebar-user-panel {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 12px;
            margin: 10px 5px;
            display: flex;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.1);
        }

        .user-info {
            margin-left: 12px;
            overflow: hidden;
        }

        .user-name {
            color: #fff;
            font-weight: 600;
            font-size: 0.85rem;
            margin-bottom: 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-role {
            color: #2ecc71;
            font-size: 0.7rem;
            font-weight: 500;
            text-transform: capitalize;
        }
        /* -------------------------- */

        .content-wrapper { 
            background-color: var(--bg-light) !important; 
            border-top-left-radius: 30px; 
            border: none;
        }
    </style>
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @auth
    <aside class="main-sidebar elevation-0">
        <div class="brand-link border-0 text-left">
            <div class="brand-text">Rebox</div>
            <div class="slogan-text">Dependable Helper</div>
        </div>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-hand-holding-heart"></i>
                            <p>Donasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/permintaan" class="nav-link {{ request()->is('permintaan*') ? 'active' : '' }}">
                            <i class="fas fa-archive"></i>
                            <p>Permintaan Barang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/riwayat" class="nav-link {{ request()->is('riwayat*') ? 'active' : '' }}">
                            <i class="fas fa-history"></i>
                            <p>Riwayat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                            <i class="far fa-user-circle"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                </ul>
            </nav>


                <div class="sidebar-user-panel mb-2">
                    @if(auth()->user()->profile_photo)
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" class="user-avatar" alt="User">
                    @else
                        <div class="user-avatar bg-secondary d-flex align-items-center justify-content-center">
                            <i class="fas fa-user text-white-50" style="font-size: 0.8rem;"></i>
                        </div>
                    @endif
                    <div class="user-info">
                        <p class="user-name">{{ auth()->user()->name }}</p>
                        <p class="user-role text-success" style="font-size: 0.65rem;">{{ auth()->user()->role }}</p>
                    </div>
                </div>

                <div class="px-2">
                    @livewire('logout')
                </div>
            </div>
    </aside>
    @endauth

    <div class="content-wrapper {{ !Auth::check() ? 'ml-0' : '' }}">
        <div class="content pt-4">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@livewireScripts
</body>
</html>