<<<<<<< HEAD
<div class="rebox-dashboard">

    @if (session()->has('message'))
        <div id="successToast" class="glass-toast">
            <div class="d-flex align-items-center">
                <div class="toast-icon me-3">
                    <i class="fas fa-circle-check"></i>
                </div>

                <div class="flex-grow-1">
                    <h6 class="toast-title mb-1">Login Berhasil</h6>
                    <p class="toast-text mb-0">{{ session('message') }}</p>
                </div>
            </div>

            <div class="toast-progress">
                <span></span>
            </div>
        </div>
    @endif

    <style>
        :root {
            --green-dark: #004934;
            --green-main: #007a3d;
            --green-soft: #e9f8ef;
            --green-light: #f4fbf7;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --card-border: #edf2f0;
            --bg-main: #f5f7fb;
        }

        body {
            background: var(--bg-main);
        }

        .rebox-dashboard {
            padding: 28px 30px 50px;
            font-family: 'Inter', 'Poppins', sans-serif;
            color: var(--text-dark);
        }

        .glass-toast {
            position: fixed;
            top: 24px;
            right: 28px;
            z-index: 9999;
            width: 360px;
            max-width: calc(100% - 32px);
            padding: 18px 20px;
            border-radius: 24px;
            background: rgba(255,255,255,0.55);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.45);
            box-shadow:
                0 18px 45px rgba(0,0,0,0.10),
                inset 0 1px 1px rgba(255,255,255,0.45);
            animation: toastShow 0.45s ease;
            transition: all 0.4s ease;
        }

        .glass-toast.hide-toast {
            opacity: 0;
            transform: translateY(-18px) scale(0.96);
            pointer-events: none;
        }

        .toast-icon {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: rgba(0,122,61,0.12);
            color: #007a3d;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 20px;
            box-shadow:
                inset 0 1px 1px rgba(255,255,255,0.5),
                0 8px 20px rgba(0,122,61,0.12);
        }

        .toast-title {
            font-size: 15px;
            font-weight: 800;
            color: #111827;
        }

        .toast-text {
            font-size: 13px;
            line-height: 1.5;
            color: #6b7280;
        }

        .toast-progress {
            width: 100%;
            height: 4px;
            background: rgba(0,122,61,0.12);
            border-radius: 999px;
            overflow: hidden;
            margin-top: 16px;
        }

        .toast-progress span {
            display: block;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #007a3d, #00b35c);
            border-radius: 999px;
            animation: toastProgress 4s linear forwards;
        }

        @keyframes toastShow {
            from {
                opacity: 0;
                transform: translateY(-22px) scale(0.94);
            }

=======
<div class="rebox-dashboard-page">
    <style>
        :root {
            --rebox-green: #008600;
            --rebox-ink: #111111;
            --rebox-muted: #a1a1a1;
            --sf-pro: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        body {
            background: #fbfffc;
            font-family: var(--sf-pro);
        }

        .rebox-navbar-area {
            display: none !important;
        }

        .content-wrapper,
        .content,
        .container-fluid {
            width: 100% !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }

        .rebox-dashboard-page {
            min-height: 100vh;
            overflow: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 14% 2%, rgba(0, 134, 0, 0.07), transparent 18%),
                radial-gradient(circle at 88% 6%, rgba(0, 134, 0, 0.08), transparent 18%),
                radial-gradient(circle at 8% 58%, rgba(0, 134, 0, 0.035), transparent 17%),
                linear-gradient(90deg, #ffffff 0%, #ffffff 56%, #f5fcf6 100%);
            position: relative;
        }

        .rebox-dashboard-page::before,
        .rebox-dashboard-page::after {
            content: "";
            position: absolute;
            left: -8vw;
            width: 116vw;
            height: 150px;
            border: 1px solid rgba(0, 134, 0, 0.13);
            pointer-events: none;
            z-index: 0;
        }

        .rebox-dashboard-page::before {
            top: 1260px;
            transform: rotate(5deg);
        }

        .rebox-dashboard-page::after {
            top: 1305px;
            transform: rotate(-4deg);
        }

        .dashboard-inner {
            width: min(100%, 1280px);
            margin: 0 auto;
            padding: 26px 54px 80px;
            position: relative;
            z-index: 1;
        }

        .dashboard-inner::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 1040px;
            width: 1040px;
            height: 1120px;
            transform: translateX(-50%);
            background:
                radial-gradient(circle at 18% 24%, rgba(0, 134, 0, 0.07), transparent 26%),
                radial-gradient(circle at 79% 34%, rgba(0, 134, 0, 0.045), transparent 28%),
                radial-gradient(circle at 50% 70%, rgba(0, 134, 0, 0.028), transparent 24%);
            opacity: 0.88;
            filter: blur(3px);
            pointer-events: none;
            animation: lowerAmbient 13s ease-in-out infinite alternate;
            z-index: -1;
        }

        .reveal {
            opacity: 0;
            transform: translateY(34px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .top-shell {
            position: relative;
            z-index: 120;
            display: grid;
            grid-template-columns: 1fr 142px;
            align-items: center;
            gap: 42px;
        }

        .top-nav {
            height: 59px;
            border-radius: 25px;
            background: rgba(0, 134, 0, 0.70);
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            align-items: center;
            padding: 0 82px;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
        }

        .top-nav.is-recipient {
            grid-template-columns: repeat(4, 1fr);
        }

        .top-nav a {
            color: #ffffff;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            line-height: 1;
            justify-self: center;
            width: 118px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 14px;
            border-radius: 14px;
            transition: transform 0.24s ease, background 0.24s ease, box-shadow 0.24s ease;
        }

        .top-nav a:hover,
        .top-nav a.is-active {
            background: #8bd17d;
            color: #006b00;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.28),
                0 10px 22px rgba(0, 80, 0, 0.16);
            transform: translateY(-2px);
        }

        .profile-dropdown {
            position: relative;
            z-index: 130;
        }

        .profile-pill {
            height: 59px;
            width: 142px;
            border: 0;
            border-radius: 25px;
            background: rgba(0, 134, 0, 0.70);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            padding: 7px 22px 7px 10px;
            cursor: pointer;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
            transition: transform 0.24s ease, box-shadow 0.24s ease;
        }

        .profile-pill:hover,
        .profile-dropdown.is-open .profile-pill {
            transform: translateY(-2px);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.24),
                0 16px 30px rgba(0, 134, 0, 0.16);
        }

        .profile-pill img,
        .profile-avatar-fallback {
            width: 47px;
            height: 47px;
            border-radius: 50%;
            object-fit: cover;
            background: #d9f3df;
        }

        .profile-avatar-fallback {
            display: grid;
            place-items: center;
            color: var(--rebox-green);
            font-weight: 800;
        }

        .profile-caret {
            width: 24px;
            height: 22px;
            display: grid;
            place-items: center;
        }

        .profile-caret::before {
            content: "";
            width: 20px;
            height: 17px;
            background: #ffffff;
            clip-path: polygon(8% 0, 92% 0, 60% 72%, 53% 88%, 47% 88%, 40% 72%);
            border-radius: 6px;
        }

        .profile-menu {
            position: absolute;
            top: 68px;
            right: 0;
            min-width: 190px;
            padding: 10px;
            border: 1px solid rgba(0, 134, 0, 0.12);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 18px 40px rgba(0, 80, 0, 0.14);
            display: none;
            z-index: 140;
        }

        .profile-dropdown.is-open .profile-menu {
            display: block;
            animation: menuDrop 0.22s ease both;
        }

        .profile-menu form {
            margin: 0;
        }

        .profile-menu a,
        .profile-menu button {
            display: block;
            padding: 11px 12px;
            border-radius: 12px;
            color: #1f2937;
            background: transparent;
            border: 0;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .profile-menu a:hover,
        .profile-menu button:hover {
            background: rgba(0, 134, 0, 0.09);
            color: var(--rebox-green);
        }

        .hero-section {
            position: relative;
            text-align: center;
            padding: 112px 0 88px;
            min-height: 560px;
            isolation: isolate;
        }

        .hero-hand {
            position: absolute;
            width: min(446px, 36vw);
            height: auto;
            pointer-events: none;
            user-select: none;
            z-index: -1;
            filter: drop-shadow(0 18px 24px rgba(0, 80, 0, 0.08));
        }

        .hero-hand-give {
            left: -278px;
            top: 72px;
            transform: rotate(4deg);
            animation: handGiveEnter 1.05s cubic-bezier(.16, 1, .3, 1) .15s both, handGiveIdle 4.8s ease-in-out 1.25s infinite;
        }

        .hero-hand-receive {
            right: -278px;
            top: 334px;
            transform: rotate(-2deg);
            animation: handReceiveEnter 1.08s cubic-bezier(.16, 1, .3, 1) .28s both, handReceiveIdle 5.2s ease-in-out 1.42s infinite;
        }

        .welcome-text {
            color: var(--rebox-green);
            font-size: 27px;
            font-weight: 500;
            margin: 0 0 54px;
        }

        .hero-title {
            color: var(--rebox-green);
            font-size: 36px;
            font-weight: 600;
            line-height: 1.1;
            margin: 0 0 42px;
        }

        .hero-subtitle {
            width: min(100%, 455px);
            margin: 0 auto 48px;
            color: var(--rebox-muted);
            font-size: 15px;
            font-weight: 600;
            line-height: 1.2;
        }

        .donate-cta {
            width: 278px;
            height: 37px;
            border: 1px solid rgba(255, 255, 255, 0.45);
            border-radius: 14px;
            background: rgba(128, 128, 128, 0.20);
            backdrop-filter: blur(12px);
            color: var(--rebox-green);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.65),
                0 13px 32px rgba(0, 134, 0, 0.10);
            position: relative;
            overflow: hidden;
            transform: translateY(0) scale(1);
            transition:
                transform .24s cubic-bezier(.2,.8,.2,1),
                box-shadow .24s ease,
                background .24s ease,
                border-color .24s ease,
                color .24s ease;
        }

        .donate-cta::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.70) 42%, transparent 78%);
            transform: translateX(-120%);
            transition: transform .5s ease;
            pointer-events: none;
        }

        .donate-cta:hover {
            transform: translateY(-3px) scale(1.025);
            background: rgba(255, 255, 255, 0.34);
            border-color: rgba(0, 134, 0, 0.26);
            color: var(--rebox-green);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.78),
                0 18px 38px rgba(0, 134, 0, 0.16);
        }

        .donate-cta:focus,
        .donate-cta:visited {
            color: var(--rebox-green);
        }

        .donate-cta:hover::before {
            transform: translateX(120%);
        }

        .donate-cta:active,
        .donate-cta.is-pressing {
            transform: translateY(0) scale(.97);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.70),
                0 9px 18px rgba(0, 134, 0, 0.12);
        }

        .category-strip {
            display: grid;
            grid-template-columns: repeat(4, 150px);
            justify-content: center;
            gap: 36px;
            margin-bottom: 88px;
        }

        .category-item {
            display: grid;
            grid-template-columns: 48px 72px;
            grid-template-rows: 48px auto;
            align-items: center;
            justify-content: center;
            gap: 8px 10px;
        }

        .category-icon {
            width: 48px;
            height: 48px;
            border-radius: 9px;
            background: rgba(217, 217, 217, 0.20);
            display: grid;
            place-items: center;
            color: #3f3f3f;
            font-size: 21px;
            box-shadow:
                inset 0 4px 4px rgba(0, 0, 0, 0.25),
                inset 0 0 16px rgba(255, 255, 255, 0.74),
                0 8px 18px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(10px);
        }

        .category-bar {
            width: 72px;
            height: 24px;
            background: linear-gradient(90deg, var(--rebox-green) 0%, rgba(115, 115, 115, 0) 99%);
        }

        .category-label {
            grid-column: 1 / span 2;
            text-align: center;
            color: #111111;
            font-size: 10px;
            font-weight: 600;
            margin-top: 3px;
        }

        @keyframes menuDrop {
            from {
                opacity: 0;
                transform: translateY(-8px) scale(0.98);
            }
>>>>>>> zunadeafiturv1
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

<<<<<<< HEAD
        @keyframes toastProgress {
            from {
                width: 100%;
            }

            to {
                width: 0%;
            }
        }

        .hero-donation {
            background:
                radial-gradient(circle at top right, rgba(255,255,255,0.16), transparent 30%),
                linear-gradient(135deg, #006b38 0%, #008c45 55%, #006633 100%);
            border-radius: 24px;
            padding: 34px 38px;
            color: #fff;
            box-shadow: 0 16px 35px rgba(0, 77, 54, 0.22);
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .hero-donation::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            right: -80px;
            top: -110px;
            border-radius: 50%;
            background: rgba(255,255,255,0.09);
        }

        .hero-donation::after {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            right: 120px;
            bottom: -90px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 620px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.16);
            border: 1px solid rgba(255,255,255,0.18);
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .hero-donation h1 {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 12px;
            letter-spacing: -0.4px;
        }

        .hero-donation p {
            font-size: 15px;
            line-height: 1.7;
            color: rgba(255,255,255,0.82);
            margin-bottom: 26px;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-hero-primary,
        .btn-hero-secondary {
            border-radius: 12px;
            padding: 12px 24px;
            font-size: 13px;
            font-weight: 800;
            text-decoration: none;
            transition: 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 9px;
        }

        .btn-hero-primary {
            background: #fff;
            color: var(--green-main);
            box-shadow: 0 8px 18px rgba(0,0,0,0.12);
        }

        .btn-hero-primary:hover {
            color: var(--green-main);
            transform: translateY(-2px);
        }

        .btn-hero-secondary {
            background: rgba(255,255,255,0.10);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.18);
        }

        .btn-hero-secondary:hover {
            color: #fff;
            background: rgba(255,255,255,0.18);
            transform: translateY(-2px);
        }

        .section-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 28px 0 16px;
            gap: 14px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 800;
            margin: 0;
            color: #1f2937;
        }

        .section-title i {
            color: #007a3d;
        }

        .receiver-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 10px;
        }

        .receiver-card {
            background: #fff;
            border: 1px solid var(--card-border);
            border-radius: 18px;
            padding: 22px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.04);
            transition: 0.25s ease;
        }

        .receiver-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.08);
        }

        .receiver-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
        }

        .receiver-icon.green {
            background: #e7f8ed;
            color: #008c45;
        }

        .receiver-icon.blue {
            background: #eef4ff;
            color: #2563eb;
        }

        .receiver-icon.orange {
            background: #fff3e7;
            color: #f97316;
        }

        .receiver-card h5 {
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .receiver-card p {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.55;
            margin: 0;
        }

        .view-all-glass {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 18px;
            background: rgba(233, 248, 239, 0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 122, 61, 0.18);
            color: #007a3d !important;
            font-size: 13px;
            font-weight: 800;
            text-decoration: none !important;
            box-shadow:
                0 10px 24px rgba(0, 122, 61, 0.10),
                inset 0 1px 1px rgba(255, 255, 255, 0.45);
            transition: all 0.25s ease;
        }

        .view-all-glass i {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: rgba(0, 122, 61, 0.12);
            color: #007a3d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: all 0.25s ease;
        }

        .view-all-glass:hover {
            color: #004934 !important;
            transform: translateY(-2px);
            box-shadow:
                0 16px 30px rgba(0, 122, 61, 0.16),
                inset 0 1px 1px rgba(255, 255, 255, 0.55);
        }

        .view-all-glass:hover i {
            background: #007a3d;
            color: #ffffff;
            transform: translateX(3px);
        }

        .location-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .location-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(18px);
            border-radius: 22px;
            border: 1px solid rgba(255, 255, 255, 0.75);
            overflow: hidden;
            box-shadow:
                0 10px 26px rgba(15, 23, 42, 0.06),
                inset 0 1px 1px rgba(255, 255, 255, 0.45);
            transition: 0.25s ease;
        }

        .location-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 18px 35px rgba(15, 23, 42, 0.10),
                inset 0 1px 1px rgba(255, 255, 255, 0.55);
        }

        .location-image {
            position: relative;
            height: 142px;
            margin: 12px 12px 0;
            border-radius: 16px;
            overflow: hidden;
            background: #e9f8ef;
        }

        .location-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .rating-pill {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(10px);
            color: #111827;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            box-shadow: 0 5px 14px rgba(0, 0, 0, 0.08);
        }

        .add-circle {
            position: absolute;
            right: 10px;
            bottom: 10px;
            width: 42px;
            height: 42px;
            background: rgba(0, 73, 52, 0.88);
            backdrop-filter: blur(14px);
            color: #ffffff !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 10px 22px rgba(0, 73, 52, 0.28);
            transition: 0.25s ease;
        }

        .add-circle:hover {
            transform: scale(1.08) rotate(8deg);
            background: #007a3d;
        }

        .location-body {
            padding: 15px 16px 18px;
        }

        .location-body h5 {
            font-size: 16px;
            font-weight: 800;
            margin: 0 0 9px;
            color: #1f2937;
        }

        .location-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            color: #6b7280;
        }

        .location-meta span:first-child {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .location-meta i {
            color: #6b7280;
        }

        .distance {
            color: #007a3d !important;
            background: rgba(233, 248, 239, 0.9);
            padding: 5px 10px;
            border-radius: 999px;
            font-weight: 800;
            white-space: nowrap;
        }

        @media(max-width: 1200px) {
            .location-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 768px) {
            .glass-toast {
                left: 16px;
                right: 16px;
                width: auto;
                top: 18px;
            }

            .receiver-grid {
                grid-template-columns: 1fr;
            }

            .section-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .view-all-glass {
                width: 100%;
            }

            .location-grid {
                grid-template-columns: 1fr;
=======
        @keyframes lowerAmbient {
            from {
                transform: translateX(-50%) translateY(0) scale(1);
            }
            to {
                transform: translateX(-50%) translateY(28px) scale(1.02);
            }
        }

        @keyframes handGiveEnter {
            from {
                opacity: 0;
                transform: translateX(-110px) translateY(-18px) rotate(-5deg) scale(.96);
            }
            to {
                opacity: 1;
                transform: translateX(0) translateY(0) rotate(4deg) scale(1);
            }
        }

        @keyframes handReceiveEnter {
            from {
                opacity: 0;
                transform: translateX(120px) translateY(18px) rotate(7deg) scale(.96);
            }
            to {
                opacity: 1;
                transform: translateX(0) translateY(0) rotate(-2deg) scale(1);
            }
        }

        @keyframes handGiveIdle {
            0%, 100% {
                transform: translateY(0) rotate(4deg);
            }
            50% {
                transform: translateY(10px) rotate(2deg);
            }
        }

        @keyframes handReceiveIdle {
            0%, 100% {
                transform: translateY(0) rotate(-2deg);
            }
            50% {
                transform: translateY(-10px) rotate(-.5deg);
            }
        }

        @keyframes numberWindowIn {
            from {
                opacity: 0;
                transform: translateY(22px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .carousel-stage {
            display: grid;
            grid-template-columns: 72px 1fr 72px;
            align-items: center;
            gap: 32px;
            margin-bottom: 54px;
        }

        .carousel-window {
            min-height: 430px;
            width: min(988px, 100%);
            justify-self: center;
            position: relative;
        }

        .carousel-arrow {
            width: 58px;
            height: 58px;
            border: 0;
            border-radius: 50%;
            background: rgba(0, 134, 0, 0.10);
            color: #000000;
            display: grid;
            place-items: center;
            font-size: 31px;
            box-shadow:
                inset 0 0 18px rgba(0, 134, 0, 0.18),
                0 14px 26px rgba(0, 134, 0, 0.10);
            cursor: pointer;
            justify-self: center;
        }

        .carousel-arrow:hover {
            background: rgba(0, 134, 0, 0.16);
        }

        .box-card {
            width: 288px;
            height: 345px;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 7px 16px rgba(0, 0, 0, 0.22);
            overflow: hidden;
            transition: transform 0.42s ease, filter 0.42s ease, opacity 0.42s ease, box-shadow 0.42s ease;
            display: none;
        }

        .box-card.is-prev,
        .box-card.is-current,
        .box-card.is-next {
            display: block;
        }

        .box-card.is-prev,
        .box-card.is-next {
            opacity: 0.72;
            filter: blur(1.1px) saturate(0.9);
            transform: translateY(26px) scale(0.96);
        }

        .box-card.is-current {
            opacity: 1;
            filter: none;
            transform: translateY(-24px) scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.26);
            z-index: 2;
        }

        [data-carousel] .box-card {
            position: absolute;
            top: 50%;
            left: 50%;
            display: block;
            opacity: 0;
            pointer-events: none;
            transform: translate(-50%, -50%) scale(0.92);
            z-index: 0;
        }

        [data-carousel] .box-card.is-prev {
            opacity: 0.72;
            pointer-events: auto;
            transform: translate(-50%, -50%) translateX(-350px) translateY(26px) scale(0.96);
            z-index: 1;
        }

        [data-carousel] .box-card.is-current {
            opacity: 1;
            pointer-events: auto;
            transform: translate(-50%, -50%) translateY(-24px) scale(1.05);
            z-index: 3;
        }

        [data-carousel] .box-card.is-next {
            opacity: 0.72;
            pointer-events: auto;
            transform: translate(-50%, -50%) translateX(350px) translateY(26px) scale(0.96);
            z-index: 1;
        }

        .box-image {
            width: 264px;
            height: 213px;
            margin: 12px auto 0;
            border-radius: 14px 14px 0 0;
            overflow: hidden;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.20);
            position: relative;
            background: #e7f5ea;
        }

        .box-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .box-body {
            padding: 21px 18px 18px;
            position: relative;
        }

        .box-title-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .box-title {
            margin: 0;
            color: #111111;
            font-size: 15px;
            font-weight: 700;
        }

        .rating {
            color: #737373;
            font-size: 12px;
            font-weight: 500;
        }

        .rating i {
            color: #ffc107;
            margin-right: 3px;
        }

        .box-meta {
            margin-top: 14px;
            color: #737373;
            font-size: 11px;
            font-weight: 600;
            line-height: 1.7;
        }

        .box-meta i {
            width: 14px;
            color: #111111;
        }

        .box-add {
            position: absolute;
            right: 15px;
            bottom: 16px;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--rebox-green);
            color: #ffffff;
            text-decoration: none;
            font-size: 24px;
            box-shadow:
                inset 0 5px 9px rgba(255, 255, 255, 0.24),
                inset 0 -8px 12px rgba(0, 72, 0, 0.28),
                0 8px 16px rgba(0, 134, 0, 0.22);
        }

        .rebox-inventory-overlay {
            position: fixed;
            inset: 0;
            z-index: 80;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 32px;
            background: rgba(255, 255, 255, 0.28);
            backdrop-filter: blur(12px);
        }

        .rebox-inventory-overlay.is-open {
            display: flex;
            animation: modalFade 0.24s ease both;
        }

        .inventory-modal {
            width: min(880px, 100%);
            max-height: min(720px, 86vh);
            border-radius: 32px;
            background:
                radial-gradient(circle at 22% 20%, rgba(255, 255, 255, 0.72), transparent 32%),
                linear-gradient(135deg, rgba(215, 244, 216, 0.92), rgba(92, 151, 67, 0.82));
            border: 1px solid rgba(255, 255, 255, 0.55);
            box-shadow: 0 28px 80px rgba(0, 80, 0, 0.26);
            padding: 42px 38px;
            position: relative;
            overflow: hidden;
            animation: modalPop 0.32s ease both;
        }

        .inventory-modal::before {
            content: "";
            position: absolute;
            inset: -120px -80px auto auto;
            width: 340px;
            height: 340px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.22);
            pointer-events: none;
        }

        .inventory-close {
            position: absolute;
            top: 30px;
            left: 30px;
            width: 42px;
            height: 42px;
            border: 0;
            background: rgba(255, 255, 255, 0.22);
            border-radius: 14px;
            color: #0b0b0b;
            font-size: 24px;
            cursor: pointer;
            display: grid;
            place-items: center;
            z-index: 2;
        }

        .inventory-content {
            display: grid;
            grid-template-columns: 310px 1fr;
            gap: 42px;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .inventory-location-card {
            width: 288px;
            height: 345px;
            border-radius: 16px;
            background: #ffffff;
            overflow: hidden;
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.24);
            justify-self: center;
        }

        .inventory-location-card .box-image {
            margin-top: 12px;
        }

        .inventory-location-card .box-body {
            padding: 21px 18px 18px;
        }

        .inventory-list {
            max-height: 500px;
            overflow-y: auto;
            padding: 2px 12px 2px 0;
            display: grid;
            gap: 20px;
            scrollbar-color: rgba(255, 255, 255, 0.78) transparent;
        }

        .inventory-list::-webkit-scrollbar {
            width: 6px;
        }

        .inventory-list::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 999px;
        }

        .inventory-donation-card {
            min-height: 156px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.20);
            padding: 18px;
            display: grid;
            grid-template-columns: 1fr 118px;
            gap: 18px;
        }

        .inventory-donor {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 16px;
        }

        .inventory-donor-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .inventory-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(145deg, #dce4ef, #ffffff);
            display: grid;
            place-items: center;
            color: var(--rebox-green);
            font-weight: 900;
            box-shadow: inset 0 0 0 2px rgba(0, 134, 0, 0.08);
            flex: 0 0 auto;
        }

        .inventory-donor-name {
            color: #111111;
            font-size: 12px;
            font-weight: 800;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .inventory-donor-role,
        .inventory-date {
            color: #5f6368;
            font-size: 10px;
            font-weight: 700;
        }

        .inventory-item-photo {
            width: 100%;
            height: 78px;
            border-radius: 12px;
            overflow: hidden;
            background: #edf6ef;
        }

        .inventory-item-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .inventory-item-info {
            display: grid;
            align-content: center;
            gap: 10px;
            text-align: center;
        }

        .inventory-item-info strong {
            display: block;
            color: #111111;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 2px;
        }

        .inventory-item-info span {
            display: block;
            color: #111111;
            font-size: 11px;
            font-weight: 600;
        }

        @keyframes modalFade {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes modalPop {
            from {
                opacity: 0;
                transform: translateY(18px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .detail-wrap {
            display: flex;
            justify-content: center;
            margin: 4px 0 76px;
        }

        .detail-button {
            min-width: 150px;
            height: 40px;
            border-radius: 18px;
            border: 1.5px solid rgba(0, 134, 0, 0.72);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.92), rgba(234, 248, 236, 0.82));
            color: var(--rebox-green);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            font-size: 15px;
            font-weight: 650;
            text-decoration: none;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.24);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transform: translateY(0) scale(1);
            transition:
                transform .22s cubic-bezier(.2,.8,.2,1),
                color .22s ease,
                background .22s ease,
                border-color .22s ease,
                box-shadow .22s ease;
        }

        .detail-button::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.68) 42%, transparent 78%);
            transform: translateX(-120%);
            transition: transform .45s ease;
            pointer-events: none;
        }

        .detail-button::after {
            content: "\f107";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 12px;
            transition: transform .24s ease;
        }

        .detail-button:hover {
            transform: translateY(-3px) scale(1.03);
            background: linear-gradient(135deg, #ffffff, rgba(218, 245, 222, 0.95));
            border-color: rgba(0, 134, 0, 0.95);
            box-shadow: 0 20px 38px rgba(0, 134, 0, 0.25);
        }

        .detail-button:hover::before {
            transform: translateX(120%);
        }

        .detail-button:active,
        .detail-button.is-pressing {
            transform: translateY(0) scale(.96);
            box-shadow: 0 10px 20px rgba(0, 134, 0, 0.18);
        }

        .detail-button.is-open {
            background: var(--rebox-green);
            color: #ffffff;
            border-color: var(--rebox-green);
            box-shadow: 0 18px 36px rgba(0, 134, 0, 0.24);
        }

        .detail-button.is-open::after {
            transform: rotate(180deg);
        }

        .all-locations {
            display: none;
            width: min(1236px, 100%);
            margin: -30px auto 116px;
            animation: detailFade 0.55s ease both;
        }

        .all-locations.is-open {
            display: block;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(4, 288px);
            gap: 28px;
            justify-content: center;
        }

        .detail-grid .box-card {
            display: block;
            transform: none;
            filter: none;
            opacity: 1;
            width: 288px;
            height: 345px;
            justify-self: center;
            cursor: pointer;
            will-change: transform, box-shadow;
            transition:
                transform .24s cubic-bezier(.2,.8,.2,1),
                box-shadow .24s ease,
                border-color .24s ease,
                background .24s ease;
        }

        .detail-grid .box-card .box-image img {
            transition: transform .32s ease, filter .32s ease;
        }

        .detail-grid .box-card .box-add {
            transition:
                transform .22s cubic-bezier(.2,.8,.2,1),
                box-shadow .22s ease,
                background .22s ease;
        }

        .detail-grid .box-card:hover,
        .detail-grid .box-card:focus-within {
            transform: translateY(-10px) scale(1.025);
            box-shadow:
                0 18px 38px rgba(0, 0, 0, 0.18),
                0 18px 34px rgba(0, 134, 0, 0.14);
        }

        .detail-grid .box-card:hover .box-image img,
        .detail-grid .box-card:focus-within .box-image img {
            transform: scale(1.045);
            filter: saturate(1.06) contrast(1.02);
        }

        .detail-grid .box-card:hover .box-add,
        .detail-grid .box-card:focus-within .box-add {
            transform: translateY(-4px) scale(1.08) rotate(90deg);
            box-shadow:
                inset 0 5px 9px rgba(255, 255, 255, 0.28),
                inset 0 -8px 12px rgba(0, 72, 0, 0.28),
                0 13px 22px rgba(0, 134, 0, 0.30);
        }

        .detail-grid .box-card:active {
            transform: translateY(-5px) scale(0.99);
        }

        .all-locations.is-open .box-card {
            animation: detailCardIn 0.55s ease both;
        }

        .all-locations.is-open .box-card:nth-child(2n) {
            animation-delay: 0.05s;
        }

        .all-locations.is-open .box-card:nth-child(3n) {
            animation-delay: 0.1s;
        }

        .all-locations.is-open .box-card:nth-child(4n) {
            animation-delay: 0.15s;
        }

        @keyframes detailFade {
            from {
                opacity: 0;
                transform: translateY(28px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes detailCardIn {
            from {
                opacity: 0;
                transform: translateY(24px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .donation-total {
            min-height: 240px;
            display: grid;
            grid-template-columns: 1fr 300px;
            align-items: center;
            margin-bottom: 112px;
        }

        .donation-total h2 {
            color: var(--rebox-green);
            font-family: "SF Pro Expanded", var(--sf-pro);
            font-size: 36px;
            font-weight: 600;
            line-height: 1.02;
            margin: 0 0 0 122px;
        }

        .total-number {
            text-align: center;
            min-height: 150px;
            display: grid;
            place-items: center;
            font-size: 96px;
            font-weight: 800;
            line-height: 0.9;
            color: #111111;
        }

        .total-number-window {
            display: grid;
            gap: 8px;
            place-items: center;
            animation: numberWindowIn .48s ease both;
        }

        .total-number-prev,
        .total-number-next {
            color: rgba(17, 17, 17, 0.48);
            font-size: 44px;
            font-weight: 700;
            line-height: 1.1;
        }

        .total-number-current {
            color: #111111;
            font-size: 96px;
            font-weight: 800;
            line-height: .88;
            min-width: 150px;
            display: inline-block;
            font-variant-numeric: tabular-nums;
        }

        .quote-box {
            width: min(700px, 100%);
            min-height: 116px;
            margin: 0 auto 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--rebox-green);
            font-size: 22px;
            font-weight: 600;
            line-height: 1.15;
            padding: 28px 48px;
            border: 1px solid rgba(0, 134, 0, 0.18);
            border-radius: 18px;
            outline: 8px double rgba(0, 134, 0, 0.12);
            background: rgba(255, 255, 255, 0.42);
        }

        .steps-section {
            text-align: center;
            margin-bottom: 118px;
        }

        .steps-section h3 {
            color: var(--rebox-green);
            font-size: 18px;
            font-weight: 800;
            margin: 0 0 62px;
        }

        .steps-grid {
            width: min(650px, 100%);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 110px 1fr;
            grid-template-rows: 72px 88px 72px 88px 72px;
            column-gap: 20px;
            row-gap: 0;
            align-items: center;
            position: relative;
        }

        .step-number {
            width: 72px;
            height: 72px;
            margin: 0 auto;
            border-radius: 15px;
            background: rgba(217, 217, 217, 0.20);
            display: grid;
            place-items: center;
            color: var(--rebox-green);
            font-size: 44px;
            font-weight: 800;
            box-shadow: inset 0 0 16px rgba(255, 255, 255, 0.70);
            position: relative;
            z-index: 1;
        }

        .step-line {
            width: 2px;
            height: 64px;
            justify-self: center;
            align-self: center;
            background: rgba(17, 17, 17, 0.62);
            border-radius: 99px;
        }

        .step-copy {
            color: #737373;
            font-size: 15px;
            line-height: 1.1;
            text-align: left;
        }

        .step-copy strong {
            display: block;
            color: #606060;
            font-size: 17px;
            font-weight: 700;
        }

        .step-copy.left {
            text-align: right;
        }

        .credit-line {
            width: min(590px, 100%);
            margin: 70px auto 0;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #777;
            font-size: 9px;
            font-weight: 600;
        }

        .credit-line::before,
        .credit-line::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(0, 134, 0, 0.36);
        }

        .modern-card {
            width: min(1120px, 100%);
            min-height: 360px;
            margin: 0 auto 160px;
            border-radius: 32px;
            background:
                radial-gradient(circle at 92% 18%, rgba(0, 134, 0, 0.07), transparent 22%),
                rgba(255, 255, 255, 0.64);
            border: 1px solid rgba(0, 134, 0, 0.28);
            box-shadow:
                0 0 32px rgba(0, 134, 0, 0.30),
                0 26px 54px rgba(0, 134, 0, 0.16);
            padding: 86px 78px 82px 100px;
            display: grid;
            grid-template-columns: minmax(360px, 0.9fr) minmax(440px, 1.1fr);
            align-items: center;
            gap: 26px;
            overflow: hidden;
            position: relative;
        }

        .modern-card small {
            color: #a1a1a1;
            font-size: 12px;
            font-weight: 700;
        }

        .modern-card h2 {
            width: min(480px, 100%);
            color: var(--rebox-green);
            font-size: 35px;
            font-weight: 600;
            line-height: 1.02;
            margin: 16px 0 24px;
        }

        .modern-card p {
            width: min(540px, 100%);
            color: #737373;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.45;
            margin: 0;
        }

        .modern-copy {
            position: relative;
            z-index: 1;
        }

        .modern-mockup {
            position: relative;
            z-index: 1;
            width: 100%;
            min-height: 245px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            transform: translateX(32px);
        }

        .modern-mockup::before,
        .modern-mockup::after {
            content: "";
            position: absolute;
            pointer-events: none;
            z-index: 2;
        }

        .modern-mockup::before {
            right: -44px;
            bottom: -20px;
            width: 260px;
            height: 130px;
            background: radial-gradient(ellipse at bottom right, rgba(255, 255, 255, 0.98) 0%, rgba(255, 255, 255, 0.72) 38%, rgba(255, 255, 255, 0) 72%);
            filter: blur(8px);
        }

        .modern-mockup::after {
            right: -22px;
            bottom: -2px;
            width: 360px;
            height: 92px;
            background: linear-gradient(0deg, rgba(255, 255, 255, 0.96) 0%, rgba(255, 255, 255, 0.62) 42%, rgba(255, 255, 255, 0) 100%);
        }

        .modern-mockup img {
            width: min(105%, 586px);
            max-height: 314px;
            object-fit: contain;
            object-position: right center;
            display: block;
        }

        .footer-dashboard {
            text-align: center;
            padding: 0 0 120px;
            position: relative;
        }

        .footer-dashboard::before,
        .footer-dashboard::after {
            content: "";
            position: absolute;
            bottom: -38px;
            width: 270px;
            height: 100px;
            background: var(--rebox-green);
            box-shadow: 0 0 36px rgba(0, 134, 0, 0.52);
            pointer-events: none;
        }

        .footer-dashboard::before {
            left: -54px;
            border-radius: 0 64px 0 0;
        }

        .footer-dashboard::after {
            right: -54px;
            border-radius: 64px 0 0 0;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 64px;
            color: #111111;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 32px;
        }

        .footer-copy {
            width: min(360px, 100%);
            margin: 0 auto 28px;
            color: #a1a1a1;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.25;
        }

        .socials {
            display: flex;
            justify-content: center;
            gap: 34px;
            color: #111111;
            font-size: 18px;
        }

        @media (max-width: 1180px) {
            .dashboard-inner {
                padding: 24px 28px 70px;
            }

            .top-shell {
                grid-template-columns: 1fr;
            }

            .profile-dropdown {
                justify-self: end;
                margin-top: -18px;
            }

            .carousel-stage {
                grid-template-columns: 52px 1fr 52px;
                gap: 12px;
            }

            .carousel-window {
                gap: 26px;
            }

            .detail-grid {
                grid-template-columns: repeat(3, 288px);
            }
        }

        @media (max-width: 940px) {
            .top-nav {
                height: auto;
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
                padding: 18px 22px;
            }

            .hero-section {
                padding-top: 70px;
                min-height: auto;
            }

            .hero-hand {
                display: none;
            }

            .category-strip,
            .carousel-window,
            .detail-grid {
                grid-template-columns: 1fr;
                justify-items: center;
            }

            .box-card.is-prev,
            .box-card.is-next {
                display: none;
            }

            .carousel-stage {
                grid-template-columns: 52px 1fr 52px;
            }

            .donation-total {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 32px;
            }

            .donation-total h2 {
                margin: 0;
            }

            .steps-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
                row-gap: 18px;
            }

            .step-line,
            .steps-grid > div:empty {
                display: none;
            }

            .step-copy,
            .step-copy.left {
                text-align: center;
            }

            .modern-card {
                padding: 60px 30px;
                grid-template-columns: 1fr;
                text-align: center;
            }

            .modern-card h2,
            .modern-card p {
                margin-left: auto;
                margin-right: auto;
            }

            .modern-mockup {
                justify-content: center;
                min-height: 190px;
            }

            .footer-links {
                flex-wrap: wrap;
                gap: 18px 28px;
>>>>>>> zunadeafiturv1
            }
        }
    </style>

<<<<<<< HEAD
    {{-- HERO --}}
    <div class="hero-donation">
        <div class="hero-content">

            <span class="hero-badge">
                <i class="fas fa-leaf"></i>
                Available Now
            </span>

            <h1>
                Halo {{ explode(' ', auth()->user()->name ?? 'User')[0] }},
                Mau Donasi Apa Hari Ini?
            </h1>

            <p>
                Setiap langkah kecilmu memberikan dampak besar bagi lingkungan
                dan mereka yang membutuhkan.
            </p>

            <div class="hero-actions">
                <a href="{{ route('form-donasi', ['name' => 'Rebox BuahBatu']) }}"
                   class="btn-hero-primary"
                   wire:navigate>
                    <i class="fas fa-hand-holding-heart"></i>
                    Donasi Sekarang
                </a>

                <a href="/riwayat"
                   class="btn-hero-secondary"
                   wire:navigate>
                    <i class="fas fa-clock-rotate-left"></i>
                    Lihat Riwayat
                </a>
            </div>

        </div>
    </div>

    {{-- DAFTAR PENERIMA --}}
    <div class="section-row">
        <h3 class="section-title">
            <i class="fas fa-hand-holding-heart"></i>
            Daftar Penerima
        </h3>
    </div>

    <div class="receiver-grid">

        <div class="receiver-card">
            <div class="receiver-icon green">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h5>Komunitas</h5>
                <p>Berbagi komunitas lokal yang membutuhkan dukungan operasional.</p>
            </div>
        </div>

        <div class="receiver-card">
            <div class="receiver-icon blue">
                <i class="fas fa-child"></i>
            </div>
            <div>
                <h5>Panti Asuhan</h5>
                <p>Membantu pemenuhan kebutuhan dasar dan pendidikan anak yatim.</p>
            </div>
        </div>

        <div class="receiver-card">
            <div class="receiver-icon orange">
                <i class="fas fa-person-cane"></i>
            </div>
            <div>
                <h5>Panti Jompo</h5>
                <p>Memberi kenyamanan dan perawatan bagi lansia yang membutuhkan.</p>
            </div>
        </div>

    </div>

    {{-- TERDEKAT --}}
    <div class="section-row">
        <h3 class="section-title">
            <i class="fas fa-location-dot"></i>
            Titik Rebox Terdekat
        </h3>

        <a href="/lokasi-rebox" wire:navigate class="view-all-glass">
            <span>Lihat Semua</span>
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>

    <div class="location-grid">

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.8
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox Cianjur']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox Cianjur</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Cianjur</span>
                    <span class="distance">4 km</span>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1591196131703-9b636d6901d6?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.5
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox BuahBatu']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox BuahBatu</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> BuahBatu</span>
                    <span class="distance">1 km</span>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.9
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox Dago Atas']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox Dago Atas</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Dago</span>
                    <span class="distance">8 km</span>
                </div>
            </div>
        </div>

        <div class="location-card">
            <div class="location-image">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=700&q=80">

                <div class="rating-pill">
                    <i class="fas fa-star text-warning"></i> 4.7
                </div>

                <a href="{{ route('form-donasi', ['name' => 'Rebox Pasteur']) }}"
                    class="add-circle"
                    wire:navigate>
                    <i class="fas fa-plus"></i>
                </a>
            </div>

            <div class="location-body">
                <h5>Rebox Pasteur</h5>
                <div class="location-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Pasteur</span>
                    <span class="distance">12 km</span>
                </div>
            </div>
        </div>

    </div>

    <script>
        function initDashboardToast() {
            const toast = document.querySelector('#successToast');

            if (toast) {
                setTimeout(() => {
                    toast.classList.add('hide-toast');
                }, 4000);

                setTimeout(() => {
                    toast.remove();
                }, 4500);
            }
        }

        document.addEventListener('DOMContentLoaded', initDashboardToast);
        document.addEventListener('livewire:navigated', initDashboardToast);
    </script>
</div>
=======
    @php
        $firstName = explode(' ', auth()->user()->name ?? 'Rhei')[0];
        $avatarUrl = auth()->user()?->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : null;
        $handGive = asset('images/TanganAtasMemberi.png');
        $handReceive = asset('images/TanganBawahMenerima.png');
        $cardImages = [
            asset('images/GambarcardRebox1.png'),
            asset('images/GambarcardRebox2.png'),
            asset('images/GambarcardRebox3.png'),
            asset('images/GambarcardRebox4.png'),
        ];
        $inventoryDonations = [
            ['donor' => 'Zunadea Kusmiandita', 'date' => '12 Okt 2024', 'item' => 'Tas Sekolah', 'amount' => 'Satu', 'image' => $cardImages[0]],
            ['donor' => 'Muh Rheivandy', 'date' => '14 Okt 2024', 'item' => 'Buku Pelajaran', 'amount' => 'Tiga', 'image' => $cardImages[1]],
            ['donor' => 'Aulia Rahman', 'date' => '16 Okt 2024', 'item' => 'Pakaian Anak', 'amount' => 'Dua', 'image' => $cardImages[2]],
        ];
        $locations = \App\Support\ReboxLocations::all();
    @endphp

    <div class="dashboard-inner">
        <header class="top-shell reveal">
            <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Dashboard navigation">
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
                @if(auth()->user()?->role !== 'penerima')
                    <a href="{{ route('form-donasi', ['name' => 'Rebox Dago']) }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
                @endif
                <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
                <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
                <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
            </nav>

            <div class="profile-dropdown" data-profile-dropdown>
                <button class="profile-pill" type="button" aria-label="Buka menu profil" onclick="event.preventDefault(); event.stopImmediatePropagation(); this.closest('[data-profile-dropdown]')?.classList.toggle('is-open');">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ auth()->user()->name }}">
                    @else
                        <span class="profile-avatar-fallback">{{ strtoupper(substr(auth()->user()->name ?? 'R', 0, 1)) }}</span>
                    @endif
                    <span class="profile-caret" aria-hidden="true"></span>
                </button>

                <div class="profile-menu">
                    <form method="POST" action="{{ route('logout') }}" data-dashboard-logout-form>
                        @csrf
                        <button type="submit" data-dashboard-logout>Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <section class="hero-section reveal">
            <img src="{{ $handGive }}" alt="" class="hero-hand hero-hand-give" aria-hidden="true">
            <img src="{{ $handReceive }}" alt="" class="hero-hand hero-hand-receive" aria-hidden="true">
            <p class="welcome-text">Welcome to Rebox</p>
            <h1 class="hero-title">
                Hallo {{ $firstName }}<br>
                @if(auth()->user()?->role === 'penerima')
                    Kelola Kebutuhan Anda Hari Ini
                @else
                    Mau Donasi Apa Hari Ini?
                @endif
            </h1>
            <p class="hero-subtitle">
                @if(auth()->user()?->role === 'penerima')
                    Ajukan permintaan barang untuk memenuhi<br>
                    kebutuhan komunitas/panti Anda
                @else
                    Setiap langkah kecilmu memberikan dampak besar<br>
                    bagi mereka yang membutuhkan
                @endif
            </p>
            <a href="{{ auth()->user()?->role === 'penerima' ? route('permintaan') : route('form-donasi', ['name' => 'Rebox Dago']) }}" class="donate-cta" wire:navigate>
                {{ auth()->user()?->role === 'penerima' ? 'Kelola Permintaan' : 'Donasi Sekarang' }}
            </a>
        </section>

        <section class="category-strip reveal" aria-label="Kategori penerima">
            <div class="category-item">
                <div class="category-icon"><i class="fas fa-person-chalkboard"></i></div>
                <div class="category-bar"></div>
                <div class="category-label">Komunitas</div>
            </div>
            <div class="category-item">
                <div class="category-icon"><i class="fas fa-people-roof"></i></div>
                <div class="category-bar"></div>
                <div class="category-label">Panti Asuhan</div>
            </div>
            <div class="category-item">
                <div class="category-icon"><i class="fas fa-people-group"></i></div>
                <div class="category-bar"></div>
                <div class="category-label">Panti Jompo</div>
            </div>
            <div class="category-item">
                <div class="category-icon"><i class="fas fa-wheelchair-move"></i></div>
                <div class="category-bar"></div>
                <div class="category-label">Panti Disabilitas</div>
            </div>
        </section>

        <section class="carousel-stage reveal" aria-label="Titik Rebox">
            <button class="carousel-arrow" type="button" data-carousel-prev aria-label="Sebelumnya">
                <i class="fas fa-arrow-left"></i>
            </button>

            <div class="carousel-window" data-carousel>
                @foreach($locations as $index => $location)
                    <article class="box-card" data-card-index="{{ $index }}" data-card-link="{{ auth()->user()?->role === 'penerima' ? '' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" data-rebox-name="{{ $location['name'] }}" data-rebox-code="{{ $location['code'] }}" data-rebox-image="{{ $location['image'] }}">
                        <div class="box-image">
                            <img src="{{ $location['image'] }}" alt="Rebox {{ $location['name'] }}">
                        </div>
                        <div class="box-body">
                            <div class="box-title-row">
                                <h3 class="box-title">Rebox {{ $location['name'] }}</h3>
                                <span class="rating"><i class="fas fa-star"></i>(4.0)</span>
                            </div>
                            <div class="box-meta">
                                <div><i class="fas fa-location-dot"></i> {{ $location['name'] }}</div>
                                <div>2 Km</div>
                            </div>
                            <a href="{{ auth()->user()?->role === 'penerima' ? '#' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" class="box-add" @if(auth()->user()?->role !== 'penerima') wire:navigate @endif aria-label="{{ auth()->user()?->role === 'penerima' ? 'Lihat Rebox ' . $location['name'] : 'Donasi ke Rebox ' . $location['name'] }}">
                                <i class="fas {{ auth()->user()?->role === 'penerima' ? 'fa-eye' : 'fa-plus' }}"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <button class="carousel-arrow" type="button" data-carousel-next aria-label="Berikutnya">
                <i class="fas fa-arrow-right"></i>
            </button>
        </section>

        <div class="detail-wrap reveal">
            <button type="button" class="detail-button" data-detail-toggle>Lihat Semua</button>
        </div>

        <section class="all-locations" data-detail-panel>
            <div class="detail-grid">
                @foreach($locations as $location)
                    <article class="box-card" data-card-link="{{ auth()->user()?->role === 'penerima' ? '' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" data-rebox-name="{{ $location['name'] }}" data-rebox-code="{{ $location['code'] }}" data-rebox-image="{{ $location['image'] }}">
                        <div class="box-image">
                            <img src="{{ $location['image'] }}" alt="Rebox {{ $location['name'] }}">
                        </div>
                        <div class="box-body">
                            <div class="box-title-row">
                                <h3 class="box-title">Rebox {{ $location['name'] }}</h3>
                                <span class="rating"><i class="fas fa-star"></i>(4.0)</span>
                            </div>
                            <div class="box-meta">
                                <div><i class="fas fa-location-dot"></i> {{ $location['name'] }}</div>
                                <div>2 Km</div>
                            </div>
                            <a href="{{ auth()->user()?->role === 'penerima' ? '#' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" class="box-add" @if(auth()->user()?->role !== 'penerima') wire:navigate @endif aria-label="{{ auth()->user()?->role === 'penerima' ? 'Lihat Rebox ' . $location['name'] : 'Donasi ke Rebox ' . $location['name'] }}">
                                <i class="fas {{ auth()->user()?->role === 'penerima' ? 'fa-eye' : 'fa-plus' }}"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        @if(auth()->user()?->role === 'penerima')
            <div class="rebox-inventory-overlay" data-inventory-modal aria-hidden="true">
                <div class="inventory-modal" role="dialog" aria-modal="true" aria-label="Isi data Rebox">
                    <button type="button" class="inventory-close" data-inventory-close aria-label="Tutup detail Rebox">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="inventory-content">
                        <article class="inventory-location-card">
                            <div class="box-image">
                                <img src="{{ $locations[0]['image'] }}" alt="Rebox" data-inventory-image>
                            </div>
                            <div class="box-body">
                                <div class="box-title-row">
                                    <h3 class="box-title" data-inventory-title>Rebox {{ $locations[0]['name'] }}</h3>
                                    <span class="rating"><i class="fas fa-star"></i>(4.0)</span>
                                </div>
                                <div class="box-meta">
                                    <div><i class="fas fa-location-dot"></i> <span data-inventory-area>{{ $locations[0]['name'] }}</span></div>
                                    <div>2 Km</div>
                                </div>
                                <span class="box-add" aria-hidden="true">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </article>

                        <div class="inventory-list">
                            @foreach($inventoryDonations as $donation)
                                <article class="inventory-donation-card">
                                    <div>
                                        <div class="inventory-donor">
                                            <div class="inventory-donor-profile">
                                                <span class="inventory-avatar">{{ strtoupper(substr($donation['donor'], 0, 1)) }}</span>
                                                <div>
                                                    <div class="inventory-donor-name">{{ $donation['donor'] }}</div>
                                                    <div class="inventory-donor-role">Donatur</div>
                                                </div>
                                            </div>
                                            <span class="inventory-date">{{ $donation['date'] }}</span>
                                        </div>
                                        <div class="inventory-item-photo">
                                            <img src="{{ $donation['image'] }}" alt="{{ $donation['item'] }}">
                                        </div>
                                    </div>

                                    <div class="inventory-item-info">
                                        <div>
                                            <strong>Nama Barang</strong>
                                            <span>{{ $donation['item'] }}</span>
                                        </div>
                                        <div>
                                            <strong>Lokasi Box</strong>
                                            <span data-inventory-card-location>Rebox {{ $locations[0]['name'] }}</span>
                                        </div>
                                        <div>
                                            <strong>Jumlah</strong>
                                            <span>{{ $donation['amount'] }}</span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <section class="donation-total reveal" id="detail">
            <h2>{{ auth()->user()?->role === 'penerima' ? 'Total Menerima' : 'Total Donasi' }}<br>{{ auth()->user()->name ?? 'Muhammad Rheivandy' }}</h2>
            <div class="total-number" data-total-counter="{{ $dashboardTotal ?? 0 }}">
                <div class="total-number-window">
                    <span class="total-number-prev" data-total-prev>0</span>
                    <strong class="total-number-current" data-total-current>0</strong>
                    <span class="total-number-next" data-total-next>1</span>
                </div>
            </div>
        </section>

        <section class="quote-box reveal">
            Berbagi tidak pernah mengurangi apa yang<br>
            dimiliki, justru melipat gandakan kebahagiaan hati
        </section>

        <section class="steps-section reveal">
            <h3>Mulai dalam 3 Langkah Mudah</h3>

            <div class="steps-grid">
                <div></div>
                <div class="step-number">01</div>
                <div class="step-copy">
                    <strong>Daftar & Login</strong>
                    Buat akunmu dan masuk ke Rebox dengan mudah
                </div>

                <div></div>
                <div class="step-line"></div>
                <div></div>

                <div class="step-copy left">
                    <strong>Temukan Box Rebox</strong>
                    Cari dan temukan Rebox terdekat dan lakukan donasi
                </div>
                <div class="step-number">02</div>
                <div></div>

                <div></div>
                <div class="step-line"></div>
                <div></div>

                <div></div>
                <div class="step-number">03</div>
                <div class="step-copy">
                    <strong>Kirim dan Salurkan</strong>
                    Lakukan kebaikan dengan menyalurkan donasi ke penerima
                </div>
            </div>

            <div class="credit-line">Rebox By Agile</div>
        </section>

        <section class="modern-card reveal">
            <div class="modern-copy">
                <small>Tampilan Modern</small>
                <h2>Desain Modern untuk Pengalaman Terbaik</h2>
                <p>
                    Antarmuka yang bersih, responsif, dan intuitif membuat aktivitas
                    donasimu lebih menyenangkan.
                </p>
            </div>

            <div class="modern-mockup" aria-hidden="true">
                <img src="{{ asset('images/MockupRebox.png') }}" alt="">
            </div>
        </section>

        <footer class="footer-dashboard reveal">
            <div class="footer-links">
                <span>Generality</span>
                <span>Sustainability</span>
                <span>Impact</span>
                <span>Transparency</span>
                <span>Community</span>
            </div>
            <p class="footer-copy">
                Give more, waste less, and connect through kindness. Because the greatest value of a pre-loved item is not in its storage, but in the new story it creates for someone in need
            </p>
            <div class="socials">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </footer>
    </div>

    <script>
        function initReboxDashboard() {
            const root = document.querySelector('.rebox-dashboard-page');
            if (!root || root.dataset.ready === 'true') {
                return;
            }

            root.dataset.ready = 'true';

            const profileDropdown = root.querySelector('[data-profile-dropdown]');
            const profileButton = profileDropdown?.querySelector('.profile-pill');
            const logoutButton = profileDropdown?.querySelector('[data-dashboard-logout]');

            profileButton?.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                profileDropdown.classList.toggle('is-open');
            });

            logoutButton?.addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();
                logoutButton.closest('form')?.submit();
            });

            document.addEventListener('click', (event) => {
                if (profileDropdown && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.remove('is-open');
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    profileDropdown?.classList.remove('is-open');
                    closeInventoryModal();
                }
            });

            const cards = Array.from(root.querySelectorAll('[data-carousel] .box-card'));
            const prevButton = root.querySelector('[data-carousel-prev]');
            const nextButton = root.querySelector('[data-carousel-next]');
            let currentIndex = 1;

            function renderCarousel() {
                if (!cards.length) {
                    return;
                }

                const total = cards.length;
                const prevIndex = (currentIndex - 1 + total) % total;
                const nextIndex = (currentIndex + 1) % total;

                cards.forEach((card, index) => {
                    card.classList.remove('is-prev', 'is-current', 'is-next');
                    if (index === prevIndex) card.classList.add('is-prev');
                    if (index === currentIndex) card.classList.add('is-current');
                    if (index === nextIndex) card.classList.add('is-next');
                });
            }

            prevButton?.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + cards.length) % cards.length;
                renderCarousel();
            });

            nextButton?.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % cards.length;
                renderCarousel();
            });

            renderCarousel();

            const totalCounter = root.querySelector('[data-total-counter]');
            function animateTotalCounter() {
                if (!totalCounter || totalCounter.dataset.counted === 'true') {
                    return;
                }

                totalCounter.dataset.counted = 'true';
                const target = Math.max(0, Number(totalCounter.dataset.totalCounter || 0));
                const currentEl = totalCounter.querySelector('[data-total-current]');
                const prevEl = totalCounter.querySelector('[data-total-prev]');
                const nextEl = totalCounter.querySelector('[data-total-next]');
                const duration = 1100;
                const start = performance.now();

                function renderFrame(now) {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const value = Math.round(eased * target);

                    if (currentEl) currentEl.textContent = value;
                    if (prevEl) prevEl.textContent = Math.max(0, value - 1);
                    if (nextEl) nextEl.textContent = value + 1;

                    if (progress < 1) {
                        requestAnimationFrame(renderFrame);
                    }
                }

                requestAnimationFrame(renderFrame);
            }

            if (totalCounter) {
                const counterObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateTotalCounter();
                            counterObserver.disconnect();
                        }
                    });
                }, { threshold: 0.35 });

                counterObserver.observe(totalCounter);
            }

            const isRecipient = @json(auth()->user()?->role === 'penerima');
            const inventoryModal = root.querySelector('[data-inventory-modal]');
            const inventoryClose = root.querySelector('[data-inventory-close]');
            const inventoryImage = root.querySelector('[data-inventory-image]');
            const inventoryTitle = root.querySelector('[data-inventory-title]');
            const inventoryArea = root.querySelector('[data-inventory-area]');
            const inventoryCardLocations = Array.from(root.querySelectorAll('[data-inventory-card-location]'));

            function openInventoryModal(card) {
                if (!inventoryModal || !card) {
                    return;
                }

                const reboxName = card.dataset.reboxName || 'Dago';
                const reboxImage = card.dataset.reboxImage || '';

                if (inventoryImage && reboxImage) {
                    inventoryImage.src = reboxImage;
                    inventoryImage.alt = `Rebox ${reboxName}`;
                }

                if (inventoryTitle) {
                    inventoryTitle.textContent = `Rebox ${reboxName}`;
                }

                if (inventoryArea) {
                    inventoryArea.textContent = reboxName;
                }

                inventoryCardLocations.forEach((item) => {
                    item.textContent = `Rebox ${reboxName}`;
                });

                inventoryModal.classList.add('is-open');
                inventoryModal.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            }

            function closeInventoryModal() {
                if (!inventoryModal) {
                    return;
                }

                inventoryModal.classList.remove('is-open');
                inventoryModal.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }

            inventoryClose?.addEventListener('click', closeInventoryModal);
            inventoryModal?.addEventListener('click', (event) => {
                if (event.target === inventoryModal) {
                    closeInventoryModal();
                }
            });

            root.querySelectorAll('[data-card-link]').forEach((card) => {
                const viewButton = card.querySelector('.box-add');

                viewButton?.addEventListener('click', (event) => {
                    if (!isRecipient) {
                        return;
                    }

                    event.preventDefault();
                    event.stopPropagation();
                    openInventoryModal(card);
                });

                card.addEventListener('click', (event) => {
                    if (event.target.closest('a, button')) {
                        return;
                    }

                    if (isRecipient) {
                        openInventoryModal(card);
                        return;
                    }

                    window.location.href = card.dataset.cardLink;
                });

                card.addEventListener('dblclick', (event) => {
                    if (!isRecipient) {
                        return;
                    }

                    event.preventDefault();
                    openInventoryModal(card);
                });
            });

            const detailToggle = root.querySelector('[data-detail-toggle]');
            const detailPanel = root.querySelector('[data-detail-panel]');

            root.querySelectorAll('.donate-cta').forEach((cta) => {
                if (cta.dataset.pressBound === 'true') {
                    return;
                }

                cta.dataset.pressBound = 'true';

                cta.addEventListener('click', () => {
                    cta.classList.add('is-pressing');
                    window.setTimeout(() => cta.classList.remove('is-pressing'), 180);
                });
            });

            detailToggle?.addEventListener('click', () => {
                detailToggle.classList.add('is-pressing');
                window.setTimeout(() => detailToggle.classList.remove('is-pressing'), 180);

                const isOpen = detailPanel.classList.toggle('is-open');
                detailToggle.classList.toggle('is-open', isOpen);
                detailToggle.textContent = isOpen ? 'Tutup Detail' : 'Lihat Semua';

                if (isOpen) {
                    detailPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });

            const reveals = Array.from(root.querySelectorAll('.reveal'));
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.16 });

            reveals.forEach((item, index) => {
                item.style.transitionDelay = `${Math.min(index * 60, 300)}ms`;
                observer.observe(item);
            });
        }

        document.addEventListener('DOMContentLoaded', initReboxDashboard);
        document.addEventListener('livewire:navigated', initReboxDashboard);
    </script>
</div>
>>>>>>> zunadeafiturv1
