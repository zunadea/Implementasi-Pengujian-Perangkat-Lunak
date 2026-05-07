<div>
    <div class="row">
        <!-- AREA KONTEN UTAMA -->
        <div class="col-md-8">
            @if(Auth::user()->role === 'donatur')
                <!-- POV DONATUR: Tampilkan Fitur Lengkap -->
                <h2 class="font-weight-bold">Pilih Lokasi Rebox</h2>
                <p class="text-muted">Pilih titik pengumpulan Rebox yang paling nyaman bagi Anda.</p>

                <!-- Banner Donatur -->
                <div class="card position-relative overflow-hidden mb-4" 
                     style="background: linear-gradient(45deg, #10854e, #1db954); border-radius: 25px; border: none;">
                    <div class="card-body p-5 text-white">
                        <span class="badge badge-light text-success px-3 py-2 mb-3">UPDATE KAPASITAS TERBARU</span>
                        <h1 class="display-5 font-weight-bold">Temukan Rebox terdekat untuk mulai berdonasi</h1>
                        <button class="btn btn-dark mt-3 px-4 py-2" style="border-radius: 12px;">Lihat Lokasi Box</button>
                    </div>
                </div>

                <!-- Header List Donatur -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="font-weight-bold">Titik Drop-off Populer</h4>
                    <div>
                        <button class="btn btn-sm btn-white shadow-sm border-0"><i class="fas fa-filter"></i></button>
                        <button class="btn btn-sm btn-white shadow-sm border-0"><i class="fas fa-th-large"></i></button>
                    </div>
                </div>

                <div class="row">
                    <!-- Contoh Card Rebox untuk Donatur -->
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm border-0" style="border-radius: 25px;">
                            <img src="https://images.unsplash.com/photo-1605600611284-19561ad7ddf3?auto=format&fit=crop&q=80&w=500" 
                                 class="card-img-top p-2" style="border-radius: 25px; height: 180px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="font-weight-bold mb-1">Rebox Bandung - Dago</h5>
                                <p class="text-muted text-sm"><i class="fas fa-map-marker-alt"></i> Jl. Ir. H. Juanda No. 120, Bandung</p>
                                
                                <div class="d-flex justify-content-between mt-3">
                                    <small>KAPASITAS</small>
                                    <small class="text-success font-weight-bold">32% TERISI</small>
                                </div>
                                <div class="progress mt-1" style="height: 8px; border-radius: 10px;">
                                    <div class="progress-bar bg-success" style="width: 32%"></div>
                                </div>
                                <button class="btn btn-success btn-block mt-3" style="border-radius: 12px; background-color: #10854e;">Pilih Lokasi <i class="fas fa-arrow-right ml-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <!-- POV PENERIMA: Tampilan Kosong (Placeholder) -->
                <div class="card border-0 shadow-sm p-5 text-center d-flex flex-column align-items-center justify-content-center" 
                     style="border-radius: 25px; min-height: 400px; background-color: #f8f9fa;">
                    <div class="bg-white rounded-circle p-4 mb-4 shadow-sm">
                        <i class="fas fa-box-open fa-4x text-muted opacity-50"></i>
                    </div>
                    <h3 class="fw-bold text-dark">Halo, {{ Auth::user()->name }}!</h3>
                    <p class="text-muted px-md-5">Fitur pencarian barang dan katalog untuk <strong>Penerima</strong> sedang dalam tahap penyiapan. Pantau terus halaman ini untuk update selanjutnya!</p>
                    <button class="btn btn-outline-secondary rounded-pill px-4 mt-2" disabled>Katalog Belum Tersedia</button>
                </div>
            @endif
        </div>

        <!-- SIDEBAR KANAN -->
        <div class="col-md-4">
            @if(Auth::user()->role === 'donatur')
                <!-- Statistik Khusus Donatur -->
                <div class="card p-4 border-0 shadow-sm" style="background-color: #10854e; color: white; border-radius: 25px;">
                    <p class="mb-0 text-sm opacity-75">DAMPAK LINGKUNGAN</p>
                    <h4 class="font-weight-bold mb-4">Kontribusi Anda</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-3 text-dark mb-3 shadow-sm">
                                <i class="fas fa-leaf text-success mb-2"></i>
                                <h5 class="font-weight-bold mb-0">12.5 kg</h5>
                                <small class="text-muted">Plastik Terurai</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-3 text-dark mb-3 shadow-sm">
                                <i class="fas fa-tint text-info mb-2"></i>
                                <h5 class="font-weight-bold mb-0">45 L</h5>
                                <small class="text-muted">Air Terhemat</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas Terkini Donatur -->
                <div class="card mt-3 border-0 shadow-sm" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="font-weight-bold mb-0">Aktivitas Terkini</h6>
                            <a href="#" class="text-xs text-success">Lihat Semua</a>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="mr-3 bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-check text-success"></i>
                            </div>
                            <div>
                                <p class="mb-0 text-sm text-bold">Donasi Selesai</p>
                                <small class="text-muted">2.5kg Pakaian - Rebox Dago</small>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Sidebar Kosong untuk Penerima -->
                <div class="card border-0 shadow-sm p-4 text-center" style="border-radius: 25px; border: 2px dashed #ddd !important; background: transparent;">
                    <i class="fas fa-user-clock fa-2x text-muted mb-3"></i>
                    <h6 class="fw-bold text-muted">Belum Ada Aktivitas</h6>
                    <small class="text-muted">Riwayat bantuan Anda akan muncul di sini setelah fitur aktif.</small>
                </div>
            @endif
        </div>
    </div>
</div>