<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pilih Role Google - Rebox</title>
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            font-family: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #14202b;
            background:
                radial-gradient(circle at 20% 20%, rgba(0, 148, 0, .13), transparent 28%),
                radial-gradient(circle at 82% 76%, rgba(0, 148, 0, .12), transparent 26%),
                linear-gradient(90deg, #ffffff 0%, #f3fbf4 100%);
            display: grid;
            place-items: center;
            padding: 28px;
        }
        .role-card {
            width: min(100%, 520px);
            border: 1px solid rgba(0, 134, 0, .18);
            border-radius: 28px;
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 26px 60px rgba(0, 80, 0, .14);
            padding: 34px;
            animation: cardIn .42s cubic-bezier(.2,.8,.2,1) both;
        }
        .google-profile {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px;
            border-radius: 20px;
            background: rgba(0, 134, 0, .055);
            border: 1px solid rgba(0, 134, 0, .10);
            margin-bottom: 26px;
        }
        .google-profile img,
        .google-fallback {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            object-fit: cover;
            background: #e4f6e8;
            display: grid;
            place-items: center;
            color: #008600;
            font-size: 22px;
            font-weight: 700;
            flex: 0 0 auto;
        }
        .google-profile strong {
            display: block;
            color: #14202b;
            font-size: 18px;
            font-weight: 650;
            line-height: 1.2;
        }
        .google-profile span {
            display: block;
            margin-top: 4px;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
        }
        h1 {
            margin: 0;
            color: #008600;
            font-size: 30px;
            line-height: 1.1;
            font-weight: 650;
        }
        .lead {
            margin: 12px 0 24px;
            color: #667085;
            font-size: 15px;
            line-height: 1.55;
            font-weight: 500;
        }
        .role-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 18px;
        }
        .role-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }
        .role-option label {
            min-height: 104px;
            display: grid;
            align-content: center;
            gap: 8px;
            border: 1.5px solid rgba(0, 134, 0, .15);
            border-radius: 20px;
            background: rgba(255, 255, 255, .82);
            padding: 18px;
            cursor: pointer;
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease, background .22s ease;
        }
        .role-option label:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 134, 0, .26);
            box-shadow: 0 16px 34px rgba(0, 134, 0, .12);
        }
        .role-option input:checked + label {
            background: rgba(0, 134, 0, .09);
            border-color: rgba(0, 134, 0, .46);
            box-shadow: inset 0 0 0 1px rgba(0, 134, 0, .12);
        }
        .role-option strong {
            color: #14202b;
            font-size: 17px;
            font-weight: 650;
        }
        .role-option span {
            color: #667085;
            font-size: 12px;
            line-height: 1.45;
            font-weight: 500;
        }
        .error {
            margin: 0 0 14px;
            color: #dc2626;
            font-size: 13px;
            font-weight: 600;
        }
        .action-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .btn {
            height: 48px;
            border-radius: 16px;
            border: 1px solid rgba(0, 134, 0, .18);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #29323d;
            background: #f5f7f5;
            font-size: 14px;
            font-weight: 650;
            text-decoration: none;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }
        .btn.primary {
            border: 0;
            background: #008600;
            color: #ffffff;
            box-shadow: 0 14px 26px rgba(0, 134, 0, .18);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(0, 80, 0, .10);
        }
        .btn:active { transform: translateY(0) scale(.98); }
        @keyframes cardIn {
            from { opacity: 0; transform: translateY(18px) scale(.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @media (max-width: 560px) {
            .role-card { padding: 24px; }
            .role-grid, .action-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <main class="role-card">
        <div class="google-profile">
            @if(! empty($googleUser['avatar']))
                <img src="{{ $googleUser['avatar'] }}" alt="{{ $googleUser['name'] }}">
            @else
                <span class="google-fallback">{{ strtoupper(substr($googleUser['name'] ?? 'G', 0, 1)) }}</span>
            @endif
            <div>
                <strong>{{ $googleUser['name'] }}</strong>
                <span>{{ $googleUser['email'] }}</span>
            </div>
        </div>

        <h1>Pilih Peran Akun</h1>
        <p class="lead">Akun Google Anda sudah terverifikasi. Pilih peran yang akan digunakan di Rebox.</p>

        <form method="POST" action="{{ route('google.role.store') }}">
            @csrf
            <div class="role-grid">
                <div class="role-option">
                    <input type="radio" id="roleDonatur" name="role" value="donatur" @checked(old('role') === 'donatur')>
                    <label for="roleDonatur">
                        <strong>Donatur</strong>
                        <span>Memberikan barang dan memenuhi kebutuhan penerima.</span>
                    </label>
                </div>
                <div class="role-option">
                    <input type="radio" id="rolePenerima" name="role" value="penerima" @checked(old('role') === 'penerima')>
                    <label for="rolePenerima">
                        <strong>Penerima</strong>
                        <span>Mengajukan permintaan barang yang dibutuhkan.</span>
                    </label>
                </div>
            </div>

            @error('role')
                <p class="error">{{ $message }}</p>
            @enderror

            <div class="action-row">
                <a href="{{ route('login') }}" class="btn">Batal</a>
                <button type="submit" class="btn primary">Lanjutkan</button>
            </div>
        </form>
    </main>
</body>
</html>
