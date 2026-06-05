<<<<<<< HEAD
<div class="container-fluid p-0 m-0 vh-100 overflow-hidden">
    <style>
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #eef2f5;
            font-family: 'Inter', sans-serif;
        }

        * {
            transition: 0.3s ease;
        }

        .main-wrapper {
            width: 100vw;
            height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(16,133,78,0.12), transparent 25%),
                radial-gradient(circle at bottom right, rgba(16,133,78,0.10), transparent 25%),
                linear-gradient(135deg, #f5f8f7 0%, #edf3f1 100%);
        }

        .left-panel {
            height: 100vh;
            padding: 42px 54px !important;
            background: linear-gradient(180deg, #10854e 0%, #0c6a3d 100%);
            color: white;
            overflow: hidden;
            position: relative;
        }

        .left-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.08), rgba(255,255,255,0.02));
            backdrop-filter: blur(12px);
        }

        .left-panel > * {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            line-height: 1.08;
            letter-spacing: -1px;
        }

        .hero-desc {
            font-size: 1rem;
            line-height: 1.8;
            opacity: 0.9;
        }

        .feature-card {
            border-radius: 22px;
            background: rgba(255,255,255,0.10);
            border: 1px solid rgba(255,255,255,0.16);
            backdrop-filter: blur(12px);
            padding: 18px 20px;
            box-shadow: inset 0 1px 1px rgba(255,255,255,0.15), 0 8px 20px rgba(0,0,0,0.08);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            background: rgba(255,255,255,0.14);
        }

        .feature-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(255,255,255,0.16);
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.15rem;
        }

        .right-panel {
            height: 100vh;
            overflow: hidden;
            padding: 24px 40px !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            width: 100%;
            max-width: 520px;
            max-height: calc(100vh - 48px);
            overflow-y: auto;
            border-radius: 28px;
            background: rgba(255,255,255,0.45);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255,255,255,0.35);
            box-shadow: 0 15px 45px rgba(0,0,0,0.08), inset 0 1px 1px rgba(255,255,255,0.35);
            animation: fadeUp 0.7s ease;
        }

        .register-card::-webkit-scrollbar {
            width: 4px;
        }

        .register-card::-webkit-scrollbar-thumb {
            background: rgba(0,0,0,0.15);
            border-radius: 10px;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-title {
            font-size: 2rem;
            letter-spacing: -0.5px;
        }

        .glass-input {
            border-radius: 18px;
            background: rgba(255,255,255,0.42);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.35);
            box-shadow: inset 0 1px 1px rgba(255,255,255,0.25), 0 6px 14px rgba(0,0,0,0.04);
        }

        .glass-input:focus-within {
            border-color: rgba(16,133,78,0.45);
            box-shadow: 0 10px 24px rgba(16,133,78,0.10), inset 0 1px 1px rgba(255,255,255,0.3);
            transform: translateY(-2px) scale(1.01);
        }

        .form-control,
        .form-select {
            background: transparent !important;
            font-size: 0.95rem;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: none !important;
        }

        .glass-btn {
            background: rgba(16,133,78,0.82);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.22);
            border-radius: 18px;
            box-shadow: 0 10px 24px rgba(16,133,78,0.20), inset 0 1px 1px rgba(255,255,255,0.22);
            overflow: hidden;
            position: relative;
        }

        .glass-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(16,133,78,0.28), inset 0 1px 1px rgba(255,255,255,0.25);
        }

        .home-btn {
            background: rgba(255,255,255,0.45);
            backdrop-filter: blur(10px);
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.4);
            box-shadow: 0 4px 10px rgba(0,0,0,0.04);
        }

        .password-strength {
            padding-left: 6px;
            padding-right: 6px;
        }

        .strength-bar {
            width: 100%;
            height: 8px;
            background: #d1d5db;
            border-radius: 999px;
            overflow: hidden;
        }

        .strength-fill {
            width: 0%;
            height: 100%;
            border-radius: 999px;
            background: #ef4444;
            transition: all 0.3s ease;
        }

        .strength-fill.weak {
            width: 33%;
            background: #ef4444;
        }

        .strength-fill.medium {
            width: 66%;
            background: #f59e0b;
        }

        .strength-fill.strong {
            width: 100%;
            background: #16a34a;
        }

        .strength-rules {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .rule {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 11px;
            font-weight: 700;
            color: #ef4444;
            line-height: 1.3;
        }

        .rule.valid {
            color: #16a34a;
        }

        @media (max-width: 991.98px) {
            html, body {
                overflow-y: auto;
            }

            .main-wrapper {
                height: auto;
                min-height: 100vh;
            }

            .left-panel {
                display: none !important;
            }

            .right-panel {
                height: auto;
                padding: 18px !important;
            }

            .register-card {
                max-height: none;
                max-width: 100%;
=======
<div class="rebox-auth-page">
    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            min-height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                linear-gradient(135deg, rgba(0, 148, 0, 0.045) 0 1px, transparent 1px 52px),
                linear-gradient(45deg, rgba(0, 148, 0, 0.035) 0 1px, transparent 1px 58px),
                linear-gradient(115deg, #f8fbf8 0%, #eef7ef 48%, #ffffff 100%);
        }

        .rebox-auth-page {
            width: calc(100% + 15px);
            min-height: 100vh;
            margin: -1.5rem -7.5px 0;
            padding: 0 140px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 64px;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(0, 148, 0, 0.050) 0 1px, transparent 1px 54px),
                linear-gradient(45deg, rgba(0, 148, 0, 0.035) 0 1px, transparent 1px 62px),
                linear-gradient(115deg, #f8fbf8 0%, #eef7ef 48%, #ffffff 100%);
            perspective: 1200px;
        }

        .rebox-auth-page::before,
        .rebox-auth-page::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: 0;
        }

        .rebox-auth-page::before {
            width: 58%;
            height: 150%;
            left: -28%;
            top: -24%;
            border-radius: 0 120px 120px 0;
            background:
                linear-gradient(90deg, rgba(255, 255, 255, 0.62), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(0deg, rgba(0, 148, 0, 0.055) 0 1px, transparent 1px 28px);
            transform: rotate(-9deg);
            opacity: .8;
        }

        .rebox-auth-page::after {
            width: 42%;
            height: 100%;
            right: -20%;
            bottom: -18%;
            border-radius: 120px 0 0 120px;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.58), rgba(255, 255, 255, 0)),
                repeating-linear-gradient(90deg, rgba(0, 148, 0, 0.05) 0 1px, transparent 1px 30px);
            transform: rotate(11deg);
            opacity: .62;
        }

        .bg-accent {
            position: absolute;
            inset: auto 0 0;
            height: 150px;
            background:
                linear-gradient(180deg, transparent, rgba(0, 148, 0, 0.035)),
                repeating-linear-gradient(135deg, rgba(0, 148, 0, 0.045) 0 1px, transparent 1px 26px);
            pointer-events: none;
            z-index: 0;
            animation: authAccentFloat 9s ease-in-out infinite;
        }

        .left-content {
            width: 45%;
            max-width: 610px;
            position: relative;
            z-index: 1;
            animation: authContentIn 0.72s cubic-bezier(0.19, 1, 0.22, 1) both;
        }

        .left-content h1 {
            width: max-content;
            max-width: 100%;
            margin: 0 0 10px;
            color: #009400;
            font-size: clamp(42px, 5vw, 58px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: 0;
            overflow: hidden;
            white-space: nowrap;
            border-right: 4px solid rgba(0, 148, 0, 0.82);
            animation:
                authTyping 7.5s steps(17, end) infinite,
                authCaretBlink 0.78s step-end infinite,
                authTitleGlow 3.4s ease-in-out infinite;
        }

        .left-content p {
            margin: 0 0 35px;
            color: #3d9f3d;
            font-size: 20px;
            font-weight: 600;
        }

        .button-group {
            display: flex;
            align-items: center;
        }

        .auth-tab {
            height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            text-decoration: none;
            font-size: 16px;
            font-weight: 800;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
            will-change: transform;
        }

        .auth-tab::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, 0.38) 45%, transparent 72%);
            transform: translateX(-120%);
            transition: transform 0.55s ease;
        }

        .auth-tab,
        .auth-tab:visited,
        .auth-tab:focus,
        .auth-tab:active,
        .auth-tab:hover {
            color: #ffffff;
            outline: none;
            text-decoration: none;
        }

        .auth-tab:hover {
            transform: translateY(-2px);
        }

        .auth-tab:hover::after {
            transform: translateX(120%);
        }

        .auth-tab:active {
            transform: translateY(0) scale(0.98);
        }

        .auth-tab-login {
            width: 120px;
            color: #ffffff;
            background: rgba(0, 148, 0, 0.50);
            border-radius: 8px 0 0 8px;
            box-shadow: 0 2px 10px rgba(0, 148, 0, 0.10);
        }

        .auth-tab-register {
            width: 130px;
            height: 52px;
            margin-left: -5px;
            color: #ffffff;
            background: #009400;
            border-radius: 8px;
            box-shadow: 0 6px 16px rgba(0, 148, 0, 0.45);
        }

        .register-card {
            width: 470px;
            flex: 0 0 470px;
            padding: 42px 36px;
            border: 1px solid rgba(0, 148, 0, 0.50);
            border-radius: 28px;
            background: #d9f0d5;
            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 0 50px rgba(0, 255, 0, 0.08);
            position: relative;
            z-index: 1;
            transform-origin: center right;
            transform-style: preserve-3d;
            animation: authCardFlipIn 0.72s cubic-bezier(0.19, 1, 0.22, 1) both;
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease, background 0.28s ease;
            will-change: transform;
        }

        .register-card:hover {
            transform: translateY(-8px) rotateX(1.2deg) rotateY(-1.8deg);
            border-color: rgba(0, 148, 0, 0.70);
            background: rgba(217, 240, 213, 0.94);
            box-shadow:
                0 28px 56px rgba(0, 0, 0, 0.11),
                0 0 62px rgba(0, 148, 0, 0.16);
        }

        .rebox-auth-page.is-flipping .register-card {
            animation: authCardFlipOut 0.34s ease-in both;
        }

        .title-role {
            margin-bottom: 14px;
            text-align: center;
            color: #009400;
            font-size: 15px;
            font-weight: 800;
        }

        .role-selection {
            display: flex;
            gap: 14px;
            margin-bottom: 24px;
        }

        .role-option {
            flex: 1;
        }

        .role-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .role-btn {
            width: 100%;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid rgba(0, 148, 0, 0.70);
            border-radius: 14px;
            background: rgba(0, 148, 0, 0.36);
            color: #ffffff;
            font-weight: 800;
            cursor: pointer;
            transition: transform 0.22s ease, box-shadow 0.22s ease, background 0.22s ease, border-color 0.22s ease;
            will-change: transform;
        }

        .role-option input:checked + .role-btn,
        .role-btn:hover,
        .role-btn.active {
            background: #009400;
            color: #ffffff;
            box-shadow: 0 8px 18px rgba(0, 148, 0, 0.24);
        }

        .role-btn:hover {
            transform: translateY(-2px);
        }

        .role-btn:active {
            transform: translateY(0) scale(0.98);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 22px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #6cb56c;
        }

        .divider span {
            color: #111111;
            font-size: 15px;
            font-weight: 800;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #5d5d5d;
            font-size: 14px;
            font-weight: 800;
        }

        .input-box {
            width: 100%;
            min-height: 55px;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 18px;
            border: 1.5px solid #20a020;
            border-radius: 14px;
            background: #d9f0d5;
            transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease, background 0.22s ease;
        }

        .input-box:focus-within {
            background: #eff8ec;
            box-shadow: 0 0 0 4px rgba(0, 148, 0, 0.10);
            transform: translateY(-2px);
        }

        .input-box.has-error {
            border-color: #dc2626;
        }

        .input-box i {
            color: #333333;
            font-size: 18px;
        }

        .input-box input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: #111111;
            font-size: 15px;
            font-weight: 700;
        }

        .input-box input::placeholder {
            color: #111111;
            font-weight: 700;
            opacity: 0.72;
        }

        .toggle-password {
            border: 0;
            padding: 0;
            background: transparent;
            cursor: pointer;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .toggle-password:hover {
            transform: scale(1.08);
        }

        .toggle-password:active {
            transform: scale(0.94);
        }

        .password-note,
        .field-error,
        .success-message {
            margin-top: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .password-note {
            color: #666666;
        }

        .field-error {
            color: #dc2626;
        }

        .success-message {
            margin: 0 0 18px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border: 1px solid rgba(0, 148, 0, 0.22);
            border-radius: 14px;
            background: rgba(0, 148, 0, 0.10);
            color: #006b1f;
            font-weight: 700;
            line-height: 1.45;
        }

        .signup-btn {
            width: 100%;
            height: 54px;
            margin-top: 12px;
            border: 0;
            border-radius: 14px;
            background: #009400;
            color: #ffffff;
            font-size: 18px;
            font-weight: 800;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        }

        .signup-btn::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, 0.35) 46%, transparent 72%);
            transform: translateX(-120%);
            transition: transform 0.55s ease;
        }

        .signup-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 148, 0, 0.35);
        }

        .signup-btn:hover::after {
            transform: translateX(120%);
        }

        .signup-btn:active {
            transform: translateY(0) scale(0.98);
        }

        .auth-link {
            display: block;
            margin-top: 18px;
            text-align: center;
            color: #007a00;
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .auth-link,
        .auth-link:visited,
        .auth-link:focus,
        .auth-link:active,
        .auth-link:hover {
            color: #005f00;
            outline: none;
            text-decoration: none;
        }

        .auth-link:hover {
            transform: translateY(-1px);
        }

        @keyframes authContentIn {
            from {
                opacity: 0;
                transform: translateX(-28px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes authTyping {
            0% {
                width: 0;
            }
            36%, 70% {
                width: 17ch;
            }
            92%, 100% {
                width: 0;
            }
        }

        @keyframes authCaretBlink {
            0%, 100% {
                border-color: rgba(0, 148, 0, 0);
            }
            50% {
                border-color: rgba(0, 148, 0, 0.82);
            }
        }

        @keyframes authTitleGlow {
            0%, 100% {
                text-shadow: 0 0 0 rgba(0, 148, 0, 0);
            }
            50% {
                text-shadow: 0 10px 26px rgba(0, 148, 0, 0.16);
            }
        }

        @keyframes authCardFlipIn {
            0% {
                opacity: 0;
                transform: translateX(34px) rotateY(-18deg) scale(0.96);
            }
            62% {
                opacity: 1;
                transform: translateX(0) rotateY(2.5deg) scale(1.01);
            }
            100% {
                opacity: 1;
                transform: translateX(0) rotateY(0) scale(1);
            }
        }

        @keyframes authCardFlipOut {
            from {
                opacity: 1;
                transform: translateX(0) rotateY(0) scale(1);
            }
            to {
                opacity: 0;
                transform: translateX(-28px) rotateY(18deg) scale(0.96);
            }
        }

        @keyframes authAccentFloat {
            0%, 100% {
                transform: translate3d(0, 0, 0) scale(1);
            }
            50% {
                transform: translate3d(12px, -14px, 0) scale(1.08);
            }
        }

        @media (max-width: 1200px) {
            .rebox-auth-page {
                padding: 40px;
                flex-direction: column;
                justify-content: center;
                gap: 50px;
                overflow: auto;
            }

            .left-content {
                width: 100%;
                text-align: center;
            }

            .button-group {
                justify-content: center;
            }

            .bg-accent {
                left: 62%;
                bottom: 42%;
            }
        }

        @media (max-width: 600px) {
            .rebox-auth-page {
                padding: 28px 18px;
            }

            .register-card {
                width: 100%;
                flex-basis: auto;
                padding: 30px 22px;
                border-radius: 22px;
            }

            .register-card:hover {
                transform: translateY(-4px);
            }

            .left-content h1 {
                font-size: 42px;
                width: 17ch;
            }

            .left-content p {
                font-size: 16px;
>>>>>>> zunadeafiturv1
            }
        }
    </style>

<<<<<<< HEAD
    <div class="main-wrapper">
        <div class="row g-0 h-100">

            <div class="col-lg-5 d-none d-lg-flex flex-column justify-content-between left-panel">
                <div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-box-open fs-4 me-3"></i>
                        <h2 class="fw-bold m-0">Rebox</h2>
                    </div>

                    <h1 class="fw-bold mb-4 hero-title">Bergabung dengan Rebox</h1>

                    <p class="hero-desc mb-4">
                        Buat akun sekarang untuk mulai berdonasi atau menerima bantuan barang layak pakai dengan mudah dan transparan.
                    </p>

                    <div class="d-flex flex-column gap-3 mt-4">
                        <div class="feature-card d-flex align-items-center">
                            <div class="feature-icon me-3">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Keamanan Terjamin</h6>
                                <p class="mb-0 small" style="opacity: 0.78;">
                                    Data pribadi dan riwayat donasi tersimpan aman.
                                </p>
                            </div>
                        </div>

                        <div class="feature-card d-flex align-items-center">
                            <div class="feature-icon me-3">
                                <i class="fas fa-hand-holding-heart"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1">Komunitas Sosial</h6>
                                <p class="mb-0 small" style="opacity: 0.78;">
                                    Terhubung dengan donatur dan penerima lainnya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="opacity-50 small">
                    © 2026 Rebox Indonesia • Berbagi Kebaikan
                </div>
            </div>

            <div class="col-lg-7 right-panel">
                <div class="register-card p-4">

                    <div class="mb-4 text-center">
                        <h1 class="fw-bold text-dark mb-2 form-title">Daftar Akun</h1>
                        <p class="text-muted mb-0">
                            Lengkapi data untuk mulai aksi sosialmu
                        </p>
                    </div>

                    <form wire:submit.prevent="register">
                        <div class="row">

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">Nama Lengkap</label>
                                <div class="input-group p-2 glass-input @error('name') border border-danger @enderror">
                                    <span class="input-group-text bg-transparent border-0 text-muted">
                                        <i class="fas fa-user-circle"></i>
                                    </span>
                                    <input type="text" wire:model="name" class="form-control border-0 shadow-none py-1" placeholder="Nama lengkap Anda">
                                </div>
                                @error('name')
                                    <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">Email Address</label>
                                <div class="input-group p-2 glass-input @error('email') border border-danger @enderror">
                                    <span class="input-group-text bg-transparent border-0 text-muted">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                    <input type="email" wire:model="email" class="form-control border-0 shadow-none py-1" placeholder="nama@email.com">
                                </div>
                                @error('email')
                                    <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">Daftar Sebagai</label>
                                <div class="input-group p-2 glass-input @error('role') border border-danger @enderror">
                                    <span class="input-group-text bg-transparent border-0 text-muted">
                                        <i class="fas fa-user-tag"></i>
                                    </span>
                                    <select class="form-select border-0 shadow-none py-1" wire:model="role">
                                        <option value="">-- Pilih Peran --</option>
                                        <option value="donatur">Donatur</option>
                                        <option value="penerima">Penerima</option>
                                    </select>
                                </div>
                                @error('role')
                                    <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">Password</label>
                                <div class="input-group p-2 glass-input @error('password') border border-danger @enderror">
                                    <span class="input-group-text bg-transparent border-0 text-muted">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                    <input type="password" id="passwordInput" wire:model="password" class="form-control border-0 shadow-none py-1" placeholder="Min. 8 karakter">
                                </div>

                                <div class="password-strength mt-2">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="strengthFill"></div>
                                    </div>

                                    <div class="strength-rules mt-2">
                                        <div class="rule" id="ruleLength">
                                            <i class="far fa-circle-xmark"></i>
                                            <span>Panjang minimal 8 karakter</span>
                                        </div>

                                        <div class="rule" id="ruleCase">
                                            <i class="far fa-circle-xmark"></i>
                                            <span>Huruf kecil dan besar</span>
                                        </div>

                                        <div class="rule" id="ruleNumber">
                                            <i class="far fa-circle-xmark"></i>
                                            <span>Minimal 1 angka</span>
                                        </div>
                                    </div>
                                </div>

                                @error('password')
                                    <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-secondary ms-2">Konfirmasi</label>
                                <div class="input-group p-2 glass-input">
                                    <span class="input-group-text bg-transparent border-0 text-muted">
                                        <i class="fas fa-check-circle"></i>
                                    </span>
                                    <input type="password" wire:model="password_confirmation" class="form-control border-0 shadow-none py-1" placeholder="Ulangi">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn glass-btn text-white w-100 py-3 fw-bold mt-3 mb-3">
                            Buat Akun Sekarang
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>

                        <div class="text-center">
                            <span class="text-muted small">Sudah punya akun?</span>
                            <a href="/login" wire:navigate class="small fw-bold text-success text-decoration-none ms-1">
                                Masuk di sini
                            </a>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/" wire:navigate class="home-btn text-muted small text-decoration-none py-2 px-4 d-inline-flex align-items-center">
                            <i class="fas fa-home me-2"></i>
                            Kembali ke Beranda
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        function initPasswordStrength() {
            const passwordInput = document.getElementById('passwordInput');
            const strengthFill = document.getElementById('strengthFill');
            const ruleLength = document.getElementById('ruleLength');
            const ruleCase = document.getElementById('ruleCase');
            const ruleNumber = document.getElementById('ruleNumber');

            if (!passwordInput || !strengthFill || !ruleLength || !ruleCase || !ruleNumber) return;

            passwordInput.oninput = function () {
                const value = passwordInput.value;

                const hasLength = value.length >= 8;
                const hasCase = /[a-z]/.test(value) && /[A-Z]/.test(value);
                const hasNumber = /[0-9]/.test(value);

                updateRule(ruleLength, hasLength);
                updateRule(ruleCase, hasCase);
                updateRule(ruleNumber, hasNumber);

                let score = 0;
                if (hasLength) score++;
                if (hasCase) score++;
                if (hasNumber) score++;

                strengthFill.className = 'strength-fill';

                if (score === 1) {
                    strengthFill.classList.add('weak');
                } else if (score === 2) {
                    strengthFill.classList.add('medium');
                } else if (score === 3) {
                    strengthFill.classList.add('strong');
                }
            };
        }

        function updateRule(element, isValid) {
            const icon = element.querySelector('i');

            if (isValid) {
                element.classList.add('valid');
                icon.className = 'far fa-circle-check';
            } else {
                element.classList.remove('valid');
                icon.className = 'far fa-circle-xmark';
            }
        }

        document.addEventListener('DOMContentLoaded', initPasswordStrength);
        document.addEventListener('livewire:navigated', initPasswordStrength);
    </script>
</div>
=======
    <div class="left-content">
        <h1>Rebox Application</h1>
        <p>Berikan kehidupan kedua untuk barang Anda</p>

        <div class="button-group">
            <a href="/login" wire:navigate class="auth-tab auth-tab-login auth-switch-link">Login</a>
            <a href="/register" wire:navigate class="auth-tab auth-tab-register auth-switch-link">Register</a>
        </div>
    </div>

    <div class="register-card">
        @if (session()->has('message'))
            <div class="success-message">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        <div class="title-role">Pilih Jenis Akun</div>

        <div class="role-selection">
            <div class="role-option">
                <input type="radio" id="registerRoleDonatur" name="role" value="donatur" form="registerForm" wire:model.live="role" @checked($role === 'donatur' || old('role') === 'donatur')>
                <label for="registerRoleDonatur" class="role-btn {{ ($role === 'donatur' || old('role') === 'donatur') ? 'active' : '' }}">
                    Donatur
                </label>
            </div>

            <div class="role-option">
                <input type="radio" id="registerRolePenerima" name="role" value="penerima" form="registerForm" wire:model.live="role" @checked($role === 'penerima' || old('role') === 'penerima')>
                <label for="registerRolePenerima" class="role-btn {{ ($role === 'penerima' || old('role') === 'penerima') ? 'active' : '' }}">
                    Penerima
                </label>
            </div>
        </div>
        @error('role') <div class="field-error" style="margin-top: -14px; margin-bottom: 14px;">{{ $message }}</div> @enderror

        <div class="divider">
            <span>Register</span>
        </div>

        <form id="registerForm" method="POST" action="{{ route('register.store') }}" wire:submit.prevent="register">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <div class="input-box @error('name') has-error @enderror">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="name" wire:model.live="name" value="{{ old('name') }}" placeholder="Nama lengkap">
                </div>
                @error('name') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="input-box @error('email') has-error @enderror">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" name="email" wire:model.live="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                @error('email') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-box @error('password') has-error @enderror">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="registerPassword" name="password" wire:model.live="password" placeholder="Password">
                    <button type="button" class="toggle-password" data-target="registerPassword" aria-label="Tampilkan password">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>
                <div class="password-note">Minimal 8 karakter, wajib ada huruf, angka, dan simbol.</div>
                @error('password') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <div class="input-box @error('password_confirmation') has-error @enderror">
                    <i class="fa-solid fa-check-circle"></i>
                    <input type="password" id="registerPasswordConfirmation" name="password_confirmation" wire:model.live="password_confirmation" placeholder="Ulangi password">
                    <button type="button" class="toggle-password" data-target="registerPasswordConfirmation" aria-label="Tampilkan konfirmasi password">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>
                @error('password_confirmation') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="signup-btn">Sign Up</button>
        </form>

        <a href="/login" wire:navigate class="auth-link auth-switch-link">Sudah punya akun? Login</a>
    </div>

    <span class="bg-accent"></span>
</div>

<script>
    function bindReboxPasswordToggle() {
        document.querySelectorAll('.toggle-password').forEach((button) => {
            if (button.dataset.bound === 'true') {
                return;
            }

            button.dataset.bound = 'true';
            button.addEventListener('click', () => {
                const input = document.getElementById(button.dataset.target);
                const icon = button.querySelector('i');

                if (!input || !icon) {
                    return;
                }

                const nextType = input.type === 'password' ? 'text' : 'password';
                input.type = nextType;
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        });
    }

    document.addEventListener('DOMContentLoaded', bindReboxPasswordToggle);
    document.addEventListener('livewire:navigated', bindReboxPasswordToggle);

    function bindReboxAuthSwitch() {
        document.querySelectorAll('.auth-switch-link').forEach((link) => {
            if (link.dataset.switchBound === 'true') {
                return;
            }

            link.dataset.switchBound = 'true';
            link.addEventListener('click', (event) => {
                const href = link.getAttribute('href');

                if (!href || href === window.location.pathname) {
                    return;
                }

                event.preventDefault();
                document.querySelector('.rebox-auth-page')?.classList.add('is-flipping');

                window.setTimeout(() => {
                    window.location.href = href;
                }, 260);
            });
        });
    }

    document.addEventListener('DOMContentLoaded', bindReboxAuthSwitch);
    document.addEventListener('livewire:navigated', bindReboxAuthSwitch);
</script>
>>>>>>> zunadeafiturv1
