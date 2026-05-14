<div class="container-fluid px-3 py-2 request-page">

    {{-- Notifikasi Sukses --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mb-3 glass-alert" role="alert">
            <i class="fas fa-check-circle mr-2"></i> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- HEADER --}}
    <div class="request-hero mb-4">
        <div>
            <div class="small request-breadcrumb mb-2">
                Requests
                <i class="fas fa-chevron-right mx-1"></i>
                <span>Permintaan Barang</span>
            </div>

            <h1>Form Permintaan Barang</h1>
            <p>Lengkapi detail kebutuhan Anda untuk mendapatkan dukungan logistik dari ReBox.</p>
        </div>

        <div class="hero-icon">
            <i class="fas fa-hand-holding-heart"></i>
        </div>
    </div>

    {{-- MAIN CARD --}}
    <div class="main-glass-card">

        <div class="card-body p-4">

            {{-- Bagian Atas: Judul & Search --}}
            <div class="row align-items-center mb-4">
                <div class="col-lg-6">
                    <h4 class="section-title">
                        Pilih Lokasi Drop-off

                        @if($lokasi_hub)
                            <span class="badge selected-badge ml-2">
                                <i class="fas fa-check mr-1"></i> {{ $lokasi_hub }}
                            </span>
                        @endif
                    </h4>
                </div>

                {{-- SEARCH LOKASI --}}
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <div class="search-glass-wrap">
                        <i class="fas fa-search"></i>

                        <input type="text"
                            wire:model.live="search_lokasi"
                            placeholder="Ketik nama kecamatan di Bandung..."
                            class="form-control search-glass-input">

                        @if(count($results) > 0)
                            <div class="search-result-glass">
                                @foreach($results as $res)
                                    <div wire:click="selectLokasi('{{ $res }}')"
                                        class="result-item">
                                        <i class="fas fa-location-dot text-success mr-2"></i>
                                        {{ $res }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- CARD LOKASI --}}
            <div class="row mb-3">
                @php
                    $hubs = [
                        ['name' => 'Rebox Sudirman Central', 'dist' => '0.8 km', 'addr' => 'Jl. Jend. Sudirman No. 52, Jakarta Selatan', 'img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200'],
                        ['name' => 'Grand Indonesia Hub', 'dist' => '1.2 km', 'addr' => 'Lantai LG Barat, Menteng, Jakarta Pusat', 'img' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1200'],
                        ['name' => 'SCBD Office Park', 'dist' => '2.5 km', 'addr' => 'Gedung Artha Graha Lobby, Jakarta', 'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200']
                    ];
                @endphp

                @foreach($hubs as $hub)
                    <div class="col-lg-4 mb-3">
                        <div wire:click="setLokasi('{{ $hub['name'] }}')"
                            class="hub-card-glass {{ $lokasi_hub == $hub['name'] ? 'active' : '' }}">

                            <div class="hub-img-wrap">
                                <img src="{{ $hub['img'] }}">

                                <div class="dist-badge">
                                    <i class="fas fa-location-dot"></i>
                                    {{ $hub['dist'] }}
                                </div>

                                <button type="button" class="hub-action-btn">
                                    <i class="fas {{ $lokasi_hub == $hub['name'] ? 'fa-check' : 'fa-plus' }}"></i>
                                </button>
                            </div>

                            <div class="hub-body">
                                <h5>{{ $hub['name'] }}</h5>
                                <p>{{ $hub['addr'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @error('lokasi_hub')
                <div class="mb-3">
                    <small class="text-danger font-weight-bold">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        Silakan pilih salah satu lokasi hub di atas atau cari melalui kolom pencarian.
                    </small>
                </div>
            @enderror

            <hr class="my-4 dashed-line">

            {{-- FORM --}}
            <form wire:submit.prevent="submit">
                <div class="form-glass-card">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label-custom">
                                <i class="far fa-clipboard text-success mr-2"></i>
                                Nama Barang
                            </label>

                            <input type="text"
                                wire:model="nama_barang"
                                class="form-control glass-input @error('nama_barang') is-invalid @enderror"
                                placeholder="Contoh: Pakaian, Beras, dll">

                            @error('nama_barang')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label-custom">
                                <i class="fas fa-shapes text-success mr-2"></i>
                                Kategori Barang
                            </label>

                            <select wire:model="kategori"
                                class="form-control glass-input @error('kategori') is-invalid @enderror">
                                <option value="">Pilih kategori...</option>
                                <option value="Pakaian">Pakaian</option>
                                <option value="Edukasi">Edukasi</option>
                                <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                            </select>

                            @error('kategori')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label-custom">
                                <i class="fas fa-list-ol text-success mr-2"></i>
                                Jumlah
                            </label>

                            <div class="position-relative">
                                <input type="number"
                                    wire:model="jumlah"
                                    class="form-control glass-input @error('jumlah') is-invalid @enderror"
                                    placeholder="0">

                                <div class="pcs-badge">pcs</div>
                            </div>

                            @error('jumlah')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label-custom">
                                <i class="fas fa-triangle-exclamation text-success mr-2"></i>
                                Urgensi
                            </label>

                            <select wire:model="urgensi" class="form-control glass-input">
                                <option value="Normal">Normal</option>
                                <option value="Penting">Penting</option>
                                <option value="Mendesak">Mendesak</option>
                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <label class="form-label-custom">
                                <i class="far fa-file-lines text-success mr-2"></i>
                                Deskripsi Kebutuhan
                            </label>

                            <textarea wire:model="deskripsi"
                                class="form-control glass-input textarea-glass @error('deskripsi') is-invalid @enderror"
                                rows="4"
                                placeholder="Jelaskan detail barang yang Anda butuhkan..."></textarea>

                            @error('deskripsi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="d-flex justify-content-end align-items-center mt-2 action-wrapper">
                        <a href="{{ route('riwayat') }}"
                            wire:navigate
                            class="btn btn-light btn-cancel">
                            Batal
                        </a>

                        <button type="submit"
                            wire:loading.attr="disabled"
                            class="btn btn-submit-glass">
                            <span wire:loading.remove>
                                <i class="fas fa-paper-plane mr-2"></i>
                                Kirim Permintaan
                            </span>

                            <span wire:loading>
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                Memproses...
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        {{-- INFO PANEL --}}
        <div class="info-glass-panel">
            <div class="d-flex align-items-start">
                <i class="fas fa-circle-info text-success mt-1 mr-3"></i>

                <div>
                    <h5>Informasi Pengiriman</h5>
                    <p>
                        Dengan mengklik "Kirim Permintaan", Anda setuju untuk mengambil barang ke lokasi hub yang dipilih setelah disetujui.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTTOM TRACKING --}}
    <div class="bottom-glass-card mt-4">
        <div class="d-flex align-items-center">
            <div class="bottom-icon mr-3">
                <i class="fas fa-history"></i>
            </div>

            <div>
                <h5>Lihat riwayat permintaan Anda?</h5>
                <p>Pantau status barang secara real-time di panel penerima.</p>
            </div>
        </div>

        <a href="{{ route('riwayat') }}" wire:navigate>
            Buka Aktivitas Saya
            <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <style>
        .request-page {
            background:
                radial-gradient(circle at top right, rgba(0, 132, 61, 0.08), transparent 30%),
                radial-gradient(circle at bottom left, rgba(0, 132, 61, 0.06), transparent 30%);
        }

        .glass-alert {
            border-radius: 18px;
            background: rgba(238, 251, 242, 0.75);
            border: 1px solid rgba(215, 242, 223, 0.9);
            color: #14532d;
            backdrop-filter: blur(12px);
        }

        .request-hero {
            border-radius: 28px;
            padding: 28px 30px;
            background:
                linear-gradient(135deg, rgba(255,255,255,0.70), rgba(255,255,255,0.35));
            border: 1px solid rgba(255,255,255,0.75);
            backdrop-filter: blur(18px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .request-breadcrumb {
            font-size: 12px;
            font-weight: 700;
            color: #64748b;
        }

        .request-breadcrumb i {
            font-size: 8px;
        }

        .request-breadcrumb span {
            color: #00743f;
        }

        .request-hero h1 {
            font-size: 30px;
            font-weight: 850;
            color: #17212b;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .request-hero p {
            color: #64748b;
            margin: 0;
            font-size: 14px;
        }

        .hero-icon {
            width: 58px;
            height: 58px;
            border-radius: 20px;
            background: rgba(0, 132, 61, 0.12);
            color: #00743f;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .main-glass-card {
            border-radius: 28px;
            overflow: hidden;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(255,255,255,0.72);
            backdrop-filter: blur(20px);
            box-shadow: 0 18px 45px rgba(15,23,42,0.08);
        }

        .section-title {
            font-size: 22px;
            font-weight: 850;
            color: #17212b;
            margin: 0;
        }

        .selected-badge {
            font-size: 11px;
            border-radius: 999px;
            background-color: #00743f;
            padding: 6px 11px;
            color: #fff;
        }

        .search-glass-wrap {
            position: relative;
        }

        .search-glass-wrap > i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            z-index: 10;
        }

        .search-glass-input {
            height: 50px;
            border-radius: 16px;
            background: rgba(248,249,251,0.78);
            border: 1px solid rgba(226,232,240,0.9);
            padding-left: 48px;
            font-size: 14px;
            transition: 0.25s ease;
        }

        .search-glass-input:focus {
            background: rgba(255,255,255,0.95);
            border-color: #00843d;
            box-shadow: 0 0 0 4px rgba(0,132,61,0.10);
        }

        .search-result-glass {
            position: absolute;
            width: 100%;
            margin-top: 8px;
            z-index: 1000;
            border-radius: 16px;
            background: rgba(255,255,255,0.96);
            border: 1px solid rgba(226,232,240,0.9);
            box-shadow: 0 18px 35px rgba(15,23,42,0.14);
            max-height: 250px;
            overflow-y: auto;
            backdrop-filter: blur(16px);
        }

        .result-item {
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s ease;
            padding: 12px 16px;
            border-bottom: 1px solid rgba(226,232,240,0.8);
        }

        .result-item:hover {
            background-color: #f0f9f4 !important;
            color: #00743f !important;
            transform: translateX(4px);
        }

        .hub-card-glass {
            border-radius: 22px;
            border: 1px solid rgba(231,237,242,0.85);
            cursor: pointer;
            overflow: hidden;
            height: 100%;
            position: relative;
            background: rgba(255,255,255,0.72);
            backdrop-filter: blur(16px);
            transition: 0.28s ease;
            box-shadow: 0 10px 24px rgba(15,23,42,0.04);
        }

        .hub-card-glass:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 38px rgba(15,23,42,0.10);
            border-color: rgba(0,132,61,0.35);
        }

        .hub-card-glass.active {
            background: rgba(240,249,244,0.95);
            border: 2px solid #00743f;
            box-shadow: 0 18px 36px rgba(0,116,63,0.13);
        }

        .hub-img-wrap {
            position: relative;
            overflow: hidden;
        }

        .hub-img-wrap img {
            height: 145px;
            width: 100%;
            object-fit: cover;
            transition: 0.35s ease;
        }

        .hub-card-glass:hover img {
            transform: scale(1.05);
        }

        .dist-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: rgba(255,255,255,0.94);
            padding: 6px 10px;
            display: flex;
            align-items: center;
            gap: 6px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            box-shadow: 0 4px 12px rgba(0,0,0,.10);
            backdrop-filter: blur(10px);
        }

        .dist-badge i {
            color: #00843d;
        }

        .hub-action-btn {
            right: 14px;
            bottom: 14px;
            width: 44px;
            height: 44px;
            background: #00743f;
            border: none;
            transition: 0.3s;
            position: absolute;
            border-radius: 50%;
            color: #fff;
            box-shadow: 0 10px 18px rgba(0,116,63,.22);
        }

        .hub-card-glass.active .hub-action-btn {
            background: #ffc107;
            color: #17212b;
        }

        .hub-card-glass:hover .hub-action-btn {
            transform: scale(1.08) rotate(6deg);
        }

        .hub-body {
            padding: 17px;
        }

        .hub-body h5 {
            font-size: 17px;
            font-weight: 850;
            color: #17212b;
            margin-bottom: 6px;
        }

        .hub-body p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.45;
            margin-bottom: 0;
        }

        .dashed-line {
            border-top: 1px dashed #dbe5ec;
        }

        .form-glass-card {
            border-radius: 24px;
            background: rgba(248,250,252,0.56);
            border: 1px solid rgba(226,232,240,0.70);
            padding: 24px;
        }

        .form-label-custom {
            font-size: 14px;
            font-weight: 850;
            color: #374151;
            margin-bottom: 10px;
        }

        .glass-input {
            height: 54px;
            border-radius: 17px;
            background: rgba(255,255,255,0.68);
            border: 1px solid rgba(226,232,240,0.95);
            font-size: 14px;
            padding: 0 18px;
            transition: 0.25s ease;
        }

        .glass-input:focus {
            background: #fff;
            border-color: #00843d;
            box-shadow: 0 0 0 4px rgba(0,132,61,0.10);
            transform: translateY(-1px);
        }

        .textarea-glass {
            height: auto;
            padding: 18px;
            min-height: 120px;
        }

        .pcs-badge {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 9px;
            background: rgba(255,255,255,0.88);
            border: 1px solid #e4e9ef;
            font-size: 11px;
            font-weight: 800;
            color: #94a3b8;
            padding: 5px 9px;
        }

        .action-wrapper {
            gap: 12px;
        }

        .btn-cancel {
            height: 50px;
            border-radius: 16px;
            border: 1px solid #dfe5eb;
            font-weight: 800;
            font-size: 14px;
            color: #4b5563;
            min-width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-submit-glass {
            height: 50px;
            border-radius: 16px;
            background: linear-gradient(135deg, #00843d, #006b38);
            border: none;
            color: #fff;
            font-weight: 850;
            font-size: 14px;
            padding: 0 36px;
            box-shadow: 0 10px 20px rgba(0,116,63,.18);
            transition: 0.25s ease;
        }

        .btn-submit-glass:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 16px 26px rgba(0,116,63,.24);
        }

        .info-glass-panel {
            padding: 18px 24px;
            background: rgba(250,252,253,0.72);
            border-top: 1px solid rgba(237,241,245,0.9);
        }

        .info-glass-panel i {
            font-size: 18px;
        }

        .info-glass-panel h5 {
            font-size: 14px;
            font-weight: 850;
            color: #374151;
            margin-bottom: 3px;
        }

        .info-glass-panel p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .bottom-glass-card {
            padding: 18px;
            background: rgba(238,251,242,0.72);
            border: 1px solid rgba(215,242,223,0.95);
            border-radius: 22px;
            backdrop-filter: blur(16px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
            box-shadow: 0 12px 24px rgba(15,23,42,0.04);
        }

        .bottom-icon {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: #d5f4de;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #00843d;
            flex-shrink: 0;
        }

        .bottom-glass-card h5 {
            font-size: 14px;
            font-weight: 850;
            color: #14532d;
            margin-bottom: 2px;
        }

        .bottom-glass-card p {
            color: #198754;
            font-size: 11px;
            margin-bottom: 0;
        }

        .bottom-glass-card a {
            font-weight: 800;
            font-size: 13px;
            color: #00743f;
            text-decoration: none;
        }

        .search-result-glass::-webkit-scrollbar {
            width: 6px;
        }

        .search-result-glass::-webkit-scrollbar-thumb {
            background: #e4e9ef;
            border-radius: 10px;
        }

        @media(max-width: 768px) {
            .request-hero {
                flex-direction: column;
                align-items: flex-start;
            }

            .request-hero h1 {
                font-size: 25px;
            }

            .form-glass-card {
                padding: 18px;
            }

            .action-wrapper {
                flex-direction: column;
                align-items: stretch !important;
            }

            .btn-cancel,
            .btn-submit-glass {
                width: 100%;
            }
        }
    </style>
</div>