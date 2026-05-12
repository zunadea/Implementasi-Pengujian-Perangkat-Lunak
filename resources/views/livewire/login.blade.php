<div class="container-fluid p-0 vh-100 overflow-hidden">
    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
        }

        html,
        body {
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

        /* WRAPPER */
        .main-wrapper {
            height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(16,133,78,0.15), transparent 30%),
                radial-gradient(circle at bottom right, rgba(16,133,78,0.12), transparent 30%),
                #eef2f5;
        }

        /* LEFT PANEL */
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

        /* RIGHT PANEL */
        .right-panel {
            overflow: hidden;
            background: rgba(255,255,255,0.25);
            backdrop-filter: blur(20px);
            position: relative;
        }

        /* LOGIN CARD */
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

        /* INPUT GLASS */
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

        /* BUTTON GLASS */
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

        /* ICON BOX KIRI */
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
        }
    </style>

    <div class="main-wrapper">
        <div class="row g-0 h-100">

            <!-- LEFT SIDE -->
            <div class="col-lg-5 d-none d-lg-flex flex-column p-5 text-white transition-all left-panel"
                style="background: linear-gradient(180deg, {{ $role === 'donatur' ? '#10854e' : '#2D5A27' }} 0%, #0c6a3d 100%); transition: 0.5s ease;">

                <div class="d-flex align-items-center mb-5">
                    <i class="fas fa-box-open text-white fs-3" style="margin-right: 1.25rem;"></i>
                    <h2 class="fw-bold m-0" style="letter-spacing: -1px;">Rebox</h2>
                </div>

                <div class="pe-lg-5 my-auto">

                    @if($role === 'donatur')
                        <div class="animate__animated animate__fadeIn">
                            <h1 class="fw-bold mb-4"
                                style="font-size: 3rem; line-height: 1.2;">
                                Berikan kehidupan kedua untuk barang Anda.
                            </h1>

                            <p class="mb-5 lh-lg"
                                style="opacity: 0.9; font-size: 1.1rem; font-weight: 300;">
                                Donasikan barang bekas layak pakai melalui titik drop-off Rebox terdekat.
                                Setiap barang yang Anda beri membantu sesama dan menjaga bumi kita tetap hijau.
                            </p>
                        </div>
                    @else
                        <div class="animate__animated animate__fadeIn">
                            <h1 class="fw-bold mb-4"
                                style="font-size: 3rem; line-height: 1.2;">
                                Dapatkan bantuan barang yang Anda butuhkan.
                            </h1>

                            <p class="mb-5 lh-lg"
                                style="opacity: 0.9; font-size: 1.1rem; font-weight: 300;">
                                Ajukan permintaan barang layak pakai secara transparan dan mudah melalui ekosistem Rebox.
                            </p>
                        </div>
                    @endif

                    <div class="d-flex flex-column mt-5">

                        <div class="d-flex align-items-center mb-4">

                            <div style="margin-right: 1.5rem;">
                                <div class="glass-icon rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 60px; height: 60px;">
                                    <i class="fas {{ $role === 'donatur' ? 'fa-sync-alt' : 'fa-box-open' }} fs-5"></i>
                                </div>
                            </div>

                            <div>
                                <div class="fw-bold fs-5">
                                    {{ $role === 'donatur' ? 'Sirkularitas' : 'Kualitas' }}
                                </div>

                                <div class="small" style="opacity: 0.75;">
                                    {{ $role === 'donatur' ? 'Kurangi limbah' : 'Barang terverifikasi' }}
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

            <!-- RIGHT SIDE -->
            <div class="col-lg-7 d-flex align-items-center justify-content-center right-panel">

                <div class="card border-0 shadow-sm p-3 login-card-container">

                    <div class="card-body p-4">

                        <div class="mb-4 text-center text-lg-start">
                            <h2 class="fw-bold text-dark mb-2">
                                Selamat Datang Kembali
                            </h2>

                            <p class="text-muted">
                                Masuk sebagai
                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">
                                    {{ ucfirst($role) }}
                                </span>
                            </p>
                        </div>

                        <form wire:submit="login">

                            <!-- ROLE -->
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
                                        <option value="donatur">Donatur</option>
                                        <option value="penerima">Penerima</option>
                                    </select>
                                </div>
                            </div>

                            <!-- EMAIL -->
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

                            <!-- PASSWORD -->
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

                            <!-- BUTTON -->
                            <button type="submit"
                                class="btn glass-button text-white w-100 py-3 fw-bold mb-4"
                                style="border-radius: 50px;">

                                Masuk sebagai {{ ucfirst($role) }}
                                <i class="fas fa-sign-in-alt ms-2"></i>

                            </button>

                            <!-- REGISTER -->
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
</div>

<script>
    document.addEventListener('livewire:navigated', () => {

        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#passwordInput');
        const eyeIcon = document.querySelector('#eyeIcon');

        if (togglePassword) {
            togglePassword.addEventListener('click', function () {

                const type = passwordField.getAttribute('type') === 'password'
                    ? 'text'
                    : 'password';

                passwordField.setAttribute('type', type);

                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        }
    });
</script>