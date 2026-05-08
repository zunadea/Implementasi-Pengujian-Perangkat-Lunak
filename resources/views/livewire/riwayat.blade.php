<div>

    <style>

        .riwayat-page{
            padding: 28px 34px;
            background: #f6f8fb;
            min-height: 100vh;
        }

        .riwayat-header{
            margin-bottom: 24px;
        }

        .riwayat-header h1{
            font-size: 34px;
            font-weight: 800;
            color: #182230;
            margin-bottom: 4px;
            letter-spacing: -.8px;
        }

        .riwayat-header p{
            color: #64748b;
            font-size: 15px;
            margin: 0;
        }

        .btn-riwayat{
            border: 4px solid #dfe7ef;
            background: #00843d;
            color: white;
            padding: 10px 24px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            margin-top: 18px;
        }

        .riwayat-list{
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-top: 28px;
        }

        .riwayat-card{
            background: white;
            border-radius: 22px;
            padding: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #edf2f7;
        }

        .card-left{
            display: flex;
            align-items: center;
            gap: 55px;
        }

        .user-box{
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 250px;
        }

        .user-photo{
            width: 58px;
            height: 58px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #d9f5e7;
        }

        .label-mini{
            font-size: 11px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: 1px;
        }

        .user-info h5{
            font-size: 16px;
            font-weight: 800;
            margin: 4px 0;
            color: #1f2937;
        }

        .user-info p{
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }

        .item-box{
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .item-image{
            width: 95px;
            height: 95px;
            border-radius: 16px;
            object-fit: cover;
        }

        .item-info h5{
            font-size: 16px;
            font-weight: 800;
            margin: 4px 0;
            color: #1f2937;
        }

        .pcs{
            margin-bottom: 10px;
            color: #64748b;
            font-size: 14px;
        }

        .tujuan{
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }

        .card-right{
            text-align: right;
            min-width: 160px;
        }

        .status-badge{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-top: 10px;
            margin-bottom: 12px;
        }

        .success{
            background: #d7f5df;
            color: #0b8a43;
        }

        .warning{
            background: #fff3d2;
            color: #b7791f;
        }

        .danger{
            background: #ffe2e2;
            color: #d14b4b;
        }

        .action-link{
            text-decoration: none;
            font-size: 15px;
            font-weight: 700;
        }

        .success-link{
            color: #0b8a43;
        }

        .warning-link{
            color: #0b8a43;
        }

        .action-disabled{
            color: #94a3b8;
            font-size: 15px;
            font-weight: 600;
        }

        .riwayat-footer{
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-text{
            color: #64748b;
            font-size: 15px;
        }

        .pagination-custom{
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pagination-custom button{
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 1px solid #d9e2ec;
            background: white;
            color: #64748b;
            font-size: 14px;
            font-weight: 700;
        }

        .pagination-custom button.active{
            background: #006b34;
            color: white;
            border-color: #006b34;
        }

        @media(max-width:1200px){

            .riwayat-card{
                flex-direction: column;
                align-items: flex-start;
                gap: 28px;
            }

            .card-left{
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .card-right{
                text-align: left;
            }
        }

    </style>

    <div class="riwayat-page">

        <!-- HEADER -->
        <div class="riwayat-header">

            <h1>Aktivitas Donasi</h1>

            <p>
                Track and manage your resource contributions and community impact.
            </p>

            <button class="btn-riwayat">
                Riwayat Barang
            </button>

        </div>

        <!-- LIST -->
        <div class="riwayat-list">

            @foreach($activities as $item)

            <div class="riwayat-card">

                <!-- LEFT -->
                <div class="card-left">

                    <!-- USER -->
                    <div class="user-box">

                        <img
                            src="https://i.pravatar.cc/100?img={{ $loop->iteration }}"
                            class="user-photo">

                        <div class="user-info">

                            <span class="label-mini">
                                NAMA PENDONASI
                            </span>

                            <h5>
                                Zunadea Kusmiandita
                            </h5>

                            <span class="label-mini mt-2 d-block">
                                ROLE AKUN
                            </span>

                            <p>Donatur</p>

                        </div>

                    </div>

                    <!-- ITEM -->
                    <div class="item-box">

                        <img
                            src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?q=80&w=800&auto=format&fit=crop"
                            class="item-image">

                        <div class="item-info">

                            <span class="label-mini">
                                NAMA BARANG
                            </span>

                            <h5>
                                {{ $item->nama_barang }}
                            </h5>

                            <p class="pcs">
                                {{ $item->jumlah ?? 1 }} Pcs
                            </p>

                            <span class="label-mini d-block">
                                TUJUAN DONASI
                            </span>

                            <p class="tujuan">
                                <i class="fas fa-map-marker-alt"></i>
                                Panti Asuhan Al - Ghifari
                            </p>

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="card-right">

                    <span class="label-mini">
                        STATUS DONASI
                    </span>

                    @if($item->status == 'Selesai')

                        <div class="status-badge success">
                            SELESAI
                        </div>

                        <br>

                        <a href="#" class="action-link success-link">
                            View Details
                        </a>

                    @elseif($item->status == 'Dikirim')

                        <div class="status-badge warning">
                            DIKIRIM
                        </div>

                        <br>

                        <a href="#" class="action-link warning-link">
                            Track Package
                        </a>

                    @else

                        <div class="status-badge danger">
                            DIBATALKAN
                        </div>

                        <br>

                        <span class="action-disabled">
                            No Actions
                        </span>

                    @endif

                </div>

            </div>

            @endforeach

        </div>

        <!-- FOOTER -->
        <div class="riwayat-footer">

            <div class="footer-text">
                Showing {{ $activities->count() }} of {{ $activities->total() }} donation records
            </div>

            <div class="pagination-custom">

                <button>
                    <i class="fas fa-chevron-left"></i>
                </button>

                <button class="active">
                    1
                </button>

                <button>
                    2
                </button>

                <button>
                    3
                </button>

                <button>
                    <i class="fas fa-chevron-right"></i>
                </button>

            </div>

        </div>

    </div>

</div>