<div class="container-fluid px-3 py-2">
    
    {{-- Notifikasi Sukses --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert" style="border-radius: 14px; background-color: #eefbf2; border-color: #d7f2df; color: #14532d;">
            <i class="fas fa-check-circle mr-2"></i> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="small text-muted mb-1" style="font-size:12px; font-weight:600;">
                Donatur Panel
                <i class="fas fa-chevron-right mx-1" style="font-size:8px;"></i>
<<<<<<< HEAD
                <span style="color:#00743f;">Manajemen Bantuan</span>
            </div>
            <h1 style="font-size:28px; font-weight:800; color:#17212b; margin:0;">Bantu Sesama</h1>
            <p class="text-muted mb-0" style="font-size:14px;">Lihat permintaan bantuan dan pantau riwayat barang yang telah Anda setujui.</p>
        </div>
        
=======
                <span style="color:#00743f;">Daftar Kebutuhan Barang</span>
            </div>
            <h1 style="font-size:28px; font-weight:800; color:#17212b; margin:0;">Bantu Sesama</h1>
            <p class="text-muted mb-0" style="font-size:14px;">Lihat daftar permintaan dari mereka yang membutuhkan bantuan logistik.</p>
        </div>
        
        {{-- Tombol "Buat Baru" dihapus karena Donatur hanya melihat & membantu --}}
>>>>>>> zunadeafiturv1
        <div class="badge badge-success px-3 py-2" style="border-radius: 12px; background: #eefbf2; color: #00743f; border: 1px solid #d7f2df;">
            <i class="fas fa-hand-holding-heart mr-2"></i> Mode Donatur
        </div>
    </div>

<<<<<<< HEAD
    {{-- SEKSI 1: DAFTAR PERMINTAAN (YANG BELUM DI-ACC) --}}
    <div class="mb-5">
        <div class="d-flex align-items-center mb-3">
            <h5 style="font-weight: 800; color: #17212b; margin: 0;">Permintaan Masuk</h5>
            <span class="ml-2 badge badge-pill badge-primary" style="font-size: 11px;">{{ $riwayat->whereNotIn('status', ['Disetujui', 'ACC'])->count() }} Permintaan</span>
        </div>
        
        <div class="card border-0 shadow-sm" style="border-radius:24px; background:#fff; overflow: hidden;">
            <div class="table-responsive">
                <table class="table table-hover mb-0" style="vertical-align: middle;">
                    <thead style="background: #f7f9fb;">
                        <tr>
                            <th class="border-0 px-4 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">PENERIMA & BARANG</th>
                            <th class="border-0 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">LOKASI HUB</th>
                            <th class="border-0 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">URGENSI</th>
                            <th class="border-0 px-4 py-3 text-center" style="font-size: 13px; color: #6b7280; font-weight: 800;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat->whereNotIn('status', ['Disetujui', 'ACC']) as $item)
                        <tr style="border-bottom: 1px solid #edf1f5;">
                            <td class="px-4 py-4">
                                <div class="d-flex align-items-center">
                                    <div class="mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #f0f4f8; border-radius: 12px;">
                                        <i class="fas fa-box text-muted"></i>
                                    </div>
                                    <div>
                                        <div style="font-weight: 800; color: #17212b; font-size: 14px;">{{ $item->nama_barang }}</div>
                                        <div class="small text-muted">Dari: {{ $item->user->name ?? 'Penerima' }} ({{ $item->jumlah }} pcs)</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 13px; font-weight: 600; color: #374151;">
                                    <i class="fas fa-map-marker-alt text-danger mr-1" style="font-size: 11px;"></i> {{ $item->lokasi_hub }}
                                </div>
                            </td>
                            <td>
                                <span class="badge" style="background: {{ $item->urgensi == 'Mendesak' ? '#fff1f2' : '#fef3c7' }}; color: {{ $item->urgensi == 'Mendesak' ? '#e11d48' : '#d97706' }}; font-weight: 800; font-size: 10px; padding: 5px 10px; border-radius: 6px;">
                                    {{ strtoupper($item->urgensi) }}
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <button wire:click="setujuiPermintaan({{ $item->id }})" 
                                        wire:loading.attr="disabled"
                                        class="btn text-white px-3 py-2" 
                                        style="border-radius: 10px; background: #00743f; border: none; font-weight: 700; font-size: 12px;">
                                    <span wire:loading.remove wire:target="setujuiPermintaan({{ $item->id }})">
                                        <i class="fas fa-check mr-1"></i> Bantu Sekarang
                                    </span>
                                    <span wire:loading wire:target="setujuiPermintaan({{ $item->id }})">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">Belum ada permintaan bantuan baru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- SEKSI 2: RIWAYAT BARANG YANG SUDAH DI-ACC --}}
    <div class="mb-4">
        <div class="d-flex align-items-center mb-3">
            <h5 style="font-weight: 800; color: #004934; margin: 0;"><i class="fas fa-history mr-2"></i> Riwayat Bantuan Anda</h5>
            <span class="ml-2 badge badge-pill badge-success" style="font-size: 11px;">{{ $riwayat->whereIn('status', ['Disetujui', 'ACC'])->count() }} Berhasil</span>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius:24px; background:#fcfdfc; border: 1px solid #eaf2eb !important;">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead style="background: #eefbf2;">
                        <tr>
                            <th class="border-0 px-4 py-3" style="font-size: 12px; color: #00743f; font-weight: 800;">WAKTU ACC</th>
                            <th class="border-0 py-3" style="font-size: 12px; color: #00743f; font-weight: 800;">BARANG & PENERIMA</th>
                            <th class="border-0 py-3" style="font-size: 12px; color: #00743f; font-weight: 800;">LOKASI PENGIRIMAN</th>
                            <th class="border-0 px-4 py-3 text-center" style="font-size: 12px; color: #00743f; font-weight: 800;">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($riwayat->whereIn('status', ['Disetujui', 'ACC']) as $acc)
                        <tr style="background: white;">
                            <td class="px-4 py-3 text-muted small">
                                <div>{{ $acc->updated_at->format('d M Y') }}</div>
                                <div style="font-size: 10px;">Pukul {{ $acc->updated_at->format('H:i') }}</div>
                            </td>
                            <td>
                                <div style="font-weight: 800; color: #17212b;">{{ $acc->nama_barang }}</div>
                                <div class="small text-muted">Untuk: {{ $acc->user->name ?? 'Penerima' }}</div>
                            </td>
                            <td>
                                <div class="small" style="font-weight: 600;">{{ $acc->lokasi_hub }}</div>
                            </td>
                            <td class="px-4 text-center">
                                <span class="badge px-3 py-2" style="border-radius: 8px; background: #eefbf2; color: #00743f; font-weight: 800; font-size: 10px;">
                                    <i class="fas fa-check-circle mr-1"></i> DI-ACC
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <p class="text-muted mb-0 small">Belum ada riwayat bantuan yang disetujui.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
=======
    {{-- TABLE CARD --}}
    <div class="card border-0 shadow-sm" style="border-radius:24px; background:#fff; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover mb-0" style="vertical-align: middle;">
                <thead style="background: #f7f9fb;">
                    <tr>
                        <th class="border-0 px-4 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">PENERIMA & BARANG</th>
                        <th class="border-0 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">KATEGORI</th>
                        <th class="border-0 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">LOKASI HUB</th>
                        <th class="border-0 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">URGENSI</th>
                        <th class="border-0 py-3" style="font-size: 13px; color: #6b7280; font-weight: 800;">TANGGAL</th>
                        <th class="border-0 px-4 py-3 text-center" style="font-size: 13px; color: #6b7280; font-weight: 800;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riwayat as $item)
                    <tr style="border-bottom: 1px solid #edf1f5;">
                        <td class="px-4 py-4">
                            <div class="d-flex align-items-center">
                                <div class="mr-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #eefbf2; border-radius: 12px;">
                                    <i class="fas fa-user-tag text-success"></i>
                                </div>
                                <div>
                                    <div style="font-weight: 800; color: #17212b; font-size: 14px;">{{ $item->user->name ?? 'Penerima ReBox' }}</div>
                                    <div class="small text-muted">{{ $item->nama_barang }} ({{ $item->jumlah }} pcs)</div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-light px-3 py-2" style="border-radius: 8px; color: #4b5563;">{{ $item->kategori }}</span></td>
                        <td>
                            <div style="font-size: 13px; font-weight: 600; color: #374151;">
                                <i class="fas fa-location-dot text-muted mr-1" style="font-size: 11px;"></i> {{ $item->lokasi_hub }}
                            </div>
                        </td>
                        <td>
                            @php
                                $color = match($item->urgensi) {
                                    'Mendesak' => '#ef4444',
                                    'Penting' => '#f59e0b',
                                    default => '#10b981'
                                };
                            @endphp
                            <div class="d-flex align-items-center" style="color: {{ $color }}; font-size: 12px; font-weight: 700;">
                                <i class="fas fa-circle mr-2" style="font-size: 8px;"></i> {{ $item->urgensi }}
                            </div>
                        </td>
                        <td style="font-size: 13px; color: #6b7280;">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="px-4 text-center">
                            {{-- Tombol ACC untuk Donatur --}}
                            <button wire:click="setujuiPermintaan({{ $item->id }})" 
                                    wire:loading.attr="disabled"
                                    class="btn text-white px-3 py-2" 
                                    style="border-radius: 10px; background: #00743f; border: none; font-weight: 700; font-size: 12px; transition: 0.3s;">
                                <span wire:loading.remove wire:target="setujuiPermintaan({{ $item->id }})">
                                    <i class="fas fa-check mr-1"></i> Bantu Sekarang
                                </span>
                                <span wire:loading wire:target="setujuiPermintaan({{ $item->id }})">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <img src="https://illustrations.popsy.co/gray/fogg-delivery-1.svg" style="width: 180px; opacity: 0.6;">
                            <p class="mt-3 text-muted" style="font-weight: 600;">Belum ada permintaan bantuan saat ini.</p>
                            <small class="text-muted">Semua kebutuhan telah terpenuhi! Terima kasih donatur.</small>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($riwayat->hasPages())
        <div class="px-4 py-3 border-top">
            {{ $riwayat->links() }}
        </div>
        @endif
>>>>>>> zunadeafiturv1
    </div>

    {{-- INFO FOOTER --}}
    <div class="mt-4 p-3 d-flex align-items-center" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 18px;">
        <i class="fas fa-info-circle text-primary mr-3" style="font-size: 20px;"></i>
        <div style="font-size: 13px; color: #475569;">
<<<<<<< HEAD
            <strong>Catatan:</strong> Riwayat di atas menampilkan barang-barang yang sudah Anda setujui untuk didonasikan melalui <strong>ReBox Hub</strong>.
=======
            <strong>Informasi:</strong> Klik tombol <strong>"Bantu Sekarang"</strong> jika Anda bersedia mengantarkan barang tersebut ke Lokasi Hub yang tertera. Status permintaan akan berubah dan penerima akan diberitahu.
>>>>>>> zunadeafiturv1
        </div>
    </div>
</div>