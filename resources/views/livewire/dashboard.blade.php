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

        /* HERO */
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

        /* SECTION */
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

        /* RECEIVER CARD */
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

        /* LOCATION CARDS */
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
            display: block;
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
            box-shadow: 0 5px 12px rgba(0,0,0,0.10);
        }

        .rating-pill i {
            color: #f59e0b;
            margin-right: 3px;
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
            box-shadow: 0 8px 18px rgba(0, 73, 52, 0.35);
            transition: 0.25s ease;
        }

        .add-circle:hover {
            color: #fff;
            transform: scale(1.08);
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
            align-items: center;
            gap: 10px;
            font-size: 11px;
            color: var(--text-muted);
        }

        .location-meta span {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .distance {
            color: var(--green-main);
            background: #eaf8ef;
            padding: 4px 8px;
            border-radius: 999px;
            font-weight: 800;
        }

        /* POPULAR */
        .popular-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
        }

        .popular-card {
            background: #fff;
            border: 1px solid var(--card-border);
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            gap: 14px;
            padding: 12px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
            transition: 0.25s ease;
            position: relative;
        }

        .popular-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(15, 23, 42, 0.10);
        }

        .popular-img {
            width: 116px;
            min-width: 116px;
            height: 116px;
            border-radius: 14px;
            overflow: hidden;
            background: var(--green-soft);
            position: relative;
        }

        .popular-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .popular-add {
            position: absolute;
            right: 7px;
            bottom: 7px;
            width: 28px;
            height: 28px;
            background: var(--green-dark);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            text-decoration: none;
        }

        .popular-add:hover {
            color: #fff;
        }

        .popular-content {
            flex: 1;
            padding: 4px 4px 0 0;
        }

        .popular-label {
            font-size: 9px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--green-main);
            margin-bottom: 5px;
        }

        .popular-label.orange {
            color: #f97316;
        }

        .popular-label.blue {
            color: #2563eb;
        }

        .popular-content h5 {
            font-size: 14px;
            font-weight: 800;
            margin: 0 0 6px;
            line-height: 1.3;
        }

        .popular-content p {
            font-size: 11px;
            color: var(--text-muted);
            line-height: 1.45;
            margin-bottom: 10px;
        }

        .popular-footer {
            display: flex;
            gap: 12px;
            align-items: center;
            font-size: 10px;
            color: var(--text-muted);
        }

        .popular-footer i {
            color: #f59e0b;
            margin-right: 3px;
        }

        /* HELP BOX */
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
            box-shadow: 0 14px 30px rgba(0, 73, 52, 0.18);
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
            white-space: nowrap;
        }

        .help-box a:hover {
            color: var(--green-main);
        }

        @media (max-width: 1200px) {
            .location-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .popular-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .rebox-dashboard {
                padding: 20px 16px 40px;
            }

            .hero-donation {
                padding: 28px 24px;
                border-radius: 20px;
            }

            .hero-donation h1 {
                font-size: 23px;
            }

            .receiver-grid,
            .location-grid,
            .popular-grid {
                grid-template-columns: 1fr;
            }

            .popular-card {
                flex-direction: column;
            }

            .popular-img {
                width: 100%;
                height: 150px;
            }

            .help-box {
                flex-direction: column;
                align-items: flex-start;
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
                Halo {{ explode(' ', auth()->user()->name ?? 'Azumardi')[0] }},
                Mau Donasi Apa Hari Ini?
            </h1>

            <p>
                Setiap langkah kecilmu memberikan dampak besar bagi lingkungan
                dan mereka yang membutuhkan.
            </p>

            <div class="hero-actions">
                <a href="/form-donasi" class="btn-hero-primary">
                    <i class="fas fa-hand-holding-heart"></i>
                    Donasi Sekarang
                </a>

                <a href="/riwayat" class="btn-hero-secondary">
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

        <a href="#" class="view-all-btn">
            Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
        </a>
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
        <h3 class="section-title">Terdekat</h3>

        <a href="#" class="view-all-btn">
            View all <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <div class="location-grid">
        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=700&q=80" alt="Rebox Cianjur">
                <div class="rating-pill"><i class="fas fa-star"></i>4.8</div>
                <a href="/form-donasi" class="add-circle"><i class="fas fa-plus"></i></a>
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
                <img src="https://images.unsplash.com/photo-1591196131703-9b636d6901d6?auto=format&fit=crop&w=700&q=80" alt="Rebox BuahBatu">
                <div class="rating-pill"><i class="fas fa-star"></i>4.5</div>
                <a href="/form-donasi" class="add-circle"><i class="fas fa-plus"></i></a>
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
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80" alt="Rebox Dago Atas">
                <div class="rating-pill"><i class="fas fa-star"></i>4.9</div>
                <a href="/form-donasi" class="add-circle"><i class="fas fa-plus"></i></a>
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
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=700&q=80" alt="Rebox Pasteuri">
                <div class="rating-pill"><i class="fas fa-star"></i>4.7</div>
                <a href="/form-donasi" class="add-circle"><i class="fas fa-plus"></i></a>
            </div>
            <div class="location-body">
                <h5>Rebox Pasteuri</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Pasteur</span>
                    <span class="distance">12 km</span>
                </div>
            </div>
        </div>
    </div>

    {{-- MOST POPULAR --}}
    <div class="section-row">
        <h3 class="section-title">Most Populer</h3>

        <a href="#" class="view-all-btn">
            View all <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <div class="popular-grid">
        <div class="popular-card">
            <div class="popular-img">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=700&q=80" alt="Pusat Donasi Thamrin">
                <a href="/form-donasi" class="popular-add"><i class="fas fa-plus"></i></a>
            </div>
            <div class="popular-content">
                <div class="popular-label">Top Rated</div>
                <h5>Pusat Donasi Thamrin</h5>
                <p>Layanan donasi pakaian dan barang layak pakai terpercaya.</p>
                <div class="popular-footer">
                    <span><i class="fas fa-star"></i>5.0</span>
                    <span><i class="fas fa-users"></i>1.2k Donors</span>
                </div>
            </div>
        </div>

        <div class="popular-card">
            <div class="popular-img">
                <img src="https://images.unsplash.com/photo-1556912173-3bb406ef7e77?auto=format&fit=crop&w=700&q=80" alt="Dapur Peduli Rakyat">
                <a href="/form-donasi" class="popular-add"><i class="fas fa-plus"></i></a>
            </div>
            <div class="popular-content">
                <div class="popular-label orange">Urgent Need</div>
                <h5>Dapur Peduli Rakyat</h5>
                <p>Fokus pada distribusi makanan untuk masyarakat kurang mampu.</p>
                <div class="popular-footer">
                    <span><i class="fas fa-star"></i>4.9</span>
                    <span><i class="fas fa-users"></i>850 Donors</span>
                </div>
            </div>
        </div>

        <div class="popular-card">
            <div class="popular-img">
                <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=700&q=80" alt="TechCycle Indonesia">
                <a href="/form-donasi" class="popular-add"><i class="fas fa-plus"></i></a>
            </div>
            <div class="popular-content">
                <div class="popular-label blue">E-Waste Focus</div>
                <h5>TechCycle Indonesia</h5>
                <p>Pusat daur ulang elektronik dan donasi gadget layak pakai.</p>
                <div class="popular-footer">
                    <span><i class="fas fa-star"></i>4.8</span>
                    <span><i class="fas fa-users"></i>3.4k Donors</span>
                </div>
            </div>
        </div>
    </div>

    {{-- HELP BOX --}}
    <div class="help-box">
        <div>
            <h4>Pusat Bantuan</h4>
            <p>Butuh bantuan cara donasi? Buka panduan agar proses donasimu lebih mudah.</p>
        </div>

        <a href="#">
            Buka Panduan
        </a>
    </div>
</div>