<<<<<<< HEAD
<div class="container-fluid p-0 vh-100 overflow-hidden">
    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }

        @keyframes toastSlide {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
=======
<div class="rebox-auth-page">
    <style>
        * {
            box-sizing: border-box;
>>>>>>> zunadeafiturv1
        }

        html,
        body {
<<<<<<< HEAD
            height: 100%;
            overflow: hidden;
            background: #eef2f5;
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
        }

        .is-invalid-shake {
            animation: shake 0.4s ease-in-out;
            border-color: #dc3545 !important;
        }

        .glass-toast {
            position: fixed;
            top: 26px;
            right: 28px;
            z-index: 9999;
            width: 360px;
            max-width: calc(100% - 36px);
            padding: 18px 20px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.58);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.55);
            box-shadow:
                0 18px 45px rgba(0,0,0,0.12),
                inset 0 1px 1px rgba(255,255,255,0.55);
            animation: toastSlide 0.45s ease;
        }

        .glass-toast.hide-toast {
            opacity: 0;
            transform: translateY(-18px) scale(0.96);
            pointer-events: none;
        }

        .toast-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(16,133,78,0.14);
            color: #10854e;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow:
                inset 0 1px 1px rgba(255,255,255,0.65),
                0 8px 18px rgba(16,133,78,0.16);
        }

        .toast-progress {
            height: 4px;
            width: 100%;
            background: rgba(16,133,78,0.15);
            border-radius: 999px;
            overflow: hidden;
            margin-top: 14px;
        }

        .toast-progress span {
            display: block;
            height: 100%;
            width: 100%;
            background: #10854e;
            border-radius: 999px;
            animation: progressOut 4s linear forwards;
        }

        @keyframes progressOut {
            from { width: 100%; }
            to { width: 0%; }
        }

        .main-wrapper {
            height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(16,133,78,0.15), transparent 30%),
                radial-gradient(circle at bottom right, rgba(16,133,78,0.12), transparent 30%),
                #eef2f5;
        }

        .left-panel {
            overflow: hidden;
            position: relative;
            backdrop-filter: blur(10px);
        }

        .left-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,0.08),
                    rgba(255,255,255,0.02)
                );
            backdrop-filter: blur(10px);
        }

        .left-panel > * {
            position: relative;
            z-index: 2;
        }

        .right-panel {
            overflow: hidden;
            background: rgba(255,255,255,0.25);
            backdrop-filter: blur(20px);
            position: relative;
        }

        .login-card-container {
            width: 100%;
            max-width: 470px;
            border-radius: 32px;
            margin-top: -150px;
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.4);
            box-shadow:
                0 10px 40px rgba(0,0,0,0.08),
                inset 0 1px 1px rgba(255,255,255,0.35);
        }

        .glass-input {
            background: rgba(255,255,255,0.45) !important;
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,0.5) !important;
            box-shadow:
                inset 0 1px 1px rgba(255,255,255,0.3),
                0 4px 12px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
        }

        .glass-input:focus-within {
            transform: translateY(-1px);
            border-color: rgba(16,133,78,0.3) !important;
            box-shadow:
                0 8px 18px rgba(16,133,78,0.10),
                inset 0 1px 1px rgba(255,255,255,0.4);
        }

        .custom-rounded {
            border-radius: 50px !important;
        }

        .glass-button {
            background: rgba(16,133,78,0.78) !important;
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255,255,255,0.25) !important;
            box-shadow:
                0 8px 24px rgba(16,133,78,0.25),
                inset 0 1px 1px rgba(255,255,255,0.25);
            transition: all 0.3s ease;
        }

        .glass-button:hover {
            transform: translateY(-2px);
            box-shadow:
                0 14px 30px rgba(16,133,78,0.35),
                inset 0 1px 1px rgba(255,255,255,0.35);
        }

        .glass-icon {
            background: rgba(255,255,255,0.16);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow:
                inset 0 1px 1px rgba(255,255,255,0.25),
                0 6px 18px rgba(0,0,0,0.06);
        }

        @media (max-width: 991.98px) {
            html,
            body {
                overflow-y: auto;
            }

            .main-wrapper {
                height: auto;
            }

            .left-panel {
                display: none !important;
            }

            .right-panel {
                min-height: 100vh;
                padding: 20px;
            }

            .login-card-container {
                margin-top: 0;
                max-width: 100%;
            }

            .glass-toast {
                top: 18px;
                right: 18px;
                left: 18px;
                width: auto;
=======
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
            height: 52px;
            color: #ffffff;
            background: #009400;
            border-radius: 8px;
            box-shadow: 0 6px 16px rgba(0, 148, 0, 0.45);
            z-index: 1;
        }

        .auth-tab-register {
            width: 130px;
            margin-left: -5px;
            color: #ffffff;
            background: rgba(0, 148, 0, 0.50);
            border-radius: 0 8px 8px 0;
            box-shadow: 0 2px 10px rgba(0, 148, 0, 0.10);
        }

        .login-card {
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
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease, background 0.28s ease;
        }

        .login-card:hover {
            transform: translateY(-8px);
            border-color: rgba(0, 148, 0, 0.70);
            background: rgba(217, 240, 213, 0.94);
            box-shadow:
                0 28px 56px rgba(0, 0, 0, 0.11),
                0 0 62px rgba(0, 148, 0, 0.16);
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

        .field-error,
        .login-error,
        .success-message {
            margin-top: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .field-error {
            color: #dc2626;
        }

        .login-error {
            margin: 0 0 16px;
            padding: 12px 14px;
            border-radius: 12px;
            background: rgba(220, 38, 38, 0.10);
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
            line-height: 1.45;
        }

        .signin-btn {
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

        .signin-btn::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, 0.35) 46%, transparent 72%);
            transform: translateX(-120%);
            transition: transform 0.55s ease;
        }

        .signin-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 148, 0, 0.35);
        }

        .signin-btn:hover::after {
            transform: translateX(120%);
        }

        .signin-btn:active {
            transform: translateY(0) scale(0.98);
        }

        .google-login-btn {
            width: 100%;
            min-height: 52px;
            margin-top: 12px;
            border: 1.5px solid rgba(17, 17, 17, 0.10);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.78);
            color: #1f2937;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 11px;
            font-size: 15px;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 8px 18px rgba(17, 17, 17, 0.05);
            transition: transform 0.22s ease, box-shadow 0.22s ease, border-color 0.22s ease, background 0.22s ease, color 0.22s ease;
        }

        .google-login-btn:visited,
        .google-login-btn:focus,
        .google-login-btn:active,
        .google-login-btn:hover {
            text-decoration: none;
        }

        .google-login-btn:hover {
            color: #009400;
            background: rgba(255, 255, 255, 0.94);
            border-color: rgba(0, 148, 0, 0.28);
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(0, 148, 0, 0.13);
        }

        .google-login-btn:active {
            transform: translateY(0) scale(0.98);
        }

        .google-mark {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #ffffff;
            display: grid;
            place-items: center;
            box-shadow: inset 0 0 0 1px rgba(17, 17, 17, 0.08);
        }

        .google-mark svg {
            width: 16px;
            height: 16px;
            display: block;
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

            .login-card {
                width: 100%;
                flex-basis: auto;
                padding: 30px 22px;
                border-radius: 22px;
            }

            .login-card:hover {
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
    @if (session()->has('message'))
        <div id="successToast" class="glass-toast">
            <div class="d-flex align-items-center">
                <div class="toast-icon me-3">
                    <i class="fas fa-circle-check fs-5"></i>
                </div>

                <div>
                    <h6 class="fw-bold mb-1 text-dark">
                        Register Berhasil
                    </h6>

                    <p class="mb-0 small text-muted">
                        {{ session('message') }}
                    </p>
                </div>
            </div>

            <div class="toast-progress">
                <span></span>
            </div>
        </div>
    @endif

    <div class="main-wrapper">
        <div class="row g-0 h-100">

            <div class="col-lg-5 d-none d-lg-flex flex-column p-5 text-white transition-all left-panel"
                style="background: linear-gradient(180deg, {{ $role === 'donatur' ? '#10854e' : ($role === 'penerima' ? '#2D5A27' : '#10854e') }} 0%, #0c6a3d 100%); transition: 0.5s ease;">

                <div class="d-flex align-items-center mb-5">
                    <i class="fas fa-box-open text-white fs-3" style="margin-right: 1.25rem;"></i>
                    <h2 class="fw-bold m-0" style="letter-spacing: -1px;">Rebox</h2>
                </div>

                <div class="pe-lg-5 my-auto">

                    @if($role === 'donatur' || !$role)
                        <div class="animate__animated animate__fadeIn">
                            <h1 class="fw-bold mb-4" style="font-size: 3rem; line-height: 1.2;">
                                Berikan kehidupan kedua untuk barang Anda.
                            </h1>

                            <p class="mb-5 lh-lg" style="opacity: 0.9; font-size: 1.1rem; font-weight: 300;">
                                Donasikan barang bekas layak pakai melalui titik drop-off Rebox terdekat.
                                Setiap barang yang Anda beri membantu sesama dan menjaga bumi kita tetap hijau.
                            </p>
                        </div>
                    @else
                        <div class="animate__animated animate__fadeIn">
                            <h1 class="fw-bold mb-4" style="font-size: 3rem; line-height: 1.2;">
                                Dapatkan bantuan barang yang Anda butuhkan.
                            </h1>

                            <p class="mb-5 lh-lg" style="opacity: 0.9; font-size: 1.1rem; font-weight: 300;">
                                Ajukan permintaan barang layak pakai secara transparan dan mudah melalui ekosistem Rebox.
                            </p>
                        </div>
                    @endif

                    <div class="d-flex flex-column mt-5">

                        <div class="d-flex align-items-center mb-4">
                            <div style="margin-right: 1.5rem;">
                                <div class="glass-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px;">
                                    <i class="fas {{ $role === 'donatur' || !$role ? 'fa-sync-alt' : 'fa-box-open' }} fs-5"></i>
                                </div>
                            </div>

                            <div>
                                <div class="fw-bold fs-5">
                                    {{ $role === 'donatur' || !$role ? 'Sirkularitas' : 'Kualitas' }}
                                </div>

                                <div class="small" style="opacity: 0.75;">
                                    {{ $role === 'donatur' || !$role ? 'Kurangi limbah' : 'Barang terverifikasi' }}
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div style="margin-right: 1.5rem;">
                                <div class="glass-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px;">
                                    <i class="fas fa-users fs-5"></i>
                                </div>
                            </div>

                            <div>
                                <div class="fw-bold fs-5">Komunitas</div>
                                <div class="small" style="opacity: 0.75;">Dukung sesama</div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-5 pt-5 opacity-25">
                    <hr class="bg-white">
                </div>
            </div>

            <div class="col-lg-7 d-flex align-items-center justify-content-center right-panel">

                <div class="card border-0 shadow-sm p-3 login-card-container">

                    <div class="card-body p-4">

                        <div class="mb-4 text-center text-lg-start">
                            <h2 class="fw-bold text-dark mb-2">
                                Selamat Datang Kembali
                            </h2>

                            <p class="text-muted">
                                Masuk sebagai 
                                @if($role)
                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">
                                        {{ ucfirst($role) }}
                                    </span>
                                @else
                                    <span class="text-secondary small italic">Silahkan pilih peran</span>
                                @endif
                            </p>
                        </div>

                        <form wire:submit="login">

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary ms-3">
                                    Pilih Peran
                                </label>

                                <div class="input-group p-1 custom-rounded glass-input">
                                    <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                                        <i class="fas fa-user-tag"></i>
                                    </span>

                                    <select wire:model.live="role"
                                        class="form-select bg-transparent border-0 py-2 shadow-none">
                                        <option value="" selected>Pilih Peran</option>
                                        <option value="donatur">Donatur</option>
                                        <option value="penerima">Penerima</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold small text-secondary ms-3">
                                    Username / Email
                                </label>

                                <div class="input-group p-1 custom-rounded glass-input {{ $errors->has('email') ? 'border-danger' : '' }}">
                                    <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                                        <i class="fas fa-user"></i>
                                    </span>

                                    <input type="text"
                                        wire:model="email"
                                        class="form-control bg-transparent border-0 py-2 shadow-none"
                                        placeholder="Masukkan username">
                                </div>

                                @error('email')
                                    <span class="text-danger small ms-3 mt-1 d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold small text-secondary ms-3">
                                    Kata Sandi
                                </label>

                                <div class="input-group p-1 custom-rounded glass-input {{ $errors->has('password') ? 'is-invalid-shake' : '' }}"
                                    style="transition: all 0.3s;">

                                    <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                                        <i class="fas fa-lock"></i>
                                    </span>

                                    <input type="password"
                                        id="passwordInput"
                                        wire:model="password"
                                        class="form-control bg-transparent border-0 py-2 shadow-none"
                                        placeholder="••••••••">

                                    <span class="input-group-text bg-transparent border-0 text-muted pe-3"
                                        id="togglePassword"
                                        style="cursor: pointer;">
                                        <i class="fas fa-eye" id="eyeIcon"></i>
                                    </span>

                                </div>

                                @error('password')
                                    <span class="text-danger small ms-3 mt-1 d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        Kata sandi salah atau tidak sesuai.
                                    </span>
                                @enderror
                            </div>

                            <button type="submit"
                                class="btn glass-button text-white w-100 py-3 fw-bold mb-4"
                                style="border-radius: 50px;"
                                {{ !$role ? 'disabled' : '' }}>

                                Masuk {{ $role ? 'sebagai ' . ucfirst($role) : '' }}
                                <i class="fas fa-sign-in-alt ms-2"></i>
                            </button>

                            <div class="text-center mb-2">
                                <span class="text-muted small">
                                    Baru di Rebox?
                                </span>

                                <a href="/register"
                                    wire:navigate
                                    class="small fw-bold text-success text-decoration-none ms-1">
                                    Daftar Sekarang
                                </a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function initLoginPage() {
            const togglePassword = document.querySelector('#togglePassword');
            const passwordField = document.querySelector('#passwordInput');
            const eyeIcon = document.querySelector('#eyeIcon');

            if (togglePassword && passwordField && eyeIcon) {
                togglePassword.onclick = function () {
                    const type = passwordField.getAttribute('type') === 'password'
                        ? 'text'
                        : 'password';

                    passwordField.setAttribute('type', type);
                    eyeIcon.classList.toggle('fa-eye');
                    eyeIcon.classList.toggle('fa-eye-slash');
                };
            }

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

        document.addEventListener('DOMContentLoaded', initLoginPage);
        document.addEventListener('livewire:navigated', initLoginPage);
    </script>
</div>
=======
    <div class="left-content">
        <h1>ReBox Aplikasi</h1>
        <p>Berikan kehidupan kedua untuk barang Anda</p>

        <div class="button-group">
            <a href="/login" wire:navigate class="auth-tab auth-tab-login auth-switch-link">Masuk</a>
            <a href="/register" wire:navigate class="auth-tab auth-tab-register auth-switch-link">Daftar</a>
        </div>
    </div>

    <div class="login-card">
        @if (session()->has('message'))
            <div class="success-message">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        <div class="title-role">Pilih Jenis Akun</div>

        <div class="role-selection">
            <div class="role-option">
                <input type="radio" id="loginRoleDonatur" name="role" value="donatur" form="loginForm" wire:model.live="role" @checked($role === 'donatur' || old('role') === 'donatur')>
                <label for="loginRoleDonatur" class="role-btn {{ ($role === 'donatur' || old('role') === 'donatur') ? 'active' : '' }}">
                    Donatur
                </label>
            </div>

            <div class="role-option">
                <input type="radio" id="loginRolePenerima" name="role" value="penerima" form="loginForm" wire:model.live="role" @checked($role === 'penerima' || old('role') === 'penerima')>
                <label for="loginRolePenerima" class="role-btn {{ ($role === 'penerima' || old('role') === 'penerima') ? 'active' : '' }}">
                    Penerima
                </label>
            </div>
        </div>
        @error('role') <div class="field-error" style="margin-top: -14px; margin-bottom: 14px;">{{ $message }}</div> @enderror

        <div class="divider">
            <span>Masuk</span>
        </div>

        <form id="loginForm" method="POST" action="{{ route('login.store') }}" wire:submit.prevent="login">
            @csrf
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
                    <input type="password" id="loginPassword" name="password" wire:model.live="password" placeholder="Password">
                    <button type="button" class="toggle-password" data-target="loginPassword" aria-label="Tampilkan password">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>
                @error('password') <div class="field-error">Kata sandi wajib diisi.</div> @enderror
            </div>

            @if (session()->has('error'))
                <div class="login-error">{{ session('error') }}</div>
            @endif

            <button type="submit" class="signin-btn">Masuk</button>
        </form>

        <a href="{{ route('login.google') }}" class="google-login-btn">
            <span class="google-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" role="img" focusable="false">
                    <path fill="#4285F4" d="M23.49 12.27c0-.83-.07-1.44-.22-2.08H12v3.78h6.62c-.13.94-.85 2.36-2.45 3.31l-.02.13 3.56 2.33.25.02c2.28-1.79 3.53-4.43 3.53-7.49z"/>
                    <path fill="#34A853" d="M12 23c3.26 0 5.99-.91 7.99-2.48l-3.81-3.24c-1.02.6-2.39 1.02-4.18 1.02-3.2 0-5.92-1.79-6.89-4.27l-.13.01-3.7 2.42-.05.11C3.21 20.41 7.29 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.11 14.03A5.87 5.87 0 0 1 4.79 12c0-.71.12-1.39.31-2.03l-.01-.13-3.75-2.47-.12.05A10.3 10.3 0 0 0 0 12c0 1.65.43 3.2 1.22 4.58l3.89-2.55z"/>
                    <path fill="#EA4335" d="M12 5.7c2.27 0 3.8.83 4.67 1.53l3.41-2.83C17.98 2.75 15.26 1.8 12 1.8c-4.71 0-8.79 2.59-10.78 6.38l3.88 2.55C6.08 7.49 8.8 5.7 12 5.7z"/>
                </svg>
            </span>
            <span>Masuk dengan Google</span>
        </a>

        <a href="/register" wire:navigate class="auth-link auth-switch-link">Belum punya akun? Daftar</a>
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

</script>
>>>>>>> zunadeafiturv1
