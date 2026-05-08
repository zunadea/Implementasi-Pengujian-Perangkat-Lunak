<div>
    <div class="row">
        <div class="col-md-8">
            @if(Auth::user()->role === 'donatur')
                <h2 class="font-weight-bold">Pilih Lokasi Rebox</h2>
                <p class="text-muted">Pilih titik pengumpulan Rebox yang paling nyaman bagi Anda.</p>

                <div class="card position-relative overflow-hidden mb-4" 
                     style="background: linear-gradient(45deg, #10854e, #1db954); border-radius: 25px; border: none;">
                    <div class="card-body p-5 text-white">
                        <span class="badge badge-light text-success px-3 py-2 mb-3">UPDATE KAPASITAS TERBARU</span>
                        <h1 class="display-5 font-weight-bold">Temukan Rebox terdekat untuk mulai berdonasi</h1>
                        <button class="btn btn-dark mt-3 px-4 py-2" style="border-radius: 12px;">Lihat Lokasi Box</button>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="font-weight-bold">Titik Drop-off Populer</h4>
                    <div>
                        <button class="btn btn-sm btn-white shadow-sm border-0 mr-1"><i class="fas fa-filter"></i></button>
                        <button class="btn btn-sm btn-white shadow-sm border-0"><i class="fas fa-th-large"></i></button>
                    </div>
                </div>

                <div class="row">
                    @php
                        $locations = [
                            [
                                'name' => 'Rebox Bandung - Dago',
                                'address' => 'Jl. Ir. H. Juanda No. 120, Bandung',
                                'img' => 'https://images.unsplash.com/photo-1605600611284-19561ad7ddf3?auto=format&fit=crop&q=80&w=500',
                                'filled' => 32,
                                'color' => 'bg-success'
                            ],
                            [
                                'name' => 'Rebox Pasteur Gateway',
                                'address' => 'Jl. Djunjunan No. 155, Cicendo',
                                'img' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=500',
                                'filled' => 88,
                                'color' => 'bg-danger'
                            ],
                            [
                                'name' => 'Rebox Antapani Terminal',
                                'address' => 'Jl. Terusan Jakarta, Antapani',
                                'img' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&q=80&w=500',
                                'filled' => 15,
                                'color' => 'bg-success'
                            ],
                            [
                                'name' => 'Rebox Buah Batu Square',
                                'address' => 'Jl. Terusan Buah Batu No. 5',
                                'img' => 'https://images.unsplash.com/photo-1591193516411-1db44111352e?auto=format&fit=crop&q=80&w=500',
                                'filled' => 60,
                                'color' => 'bg-warning'
                            ],
                            [
                                'name' => 'Rebox Cihampelas Walk',
                                'address' => 'Jl. Cihampelas No. 160, Cipaganti',
                                'img' => 'https://images.unsplash.com/photo-1473163928189-3f4b2c7e33e6?auto=format&fit=crop&q=80&w=500',
                                'filled' => 45,
                                'color' => 'bg-success'
                            ],
                            [
                                'name' => 'Rebox Gedebage Market',
                                'address' => 'Jl. Soekarno Hatta, Gedebage',
                                'img' => 'https://images.unsplash.com/photo-1574513348580-fe159e3d8199?auto=format&fit=crop&q=80&w=500',
                                'filled' => 95,
                                'color' => 'bg-danger'
                            ]
                        ];
                    @endphp

                    @foreach($locations as $loc)
<div class="col-md-6 mb-4">
    <div class="card h-100 shadow-sm border-0" style="border-radius: 25px;">
        <img src="{{ $loc['img'] }}" 
             class="card-img-top p-2" style="border-radius: 25px; height: 180px; object-fit: cover;">
        <div class="card-body">
            <h5 class="font-weight-bold mb-1 text-truncate">{{ $loc['name'] }}</h5>
            <p class="text-muted text-sm mb-2 text-truncate">
                <i class="fas fa-map-marker-alt text-success mr-1"></i> {{ $loc['address'] }}
            </p>

            <div class="d-flex justify-content-between mt-3">
                <small class="font-weight-bold text-muted">KAPASITAS</small>
                <small class="font-weight-bold {{ str_replace('bg-', 'text-', $loc['color']) }}">
                    {{ $loc['filled'] }}% TERISI
                </small>
            </div>
            <div class="progress mt-1" style="height: 8px; border-radius: 10px; background-color: #eee;">
                <div class="progress-bar {{ $loc['color'] }}" style="width: {{ $loc['filled'] }}%"></div>
            </div>

            <button class="btn btn-success btn-block mt-3 py-2" 
                    style="border-radius: 12px; background-color: #10854e; border: none;">
                Pilih Lokasi <i class="fas fa-arrow-right ml-2"></i>
            </button>
        </div>
    </div>
</div>
@endforeach
                </div>

            @else
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

        <div class="col-md-4">
            @if(Auth::user()->role === 'donatur')
                <div class="card p-4 border-0 shadow-sm" style="background-color: #10854e; color: white; border-radius: 25px;">
                    <p class="mb-0 text-sm opacity-75">DAMPAK LINGKUNGAN</p>
                    <h4 class="font-weight-bold mb-4">Kontribusi Anda</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-3 text-dark mb-3 shadow-sm text-center">
                                <i class="fas fa-leaf text-success mb-2"></i>
                                <h5 class="font-weight-bold mb-0">12.5 kg</h5>
                                <small class="text-muted text-xs">Plastik Terurai</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-white rounded-4 p-3 text-dark mb-3 shadow-sm text-center">
                                <i class="fas fa-tint text-info mb-2"></i>
                                <h5 class="font-weight-bold mb-0">45 L</h5>
                                <small class="text-muted text-xs">Air Terhemat</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3 border-0 shadow-sm" style="border-radius: 25px;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="font-weight-bold mb-0">Aktivitas Terkini</h6>
                            <a href="#" class="text-xs text-success font-weight-bold">Lihat Semua</a>
                        </div>
                        <div class="d-flex mb-3 align-items-center">
                            <div class="mr-3 bg-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="fas fa-check text-success"></i>
                            </div>
                            <div>
                                <p class="mb-0 text-sm font-weight-bold">Donasi Selesai</p>
                                <small class="text-muted">2.5kg Pakaian - Rebox Dago</small>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card border-0 shadow-sm p-4 text-center" style="border-radius: 25px; border: 2px dashed #ddd !important; background: transparent;">
                    <i class="fas fa-user-clock fa-2x text-muted mb-3"></i>
                    <h6 class="fw-bold text-muted">Belum Ada Aktivitas</h6>
                    <small class="text-muted">Riwayat bantuan Anda akan muncul di sini setelah fitur aktif.</small>
                </div>
            @endif
        </div>
    </div>
</div>