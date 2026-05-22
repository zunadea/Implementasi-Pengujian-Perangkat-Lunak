<div class="request-page">
    @php
        $user = auth()->user();
        $displayName = $user->name ?? $user->username ?? 'Rhei';
        $initial = strtoupper(substr($displayName, 0, 1));
        $activeRequest = $selectedRequest ?: ($requests[0] ?? null);
    @endphp

    <style>
        .request-page {
            min-height: 100vh;
            overflow-x: hidden;
            padding: 26px 54px 72px;
            color: #101010;
            font-family: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Inter", sans-serif;
            background:
                radial-gradient(circle at 10% 18%, rgba(0, 134, 0, .12), transparent 25%),
                radial-gradient(circle at 92% 12%, rgba(0, 134, 0, .11), transparent 24%),
                linear-gradient(115deg, #ffffff 0%, #fbfdfb 46%, #eef9ef 100%);
        }

        body {
            background: #fbfffc;
            font-family: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .rebox-navbar-area {
            display: none !important;
        }

        .content-wrapper,
        .content,
        .container-fluid {
            width: 100% !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }

        .top-shell {
            display: grid;
            grid-template-columns: 1fr 142px;
            align-items: center;
            gap: 42px;
            width: min(100%, 1172px);
            margin: 0 auto 76px;
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

        .top-nav.is-recipient {
            grid-template-columns: repeat(4, 1fr);
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

        .top-nav a:hover,
        .top-nav a.is-active {
            background: #8bd17d;
            color: #006b00;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.28),
                0 10px 22px rgba(0, 80, 0, 0.16);
            transform: translateY(-2px);
        }

        .profile-dropdown {
            position: relative;
        }

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
            transition: transform 0.24s ease, box-shadow 0.24s ease;
        }

        .profile-pill:hover,
        .profile-dropdown.is-open .profile-pill {
            transform: translateY(-2px);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.24),
                0 16px 30px rgba(0, 134, 0, 0.16);
        }

        .profile-pill img,
        .profile-avatar-fallback {
            width: 47px;
            height: 47px;
            border-radius: 50%;
            object-fit: cover;
            background: #d9f3df;
        }

        .profile-avatar-fallback {
            display: grid;
            place-items: center;
            color: #008600;
            font-weight: 800;
        }

        .profile-caret {
            width: 24px;
            height: 22px;
            display: grid;
            place-items: center;
        }

        .profile-caret::before {
            content: "";
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
            background: rgba(255, 255, 255, .96);
            box-shadow: 0 18px 40px rgba(0, 80, 0, 0.14);
            display: none;
            z-index: 10;
        }

        .profile-dropdown.is-open .profile-menu {
            display: block;
            animation: menuDrop 0.22s ease both;
        }

        .profile-menu form {
            margin: 0;
        }

        .profile-menu a,
        .profile-menu button {
            display: block;
            padding: 11px 12px;
            border-radius: 12px;
            color: #1f2937;
            background: transparent;
            border: 0;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .profile-menu a:hover,
        .profile-menu button:hover {
            background: rgba(0, 134, 0, 0.09);
            color: #008600;
        }

        .request-hero {
            max-width: 1040px;
            margin: 0 auto 34px;
            text-align: center;
        }

        .eyebrow {
            color: #008600;
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .request-hero h1 {
            margin: 0;
            color: #008600;
            font-size: 42px;
            font-weight: 750;
            line-height: 1.05;
        }

        .request-hero p {
            max-width: 690px;
            margin: 18px auto 0;
            color: #8b8b8b;
            font-size: 18px;
            font-weight: 650;
            line-height: 1.55;
        }

        .request-shell {
            max-width: 1260px;
            margin: 0 auto;
        }

        .recipient-request-shell {
            width: min(960px, 100%);
            margin: 0 auto;
        }

        .recipient-form-card {
            padding: 44px;
            position: relative;
            overflow: hidden;
        }

        .recipient-form-card::before {
            content: "";
            position: absolute;
            right: -120px;
            top: -140px;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 134, 0, .14), transparent 68%);
            pointer-events: none;
        }

        .recipient-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            position: relative;
            z-index: 1;
        }

        .input-box textarea {
            resize: none;
            height: 100%;
            padding: 20px 0;
            line-height: 1.45;
        }

        .textarea-box {
            height: 170px;
            align-items: flex-start;
        }

        .recipient-note {
            margin-top: 22px;
            border-radius: 22px;
            background: rgba(0, 134, 0, .07);
            border: 1px solid rgba(0, 134, 0, .13);
            padding: 18px 20px;
            color: #43505c;
            font-size: 15px;
            font-weight: 750;
            line-height: 1.5;
        }

        .confirm-overlay {
            position: fixed;
            inset: 0;
            z-index: 90;
            display: grid;
            place-items: center;
            padding: 24px;
            background: rgba(255, 255, 255, .36);
            backdrop-filter: blur(12px);
            animation: riseIn .22s ease both;
        }

        .confirm-card {
            width: min(520px, 100%);
            padding: 38px;
            text-align: center;
            border-radius: 30px;
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(0, 134, 0, .14);
            box-shadow: 0 28px 80px rgba(0, 80, 0, .20);
        }

        .confirm-card h3 {
            margin: 0 0 12px;
            font-size: 28px;
            font-weight: 850;
        }

        .confirm-card p {
            margin: 0 0 28px;
            color: #6b7280;
            font-size: 16px;
            font-weight: 650;
            line-height: 1.55;
        }

        .saved-request-card {
            width: min(520px, 100%);
            margin: 26px auto 0;
            padding: 22px;
            text-align: left;
            border-radius: 24px;
            background: #f7fbf8;
            border: 1px solid rgba(0, 134, 0, .14);
        }

        .saved-request-card span {
            display: inline-flex;
            margin-bottom: 12px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #fff6df;
            color: #9a6500;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .saved-request-card h3 {
            margin: 0 0 8px;
            color: #101010;
            font-size: 22px;
            font-weight: 850;
        }

        .saved-request-card p {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.55;
        }

        .search-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 76px;
            gap: 18px;
            margin-bottom: 20px;
        }

        .search-box,
        .input-box {
            height: 70px;
            border: 1px solid #dfeee0;
            border-radius: 22px;
            background: rgba(255, 255, 255, .86);
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 0 24px;
            box-shadow: 0 14px 34px rgba(0, 0, 0, .06);
        }

        .search-box i,
        .input-box i {
            color: #8a95a4;
            font-size: 24px;
        }

        .search-box input,
        .input-box input,
        .input-box select,
        .input-box textarea {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: #101010;
            font: inherit;
            font-size: 18px;
            font-weight: 750;
        }

        .filter-button {
            border: 0;
            border-radius: 18px;
            background: #ffffff;
            color: #747474;
            font-size: 25px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, .12);
        }

        .chip-row {
            display: flex;
            gap: 18px;
            overflow-x: auto;
            padding: 12px 0 28px;
        }

        .chip-row button {
            min-width: 180px;
            height: 54px;
            border: 1px solid #cfcfcf;
            border-radius: 999px;
            background: #ffffff;
            color: #101010;
            font-size: 17px;
            font-weight: 750;
            transition: .2s ease;
        }

        .chip-row button:hover,
        .chip-row button.is-active {
            border-color: #008600;
            background: #008600;
            color: #ffffff;
            box-shadow: 0 14px 28px rgba(0, 134, 0, .18);
        }

        .request-list {
            display: grid;
            gap: 22px;
        }

        .request-card,
        .glass-card {
            border: 1px solid rgba(0, 134, 0, .14);
            border-radius: 28px;
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 16px 34px rgba(0, 0, 0, .10);
        }

        .request-card {
            padding: 26px;
            display: grid;
            grid-template-columns: 92px minmax(0, 1fr) auto;
            align-items: center;
            gap: 24px;
            cursor: pointer;
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
        }

        .request-card:hover {
            border-color: #008600;
            transform: translateY(-3px);
            box-shadow: 0 22px 38px rgba(0, 0, 0, .12);
        }

        .recipient-logo {
            width: 74px;
            height: 74px;
            border: 2px solid #d5d5d5;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #ffffff;
            color: #bd222a;
            font-size: 32px;
        }

        .request-card h3 {
            margin: 0 0 8px;
            font-size: 22px;
            font-weight: 800;
        }

        .request-card p {
            margin: 0;
            color: #101010;
            font-size: 18px;
            font-weight: 500;
            line-height: 1.45;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #eef8ef;
            color: #008600;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .primary-btn,
        .secondary-btn,
        .ghost-btn {
            border: 0;
            min-height: 54px;
            border-radius: 18px;
            padding: 0 34px;
            font-size: 17px;
            font-weight: 850;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: .22s ease;
        }

        .primary-btn {
            background: #008600;
            color: #ffffff;
            box-shadow: 0 16px 34px rgba(0, 134, 0, .22);
        }

        .primary-btn:hover {
            color: #ffffff;
            transform: translateY(-2px);
        }

        .secondary-btn {
            background: #f2f5f3;
            color: #3f4750;
        }

        .ghost-btn {
            border: 1px solid #badabb;
            background: #ffffff;
            color: #008600;
        }

        .panel {
            padding: 42px;
            animation: riseIn .35s ease both;
        }

        .panel-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 22px;
            margin-bottom: 28px;
        }

        .panel-title h2 {
            margin: 0 0 8px;
            font-size: 34px;
            font-weight: 850;
        }

        .panel-title p {
            margin: 0;
            color: #9a9a9a;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.45;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 310px minmax(0, 1fr);
            gap: 28px;
            align-items: start;
        }

        .detail-summary {
            padding: 28px;
            text-align: center;
        }

        .detail-summary .recipient-logo {
            width: 102px;
            height: 102px;
            margin: 0 auto 18px;
            font-size: 43px;
        }

        .detail-summary h3 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 850;
        }

        .detail-summary p {
            color: #747474;
            font-size: 16px;
            font-weight: 650;
            line-height: 1.45;
        }

        .detail-box {
            padding: 30px;
        }

        .detail-box h3 {
            margin: 0 0 26px;
            font-size: 28px;
            font-weight: 850;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .info-item {
            min-height: 104px;
            border: 1px solid #dfeee0;
            border-radius: 20px;
            padding: 18px 20px;
            background: rgba(250, 252, 250, .9);
        }

        .info-item span {
            display: block;
            color: #777;
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: 9px;
        }

        .info-item strong,
        .info-item p {
            margin: 0;
            color: #111827;
            font-size: 19px;
            font-weight: 800;
            line-height: 1.45;
        }

        .info-item.is-wide {
            grid-column: 1 / -1;
        }

        .location-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(360px, .95fr);
            gap: 28px;
            align-items: start;
        }

        .location-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            max-height: 650px;
            overflow: auto;
            padding: 4px 6px 4px 0;
        }

        .location-card {
            position: relative;
            border: 1px solid #dfeee0;
            border-radius: 24px;
            overflow: hidden;
            background: #ffffff;
            cursor: pointer;
            box-shadow: 0 12px 28px rgba(0, 0, 0, .05);
            transition: .22s ease;
        }

        .location-card:hover,
        .location-card.is-selected {
            border-color: #008600;
            transform: translateY(-2px);
        }

        .location-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }

        .distance-pill,
        .code-pill {
            position: absolute;
            z-index: 2;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
        }

        .distance-pill {
            top: 13px;
            left: 13px;
            padding: 8px 13px;
            background: rgba(255, 255, 255, .92);
            color: #008600;
        }

        .code-pill {
            left: 13px;
            top: 122px;
            padding: 8px 14px;
            background: #008600;
            color: #ffffff;
        }

        .location-card-body {
            padding: 18px 18px 22px;
        }

        .location-card h3 {
            margin: 0 0 8px;
            font-size: 21px;
            font-weight: 850;
        }

        .location-card p {
            margin: 0;
            color: #747474;
            font-size: 15px;
            font-weight: 750;
        }

        .plus-badge {
            position: absolute;
            right: 16px;
            top: 132px;
            width: 58px;
            height: 58px;
            border: 7px solid #ffffff;
            border-radius: 50%;
            background: #008600;
            color: #ffffff;
            display: grid;
            place-items: center;
            font-size: 28px;
            box-shadow: inset 0 8px 16px rgba(255, 255, 255, .18), 0 14px 28px rgba(0, 134, 0, .20);
        }

        .inventory-panel {
            padding: 28px;
            position: sticky;
            top: 24px;
        }

        .inventory-list {
            display: grid;
            gap: 12px;
            margin: 22px 0 28px;
        }

        .inventory-item {
            border: 1px solid #e3eee3;
            border-radius: 18px;
            padding: 16px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 58px;
            gap: 12px;
            align-items: center;
            background: #fbfdfb;
        }

        .inventory-item strong {
            display: block;
            font-size: 17px;
            font-weight: 850;
        }

        .inventory-item span {
            color: #747474;
            font-size: 13px;
            font-weight: 750;
        }

        .qty-badge {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: #e8f6ea;
            color: #008600;
            font-size: 21px;
            font-weight: 900;
        }

        .code-card,
        .success-card {
            max-width: 720px;
            margin: 0 auto;
            padding: 52px;
            text-align: center;
        }

        .big-icon {
            width: 112px;
            height: 112px;
            margin: 0 auto 24px;
            border-radius: 30px;
            display: grid;
            place-items: center;
            background: #e9f8eb;
            color: #008600;
            font-size: 42px;
        }

        .code-card h2,
        .success-card h2 {
            margin: 0 0 16px;
            font-size: 39px;
            font-weight: 850;
        }

        .code-card p,
        .success-card p {
            margin: 0 auto 28px;
            max-width: 570px;
            color: #6b7280;
            font-size: 19px;
            font-weight: 600;
            line-height: 1.55;
        }

        .code-info {
            margin: 22px 0;
            border: 1px solid #dfe5ea;
            border-radius: 20px;
            background: #f9fbfc;
            padding: 18px 20px;
            text-align: left;
            color: #4b5563;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.7;
        }

        .pickup-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .form-field {
            text-align: left;
        }

        .form-field label {
            display: block;
            margin-bottom: 10px;
            color: #747474;
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .form-field.is-wide {
            grid-column: 1 / -1;
        }

        .readonly-box {
            min-height: 64px;
            border: 1px solid #dfeee0;
            border-radius: 18px;
            background: #f9fbfa;
            padding: 18px 20px;
            color: #4b5563;
            font-size: 18px;
            font-weight: 800;
        }

        .notice-yellow {
            border: 1px solid #ffe08a;
            border-radius: 20px;
            background: #fff7db;
            color: #8a5b00;
            padding: 18px 20px;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.5;
            text-align: left;
        }

        .error-text {
            display: block;
            margin-top: 8px;
            color: #ef1d1d;
            font-size: 13px;
            font-weight: 800;
        }

        @keyframes riseIn {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 1100px) {
            .request-page {
                padding: 22px 20px 54px;
            }

            .top-shell,
            .detail-grid,
            .location-layout,
            .pickup-grid {
                grid-template-columns: 1fr;
            }

            .top-shell {
                gap: 16px;
            }

            .profile-dropdown {
                width: 142px;
                justify-self: end;
            }

            .top-nav {
                overflow-x: auto;
                display: flex;
            }
        }

        @media (max-width: 720px) {
            .request-hero h1 {
                font-size: 34px;
            }

            .request-card {
                grid-template-columns: 74px minmax(0, 1fr);
            }

            .request-card .primary-btn {
                grid-column: 1 / -1;
                width: 100%;
            }

            .location-list,
            .info-grid {
                grid-template-columns: 1fr;
            }

            .panel,
            .code-card,
            .success-card {
                padding: 28px;
            }
        }
    </style>

    <div class="top-shell">
        <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Navigasi Rebox">
            <a href="/dashboard" class="{{ request()->is('dashboard*') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
            @if(auth()->user()?->role !== 'penerima')
                <a href="{{ route('form-donasi', ['name' => 'Rebox Dago']) }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
            @endif
            <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
            <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
            <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
        </nav>

        <div class="profile-dropdown" data-profile-dropdown>
            <button class="profile-pill" type="button" aria-label="Buka menu profil">
                <span class="profile-avatar-fallback">{{ $initial }}</span>
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
    </div>

    @if(auth()->user()?->role === 'penerima')
        <section class="request-hero">
            <div class="eyebrow">Permintaan Barang</div>
            <h1>Ajukan Permintaan Barang<br>untuk Kebutuhan Anda</h1>
            <p>Ajukan permintaan barang yang komunitas atau panti Anda butuhkan. Permintaan akan tampil di halaman donatur untuk dipenuhi.</p>
        </section>

        <main class="recipient-request-shell">
            @if ($step === 'recipient_form')
                <section class="recipient-form-card glass-card">
                    <div class="panel-header">
                        <div class="panel-title">
                            <h2>Form Pengajuan Permintaan</h2>
                            <p>Isi detail kebutuhan dengan jelas agar donatur lebih mudah memahami barang yang Anda perlukan.</p>
                        </div>
                        <div class="big-icon" style="width:78px;height:78px;margin:0;font-size:30px;">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                    </div>

                    <form wire:submit.prevent="askSubmitRequest">
                        <div class="recipient-form-grid">
                            <div class="form-field is-wide">
                                <label>Nama Barang</label>
                                <div class="input-box">
                                    <i class="fas fa-box"></i>
                                    <input type="text" wire:model="request_nama_barang" placeholder="Contoh: Pakaian Muslim, Buku Pelajaran, Selimut">
                                </div>
                                @error('request_nama_barang') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-field">
                                <label>Kategori</label>
                                <div class="input-box">
                                    <i class="fas fa-layer-group"></i>
                                    <select wire:model="request_kategori">
                                        <option value="">Pilih kategori barang</option>
                                        <option value="Pakaian">Pakaian</option>
                                        <option value="Buku">Buku</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Peralatan Elektronik">Peralatan Elektronik</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                @error('request_kategori') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-field">
                                <label>Jumlah Kebutuhan</label>
                                <div class="input-box">
                                    <i class="fas fa-list-ol"></i>
                                    <input type="number" wire:model="request_jumlah" min="1" max="1000" placeholder="Masukkan jumlah">
                                </div>
                                @error('request_jumlah') <span class="error-text">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-field is-wide">
                                <label>Deskripsi Kebutuhan</label>
                                <div class="input-box textarea-box">
                                    <i class="fas fa-align-left"></i>
                                    <textarea wire:model="request_deskripsi" placeholder="Jelaskan kebutuhan barang, penerima manfaat, dan alasan barang tersebut dibutuhkan."></textarea>
                                </div>
                                @error('request_deskripsi') <span class="error-text">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="recipient-note">
                            <i class="fas fa-circle-info"></i>
                            Permintaan yang dikirim akan masuk ke daftar donatur. Setelah ada donatur yang memenuhi, statusnya dapat Anda pantau melalui riwayat.
                        </div>

                        <div style="display:flex;justify-content:flex-end;margin-top:28px;">
                            <button type="submit" class="primary-btn">
                                Ajukan Permintaan <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </section>
            @endif

            @if ($show_request_confirm)
                <div class="confirm-overlay">
                    <div class="confirm-card">
                        <div class="big-icon" style="width:84px;height:84px;margin-bottom:18px;font-size:32px;">
                            <i class="fas fa-question"></i>
                        </div>
                        <h3>Ajukan permintaan ini?</h3>
                        <p>Pastikan data barang, kategori, jumlah, dan deskripsi sudah benar sebelum dikirim ke daftar permintaan donatur.</p>
                        <div style="display:flex;justify-content:center;gap:14px;flex-wrap:wrap;">
                            <button type="button" class="secondary-btn" wire:click="cancelSubmitRequest">Tidak</button>
                            <button type="button" class="primary-btn" wire:click="confirmSubmitRequest">Iya, Ajukan</button>
                        </div>
                    </div>
                </div>
            @endif

            @if ($step === 'recipient_success')
                <section class="success-card glass-card">
                    <div class="big-icon"><i class="fas fa-circle-check"></i></div>
                    <h2>Permintaan Terkirim!</h2>
                    <p>
                        Terima kasih telah mengajukan. Permintaan Anda sedang diproses.
                        Mohon tunggu hingga ada donatur yang memenuhi permintaan Anda.
                    </p>

                    <div class="saved-request-card">
                        <span>Permintaan Disimpan</span>
                        <h3>{{ $submittedRequest['nama_barang'] ?? 'Barang kebutuhan' }}</h3>
                        <p>
                            Kategori: {{ $submittedRequest['kategori'] ?? '-' }}<br>
                            Jumlah: {{ $submittedRequest['jumlah'] ?? '-' }} pcs<br>
                            Status: {{ $submittedRequest['status'] ?? 'Pending' }}
                        </p>
                    </div>

                    <div style="display:flex;justify-content:center;gap:14px;margin-top:28px;flex-wrap:wrap;">
                        <a href="/dashboard" wire:navigate class="primary-btn">Kembali ke Beranda</a>
                        <button type="button" class="secondary-btn" wire:click="createAnotherRequest">Ajukan Lagi</button>
                    </div>
                </section>
            @endif
        </main>
    @else
        <section class="request-hero">
            <div class="eyebrow">Permintaan Barang</div>
            <h1>Bantu Penuhi Kebutuhan<br>yang Sedang Menunggu</h1>
            <p>Pilih permintaan penerima, cek isi Rebox terdekat, lalu salurkan barang dengan alur yang jelas dan rapi.</p>
        </section>

        <main class="request-shell">
        @if ($step === 'list')
            <section class="panel glass-card">
                <div class="search-row">
                    <label class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="search" wire:model.live.debounce.250ms="search" placeholder="Cari penerima, barang, atau lokasi...">
                    </label>
                    <button class="filter-button" type="button" aria-label="Filter permintaan">
                        <i class="fas fa-sliders"></i>
                    </button>
                </div>

                <div class="chip-row">
                    @foreach (['Semua', 'Komunitas', 'Panti Asuhan', 'Panti Jompo', 'Panti Disabilitas'] as $category)
                        <button type="button" wire:click="setCategory('{{ $category }}')" class="{{ $category_filter === $category ? 'is-active' : '' }}">
                            {{ $category }}
                        </button>
                    @endforeach
                </div>

                <div class="request-list">
                    @forelse ($requests as $item)
                        <article class="request-card" wire:key="request-{{ $item['id'] }}" wire:click="showDetail({{ $item['id'] }})">
                            <div class="recipient-logo">
                                <i class="fas fa-hands-holding-child"></i>
                            </div>
                            <div>
                                <h3>{{ $item['nama_barang'] }}</h3>
                                <p>Penerima : {{ $item['penerima'] }}</p>
                                <p>Lokasi : {{ $item['lokasi'] }}</p>
                                <span class="badge-status"><i class="fas fa-circle-check"></i>{{ $item['status'] }}</span>
                            </div>
                            <button type="button" class="primary-btn" wire:click.stop="showDetail({{ $item['id'] }})">
                                Penuhi
                            </button>
                        </article>
                    @empty
                        <div class="glass-card panel" style="text-align:center;">
                            <h2 style="margin:0 0 10px;">Belum ada permintaan yang cocok</h2>
                            <p style="margin:0;color:#747474;font-weight:700;">Coba kata kunci lain atau pilih kategori Semua.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        @endif

        @if ($step === 'detail' && $activeRequest)
            <section class="panel glass-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <h2>Detail Permintaan</h2>
                        <p>Pastikan kebutuhan penerima sesuai dengan barang yang ingin kamu salurkan.</p>
                    </div>
                    <button type="button" class="ghost-btn" wire:click="backToList">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                </div>

                <div class="detail-grid">
                    <aside class="detail-summary glass-card">
                        <div class="recipient-logo">
                            <i class="fas fa-hands-holding-child"></i>
                        </div>
                        <h3>{{ $activeRequest['penerima'] }}</h3>
                        <p>{{ $activeRequest['jenis_penerima'] }}<br>{{ $activeRequest['lokasi'] }}</p>
                        <span class="badge-status"><i class="fas fa-circle-check"></i>{{ $activeRequest['status'] }}</span>
                    </aside>

                    <section class="detail-box glass-card">
                        <h3>{{ $activeRequest['nama_barang'] }}</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <span>Nama Barang</span>
                                <strong>{{ $activeRequest['nama_barang'] }}</strong>
                            </div>
                            <div class="info-item">
                                <span>Jumlah Kebutuhan</span>
                                <strong>{{ $activeRequest['jumlah'] }} pcs</strong>
                            </div>
                            <div class="info-item">
                                <span>Kategori</span>
                                <strong>{{ $activeRequest['kategori_barang'] }}</strong>
                            </div>
                            <div class="info-item">
                                <span>Tujuan Penerima</span>
                                <strong>{{ $activeRequest['penerima'] }}</strong>
                            </div>
                            <div class="info-item is-wide">
                                <span>Deskripsi Kebutuhan</span>
                                <p>{{ $activeRequest['deskripsi'] }}</p>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:flex-end;gap:14px;margin-top:28px;flex-wrap:wrap;">
                            <button type="button" class="secondary-btn" wire:click="backToList">Nanti Dulu</button>
                            <button type="button" class="primary-btn" wire:click="startFulfillment">Penuhi Permintaan</button>
                        </div>
                    </section>
                </div>
            </section>
        @endif

        @if ($step === 'location')
            <section class="panel glass-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <h2>Pilih Lokasi Rebox</h2>
                        <p>Pilih box terdekat, lalu cek isi barang yang tersedia sebelum membuka box.</p>
                    </div>
                    <button type="button" class="ghost-btn" wire:click="backToDetail">
                        <i class="fas fa-arrow-left"></i> Detail
                    </button>
                </div>

                <div class="location-layout">
                    <section>
                        <label class="search-box" style="margin-bottom:18px;">
                            <i class="fas fa-search"></i>
                            <input type="search" wire:model.live.debounce.250ms="location_search" placeholder="Cari Rebox Dago, Bojongsoang...">
                        </label>

                        <div class="location-list">
                            @foreach ($locations as $location)
                                <article
                                    class="location-card {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'is-selected' : '' }}"
                                    wire:key="location-{{ $location['id'] }}"
                                    wire:click="selectLocation('{{ $location['name'] }}')"
                                >
                                    <img src="{{ $location['image'] }}" alt="{{ $location['title'] }}">
                                    <span class="distance-pill"><i class="fas fa-location-dot"></i> {{ $location['distance'] }}</span>
                                    <span class="code-pill"><i class="fas fa-key"></i> Kode Box ({{ $location['code'] }})</span>
                                    <span class="plus-badge"><i class="fas fa-plus"></i></span>
                                    <div class="location-card-body">
                                        <h3>{{ $location['title'] }}</h3>
                                        <p>Area {{ $location['area'] }}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>

                    <aside class="inventory-panel glass-card">
                        <div class="panel-title">
                            <h2 style="font-size:29px;">Isi {{ $selectedLocation['title'] ?? 'Rebox' }}</h2>
                            <p>Data barang dari donasi yang masuk ke box ini.</p>
                        </div>

                        <div class="inventory-list">
                            @foreach ($inventoryItems as $inventory)
                                <div class="inventory-item" wire:key="inventory-{{ $loop->index }}">
                                    <div>
                                        <strong>{{ $inventory['nama_barang'] }}</strong>
                                        <span>{{ $inventory['kategori'] }}</span>
                                    </div>
                                    <div class="qty-badge">{{ $inventory['jumlah'] }}</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="code-info" style="margin-bottom:22px;">
                            <div>Lokasi: <strong>{{ $selectedLocation['title'] ?? '-' }}</strong></div>
                            <div>Area: <strong>{{ $selectedLocation['area'] ?? '-' }}</strong></div>
                            <div>Kode box: <strong>{{ $selectedLocation['code'] ?? '-' }}</strong></div>
                        </div>

                        <button type="button" class="primary-btn" wire:click="goToCode" style="width:100%;">
                            Lanjutkan <i class="fas fa-arrow-right"></i>
                        </button>
                    </aside>
                </div>
            </section>
        @endif

        @if ($step === 'code')
            <section class="code-card glass-card">
                <div class="big-icon"><i class="fas fa-key"></i></div>
                <h2>Masukkan Kode Box</h2>
                <p>Masukkan kode box untuk membuka akses pengambilan barang. Pastikan kamu berada dekat dengan lokasi Rebox.</p>

                <div class="code-info">
                    <div>Lokasi: <strong>{{ $selectedLocation['title'] ?? '-' }}</strong></div>
                    <div>Area: <strong>{{ $selectedLocation['area'] ?? '-' }}</strong></div>
                    <div>Format kode: <strong>XX-00</strong></div>
                </div>

                <form wire:submit.prevent="openBox">
                    <label class="input-box" style="margin-bottom:10px;">
                        <i class="fas fa-lock-open"></i>
                        <input type="text" wire:model="kode_box_input" placeholder="CONTOH: {{ $selectedLocation['code'] ?? 'DG-01' }}">
                    </label>
                    @error('kode_box_input') <span class="error-text" style="text-align:left;">{{ $message }}</span> @enderror

                    <div style="display:flex;justify-content:flex-end;gap:14px;margin-top:28px;flex-wrap:wrap;">
                        <button type="button" class="secondary-btn" wire:click="backToLocation">Batal</button>
                        <button type="submit" class="primary-btn">Buka Box</button>
                    </div>
                </form>
            </section>
        @endif

        @if ($step === 'pickup')
            <section class="panel glass-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <h2>Box Terbuka</h2>
                        <p>Ambil barang yang sesuai, lalu isi data penyaluran sebelum menutup box.</p>
                    </div>
                    <button type="button" class="ghost-btn" wire:click="backToLocation">Ganti Box</button>
                </div>

                <form wire:submit.prevent="completeFulfillment">
                    <div class="pickup-grid">
                        <div class="form-field">
                            <label>Nama Barang</label>
                            <div class="input-box">
                                <i class="fas fa-box"></i>
                                <input type="text" wire:model="salurkan_nama_barang">
                            </div>
                            @error('salurkan_nama_barang') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-field">
                            <label>Kategori</label>
                            <div class="input-box">
                                <i class="fas fa-layer-group"></i>
                                <select wire:model="salurkan_kategori">
                                    <option value="">Pilih kategori</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Buku">Buku</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Peralatan Elektronik">Peralatan Elektronik</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            @error('salurkan_kategori') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-field">
                            <label>Jumlah</label>
                            <div class="input-box">
                                <i class="fas fa-list-ol"></i>
                                <input type="number" wire:model="salurkan_jumlah" min="1" max="1000">
                            </div>
                            @error('salurkan_jumlah') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-field">
                            <label>Lokasi Rebox</label>
                            <div class="readonly-box">{{ $selectedLocation['title'] ?? '-' }}</div>
                        </div>

                        <div class="form-field is-wide">
                            <label>Didonasikan Untuk</label>
                            <div class="readonly-box">{{ $selectedRequest['penerima'] ?? '-' }} - {{ $selectedRequest['nama_barang'] ?? '-' }}</div>
                        </div>
                    </div>

                    <div style="display:flex;justify-content:flex-end;margin-top:28px;">
                        <button type="submit" class="primary-btn">
                            Kirim dan Tutup Box <i class="fas fa-circle-check"></i>
                        </button>
                    </div>
                </form>
            </section>
        @endif

        @if ($step === 'success')
            <section class="success-card glass-card">
                <div class="big-icon"><i class="fas fa-briefcase"></i></div>
                <h2>Terima Kasih atas Kebaikanmu</h2>
                <p>Barang sudah dicatat untuk disalurkan. Segera lakukan pengiriman kepada penerima yang bersangkutan dan membutuhkan.</p>

                <div class="code-info">
                    <div>Tujuan: <strong>{{ $selectedRequest['penerima'] ?? '-' }}</strong></div>
                    <div>Alamat: <strong>{{ $selectedRequest['lokasi'] ?? '-' }}</strong></div>
                    <div>Status: <strong style="color:#b7791f;">Proses pengantaran</strong></div>
                </div>

                <div class="notice-yellow">
                    <i class="fas fa-triangle-exclamation"></i>
                    Riwayat salurkan akan menjadi selesai setelah penerima mengisi feedback dan bukti bahwa barang telah diterima.
                </div>

                <div style="display:flex;justify-content:center;gap:14px;margin-top:28px;flex-wrap:wrap;">
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener" class="primary-btn">
                        Buka Google Maps <i class="fas fa-location-arrow"></i>
                    </a>
                    <a href="/dashboard" wire:navigate class="secondary-btn">Dashboard</a>
                    <button type="button" class="ghost-btn" wire:click="backToList">Permintaan Lain</button>
                </div>
            </section>
        @endif
        </main>
    @endif

    <script>
        function initRequestProfileMenu() {
            document.querySelectorAll('[data-profile-dropdown]').forEach((dropdown) => {
                if (dropdown.dataset.ready === 'true') return;
                dropdown.dataset.ready = 'true';
                const button = dropdown.querySelector('.profile-pill');

                button?.addEventListener('click', (event) => {
                    event.stopPropagation();
                    dropdown.classList.toggle('is-open');
                });
            });
        }

        document.addEventListener('click', () => {
            document.querySelectorAll('[data-profile-dropdown].is-open').forEach((dropdown) => dropdown.classList.remove('is-open'));
        });
        document.addEventListener('DOMContentLoaded', initRequestProfileMenu);
        document.addEventListener('livewire:navigated', initRequestProfileMenu);
        document.addEventListener('livewire:updated', initRequestProfileMenu);
    </script>
</div>
