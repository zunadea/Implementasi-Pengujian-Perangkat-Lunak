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
    <div class="mb-4">
        <div class="small text-muted mb-1" style="font-size:12px; font-weight:600;">
            Requests
            <i class="fas fa-chevron-right mx-1" style="font-size:8px;"></i>
            <span style="color:#00743f;">Permintaan Barang</span>
        </div>
        <h1 style="font-size:28px; font-weight:800; color:#17212b; margin-bottom:6px; line-height:1.2;">
            Form Permintaan Barang
        </h1>
        <p class="text-muted mb-0" style="font-size:14px;">
            Lengkapi detail kebutuhan Anda untuk mendapatkan dukungan logistik dari ReBox.
        </p>
    </div>

    {{-- MAIN CARD --}}
    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius:24px; background:#fff;">
        <div class="card-body p-4">
            
            {{-- Bagian Atas: Judul & Search --}}
            <div class="row align-items-center mb-4">
                <div class="col-lg-6">
                    <h4 style="font-size:22px; font-weight:800; color:#17212b; margin:0;">
                        Pilih Lokasi Drop-off 
                        @if($lokasi_hub) 
                            <span class="badge badge-success ml-2" style="font-size: 11px; border-radius: 8px; background-color: #00743f; padding: 5px 10px;">
                                <i class="fas fa-check mr-1"></i> {{ $lokasi_hub }}
                            </span> 
                        @endif
                    </h4>
                </div>
                {{-- SEARCH LOKASI (Autocomplete Manual) --}}
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <div class="position-relative">
                        <i class="fas fa-search position-absolute" style="left: 18px; top: 50%; transform: translateY(-50%); color: #94a3b8; z-index: 10;"></i>
                        <input type="text" 
                               wire:model.live="search_lokasi"
                               placeholder="Ketik nama kecamatan di Bandung..." 
                               class="form-control" 
                               style="height:48px; border-radius:14px; background:#f7f9fb; border:1px solid #e4e9ef; padding-left:45px; font-size:14px;">
                        
                        {{-- Dropdown Hasil Pencarian --}}
                        @if(count($results) > 0)
                            <div class="position-absolute w-100 shadow-lg mt-1" style="z-index: 1000; border-radius: 12px; background: white; border: 1px solid #e4e9ef; max-height: 250px; overflow-y: auto;">
                                @foreach($results as $res)
                                    <div wire:click="selectLokasi('{{ $res }}')" 
                                         class="px-3 py-2 border-bottom result-item" 
                                         style="cursor: pointer; font-size: 14px; transition: 0.2s;">
                                        <i class="fas fa-location-dot text-success mr-2"></i> {{ $res }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- CARD LOKASI (Rekomendasi Hub) --}}
            <div class="row mb-3">
                @php
                    $hubs = [
                        ['name' => 'Rebox Sudirman Central', 'dist' => '0.8 km', 'addr' => 'Jl. Jend. Sudirman No. 52, Jakarta Selatan', 'img' => 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200'],
                        ['name' => 'Grand Indonesia Hub', 'dist' => '1.2 km', 'addr' => 'Lantai LG Barat, Menteng, Jakarta Pusat', 'img' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1200'],
                        ['name' => 'SCBD Office Park', 'dist' => '2.5 km', 'addr' => 'Gedung Artha Graha Lobby, Jakarta', 'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200']
                    ];
                @endphp

                @foreach($hubs as $hub)
                <div class="col-lg-4 mb-3">
                    <div wire:click="setLokasi('{{ $hub['name'] }}')" 
                         class="border overflow-hidden h-100 position-relative" 
                         style="border-radius:18px; border: {{ $lokasi_hub == $hub['name'] ? '2px solid #00743f' : '1px solid #e7edf2' }}; cursor: pointer; transition: 0.3s; background: {{ $lokasi_hub == $hub['name'] ? '#f0f9f4' : '#fff' }};">
                        
                        <div class="position-relative">
                            <img src="{{ $hub['img'] }}" style="height:145px; width:100%; object-fit:cover;">
                            <div class="position-absolute" style="top:12px; left:12px;">
                                <div class="bg-white px-2 py-1 d-flex align-items-center" style="border-radius:999px; font-size:11px; font-weight:700; box-shadow:0 4px 10px rgba(0,0,0,.08);">
                                    <i class="fas fa-location-dot text-success mr-1"></i> {{ $hub['dist'] }}
                                </div>
                            </div>
                            <button type="button" class="btn rounded-circle text-white position-absolute" style="right:14px; bottom:14px; width:44px; height:44px; background: {{ $lokasi_hub == $hub['name'] ? '#ffc107' : '#00743f' }}; border:none; transition: 0.3s;">
                                <i class="fas {{ $lokasi_hub == $hub['name'] ? 'fa-check' : 'fa-plus' }}"></i>
                            </button>
                        </div>

                        <div class="p-3">
                            <h5 style="font-size:17px; font-weight:800; color:#17212b; margin-bottom:4px;">{{ $hub['name'] }}</h5>
                            <p class="text-muted mb-0" style="font-size:12px; line-height:1.4;">{{ $hub['addr'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @error('lokasi_hub') <div class="mb-3"><small class="text-danger font-weight-bold"><i class="fas fa-exclamation-circle mr-1"></i> Silakan pilih salah satu lokasi hub di atas atau cari melalui kolom pencarian.</small></div> @enderror

            <hr class="my-4" style="border-top: 1px dashed #e4e9ef;">

            {{-- FORM --}}
            <form wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-lg-6 mb-3">
                        <label class="mb-2" style="font-size:14px; font-weight:800; color:#374151;">
                            <i class="far fa-clipboard text-success mr-2"></i> Nama Barang
                        </label>
                        <input type="text" wire:model="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Contoh: Pakaian, Beras, dll" style="height:54px; border-radius:16px; background:#f7f9fb; border:1px solid #e4e9ef; font-size:14px; padding:0 18px;">
                        @error('nama_barang') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="mb-2" style="font-size:14px; font-weight:800; color:#374151;">
                            <i class="fas fa-shapes text-success mr-2"></i> Kategori Barang
                        </label>
                        <select wire:model="kategori" class="form-control @error('kategori') is-invalid @enderror" style="height:54px; border-radius:16px; background:#f7f9fb; border:1px solid #e4e9ef; font-size:14px; padding:0 18px;">
                            <option value="">Pilih kategori...</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Edukasi">Edukasi</option>
                            <option value="Kebutuhan Pokok">Kebutuhan Pokok</option>
                        </select>
                        @error('kategori') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="mb-2" style="font-size:14px; font-weight:800; color:#374151;">
                            <i class="fas fa-list-ol text-success mr-2"></i> Jumlah
                        </label>
                        <div class="position-relative">
                            <input type="number" wire:model="jumlah" class="form-control @error('jumlah') is-invalid @enderror" placeholder="0" style="height:54px; border-radius:16px; background:#f7f9fb; border:1px solid #e4e9ef; font-size:14px; padding:0 18px;">
                            <div class="position-absolute" style="right:12px; top:50%; transform:translateY(-50%);">
                                <div class="px-2 py-1" style="border-radius:8px; background:#fff; border:1px solid #e4e9ef; font-size:11px; font-weight:700; color:#94a3b8;">pcs</div>
                            </div>
                        </div>
                        @error('jumlah') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-lg-6 mb-3">
                        <label class="mb-2" style="font-size:14px; font-weight:800; color:#374151;">
                            <i class="fas fa-triangle-exclamation text-success mr-2"></i> Urgensi
                        </label>
                        <select wire:model="urgensi" class="form-control" style="height:54px; border-radius:16px; background:#f7f9fb; border:1px solid #e4e9ef; font-size:14px; padding:0 18px;">
                            <option value="Normal">Normal</option>
                            <option value="Penting">Penting</option>
                            <option value="Mendesak">Mendesak</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="mb-2" style="font-size:14px; font-weight:800; color:#374151;">
                            <i class="far fa-file-lines text-success mr-2"></i> Deskripsi Kebutuhan
                        </label>
                        <textarea wire:model="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Jelaskan detail barang yang Anda butuhkan..." style="border-radius:18px; background:#f7f9fb; border:1px solid #e4e9ef; font-size:14px; padding:18px;"></textarea>
                        @error('deskripsi') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="d-flex justify-content-end align-items-center mt-2" style="gap: 12px;">
                    <a href="{{ route('riwayat') }}" wire:navigate class="btn btn-light px-4 d-flex align-items-center justify-content-center" style="height:50px; border-radius:16px; border:1px solid #dfe5eb; font-weight:700; font-size:14px; color:#4b5563; min-width: 120px;">
                        Batal
                    </a>
                    <button type="submit" wire:loading.attr="disabled" class="btn text-white px-5" style="height:50px; border-radius:16px; background:#00743f; border:none; font-weight:800; font-size:14px; box-shadow:0 6px 14px rgba(0,116,63,.16);">
                        <span wire:loading.remove><i class="fas fa-paper-plane mr-2"></i> Kirim Permintaan</span>
                        <span wire:loading><i class="fas fa-spinner fa-spin mr-2"></i> Memproses...</span>
                    </button>
                </div>
            </form>
        </div>

        {{-- INFO PANEL --}}
        <div class="px-4 py-3" style="background:#fafcfd; border-top:1px solid #edf1f5;">
            <div class="d-flex align-items-start">
                <i class="fas fa-circle-info text-success mt-1 mr-3" style="font-size:18px;"></i>
                <div>
                    <h5 style="font-size:14px; font-weight:800; color:#374151; margin-bottom:2px;">Informasi Pengiriman</h5>
                    <p class="text-muted mb-0" style="font-size:12px; line-height:1.6;">
                        Dengan mengklik "Kirim Permintaan", Anda setuju untuk mengambil barang ke lokasi hub yang dipilih setelah disetujui.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTTOM TRACKING --}}
    <div class="mt-4 p-3 d-flex justify-content-between align-items-center flex-wrap" style="background:#eefbf2; border:1px solid #d7f2df; border-radius:18px;">
        <div class="d-flex align-items-center">
            <div class="mr-3 d-flex align-items-center justify-content-center" style="width:40px; height:40px; border-radius:12px; background:#d5f4de;">
                <i class="fas fa-history text-success" style="font-size:14px;"></i>
            </div>
            <div>
                <h5 class="mb-0" style="font-size:14px; font-weight:800; color:#14532d;">Lihat riwayat permintaan Anda?</h5>
                <p class="mb-0" style="color:#198754; font-size:11px;">Pantau status barang secara real-time di panel penerima.</p>
            </div>
        </div>
        <a href="{{ route('riwayat') }}" wire:navigate class="font-weight-bold mt-2 mt-lg-0" style="font-size:13px; color:#00743f; text-decoration:none;">
            Buka Aktivitas Saya <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>

    <style>
        .result-item:hover {
            background-color: #f0f9f4 !important;
            color: #00743f !important;
        }
        /* Custom scrollbar untuk dropdown */
        .position-absolute::-webkit-scrollbar {
            width: 6px;
        }
        .position-absolute::-webkit-scrollbar-thumb {
            background: #e4e9ef;
            border-radius: 10px;
        }
    </style>
</div>