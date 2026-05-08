<div class="container-fluid">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px;">
            <i class="fas fa-check-circle mr-2"></i> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <!-- Area Form Utama -->
        <div class="col-lg-8">
            <h2 class="font-weight-bold">Buat Permintaan Barang</h2>
            <p class="text-muted">Lengkapi detail kebutuhan Anda agar para donatur dapat membantu dengan tepat.</p>

            <div class="card shadow-sm mt-4" style="border-radius: 20px; border: none;">
                <div class="card-body p-4">
                    <form wire:submit.prevent="submit">
                        <!-- Nama Barang -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Nama Barang</label>
                            <input type="text" wire:model="nama_barang" class="form-control" 
                                placeholder="Contoh: Alat Tulis Kantor, Pakaian Anak"
                                style="border-radius: 12px; background-color: #f8fafb; border: 1px solid #e9ecef; padding: 25px 15px;">
                            @error('nama_barang') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <!-- Kategori -->
                            <div class="col-md-6 mb-4">
                                <label class="font-weight-bold">Kategori</label>
                                <select wire:model="kategori" class="form-control" 
                                    style="border-radius: 12px; background-color: #f8fafb; height: 50px; border: 1px solid #e9ecef;">
                                    <option value="">Pilih Kategori</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Edukasi">Edukasi</option>
                                    <option value="Pokok">Kebutuhan Pokok</option>
                                </select>
                                @error('kategori') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <!-- Jumlah -->
                            <div class="col-md-6 mb-4">
                                <label class="font-weight-bold">Jumlah (pcs)</label>
                                <input type="number" wire:model="jumlah" class="form-control" 
                                    placeholder="0"
                                    style="border-radius: 12px; background-color: #f8fafb; height: 50px; border: 1px solid #e9ecef;">
                                @error('jumlah') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Deskripsi Kebutuhan</label>
                            <textarea wire:model="deskripsi" class="form-control" rows="4" 
                                placeholder="Jelaskan secara rinci barang yang dibutuhkan dan tujuannya..."
                                style="border-radius: 12px; background-color: #f8fafb; border: 1px solid #e9ecef;"></textarea>
                            @error('deskripsi') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Lokasi Hub -->
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Lokasi Drop-off Rebox Pilihan</label>
                            <select wire:model="lokasi_hub" class="form-control" 
                                style="border-radius: 12px; background-color: #f8fafb; height: 50px; border: 1px solid #e9ecef;">
                                <option value="">Pilih Hub Terdekat</option>
                                <option value="Dago">Rebox Dago, Bandung</option>
                                <option value="SCBD">Rebox SCBD, Jakarta</option>
                            </select>
                            @error('lokasi_hub') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end align-items-center mt-5">
                            <button type="button" class="btn btn-link text-muted mr-4 font-weight-bold" style="text-decoration: none;">Batal</button>
                            <button type="submit" class="btn btn-success px-5 py-3 font-weight-bold" 
                                style="border-radius: 12px; background-color: #006642; border: none; min-width: 200px;">
                                Kirim Permintaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Panel Samping (Tips & Bantuan) -->
        <div class="col-lg-4">
            <!-- Tips Menulis -->
            <div class="card p-4 mb-4" style="border-radius: 20px; border: none;">
                <h5 class="font-weight-bold mb-3"><i class="far fa-lightbulb text-warning mr-2"></i> Tips Menulis</h5>
                <ul class="list-unstyled">
                    <li class="d-flex mb-3">
                        <span class="badge badge-light rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 25px; height: 25px; background: #e8f5e9; color: #006642;">1</span>
                        <small class="text-muted">Sebutkan merk atau spesifikasi khusus jika diperlukan.</small>
                    </li>
                    <li class="d-flex mb-3">
                        <span class="badge badge-light rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 25px; height: 25px; background: #e8f5e9; color: #006642;">2</span>
                        <small class="text-muted">Jelaskan kondisi barang (baru atau layak pakai).</small>
                    </li>
                    <li class="d-flex">
                        <span class="badge badge-light rounded-circle mr-3 d-flex align-items-center justify-content-center" style="width: 25px; height: 25px; background: #e8f5e9; color: #006642;">3</span>
                        <small class="text-muted">Sertakan detail lokasi untuk akurasi bantuan.</small>
                    </li>
                </ul>
            </div>

            <!-- Peta Lokasi -->
            <div class="card p-4 mb-4" style="border-radius: 20px; border: none;">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-weight-bold mb-0">Data Lokasi Rebox</h5>
                    <i class="fas fa-map-marked-alt text-muted"></i>
                </div>
                <p class="small text-muted">Temukan hub terdekat untuk koordinasi distribusi barang bantuan Anda.</p>
                <div class="position-relative mt-3 rounded overflow-hidden" style="height: 150px; background: #eee;">
                    <img src="https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?q=80&w=2066&auto=format&fit=crop" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%) brightness(0.7);">
                    <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="top:0; left:0; background: rgba(0,0,0,0.2);">
                        <button class="btn btn-light btn-sm font-weight-bold px-3 shadow-sm" style="border-radius: 10px;">Lihat Semua Lokasi</button>
                    </div>
                </div>
            </div>

            <!-- Card Bantuan -->
            <div class="card p-4 text-white" style="border-radius: 20px; border: none; background-color: #024d36;">
                <h5 class="font-weight-bold">Butuh Bantuan?</h5>
                <p class="small opacity-75">Tim admin kami siap membantu Anda 24/7 untuk setiap pertanyaan terkait operasional Rebox.</p>
                <button class="btn btn-success btn-block mt-3 font-weight-bold" style="border-radius: 12px; background-color: #007f4e; border: none;">
                    <i class="fas fa-comment-dots mr-2"></i> Hubungi CS Rebox
                </button>
            </div>
        </div>
    </div>
</div>