<div class="container-fluid px-3 py-2">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-start flex-wrap mb-3">

        <div>
            <div class="small text-muted mb-1"
                style="font-size:12px; font-weight:600;">
                Requests
                <i class="fas fa-chevron-right mx-1" style="font-size:8px;"></i>
                <span style="color:#00743f;">Permintaan Barang</span>
            </div>

            <h1 style="
                font-size:28px;
                font-weight:800;
                color:#17212b;
                margin-bottom:6px;
                line-height:1.2;
            ">
                Form Permintaan Barang
            </h1>

            <p class="text-muted mb-0"
                style="font-size:14px;">
                Lengkapi detail kebutuhan Anda untuk mendapatkan dukungan logistik.
            </p>
        </div>

        {{-- BUTTON --}}
        <div class="d-flex align-items-center mt-2 mt-lg-0">

            <button class="btn btn-light mr-2 px-3"
                style="
                    height:42px;
                    border-radius:14px;
                    border:1px solid #dfe5eb;
                    font-weight:700;
                    font-size:13px;
                    color:#4b5563;
                ">
                <i class="far fa-envelope mr-2"></i>
                Simpan Draft
            </button>

            <button class="btn text-white px-4"
                style="
                    height:42px;
                    border-radius:14px;
                    background:#00743f;
                    border:none;
                    font-weight:700;
                    font-size:13px;
                    box-shadow:0 6px 14px rgba(0,116,63,.16);
                ">
                <i class="fas fa-paper-plane mr-2"></i>
                Kirim Permintaan
            </button>

        </div>

    </div>

    {{-- MAIN CARD --}}
    <div class="card border-0 shadow-sm overflow-hidden"
        style="
            border-radius:24px;
            background:#fff;
        ">

        <div class="card-body p-4">

            {{-- TOP --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <h4 style="
                    font-size:22px;
                    font-weight:800;
                    color:#17212b;
                    margin:0;
                ">
                    Pilih Lokasi Drop-off
                </h4>

                <div class="d-flex">

                    <button class="btn btn-light rounded-circle mr-2"
                        style="
                            width:42px;
                            height:42px;
                            border:1px solid #dfe5eb;
                        ">
                        <i class="fas fa-arrow-left"
                            style="font-size:13px;"></i>
                    </button>

                    <button class="btn btn-light rounded-circle"
                        style="
                            width:42px;
                            height:42px;
                            border:1px solid #dfe5eb;
                        ">
                        <i class="fas fa-arrow-right"
                            style="font-size:13px;"></i>
                    </button>

                </div>

            </div>

            {{-- CARD LOKASI --}}
            <div class="row mb-3">

                {{-- ITEM --}}
                <div class="col-lg-4 mb-3">

                    <div class="border overflow-hidden h-100"
                        style="
                            border-radius:18px;
                            border:1px solid #e7edf2;
                        ">

                        <div class="position-relative">

                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200&auto=format&fit=crop"
                                style="
                                    height:145px;
                                    width:100%;
                                    object-fit:cover;
                                ">

                            {{-- DISTANCE --}}
                            <div class="position-absolute"
                                style="top:12px; left:12px;">

                                <div class="bg-white px-2 py-1 d-flex align-items-center"
                                    style="
                                        border-radius:999px;
                                        font-size:11px;
                                        font-weight:700;
                                        box-shadow:0 4px 10px rgba(0,0,0,.08);
                                    ">

                                    <i class="fas fa-location-dot text-success mr-1"></i>
                                    0.8 km

                                </div>

                            </div>

                            {{-- PLUS --}}
                            <button class="btn rounded-circle text-white position-absolute"
                                style="
                                    right:14px;
                                    bottom:14px;
                                    width:48px;
                                    height:48px;
                                    background:#00743f;
                                    border:none;
                                    font-size:22px;
                                    line-height:1;
                                ">
                                +
                            </button>

                        </div>

                        <div class="p-3">

                            <h5 style="
                                font-size:18px;
                                font-weight:800;
                                color:#17212b;
                                margin-bottom:6px;
                            ">
                                Rebox Sudirman Central
                            </h5>

                            <p class="text-muted mb-0"
                                style="
                                    font-size:12px;
                                    line-height:1.5;
                                ">
                                Jl. Jend. Sudirman No. 52, Jakarta Selatan
                            </p>

                        </div>

                    </div>

                </div>

                {{-- ITEM --}}
                <div class="col-lg-4 mb-3">

                    <div class="border overflow-hidden h-100"
                        style="
                            border-radius:18px;
                            border:1px solid #e7edf2;
                        ">

                        <div class="position-relative">

                            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?q=80&w=1200&auto=format&fit=crop"
                                style="
                                    height:145px;
                                    width:100%;
                                    object-fit:cover;
                                ">

                            <div class="position-absolute"
                                style="top:12px; left:12px;">

                                <div class="bg-white px-2 py-1 d-flex align-items-center"
                                    style="
                                        border-radius:999px;
                                        font-size:11px;
                                        font-weight:700;
                                        box-shadow:0 4px 10px rgba(0,0,0,.08);
                                    ">

                                    <i class="fas fa-location-dot text-success mr-1"></i>
                                    1.2 km

                                </div>

                            </div>

                            <button class="btn rounded-circle text-white position-absolute"
                                style="
                                    right:14px;
                                    bottom:14px;
                                    width:48px;
                                    height:48px;
                                    background:#00743f;
                                    border:none;
                                    font-size:22px;
                                ">
                                +
                            </button>

                        </div>

                        <div class="p-3">

                            <h5 style="
                                font-size:18px;
                                font-weight:800;
                                color:#17212b;
                                margin-bottom:6px;
                            ">
                                Grand Indonesia Hub
                            </h5>

                            <p class="text-muted mb-0"
                                style="
                                    font-size:12px;
                                    line-height:1.5;
                                ">
                                Lantai LG Barat, Menteng, Jakarta Pusat
                            </p>

                        </div>

                    </div>

                </div>

                {{-- ITEM --}}
                <div class="col-lg-4 mb-3">

                    <div class="border overflow-hidden h-100"
                        style="
                            border-radius:18px;
                            border:1px solid #e7edf2;
                        ">

                        <div class="position-relative">

                            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200&auto=format&fit=crop"
                                style="
                                    height:145px;
                                    width:100%;
                                    object-fit:cover;
                                ">

                            <div class="position-absolute"
                                style="top:12px; left:12px;">

                                <div class="bg-white px-2 py-1 d-flex align-items-center"
                                    style="
                                        border-radius:999px;
                                        font-size:11px;
                                        font-weight:700;
                                        box-shadow:0 4px 10px rgba(0,0,0,.08);
                                    ">

                                    <i class="fas fa-location-dot text-success mr-1"></i>
                                    2.5 km

                                </div>

                            </div>

                            <button class="btn rounded-circle text-white position-absolute"
                                style="
                                    right:14px;
                                    bottom:14px;
                                    width:48px;
                                    height:48px;
                                    background:#00743f;
                                    border:none;
                                    font-size:22px;
                                ">
                                +
                            </button>

                        </div>

                        <div class="p-3">

                            <h5 style="
                                font-size:18px;
                                font-weight:800;
                                color:#17212b;
                                margin-bottom:6px;
                            ">
                                SCBD Office Park
                            </h5>

                            <p class="text-muted mb-0"
                                style="
                                    font-size:12px;
                                    line-height:1.5;
                                ">
                                Gedung Artha Graha Lobby, Jakarta
                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <hr>

            {{-- FORM --}}
            <form wire:submit.prevent="submit">

                <div class="row mt-3">

                    {{-- NAMA --}}
                    <div class="col-lg-6 mb-3">

                        <label class="mb-2"
                            style="
                                font-size:14px;
                                font-weight:800;
                                color:#374151;
                            ">
                            <i class="far fa-clipboard text-success mr-2"></i>
                            Nama Barang
                        </label>

                        <input type="text"
                            wire:model="nama_barang"
                            class="form-control"
                            placeholder="Contoh: Beras, Kaos Layak Pakai, dll"
                            style="
                                height:54px;
                                border-radius:16px;
                                background:#f7f9fb;
                                border:1px solid #e4e9ef;
                                font-size:14px;
                                padding:0 18px;
                            ">

                    </div>

                    {{-- KATEGORI --}}
                    <div class="col-lg-6 mb-3">

                        <label class="mb-2"
                            style="
                                font-size:14px;
                                font-weight:800;
                                color:#374151;
                            ">
                            <i class="fas fa-shapes text-success mr-2"></i>
                            Kategori Barang
                        </label>

                        <select class="form-control"
                            style="
                                height:54px;
                                border-radius:16px;
                                background:#f7f9fb;
                                border:1px solid #e4e9ef;
                                font-size:14px;
                                padding:0 18px;
                            ">

                            <option>Pilih kategori...</option>
                            <option>Pakaian</option>
                            <option>Edukasi</option>
                            <option>Kebutuhan Pokok</option>

                        </select>

                    </div>

                    {{-- JUMLAH --}}
                    <div class="col-lg-6 mb-3">

                        <label class="mb-2"
                            style="
                                font-size:14px;
                                font-weight:800;
                                color:#374151;
                            ">
                            <i class="fas fa-list-ol text-success mr-2"></i>
                            Jumlah
                        </label>

                        <div class="position-relative">

                            <input type="number"
                                class="form-control"
                                placeholder="0"
                                style="
                                    height:54px;
                                    border-radius:16px;
                                    background:#f7f9fb;
                                    border:1px solid #e4e9ef;
                                    font-size:14px;
                                    padding:0 18px;
                                ">

                            <div class="position-absolute"
                                style="
                                    right:12px;
                                    top:50%;
                                    transform:translateY(-50%);
                                ">

                                <div class="px-2 py-1"
                                    style="
                                        border-radius:8px;
                                        background:#fff;
                                        border:1px solid #e4e9ef;
                                        font-size:11px;
                                        font-weight:700;
                                        color:#94a3b8;
                                    ">
                                    pcs
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- DESKRIPSI --}}
                <div class="mt-1">

                    <label class="mb-2"
                        style="
                            font-size:14px;
                            font-weight:800;
                            color:#374151;
                        ">
                        <i class="far fa-file-lines text-success mr-2"></i>
                        Deskripsi Kebutuhan
                    </label>

                    <textarea class="form-control"
                        rows="5"
                        placeholder="Jelaskan secara detail barang yang dibutuhkan dan tujuan penggunaan..."
                        style="
                            border-radius:18px;
                            background:#f7f9fb;
                            border:1px solid #e4e9ef;
                            font-size:14px;
                            padding:18px;
                        "></textarea>

                </div>

            </form>

        </div>

        {{-- INFO --}}
        <div class="px-4 py-3"
            style="
                background:#fafcfd;
                border-top:1px solid #edf1f5;
            ">

            <div class="d-flex align-items-start">

                <div class="mr-3">
                    <i class="fas fa-circle-info text-success"
                        style="font-size:20px;"></i>
                </div>

                <div>

                    <h5 style="
                        font-size:15px;
                        font-weight:800;
                        color:#374151;
                        margin-bottom:4px;
                    ">
                        Informasi Penting
                    </h5>

                    <p class="text-muted mb-0"
                        style="
                            font-size:12px;
                            line-height:1.7;
                        ">
                        Permintaan Anda akan diproses dalam 1-2 hari kerja.
                        Pastikan barang sesuai kategori untuk mempercepat proses logistik.
                    </p>

                </div>

            </div>

        </div>

    </div>

    {{-- BOTTOM --}}
    <div class="mt-3 p-3 d-flex justify-content-between align-items-center flex-wrap"
        style="
            background:#eefbf2;
            border:1px solid #d7f2df;
            border-radius:18px;
        ">

        <div class="d-flex align-items-center">

            <div class="mr-3 d-flex align-items-center justify-content-center"
                style="
                    width:48px;
                    height:48px;
                    border-radius:50%;
                    background:#d5f4de;
                ">
                <i class="fas fa-check text-success"
                    style="font-size:16px;"></i>
            </div>

            <div>

                <h5 class="mb-1"
                    style="
                        font-size:15px;
                        font-weight:800;
                        color:#14532d;
                    ">
                    Ingin melacak permintaan sebelumnya?
                </h5>

                <div style="
                    color:#198754;
                    font-size:12px;
                ">
                    Anda memiliki 2 permintaan aktif yang sedang diproses.
                </div>

            </div>

        </div>

        <a href="#"
            class="font-weight-bold mt-2 mt-lg-0"
            style="
                font-size:13px;
                color:#00743f;
                text-decoration:none;
            ">
            Lihat Aktivitas Saya
        </a>

    </div>

</div>