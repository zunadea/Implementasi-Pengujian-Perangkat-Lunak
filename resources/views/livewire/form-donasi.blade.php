<<<<<<< HEAD
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
=======
<div class="rebox-donation-page" data-donation-root data-step="{{ $step }}">
    <style>
        :root {
            --rebox-green: #008600;
            --rebox-green-soft: #e9f7eb;
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

        .rebox-donation-page {
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 86% 12%, rgba(0, 134, 0, 0.08), transparent 20%),
                radial-gradient(circle at 7% 76%, rgba(0, 134, 0, 0.05), transparent 22%),
                linear-gradient(180deg, #ffffff 0%, #ffffff 62%, #f7fcf8 100%);
            position: relative;
        }

        .donation-inner {
            width: min(100%, 1480px);
            margin: 0 auto;
            padding: 26px 44px 70px;
            position: relative;
            z-index: 1;
        }

        .top-shell {
            display: grid;
            grid-template-columns: 1fr 142px;
            align-items: center;
            gap: 42px;
            width: min(100%, 1172px);
            margin: 0 auto 42px;
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

        .top-nav a {
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            line-height: 1;
            justify-self: center;
            width: 118px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 14px;
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

        .profile-caret::before {
            content: "";
            display: block;
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

        .donation-card {
            width: 100%;
            margin: 0;
            border: 0;
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            backdrop-filter: none;
            padding: 0;
            animation: panelIn 0.45s ease both;
        }

        .donation-panel {
            border: 1px solid rgba(20, 32, 43, 0.07);
            background: rgba(255, 255, 255, 0.88);
            border-radius: 18px;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.07);
            backdrop-filter: blur(14px);
            padding: 26px;
        }

        .form-layout {
            display: grid;
            grid-template-columns: minmax(360px, .82fr) minmax(0, 1.28fr);
            gap: 16px;
            align-items: stretch;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }

        .section-title .icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 16px;
            font-weight: 650;
        }

        .section-title h2 { margin: 0 0 4px; font-size: 18px; font-weight: 620; color: #14202b; }
        .section-title p { margin: 0; color: #667085; font-size: 13px; font-weight: 450; }

        .section-title-row {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: flex-start;
            margin-bottom: 28px;
        }

        .location-count-pill {
            height: 34px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 0 16px;
            background: rgba(0, 134, 0, .08);
            color: #4b5563;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .location-count-pill i {
            color: var(--rebox-green);
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field.full { grid-column: 1 / -1; }
        .field label {
            display: block;
            color: #14202b;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0;
            text-transform: none;
            margin-bottom: 9px;
        }

        .field-box, .field-control, .field-select, .field-textarea {
            width: 100%;
            border-radius: 14px;
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(20, 32, 43, 0.08);
            color: #111111;
            font-size: 14px;
            font-weight: 500;
            outline: none;
            transition: border 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .field-control, .field-select { height: 50px; padding: 0 16px; }
        .field-select { appearance: none; background-image: linear-gradient(45deg, transparent 50%, #008600 50%), linear-gradient(135deg, #008600 50%, transparent 50%); background-position: calc(100% - 20px) 22px, calc(100% - 13px) 22px; background-size: 7px 7px, 7px 7px; background-repeat: no-repeat; }
        .field-textarea { min-height: 150px; resize: none; padding: 16px; line-height: 1.55; }
        .field-control:focus, .field-select:focus, .field-textarea:focus {
            background: #ffffff;
            border-color: var(--rebox-green);
            box-shadow: 0 0 0 4px rgba(0, 134, 0, 0.08);
        }

        .condition-row {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .condition-btn {
            height: 48px;
            border-radius: 13px;
            border: 1px solid rgba(20, 32, 43, 0.08);
            background: rgba(255, 255, 255, 0.9);
            color: #667085;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.22s ease;
            position: relative;
        }

        .condition-btn:hover, .condition-btn.active {
            border-color: rgba(0, 134, 0, .38);
            background: rgba(255, 255, 255, .95);
            color: var(--rebox-green);
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(0, 134, 0, 0.18);
        }

        .condition-btn.active::after {
            content: "\f058";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--rebox-green);
        }

        .info-box {
            width: fit-content;
            margin-top: 18px;
            border: 1px solid rgba(220, 38, 38, 0.12);
            border-radius: 999px;
            background: rgba(220, 38, 38, 0.035);
            padding: 4px 10px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #dc2626;
            font-size: 12px;
            font-weight: 620;
            line-height: 1.05;
        }

        .info-box i { color: #dc2626; margin-top: 0; }

        .location-panel {
            min-height: 100%;
        }

        .location-search-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 52px;
            gap: 12px;
            margin-bottom: 24px;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
>>>>>>> zunadeafiturv1
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
<<<<<<< HEAD
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
=======
            color: #9ca3af;
            font-size: 16px;
        }

        .search-box input {
            width: 100%;
            height: 50px;
            border-radius: 14px;
            border: 1px solid rgba(20, 32, 43, 0.08);
            background: #ffffff;
            padding: 0 16px 0 50px;
            outline: none;
            color: #14202b;
            font-size: 14px;
            font-weight: 500;
        }

        .filter-square {
            width: 52px;
            height: 50px;
            border: 1px solid rgba(20, 32, 43, 0.08);
            border-radius: 14px;
            background: #ffffff;
            color: #667085;
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, color .2s ease;
        }

        .filter-square:hover {
            color: var(--rebox-green);
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(15, 23, 42, .07);
        }

        .location-list {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            align-content: start;
            gap: 18px;
            max-height: 510px;
            overflow-y: auto;
            padding: 2px 4px 4px 0;
        }

        .location-list.is-single {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .location-card {
            border: 1px solid rgba(20, 32, 43, 0.08);
            background: #ffffff;
            border-radius: 15px;
            overflow: visible;
            padding: 0;
            cursor: pointer;
            text-align: left;
            align-self: start;
            transition: 0.24s ease;
        }

        .location-card:hover, .location-card.active {
            border-color: var(--rebox-green);
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
            transform: translateY(-2px);
        }

        .location-image {
            height: 126px;
            position: relative;
            overflow: hidden;
            border-radius: 14px 14px 0 0;
        }

        .location-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: inherit;
        }

        .location-code-pill {
            position: absolute;
            left: 10px;
            bottom: 10px;
            min-height: 27px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0 10px;
            border-radius: 999px;
            background: rgba(0, 134, 0, 0.94);
            color: #ffffff;
            font-size: 11px;
            font-weight: 650;
            letter-spacing: 0;
            box-shadow: 0 10px 18px rgba(0, 80, 0, 0.18);
        }

        .location-map-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: fit-content;
            color: var(--rebox-green);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: transform .2s ease, color .2s ease, opacity .2s ease;
        }

        .location-map-link:hover {
            color: #006b00;
            opacity: .9;
            transform: translateX(2px);
        }

        .selected-location-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .selected-code-pill {
            min-height: 25px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0 9px;
            border-radius: 999px;
            background: rgba(0, 134, 0, .08);
            color: var(--rebox-green);
            font-size: 11px;
            font-weight: 650;
        }

        .location-body {
            padding: 14px 14px 16px;
            position: relative;
        }

        .location-body h3 { margin: 0 0 7px; font-size: 15px; font-weight: 650; color: #14202b; }
        .location-body p { margin: 0; color: #737373; font-size: 12px; font-weight: 500; line-height: 1.35; }
        .location-add {
            position: absolute;
            right: 12px;
            top: -26px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--rebox-green);
            color: #ffffff;
            display: grid;
            place-items: center;
            border: 4px solid #ffffff;
            font-size: 17px;
            box-shadow: inset 0 1px 5px rgba(255,255,255,0.25), 0 14px 24px rgba(0, 134, 0, 0.22);
        }

        .selected-preview {
            margin-top: 22px;
        }

        .selected-preview-title {
            margin: 0 0 12px;
            color: #4b5563;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .selected-preview-card {
            width: 100%;
            min-height: 86px;
            display: grid;
            grid-template-columns: 178px minmax(0, 1fr) 46px;
            align-items: center;
            gap: 16px;
            border: 1px solid rgba(0, 134, 0, 0.38);
            background: #ffffff;
            border-radius: 15px;
            padding: 8px 12px 8px 8px;
            box-shadow: 0 18px 38px rgba(0, 134, 0, 0.10);
            animation: panelIn 0.32s ease both;
        }

        .selected-preview-card .location-image {
            height: 70px;
            border-radius: 12px;
        }

        .selected-preview-card .location-body {
            padding: 0;
        }

        .selected-preview-card .location-body h3 {
            font-size: 17px;
            font-weight: 650;
        }

        .selected-preview-card .location-body p {
            font-size: 13px;
        }

        .selected-preview-empty {
            min-height: 86px;
            display: flex;
            align-items: center;
            gap: 14px;
            border: 1px dashed rgba(0, 134, 0, 0.34);
            border-radius: 15px;
            padding: 18px;
            color: #667085;
            background: rgba(247, 252, 248, 0.72);
        }

        .selected-preview-empty i {
            color: var(--rebox-green);
            font-size: 20px;
        }

        .selected-preview-check {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 14px 24px rgba(0, 134, 0, .18);
        }

        .selection-hint {
            display: none;
            margin: -2px 0 14px;
            color: #8a8f98;
            font-size: 12px;
            font-weight: 700;
        }

        .submit-band {
            margin-top: 28px;
            border: 1px solid rgba(20, 32, 43, 0.07);
            border-radius: 18px;
            background: rgba(255, 255, 255, .88);
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.07);
            backdrop-filter: blur(14px);
        }

        .submit-band-text {
            display: grid;
            grid-template-columns: 48px minmax(0, 1fr);
            gap: 16px;
            align-items: center;
        }

        .submit-band-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            font-size: 20px;
        }

        .submit-band h3 { margin: 0 0 5px; font-size: 17px; font-weight: 650; color: #14202b; }
        .submit-band p { margin: 0; color: #667085; font-size: 13px; font-weight: 450; }

        .btn-main, .btn-soft {
            min-width: 142px;
            height: 50px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: 650;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
        }

        .btn-main {
            border: 0;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 14px 28px rgba(0, 134, 0, 0.20);
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .btn-main:hover,
        .btn-soft:hover {
            transform: translateY(-2px);
        }

        .btn-main:active,
        .btn-soft:active {
            transform: translateY(0) scale(.98);
        }

        .btn-soft {
            border: 1px solid rgba(0, 134, 0, 0.20);
            background: #f4f7f6;
            color: #344054;
        }

        .center-card {
            width: min(100%, 680px);
            margin: 0 auto;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(0, 134, 0, 0.14);
            box-shadow: 0 24px 60px rgba(17, 17, 17, 0.10);
            padding: 42px;
            animation: panelIn 0.42s ease both;
        }

        .center-icon {
            width: 104px;
            height: 104px;
            border-radius: 28px;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 42px;
            margin-bottom: 24px;
            position: relative;
            animation: floatBox 3.8s ease-in-out infinite;
        }

        .code-spark {
            position: absolute;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ffffff;
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 10px 20px rgba(0, 134, 0, 0.10);
        }
        .code-spark.one { left: -18px; top: 50px; }
        .code-spark.two { right: -18px; top: 12px; }
        .code-spark.three { right: -28px; bottom: 18px; }

        .center-card h2 { margin: 0 0 14px; font-size: 34px; font-weight: 800; color: #111111; }
        .center-card > p { margin: 0 0 26px; color: #737373; font-size: 17px; font-weight: 600; line-height: 1.6; }

        .timer-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 26px;
            padding: 11px 17px;
            border-radius: 999px;
            background: #fff7ed;
            color: #c2410c;
            font-size: 16px;
            font-weight: 900;
        }

        .timer-display {
            color: var(--rebox-green);
            font-size: 72px;
            line-height: 1;
            font-weight: 900;
            margin: 18px 0 28px;
            text-shadow: 0 18px 32px rgba(0, 134, 0, 0.10);
        }

        .code-info {
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            padding: 18px 20px;
            color: #4b5563;
            font-weight: 650;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .code-input { margin-bottom: 22px; }
        .upload-proof {
            border: 2px dashed rgba(0, 134, 0, 0.24);
            border-radius: 20px;
            min-height: 158px;
            background: linear-gradient(135deg, rgba(0, 134, 0, 0.035), rgba(255,255,255,0.9));
            display: grid;
            place-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            color: var(--rebox-green);
            font-weight: 800;
        }

        .upload-proof input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-proof img { width: 100%; height: 230px; object-fit: cover; }
        .proof-note {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            color: #9ca3af;
            font-size: 13px;
            font-style: italic;
            margin: 12px 0 26px;
        }
        .proof-note strong { color: #dc2626; font-style: normal; }

        .donation-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 80;
            display: grid;
            place-items: center;
            padding: 24px;
            background: rgba(248, 252, 249, 0.34);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            perspective: 1300px;
            animation: modalFadeIn .24s ease both;
        }

        .donation-flow-card {
            width: min(100%, 480px);
            max-height: calc(100vh - 48px);
            overflow-y: auto;
            border-radius: 22px;
            border: 1px solid rgba(0, 134, 0, 0.16);
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 32px 90px rgba(15, 23, 42, 0.16), 0 18px 48px rgba(0, 134, 0, 0.10);
            padding: 24px;
            color: #14202b;
            font-family: var(--sf-pro);
            font-weight: 450;
            animation: modalFlipIn .58s cubic-bezier(.18,.88,.22,1.08) both;
            transform-origin: center;
            transform-style: preserve-3d;
            will-change: transform, opacity;
        }

        .donation-flow-card.is-open {
            width: min(100%, 520px);
        }

        .donation-flow-card.is-code {
            width: min(980px, calc(100vw - 80px));
            padding: 0;
            overflow: hidden;
            border-radius: 22px;
            border-color: rgba(15, 23, 42, .05);
            background: #ffffff;
            box-shadow: 0 26px 88px rgba(15, 23, 42, .13);
        }

        .donation-flow-card.is-success {
            width: min(100%, 500px);
            text-align: center;
        }

        .scan-shell {
            display: grid;
            grid-template-columns: minmax(0, 52.2%) minmax(0, 47.8%);
            min-height: 560px;
        }

        .scan-visual {
            padding: 22px 26px;
            background:
                radial-gradient(circle at 72% 74%, rgba(22, 163, 74, .18), transparent 30%),
                radial-gradient(circle at 18% 20%, rgba(34, 197, 94, .18), transparent 31%),
                linear-gradient(145deg, #06150f 0%, #062116 50%, #07381e 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .scan-content {
            padding: 24px 32px 24px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background:
                radial-gradient(circle at 10% 50%, rgba(0, 134, 0, .045), transparent 34%),
                radial-gradient(circle at 84% 8%, rgba(15, 23, 42, .045), transparent 28%),
                linear-gradient(180deg, #ffffff 0%, #fbfdfc 100%);
        }

        .scan-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #ffffff;
            font-size: 15px;
            font-weight: 650;
        }

        .scan-safe {
            margin-left: auto;
            height: 40px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 0 16px;
            border-radius: 999px;
            color: #ffffff;
            background: rgba(255, 255, 255, .075);
            border: 1px solid rgba(255, 255, 255, .13);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .09), 0 12px 28px rgba(0, 0, 0, .13);
            font-size: 12px;
            font-weight: 600;
        }

        .scan-safe i {
            color: #65f083;
            font-size: 16px;
        }

        .scan-brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #15c84b, #008c28);
            color: #ffffff;
            box-shadow: 0 20px 46px rgba(0, 170, 48, 0.30);
            font-size: 19px;
        }

        .flow-head {
            text-align: center;
            margin-bottom: 20px;
        }

        .scan-content .flow-head {
            text-align: left;
            margin-bottom: 0;
        }

        .scan-content .flow-head p {
            max-width: 390px;
            margin: 0 0 20px;
        }

        .modal-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 14px;
            border-radius: 17px;
            display: grid;
            place-items: center;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            font-size: 23px;
            box-shadow: 0 14px 28px rgba(0, 134, 0, 0.08);
            animation: floatBox 3.6s ease-in-out infinite;
        }

        .scan-content .modal-icon {
            width: 50px;
            height: 50px;
            margin: 0 0 18px;
            border-radius: 15px;
            font-size: 20px;
            background: linear-gradient(145deg, #f4fbf6, #ffffff);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .07);
            animation: none;
        }

        .donation-flow-card h2 {
            margin: 0 0 10px;
            font-size: 24px;
            line-height: 1.15;
            font-weight: 650;
            letter-spacing: 0;
            color: #14202b;
        }

        .donation-flow-card p {
            margin: 0;
            color: rgba(102, 112, 133, 0.86);
            font-size: 13px;
            font-weight: 450;
            line-height: 1.6;
        }

        .modal-info {
            border-radius: 16px;
            border: 1px solid rgba(20, 32, 43, 0.09);
            background: rgba(248, 250, 252, 0.82);
            padding: 14px 16px;
            color: #4b5563;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.7;
            margin: 18px 0 18px;
        }

        .scan-location-card {
            border: 1px solid rgba(15, 23, 42, 0.10);
            border-radius: 16px;
            padding: 14px;
            background: #ffffff;
            display: grid;
            gap: 12px;
            margin-bottom: 18px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, .07);
        }

        .scan-location-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            min-height: 50px;
        }

        .scan-location-main > div {
            position: relative;
            min-width: 0;
            min-height: 42px;
            padding-left: 58px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .scan-location-main > div::before {
            content: "\f3c5";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: #111827;
            background: linear-gradient(145deg, #eaf9ee, #f8fffa);
            box-shadow: 0 14px 28px rgba(0, 134, 0, .07);
        }

        .scan-location-main strong {
            display: block;
            color: #111827;
            font-size: 14px;
            font-weight: 650;
            line-height: 1.2;
        }

        .scan-location-main span {
            display: block;
            color: #667085;
            font-size: 12px;
            font-weight: 450;
            margin-top: 5px;
        }

        .scan-code-pill {
            display: none;
        }

        .scan-location-main .scan-box-code-pill {
            min-width: 78px;
            max-width: 116px;
            height: 32px;
            margin-top: 0;
            padding: 0 14px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #008600;
            background: #effaf1;
            font-size: 12px;
            font-weight: 650;
            line-height: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex: 0 0 auto;
        }

        .scan-location-main .scan-box-code-pill::before {
            display: none;
        }

        .scan-hint {
            min-height: 42px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            border-radius: 10px;
            padding: 10px 13px;
            color: #06701c;
            background: linear-gradient(135deg, #e3f7e6, #edf8ef);
            font-size: 12px;
            font-weight: 600;
            line-height: 1.35;
        }

        .scan-hint-text {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .modal-info strong {
            color: #344054;
            font-weight: 620;
        }

        .modal-input {
            min-height: 48px;
            border-radius: 14px;
            border: 1px solid rgba(0, 134, 0, 0.14);
            background: rgba(255, 255, 255, 0.96);
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 0 14px;
            box-shadow: 0 14px 34px rgba(15, 23, 42, 0.05);
            transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
        }

        .modal-input:focus-within {
            border-color: rgba(0, 134, 0, 0.38);
            box-shadow: 0 18px 40px rgba(0, 134, 0, 0.10);
            transform: translateY(-1px);
        }

        .modal-input i {
            width: 30px;
            height: 30px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            color: #008600;
            background: #eef9f0;
            font-size: 14px;
        }

        .modal-input input {
            border: 0;
            outline: 0;
            flex: 1;
            min-width: 0;
            background: transparent;
            color: #14202b;
            font-size: 13px;
            font-weight: 450;
        }

        .modal-input input::placeholder {
            color: rgba(102, 112, 133, 0.62);
            font-weight: 450;
        }

        .qr-scanner-box {
            margin: 0;
            border-radius: 0;
            border: 0;
            background: transparent;
            overflow: hidden;
            box-shadow: none;
            backdrop-filter: blur(14px);
        }

        .qr-camera-wrap {
            min-height: 330px;
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, .16);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .08);
            background:
                radial-gradient(circle at center, rgba(74, 222, 128, .08), transparent 35%),
                linear-gradient(145deg, #082719, #06341e);
        }

        .qr-camera-wrap::before {
            content: "Arahkan kamera ke kode QR";
            position: absolute;
            z-index: 5;
            left: 50%;
            top: 26px;
            transform: translateX(-50%);
            min-height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 18px;
            border-radius: 999px;
            color: rgba(255, 255, 255, 0.90);
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .16);
            box-shadow: 0 16px 42px rgba(0, 0, 0, .16);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            pointer-events: none;
        }

        .qr-camera-wrap video {
            position: absolute;
            inset: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .qr-camera-switch {
            position: absolute;
            z-index: 6;
            top: 8px;
            right: 8px;
            width: 30px;
            height: 30px;
            display: inline-grid;
            place-items: center;
            padding: 0;
            border: 0;
            color: rgba(255, 255, 255, .78);
            background: transparent;
            box-shadow: none;
            cursor: pointer;
            transition: color .2s ease, transform .2s ease, opacity .2s ease;
        }

        .qr-camera-switch i {
            font-size: 16px;
            -webkit-text-stroke: .35px rgba(255, 255, 255, .32);
            filter:
                drop-shadow(0 1px 0 rgba(255, 255, 255, .32))
                drop-shadow(0 5px 10px rgba(0, 0, 0, .28));
        }

        .qr-camera-switch:hover:not(:disabled) {
            color: #ffffff;
            transform: rotate(12deg);
        }

        .qr-camera-switch:focus-visible {
            outline: 2px solid rgba(92, 255, 116, .55);
            outline-offset: 2px;
        }

        .qr-camera-switch:disabled {
            opacity: .45;
            cursor: not-allowed;
        }

        .qr-camera-switch.is-switching i {
            animation: qrCameraSwitch .7s linear infinite;
        }

        @keyframes qrCameraSwitch {
            to { transform: rotate(360deg); }
        }

        .qr-camera-empty {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: grid;
            place-items: center;
            padding: 24px;
            color: #ffffff;
            text-align: center;
            background:
                radial-gradient(circle at center, rgba(0, 0, 0, .18), transparent 28%),
                linear-gradient(135deg, rgba(0, 38, 23, .78), rgba(0, 69, 38, .52));
        }

        .qr-camera-empty::before {
            display: none;
        }

        .qr-camera-empty.is-hidden {
            display: none;
        }

        .qr-camera-empty i {
            position: relative;
            display: grid;
            place-items: center;
            width: 70px;
            height: 62px;
            margin: 0 auto 24px;
            border-radius: 18px;
            background: transparent;
            color: #ffffff;
            font-size: 46px;
            box-shadow: none;
        }

        .qr-camera-empty strong {
            display: block;
            font-size: 17px;
            font-weight: 650;
            margin-bottom: 10px;
        }

        .qr-camera-empty p {
            margin: 0;
            font-size: 13px;
            font-weight: 450;
        }

        .qr-glass-code {
            --qr-glass-size: 156px;
            --qr-scan-distance: calc(var(--qr-glass-size) - 28px);
            position: absolute;
            z-index: 3;
            left: 50%;
            top: 50%;
            width: var(--qr-glass-size);
            aspect-ratio: 1;
            transform: translate(-50%, -50%);
            display: grid;
            place-items: center;
            overflow: hidden;
            border-radius: 22px;
            color: rgba(255, 255, 255, .42);
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .22);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .20),
                0 18px 44px rgba(0, 0, 0, .18);
            backdrop-filter: blur(8px) saturate(110%);
            -webkit-backdrop-filter: blur(8px) saturate(110%);
            contain: layout paint;
            pointer-events: none;
        }

        .qr-camera-wrap:not(.is-scanning) .qr-glass-code {
            display: none;
        }

        .qr-glass-code i {
            font-size: clamp(90px, 78%, 124px);
            opacity: .58;
            filter: drop-shadow(0 2px 8px rgba(255, 255, 255, .14));
        }

        .qr-glass-code::after {
            content: "";
            position: absolute;
            left: -18%;
            right: -18%;
            top: 12px;
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, transparent, rgba(101, 240, 131, .96), transparent);
            box-shadow:
                0 0 12px rgba(101, 240, 131, .78),
                0 0 28px rgba(101, 240, 131, .32);
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            will-change: transform;
            animation: qrGlassScan 2.2s ease-in-out infinite alternate;
        }

        .qr-glass-code::before {
            content: "";
            position: absolute;
            left: -8%;
            right: -8%;
            top: 0;
            height: 42px;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(101, 240, 131, .18), transparent);
            opacity: .72;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            will-change: transform;
            animation: qrGlassScanGlow 2.2s ease-in-out infinite alternate;
        }

        .qr-scan-frame {
            position: absolute;
            z-index: 4;
            inset: 54px 28px 22px;
            border: 0;
            border-radius: 10px;
            pointer-events: none;
            box-shadow: none;
        }

        .qr-scan-frame::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: inherit;
            background:
                linear-gradient(#5cff74, #5cff74) left top / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) left top / 6px 38px no-repeat,
                linear-gradient(#5cff74, #5cff74) right top / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) right top / 6px 38px no-repeat,
                linear-gradient(#5cff74, #5cff74) left bottom / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) left bottom / 6px 38px no-repeat,
                linear-gradient(#5cff74, #5cff74) right bottom / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) right bottom / 6px 38px no-repeat;
        }

        .qr-scan-frame::after {
            display: none;
        }

        .qr-scanner-actions {
            display: flex;
            gap: 14px;
            padding: 0;
            margin: 16px 0 0;
            background: transparent;
        }

        .qr-scanner-actions .btn-main,
        .qr-scanner-actions .btn-soft {
            flex: 1;
            min-width: 145px;
            height: 44px;
            border-radius: 13px;
            font-size: 13px;
            font-weight: 600;
        }

        .qr-scanner-actions .btn-main {
            background: linear-gradient(135deg, #18cf3c, #00a522);
            box-shadow: 0 18px 38px rgba(0, 134, 0, 0.32);
        }

        .qr-scanner-actions .btn-soft {
            color: rgba(255, 255, 255, 0.84);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.08);
        }

        .qr-scan-status {
            margin: 14px 0 0;
            border-radius: 14px;
            padding: 13px 16px 13px 48px;
            position: relative;
            color: rgba(255, 255, 255, .92);
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .09);
            font-size: 12px;
            font-weight: 500;
            line-height: 1.4;
        }

        .qr-scan-status::before {
            content: "\f05a";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #72f087;
            background: transparent;
            font-size: 18px;
        }

        .qr-scan-status.is-error {
            color: #dc2626;
        }

        .open-method-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 14px 0;
            color: #667085;
            font-size: 12px;
            font-weight: 650;
            text-transform: uppercase;
        }

        .open-method-divider::before,
        .open-method-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(102, 112, 133, 0.18);
        }

        .manual-code-title {
            margin: 0 0 10px;
            color: #111827;
            font-size: 13px;
            font-weight: 600;
        }

        .manual-code-card {
            border-radius: 16px;
            padding: 14px;
            background: #ffffff;
            border: 1px solid rgba(20, 32, 43, 0.08);
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.05);
        }

        .manual-code-card .modal-input {
            min-height: 48px;
            border-radius: 13px;
            background: #ffffff;
        }

        @keyframes qrLine {
            from { transform: translateY(-44px); }
            to { transform: translateY(116px); }
        }

        @keyframes qrGlassScan {
            from { transform: translate3d(0, 0, 0); }
            to { transform: translate3d(0, var(--qr-scan-distance), 0); }
        }

        @keyframes qrGlassScanGlow {
            from { transform: translate3d(0, 0, 0); }
            to { transform: translate3d(0, calc(var(--qr-scan-distance) - 20px), 0); }
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 18px;
        }

        .modal-actions .btn-main,
        .modal-actions .btn-soft {
            min-width: 112px;
            height: 42px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 600;
            padding: 0 18px;
        }

        .scan-content .modal-actions {
            margin-top: 22px;
            gap: 14px;
            flex-wrap: wrap;
        }

        .scan-content .modal-actions .btn-main,
        .scan-content .modal-actions .btn-soft {
            min-width: 96px;
            border-radius: 12px;
            font-weight: 600;
            padding: 0 20px;
        }

        .scan-content .modal-actions .btn-soft {
            background: #f5f6f5;
            color: #111827;
            box-shadow: none;
        }

        .scan-content .modal-actions .btn-main {
            min-width: 150px;
            background: linear-gradient(135deg, #17c43e, #00941e);
            box-shadow: 0 16px 30px rgba(0, 134, 0, .26);
        }

        .open-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: 32px;
            padding: 0 14px;
            border-radius: 999px;
            background: var(--rebox-green);
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        .open-timer-display {
            color: var(--rebox-green);
            font-size: 44px;
            line-height: 1;
            font-weight: 650;
            letter-spacing: 0;
            text-align: center;
            margin: 14px 0;
            text-shadow: 0 16px 34px rgba(0, 134, 0, 0.10);
        }

        .donation-flow-card .upload-proof {
            min-height: 112px;
            border-radius: 16px;
            font-size: 13px;
            font-weight: 600;
        }

        .donation-flow-card .proof-note {
            font-size: 12px;
            margin: 10px 0 18px;
        }

        .success-flow-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 24px;
        }

        .success-flow-actions .btn-main,
        .success-flow-actions .btn-soft {
            min-width: 124px;
            height: 42px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 600;
        }

        .success-card { text-align: center; }
        .success-card .center-icon { margin: 0 auto 24px; }
        .success-card h2 { font-size: 26px; font-weight: 650; }

        .success-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-top: 30px;
        }

        .error-alert, .success-alert {
            margin-top: 10px;
            padding: 12px 14px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            font-weight: 750;
        }
        .error-alert { background: rgba(220, 38, 38, 0.10); color: #dc2626; }
        .success-alert { background: rgba(0, 134, 0, 0.10); color: var(--rebox-green); }

        @keyframes menuDrop {
            from { opacity: 0; transform: translateY(-8px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes heroIn {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes panelIn {
            from { opacity: 0; transform: translateY(18px) scale(0.985); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes floatBox {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes modalFlipIn {
            0% {
                opacity: 0;
                transform: translateY(24px) rotateX(18deg) rotateY(-24deg) scale(.92);
                filter: blur(3px);
            }
            58% {
                opacity: 1;
                transform: translateY(-4px) rotateX(-3deg) rotateY(5deg) scale(1.015);
                filter: blur(0);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotateX(0) rotateY(0) scale(1);
                filter: blur(0);
            }
        }

        @media (max-width: 980px) {
            .donation-inner { padding: 24px 28px 70px; }
            .top-shell, .form-layout { grid-template-columns: 1fr; }
            .profile-dropdown { justify-self: end; margin-top: -18px; }
            .location-panel {
                height: auto;
                min-width: 0;
                overflow: hidden;
            }
            .location-list,
            .location-list.is-single {
                display: flex;
                grid-template-columns: none;
                align-items: flex-start;
                gap: 14px;
                width: 100%;
                max-height: none;
                overflow-x: auto;
                overflow-y: hidden;
                padding: 2px 4px 12px;
                scroll-snap-type: x mandatory;
                scroll-padding-inline: 4px;
                overscroll-behavior-inline: contain;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: rgba(0, 134, 0, .34) rgba(0, 134, 0, .06);
            }
            .location-list::-webkit-scrollbar {
                height: 6px;
            }
            .location-list::-webkit-scrollbar-track {
                border-radius: 999px;
                background: rgba(0, 134, 0, .06);
            }
            .location-list::-webkit-scrollbar-thumb {
                border-radius: 999px;
                background: rgba(0, 134, 0, .34);
            }
            .location-list .location-card {
                flex: 0 0 clamp(230px, 42vw, 290px);
                width: clamp(230px, 42vw, 290px);
                scroll-snap-align: start;
            }

            .donation-modal-overlay {
                place-items: start center;
                padding: 16px;
                overflow-y: auto;
            }
            .donation-modal-overlay.is-open-overlay,
            .donation-modal-overlay.is-success-overlay {
                place-items: center;
            }
            .is-open-overlay .donation-flow-card.is-open,
            .is-success-overlay .donation-flow-card.is-success {
                margin: auto;
            }

            .donation-flow-card.is-code {
                width: min(100%, 680px);
                max-height: calc(100dvh - 32px);
                overflow-x: hidden;
                overflow-y: auto;
            }

            .scan-shell {
                grid-template-columns: 1fr;
                min-height: 0;
                max-height: none;
                overflow: visible;
            }

            .scan-visual,
            .scan-content,
            .qr-scanner-box,
            .scan-location-card,
            .manual-code-card {
                min-width: 0;
                max-width: 100%;
            }

            .scan-location-main,
            .scan-hint {
                flex-wrap: wrap;
            }

            .scan-content .flow-head p,
            .scan-location-card,
            .manual-code-card,
            .qr-scan-status {
                overflow-wrap: anywhere;
            }
        }
        @media (max-width: 720px) {
            .top-nav { height: auto; grid-template-columns: repeat(2, 1fr); gap: 14px; padding: 18px 22px; }
            .donation-panel, .center-card { padding: 22px; }
            .location-list,
            .location-list.is-single {
                gap: 12px;
                padding-inline: 0;
            }
            .location-list .location-card {
                flex-basis: min(82%, 270px);
                width: min(82%, 270px);
            }
            .field-grid, .condition-row { grid-template-columns: 1fr; }
            .submit-band, .success-actions { flex-direction: column; align-items: stretch; }
            .btn-main, .btn-soft { width: 100%; }
            .modal-actions { flex-direction: column; }
            .donation-flow-card { padding: 24px; }
            .donation-modal-overlay { padding: 8px; }
            .donation-modal-overlay.is-open-overlay,
            .donation-modal-overlay.is-success-overlay {
                padding: 14px;
            }
            .is-open-overlay .donation-flow-card.is-open {
                width: min(100%, 420px);
                padding: 20px;
            }
            .is-success-overlay .donation-flow-card.is-success {
                width: min(100%, 420px);
                padding: 24px 20px;
            }
            .donation-flow-card.is-code {
                width: 100%;
                max-height: calc(100dvh - 16px);
                padding: 0;
                border-radius: 16px;
            }
            .scan-visual, .scan-content { padding: 16px; }
            .scan-visual { gap: 14px; }
            .qr-camera-wrap {
                min-height: 0;
                aspect-ratio: 4 / 3;
                border-radius: 14px;
            }
            .qr-camera-wrap::before {
                top: 18px;
                max-width: calc(100% - 82px);
                min-height: 32px;
                padding: 0 12px;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .qr-glass-code {
                --qr-glass-size: 112px;
            }
            .qr-scan-frame { inset: 48px 18px 16px; }
            .qr-scanner-actions {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }
            .qr-scanner-actions .btn-main,
            .qr-scanner-actions .btn-soft {
                width: 100%;
                min-width: 0;
                padding-inline: 8px;
                font-size: 12px;
            }
            .scan-content .modal-actions {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
            .scan-content .modal-actions .btn-main,
            .scan-content .modal-actions .btn-soft {
                width: 100%;
                min-width: 0;
                padding-inline: 10px;
            }
            .selected-preview-card { grid-template-columns: 1fr; }
        }
    </style>

    @php
        $user = auth()->user();
        $avatarUrl = $user?->profile_photo ? asset('storage/' . $user->profile_photo) : null;
        $initial = strtoupper(substr($user->name ?? 'R', 0, 1));
    @endphp

    <div class="donation-inner">
        <header class="top-shell" wire:ignore>
            <nav class="top-nav" aria-label="Donation navigation">
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
                <a href="{{ route('form-donasi') }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
                <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
                <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
                <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
            </nav>

            <div class="profile-dropdown" data-profile-dropdown>
                <button class="profile-pill rebox-profile-identity-pill" type="button" aria-label="Buka menu profil" onclick="event.preventDefault(); event.stopImmediatePropagation(); this.closest('[data-profile-dropdown]')?.classList.toggle('is-open');">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ $user->name }}">
                    @else
                        <span class="profile-avatar-fallback">{{ $initial }}</span>
                    @endif
                    <span class="profile-identity">
                        <span class="profile-name">{{ $user->name }}</span>
                        <span class="profile-role">{{ $user->role }}</span>
                    </span>
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

        @if(in_array($step, ['form', 'code', 'open', 'success']))
            <section class="donation-card">
                <form wire:submit.prevent="kirimDonasi">
                    <div class="form-layout">
                        <div class="donation-panel">
                            <div class="section-title">
                                <div class="icon">1</div>
                                <div>
                                    <h2>Detail Barang</h2>
                                    <p>Isi detail utama barang donasi</p>
                                </div>
                            </div>

                            <div class="field-grid">
                                <div class="field full">
                                    <label>Nama Barang</label>
                                    <input class="field-control" type="text" wire:model="nama_barang" placeholder="Contoh: Buku Pelajaran, Pakaian, Barang Elektronik">
                                    @error('nama_barang') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Kategori Barang</label>
                                    <select class="field-select" wire:model="kategori">
                                        <option value="">Pilih kategori barang</option>
                                        <option value="Pakaian">Pakaian</option>
                                        <option value="Buku">Buku</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('kategori') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Jumlah Barang</label>
                                    <input class="field-control" type="number" wire:model="jumlah" min="1" max="1000" placeholder="Masukkan jumlah">
                                    @error('jumlah') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field full">
                                    <label>Kondisi Barang</label>
                                    <div class="condition-row">
                                        <button type="button" class="condition-btn {{ $kondisi === 'Baru' ? 'active' : '' }}" wire:click="$set('kondisi', 'Baru')">Baru</button>
                                        <button type="button" class="condition-btn {{ $kondisi === 'Seperti Baru' ? 'active' : '' }}" wire:click="$set('kondisi', 'Seperti Baru')">Seperti Baru</button>
                                        <button type="button" class="condition-btn {{ $kondisi === 'Layak Pakai' ? 'active' : '' }}" wire:click="$set('kondisi', 'Layak Pakai')">Layak Pakai</button>
                                    </div>
                                    @error('kondisi') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field full">
                                    <label>Deskripsi Barang</label>
                                    <textarea class="field-textarea" wire:model="deskripsi" placeholder="Contoh: Buku masih lengkap, pakaian sudah dicuci, kondisi aman digunakan. Maksimal 100 kata."></textarea>
                                    @error('deskripsi') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="selected-preview">
                                <h3 class="selected-preview-title">Lokasi Box yang Dipilih</h3>
                                @if($selectedLocation)
                                    <article class="selected-preview-card">
                                        <div class="location-image">
                                            <img src="{{ $selectedLocation['image'] }}" alt="{{ $selectedLocation['title'] }}">
                                            <span class="location-code-pill"><i class="fas fa-key"></i>{{ $selectedLocation['code'] }}</span>
                                        </div>
                                        <div class="location-body">
                                            <h3>{{ $selectedLocation['title'] }}</h3>
                                            <div class="selected-location-meta">
                                                <a class="location-map-link" href="{{ $selectedLocation['maps_url'] }}" target="_blank" rel="noopener noreferrer">
                                                    <i class="fas fa-location-dot"></i>
                                                    Klik
                                                </a>
                                            </div>
                                        </div>
                                        <span class="selected-preview-check"><i class="fas fa-check"></i></span>
                                    </article>
                                @else
                                    <div class="selected-preview-empty">
                                        <i class="fas fa-location-dot"></i>
                                        <span>Belum ada lokasi dipilih. Pilih salah satu lokasi Rebox di samping.</span>
                                    </div>
                                @endif
                                @error('selectedLocation') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <aside class="donation-panel location-panel">
                            <div class="section-title-row">
                                <div class="section-title" style="margin-bottom:0;">
                                    <div class="icon">2</div>
                                    <div>
                                        <h2>Pilih Lokasi Rebox</h2>
                                        <p>Cari lalu pilih titik Rebox terdekat dari lokasimu</p>
                                    </div>
                                </div>
                                <span class="location-count-pill">
                                    <i class="fas fa-location-dot"></i>
                                    {{ count($locations) }} Lokasi Tersedia
                                </span>
                            </div>

                            <div class="location-search-row">
                                <label class="search-box">
                                    <i class="fas fa-search"></i>
                                    <input type="text" wire:model.live="search_lokasi" placeholder="Cari Rebox Dago, Bojongsoang...">
                                </label>
                                <button type="button" class="filter-square" aria-label="Filter lokasi">
                                    <i class="fas fa-sliders"></i>
                                </button>
                            </div>
                            <p class="selection-hint">Klik dua kali pada card untuk memilih lokasi box.</p>

                            <div class="location-list {{ count($locations) === 1 ? 'is-single' : '' }}">
                                @forelse($locations as $location)
                                    <button type="button" class="location-card {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'active' : '' }}" wire:click="selectLocation('{{ $location['name'] }}')">
                                        <div class="location-image">
                                            <img src="{{ $location['image'] }}" alt="{{ $location['title'] }}">
                                            <span class="location-code-pill"><i class="fas fa-key"></i>{{ $location['code'] }}</span>
                                        </div>
                                        <div class="location-body">
                                            <h3>{{ $location['title'] }}</h3>
                                            <p>Area {{ $location['area'] }}</p>
                                            <span class="location-add"><i class="fas {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'fa-check' : 'fa-plus' }}"></i></span>
                                        </div>
                                    </button>
                                @empty
                                @endforelse
                            </div>
                        </aside>
                    </div>

                    <div class="submit-band">
                        <div class="submit-band-text">
                            <span class="submit-band-icon"><i class="fas fa-shield-heart"></i></span>
                            <div>
                                <h3>Siap Berbagi Kebaikan?</h3>
                                <p>Donasi Anda akan sangat berarti bagi mereka yang membutuhkan.</p>
                            </div>
                        </div>
                        <button type="submit" class="btn-main">
                            <i class="fas fa-paper-plane"></i> Kirim Donasi
                        </button>
                    </div>
                </form>
            </section>

            @if($step === 'code')
                <div class="donation-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="code-box-title" wire:key="donation-code-overlay">
                    <section class="donation-flow-card is-code" wire:key="donation-code-card">
                        <form wire:submit.prevent="bukaBox">
                            <div class="scan-shell">
                                <div class="scan-visual">
                                    <div class="scan-brand">
                                        <span class="scan-brand-icon"><i class="fas fa-qrcode"></i></span>
                                        <span>QR Box</span>
                                        <span class="scan-safe"><i class="fas fa-shield-heart"></i> Aman</span>
                                    </div>
                                    <div class="qr-scanner-box" data-donation-qr-scanner data-expected-code="{{ $selectedLocation['code'] }}">
                                        <div class="qr-camera-wrap">
                                            <video data-donation-qr-video autoplay muted playsinline></video>
                                            <button type="button" class="qr-camera-switch" data-donation-qr-switch
                                                aria-label="Ganti ke kamera depan" title="Ganti kamera" disabled>
                                                <i class="fas fa-camera-rotate" aria-hidden="true"></i>
                                            </button>
                                            <div class="qr-glass-code" aria-hidden="true">
                                                <i class="fas fa-qrcode"></i>
                                            </div>
                                            <div class="qr-scan-frame" aria-hidden="true"></div>
                                            <div class="qr-camera-empty" data-donation-qr-empty>
                                                <div>
                                                    <i class="fas fa-camera"></i>
                                                    <strong>Kamera laptop belum aktif</strong>
                                                    <p>Klik aktifkan kamera, lalu izinkan akses kamera di browser.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qr-scanner-actions">
                                            <button type="button" class="btn-main" data-donation-qr-start>
                                                <i class="fas fa-camera"></i> Aktifkan Kamera
                                            </button>
                                            <button type="button" class="btn-soft" data-donation-qr-stop>
                                                Matikan Kamera
                                            </button>
                                        </div>
                                        <div class="qr-scan-status" data-donation-qr-status>
                                            Kamera dimatikan.
                                        </div>
                                    </div>
                                </div>

                                <div class="scan-content">
                                    <div class="flow-head">
                                        <div class="modal-icon"><i class="fas fa-qrcode"></i></div>
                                        <h2 id="code-box-title">Scan QR Box</h2>
                                        <p>Arahkan QR ke kamera untuk membuka akses pengambilan barang. Input manual hanya dipakai kalau QR tidak terbaca.</p>
                                    </div>

                                    @if (session()->has('message'))
                                        <div class="success-alert" style="margin-bottom: 16px;"><i class="fas fa-circle-info"></i>{{ session('message') }}</div>
                                    @endif

                                    <div class="scan-location-card">
                                        <div class="scan-location-main">
                                            <div>
                                                <strong>{{ $selectedLocation['title'] }}</strong>
                                                <span>{{ $selectedLocation['area'] }}</span>
                                            </div>
                                            <span class="scan-box-code-pill">{{ $selectedLocation['code'] }}</span>
                                        </div>
                                        <div class="scan-hint">
                                            <span class="scan-hint-text">
                                                <i class="fas fa-shield-heart"></i>
                                                QR harus berisi kode lokasi ini agar box bisa dibuka.
                                            </span>
                                            <span class="scan-code-pill">{{ $selectedLocation['code'] }}</span>
                                        </div>
                                    </div>

                                    <div class="open-method-divider">atau</div>

                                    <div class="manual-code-card">
                                        <p class="manual-code-title">Masukkan kode manual</p>
                                        <label class="modal-input" aria-label="Kode box area">
                                            <i class="fas fa-lock-open"></i>
                                            <input type="text" wire:model="kode_box_input" data-donation-qr-input placeholder="Contoh: {{ $selectedLocation['code'] }}">
                                        </label>
                                        @error('kode_box_input') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                    </div>

                                    <div class="modal-actions">
                                        <button type="button" class="btn-soft" wire:click="resetToForm">Batal</button>
                                        <button type="submit" class="btn-main" data-donation-open-submit><i class="fas fa-lock-open"></i> Buka Box</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            @endif

            @if($step === 'open')
                <div class="donation-modal-overlay is-open-overlay" role="dialog" aria-modal="true" aria-labelledby="open-box-title" wire:key="donation-open-overlay">
                    <section class="donation-flow-card is-open" data-open-step wire:key="donation-open-card">
                        <button type="button" data-expire-box wire:click="expireBox" style="display:none"></button>

                        <div class="flow-head">
                            <span class="open-status-pill"><i class="fas fa-lock-open"></i> Box Terbuka</span>
                            <div class="modal-icon"><i class="fas fa-briefcase"></i></div>
                            <h2 id="open-box-title">Silahkan Masukkan Barang</h2>
                            <p>Tolong masukkan barang Anda dalam kurun waktu 3 menit. Box akan otomatis tertutup saat waktu habis.</p>
                            <div class="open-timer-display" data-countdown>03:00</div>
                        </div>

                        <div class="modal-info">
                            Box: <strong>{{ $selectedLocation['code'] }}</strong><br>
                            Lokasi: <strong>{{ $selectedLocation['title'] }}</strong>
                        </div>

                        <form wire:submit.prevent="selesaiDonasi">
                            <label class="upload-proof">
                                @if($foto)
                                    <img src="{{ $foto->temporaryUrl() }}" alt="Foto bukti barang">
                                @else
                                    <div>
                                        <i class="fas fa-cloud-upload-alt" style="font-size:28px;"></i><br>
                                        Tambahkan Foto Produk<br>
                                        <span style="color:#737373; font-size:12px;">PNG, JPG up to 2MB</span>
                                    </div>
                                @endif
                                <input type="file" wire:model="foto" accept="image/png,image/jpeg">
                            </label>
                            @error('foto') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                            <div class="proof-note">
                                <span>Fotokan bukti barang yang sudah dimasukkan ke dalam kotak</span>
                                <strong>*Wajib Diisi</strong>
                            </div>
                            <div class="modal-actions">
                                <button type="submit" class="btn-main">Selesai Donasi <i class="fas fa-check-circle"></i></button>
                            </div>
                        </form>
                    </section>
                </div>
            @endif
            @if($step === 'success')
                <div class="donation-modal-overlay is-success-overlay" role="dialog" aria-modal="true" aria-labelledby="success-donation-title" wire:key="donation-success-overlay">
                    <section class="donation-flow-card is-success" wire:key="donation-success-card">
                        <div class="flow-head">
                            <div class="modal-icon"><i class="fas fa-briefcase"></i></div>
                            <h2 id="success-donation-title">Donasi Berhasil</h2>
                            <p>Terima kasih. Foto bukti sudah tersimpan dan donasi Anda berhasil dikirim untuk diproses admin.</p>
                        </div>

                        <div class="success-flow-actions">
                            <a href="/riwayat" class="btn-main" wire:navigate>Lihat Riwayat</a>
                            <a href="/dashboard" class="btn-soft" wire:navigate>Dashboard</a>
                        </div>
                    </section>
                </div>
            @endif
        @endif
    </div>

    <script src="{{ asset('jsQR.min.js') }}"></script>
    <script>
        function initDonationPage() {
            const root = document.querySelector('[data-donation-root]');
            if (!root) return;

            const profileDropdown = root.querySelector('[data-profile-dropdown]');
            const profileButton = profileDropdown?.querySelector('.profile-pill');

            if (profileButton && profileButton.dataset.bound !== 'true') {
                profileButton.dataset.bound = 'true';
                profileButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    profileDropdown.classList.toggle('is-open');
                });
            }

            initDonationQrScanner(root);

            const isOpenStep = root.dataset.step === 'open' || !!root.querySelector('[data-open-step]');

            if (!isOpenStep) {
                if (window.reboxDonationTimer) {
                    clearInterval(window.reboxDonationTimer);
                    window.reboxDonationTimer = null;
                }
                window.reboxDonationDeadline = null;
                window.reboxDonationDisplay = null;
                window.reboxDonationActiveStep = root.dataset.step || null;
                return;
            }

            const display = root.querySelector('[data-countdown]');
            const expireButton = root.querySelector('[data-expire-box]');

            if (!display || !expireButton) return;

            if (window.reboxDonationActiveStep !== 'open' || !window.reboxDonationDeadline) {
                window.reboxDonationDeadline = Date.now() + (3 * 60 * 1000);
                window.reboxDonationActiveStep = 'open';
            }

            const render = () => {
                const remaining = Math.max(0, Math.ceil((window.reboxDonationDeadline - Date.now()) / 1000));
                const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
                const seconds = String(remaining % 60).padStart(2, '0');
                display.textContent = `${minutes}:${seconds}`;

                if (remaining <= 0) {
                    clearInterval(window.reboxDonationTimer);
                    window.reboxDonationTimer = null;
                    window.reboxDonationDeadline = null;
                    expireButton.click();
                }
            };

            render();

            if (window.reboxDonationTimer && window.reboxDonationDisplay !== display) {
                clearInterval(window.reboxDonationTimer);
                window.reboxDonationTimer = null;
            }

            window.reboxDonationDisplay = display;

            if (!window.reboxDonationTimer) {
                window.reboxDonationTimer = setInterval(render, 1000);
            }
        }

        function setDonationQrStatus(scanner, message, isError = false) {
            const status = scanner?.querySelector('[data-donation-qr-status]');
            if (!status) return;
            status.textContent = message;
            status.classList.toggle('is-error', isError);
        }

        function stopDonationQrScanner() {
            window.reboxDonationQrSession = (window.reboxDonationQrSession || 0) + 1;
            window.reboxDonationQrScanning = false;

            if (window.reboxDonationQrFrame) {
                window.cancelAnimationFrame(window.reboxDonationQrFrame);
            }

            window.reboxDonationQrFrame = null;
            window.reboxDonationQrLastValue = '';

            if (window.reboxDonationQrStream) {
                window.reboxDonationQrStream.getTracks().forEach((track) => track.stop());
                window.reboxDonationQrStream = null;
            }

            const scanner = document.querySelector('[data-donation-qr-scanner]');
            const video = scanner?.querySelector('[data-donation-qr-video]');
            const empty = scanner?.querySelector('[data-donation-qr-empty]');
            const cameraWrap = scanner?.querySelector('.qr-camera-wrap');

            if (video) {
                video.srcObject = null;
            }

            empty?.classList.remove('is-hidden');
            cameraWrap?.classList.remove('is-scanning');
        }

        function extractDonationQrCode(value) {
            const match = String(value || '').toUpperCase().match(/[A-Z]{2}-\d{2}/);
            return match ? match[0] : String(value || '').trim().toUpperCase();
        }

        async function initDonationQrScanner(root) {
            const scanner = root.querySelector('[data-donation-qr-scanner]');

            if (!scanner) {
                stopDonationQrScanner();
                return;
            }

            const video = scanner.querySelector('[data-donation-qr-video]');
            const empty = scanner.querySelector('[data-donation-qr-empty]');
            const startButton = scanner.querySelector('[data-donation-qr-start]');
            const stopButton = scanner.querySelector('[data-donation-qr-stop]');
            const switchButton = scanner.querySelector('[data-donation-qr-switch]');
            const input = root.querySelector('[data-donation-qr-input]');
            const submitButton = root.querySelector('[data-donation-open-submit]');
            const expectedCode = scanner.dataset.expectedCode || '';
            let scanFrameCount = 0;
            let lastScanAt = 0;
            let activeFacingMode = window.reboxDonationQrFacingMode || 'environment';

            if (scanner.dataset.bound === 'true') {
                return;
            }

            scanner.dataset.bound = 'true';

            const handleScanValue = (rawValue) => {
                const code = extractDonationQrCode(rawValue);

                if (!code) {
                    setDonationQrStatus(scanner, 'QR terbaca, tetapi kode Rebox tidak ditemukan.', true);
                    return;
                }

                if (!input || !submitButton) {
                    setDonationQrStatus(scanner, 'Input kode box belum siap. Tutup modal lalu buka lagi.', true);
                    return;
                }

                if (code !== expectedCode) {
                    setDonationQrStatus(scanner, `QR terbaca ${code}, tetapi lokasi ini membutuhkan ${expectedCode}.`, true);
                    window.reboxDonationQrLastValue = '';
                    return;
                }

                input.value = code;
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));

                setDonationQrStatus(scanner, `QR ${code} cocok. Membuka box...`);
                stopDonationQrScanner();

                const livewireRoot = root.closest('[wire\\:id]') || root;
                const livewireId = livewireRoot?.getAttribute('wire:id');
                const component = livewireId && window.Livewire ? window.Livewire.find(livewireId) : null;

                if (component) {
                    component.set('kode_box_input', code).then(() => submitButton?.click());
                    return;
                }

                window.setTimeout(() => submitButton?.click(), 350);
            };

            const decodeCanvas = (sourceCanvas, crop = null) => {
                const sourceContext = sourceCanvas.getContext('2d', { willReadFrequently: true });

                if (!sourceContext || typeof window.jsQR !== 'function') {
                    return null;
                }

                if (!crop) {
                    const imageData = sourceContext.getImageData(0, 0, sourceCanvas.width, sourceCanvas.height);
                    return window.jsQR(imageData.data, sourceCanvas.width, sourceCanvas.height, {
                        inversionAttempts: 'attemptBoth',
                    });
                }

                const cropCanvas = window.reboxDonationQrCropCanvas || document.createElement('canvas');
                const cropContext = cropCanvas.getContext('2d', { willReadFrequently: true });

                window.reboxDonationQrCropCanvas = cropCanvas;

                if (!cropContext) {
                    return null;
                }

                cropCanvas.width = crop.width;
                cropCanvas.height = crop.height;
                cropContext.drawImage(
                    sourceCanvas,
                    crop.x,
                    crop.y,
                    crop.width,
                    crop.height,
                    0,
                    0,
                    crop.width,
                    crop.height
                );

                const imageData = cropContext.getImageData(0, 0, crop.width, crop.height);
                return window.jsQR(imageData.data, crop.width, crop.height, {
                    inversionAttempts: 'attemptBoth',
                });
            };

            const scanLoop = () => {
                if (!window.reboxDonationQrScanning || !video) {
                    return;
                }

                const now = performance.now();

                if (video.readyState >= HTMLMediaElement.HAVE_CURRENT_DATA && now - lastScanAt >= 90) {
                    try {
                        const canvas = window.reboxDonationQrCanvas || document.createElement('canvas');
                        const context = canvas.getContext('2d', { willReadFrequently: true });
                        const sourceWidth = video.videoWidth;
                        const sourceHeight = video.videoHeight;
                        const scale = Math.min(1, 720 / Math.max(sourceWidth || 1, sourceHeight || 1));
                        const width = Math.max(1, Math.floor(sourceWidth * scale));
                        const height = Math.max(1, Math.floor(sourceHeight * scale));

                        window.reboxDonationQrCanvas = canvas;

                        if (sourceWidth && sourceHeight && width && height && context && typeof window.jsQR === 'function') {
                            lastScanAt = now;
                            canvas.width = width;
                            canvas.height = height;
                            context.drawImage(video, 0, 0, sourceWidth, sourceHeight, 0, 0, width, height);

                            const centerSize = Math.floor(Math.min(width, height) * 0.86);
                            const centerCrop = {
                                x: Math.max(0, Math.floor((width - centerSize) / 2)),
                                y: Math.max(0, Math.floor((height - centerSize) / 2)),
                                width: centerSize,
                                height: centerSize,
                            };
                            const wideHeight = Math.floor(height * 0.82);
                            const wideCrop = {
                                x: 0,
                                y: Math.max(0, Math.floor((height - wideHeight) / 2)),
                                width,
                                height: wideHeight,
                            };

                            const qr = decodeCanvas(canvas, centerCrop)
                                || (scanFrameCount % 2 === 0 ? decodeCanvas(canvas) : null)
                                || (scanFrameCount % 3 === 0 ? decodeCanvas(canvas, wideCrop) : null);

                            if (qr?.data) {
                                const scannedValue = String(qr.data);

                                if (scannedValue === window.reboxDonationQrLastValue && performance.now() - (window.reboxDonationQrLastSeenAt || 0) < 450) {
                                    scanFrameCount += 1;
                                    window.reboxDonationQrFrame = window.requestAnimationFrame(scanLoop);
                                    return;
                                }

                                window.reboxDonationQrLastValue = scannedValue;
                                window.reboxDonationQrLastSeenAt = performance.now();
                                handleScanValue(scannedValue);
                            }
                        } else if (typeof window.jsQR !== 'function') {
                            setDonationQrStatus(scanner, 'Decoder QR belum termuat. Refresh halaman lalu coba lagi.', true);
                        }
                    } catch (error) {
                        if (scanFrameCount % 45 === 0) {
                            setDonationQrStatus(scanner, 'Kamera aktif. Arahkan QR lebih dekat dan pastikan gambar tidak blur.', false);
                        }
                    }
                }

                scanFrameCount += 1;

                if (window.reboxDonationQrScanning) {
                    window.reboxDonationQrFrame = window.requestAnimationFrame(scanLoop);
                }
            };

            const updateCameraSwitch = (isActive, isSwitching = false) => {
                if (!switchButton) return;

                switchButton.disabled = !isActive || isSwitching;
                switchButton.classList.toggle('is-switching', isSwitching);
                switchButton.setAttribute(
                    'aria-label',
                    activeFacingMode === 'environment' ? 'Ganti ke kamera depan' : 'Ganti ke kamera belakang'
                );
            };

            const startCamera = async (facingMode = activeFacingMode, strict = false) => {
                if (!navigator.mediaDevices?.getUserMedia) {
                    setDonationQrStatus(scanner, 'Browser tidak mendukung akses kamera. Gunakan Chrome terbaru di laptop ini.', true);
                    return false;
                }

                if (typeof window.jsQR !== 'function') {
                    setDonationQrStatus(scanner, 'Decoder QR belum termuat. Refresh halaman lalu coba lagi.', true);
                    return false;
                }

                try {
                    if (typeof window.stopRequestQrScanner === 'function') {
                        window.stopRequestQrScanner();
                    }

                    stopDonationQrScanner();
                    const cameraSession = window.reboxDonationQrSession;
                    updateCameraSwitch(false, true);
                    let cameraStream;

                    try {
                        cameraStream = await navigator.mediaDevices.getUserMedia({
                            video: {
                                width: { ideal: 960 },
                                height: { ideal: 540 },
                                facingMode: strict ? { exact: facingMode } : { ideal: facingMode },
                            },
                            audio: false,
                        });
                    } catch (cameraError) {
                        if (strict) throw cameraError;

                        cameraStream = await navigator.mediaDevices.getUserMedia({
                            video: {
                                width: { ideal: 960 },
                                height: { ideal: 540 },
                            },
                            audio: false,
                        });
                    }

                    if (cameraSession !== window.reboxDonationQrSession || !scanner.isConnected || !video?.isConnected) {
                        cameraStream.getTracks().forEach((track) => track.stop());
                        return false;
                    }

                    window.reboxDonationQrStream = cameraStream;
                    video.srcObject = cameraStream;
                    empty?.classList.add('is-hidden');
                    video.closest('.qr-camera-wrap')?.classList.add('is-scanning');
                    activeFacingMode = facingMode;
                    window.reboxDonationQrFacingMode = facingMode;
                    window.reboxDonationQrScanning = true;
                    scanFrameCount = 0;
                    setDonationQrStatus(
                        scanner,
                        `${facingMode === 'environment' ? 'Kamera belakang' : 'Kamera depan'} aktif. Tampilkan QR ke kamera, box akan terbuka otomatis saat kode cocok.`
                    );
                    await video.play();
                    updateCameraSwitch(true);
                    scanLoop();
                    return true;
                } catch (error) {
                    updateCameraSwitch(false);
                    setDonationQrStatus(scanner, 'Kamera gagal aktif. Izinkan akses kamera di browser, lalu coba lagi.', true);
                    return false;
                }
            };

            startButton?.addEventListener('click', async () => {
                await startCamera(activeFacingMode);
            });

            stopButton?.addEventListener('click', () => {
                stopDonationQrScanner();
                updateCameraSwitch(false);
                setDonationQrStatus(scanner, 'Kamera dimatikan.');
            });

            switchButton?.addEventListener('click', async () => {
                if (!window.reboxDonationQrStream) return;

                const previousFacingMode = activeFacingMode;
                const nextFacingMode = previousFacingMode === 'environment' ? 'user' : 'environment';
                const switched = await startCamera(nextFacingMode, true);

                if (!switched) {
                    const restored = await startCamera(previousFacingMode);

                    if (restored) {
                        setDonationQrStatus(scanner, 'Kamera lain tidak tersedia pada perangkat ini.', true);
                    }
                }
            });
        }

        function queueDonationInit() {
            window.requestAnimationFrame(() => window.setTimeout(initDonationPage, 0));
        }

        window.addEventListener('beforeunload', stopDonationQrScanner);
        window.addEventListener('pagehide', stopDonationQrScanner);
        document.addEventListener('livewire:navigating', stopDonationQrScanner);

        document.addEventListener('click', (event) => {
            const dropdown = document.querySelector('[data-profile-dropdown]');
            if (dropdown && !dropdown.contains(event.target)) dropdown.classList.remove('is-open');
        });

        document.addEventListener('DOMContentLoaded', queueDonationInit);
        document.addEventListener('livewire:navigated', queueDonationInit);
        document.addEventListener('livewire:initialized', queueDonationInit);
        document.addEventListener('livewire:init', () => {
            if (window.Livewire) {
                try {
                    window.Livewire.hook('morph.updated', queueDonationInit);
                    window.Livewire.hook('commit', (payload = {}) => {
                        if (typeof payload.succeed === 'function') {
                            payload.succeed(queueDonationInit);
                        } else {
                            queueDonationInit();
                        }
                    });
                } catch (error) {
                    queueDonationInit();
                }
            }
        });
        document.addEventListener('livewire:update', queueDonationInit);
        document.addEventListener('livewire:updated', queueDonationInit);

        if (!window.reboxDonationObserver) {
            window.reboxDonationObserver = new MutationObserver(queueDonationInit);
            window.reboxDonationObserver.observe(document.body, {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['data-step'],
            });
        }

        if (!window.reboxDonationWatchdog) {
            window.reboxDonationWatchdog = window.setInterval(initDonationPage, 500);
        }
    </script>
</div>
>>>>>>> zunadeafiturv1
