<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-4">
                <a href="/dashboard" wire:navigate class="btn btn-light rounded-circle me-3 shadow-sm">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h3 class="fw-bold mb-0">Donasi Barang Bekas</h3>
                    <p class="text-muted mb-0">Lokasi: <span class="text-success fw-bold">{{ $lokasiTerpilih->nama_lokasi ?? 'Lokasi Tidak Ditemukan' }}</span></p>
                </div>
            </div>

            <div class="card border-0 shadow-sm" style="border-radius: 25px;">
                <div class="card-body p-4">
                    <form wire:submit.prevent="simpanDonasi">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold">Foto Produk</label>
                            
                            <div class="upload-area d-flex flex-column align-items-center justify-content-center p-5 mb-2 shadow-sm" 
                                 style="border: 2px dashed #ddd; border-radius: 20px; background-color: #f9f9f9; position: relative; min-height: 200px; transition: 0.3s;">
                                
                                @if ($foto)
                                    <img src="{{ $foto->temporaryUrl() }}" class="img-fluid rounded shadow-sm" style="max-height: 180px; object-fit: cover;">
                                    <div class="mt-2 small text-success fw-bold"><i class="fas fa-check-circle"></i> File terpilih</div>
                                @else
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                    <p class="text-muted mb-1 fw-bold">Klik atau seret foto barang ke sini</p>
                                    <p class="text-muted small">Mendukung format JPG, PNG (Maks. 2MB)</p>
                                @endif

                                <input type="file" wire:model="foto" 
                                       class="position-absolute opacity-0 w-100 h-100" 
                                       style="top:0; left:0; cursor: pointer;" 
                                       id="uploadFoto">
                            </div>

                            <div wire:loading wire:target="foto" class="text-success small mt-1">
                                <i class="fas fa-spinner fa-spin"></i> Sedang memproses gambar...
                            </div>
                            
                            <button type="button" class="btn btn-outline-success btn-sm mt-2 px-3 rounded-pill" onclick="document.getElementById('uploadFoto').click()">
                                <i class="fas fa-plus me-1"></i> Pilih Foto Lainnya
                            </button>
                            
                            @error('foto') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <hr class="my-4 opacity-50">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk/Barang</label>
                            <input type="text" wire:model="nama_barang" 
                                   class="form-control bg-light border-0 py-3 px-4" 
                                   placeholder="Contoh: Jaket Denim, Buku Pelajaran, Sepatu Lari" 
                                   style="border-radius: 12px;">
                            @error('nama_barang') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Jumlah (Pcs/Kg)</label>
                                <input type="number" wire:model="jumlah" 
                                       class="form-control bg-light border-0 py-3 px-4" 
                                       placeholder="1"
                                       style="border-radius: 12px;">
                                @error('jumlah') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select wire:model="kategori" class="form-select bg-light border-0 py-3 px-4" style="border-radius: 12px;">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="pakaian">Pakaian</option>
                                    <option value="buku">Buku</option>
                                    <option value="elektronik">Elektronik</option>
                                    <option value="lainnya">Lain-lain</option>
                                </select>
                                @error('kategori') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted small">TITIK REBOX TERPILIH</label>
                            <div class="d-flex align-items-center bg-light p-3" style="border-radius: 12px;">
                                <i class="fas fa-map-marker-alt text-success me-3"></i>
                                <span class="fw-bold">{{ $lokasiTerpilih->nama_lokasi ?? 'Lokasi Belum Dipilih' }}</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Deskripsi & Kondisi</label>
                            <textarea wire:model="deskripsi" 
                                      class="form-control bg-light border-0 px-4" 
                                      rows="3" 
                                      placeholder="Jelaskan kondisi barang (misal: masih layak pakai, sedikit pudar, dll)" 
                                      style="border-radius: 12px;"></textarea>
                            @error('deskripsi') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="d-grid pt-2">
                            <button type="submit" class="btn btn-success py-3 fw-bold shadow-sm" 
                                    style="background-color: #10854e; border: none; border-radius: 15px; transition: 0.3s;">
                                Simpan Donasi <i class="fas fa-save ms-2"></i>
                            </button>
                            <a href="/dashboard" class="btn btn-link text-muted mt-2 fw-bold text-decoration-none small">Batal & Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .upload-area:hover {
        background-color: #f0fdf4 !important;
        border-color: #10854e !important;
    }
    input::placeholder {
        font-size: 0.9rem;
        opacity: 0.7;
    }
</style>