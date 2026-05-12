<div class="rebox-form-page">

    <style>
        :root{
            --green-dark:#004934;
            --green-main:#00843d;
            --green-soft:#eaf8ef;
            --green-light:#f6fcf8;
            --bg:#f5f7fb;
            --text:#1f2937;
            --muted:#6b7280;
            --border:#e6edf5;
        }

        body{
            background:var(--bg);
        }

        .rebox-form-page{
            padding:28px 30px 60px;
            font-family:'Inter','Poppins',sans-serif;
            color:var(--text);
        }

        .top-back{
            display:inline-flex;
            align-items:center;
            gap:10px;
            text-decoration:none;
            color:var(--green-dark);
            font-weight:700;
            margin-bottom:22px;
            font-size:16px;
        }

        .top-back:hover{
            color:var(--green-main);
        }

        /* HERO */
        .form-hero{
            background:
                radial-gradient(circle at top right, rgba(255,255,255,.15), transparent 30%),
                linear-gradient(135deg,#006b38,#008c45);
            border-radius:30px;
            padding:36px;
            color:white;
            position:relative;
            overflow:hidden;
            margin-bottom:28px;
        }

        .form-hero::before{
            content:"";
            position:absolute;
            width:260px;
            height:260px;
            border-radius:50%;
            background:rgba(255,255,255,.07);
            right:-70px;
            top:-80px;
        }

        .hero-badge{
            display:inline-flex;
            align-items:center;
            gap:8px;
            background:rgba(255,255,255,.15);
            border:1px solid rgba(255,255,255,.2);
            padding:8px 16px;
            border-radius:999px;
            font-size:12px;
            font-weight:800;
            margin-bottom:18px;
        }

        .form-hero h1{
            font-size:38px;
            font-weight:800;
            margin-bottom:10px;
        }

        .form-hero p{
            margin:0;
            max-width:720px;
            color:rgba(255,255,255,.9);
            line-height:1.7;
        }

        /* STEP */
        .step-wrapper{
            display:flex;
            gap:16px;
            margin-bottom:28px;
            flex-wrap:wrap;
        }

        .step-card{
            flex:1;
            min-width:220px;
            background:white;
            border-radius:22px;
            padding:18px;
            border:1px solid var(--border);
            display:flex;
            align-items:center;
            gap:14px;
            box-shadow:0 8px 20px rgba(15,23,42,.04);
        }

        .step-number{
            width:45px;
            height:45px;
            border-radius:50%;
            background:var(--green-soft);
            color:var(--green-main);
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:800;
        }

        .step-card h6{
            margin:0 0 4px;
            font-size:15px;
            font-weight:800;
        }

        .step-card p{
            margin:0;
            font-size:13px;
            color:var(--muted);
        }

        /* MAIN CARD */
        .main-card{
            background:white;
            border-radius:30px;
            padding:32px;
            border:1px solid #edf2f7;
            box-shadow:0 14px 35px rgba(15,23,42,.05);
        }

        .section-title{
            margin-bottom:26px;
        }

        .section-title h2{
            font-size:32px;
            font-weight:800;
            margin-bottom:6px;
            color:var(--green-dark);
        }

        .section-title p{
            margin:0;
            color:var(--muted);
        }

        /* NEW SEARCH & REGION STYLES */
        .search-location-wrapper {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        .search-input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input-group i {
            position: absolute;
            left: 18px;
            color: var(--green-main);
            font-size: 18px;
        }

        .search-input-group .form-control-custom {
            padding-left: 50px;
            height: 58px;
            font-size: 16px;
            border-radius: 20px;
            width: 100%;
        }

        .region-select-group .form-select-custom {
            height: 58px;
            font-size: 16px;
            border-radius: 20px;
            cursor: pointer;
            width: 100%;
        }

        /* SELECTED LOCATION PREVIEW */
        .selected-location-box {
            background: var(--green-soft);
            border: 2px solid var(--green-main);
            border-radius: 22px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
            animation: fadeIn 0.3s ease;
        }

        .loc-meta {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .loc-icon {
            width: 50px;
            height: 50px;
            background: var(--green-main);
            color: white;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .loc-details h6 {
            margin: 0;
            font-size: 18px;
            font-weight: 800;
            color: var(--green-dark);
        }

        .loc-details p {
            margin: 2px 0 0;
            font-size: 14px;
            color: var(--green-main);
            font-weight: 600;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* FORM GRID */
        .form-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:28px;
        }

        .form-section{
            border:1px solid #edf2f7;
            border-radius:24px;
            padding:24px;
        }

        .mini-title{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:24px;
        }

        .mini-title .icon{
            width:44px;
            height:44px;
            border-radius:14px;
            background:var(--green-soft);
            color:var(--green-main);
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .mini-title h5{
            margin:0;
            font-size:20px;
            font-weight:800;
        }

        .mini-title p{
            margin:2px 0 0;
            color:var(--muted);
            font-size:13px;
        }

        .form-group{
            margin-bottom:22px;
        }

        .form-label{
            display:block;
            margin-bottom:10px;
            font-size:14px;
            font-weight:700;
        }

        .form-control-custom,
        .form-select-custom,
        .textarea-custom{
            width:100%;
            border:1px solid #dbe3ec;
            background:#f8fafc;
            border-radius:16px;
            padding:15px 16px;
            font-size:14px;
            transition:.2s ease;
        }

        .form-control-custom:focus,
        .form-select-custom:focus,
        .textarea-custom:focus{
            outline:none;
            background:white;
            border-color:var(--green-main);
        }

        .textarea-custom{
            min-height:180px;
            resize:none;
        }

        /* UPLOAD */
        .upload-box{
            border:2px dashed #cbd5e1;
            background:#f8fafc;
            border-radius:22px;
            padding:30px;
            text-align:center;
            position:relative;
            overflow:hidden;
            transition:.2s ease;
        }

        .upload-box:hover{
            border-color:var(--green-main);
            background:var(--green-light);
        }

        .upload-box img{
            width:100%;
            max-height:260px;
            object-fit:cover;
            border-radius:18px;
        }

        .upload-placeholder i{
            font-size:54px;
            color:var(--green-main);
            margin-bottom:14px;
        }

        .upload-placeholder h6{
            font-size:20px;
            font-weight:800;
            margin-bottom:6px;
        }

        .upload-placeholder p{
            margin:0;
            color:var(--muted);
        }

        /* CONDITION */
        .condition-group{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
        }

        .condition-btn{
            flex:1;
            min-width:120px;
            border:1px solid #d7dee7;
            background:white;
            border-radius:18px;
            padding:15px;
            font-size:14px;
            font-weight:800;
            transition:.2s ease;
        }

        .condition-btn:hover{
            transform:translateY(-2px);
        }

        .condition-btn.active{
            background:var(--green-main);
            color:white;
            border-color:var(--green-main);
            box-shadow:0 10px 20px rgba(0,122,61,.2);
        }

        /* INFO BOX */
        .info-box{
            margin-top:26px;
            background:#ebf8ef;
            border:1px solid #cfeeda;
            border-radius:22px;
            padding:22px;
            display:flex;
            gap:16px;
        }

        .info-icon{
            width:46px;
            height:46px;
            border-radius:50%;
            background:var(--green-main);
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-shrink:0;
        }

        .info-box h6{
            margin-bottom:6px;
            font-weight:800;
            color:var(--green-dark);
        }

        .info-box p{
            margin:0;
            color:#4b5563;
            font-size:14px;
            line-height:1.7;
        }

        /* FOOTER */
        .bottom-submit{
            margin-top:30px;
            background:white;
            border:1px solid #edf2f7;
            border-radius:24px;
            padding:24px 28px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:20px;
            box-shadow:0 10px 24px rgba(15,23,42,.05);
        }

        .bottom-submit h5{
            margin-bottom:4px;
            font-size:24px;
            font-weight:800;
        }

        .bottom-submit p{
            margin:0;
            color:var(--muted);
        }

        .submit-actions{
            display:flex;
            gap:14px;
        }

        .btn-draft,
        .btn-submit{
            border-radius:16px;
            padding:14px 26px;
            font-size:14px;
            font-weight:800;
            transition:.2s ease;
        }

        .btn-draft{
            background:white;
            border:1px solid var(--green-main);
            color:var(--green-main);
            text-decoration:none;
        }

        .btn-submit{
            background:var(--green-main);
            color:white;
            border:none;
            box-shadow:0 10px 20px rgba(0,122,61,.2);
            cursor: pointer;
        }

        .btn-submit:hover{
            transform:translateY(-2px);
        }

        @media(max-width:992px){
            .form-grid{
                grid-template-columns:1fr;
            }
            .bottom-submit{
                flex-direction:column;
                align-items:flex-start;
            }
            .submit-actions{
                width:100%;
                flex-direction:column;
            }
            .btn-draft,
            .btn-submit{
                width:100%;
            }
        }

        @media(max-width:768px){
            .rebox-form-page{
                padding:20px 16px 50px;
            }
            .form-hero{
                padding:28px;
            }
            .form-hero h1{
                font-size:28px;
            }
            .section-title h2{
                font-size:26px;
            }
            .search-location-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <a href="/dashboard" wire:navigate class="top-back">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Dashboard
    </a>

    {{-- HERO --}}
    <div class="form-hero">
        <span class="hero-badge">
            <i class="fas fa-hand-holding-heart"></i>
            Form Donasi Rebox
        </span>
        <h1>Donasi Barang Jadi Lebih Mudah</h1>
        <p>
            Lengkapi informasi barang dengan jelas agar proses verifikasi,
            penjemputan, dan penyaluran berjalan lebih cepat.
        </p>
    </div>

    {{-- STEP --}}
    <div class="step-wrapper">
        <div class="step-card">
            <div class="step-number">1</div>
            <div>
                <h6>Pilih Lokasi</h6>
                <p>Tentukan titik Rebox terdekat</p>
            </div>
        </div>
        <div class="step-card">
            <div class="step-number">2</div>
            <div>
                <h6>Isi Detail Barang</h6>
                <p>Lengkapi informasi donasi</p>
            </div>
        </div>
        <div class="step-card">
            <div class="step-number">3</div>
            <div>
                <h6>Kirim Donasi</h6>
                <p>Barang siap diproses admin</p>
            </div>
        </div>
    </div>

    <form wire:submit.prevent="simpanDonasi">

        <div class="main-card">

            {{-- TITLE --}}
            <div class="section-title">
                <h2>Pilih Lokasi Rebox</h2>
                <p>Tentukan titik pengumpulan barang terdekat dari lokasimu</p>
            </div>

            {{-- NEW SEARCH & REGION SELECTION --}}
            <div class="search-location-wrapper">
                
                {{-- Search Input (Gunakan wire:model sesuai backend kamu) --}}
                <div class="search-input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" 
                           wire:model.live="search_lokasi" 
                           class="form-control-custom" 
                           placeholder="Cari nama titik Rebox atau alamat...">
                </div>

                {{-- Manual Region Select --}}
                <div class="region-select-group">
                    <select wire:model.live="filter_wilayah" class="form-select-custom">
                        <option value="">Semua Wilayah</option>
                        <option value="Bandung Tengah">Bandung Tengah</option>
                        <option value="Bandung Selatan">Bandung Selatan</option>
                        <option value="Bandung Utara">Bandung Utara</option>
                        <option value="Bandung Timur">Bandung Timur</option>
                        <option value="Bandung Barat">Bandung Barat</option>
                        <option value="Cimahi">Cimahi</option>
                    </select>
                </div>

            </div>

            {{-- SELECTED LOCATION PREVIEW --}}
            {{-- Bagian ini merepresentasikan lokasi yang sudah aktif/dipilih --}}
            <div class="selected-location-box">
                <div class="loc-meta">
                    <div class="loc-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="loc-details">
                        <h6>Rebox BuahBatu</h6>
                        <p><i class="far fa-clock"></i> Terpilih • Buka 08:00 - 20:00</p>
                    </div>
                </div>
                <div class="loc-badge">
                    <span style="background: var(--green-main); padding: 8px 15px; border-radius: 10px; color: white; font-size: 12px; font-weight: 700;">
                        LOKASI TERDEKAT
                    </span>
                </div>
            </div>

            {{-- FORM --}}
            <div class="form-grid">

                {{-- LEFT: INFORMASI BARANG --}}
                <div class="form-section">

                    <div class="mini-title">
                        <div class="icon">
                            <i class="fas fa-box-open"></i>
                        </div>
                        <div>
                            <h5>Informasi Barang</h5>
                            <p>Isi detail utama barang donasi</p>
                        </div>
                    </div>

                    {{-- FOTO --}}
                    <div class="form-group">
                        <label class="form-label">Foto Barang</label>
                        <div class="upload-box">
                            @if ($foto)
                                <img src="{{ $foto->temporaryUrl() }}">
                            @else
                                <div class="upload-placeholder">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <h6>Upload Foto Barang</h6>
                                    <p>JPG / PNG maksimal 2MB</p>
                                </div>
                            @endif
                            <input type="file"
                                   wire:model="foto"
                                   style="position:absolute; inset:0; opacity:0; cursor:pointer;">
                        </div>
                    </div>

                    {{-- NAMA --}}
                    <div class="form-group">
                        <label class="form-label">Nama Barang</label>
                        <input type="text"
                               wire:model="nama_barang"
                               class="form-control-custom"
                               placeholder="Contoh: Buku Pelajaran, Jaket, Kursi">
                    </div>

                    {{-- KATEGORI --}}
                    <div class="form-group">
                        <label class="form-label">Kategori Barang</label>
                        <select wire:model="kategori" class="form-select-custom">
                            <option value="">Pilih Kategori</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Buku">Buku</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Peralatan Rumah">Peralatan Rumah</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    {{-- JUMLAH --}}
                    <div class="form-group">
                        <label class="form-label">Jumlah Barang</label>
                        <input type="number"
                               wire:model="jumlah"
                               class="form-control-custom"
                               min="1"
                               placeholder="Masukkan jumlah barang">
                    </div>
                </div>

                {{-- RIGHT: KONDISI & DESKRIPSI --}}
                <div class="form-section">

                    <div class="mini-title">
                        <div class="icon">
                            <i class="fas fa-circle-info"></i>
                        </div>
                        <div>
                            <h5>Kondisi & Deskripsi</h5>
                            <p>Tambahkan detail tambahan barang</p>
                        </div>
                    </div>

                    {{-- KONDISI --}}
                    <div class="form-group">
                        <label class="form-label">Kondisi Barang</label>
                        <div class="condition-group">
                            <button type="button"
                                    wire:click="$set('kondisi', 'Baru')"
                                    class="condition-btn {{ $kondisi == 'Baru' ? 'active' : '' }}">
                                Baru
                            </button>
                            <button type="button"
                                    wire:click="$set('kondisi', 'Seperti Baru')"
                                    class="condition-btn {{ $kondisi == 'Seperti Baru' ? 'active' : '' }}">
                                Seperti Baru
                            </button>
                            <button type="button"
                                    wire:click="$set('kondisi', 'Layak Pakai')"
                                    class="condition-btn {{ $kondisi == 'Layak Pakai' ? 'active' : '' }}">
                                Layak Pakai
                            </button>
                        </div>
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="form-group">
                        <label class="form-label">Deskripsi Barang</label>
                        <textarea
                            wire:model="deskripsi"
                            class="textarea-custom"
                            placeholder="Contoh: Buku masih lengkap, pakaian bersih dan layak pakai..."></textarea>
                    </div>

                    {{-- INFO BOX --}}
                    <div class="info-box">
                        <div class="info-icon">
                            <i class="fas fa-info"></i>
                        </div>
                        <div>
                            <h6>Informasi Penting</h6>
                            <p>
                                Pastikan barang dalam keadaan bersih,
                                aman, dan masih layak digunakan agar
                                proses sortir lebih cepat dan mudah.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SUBMIT SECTION --}}
            <div class="bottom-submit">
                <div>
                    <h5>Siap Berbagi Kebaikan?</h5>
                    <p>Donasi Anda akan sangat berarti bagi mereka yang membutuhkan.</p>
                </div>
                <div class="submit-actions">
                    <a href="/dashboard" wire:navigate class="btn-draft">
                        Simpan Draft
                    </a>
                    <button type="submit" class="btn-submit">
                        Kirim Donasi
                        <i class="fas fa-paper-plane" style="margin-left: 8px;"></i>
                    </button>
                </div>
            </div>

        </div>
    </form>
</div>