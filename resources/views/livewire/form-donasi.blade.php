<div class="rebox-donation-page" data-donation-root data-step="{{ $step }}">
    <style>
        :root {
            --rebox-green: #008600;
            --rebox-green-soft: #e9f7eb;
            --rebox-ink: #111111;
            --rebox-muted: #737373;
            --sf-pro: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        body { background: #ffffff; font-family: var(--sf-pro); }
        .rebox-navbar-area { display: none !important; }
        .content-wrapper, .content, .container-fluid {
            width: 100% !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }

        .rebox-donation-page {
            min-height: 100vh;
            overflow: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 84% 16%, rgba(0, 134, 0, 0.10), transparent 22%),
                radial-gradient(circle at 10% 72%, rgba(0, 134, 0, 0.06), transparent 22%),
                linear-gradient(90deg, #ffffff 0%, #ffffff 68%, #f5fcf6 100%);
            position: relative;
        }

        .donation-inner {
            width: min(100%, 1520px);
            margin: 0 auto;
            padding: 26px 54px 90px;
            position: relative;
            z-index: 1;
        }

        .top-shell {
            display: grid;
            grid-template-columns: 1fr 142px;
            align-items: center;
            gap: 42px;
            width: min(100%, 1280px);
            margin: 0 auto 68px;
        }

        .top-nav {
            height: 59px;
            border-radius: 25px;
            background: rgba(0, 134, 0, 0.70);
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            align-items: center;
            padding: 0 82px;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
        }

        .top-nav a {
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            line-height: 1;
            justify-self: center;
            padding: 9px 18px;
            border-radius: 14px;
            transition: transform 0.24s ease, background 0.24s ease, box-shadow 0.24s ease;
        }

        .top-nav a:hover, .top-nav a.is-active {
            background: #8bd17d;
            color: #006b00;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.28), 0 10px 22px rgba(0, 80, 0, 0.16);
            transform: translateY(-2px);
        }

        .profile-dropdown { position: relative; }
        .profile-pill {
            height: 59px;
            width: 142px;
            border: 0;
            border-radius: 25px;
            background: rgba(0, 134, 0, 0.70);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            padding: 7px 22px 7px 10px;
            cursor: pointer;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
        }

        .profile-pill img, .profile-avatar-fallback {
            width: 47px;
            height: 47px;
            border-radius: 50%;
            object-fit: cover;
            background: #d9f3df;
        }

        .profile-avatar-fallback {
            display: grid;
            place-items: center;
            color: var(--rebox-green);
            font-weight: 800;
        }

        .profile-caret::before {
            content: "";
            display: block;
            width: 20px;
            height: 17px;
            background: #ffffff;
            clip-path: polygon(8% 0, 92% 0, 60% 72%, 53% 88%, 47% 88%, 40% 72%);
            border-radius: 6px;
        }

        .profile-menu {
            position: absolute;
            top: 68px;
            right: 0;
            min-width: 190px;
            padding: 10px;
            border: 1px solid rgba(0, 134, 0, 0.12);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 40px rgba(0, 80, 0, 0.14);
            display: none;
            z-index: 10;
        }

        .profile-dropdown.is-open .profile-menu { display: block; animation: menuDrop 0.22s ease both; }
        .profile-menu form { margin: 0; }
        .profile-menu a,
        .profile-menu button {
            display: block;
            padding: 11px 12px;
            border-radius: 12px;
            color: #1f2937;
            background: transparent;
            border: 0;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }
        .profile-menu a:hover,
        .profile-menu button:hover { background: rgba(0, 134, 0, 0.09); color: var(--rebox-green); }

        .donation-hero {
            text-align: center;
            margin-bottom: 44px;
            position: relative;
            animation: heroIn 0.65s ease both;
        }

        .hero-orbit {
            width: 96px;
            height: 96px;
            margin: 0 auto 18px;
            border-radius: 28px;
            background: rgba(0, 134, 0, 0.08);
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 38px;
            box-shadow: inset 0 0 24px rgba(0, 134, 0, 0.08), 0 18px 40px rgba(0, 134, 0, 0.12);
            animation: floatBox 3.8s ease-in-out infinite;
        }

        .donation-hero h1 {
            color: var(--rebox-green);
            font-size: 38px;
            line-height: 1.08;
            font-weight: 700;
            margin: 0 0 14px;
        }

        .donation-hero p {
            margin: 0;
            color: #a1a1a1;
            font-size: 15px;
            font-weight: 600;
            line-height: 1.55;
        }

        .donation-card {
            width: min(100%, 1440px);
            margin: 0 auto;
            border: 1px solid rgba(0, 134, 0, 0.16);
            background: rgba(255, 255, 255, 0.88);
            border-radius: 28px;
            box-shadow: 0 22px 48px rgba(0, 134, 0, 0.10), 0 8px 20px rgba(17, 17, 17, 0.04);
            backdrop-filter: blur(10px);
            padding: 34px;
            animation: panelIn 0.45s ease both;
        }

        .form-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 28px;
            align-items: stretch;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
        }

        .section-title .icon {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            display: grid;
            place-items: center;
        }

        .section-title h2 { margin: 0 0 4px; font-size: 22px; font-weight: 750; color: #111111; }
        .section-title p { margin: 0; color: #a1a1a1; font-size: 13px; font-weight: 650; }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field.full { grid-column: 1 / -1; }
        .field label {
            display: block;
            color: #737373;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            margin-bottom: 9px;
        }

        .field-box, .field-control, .field-select, .field-textarea {
            width: 100%;
            border-radius: 16px;
            background: #f8faf9;
            border: 1px solid rgba(0, 134, 0, 0.12);
            color: #111111;
            font-size: 15px;
            font-weight: 700;
            outline: none;
            transition: border 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .field-control, .field-select { height: 56px; padding: 0 17px; }
        .field-select { appearance: none; background-image: linear-gradient(45deg, transparent 50%, #008600 50%), linear-gradient(135deg, #008600 50%, transparent 50%); background-position: calc(100% - 22px) 24px, calc(100% - 15px) 24px; background-size: 7px 7px, 7px 7px; background-repeat: no-repeat; }
        .field-textarea { min-height: 230px; resize: none; padding: 16px 17px; line-height: 1.55; }
        .field-control:focus, .field-select:focus, .field-textarea:focus {
            background: #ffffff;
            border-color: var(--rebox-green);
            box-shadow: 0 0 0 4px rgba(0, 134, 0, 0.08);
        }

        .condition-row {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .condition-btn {
            height: 52px;
            border-radius: 15px;
            border: 1px solid rgba(0, 134, 0, 0.22);
            background: rgba(255, 255, 255, 0.9);
            color: var(--rebox-green);
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.22s ease;
        }

        .condition-btn:hover, .condition-btn.active {
            background: var(--rebox-green);
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(0, 134, 0, 0.18);
        }

        .info-box {
            margin-top: 20px;
            border-radius: 18px;
            background: rgba(0, 134, 0, 0.06);
            padding: 18px;
            display: flex;
            gap: 13px;
            color: #4b5563;
            font-size: 13px;
            font-weight: 650;
            line-height: 1.55;
        }

        .info-box i { color: var(--rebox-green); margin-top: 2px; }

        .location-panel {
            border-radius: 24px;
            background: #f8faf9;
            border: 1px solid rgba(0, 134, 0, 0.12);
            padding: 20px;
            height: 930px;
            display: flex;
            flex-direction: column;
        }

        .search-box {
            position: relative;
            margin-bottom: 16px;
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
        }

        .search-box input {
            width: 100%;
            height: 52px;
            border-radius: 15px;
            border: 1px solid rgba(0, 134, 0, 0.10);
            background: #ffffff;
            padding: 0 16px 0 44px;
            outline: none;
            font-weight: 700;
        }

        .location-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            align-content: start;
            gap: 14px;
            flex: 1;
            min-height: 0;
            overflow: auto;
            padding: 6px 4px 4px 0;
        }

        .location-list.is-single {
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        }

        .location-card {
            border: 1px solid rgba(0, 134, 0, 0.12);
            background: #ffffff;
            border-radius: 20px;
            overflow: visible;
            padding: 8px;
            cursor: pointer;
            text-align: left;
            align-self: start;
            transition: 0.24s ease;
        }

        .location-card:hover, .location-card.active {
            border-color: var(--rebox-green);
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
            transform: translateY(-2px);
        }

        .location-image {
            height: 150px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }

        .location-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: inherit;
        }
        .distance-pill, .code-pill {
            position: absolute;
            left: 10px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.92);
            color: var(--rebox-green);
            font-size: 11px;
            font-weight: 800;
            padding: 7px 10px;
            box-shadow: 0 8px 16px rgba(17, 17, 17, 0.08);
        }
        .distance-pill { top: 10px; }
        .code-pill { bottom: 10px; background: var(--rebox-green); color: #ffffff; }

        .location-body {
            padding: 14px 10px 10px;
            position: relative;
        }

        .location-body h3 { margin: 0 0 7px; font-size: 15px; font-weight: 800; }
        .location-body p { margin: 0; color: #737373; font-size: 12px; font-weight: 600; line-height: 1.35; }
        .location-add {
            position: absolute;
            right: 8px;
            top: -22px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--rebox-green);
            color: #ffffff;
            display: grid;
            place-items: center;
            border: 4px solid #ffffff;
            font-size: 17px;
            box-shadow: inset 0 1px 5px rgba(255,255,255,0.25), 0 14px 24px rgba(0, 134, 0, 0.22);
        }

        .selected-preview {
            margin-top: 22px;
        }

        .selected-preview-title {
            margin: 0 0 12px;
            color: #4b5563;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .selected-preview-card {
            width: min(100%, 360px);
            border: 1px solid rgba(0, 134, 0, 0.16);
            background: #ffffff;
            border-radius: 20px;
            padding: 8px;
            box-shadow: 0 18px 38px rgba(0, 134, 0, 0.10);
            animation: panelIn 0.32s ease both;
        }

        .selected-preview-card .location-image {
            height: 150px;
        }

        .selected-preview-card .location-body {
            padding: 17px 12px 12px;
        }

        .selected-preview-card .location-body h3 {
            font-size: 19px;
        }

        .selected-preview-card .location-body p {
            font-size: 14px;
        }

        .selection-hint {
            margin: -2px 0 14px;
            color: #8a8f98;
            font-size: 12px;
            font-weight: 700;
        }

        .submit-band {
            margin-top: 28px;
            border-radius: 22px;
            background: #f8faf9;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .submit-band h3 { margin: 0 0 5px; font-size: 22px; font-weight: 800; }
        .submit-band p { margin: 0; color: #737373; font-weight: 600; }

        .btn-main, .btn-soft {
            min-width: 142px;
            height: 52px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
        }

        .btn-main {
            border: 0;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 14px 28px rgba(0, 134, 0, 0.20);
        }

        .btn-soft {
            border: 1px solid rgba(0, 134, 0, 0.20);
            background: #f4f7f6;
            color: #344054;
        }

        .center-card {
            width: min(100%, 680px);
            margin: 0 auto;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(0, 134, 0, 0.14);
            box-shadow: 0 24px 60px rgba(17, 17, 17, 0.10);
            padding: 42px;
            animation: panelIn 0.42s ease both;
        }

        .center-icon {
            width: 104px;
            height: 104px;
            border-radius: 28px;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 42px;
            margin-bottom: 24px;
            position: relative;
            animation: floatBox 3.8s ease-in-out infinite;
        }

        .code-spark {
            position: absolute;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ffffff;
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 10px 20px rgba(0, 134, 0, 0.10);
        }
        .code-spark.one { left: -18px; top: 50px; }
        .code-spark.two { right: -18px; top: 12px; }
        .code-spark.three { right: -28px; bottom: 18px; }

        .center-card h2 { margin: 0 0 14px; font-size: 34px; font-weight: 800; color: #111111; }
        .center-card > p { margin: 0 0 26px; color: #737373; font-size: 17px; font-weight: 600; line-height: 1.6; }

        .timer-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 26px;
            padding: 11px 17px;
            border-radius: 999px;
            background: #fff7ed;
            color: #c2410c;
            font-size: 16px;
            font-weight: 900;
        }

        .timer-display {
            color: var(--rebox-green);
            font-size: 72px;
            line-height: 1;
            font-weight: 900;
            margin: 18px 0 28px;
            text-shadow: 0 18px 32px rgba(0, 134, 0, 0.10);
        }

        .code-info {
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            padding: 18px 20px;
            color: #4b5563;
            font-weight: 650;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .code-input { margin-bottom: 22px; }
        .upload-proof {
            border: 2px dashed rgba(0, 134, 0, 0.24);
            border-radius: 20px;
            min-height: 158px;
            background: linear-gradient(135deg, rgba(0, 134, 0, 0.035), rgba(255,255,255,0.9));
            display: grid;
            place-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            color: var(--rebox-green);
            font-weight: 800;
        }

        .upload-proof input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-proof img { width: 100%; height: 230px; object-fit: cover; }
        .proof-note {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            color: #9ca3af;
            font-size: 13px;
            font-style: italic;
            margin: 12px 0 26px;
        }
        .proof-note strong { color: #dc2626; font-style: normal; }

        .success-card { text-align: center; }
        .success-card .center-icon { margin: 0 auto 24px; }
        .success-card h2 { font-size: 34px; }

        .success-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-top: 30px;
        }

        .error-alert, .success-alert {
            margin-top: 10px;
            padding: 12px 14px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            font-weight: 750;
        }
        .error-alert { background: rgba(220, 38, 38, 0.10); color: #dc2626; }
        .success-alert { background: rgba(0, 134, 0, 0.10); color: var(--rebox-green); }

        @keyframes menuDrop {
            from { opacity: 0; transform: translateY(-8px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes heroIn {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes panelIn {
            from { opacity: 0; transform: translateY(18px) scale(0.985); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes floatBox {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        @media (max-width: 980px) {
            .donation-inner { padding: 24px 28px 70px; }
            .top-shell, .form-layout { grid-template-columns: 1fr; }
            .profile-dropdown { justify-self: end; margin-top: -18px; }
            .location-panel { height: auto; }
            .location-list { max-height: 620px; }
        }
        @media (max-width: 720px) {
            .top-nav { height: auto; grid-template-columns: repeat(2, 1fr); gap: 14px; padding: 18px 22px; }
            .donation-hero h1 { font-size: 30px; }
            .donation-card, .center-card { padding: 24px; }
            .location-list { grid-template-columns: 1fr; }
            .field-grid, .condition-row { grid-template-columns: 1fr; }
            .submit-band, .success-actions { flex-direction: column; align-items: stretch; }
            .btn-main, .btn-soft { width: 100%; }
        }
    </style>

    @php
        $user = auth()->user();
        $avatarUrl = $user?->profile_photo ? asset('storage/' . $user->profile_photo) : null;
        $initial = strtoupper(substr($user->name ?? 'R', 0, 1));
    @endphp

    <div class="donation-inner">
        <header class="top-shell">
            <nav class="top-nav" aria-label="Donation navigation">
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
                <a href="{{ route('form-donasi', ['name' => $selectedLocation['title'] ?? 'Rebox Dago']) }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
                <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
                <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
                <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
            </nav>

            <div class="profile-dropdown" data-profile-dropdown>
                <button class="profile-pill" type="button" aria-label="Buka menu profil">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ $user->name }}">
                    @else
                        <span class="profile-avatar-fallback">{{ $initial }}</span>
                    @endif
                    <span class="profile-caret" aria-hidden="true"></span>
                </button>
                <div class="profile-menu">
                    <a href="/profile" wire:navigate>Profil Saya</a>
                    <a href="/riwayat" wire:navigate>Riwayat</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        @if($step === 'form')
            <section class="donation-hero">
                <div class="hero-orbit"><i class="fas fa-box-open"></i></div>
                <h1>Donasi Barang Jadi Lebih Mudah</h1>
                <p>Isi informasi barang, pilih titik Rebox, lalu gunakan kode box saat kamu siap memasukkan barang.</p>
            </section>

            <section class="donation-card">
                <form wire:submit.prevent="kirimDonasi">
                    <div class="form-layout">
                        <div>
                            <div class="section-title">
                                <div class="icon"><i class="fas fa-box"></i></div>
                                <div>
                                    <h2>Detail Barang</h2>
                                    <p>Isi detail utama barang donasi</p>
                                </div>
                            </div>

                            <div class="field-grid">
                                <div class="field full">
                                    <label>Nama Barang</label>
                                    <input class="field-control" type="text" wire:model="nama_barang" placeholder="Contoh: Buku Pelajaran, Pakaian, Barang Elektronik">
                                    @error('nama_barang') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Kategori Barang</label>
                                    <select class="field-select" wire:model="kategori">
                                        <option value="">Pilih kategori barang</option>
                                        <option value="Pakaian">Pakaian</option>
                                        <option value="Buku">Buku</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Peralatan Elektronik">Peralatan Elektronik</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('kategori') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Jumlah Barang</label>
                                    <input class="field-control" type="number" wire:model="jumlah" min="1" max="1000" placeholder="Masukkan jumlah">
                                    @error('jumlah') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field full">
                                    <label>Kondisi Barang</label>
                                    <div class="condition-row">
                                        <button type="button" class="condition-btn {{ $kondisi === 'Baru' ? 'active' : '' }}" wire:click="$set('kondisi', 'Baru')">Baru</button>
                                        <button type="button" class="condition-btn {{ $kondisi === 'Seperti Baru' ? 'active' : '' }}" wire:click="$set('kondisi', 'Seperti Baru')">Seperti Baru</button>
                                        <button type="button" class="condition-btn {{ $kondisi === 'Layak Pakai' ? 'active' : '' }}" wire:click="$set('kondisi', 'Layak Pakai')">Layak Pakai</button>
                                    </div>
                                    @error('kondisi') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field full">
                                    <label>Deskripsi Barang</label>
                                    <textarea class="field-textarea" wire:model="deskripsi" placeholder="Contoh: Buku masih lengkap, pakaian sudah dicuci, kondisi aman digunakan. Maksimal 100 kata."></textarea>
                                    @error('deskripsi') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="selected-preview">
                                <h3 class="selected-preview-title">Lokasi Box yang Dipilih</h3>
                                <article class="selected-preview-card">
                                    <div class="location-image">
                                        <img src="{{ $selectedLocation['image'] }}" alt="{{ $selectedLocation['title'] }}">
                                        <span class="distance-pill"><i class="fas fa-location-dot"></i> {{ $selectedLocation['distance'] }}</span>
                                        <span class="code-pill"><i class="fas fa-key"></i> Kode Box ({{ $selectedLocation['code'] }})</span>
                                    </div>
                                    <div class="location-body">
                                        <h3>{{ $selectedLocation['title'] }}</h3>
                                        <p>Area {{ $selectedLocation['area'] }}</p>
                                        <span class="location-add"><i class="fas fa-plus"></i></span>
                                    </div>
                                </article>
                            </div>
                        </div>

                        <aside class="location-panel">
                            <div class="section-title">
                                <div class="icon"><i class="fas fa-location-dot"></i></div>
                                <div>
                                    <h2>Pilih Lokasi</h2>
                                    <p>Cari lalu pilih titik Rebox tujuanmu</p>
                                </div>
                            </div>

                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" wire:model.live="search_lokasi" placeholder="Cari Rebox Dago, Bojongsoang...">
                            </div>
                            <p class="selection-hint">Klik dua kali pada card untuk memilih lokasi box.</p>

                            <div class="location-list {{ count($locations) === 1 ? 'is-single' : '' }}">
                                @forelse($locations as $location)
                                    <button type="button" class="location-card {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'active' : '' }}" wire:dblclick="selectLocation('{{ $location['name'] }}')">
                                        <div class="location-image">
                                            <img src="{{ $location['image'] }}" alt="{{ $location['title'] }}">
                                            <span class="distance-pill"><i class="fas fa-location-dot"></i> {{ $location['distance'] }}</span>
                                            @if(($selectedLocation['id'] ?? null) === $location['id'])
                                                <span class="code-pill"><i class="fas fa-key"></i> Kode Box ({{ $location['code'] }})</span>
                                            @endif
                                        </div>
                                        <div class="location-body">
                                            <h3>{{ $location['title'] }}</h3>
                                            <p>Area {{ $location['area'] }}</p>
                                            <span class="location-add"><i class="fas fa-plus"></i></span>
                                        </div>
                                    </button>
                                @empty
                                    <div class="info-box"><i class="fas fa-search"></i><div>Lokasi Rebox tidak ditemukan.</div></div>
                                @endforelse
                            </div>
                        </aside>
                    </div>

                    <div class="submit-band">
                        <div>
                            <h3>Siap Berbagi Kebaikan?</h3>
                            <p>Donasi Anda akan sangat berarti bagi mereka yang membutuhkan.</p>
                        </div>
                        <button type="submit" class="btn-main">
                            Kirim Donasi <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </section>
        @elseif($step === 'code')
            <section class="center-card">
                <div class="center-icon">
                    <i class="fas fa-key"></i>
                    <span class="code-spark one">{{ substr($selectedLocation['code'], -2) }}</span>
                    <span class="code-spark two">{{ substr($selectedLocation['code'], 0, 2) }}</span>
                    <span class="code-spark three"><i class="fas fa-lock-open"></i></span>
                </div>
                <h2>Masukkan Kode Box</h2>
                <p>Masukkan kode box untuk membuka akses drop-off. Waktu memasukkan barang berjalan selama 5 menit.</p>

                @if (session()->has('message'))
                    <div class="success-alert" style="margin-bottom: 18px;"><i class="fas fa-circle-info"></i>{{ session('message') }}</div>
                @endif

                <div class="timer-pill"><i class="fas fa-clock"></i> 05:00</div>
                <div class="code-info">
                    Lokasi: <strong>{{ $selectedLocation['title'] }}</strong><br>
                    Area: <strong>{{ $selectedLocation['area'] }}</strong><br>
                    Format kode: <strong>XX-00</strong>
                </div>

                <form wire:submit.prevent="bukaBox">
                    <div class="field code-input">
                        <label>Kode Box Area</label>
                        <input class="field-control" type="text" wire:model="kode_box_input" placeholder="CONTOH: {{ $selectedLocation['code'] }}">
                        @error('kode_box_input') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                    </div>
                    <div class="action-row" style="display:flex; justify-content:flex-end; gap:14px;">
                        <button type="button" class="btn-soft" wire:click="resetToForm">Batal</button>
                        <button type="submit" class="btn-main">Buka Box</button>
                    </div>
                </form>
            </section>
        @elseif($step === 'open')
            <section class="center-card" data-open-step>
                <button type="button" data-expire-box wire:click="expireBox" style="display:none"></button>
                <div class="success-card">
                    <div class="timer-pill" style="background: var(--rebox-green); color:#ffffff;"><i class="fas fa-lock-open"></i> BOX TERBUKA</div>
                    <h2>Silahkan Masukkan Barang</h2>
                    <p>Tolong masukkan barang Anda dalam kurun waktu 5 menit. Box akan otomatis tertutup saat waktu habis.</p>
                    <div class="center-icon" style="margin-top: 22px;"><i class="fas fa-briefcase"></i></div>
                    <div class="timer-display" data-countdown>05:00</div>
                </div>

                <div class="code-info">
                    Box: <strong>{{ $selectedLocation['code'] }}</strong><br>
                    Lokasi: <strong>{{ $selectedLocation['title'] }}</strong>
                </div>

                <form wire:submit.prevent="selesaiDonasi">
                    <label class="upload-proof">
                        @if($foto)
                            <img src="{{ $foto->temporaryUrl() }}" alt="Foto bukti barang">
                        @else
                            <div>
                                <i class="fas fa-cloud-upload-alt" style="font-size:32px;"></i><br>
                                Tambahkan Foto Produk<br>
                                <span style="color:#737373; font-size:13px;">PNG, JPG up to 2MB</span>
                            </div>
                        @endif
                        <input type="file" wire:model="foto" accept="image/png,image/jpeg">
                    </label>
                    @error('foto') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                    <div class="proof-note">
                        <span>Fotokan bukti barang anda sudah dimasukkan ke dalam kotak</span>
                        <strong>*Wajib Diisi</strong>
                    </div>
                    <div style="display:flex; justify-content:flex-end;">
                        <button type="submit" class="btn-main">Selesai Donasi <i class="fas fa-check-circle"></i></button>
                    </div>
                </form>
            </section>
        @else
            <section class="center-card success-card">
                <div class="center-icon"><i class="fas fa-briefcase"></i></div>
                <h2>Donasi Berhasil</h2>
                <p>Terima kasih. Foto bukti sudah tersimpan dan donasi Anda berhasil dikirim untuk diproses admin.</p>
                <div class="success-actions">
                    <a href="/riwayat" class="btn-main" wire:navigate>Lihat Riwayat</a>
                    <a href="/dashboard" class="btn-soft" wire:navigate>Dashboard</a>
                </div>
            </section>
        @endif
    </div>

    <script>
        function initDonationPage() {
            const root = document.querySelector('[data-donation-root]');
            if (!root) return;

            const profileDropdown = root.querySelector('[data-profile-dropdown]');
            const profileButton = profileDropdown?.querySelector('.profile-pill');

            if (profileButton && profileButton.dataset.bound !== 'true') {
                profileButton.dataset.bound = 'true';
                profileButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    profileDropdown.classList.toggle('is-open');
                });
            }

            if (root.dataset.step !== 'open') {
                if (window.reboxDonationTimer) {
                    clearInterval(window.reboxDonationTimer);
                    window.reboxDonationTimer = null;
                }
                window.reboxDonationDeadline = null;
                return;
            }

            const display = root.querySelector('[data-countdown]');
            const expireButton = root.querySelector('[data-expire-box]');

            if (!display || !expireButton) return;

            if (!window.reboxDonationDeadline) {
                window.reboxDonationDeadline = Date.now() + (5 * 60 * 1000);
            }

            const render = () => {
                const remaining = Math.max(0, Math.ceil((window.reboxDonationDeadline - Date.now()) / 1000));
                const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
                const seconds = String(remaining % 60).padStart(2, '0');
                display.textContent = `${minutes}:${seconds}`;

                if (remaining <= 0) {
                    clearInterval(window.reboxDonationTimer);
                    window.reboxDonationTimer = null;
                    window.reboxDonationDeadline = null;
                    expireButton.click();
                }
            };

            render();

            if (window.reboxDonationTimer) {
                clearInterval(window.reboxDonationTimer);
            }

            window.reboxDonationTimer = setInterval(render, 1000);
        }

        document.addEventListener('click', (event) => {
            const dropdown = document.querySelector('[data-profile-dropdown]');
            if (dropdown && !dropdown.contains(event.target)) dropdown.classList.remove('is-open');
        });

        document.addEventListener('DOMContentLoaded', initDonationPage);
        document.addEventListener('livewire:navigated', initDonationPage);
        document.addEventListener('livewire:initialized', initDonationPage);
        document.addEventListener('livewire:init', () => {
            if (window.Livewire) {
                window.Livewire.hook('morph.updated', initDonationPage);
            }
        });
        document.addEventListener('livewire:update', initDonationPage);
        document.addEventListener('livewire:updated', initDonationPage);
    </script>
</div>
