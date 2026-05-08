<div class="container-fluid p-0 vh-100 overflow-hidden">
    <div class="row g-0 h-100">
        <!-- Bagian Kiri (Banner Dinamis) -->
        <div class="col-lg-5 d-none d-lg-flex flex-column justify-content-between p-5 text-white transition-all" 
             style="background-color: {{ $role === 'donatur' ? '#10854e' : '#2D5A27' }}; transition: 0.5s ease;">
            <div>
                <!-- Header Logo -->
                <div class="d-flex align-items-center mb-5">
                    <div class="bg-white rounded-4 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="fas fa-box-open text-success fs-4"></i>
                    </div>
                    <h2 class="fw-bold m-0" style="letter-spacing: -1px;">Rebox</h2>
                </div>
                
                <!-- Konten Berubah Berdasarkan Role -->
                @if($role === 'donatur')
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="fw-bold mb-4" style="font-size: 2.8rem; line-height: 1.1;">Berikan kehidupan kedua untuk barang Anda.</h1>
                        <p class="mb-5" style="opacity: 0.85; font-size: 1.15rem; font-weight: 300;">Donasikan barang bekas layak pakai melalui titik drop-off Rebox terdekat dan bantu sesama serta selamatkan lingkungan.</p>
                    </div>
                @else
                    <div class="animate__animated animate__fadeIn">
                        <h1 class="fw-bold mb-4" style="font-size: 2.8rem; line-height: 1.1;">Dapatkan bantuan barang yang Anda butuhkan.</h1>
                        <p class="mb-5" style="opacity: 0.85; font-size: 1.15rem; font-weight: 300;">Ajukan permintaan barang layak pakai secara transparan dan mudah melalui ekosistem Rebox.</p>
                    </div>
                @endif
                
                <!-- Fitur (Bisa disesuaikan per role jika perlu) -->
                <div class="row g-4 mb-5">
                    <div class="col-6 d-flex align-items-start">
                        <div class="bg-white bg-opacity-20 rounded-4 p-2 me-3">
                             <i class="fas {{ $role === 'donatur' ? 'fa-sync-alt' : 'fa-box-open' }}"></i>
                        </div>
                        <div>
                            <small class="fw-bold d-block">{{ $role === 'donatur' ? 'Sirkularitas' : 'Kualitas' }}</small>
                            <small style="font-size: 0.75rem; opacity: 0.7;">{{ $role === 'donatur' ? 'Kurangi limbah' : 'Barang terverifikasi' }}</small>
                        </div>
                    </div>
                    <div class="col-6 d-flex align-items-start">
                        <div class="bg-white bg-opacity-20 rounded-4 p-2 me-3">
                             <i class="fas fa-users"></i>
                        </div>
                        <div><small class="fw-bold d-block">Komunitas</small><small style="font-size: 0.75rem; opacity: 0.7;">Dukung sesama</small></div>
                    </div>
                </div>
            </div>

            <!-- Ilustrasi Dinamis -->
            <div class="mt-auto d-flex justify-content-center">
                <div class="bg-white bg-opacity-10 w-100 p-4 text-center border border-white border-opacity-10" style="border-radius: 25px;">
                    <i class="fas {{ $role === 'donatur' ? 'fa-heart' : 'fa-hand-holding-heart' }} fa-4x opacity-25 mb-2"></i>
                    <p class="small mb-0 opacity-50">{{ $role === 'donatur' ? 'Langkah Kecil, Dampak Besar' : 'Bantuan Tepat, Hidup Lebih Baik' }}</p>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan (Form Login) -->
        <div class="col-lg-7 d-flex align-items-center justify-content-center bg-white">
            <div style="width: 100%; max-width: 420px;" class="p-4">
                <div class="mb-5">
                    <h2 class="fw-bold text-dark mb-2">Selamat Datang Kembali</h2>
                    <p class="text-muted">Masuk sebagai <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3">{{ ucfirst($role) }}</span></p>
                </div>

                <form wire:submit="login">
                    <!-- Dropdown Peran (Trigger Utama) -->
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary ms-2">Pilih Peran</label>
                        <div class="input-group p-1 bg-light" style="border-radius: 15px; border: 1px solid #eee;">
                            <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-user-tag"></i></span>
                            <!-- wire:model.live sangat penting di sini -->
                            <select wire:model.live="role" class="form-select bg-transparent border-0 py-2">
                                <option value="donatur">Donatur</option>
                                <option value="penerima">Penerima</option>
                            </select>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-secondary ms-2">Username / Email</label>
                        <div class="input-group p-1 bg-light" style="border-radius: 15px; border: 1px solid #eee;">
                            <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-user"></i></span>
                            <input type="email" wire:model="email" class="form-control bg-transparent border-0 py-2" placeholder="Masukkan username">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between mb-1">
                            <label class="form-label fw-bold small text-secondary ms-2">Kata Sandi</label>
                            <a href="#" class="small text-success fw-bold text-decoration-none">Lupa Password?</a>
                        </div>
                        <div class="input-group p-1 bg-light" style="border-radius: 15px; border: 1px solid #eee;">
                            <span class="input-group-text bg-transparent border-0 text-muted ps-3"><i class="fas fa-lock"></i></span>
                            <input type="password" wire:model="password" class="form-control bg-transparent border-0 py-2" placeholder="••••••••">
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