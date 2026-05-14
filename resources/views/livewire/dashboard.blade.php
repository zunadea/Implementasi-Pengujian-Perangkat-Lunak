<div class="rebox-dashboard">

    @if (session()->has('message'))
        <div id="successToast" class="glass-toast">
            <div class="d-flex align-items-center">
                <div class="toast-icon me-3">
                    <i class="fas fa-circle-check"></i>
                </div>

                <div class="flex-grow-1">
                    <h6 class="toast-title mb-1">Login Berhasil</h6>
                    <p class="toast-text mb-0">{{ session('message') }}</p>
                </div>
            </div>

            <div class="toast-progress">
                <span></span>
            </div>
        </div>
    @endif

    <style>
        :root {
            --green-dark: #004934;
            --green-main: #007a3d;
            --green-soft: #e9f8ef;
            --green-light: #f4fbf7;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --card-border: #edf2f0;
            --bg-main: #f5f7fb;
        }

        body {
            background: var(--bg-main);
        }

        .rebox-dashboard {
            padding: 28px 30px 50px;
            font-family: 'Inter', 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        .glass-toast {
            position: fixed;
            top: 24px;
            right: 28px;
            z-index: 9999;
            width: 360px;
            max-width: calc(100% - 32px);
            padding: 18px 20px;
            border-radius: 24px;
            background: rgba(255,255,255,0.55);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.45);
            box-shadow:
                0 18px 45px rgba(0,0,0,0.10),
                inset 0 1px 1px rgba(255,255,255,0.45);
            animation: toastShow 0.45s ease;
            transition: all 0.4s ease;
        }

        .glass-toast.hide-toast {
            opacity: 0;
            transform: translateY(-18px) scale(0.96);
            pointer-events: none;
        }

        .toast-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(0,122,61,0.12);
            color: #007a3d;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 20px;
            box-shadow:
                inset 0 1px 1px rgba(255,255,255,0.5),
                0 8px 20px rgba(0,122,61,0.12);
        }

        .toast-title {
            font-size: 15px;
            font-weight: 800;
            color: #111827;
        }

        .toast-text {
            font-size: 13px;
            line-height: 1.5;
            color: #6b7280;
        }

        .toast-progress {
            width: 100%;
            height: 4px;
            background: rgba(0,122,61,0.12);
            border-radius: 999px;
            overflow: hidden;
            margin-top: 16px;
        }

        .toast-progress span {
            display: block;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #007a3d, #00b35c);
            border-radius: 999px;
            animation: toastProgress 4s linear forwards;
        }

        @keyframes toastShow {
            from {
                opacity: 0;
                transform: translateY(-22px) scale(0.94);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes toastProgress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }

        .hero-donation {
            background:
                radial-gradient(circle at top right, rgba(255,255,255,0.16), transparent 30%),
                linear-gradient(135deg, #006b38 0%, #008c45 55%, #006633 100%);
            border-radius: 24px;
            padding: 34px 38px;
            color: #fff;
            box-shadow: 0 16px 35px rgba(0, 77, 54, 0.22);
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .hero-donation::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            right: -80px;
            top: -110px;
            border-radius: 50%;
            background: rgba(255,255,255,0.09);
        }

        .hero-donation::after {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            right: 120px;
            bottom: -90px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 620px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.16);
            border: 1px solid rgba(255,255,255,0.18);
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .hero-donation h1 {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 12px;
            letter-spacing: -0.4px;
        }

        .hero-donation p {
            font-size: 15px;
            line-height: 1.7;
            color: rgba(255,255,255,0.82);
            margin-bottom: 26px;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-hero-primary,
        .btn-hero-secondary {
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
            transition: 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 9px;
        }

        .btn-hero-primary {
            background: #fff;
            color: var(--green-main);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }

        .btn-hero-primary:hover {
            color: var(--green-main);
            transform: translateY(-2px);
        }

        .btn-hero-secondary {
            background: rgba(255,255,255,0.10);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.18);
        }

        .btn-hero-secondary:hover {
            color: #fff;
            background: rgba(255,255,255,0.18);
            transform: translateY(-2px);
        }

        .section-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 28px 0 16px;
            gap: 14px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 800;
            margin: 0;
            color: #1f2937;
        }

        .section-title i {
            color: #007a3d;
        }

        .receiver-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 10px;
        }

        .receiver-card {
            background: #fff;
            border: 1px solid var(--card-border);
            border-radius: 18px;
            padding: 22px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.04);
            transition: 0.25s ease;
        }

        .receiver-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
        }

        .receiver-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
        }

        .receiver-icon.green {
            background: #e7f8ed;
            color: #008c45;
        }

        .receiver-icon.blue {
            background: #eef4ff;
            color: #2563eb;
        }

        .receiver-icon.orange {
            background: #fff3e7;
            color: #f97316;
        }

        .receiver-card h5 {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .receiver-card p {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.55;
            margin: 0;
        }

        .view-all-glass {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 18px;
            background: rgba(233, 248, 239, 0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 122, 61, 0.18);
            color: #007a3d !important;
            font-size: 13px;
            font-weight: 800;
            text-decoration: none !important;
            box-shadow:
                0 10px 24px rgba(0, 122, 61, 0.10),
                inset 0 1px 1px rgba(255, 255, 255, 0.45);
            transition: all 0.25s ease;
        }

        .view-all-glass i {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(0, 122, 61, 0.12);
            color: #007a3d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: all 0.25s ease;
        }

        .view-all-glass:hover {
            color: #004934 !important;
            transform: translateY(-2px);
            box-shadow:
                0 16px 30px rgba(0, 122, 61, 0.16),
                inset 0 1px 1px rgba(255, 255, 255, 0.55);
        }

        .view-all-glass:hover i {
            background: #007a3d;
            color: #ffffff;
            transform: translateX(3px);
        }

        .location-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .location-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(18px);
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, 0.75);
            overflow: hidden;
            box-shadow:
                0 10px 26px rgba(15, 23, 42, 0.06),
                inset 0 1px 1px rgba(255, 255, 255, 0.45);
            transition: 0.25s ease;
        }

        .location-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 18px 35px rgba(15, 23, 42, 0.10),
                inset 0 1px 1px rgba(255, 255, 255, 0.55);
        }

        .location-image {
            position: relative;
            height: 142px;
            margin: 12px 12px 0;
            border-radius: 16px;
            overflow: hidden;
            background: #e9f8ef;
        }

        .location-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .rating-pill {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(10px);
            color: #111827;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            box-shadow: 0 5px 14px rgba(0, 0, 0, 0.08);
        }

        .add-circle {
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 42px;
            height: 42px;
            background: rgba(0, 73, 52, 0.88);
            backdrop-filter: blur(14px);
            color: #ffffff !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 22px rgba(0, 73, 52, 0.28);
            transition: 0.25s ease;
        }

        .add-circle:hover {
            transform: scale(1.08) rotate(8deg);
            background: #007a3d;
        }

        .location-body {
            padding: 15px 16px 18px;
        }

        .location-body h5 {
            font-size: 16px;
            font-weight: 800;
            margin: 0 0 9px;
            color: #1f2937;
        }

        .location-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            color: #6b7280;
        }

        .location-meta span:first-child {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .location-meta i {
            color: #6b7280;
        }

        .distance {
            color: #007a3d !important;
            background: rgba(233, 248, 239, 0.9);
            padding: 5px 10px;
            border-radius: 999px;
            font-weight: 800;
            white-space: nowrap;
        }

        @media(max-width: 1200px) {
            .location-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 768px) {
            .glass-toast {
                left: 16px;
                right: 16px;
                width: auto;
                top: 18px;
            }

            .receiver-grid {
                grid-template-columns: 1fr;
            }

            .section-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .view-all-glass {
                width: 100%;
            }

            .location-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    {{-- HERO --}}
    <div class="hero-donation">
        <div class="hero-content">

            <span class="hero-badge">
                <i class="fas fa-leaf"></i>
                Available Now
            </span>

            <h1>
                Halo {{ explode(' ', auth()->user()->name ?? 'User')[0] }},
                Mau Donasi Apa Hari Ini?
            </h1>

            <p>
                Setiap langkah kecilmu memberikan dampak besar bagi lingkungan
                dan mereka yang membutuhkan.
            </p>

            <div class="hero-actions">
                <a href="{{ route('form-donasi', ['name' => 'Rebox BuahBatu']) }}"
                   class="btn-hero-primary"
                   wire:navigate>
                    <i class="fas fa-hand-holding-heart"></i>
                    Donasi Sekarang
                </a>

                <a href="/riwayat"
                   class="btn-hero-secondary"
                   wire:navigate>
                    <i class="fas fa-clock-rotate-left"></i>
                    Lihat Riwayat
                </a>
            </div>

        </div>
    </div>

    {{-- DAFTAR PENERIMA --}}
    <div class="section-row">
        <h3 class="section-title">
            <i class="fas fa-hand-holding-heart"></i>
            Daftar Penerima
        </h3>
    </div>

    <div class="receiver-grid">

        <div class="receiver-card">
            <div class="receiver-icon green">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h5>Komunitas</h5>
                <p>Berbagi komunitas lokal yang membutuhkan dukungan operasional.</p>
            </div>
        </div>

        <div class="receiver-card">
            <div class="receiver-icon blue">
                <i class="fas fa-child"></i>
            </div>
            <div>
                <h5>Panti Asuhan</h5>
                <p>Membantu pemenuhan kebutuhan dasar dan pendidikan anak yatim.</p>
            </div>
        </div>

        <div class="receiver-card">
            <div class="receiver-icon orange">
                <i class="fas fa-person-cane"></i>
            </div>
            <div>
                <h5>Panti Jompo</h5>
                <p>Memberi kenyamanan dan perawatan bagi lansia yang membutuhkan.</p>
            </div>
        </div>

    </div>

    {{-- TERDEKAT --}}
    <div class="section-row">
        <h3 class="section-title">
            <i class="fas fa-location-dot"></i>
            Titik Rebox Terdekat
        </h3>

        <a href="/lokasi-rebox" wire:navigate class="view-all-glass">
            <span>Lihat Semua</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <div class="location-grid">

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.8
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox Cianjur']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox Cianjur</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Cianjur</span>
                    <span class="distance">4 km</span>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1591196131703-9b636d6901d6?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.5
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox BuahBatu']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox BuahBatu</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> BuahBatu</span>
                    <span class="distance">1 km</span>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.9
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox Dago Atas']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox Dago Atas</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Dago</span>
                    <span class="distance">8 km</span>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.7
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox Pasteur']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox Pasteur</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Pasteur</span>
                    <span class="distance">12 km</span>
                </div>
            </div>
        </div>

    </div>

    <script>
        function initDashboardToast() {
            const toast = document.querySelector('#successToast');

            if (toast) {
                setTimeout(() => {
                    toast.classList.add('hide-toast');
                }, 4000);

                setTimeout(() => {
                    toast.remove();
                }, 4500);
            }
        }

        document.addEventListener('DOMContentLoaded', initDashboardToast);
        document.addEventListener('livewire:navigated', initDashboardToast);
    </script>
</div>