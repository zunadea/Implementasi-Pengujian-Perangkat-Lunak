<div class="rebox-profile-page">
    <style>
        :root {
            --rebox-green: #008600;
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

        .rebox-profile-page {
            min-height: 100vh;
            overflow: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 78% 12%, rgba(0, 134, 0, 0.08), transparent 20%),
                radial-gradient(circle at 18% 78%, rgba(0, 134, 0, 0.055), transparent 22%),
                linear-gradient(90deg, #ffffff 0%, #ffffff 62%, #f5fcf6 100%);
            position: relative;
        }

        .rebox-profile-page::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            left: 50%;
            top: 180px;
            transform: translateX(-50%);
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 134, 0, 0.10), transparent 68%);
            filter: blur(20px);
            animation: ambientPulse 6s ease-in-out infinite alternate;
            pointer-events: none;
        }

        .profile-inner {
            width: min(100%, 1280px);
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

        .profile-hero {
            margin-bottom: 46px;
            text-align: center;
            animation: heroIn 0.8s ease both;
        }

        .profile-hero p {
            color: var(--rebox-green);
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 12px;
        }

        .profile-hero h1 {
            color: var(--rebox-green);
            font-size: 34px;
            line-height: 1.08;
            font-weight: 600;
            margin: 0;
            text-shadow: 0 14px 28px rgba(0, 134, 0, 0.08);
        }

        .profile-hero span {
            display: block;
            color: #a1a1a1;
            font-size: 15px;
            font-weight: 600;
            margin-top: 24px;
        }

        .profile-layout {
            width: min(100%, 1080px);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 30px;
            align-items: stretch;
        }

        .profile-card, .info-card {
            border: 1px solid rgba(0, 134, 0, 0.16);
            background: rgba(255, 255, 255, 0.82);
            border-radius: 26px;
            box-shadow: 0 22px 48px rgba(0, 134, 0, 0.10), 0 8px 20px rgba(17, 17, 17, 0.04);
            backdrop-filter: blur(10px);
        }

        .profile-card {
            padding: 34px 28px;
            text-align: center;
            height: 100%;
        }
        .avatar-wrap {
            width: 144px;
            height: 144px;
            margin: 0 auto 22px;
            border-radius: 50%;
            background: #f7fbf8;
            box-shadow: inset 0 0 24px rgba(0, 134, 0, 0.06), 0 14px 30px rgba(17, 17, 17, 0.08);
            position: relative;
            display: grid;
            place-items: center;
            overflow: visible;
        }
        .avatar-wrap img, .avatar-empty {
            width: 126px;
            height: 126px;
            border-radius: 50%;
            object-fit: cover;
        }
        .avatar-empty {
            display: grid;
            place-items: center;
            color: #29323d;
            background: #f1f5f2;
            font-size: 54px;
        }
        .avatar-upload {
            position: absolute;
            right: 7px;
            bottom: 10px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            background: var(--rebox-green);
            color: #ffffff;
            display: grid;
            place-items: center;
            cursor: pointer;
            box-shadow: 0 12px 24px rgba(0, 134, 0, 0.25);
        }

        .profile-name { margin: 0; color: #111111; font-size: 24px; font-weight: 700; }
        .profile-email { margin: 8px 0 16px; color: #737373; font-size: 14px; font-weight: 600; }
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }
        .status-badge.verified { background: rgba(0, 134, 0, 0.10); color: var(--rebox-green); }
        .status-badge.pending { background: rgba(217, 119, 6, 0.12); color: #b45309; }
        .status-badge.unverified { background: rgba(115, 115, 115, 0.12); color: #5f6368; }

        .profile-stats {
            margin-top: 24px;
            padding-top: 22px;
            border-top: 1px solid rgba(17, 17, 17, 0.08);
            display: grid;
            gap: 12px;
        }
        .stat-row {
            min-height: 74px;
            border-radius: 18px;
            background: #f8faf9;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px;
            text-align: left;
        }
        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 13px;
            background: #ffffff;
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            box-shadow: inset 0 0 12px rgba(0, 134, 0, 0.08);
        }
        .stat-row strong { display: block; color: #1f2937; font-size: 18px; font-weight: 800; }
        .stat-row span { color: #737373; font-size: 12px; font-weight: 600; }

        .verify-box {
            margin-top: 24px;
            padding: 20px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(0, 134, 0, 0.08), rgba(255, 255, 255, 0.72));
            border: 1px solid rgba(0, 134, 0, 0.12);
            text-align: left;
        }
        .verify-box h3 { margin: 0 0 8px; color: #111111; font-size: 17px; font-weight: 800; }
        .verify-box p { margin: 0 0 16px; color: #737373; font-size: 12px; font-weight: 600; line-height: 1.45; }

        .info-card { padding: 34px; }
        .info-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 26px;
        }
        .info-card h2 { margin: 0 0 8px; color: #111111; font-size: 24px; font-weight: 700; }
        .info-card p { margin: 0; color: #a1a1a1; font-size: 14px; font-weight: 600; }

        .edit-button, .ghost-button, .save-button {
            height: 46px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }
        .edit-button, .save-button {
            border: 0;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.24), 0 14px 28px rgba(0, 134, 0, 0.20);
            padding: 0 22px;
        }
        .ghost-button {
            border: 1px solid rgba(0, 134, 0, 0.28);
            background: rgba(255, 255, 255, 0.82);
            color: var(--rebox-green);
            padding: 0 18px;
        }

        .form-grid {
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
        .field-box {
            height: 56px;
            border-radius: 16px;
            background: #f7faf8;
            border: 1px solid rgba(0, 134, 0, 0.10);
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 17px;
            color: #737373;
        }
        .field-box input {
            width: 100%;
            border: 0;
            outline: none;
            background: transparent;
            color: #111111;
            font-size: 15px;
            font-weight: 700;
        }
        .field-box input:disabled { color: #4b5563; }
        .field-note {
            margin-top: 9px;
            color: #737373;
            font-size: 12px;
            font-weight: 600;
        }

        .password-panel {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            padding: 18px;
            border-radius: 20px;
            background: rgba(0, 134, 0, 0.045);
            animation: panelIn 0.35s ease both;
        }

        .panel-content {
            animation: cardSwitch 0.36s ease both;
            transform-origin: center top;
        }
        .panel-actions {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-top: 24px;
        }
        .panel-actions .edit-button,
        .panel-actions .ghost-button {
            width: 100%;
        }
        .panel-actions .panel-button {
            border: 1px solid rgba(0, 134, 0, 0.24);
            background: rgba(255, 255, 255, 0.88);
            color: var(--rebox-green);
            box-shadow: none;
            transition: transform 0.24s ease, background 0.24s ease, color 0.24s ease, box-shadow 0.24s ease;
        }
        .panel-actions .panel-button:hover,
        .panel-actions .panel-button.is-selected {
            border-color: transparent;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.24), 0 14px 28px rgba(0, 134, 0, 0.20);
            transform: translateY(-2px);
        }
        .action-row {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }
        .mode-card {
            padding: 18px;
            border-radius: 20px;
            background: rgba(0, 134, 0, 0.045);
        }
        .mode-card .form-grid {
            gap: 16px;
        }
        .status-panel {
            margin-top: 18px;
            padding: 18px;
            border-radius: 18px;
            background: rgba(0, 134, 0, 0.06);
            color: #4b5563;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.5;
        }

        .form-footer {
            margin-top: 26px;
            padding: 18px;
            border-radius: 18px;
            background: #f8faf9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }
        .form-footer p { margin: 0; color: #737373; font-size: 13px; font-weight: 600; }

        .success-alert, .error-alert {
            margin-top: 14px;
            padding: 14px 16px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            font-weight: 700;
            animation: panelIn 0.34s ease both;
        }
        .success-alert { background: rgba(0, 134, 0, 0.10); color: var(--rebox-green); }
        .error-alert { background: rgba(220, 38, 38, 0.10); color: #dc2626; }

        @keyframes menuDrop {
            from { opacity: 0; transform: translateY(-8px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes heroIn {
            from { opacity: 0; transform: translateY(22px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes panelIn {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes cardSwitch {
            from { opacity: 0; transform: rotateX(-7deg) translateY(16px); filter: blur(4px); }
            to { opacity: 1; transform: rotateX(0) translateY(0); filter: blur(0); }
        }
        @keyframes ambientPulse {
            from { opacity: 0.56; transform: translateX(-50%) scale(0.96); }
            to { opacity: 0.92; transform: translateX(-50%) scale(1.04); }
        }

        @media (max-width: 980px) {
            .profile-inner { padding: 24px 28px 70px; }
            .top-shell, .profile-layout { grid-template-columns: 1fr; }
            .profile-dropdown { justify-self: end; margin-top: -18px; }
            .password-panel { grid-template-columns: 1fr; }
            .panel-actions { grid-template-columns: 1fr; }
        }
        @media (max-width: 720px) {
            .top-nav { height: auto; grid-template-columns: repeat(2, 1fr); gap: 14px; padding: 18px 22px; }
            .profile-hero h1 { font-size: 28px; }
            .form-grid { grid-template-columns: 1fr; }
            .info-head, .form-footer { align-items: stretch; flex-direction: column; }
            .edit-button, .save-button, .ghost-button { width: 100%; }
        }
    </style>

    @php
        $avatarUrl = $photo
            ? $photo->temporaryUrl()
            : ($current_photo ? asset('storage/' . $current_photo) : null);
        $initial = strtoupper(substr($username ?: 'R', 0, 1));
        $roleLabel = ucfirst($role ?: 'Donatur');
        $verificationStatus = $verification_status ?: 'unverified';
    @endphp

    <div class="profile-inner">
        <header class="top-shell">
            <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Profile navigation">
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
                @if(auth()->user()?->role !== 'penerima')
                    <a href="{{ route('form-donasi', ['name' => 'Rebox Dago']) }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
                @endif
                <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
                <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
                <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
            </nav>

            <div class="profile-dropdown" data-profile-dropdown>
                <button class="profile-pill" type="button" aria-label="Buka menu profil">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ $username }}">
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

        <section class="profile-hero">
            <p>Profil Rebox</p>
            <h1>Kelola Akunmu<br>dengan Lebih Rapi</h1>
            <span>Perbarui identitas, foto profil, dan lihat ringkasan kontribusimu.</span>
        </section>

        <section class="profile-layout">
            <aside class="profile-card">
                <div class="avatar-wrap">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ $username }}">
                    @else
                        <div class="avatar-empty">{{ $initial }}</div>
                    @endif
                    <label for="photo-upload" class="avatar-upload" title="Ganti foto profil">
                        <i class="fas fa-camera"></i>
                    </label>
                    <input type="file" wire:model="photo" id="photo-upload" class="d-none" accept="image/*">
                </div>

                <h2 class="profile-name">{{ $username }}</h2>
                <p class="profile-email">{{ $email }}</p>

                @if($verificationStatus === 'verified')
                    <span class="status-badge verified"><i class="fas fa-check-circle"></i> Akun Terverifikasi</span>
                @elseif($verificationStatus === 'pending')
                    <span class="status-badge pending"><i class="fas fa-clock"></i> Menunggu Verifikasi</span>
                @else
                    <span class="status-badge unverified"><i class="fas fa-circle-info"></i> Belum Terverifikasi</span>
                @endif

                <div class="profile-stats">
                    <div class="stat-row">
                        <div class="stat-icon"><i class="fas fa-box-open"></i></div>
                        <div>
                            <strong>{{ $donation_count }} Donasi</strong>
                            <span>Jumlah donasi ke Box Rebox</span>
                        </div>
                    </div>
                    <div class="stat-row">
                        <div class="stat-icon"><i class="fas fa-hand-holding-heart"></i></div>
                        <div>
                            <strong>{{ $distribution_count }} Penyaluran</strong>
                            <span>Donasi tersalurkan ke penerima</span>
                        </div>
                    </div>
                </div>
            </aside>

            <section class="info-card">
                <div class="panel-content" wire:key="profile-panel-{{ $profilePanel }}">
                    @if($profilePanel === 'edit')
                        <form wire:submit.prevent="updateProfile">
                            <div class="info-head">
                                <div>
                                    <h2>Edit Profil</h2>
                                    <p>Perbarui nama tampilan akunmu. Email dan role tetap mengikuti data akun.</p>
                                </div>
                                <div class="action-row">
                                    <button type="button" class="ghost-button" wire:click="showPanel('info')">Batal</button>
                                    <button type="submit" class="save-button" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Simpan</span>
                                        <span wire:loading>Menyimpan...</span>
                                    </button>
                                </div>
                            </div>

                            <div class="form-grid">
                                <div class="field full">
                                    <label>Username</label>
                                    <div class="field-box">
                                        <i class="far fa-user"></i>
                                        <input type="text" wire:model="username" placeholder="Nama pengguna">
                                    </div>
                                    @error('username') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>
                                <div class="field">
                                    <label>Alamat Email</label>
                                    <div class="field-box">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" value="{{ $email }}" disabled>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Role Pengguna</label>
                                    <div class="field-box">
                                        <i class="fas fa-shield-alt"></i>
                                        <input type="text" value="{{ $roleLabel }}" disabled>
                                    </div>
                                </div>
                            </div>

                            @error('photo') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                            <div class="form-footer">
                                <p><i class="fas fa-info-circle"></i> Foto maksimal 5MB. Email dan role bersifat permanen.</p>
                            </div>
                        </form>
                    @elseif($profilePanel === 'password')
                        <form wire:submit.prevent="updatePassword">
                            <div class="info-head">
                                <div>
                                    <h2>Ubah Password</h2>
                                    <p>Masukkan password lama, lalu buat password baru untuk akun Rebox.</p>
                                </div>
                                <div class="action-row">
                                    <button type="button" class="ghost-button" wire:click="showPanel('info')">Batal</button>
                                    <button type="submit" class="save-button" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Simpan</span>
                                        <span wire:loading>Menyimpan...</span>
                                    </button>
                                </div>
                            </div>

                            <div class="mode-card">
                                <div class="form-grid">
                                    <div class="field">
                                        <label>Password Saat Ini</label>
                                        <div class="field-box">
                                            <i class="fas fa-key"></i>
                                            <input type="password" wire:model="current_password" placeholder="Password lama">
                                        </div>
                                        @error('current_password') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                    </div>
                                    <div class="field">
                                        <label>Password Baru</label>
                                        <div class="field-box">
                                            <i class="fas fa-lock"></i>
                                            <input type="password" wire:model="new_password" placeholder="Password baru">
                                        </div>
                                        @error('new_password') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                    </div>
                                    <div class="field">
                                        <label>Ulangi Password</label>
                                        <div class="field-box">
                                            <i class="fas fa-check-circle"></i>
                                            <input type="password" wire:model="new_password_confirmation" placeholder="Ulangi password">
                                        </div>
                                    </div>
                                    <div class="field full">
                                        <div class="field-note">Minimal 8 karakter, wajib ada huruf, angka, dan simbol.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer">
                                <p><i class="fas fa-info-circle"></i> Password akan diperbarui setelah data valid.</p>
                            </div>
                        </form>
                    @elseif($profilePanel === 'verification')
                        <div class="info-head">
                            <div>
                                <h2>Verifikasi Akun</h2>
                                <p>Kirim data singkat agar admin bisa meninjau identitas akunmu.</p>
                            </div>
                            <button type="button" class="ghost-button" wire:click="showPanel('info')">Kembali</button>
                        </div>

                        @if($verificationStatus === 'verified')
                            <div class="status-panel">
                                <i class="fas fa-check-circle"></i> Akunmu sudah terverifikasi dan disetujui oleh admin.
                            </div>
                        @elseif($verificationStatus === 'pending')
                            <div class="status-panel">
                                <i class="fas fa-clock"></i> Data verifikasi sudah dikirim. Mohon tunggu sampai admin Rebox menyetujui akunmu.
                            </div>
                        @else
                            <form wire:submit.prevent="submitVerification">
                                <div class="mode-card">
                                    <div class="form-grid">
                                        <div class="field">
                                            <label>Username</label>
                                            <div class="field-box">
                                                <i class="far fa-user"></i>
                                                <input type="text" wire:model="verification_username" placeholder="Username">
                                            </div>
                                            @error('verification_username') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                        </div>
                                        <div class="field">
                                            <label>NIK</label>
                                            <div class="field-box">
                                                <i class="far fa-id-card"></i>
                                                <input type="text" wire:model="verification_nik" placeholder="16 digit NIK">
                                            </div>
                                            @error('verification_nik') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                        </div>
                                        <div class="field full">
                                            <label>Nama Lengkap di NIK</label>
                                            <div class="field-box">
                                                <i class="far fa-address-card"></i>
                                                <input type="text" wire:model="verification_nik_name" placeholder="Nama lengkap sesuai NIK">
                                            </div>
                                            @error('verification_nik_name') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <p><i class="fas fa-info-circle"></i> Data akan ditinjau admin sebelum status akun berubah.</p>
                                    <button type="submit" class="save-button" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Kirim Verifikasi</span>
                                        <span wire:loading>Mengirim...</span>
                                    </button>
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="info-head">
                            <div>
                                <h2>Informasi Pribadi</h2>
                                <p>Data utama ditampilkan read-only. Gunakan tombol di bawah untuk mengubah data akun.</p>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="field full">
                                <label>Username</label>
                                <div class="field-box">
                                    <i class="far fa-user"></i>
                                    <input type="text" value="{{ $username }}" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Alamat Email</label>
                                <div class="field-box">
                                    <i class="far fa-envelope"></i>
                                    <input type="email" value="{{ $email }}" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Role Pengguna</label>
                                <div class="field-box">
                                    <i class="fas fa-shield-alt"></i>
                                    <input type="text" value="{{ $roleLabel }}" disabled>
                                </div>
                            </div>
                            <div class="field full">
                                <label>Password</label>
                                <div class="field-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" value="password-rebox" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="panel-actions">
                            <button type="button" class="ghost-button panel-button" wire:click="showPanel('edit')">Edit Profil</button>
                            <button type="button" class="ghost-button panel-button" wire:click="showPanel('password')">Ubah Password</button>
                            <button type="button" class="ghost-button panel-button" wire:click="showPanel('verification')">Verifikasi Akun</button>
                        </div>

                        <div class="form-footer">
                            <p><i class="fas fa-info-circle"></i> Email dan role bersifat permanen.</p>
                        </div>
                    @endif
                </div>

                @if (session()->has('message'))
                    <div class="success-alert"><i class="fas fa-check-circle"></i>{{ session('message') }}</div>
                @endif
                @if (session()->has('verification_message'))
                    <div class="success-alert"><i class="fas fa-check-circle"></i>{{ session('verification_message') }}</div>
                @endif
            </section>
        </section>
    </div>

    <script>
        function initReboxProfile() {
            const root = document.querySelector('.rebox-profile-page');
            if (!root || root.dataset.ready === 'true') return;
            root.dataset.ready = 'true';

            const profileDropdown = root.querySelector('[data-profile-dropdown]');
            const profileButton = profileDropdown?.querySelector('.profile-pill');

            profileButton?.addEventListener('click', (event) => {
                event.stopPropagation();
                profileDropdown.classList.toggle('is-open');
            });

            document.addEventListener('click', (event) => {
                if (profileDropdown && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.remove('is-open');
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') profileDropdown?.classList.remove('is-open');
            });
        }

        document.addEventListener('DOMContentLoaded', initReboxProfile);
        document.addEventListener('livewire:navigated', initReboxProfile);
    </script>
</div>
