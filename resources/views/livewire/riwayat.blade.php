<div class="rebox-riwayat-page">
    @php
        $user = auth()->user();
        $displayName = $user->name ?? $user->username ?? 'Rhei';
        $initial = strtoupper(substr($displayName, 0, 1));
        $avatarUrl = !empty($user->profile_photo) ? asset('storage/' . $user->profile_photo) : null;
        $isRecipient = $user?->role === 'penerima';
        $currentHistories = $isRecipient ? $recipientRequests : ($tab === 'salurkan' ? $salurkanHistories : $reboxHistories);
    @endphp

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

        .rebox-riwayat-page {
            min-height: 100vh;
            overflow: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 84% 16%, rgba(0, 134, 0, 0.09), transparent 22%),
                radial-gradient(circle at 8% 76%, rgba(0, 134, 0, 0.05), transparent 22%),
                linear-gradient(90deg, #ffffff 0%, #ffffff 66%, #f5fcf6 100%);
        }

        .riwayat-inner {
            width: min(100%, 1280px);
            margin: 0 auto;
            padding: 26px 54px 90px;
            position: relative;
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

        .top-nav a:hover,
        .top-nav a.is-active {
            background: #8bd17d;
            color: #006b00;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.28),
                0 10px 22px rgba(0, 80, 0, 0.16);
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
            transition: transform 0.24s ease, box-shadow 0.24s ease;
        }

        .profile-pill:hover,
        .profile-dropdown.is-open .profile-pill {
            transform: translateY(-2px);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.24),
                0 16px 30px rgba(0, 134, 0, 0.16);
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

        .history-hero {
            text-align: center;
            margin-bottom: 34px;
            animation: heroIn .48s ease both;
        }

        .history-hero .eyebrow {
            margin: 0 0 10px;
            color: var(--rebox-green);
            font-size: 16px;
            font-weight: 750;
        }

        .history-hero h1 {
            margin: 0;
            color: var(--rebox-green);
            font-size: 38px;
            line-height: 1.1;
            font-weight: 700;
        }

        .history-hero p {
            max-width: 620px;
            margin: 14px auto 0;
            color: #a1a1a1;
            font-size: 15px;
            font-weight: 650;
            line-height: 1.55;
        }

        .history-panel {
            width: min(100%, 1080px);
            margin: 0 auto;
            border: 1px solid rgba(0, 134, 0, .14);
            border-radius: 28px;
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 22px 48px rgba(0, 134, 0, .10), 0 8px 20px rgba(17, 17, 17, .04);
            backdrop-filter: blur(10px);
            padding: 28px;
        }

        .history-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .history-tabs {
            width: min(100%, 390px);
            height: 54px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: 1px solid rgba(0, 134, 0, .12);
            border-radius: 18px;
            background: #f7faf8;
            padding: 5px;
        }

        .history-tabs button {
            border: 0;
            border-radius: 14px;
            background: transparent;
            color: #4b5563;
            font-size: 15px;
            font-weight: 800;
            transition: .2s ease;
        }

        .history-tabs button:hover,
        .history-tabs button.is-active {
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 12px 22px rgba(0, 134, 0, .18);
        }

        .history-summary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #737373;
            font-size: 14px;
            font-weight: 750;
        }

        .history-summary i {
            color: var(--rebox-green);
        }

        .history-list {
            display: grid;
            gap: 18px;
        }

        .history-card {
            display: grid;
            grid-template-columns: 112px minmax(0, 1fr) 210px;
            gap: 20px;
            align-items: center;
            border: 1px solid rgba(0, 134, 0, .10);
            border-radius: 22px;
            background: rgba(255, 255, 255, .96);
            padding: 18px;
            box-shadow: 0 14px 28px rgba(17, 17, 17, .055);
            animation: cardIn .26s ease both;
        }

        .history-image {
            width: 112px;
            height: 112px;
            border-radius: 18px;
            object-fit: cover;
            background: #eef5ef;
        }

        .history-main {
            min-width: 0;
        }

        .history-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .history-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            background: #e9f5ec;
            border: 2px solid #edf3ee;
        }

        .history-name strong {
            display: block;
            color: #111111;
            font-size: 16px;
            font-weight: 850;
            line-height: 1.05;
        }

        .history-name span {
            color: #737373;
            font-size: 12px;
            font-weight: 700;
        }

        .history-card h3 {
            margin: 0 0 8px;
            color: #111111;
            font-size: 22px;
            font-weight: 850;
            line-height: 1.1;
        }

        .history-card p {
            margin: 0;
            color: #737373;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.55;
        }

        .history-info {
            display: grid;
            gap: 10px;
            justify-items: end;
            text-align: right;
        }

        .detail-line span {
            display: block;
            color: #737373;
            font-size: 11px;
            font-weight: 850;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 3px;
        }

        .detail-line strong {
            display: block;
            color: #111111;
            font-size: 15px;
            font-weight: 850;
            line-height: 1.25;
        }

        .status-pill {
            min-width: 92px;
            height: 34px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 13px;
            font-weight: 850;
        }

        .status-pill.is-process { background: #f7b500; }
        .status-pill.is-done { background: var(--rebox-green); }

        .empty-state {
            padding: 54px 24px;
            text-align: center;
        }

        .empty-state i {
            color: var(--rebox-green);
            font-size: 36px;
            margin-bottom: 14px;
        }

        .empty-state h2 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 850;
        }

        .empty-state p {
            margin: 0;
            color: #737373;
            font-size: 15px;
            font-weight: 650;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes heroIn {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes menuDrop {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 1100px) {
            .riwayat-inner { padding: 22px 20px 64px; }
            .top-shell { grid-template-columns: 1fr; gap: 16px; }
            .profile-dropdown { justify-self: end; }
            .history-card { grid-template-columns: 96px minmax(0, 1fr); }
            .history-info { grid-column: 1 / -1; grid-template-columns: repeat(3, minmax(0, 1fr)); justify-items: start; text-align: left; }
        }

        @media (max-width: 700px) {
            .top-nav {
                height: auto;
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
                padding: 18px 22px;
            }

            .history-panel { padding: 20px; }
            .history-card { grid-template-columns: 1fr; }
            .history-image { width: 100%; height: 190px; }
            .history-info { grid-template-columns: 1fr; }
        }
    </style>

    <div class="riwayat-inner">
        <header class="top-shell">
            <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Riwayat navigation">
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
                        <img src="{{ $avatarUrl }}" alt="{{ $displayName }}">
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

        <section class="history-hero">
            <p class="eyebrow">{{ $isRecipient ? 'Riwayat Permintaan' : 'Riwayat Rebox' }}</p>
            <h1>{{ $isRecipient ? 'Pantau Pengajuan Kebutuhanmu' : 'Pantau Jejak Kebaikanmu' }}</h1>
            <p>
                {{ $isRecipient
                    ? 'Permintaan yang kamu ajukan akan tersimpan di sini dan menunggu donatur yang siap memenuhi kebutuhanmu.'
                    : 'Riwayat salurkan berasal dari pemenuhan permintaan penerima, sedangkan riwayat Rebox berasal dari barang yang kamu masukkan ke box.' }}
            </p>
        </section>

        <section class="history-panel">
            <div class="history-toolbar">
                @if(!$isRecipient)
                    <div class="history-tabs" role="tablist" aria-label="Jenis riwayat">
                        <button type="button" wire:click="setTab('salurkan')" class="{{ $tab === 'salurkan' ? 'is-active' : '' }}">
                            Salurkan
                        </button>
                        <button type="button" wire:click="setTab('rebox')" class="{{ $tab === 'rebox' ? 'is-active' : '' }}">
                            Rebox
                        </button>
                    </div>
                @else
                    <div class="history-summary">
                        <i class="fas fa-clipboard-list"></i>
                        Riwayat pengajuan penerima
                    </div>
                @endif

                <div class="history-summary">
                    <i class="fas fa-clock-rotate-left"></i>
                    {{ count($currentHistories) }} aktivitas {{ $isRecipient ? 'permintaan' : ($tab === 'salurkan' ? 'salurkan' : 'Rebox') }}
                </div>
            </div>

            @if (count($currentHistories) > 0)
                <div class="history-list">
                    @foreach ($currentHistories as $history)
                        <article class="history-card" wire:key="{{ $tab }}-history-{{ $loop->index }}">
                            <img src="{{ $history['image'] }}" class="history-image" alt="{{ $history['nama_barang'] }}">

                            <div class="history-main">
                                <div class="history-meta">
                                    @if($avatarUrl)
                                        <img src="{{ $avatarUrl }}" class="history-avatar" alt="{{ $isRecipient ? $displayName : $history['donatur'] }}">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($isRecipient ? $displayName : $history['donatur']) }}&background=e9f5ec&color=111111&bold=true" class="history-avatar" alt="{{ $isRecipient ? $displayName : $history['donatur'] }}">
                                    @endif
                                    <div class="history-name">
                                        <strong>{{ $isRecipient ? $displayName : $history['donatur'] }}</strong>
                                        <span>{{ $isRecipient ? 'Penerima' : ucfirst($history['role']) }}</span>
                                    </div>
                                </div>

                                <h3>{{ $history['nama_barang'] }}</h3>
                                @if ($isRecipient)
                                    <p>{{ $history['deskripsi'] }}</p>
                                @elseif ($tab === 'salurkan')
                                    <p>Disalurkan untuk {{ $history['tujuan'] }}. Status saat ini menunggu konfirmasi penerima.</p>
                                @else
                                    <p>Dimasukkan ke {{ $history['lokasi_box'] }} dan tercatat sebagai riwayat donasi Rebox.</p>
                                @endif
                            </div>

                            <div class="history-info">
                                @if ($isRecipient)
                                    <span class="status-pill {{ strtolower($history['status']) === 'selesai' ? 'is-done' : 'is-process' }}">
                                        {{ $history['status'] }}
                                    </span>
                                    <div class="detail-line">
                                        <span>Kategori</span>
                                        <strong>{{ $history['kategori'] }}</strong>
                                    </div>
                                @elseif ($tab === 'salurkan')
                                    <span class="status-pill {{ strtolower($history['status']) === 'selesai' ? 'is-done' : 'is-process' }}">
                                        {{ $history['status'] }}
                                    </span>
                                    <div class="detail-line">
                                        <span>Tujuan Donasi</span>
                                        <strong>{{ $history['tujuan'] }}</strong>
                                    </div>
                                @else
                                    <div class="detail-line">
                                        <span>Tanggal</span>
                                        <strong>{{ $history['date'] }}</strong>
                                    </div>
                                    <div class="detail-line">
                                        <span>Lokasi Box</span>
                                        <strong>{{ $history['lokasi_box'] }}</strong>
                                    </div>
                                @endif

                                <div class="detail-line">
                                    <span>Jumlah</span>
                                    <strong>{{ $history['jumlah'] }}</strong>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-clock-rotate-left"></i>
                    <h2>Belum ada riwayat {{ $isRecipient ? 'permintaan' : ($tab === 'salurkan' ? 'salurkan' : 'Rebox') }}</h2>
                    <p>{{ $isRecipient ? 'Permintaan yang kamu ajukan akan muncul di sini.' : 'Aktivitasmu akan muncul di sini setelah proses selesai dicatat.' }}</p>
                </div>
            @endif
        </section>
    </div>

    <script>
        function initRiwayatProfileDropdown() {
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
        document.addEventListener('DOMContentLoaded', initRiwayatProfileDropdown);
        document.addEventListener('livewire:navigated', initRiwayatProfileDropdown);
        document.addEventListener('livewire:updated', initRiwayatProfileDropdown);
    </script>
</div>
