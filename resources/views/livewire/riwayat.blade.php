<div class="container-fluid p-4">
    <!-- Row Statistik Atas -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 15px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="bg-light p-2 rounded mb-2" style="width: fit-content;">
                            <i class="fas fa-box text-success"></i>
                        </div>
                        <small class="text-muted font-weight-bold">TOTAL DONASI</small>
                        <h3 class="font-weight-bold mb-0">148 <span class="h6 text-muted">Item</span></h3>
                    </div>
                    <span class="badge badge-soft-success" style="background-color: #d4edda; color: #155724; border-radius: 10px;">+12 bln ini</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 15px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="bg-light p-2 rounded mb-2" style="width: fit-content;">
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <small class="text-muted font-weight-bold">POIN TERKUMPUL</small>
                        <h3 class="font-weight-bold mb-0">2.450 <span class="h6 text-muted">pts</span></h3>
                    </div>
                    <span class="badge badge-soft-warning" style="background-color: #fff3cd; color: #856404; border-radius: 10px;">Elite Member</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 15px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="bg-light p-2 rounded mb-2" style="width: fit-content;">
                            <i class="fas fa-leaf text-success"></i>
                        </div>
                        <small class="text-muted font-weight-bold">CO2 TERHEMAT</small>
                        <h3 class="font-weight-bold mb-0">42.5 <span class="h6 text-muted">kg</span></h3>
                    </div>
                    <span class="badge badge-soft-success" style="background-color: #d4edda; color: #155724; border-radius: 10px;">Hero Green</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Aktivitas -->
    <div class="card border-0 shadow-sm" style="border-radius: 20px;">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="font-weight-bold">Daftar Aktivitas <span class="ml-2 badge badge-light border text-muted" style="font-size: 12px;"><i class="fas fa-filter mr-1"></i> Filter: Semua Status</span></h5>
                <button class="btn btn-outline-secondary btn-sm font-weight-bold px-3" style="border-radius: 8px;">Unduh Rekap (PDF)</button>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <thead class="text-muted" style="font-size: 12px; border-bottom: 1px solid #eee;">
                        <tr>
                            <th>NAMA BARANG</th>
                            <th>TANGGAL</th>
                            <th>LOKASI REBOX</th>
                            <th>STATUS</th>
                            <th class="text-right">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $item)
                        <tr style="border-bottom: 1px solid #f8f9fa;">
                            <td class="py-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded mr-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                        <i class="fas fa-tshirt text-muted"></i>
                                    </div>
                                    <div>
                                        <div class="font-weight-bold">{{ $item->nama_barang }}</div>
                                        <small class="text-muted">Kategori: {{ $item->kategori }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3">
                                <small class="font-weight-bold text-dark">{{ $item->created_at->format('d Okt Y, H:i') }}</small>
                            </td>
                            <td class="py-3">
                                <small class="text-muted"><i class="fas fa-map-marker-alt text-success mr-1"></i> {{ $item->lokasi_hub ?? 'Rebox Bandung - Dago' }}</small>
                            </td>
                            <td class="py-3">
                                @if($item->status == 'Selesai')
                                    <span class="badge badge-success px-3 py-2" style="border-radius: 20px; font-size: 10px;">Selesai</span>
                                @else
                                    <span class="badge badge-warning px-3 py-2 text-white" style="border-radius: 20px; font-size: 10px; background-color: #ffc107;">Menunggu Verifikasi</span>
                                @endif
                            </td>
                            <td class="py-3 text-right">
                                <a href="#" class="btn btn-link text-success font-weight-bold p-0" style="font-size: 13px; text-decoration: none;">Unduh Sertifikat</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <small class="text-muted">Menampilkan {{ $activities->firstItem() }}-{{ $activities->lastItem() }} dari {{ $activities->total() }} aktivitas</small>
                {{ $activities->links() }}
            </div>
        </div>
    </div>

    <!-- Banner Bawah -->
    <div class="mt-4 p-5 text-white position-relative overflow-hidden" style="border-radius: 20px; background: linear-gradient(135deg, #006642 0%, #004d32 100%);">
        <div class="row align-items-center">
            <div class="col-md-7 position-relative" style="z-index: 2;">
                <h2 class="font-weight-bold mb-3">Terus Tebarkan Kebaikan!</h2>
                <p class="mb-4 opacity-75">Setiap barang yang Anda donasikan melalui Rebox memberikan dampak nyata bagi lingkungan dan mereka yang membutuhkan. Jadilah bagian dari gerakan ekonomi sirkular hari ini.</p>
                <div class="d-flex">
                    <button class="btn btn-light text-success font-weight-bold px-4 py-2 mr-3" style="border-radius: 10px;">Mulai Donasi Baru</button>
                    <button class="btn btn-outline-light font-weight-bold px-4 py-2" style="border-radius: 10px;">Pelajari Dampak Anda</button>
                </div>
            </div>
        </div>
        <!-- Dekorasi Pohon (Simulasi) -->
        <i class="fas fa-tree position-absolute" style="right: 50px; top: 20px; font-size: 150px; opacity: 0.1;"></i>
        <i class="fas fa-tree position-absolute" style="right: 120px; bottom: -20px; font-size: 200px; opacity: 0.1;"></i>
    </div>
</div>