<div class="p-3 p-lg-4 bg-light min-vh-100">
    <div class="container-fluid profile-container">
        <div class="row mb-3">
            <div class="col-12">
                <h4 class="fw-bold text-dark mb-1">Manajemen Akun</h4>
                <p class="text-muted small mb-0">Kelola informasi pribadi ReBox Anda.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Sidebar Profile -->
            <div class="col-xl-4 col-lg-5">
                <div class="card border-0 shadow-sm profile-card">
                    <div class="card-body p-4 text-center">
                        <div class="position-relative d-inline-block mb-3">
                            <div class="profile-photo rounded-circle overflow-hidden shadow-sm">
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

                            @if($isEditing)
                                <label for="photo-upload" class="btn btn-success position-absolute rounded-circle shadow-sm d-flex align-items-center justify-content-center photo-btn">
                                    <i class="fas fa-camera fa-xs"></i>
                                </label>
                                <input type="file" wire:model="photo" id="photo-upload" class="d-none">
                            @endif
                        </div>

                        <div class="mt-2 mb-3">
                            <h5 class="fw-bold mb-2 text-dark">{{ $username }}</h5>
                            <p class="text-muted small mb-3">{{ $email }}</p>

                            <span class="badge rounded-pill px-3 py-2 verified-badge">
                                <i class="fas fa-check-circle"></i>
                                <span>Akun Terverifikasi</span>
                            </span>
                        </div>

                        <hr class="my-4 opacity-50">

                        <div class="text-start mt-3">
                            <label class="small fw-bold text-muted text-uppercase mb-3 d-block">
                                Statistik Kontribusi
                            </label>

                            <div class="stat-box d-flex align-items-center">
                                <div class="stat-icon">
                                    <i class="fas fa-hand-holding-heart text-success"></i>
                                </div>

                                <div class="stat-content">
                                    <h6 class="mb-1 fw-bold">12 Donasi</h6>
                                    <p class="mb-0">Total aksi sosial</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Information Section -->
            <div class="col-xl-8 col-lg-7">
                <div class="card border-0 shadow-sm profile-card">
                    <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center profile-header">
                        <h6 class="fw-bold mb-0">Informasi Pribadi</h6>

                        @if(!$isEditing)
                            <button wire:click="$set('isEditing', true)" class="btn btn-sm btn-outline-success border-0 fw-bold px-3 edit-btn">
                                <i class="fas fa-edit"></i>
                                <span>Edit Profile</span>
                            </button>
                        @else
                            <button wire:click="$set('isEditing', false)" class="btn btn-sm btn-light border-0 fw-bold px-3 text-muted">
                                Batal
                            </button>
                        @endif
                    </div>

                    <div class="card-body p-4 pt-1">
                        @if(!$isEditing)
                            <div class="row g-4 mt-1">
                                <div class="col-12">
                                    <label class="form-label small fw-bold text-muted text-uppercase">
                                        Username
                                    </label>

                                    <div class="info-field d-flex align-items-center">
                                        <i class="far fa-user text-muted info-icon"></i>
                                        <span class="text-dark">{{ $username }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted text-uppercase">
                                        Alamat Email
                                    </label>

                                    <div class="info-field d-flex align-items-center">
                                        <i class="far fa-envelope text-muted info-icon"></i>
                                        <span class="text-dark">{{ $email }}</span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-muted text-uppercase">
                                        Role Pengguna
                                    </label>

                                    <div class="info-field d-flex align-items-center">
                                        <i class="fas fa-shield-alt text-muted info-icon"></i>
                                        <span class="text-dark text-capitalize">{{ $role }}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <form wire:submit.prevent="updateProfile">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label small fw-bold text-muted">USERNAME</label>

                                        <div class="input-group profile-input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="far fa-user text-muted"></i>
                                            </span>

                                            <input type="text"
                                                wire:model="username"
                                                class="form-control bg-light border-0 px-3"
                                                placeholder="Nama pengguna">
                                        </div>

                                        @error('username')
                                            <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">ALAMAT EMAIL</label>

                                        <div class="input-group profile-input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="far fa-envelope text-muted"></i>
                                            </span>

                                            <input type="email"
                                                class="form-control bg-light border-0"
                                                value="{{ $email }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-muted">ROLE PENGGUNA</label>

                                        <div class="input-group profile-input-group">
                                            <span class="input-group-text bg-light border-0">
                                                <i class="fas fa-shield-alt text-muted"></i>
                                            </span>

                                            <input type="text"
                                                class="form-control bg-light border-0 text-capitalize"
                                                value="{{ $role }}"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <div class="bg-light p-3 rounded-4 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                                            <div class="d-flex align-items-center note-box">
                                                <i class="fas fa-info-circle text-muted"></i>
                                                <p class="mb-0 text-muted">
                                                    Email dan Role bersifat permanen.
                                                </p>
                                            </div>

                                            <button type="submit" class="btn btn-success px-4 py-2 fw-bold save-btn">
                                                Simpan Perubahan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif

                        @if (session()->has('message'))
                            <div class="mt-3 alert alert-success border-0 shadow-sm d-flex align-items-center success-alert animate__animated animate__fadeIn">
                                <i class="fas fa-check-circle"></i>
                                <span class="small">{{ session('message') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .profile-card {
            border-radius: 20px;
        }

        .profile-photo {
            width: 140px;
            height: 140px;
            border: 5px solid #f8fafc;
        }

        .photo-btn {
            width: 38px;
            height: 38px;
            bottom: 5px;
            right: 5px;
            background-color: #10854e;
            border: 3px solid #fff;
            cursor: pointer;
            z-index: 10;
        }

        .verified-badge {
            background-color: rgba(16, 133, 78, 0.1);
            color: #10854e;
            font-size: 0.72rem;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .stat-box {
            background-color: #f8fafc;
            padding: 18px;
            border-radius: 18px;
            gap: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-content h6 {
            font-size: 1rem;
        }

        .stat-content p {
            font-size: 0.75rem;
            color: #6c757d;
        }

        .profile-header {
            gap: 16px;
        }

        .edit-btn {
            color: #10854e;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .info-field {
            background-color: #f8fafc;
            border-radius: 14px;
            padding: 18px 20px;
            min-height: 58px;
            gap: 14px;
            font-size: 1rem;
        }

        .info-icon {
            width: 22px;
            min-width: 22px;
            text-align: center;
            font-size: 1.1rem;
        }

        .profile-input-group {
            border-radius: 14px;
            overflow: hidden;
            background: #f8fafc;
        }

        .profile-input-group .input-group-text {
            width: 50px;
            justify-content: center;
            border-radius: 14px 0 0 14px !important;
            border-right: none !important;
        }

        .profile-input-group .form-control {
            border-radius: 0 14px 14px 0 !important;
            font-size: 0.9rem !important;
            min-height: 48px;
        }

        .note-box {
            gap: 10px;
        }

        .note-box p {
            font-size: 0.75rem;
        }

        .save-btn {
            background-color: #10854e;
            border-radius: 12px;
            min-width: 180px;
            border: none;
        }

        .success-alert {
            border-radius: 12px;
            gap: 10px;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .rounded-4 {
            border-radius: 1rem !important;
        }

        .bg-light.border-0 {
            background-color: #f8fafc !important;
        }

        @media (max-width: 576px) {
            .profile-header {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .edit-btn {
                width: 100%;
                justify-content: center;
            }

            .info-field {
                padding: 16px;
            }
        }
    </style>
</div>