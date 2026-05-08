<div class="container-fluid p-0 vh-100 overflow-hidden">
    <div class="row g-0 h-100">
        <div class="col-lg-5 d-none d-lg-flex flex-column p-5 text-white transition-all" 
             style="background-color: {{ $role === 'donatur' ? '#10854e' : '#2D5A27' }}; transition: 0.5s ease;">
            
            <div class="d-flex align-items-center mb-5">
                <div class="bg-white rounded-circle p-2 me-3 d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px;">
                    <i class="fas fa-box-open text-success fs-5"></i>
                </div>
                <h2 class="fw-bold m-0" style="letter-spacing: -1px;">Rebox</h2>
            </div>
            
            <div class="pe-lg-5 my-auto">
                @if($role === 'donatur')
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="fw-bold mb-4" style="font-size: 3rem; line-height: 1.2;">Berikan kehidupan kedua untuk barang Anda.</h1>
                        <p class="mb-5 lh-lg" style="opacity: 0.8; font-size: 1.1rem; font-weight: 300;">
                            Donasikan barang bekas layak pakai melalui titik drop-off Rebox terdekat. 
                            Setiap barang yang Anda beri membantu sesama dan menjaga bumi kita tetap hijau.
                        </p>
                    </div>
                @else
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="fw-bold mb-4" style="font-size: 3rem; line-height: 1.2;">Dapatkan bantuan barang yang Anda butuhkan.</h1>
                        <p class="mb-5 lh-lg" style="opacity: 0.8; font-size: 1.1rem; font-weight: 300;">
                            Ajukan permintaan barang layak pakai secara transparan dan mudah melalui ekosistem Rebox.
                        </p>
                    </div>
                @endif

                <div class="d-flex gap-5 mt-2">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; backdrop-filter: blur(4px);">
                                 <i class="fas {{ $role === 'donatur' ? 'fa-sync-alt' : 'fa-box-open' }} fs-5"></i>
                            </div>
                        </div>
                        <div>
                            <div class="fw-bold">{{ $role === 'donatur' ? 'Sirkularitas' : 'Kualitas' }}</div>
                            <div class="small" style="opacity: 0.7;">{{ $role === 'donatur' ? 'Kurangi limbah' : 'Barang terverifikasi' }}</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="bg-white bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; backdrop-filter: blur(4px);">
                                 <i class="fas fa-users fs-5"></i>
                            </div>
                        </div>
                        <div>
                            <div class="fw-bold">Komunitas</div>
                            <div class="small" style="opacity: 0.7;">Dukung sesama</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-5 opacity-25">
                <hr class="bg-white">
            </div>
        </div>

        <div class="col-lg-7 d-flex align-items-center justify-content-center bg-light">
            <div class="card border-0 shadow-sm p-3" style="width: 100%; max-width: 460px; border-radius: 30px;">
                <div class="card-body p-4">
                    <div class="mb-5 text-center text-lg-start">
                        <h2 class="fw-bold text-dark mb-2">Selamat Datang Kembali</h2>
                        <p class="text-muted">Masuk sebagai <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">{{ ucfirst($role) }}</span></p>
                    </div>

                    <form wire:submit="login">
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Pilih Peran</label>
                            <div class="input-group p-1 bg-light border rounded-4">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-user-tag"></i></span>
                                <select wire:model.live="role" class="form-select bg-transparent border-0 py-2 shadow-none">
                                    <option value="donatur">Donatur</option>
                                    <option value="penerima">Penerima</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Username / Email</label>
                            <div class="input-group p-1 bg-light border rounded-4">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-user"></i></span>
                                <input type="email" wire:model="email" class="form-control bg-transparent border-0 py-2 shadow-none" placeholder="Masukkan username">
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <label class="form-label fw-bold small text-secondary ms-2">Kata Sandi</label>
                                <a href="#" class="small text-success fw-bold text-decoration-none">Lupa Password?</a>
                            </div>
                            <div class="input-group p-1 bg-light border rounded-4">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-lock"></i></span>
                                <input type="password" wire:model="password" class="form-control bg-transparent border-0 py-2 shadow-none" placeholder="••••••••">
                                <span class="input-group-text bg-transparent border-0 text-muted pe-3"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold shadow-sm mb-4" 
                                style="background-color: #10854e; border: none; border-radius: 15px;">
                            Masuk sebagai {{ ucfirst($role) }} <i class="fas fa-sign-in-alt ms-2"></i>
                        </button>

                        <div class="text-center">
                            <span class="text-muted small">Baru di Rebox?</span>
                            <a href="/register" wire:navigate class="small fw-bold text-success text-decoration-none ms-1">Daftar Sekarang</a>
                        </div>
                    </form>

                    <div class="d-flex justify-content-center gap-4 mt-5 pt-4 small text-muted border-top border-light">
                        <a href="#" class="text-decoration-none text-muted">Bantuan</a>
                        <a href="#" class="text-decoration-none text-muted">Privasi</a>
                        <a href="#" class="text-decoration-none text-muted">Ketentuan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>