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

        .main-card{
            background:white;
            border-radius:30px;
            padding:32px;
            border:1px solid #edf2f7;
            box-shadow:0 14px 35px rgba(15,23,42,.05);
        }

        .location-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 20px;
        }

        .location-header-flex h2 {
            font-size: 24px;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
        }

        .search-wrapper-new {
            flex: 1;
            max-width: 460px;
            position: relative;
        }

        .search-wrapper-new i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 16px;
        }

        .search-wrapper-new .search-input-new {
            width: 100%;
            padding: 14px 14px 14px 50px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            font-size: 14px;
            outline: none;
            transition: all 0.2s;
        }

        .search-wrapper-new .search-input-new:focus {
            border-color: var(--green-main);
            background: white;
            box-shadow: 0 0 0 4px var(--green-soft);
        }

        .location-grid-new {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .loc-card-new {
            background: white;
            border-radius: 20px;
            border: 1px solid #f1f5f9;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .loc-card-new:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.06);
        }

        .loc-card-new.active {
            border: 2px solid var(--green-main);
            background: var(--green-soft);
        }

        .loc-thumb {
            height: 160px;
            width: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
            padding: 15px;
        }

        .dist-badge {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(4px);
            padding: 5px 12px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #1e293b;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .dist-badge i {
            color: var(--green-main);
            font-size: 11px;
        }

        .floating-plus {
            position: absolute;
            bottom: -20px;
            right: 20px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--green-main);
            color: white;
            border: 4px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0,132,61,0.3);
            transition: transform 0.2s;
            z-index: 2;
        }

        .loc-card-new:hover .floating-plus {
            transform: scale(1.1);
        }

        .loc-card-new.active .floating-plus {
            background: #004934;
        }

        .loc-body-new {
            padding: 28px 20px 20px;
        }

        .loc-body-new h4 {
            margin: 0 0 6px;
            font-size: 17px;
            font-weight: 800;
            color: #1e293b;
        }

        .loc-body-new p {
            margin: 0;
            font-size: 13px;
            color: #64748b;
            line-height: 1.5;
        }

        .form-stack{
            display:flex;
            flex-direction:column;
            gap:26px;
        }

        .form-section{
            border:1px solid #edf2f7;
            border-radius:24px;
            padding:26px;
            background:#fff;
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
            box-shadow:0 0 0 4px var(--green-soft);
        }

        .textarea-custom{
            min-height:190px;
            resize:vertical;
        }

        .upload-box{
            border:2px dashed #cbd5e1;
            background:#f8fafc;
            border-radius:22px;
            padding:34px;
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
            max-height:320px;
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

        .condition-group{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            gap:12px;
        }

        .condition-btn{
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
            cursor:pointer;
        }

        .btn-submit:hover{
            transform:translateY(-2px);
        }

        @media(max-width:1100px){
            .location-grid-new {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:992px){
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
                text-align:center;
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
            .location-header-flex {
                flex-direction: column;
                align-items: flex-start;
            }
            .search-wrapper-new{
                max-width:100%;
                width:100%;
            }
            .location-grid-new {
                grid-template-columns: 1fr;
            }
            .condition-group{
                grid-template-columns:1fr;
            }
            .main-card{
                padding:22px;
            }
        }
    </style>

    <a href="/dashboard" wire:navigate class="top-back">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Dashboard
    </a>

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

            <div class="location-header-flex">
                <h2>Pilih Lokasi Drop-off</h2>
                <div class="search-wrapper-new">
                    <i class="fas fa-search"></i>
                    <input type="text"
                           wire:model.live="search_lokasi"
                           class="search-input-new"
                           placeholder="Ketik nama kecamatan di Bandung...">
                </div>
            </div>

            <div class="location-grid-new">

                <div class="loc-card-new {{ $filter_wilayah == 'Sudirman' ? 'active' : '' }}"
                     wire:click="$set('filter_wilayah', 'Sudirman')">
                    <div class="loc-thumb" style="background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=500');">
                        <div class="dist-badge">
                            <i class="fas fa-location-dot"></i> 0.8 km
                        </div>
                        <div class="floating-plus">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="loc-body-new">
                        <h4>Rebox Sudirman Central</h4>
                        <p>Jl. Jend. Sudirman No. 52, Jakarta Selatan</p>
                    </div>
                </div>

                <div class="loc-card-new {{ $filter_wilayah == 'GrandIndo' ? 'active' : '' }}"
                     wire:click="$set('filter_wilayah', 'GrandIndo')">
                    <div class="loc-thumb" style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=500');">
                        <div class="dist-badge">
                            <i class="fas fa-location-dot"></i> 1.2 km
                        </div>
                        <div class="floating-plus">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="loc-body-new">
                        <h4>Grand Indonesia Hub</h4>
                        <p>Lantai LG Barat, Menteng, Jakarta Pusat</p>
                    </div>
                </div>

                <div class="loc-card-new {{ $filter_wilayah == 'SCBD' ? 'active' : '' }}"
                     wire:click="$set('filter_wilayah', 'SCBD')">
                    <div class="loc-thumb" style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=500');">
                        <div class="dist-badge">
                            <i class="fas fa-location-dot"></i> 2.5 km
                        </div>
                        <div class="floating-plus">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                    <div class="loc-body-new">
                        <h4>SCBD Office Park</h4>
                        <p>Gedung Artha Graha Lobby, Jakarta</p>
                    </div>
                </div>

            </div>

            <div class="form-stack">

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

                    <div class="form-group">
                        <label class="form-label">Nama Barang</label>
                        <input type="text"
                               wire:model="nama_barang"
                               class="form-control-custom"
                               placeholder="Contoh: Buku Pelajaran, Jaket, Kursi">
                    </div>

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

                    <div class="form-group" style="margin-bottom:0;">
                        <label class="form-label">Jumlah Barang</label>
                        <input type="number"
                               wire:model="jumlah"
                               class="form-control-custom"
                               min="1"
                               placeholder="Masukkan jumlah barang">
                    </div>
                </div>

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

                    <div class="form-group">
                        <label class="form-label">Deskripsi Barang</label>
                        <textarea
                            wire:model="deskripsi"
                            class="textarea-custom"
                            placeholder="Contoh: Buku masih lengkap, pakaian bersih dan layak pakai..."></textarea>
                    </div>

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