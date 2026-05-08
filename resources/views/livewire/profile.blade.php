<div class="p-3 p-lg-4 bg-light min-vh-100">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="fw-bold text-dark mb-0">Manajemen Akun</h4>
                <p class="text-muted small">Kelola informasi pribadi ReBox Anda.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-xl-4 col-lg-5">
                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="card-body p-4 text-center">
                        <div class="position-relative d-inline-block mb-3">
                            <div class="rounded-circle overflow-hidden shadow-sm" style="width: 140px; height: 140px; border: 5px solid #f8fafc;">
                                @if ($photo)
                                    <img src="{{ $photo->temporaryUrl() }}" class="w-100 h-100 object-fit-cover">
                                @elseif ($current_photo)
                                    <img src="{{ asset('storage/' . $current_photo) }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted">
                                        <i class="fas fa-user fa-3x"></i>
                                    </div>
                                @endif
                            </div>
                            
                            <label for="photo-upload" class="btn btn-success position-absolute rounded-circle shadow-sm d-flex align-items-center justify-content-center" 
                                style="width: 38px; height: 38px; bottom: 5px; right: 5px; background-color: #10854e; border: 3px solid #fff; cursor: pointer; z-index: 10;">
                                <i class="fas fa-camera fa-xs"></i>
                            </label>
                            <input type="file" wire:model="photo" id="photo-upload" class="d-none">
                        </div>

                        <div class="mt-2 mb-3">
                            <h5 class="fw-bold mb-1 text-dark">{{ $username }}</h5>
                            <p class="text-muted small mb-2">{{ $email }}</p>
                            <span class="badge rounded-pill px-3 py-2" style="background-color: rgba(16, 133, 78, 0.1); color: #10854e; font-size: 0.7rem;">
                                <i class="fas fa-check-circle me-1"></i> Akun Terverifikasi
                            </span>
                        </div>

                        <hr class="my-3 opacity-50">

                        <div class="text-start mt-3">
                            <label class="small fw-bold text-muted text-uppercase mb-3 d-block">Statistik Kontribusi</label>
                            <div class="bg-light p-3 rounded-4 d-flex align-items-center">
                                <div class="bg-white p-2 rounded-3 shadow-sm me-3">
                                    <i class="fas fa-hand-holding-heart text-success"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">12 Donasi</h6>
                                    <p class="mb-0" style="font-size: 0.7rem; color: #6c757d;">Total aksi sosial</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7">
                <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                    <div class="card-header bg-white border-0 py-3 px-4">
                        <h6 class="fw-bold mb-0">Informasi Pribadi</h6>
                    </div>
                    <div class="card-body p-4 pt-1">
                        <form wire:submit.prevent="updateProfile">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-muted">USERNAME</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="far fa-user text-muted"></i></span>
                                        <input type="text" wire:model="username" class="form-control bg-light border-0 px-3" placeholder="Nama pengguna">
                                    </div>
                                    @error('username') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted">ALAMAT EMAIL</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="far fa-envelope text-muted"></i></span>
                                        <input type="email" class="form-control bg-light border-0" value="{{ $email }}" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted">ROLE PENGGUNA</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-0"><i class="fas fa-shield-alt text-muted"></i></span>
                                        <input type="text" class="form-control bg-light border-0 text-capitalize" value="{{ $role }}" disabled>
                                    </div>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="bg-light p-3 rounded-4 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-info-circle text-muted me-2"></i>
                                            <p class="mb-0 text-muted" style="font-size: 0.75rem;">Email dan Role bersifat permanen.</p>
                                        </div>
                                        <button type="submit" class="btn btn-success px-4 py-2 fw-bold" style="background-color: #10854e; border-radius: 12px; min-width: 180px;">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        @if (session()->has('message'))
                            <div class="mt-3 alert alert-success border-0 shadow-sm d-flex align-items-center animate__animated animate__fadeIn" style="border-radius: 12px;">
                                <i class="fas fa-check-circle me-2"></i>
                                <span class="small">{{ session('message') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .object-fit-cover { object-fit: cover; }
        .input-group-text { border-radius: 12px 0 0 12px !important; border-right: none !important; }
        .form-control { border-radius: 0 12px 12px 0 !important; font-size: 0.9rem !important; }
        .rounded-4 { border-radius: 1rem !important; }
        /* Mengurangi whitespace berlebih */
        .container-fluid { max-width: 1200px; margin: 0 auto; }
    </style>
</div>