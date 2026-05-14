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
            }
        }
    </style>

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