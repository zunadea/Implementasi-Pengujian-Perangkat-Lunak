<div class="rebox-dashboard">
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
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 18px;
            font-weight: 800;
            margin: 0;
            color: var(--text-dark);
        }

        .section-title i {
            color: var(--green-main);
            font-size: 16px;
        }

        .view-all-btn {
            background: var(--green-dark);
            color: #fff;
            border-radius: 9px;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .view-all-btn:hover {
            color: #fff;
            background: #006b38;
            transform: translateY(-2px);
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

        .location-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .location-card {
            background: #fff;
            border-radius: 18px;
            border: 1px solid var(--card-border);
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
            transition: 0.25s ease;
        }

        .location-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.10);
        }

        .location-image {
            position: relative;
            height: 142px;
            margin: 12px 12px 0;
            border-radius: 14px;
            overflow: hidden;
            background: var(--green-soft);
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
            background: rgba(255,255,255,0.92);
            color: #111827;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
        }

        .add-circle {
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 36px;
            height: 36px;
            background: var(--green-dark);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .location-body {
            padding: 14px 14px 16px;
        }

        .location-body h5 {
            font-size: 14px;
            font-weight: 800;
            margin: 0 0 8px;
        }

        .location-meta {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: var(--text-muted);
        }

        .distance {
            color: var(--green-main);
            background: #eaf8ef;
            padding: 4px 8px;
            border-radius: 999px;
            font-weight: 800;
        }

        .help-box {
            margin-top: 28px;
            background: linear-gradient(135deg, #004934, #006b43);
            color: #fff;
            border-radius: 20px;
            padding: 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
        }

        .help-box h4 {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .help-box p {
            margin: 0;
            font-size: 12px;
            color: rgba(255,255,255,0.72);
        }

        .help-box a {
            background: #fff;
            color: var(--green-main);
            padding: 11px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 900;
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
    </div>

    <div class="location-grid">

        {{-- CARD 1 --}}
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
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        Cianjur
                    </span>

                    <span class="distance">4 km</span>
                </div>
            </div>
        </div>

        {{-- CARD 2 --}}
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
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        BuahBatu
                    </span>

                    <span class="distance">1 km</span>
                </div>
            </div>
        </div>

        {{-- CARD 3 --}}
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
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        Dago
                    </span>

                    <span class="distance">8 km</span>
                </div>
            </div>
        </div>

        {{-- CARD 4 --}}
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
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        Pasteur
                    </span>

                    <span class="distance">12 km</span>
                </div>
            </div>
        </div>

    </div>

    {{-- HELP BOX --}}
    <div class="help-box">
        <div>
            <h4>Pusat Bantuan</h4>
            <p>
                Butuh bantuan cara donasi?
                Buka panduan agar proses donasimu lebih mudah.
            </p>
        </div>

        <a href="#">
            Buka Panduan
        </a>
    </div>

</div>