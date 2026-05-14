<div class="lokasi-page">
    <style>
        :root {
            --green-dark: #004934;
            --green-main: #007a3d;
            --green-soft: #e9f8ef;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
        }

        .lokasi-page {
            padding: 28px 30px 60px;
            font-family: 'Inter', 'Poppins', sans-serif;
        }

        .lokasi-hero {
            border-radius: 28px;
            padding: 34px;
            padding-bottom: 70px;
            color: white;
            background:
                radial-gradient(circle at top right, rgba(255,255,255,0.18), transparent 30%),
                linear-gradient(135deg, #004934, #008c45);
            box-shadow: 0 18px 38px rgba(0,73,52,0.20);
            margin-bottom: 0;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: white;
            text-decoration: none;
            font-weight: 800;
            margin-bottom: 20px;
            opacity: .9;
        }

        .back-link:hover {
            color: white;
            opacity: 1;
        }

        .lokasi-hero h1 {
            font-size: 34px;
            font-weight: 850;
            margin-bottom: 10px;
        }

        .lokasi-hero p {
            max-width: 720px;
            opacity: .86;
            margin: 0;
            line-height: 1.7;
        }

        .search-card {
            position: relative;
            z-index: 2;
            margin: -38px 0 26px;
            padding: 18px;
            border-radius: 24px;
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.85);
            box-shadow: 0 16px 34px rgba(15,23,42,0.08);
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-box input {
            width: 100%;
            height: 52px;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            background: rgba(255,255,255,0.9);
            padding: 0 18px 0 50px;
            font-size: 14px;
            outline: none;
            transition: .25s ease;
        }

        .search-box input:focus {
            border-color: var(--green-main);
            box-shadow: 0 0 0 4px rgba(0,122,61,0.10);
        }

        .lokasi-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 16px;
        }

        .lokasi-card {
            border-radius: 20px;
            overflow: hidden;
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,0.85);
            box-shadow: 0 10px 24px rgba(15,23,42,0.06);
            transition: .25s ease;
        }

        .lokasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 32px rgba(15,23,42,0.11);
        }

        .lokasi-img {
            position: relative;
            height: 125px;
            margin: 10px;
            border-radius: 16px;
            overflow: hidden;
            background: #f1f5f9;
        }

        .lokasi-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .rating {
            position: absolute;
            top: 9px;
            right: 9px;
            padding: 6px 10px;
            border-radius: 999px;
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(10px);
            font-size: 11px;
            font-weight: 800;
            box-shadow: 0 6px 14px rgba(0,0,0,0.08);
        }

        .lokasi-body {
            padding: 2px 14px 16px;
        }

        .lokasi-body h4 {
            font-size: 14px;
            font-weight: 850;
            margin-bottom: 6px;
            color: var(--text-dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .lokasi-body p {
            color: var(--text-muted);
            font-size: 11.5px;
            margin-bottom: 10px;
            line-height: 1.5;
            min-height: 34px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .lokasi-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            font-size: 11.5px;
            color: var(--text-muted);
        }

        .lokasi-meta span:first-child {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .distance {
            flex-shrink: 0;
            color: var(--green-main);
            background: var(--green-soft);
            padding: 5px 9px;
            border-radius: 999px;
            font-weight: 800;
        }

        .donasi-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            width: 100%;
            height: 38px;
            border-radius: 13px;
            background: linear-gradient(135deg, #007a3d, #004934);
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 850;
            box-shadow: 0 10px 20px rgba(0,122,61,0.18);
            transition: .25s ease;
        }

        .donasi-btn:hover {
            color: white;
            transform: translateY(-2px);
        }

        .empty-state {
            padding: 50px;
            text-align: center;
            border-radius: 24px;
            background: white;
            color: var(--text-muted);
        }

        @media(max-width: 1400px) {
            .lokasi-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media(max-width: 1100px) {
            .lokasi-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media(max-width: 768px) {
            .lokasi-page {
                padding: 20px 16px 50px;
            }

            .lokasi-hero {
                padding: 26px;
                padding-bottom: 60px;
            }

            .lokasi-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }

            .lokasi-hero h1 {
                font-size: 26px;
            }

            .lokasi-img {
                height: 120px;
            }
        }

        @media(max-width: 520px) {
            .lokasi-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="lokasi-hero">
        <a href="/dashboard" wire:navigate class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Dashboard
        </a>

        <h1>Cari Lokasi Rebox</h1>
        <p>
            Temukan titik Rebox terdekat untuk menyalurkan barang bekas layak pakai
            agar bisa bermanfaat bagi penerima.
        </p>
    </div>

    <div class="search-card">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text"
                   wire:model.live="search"
                   placeholder="Cari lokasi, area, atau alamat Rebox...">
        </div>
    </div>

    @if(count($this->filteredLokasi) > 0)
        <div class="lokasi-grid">
            @foreach($this->filteredLokasi as $item)
                <div class="lokasi-card">
                    <div class="lokasi-img">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">

                        <div class="rating">
                            <i class="fas fa-star text-warning"></i>
                            {{ $item['rating'] }}
                        </div>
                    </div>

                    <div class="lokasi-body">
                        <h4>{{ $item['name'] }}</h4>

                        <p>{{ $item['address'] }}</p>

                        <div class="lokasi-meta">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $item['area'] }}
                            </span>

                            <span class="distance">
                                {{ $item['distance'] }}
                            </span>
                        </div>

                        <a href="{{ route('form-donasi', ['name' => $item['name']]) }}"
                           wire:navigate
                           class="donasi-btn">
                            <i class="fas fa-plus"></i>
                            Donasi
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-map-location-dot fa-2x mb-3"></i>
            <h5 class="fw-bold">Lokasi tidak ditemukan</h5>
            <p class="mb-0">Coba cari dengan kata kunci lain.</p>
        </div>
    @endif
</div>