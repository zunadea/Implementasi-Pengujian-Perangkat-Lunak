<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex align-items-center mb-4">
                <a href="/dashboard" wire:navigate class="btn btn-light rounded-circle me-3">
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
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk/Barang</label>
                            <input type="text" wire:model="nama_barang" class="form-control bg-light border-0 py-2" placeholder="Contoh: Kaos, Buku Sekolah, Sepatu" style="border-radius: 12px;">
                            @error('nama_barang') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Jumlah (Pcs/Kg)</label>
                                <input type="number" wire:model="jumlah" class="form-control bg-light border-0 py-2" style="border-radius: 12px;">
                                @error('jumlah') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select wire:model="kategori" class="form-select bg-light border-0 py-2" style="border-radius: 12px;">
                                    <option value="">-- Pilih --</option>
                                    <option value="pakaian">Pakaian</option>
                                    <option value="buku">Buku</option>
                                    <option value="elektronik">Elektronik</option>
                                    <option value="lainnya">Lain-lain</option>
                                </select>
                                @error('kategori') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Foto Barang</label>
                            <input type="file" wire:model="foto" class="form-control bg-light border-0" id="uploadFoto" style="border-radius: 12px;">
                            <div wire:loading wire:target="foto" class="text-success small mt-1">
                                <i class="fas fa-spinner fa-spin"></i> Mengunggah gambar...
                            </div>
                            @if ($foto)
                                <div class="mt-2">
                                    <img src="{{ $foto->temporaryUrl() }}" class="img-thumbnail" style="height: 150px; border-radius: 15px;">
                                </div>
                            @endif
                            @error('foto') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Catatan Kondisi</label>
                            <textarea wire:model="deskripsi" class="form-control bg-light border-0" rows="3" placeholder="Jelaskan kondisi barang Anda secara singkat..." style="border-radius: 12px;"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold" 
                                style="background-color: #10854e; border: none; border-radius: 15px;">
                            Konfirmasi Donasi <i class="fas fa-check-circle ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>