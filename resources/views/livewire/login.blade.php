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
                radial-gradient(circle at center, rgba(124, 255, 124, 0.16), transparent 35%),
                linear-gradient(to right, #f2f2f2 0%, #eaf5e9 50%, #f2f2f2 100%);
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
                radial-gradient(circle at center, rgba(124, 255, 124, 0.16), transparent 35%),
                linear-gradient(to right, #f2f2f2 0%, #eaf5e9 50%, #f2f2f2 100%);
            perspective: 1200px;
        }

        .rebox-auth-page::before,
        .rebox-auth-page::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(24px);
            z-index: 0;
        }

        .rebox-auth-page::before {
            width: 230px;
            height: 230px;
            left: 12%;
            top: 18%;
            background: rgba(0, 148, 0, 0.12);
        }

        .rebox-auth-page::after {
            width: 320px;
            height: 320px;
            right: 11%;
            bottom: 11%;
            background: rgba(61, 159, 61, 0.14);
        }

        .bg-accent {
            position: absolute;
            width: 170px;
            height: 170px;
            left: 48%;
            bottom: 18%;
            border-radius: 50%;
            background: rgba(0, 148, 0, 0.09);
            filter: blur(22px);
            pointer-events: none;
            z-index: 0;
            animation: authAccentFloat 7s ease-in-out infinite;
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
            transform-origin: center right;
            transform-style: preserve-3d;
            animation: authCardFlipIn 0.72s cubic-bezier(0.19, 1, 0.22, 1) both;
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease, background 0.28s ease;
            will-change: transform;
        }

        .login-card:hover {
            transform: translateY(-8px) rotateX(1.2deg) rotateY(-1.8deg);
            border-color: rgba(0, 148, 0, 0.70);
            background: rgba(217, 240, 213, 0.94);
            box-shadow:
                0 28px 56px rgba(0, 0, 0, 0.11),
                0 0 62px rgba(0, 148, 0, 0.16);
        }

        .rebox-auth-page.is-flipping .login-card {
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
            color: #4285f4;
            font-size: 16px;
            font-weight: 900;
            box-shadow: inset 0 0 0 1px rgba(17, 17, 17, 0.08);
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
            }
        }
    </style>

    <div class="left-content">
        <h1>Rebox Application</h1>
        <p>Berikan kehidupan kedua untuk barang Anda</p>

        <div class="button-group">
            <a href="/login" wire:navigate class="auth-tab auth-tab-login auth-switch-link">Login</a>
            <a href="/register" wire:navigate class="auth-tab auth-tab-register auth-switch-link">Register</a>
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
            <span>Login</span>
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

            <button type="submit" class="signin-btn">Sign In</button>
        </form>

        <a href="{{ route('login.google') }}" class="google-login-btn">
            <span class="google-mark">G</span>
            <span>Login dengan Google</span>
        </a>

        <a href="/register" wire:navigate class="auth-link auth-switch-link">Belum punya akun? Register</a>
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
