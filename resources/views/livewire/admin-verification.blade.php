<div class="admin-verification-page">
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

        .admin-verification-page {
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 88% 8%, rgba(0, 134, 0, 0.12), transparent 20%),
                radial-gradient(circle at 12% 62%, rgba(0, 134, 0, 0.05), transparent 18%),
                linear-gradient(90deg, #ffffff 0%, #ffffff 55%, #f5fcf6 100%);
            position: relative;
        }

        .admin-inner {
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
            margin-bottom: 70px;
        }

        .top-nav {
            height: 59px;
            border-radius: 25px;
            background: rgba(0, 134, 0, 0.70);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            align-items: center;
            padding: 0 54px;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
        }

        .top-nav a {
            width: 142px;
            height: 34px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            justify-self: center;
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.24s ease, background 0.24s ease, box-shadow 0.24s ease;
        }

        .top-nav a:hover,
        .top-nav a.is-active {
            background: #8bd17d;
            color: #006b00;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.28), 0 10px 22px rgba(0, 80, 0, 0.16);
            transform: translateY(-2px);
        }

        .profile-dropdown { position: relative; }
        .profile-pill {
            width: 142px;
            height: 59px;
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
            z-index: 20;
        }

        .profile-dropdown.is-open .profile-menu { display: block; }
        .profile-menu form { margin: 0; }
        .profile-menu button {
            width: 100%;
            padding: 11px 12px;
            border: 0;
            border-radius: 12px;
            color: #1f2937;
            background: transparent;
            font-size: 13px;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }
        .profile-menu button:hover { background: rgba(0, 134, 0, 0.09); color: var(--rebox-green); }

        .admin-hero {
            margin-bottom: 36px;
            text-align: center;
        }

        .admin-hero p {
            margin: 0 0 12px;
            color: var(--rebox-green);
            font-size: 16px;
            font-weight: 800;
        }

        .admin-hero h1 {
            margin: 0;
            color: var(--rebox-green);
            font-size: 36px;
            line-height: 1.08;
            font-weight: 700;
        }

        .admin-hero span {
            display: block;
            margin-top: 12px;
            color: #a1a1a1;
            font-size: 15px;
            font-weight: 600;
        }

        .summary-grid {
            width: min(100%, 980px);
            margin: 0 auto 24px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .summary-card,
        .panel-card {
            border: 1px solid rgba(0, 134, 0, 0.16);
            background: rgba(255, 255, 255, 0.84);
            border-radius: 26px;
            box-shadow: 0 22px 48px rgba(0, 134, 0, 0.10), 0 8px 20px rgba(17, 17, 17, 0.04);
            backdrop-filter: blur(12px);
        }

        .summary-card {
            padding: 20px;
            text-align: center;
        }

        .summary-card strong {
            display: block;
            color: var(--rebox-green);
            font-size: 30px;
            font-weight: 900;
        }

        .summary-card span {
            color: var(--rebox-muted);
            font-size: 13px;
            font-weight: 700;
        }

        .panel-stack {
            width: min(100%, 1080px);
            margin: 0 auto;
            display: grid;
            gap: 22px;
        }

        .panel-card {
            padding: 26px;
        }

        .panel-head {
            margin-bottom: 18px;
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 16px;
        }

        .panel-head h2 {
            margin: 0;
            color: #111111;
            font-size: 22px;
            font-weight: 800;
        }

        .panel-head p {
            margin: 6px 0 0;
            color: var(--rebox-muted);
            font-size: 13px;
            font-weight: 600;
        }

        .status-pill {
            padding: 8px 13px;
            border-radius: 999px;
            color: #006b00;
            background: rgba(0, 134, 0, 0.12);
            font-size: 12px;
            font-weight: 900;
        }

        .verification-list {
            display: grid;
            gap: 12px;
        }

        .verification-row {
            padding: 16px;
            border: 1px solid rgba(0, 134, 0, 0.12);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.72);
            display: grid;
            grid-template-columns: 1.2fr repeat(3, minmax(120px, .8fr)) auto;
            gap: 14px;
            align-items: center;
        }

        .meta-label {
            display: block;
            margin-bottom: 4px;
            color: #8a8a8a;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .meta-value {
            color: #111111;
            font-size: 13px;
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .user-name {
            color: var(--rebox-green);
            font-size: 15px;
            font-weight: 900;
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: end;
        }

        .admin-btn {
            min-height: 40px;
            padding: 0 16px;
            border: 0;
            border-radius: 12px;
            color: #ffffff;
            font-size: 13px;
            font-weight: 900;
            cursor: pointer;
        }

        .admin-btn.approve { background: var(--rebox-green); }
        .admin-btn.reject { background: #dc2626; }

        .history-row {
            grid-template-columns: 1.2fr repeat(4, minmax(110px, .8fr));
        }

        .history-status {
            width: fit-content;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 900;
        }

        .history-status.verified { color: #006b00; background: rgba(0, 134, 0, 0.12); }
        .history-status.rejected { color: #b91c1c; background: rgba(220, 38, 38, 0.10); }

        .empty-state {
            padding: 34px 18px;
            border: 1px dashed rgba(0, 134, 0, 0.20);
            border-radius: 18px;
            color: var(--rebox-muted);
            text-align: center;
            font-weight: 700;
        }

        @media (max-width: 980px) {
            .admin-inner { padding: 24px 28px 70px; }
            .top-shell { grid-template-columns: 1fr; margin-bottom: 46px; }
            .profile-dropdown { justify-self: end; margin-top: -18px; }
            .summary-grid { grid-template-columns: 1fr; }
            .verification-row,
            .history-row { grid-template-columns: 1fr; }
            .actions { justify-content: stretch; }
            .admin-btn { flex: 1; }
        }

        @media (max-width: 720px) {
            .admin-inner { padding: 20px 16px 54px; }
            .top-shell { gap: 14px; margin-bottom: 34px; }
            .top-nav {
                height: auto;
                display: flex;
                align-items: center;
                overflow-x: auto;
                scrollbar-width: none;
                gap: 12px;
                padding: 14px;
                border-radius: 18px;
            }
            .top-nav::-webkit-scrollbar { display: none; }
            .top-nav a { flex: 0 0 auto; width: auto; min-width: 128px; min-height: 38px; padding: 0 16px; }
            .profile-dropdown { justify-self: stretch; margin-top: 0; }
            .profile-pill { width: 100%; justify-content: space-between; }
            .profile-menu { left: 0; right: 0; width: 100%; }
            .admin-hero h1 { font-size: 28px; }
            .summary-card,
            .panel-card { border-radius: 18px; }
            .panel-card { padding: 18px; }
            .panel-head { align-items: stretch; flex-direction: column; }
            .actions { flex-direction: column; }
        }

        @media (max-width: 420px) {
            .admin-hero h1 { font-size: 24px; }
            .admin-hero span { font-size: 13px; }
            .summary-card { padding: 16px; }
            .verification-row { padding: 14px; }
        }
    </style>

    @php
        $admin = auth()->user();
        $initial = strtoupper(substr($admin?->name ?? 'A', 0, 1));
        $avatarUrl = $admin?->profile_photo ? asset('storage/' . $admin->profile_photo) : null;
        $approvedCount = $approvedUsers->count();
        $rejectedCount = $rejectedUsers->count();
    @endphp

    <div class="admin-inner">
        <header class="top-shell" wire:ignore>
            <nav class="top-nav" aria-label="Admin navigation">
                <a href="#verifikasi" class="is-active">Verifikasi NIK</a>
                <a href="#menunggu">Menunggu ACC</a>
                <a href="#sudah-acc">Sudah ACC</a>
                <a href="#ditolak">Ditolak</a>
            </nav>

            <div class="profile-dropdown" data-profile-dropdown>
                <button class="profile-pill" type="button" aria-label="Buka menu profil" onclick="event.preventDefault(); event.stopImmediatePropagation(); this.closest('[data-profile-dropdown]')?.classList.toggle('is-open');">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ $admin->name }}">
                    @else
                        <span class="profile-avatar-fallback">{{ $initial }}</span>
                    @endif
                    <span class="profile-caret" aria-hidden="true"></span>
                </button>
                <div class="profile-menu">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <section class="admin-hero" id="verifikasi">
            <p>Admin Rebox</p>
            <h1>Kelola Verifikasi<br>Profil NIK</h1>
            <span>Setujui data NIK pengguna dan pantau riwayat keputusan admin.</span>
        </section>

        <section class="summary-grid">
            <div class="summary-card"><strong>{{ $pendingUsers->count() }}</strong><span>Menunggu ACC</span></div>
            <div class="summary-card"><strong>{{ $approvedCount }}</strong><span>Sudah ACC</span></div>
            <div class="summary-card"><strong>{{ $rejectedCount }}</strong><span>Ditolak</span></div>
        </section>

        <div class="panel-stack">
            <section class="panel-card" id="menunggu">
                <div class="panel-head">
                    <div>
                        <h2>Menunggu ACC</h2>
                        <p>Daftar profil yang sedang menunggu persetujuan admin.</p>
                    </div>
                    <span class="status-pill">{{ $pendingUsers->count() }} Pending</span>
                </div>

                <div class="verification-list">
                    @forelse ($pendingUsers as $user)
                        <article class="verification-row" wire:key="verification-{{ $user->id }}">
                            <div>
                                <span class="meta-label">Akun</span>
                                <div class="user-name">{{ $user->name }}</div>
                                <div class="meta-value">{{ $user->email }}</div>
                            </div>
                            <div>
                                <span class="meta-label">Username</span>
                                <div class="meta-value">{{ $user->verification_username ?? '-' }}</div>
                            </div>
                            <div>
                                <span class="meta-label">Nama Sesuai NIK</span>
                                <div class="meta-value">{{ $user->verification_nik_name ?? '-' }}</div>
                            </div>
                            <div>
                                <span class="meta-label">NIK</span>
                                <div class="meta-value">{{ $user->verification_nik ?? '-' }}</div>
                            </div>
                            <div class="actions">
                                <button type="button" class="admin-btn approve" wire:click="approve({{ $user->id }})">ACC</button>
                                <button type="button" class="admin-btn reject" wire:click="reject({{ $user->id }})">Tolak</button>
                            </div>
                        </article>
                    @empty
                        <div class="empty-state">Belum ada pengajuan verifikasi NIK.</div>
                    @endforelse
                </div>
            </section>

            <section class="panel-card" id="sudah-acc">
                <div class="panel-head">
                    <div>
                        <h2>Sudah ACC</h2>
                        <p>Profil NIK yang sudah disetujui admin.</p>
                    </div>
                    <span class="status-pill">{{ $approvedUsers->count() }} Sudah ACC</span>
                </div>

                <div class="verification-list">
                    @forelse ($approvedUsers as $user)
                        <article class="verification-row history-row" wire:key="approved-{{ $user->id }}">
                            <div>
                                <span class="meta-label">Akun</span>
                                <div class="user-name">{{ $user->name }}</div>
                                <div class="meta-value">{{ $user->email }}</div>
                            </div>
                            <div>
                                <span class="meta-label">Nama NIK</span>
                                <div class="meta-value">{{ $user->verification_nik_name ?? '-' }}</div>
                            </div>
                            <div>
                                <span class="meta-label">NIK</span>
                                <div class="meta-value">{{ $user->verification_nik ?? '-' }}</div>
                            </div>
                            <div>
                                <span class="meta-label">Status</span>
                                <span class="history-status verified">Sudah ACC</span>
                            </div>
                            <div>
                                <span class="meta-label">Diproses</span>
                                <div class="meta-value">{{ $user->updated_at?->format('d M Y H:i') ?? '-' }}</div>
                            </div>
                        </article>
                    @empty
                        <div class="empty-state">Belum ada profil NIK yang di-ACC.</div>
                    @endforelse
                </div>
            </section>

            <section class="panel-card" id="ditolak">
                <div class="panel-head">
                    <div>
                        <h2>Ditolak</h2>
                        <p>Profil NIK yang ditolak admin.</p>
                    </div>
                    <span class="status-pill">{{ $rejectedUsers->count() }} Ditolak</span>
                </div>

                <div class="verification-list">
                    @forelse ($rejectedUsers as $user)
                        <article class="verification-row history-row" wire:key="rejected-{{ $user->id }}">
                            <div>
                                <span class="meta-label">Akun</span>
                                <div class="user-name">{{ $user->name }}</div>
                                <div class="meta-value">{{ $user->email }}</div>
                            </div>
                            <div>
                                <span class="meta-label">Nama NIK</span>
                                <div class="meta-value">{{ $user->verification_nik_name ?? '-' }}</div>
                            </div>
                            <div>
                                <span class="meta-label">NIK</span>
                                <div class="meta-value">{{ $user->verification_nik ?? '-' }}</div>
                            </div>
                            <div>
                                <span class="meta-label">Status</span>
                                <span class="history-status rejected">Ditolak</span>
                            </div>
                            <div>
                                <span class="meta-label">Diproses</span>
                                <div class="meta-value">{{ $user->updated_at?->format('d M Y H:i') ?? '-' }}</div>
                            </div>
                        </article>
                    @empty
                        <div class="empty-state">Belum ada profil NIK yang ditolak.</div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>

    <script>
        function initAdminVerificationPage() {
            const root = document.querySelector('.admin-verification-page');
            if (!root || root.dataset.ready === 'true') return;
            root.dataset.ready = 'true';

            const profileDropdown = root.querySelector('[data-profile-dropdown]');
            document.addEventListener('click', (event) => {
                if (profileDropdown && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.remove('is-open');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', initAdminVerificationPage);
        document.addEventListener('livewire:navigated', initAdminVerificationPage);
    </script>
</div>
