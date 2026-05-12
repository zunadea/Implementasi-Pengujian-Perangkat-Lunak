<div class="container-fluid p-0 vh-100 overflow-hidden">
    <div class="row g-0 h-100">
        <div class="col-lg-5 d-none d-lg-flex flex-column justify-content-between p-5 text-white" style="background-color: #10854e;">
            <div>
                <div class="d-flex align-items-center mb-5">
                    <i class="fas fa-box-open text-white fs-3" style="margin-right: 1.25rem;"></i>
                    <h2 class="fw-bold m-0" style="letter-spacing: -1px;">Rebox</h2>
                </div>
                
                <h1 class="fw-bold mb-4" style="font-size: 2.8rem; line-height: 1.1;">Bergabung dengan Rebox</h1>
                <p class="mb-5" style="opacity: 0.85; font-size: 1.15rem; font-weight: 300;">Buat akun sekarang untuk mulai berdonasi atau menerima bantuan barang layak pakai dengan mudah dan transparan.</p>
                
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex align-items-center p-4" style="border-radius: 20px; border: 1px solid rgba(255,255,255,0.2); background-color: transparent;">
                        <div class="rounded-circle bg-white bg-opacity-20 p-3 me-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; backdrop-filter: blur(4px);">
                            <i class="fas fa-shield-alt fs-3"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Keamanan Terjamin</h6>
                            <p class="small mb-0" style="opacity: 0.7; line-height: 1.4;">Data pribadi dan riwayat donasi Anda tersimpan aman.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center p-4" style="border-radius: 20px; border: 1px solid rgba(255,255,255,0.2); background-color: transparent;">
                        <div class="rounded-circle bg-white bg-opacity-20 p-3 me-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; backdrop-filter: blur(4px);">
                            <i class="fas fa-hand-holding-heart fs-3"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Komunitas Sosial</h6>
                            <p class="small mb-0" style="opacity: 0.7; line-height: 1.4;">Terhubung dengan ribuan donatur lainnya.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-auto opacity-50">
                <small>© 2026 Rebox Indonesia • Berbagi Kebaikan</small>
            </div>
        </div>

        <div class="col-lg-7 d-flex align-items-center justify-content-center bg-white overflow-auto py-5">
            <div style="width: 100%; max-width: 480px;" class="p-4">
                <div class="mb-4">
                    <h2 class="fw-bold text-dark mb-2">Daftar Akun</h2>
                    <p class="text-muted">Lengkapi data untuk mulai aksi sosialmu</p>
                </div>

                <form wire:submit="register">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Nama Lengkap</label>
                            <div class="input-group p-1 bg-light @error('name') border border-danger @enderror" style="border-radius: 15px; border: 1px solid #eee;">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-user-circle"></i></span>
                                <input type="text" wire:model="name" class="form-control bg-transparent border-0 py-2 shadow-none" placeholder="Nama lengkap Anda">
                            </div>
                            @error('name') <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Email Address</label>
                            <div class="input-group p-1 bg-light @error('email') border border-danger @enderror" style="border-radius: 15px; border: 1px solid #eee;">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-envelope"></i></span>
                                <input type="email" wire:model="email" class="form-control bg-transparent border-0 py-2 shadow-none" placeholder="nama@email.com">
                            </div>
                            @error('email') <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Daftar Sebagai</label>
                            <div class="input-group p-1 bg-light @error('role') border border-danger @enderror" style="border-radius: 15px; border: 1px solid #eee;">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-user-tag"></i></span>
                                <select class="form-select bg-transparent border-0 py-2 shadow-none" wire:model="role">
                                    <option value="">-- Pilih Peran --</option>
                                    <option value="donatur">Donatur</option>
                                    <option value="penerima">Penerima</option>
                                </select>
                            </div>
                            @error('role') <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Password</label>
                            <div class="input-group p-1 bg-light @error('password') border border-danger @enderror" style="border-radius: 15px; border: 1px solid #eee;">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-lock"></i></span>
                                <input type="password" wire:model="password" class="form-control bg-transparent border-0 py-2 shadow-none" placeholder="Min. 8 char">
                            </div>
                            @error('password') <span class="text-danger small ms-2 mt-1 d-block">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold small text-secondary ms-2">Konfirmasi</label>
                            <div class="input-group p-1 bg-light" style="border-radius: 15px; border: 1px solid #eee;">
                                <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-check-circle"></i></span>
                                <input type="password" wire:model="password_confirmation" class="form-control bg-transparent border-0 py-2 shadow-none" placeholder="Ulangi">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-3 fw-bold mt-3 mb-4 shadow-sm" 
                            style="background-color: #10854e; border: none; border-radius: 15px;">
                        Buat Akun Sekarang <i class="fas fa-arrow-right ms-2"></i>
                    </button>

                    <div class="text-center">
                        <span class="text-muted small">Sudah punya akun?</span>
                        <a href="/login" wire:navigate class="small fw-bold text-success text-decoration-none ms-1">Masuk di sini</a>
                    </div>
                </form>

                <div class="text-center mt-5">
                    <a href="/" wire:navigate class="text-muted small text-decoration-none py-2 px-3 bg-light rounded-pill">
                        <i class="fas fa-home me-1"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>