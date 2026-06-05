<div class="request-page {{ auth()->user()?->role === 'penerima' ? 'is-recipient-page' : '' }}">
    @php
        $user = auth()->user();
        $displayName = $user->name ?? $user->username ?? 'Rhei';
        $initial = strtoupper(substr($displayName, 0, 1));
        $activeRequest = $selectedRequest ?: ($requests[0] ?? null);
    @endphp

    <style>
        .request-page {
            min-height: 100vh;
            overflow-x: hidden;
            padding: 26px 54px 72px;
            color: #101010;
            font-family: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 10% 18%, rgba(0, 134, 0, .12), transparent 25%),
                radial-gradient(circle at 92% 12%, rgba(0, 134, 0, .11), transparent 24%),
                linear-gradient(115deg, #ffffff 0%, #fbfdfb 46%, #eef9ef 100%);
        }

        .request-page:not(.is-recipient-page) {
            background:
                radial-gradient(circle at 6% 28%, rgba(0, 134, 0, .08), transparent 18%),
                radial-gradient(circle at 91% 19%, rgba(0, 134, 0, .09), transparent 22%),
                linear-gradient(180deg, #ffffff 0%, #ffffff 58%, #f6fbf7 100%);
        }

        .request-page.is-recipient-page {
            position: relative;
            isolation: isolate;
            background:
                linear-gradient(115deg, #ffffff 0%, #fbfdfb 50%, #f0faef 100%);
        }

        .request-page.is-recipient-page::before {
            content: "";
            position: absolute;
            right: 0;
            bottom: 0;
            z-index: -1;
            width: min(1120px, 72vw);
            aspect-ratio: 1672 / 941;
            background: url("{{ asset('images/BG_PERMINTAAN_PENERIMA.png') }}") center / contain no-repeat;
            opacity: .92;
            pointer-events: none;
            -webkit-mask-image:
                linear-gradient(to right, transparent 0%, rgba(0, 0, 0, .25) 11%, #000 25%),
                linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, .3) 10%, #000 24%);
            -webkit-mask-composite: source-in;
            mask-image:
                linear-gradient(to right, transparent 0%, rgba(0, 0, 0, .25) 11%, #000 25%),
                linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, .3) 10%, #000 24%);
            mask-composite: intersect;
        }

        .request-page.is-recipient-page::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            z-index: -1;
            width: min(360px, 24vw);
            aspect-ratio: 643 / 929;
            background:
                linear-gradient(to right, rgba(255, 255, 255, .94) 0%, rgba(255, 255, 255, .16) 28%, transparent 58%),
                linear-gradient(to top, rgba(255, 255, 255, .10) 0%, transparent 34%),
                url("{{ asset('images/BG_PERMINTAAN_PENERIMA3.jpg') }}") left bottom / contain no-repeat;
            opacity: .72;
            pointer-events: none;
            -webkit-mask-image:
                linear-gradient(to right, #000 0%, #000 70%, transparent 100%),
                linear-gradient(to bottom, transparent 0%, #000 16%, #000 100%);
            -webkit-mask-composite: source-in;
            mask-image:
                linear-gradient(to right, #000 0%, #000 70%, transparent 100%),
                linear-gradient(to bottom, transparent 0%, #000 16%, #000 100%);
            mask-composite: intersect;
        }

        body {
            background: #fbfffc;
            font-family: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
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

        .top-shell {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1fr 142px;
            align-items: center;
            gap: 42px;
            width: min(100%, 1172px);
            margin: 0 auto 76px;
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
            color: #008600;
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
            background: rgba(255, 255, 255, .96);
            box-shadow: 0 18px 40px rgba(0, 80, 0, 0.14);
            display: none;
            z-index: 10;
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
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .profile-menu a:hover,
        .profile-menu button:hover {
            background: rgba(0, 134, 0, 0.09);
            color: #008600;
        }

        .request-hero {
            max-width: 1040px;
            margin: 0 auto 34px;
            text-align: center;
        }

        .eyebrow {
            color: #008600;
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .request-hero h1 {
            margin: 0;
            color: #008600;
            font-size: 42px;
            font-weight: 750;
            line-height: 1.05;
        }

        .request-hero p {
            max-width: 690px;
            margin: 18px auto 0;
            color: #8b8b8b;
            font-size: 18px;
            font-weight: 650;
            line-height: 1.55;
        }

        .request-shell {
            max-width: 1260px;
            margin: 0 auto;
        }

        .donor-hero {
            width: min(100%, 1390px);
            min-height: 250px;
            margin: 0 auto 30px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 540px;
            align-items: center;
            gap: 34px;
            position: relative;
        }

        .donor-hero-copy {
            text-align: left;
        }

        .donor-hero-copy .eyebrow {
            margin: 0 0 18px;
            color: #008600;
            font-size: 16px;
            font-weight: 600;
        }

        .donor-hero-copy h1 {
            margin: 0;
            color: #262b31;
            font-size: clamp(34px, 3.4vw, 50px);
            font-weight: 620;
            line-height: 1.12;
        }

        .donor-hero-copy h1 span {
            color: #169b36;
        }

        .donor-hero-copy p {
            max-width: 550px;
            margin: 24px 0 0;
            color: #667085;
            font-size: 17px;
            font-weight: 500;
            line-height: 1.65;
        }

        .donor-hero-art {
            height: 244px;
            position: relative;
            opacity: .72;
            pointer-events: none;
        }

        .donor-art-blob {
            position: absolute;
            right: 18px;
            top: 8px;
            width: 340px;
            height: 230px;
            border-radius: 44% 56% 50% 50%;
            background: linear-gradient(145deg, rgba(0, 134, 0, .13), rgba(255, 255, 255, .86));
        }

        .donor-art-box {
            position: absolute;
            right: 150px;
            bottom: 26px;
            width: 164px;
            height: 118px;
            border-radius: 18px;
            background: linear-gradient(150deg, rgba(0, 134, 0, .22), rgba(212, 245, 218, .55));
            box-shadow: 0 24px 52px rgba(0, 134, 0, .12);
        }

        .donor-art-box::before {
            content: "";
            position: absolute;
            left: 28px;
            right: 28px;
            top: -26px;
            height: 36px;
            border-radius: 18px 18px 8px 8px;
            background: rgba(232, 250, 235, .76);
            transform: rotate(-4deg);
        }

        .donor-art-item {
            position: absolute;
            border-radius: 999px;
            background: rgba(255, 255, 255, .86);
            color: #169b36;
            display: grid;
            place-items: center;
            box-shadow: 0 16px 36px rgba(0, 134, 0, .09);
        }

        .donor-art-item.is-heart {
            left: 64px;
            top: 58px;
            width: 56px;
            height: 56px;
            font-size: 22px;
        }

        .donor-art-item.is-hand {
            right: 22px;
            top: 50px;
            width: 62px;
            height: 62px;
            font-size: 23px;
        }

        .donor-art-item.is-bear {
            right: 224px;
            top: 36px;
            width: 72px;
            height: 72px;
            font-size: 30px;
            background: rgba(255, 255, 255, .72);
        }

        .donor-layout {
            width: min(100%, 1420px);
            margin: 0 auto;
            display: grid;
            grid-template-columns: minmax(280px, 320px) minmax(0, 1fr);
            gap: 18px;
            align-items: stretch;
        }

        .donor-filter-panel,
        .donor-list-panel {
            border: 1px solid rgba(20, 32, 43, .06);
            border-radius: 18px;
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 22px 70px rgba(15, 23, 42, .07);
            backdrop-filter: blur(14px);
        }

        .donor-filter-panel {
            padding: 28px 22px;
            height: 100%;
        }

        .donor-panel-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 26px;
        }

        .donor-panel-title h2 {
            margin: 0;
            color: #2b3036;
            font-size: 18px;
            font-weight: 600;
        }

        .donor-filter-icon {
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: rgba(0, 134, 0, .08);
            color: #169b36;
        }

        .donor-search-box {
            height: 48px;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 14px;
            background: #ffffff;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 16px;
            margin-bottom: 28px;
        }

        .donor-search-box i {
            color: #9aa4b2;
            font-size: 15px;
        }

        .donor-search-box input {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: #14202b;
            font-size: 13px;
            font-weight: 500;
        }

        .donor-filter-label {
            margin: 0 0 14px;
            color: #667085;
            font-size: 13px;
            font-weight: 650;
        }

        .donor-category-list {
            display: grid;
            gap: 10px;
        }

        .donor-category-button {
            height: 50px;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 12px;
            background: #ffffff;
            color: #3d4651;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 0 18px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: transform .2s ease, border-color .2s ease, background .2s ease, color .2s ease;
        }

        .donor-category-button i {
            width: 20px;
            color: inherit;
            font-size: 16px;
        }

        .donor-category-button:hover,
        .donor-category-button.is-active {
            border-color: transparent;
            background: rgba(0, 134, 0, .08);
            color: #169b36;
            transform: translateY(-1px);
        }

        .donor-filter-help {
            margin-top: 36px;
            border-radius: 14px;
            background: linear-gradient(145deg, rgba(0, 134, 0, .08), rgba(255, 255, 255, .82));
            padding: 22px;
            color: #4d5966;
            display: grid;
            grid-template-columns: 46px 1fr;
            gap: 14px;
            align-items: center;
        }

        .donor-filter-help-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: rgba(0, 134, 0, .10);
            color: #169b36;
            font-size: 20px;
        }

        .donor-filter-help p {
            margin: 0 0 6px;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.45;
        }

        .donor-filter-help strong {
            color: #169b36;
            font-size: 13px;
            font-weight: 650;
        }

        .donor-list-panel {
            padding: 28px;
            overflow: visible;
            min-width: 0;
        }

        .donor-list-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .donor-list-head h2 {
            margin: 0;
            color: #2b3036;
            font-size: 18px;
            font-weight: 600;
        }

        .donor-count-pill {
            display: inline-flex;
            align-items: center;
            height: 25px;
            margin-left: 12px;
            padding: 0 12px;
            border-radius: 999px;
            background: rgba(0, 134, 0, .10);
            color: #169b36;
            font-size: 12px;
            font-weight: 650;
        }

        .donor-sort-select {
            width: 128px;
            height: 42px;
            border: 1px solid rgba(20, 32, 43, .10);
            border-radius: 999px;
            background: #ffffff;
            color: #667085;
            font-size: 13px;
            font-weight: 600;
            padding: 0 16px;
            outline: 0;
        }

        .donor-request-list {
            display: grid;
            gap: 18px;
        }

        .donor-request-card {
            width: 100%;
            min-height: 136px;
            border: 1px solid rgba(20, 32, 43, .06);
            border-radius: 16px;
            background: rgba(255, 255, 255, .92);
            display: grid;
            grid-template-columns: minmax(250px, 1.02fr) minmax(245px, 1fr) minmax(122px, .42fr) minmax(132px, .42fr);
            gap: 18px;
            align-items: center;
            padding: 24px;
            box-shadow: 0 12px 34px rgba(15, 23, 42, .045);
            cursor: pointer;
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
            overflow: hidden;
        }

        .donor-request-card:hover {
            transform: translateY(-4px);
            border-color: rgba(0, 134, 0, .24);
            background:
                linear-gradient(135deg, rgba(232, 248, 235, .72), rgba(255, 255, 255, .96) 52%),
                rgba(255, 255, 255, .94);
            box-shadow: 0 22px 52px rgba(0, 80, 0, .10);
        }

        .donor-request-card:hover .donor-recipient-avatar,
        .donor-request-card:hover .donor-qty-box {
            transform: translateY(-2px);
        }

        .donor-request-card:hover .donor-detail-button {
            background: #008600;
            box-shadow: 0 18px 36px rgba(0, 134, 0, .24);
        }

        .donor-recipient-block {
            display: grid;
            grid-template-columns: 72px minmax(0, 1fr);
            gap: 16px;
            align-items: center;
            min-width: 0;
        }

        .donor-recipient-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            border: 1px solid rgba(20, 32, 43, .08);
            background: #ffffff;
            display: grid;
            place-items: center;
            color: #d7262d;
            font-size: 28px;
            transition: transform .22s ease, background .22s ease, box-shadow .22s ease;
        }

        .donor-recipient-avatar.is-komunitas { color: #169bdb; }
        .donor-recipient-avatar.is-panti-asuhan { color: #d7262d; }
        .donor-recipient-avatar.is-panti-jompo { color: #8b5cf6; }
        .donor-recipient-avatar.is-panti-disabilitas { color: #6d3ccf; }

        .donor-recipient-block h3 {
            margin: 0 0 10px;
            color: #14202b;
            font-size: 17px;
            font-weight: 650;
            line-height: 1.2;
            overflow-wrap: anywhere;
        }

        .donor-location {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 12px;
            max-width: 100%;
        }

        .donor-status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            height: 24px;
            padding: 0 10px;
            border-radius: 999px;
            background: rgba(0, 134, 0, .09);
            color: #169b36;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .donor-need-block {
            border-left: 1px solid rgba(20, 32, 43, .08);
            padding-left: 22px;
            min-width: 0;
        }

        .donor-need-block span {
            display: block;
            color: #667085;
            font-size: 12px;
            font-weight: 550;
            margin-bottom: 9px;
        }

        .donor-need-block h3 {
            margin: 0 0 12px;
            color: #14202b;
            font-size: 17px;
            font-weight: 650;
            line-height: 1.2;
            overflow-wrap: anywhere;
        }

        .donor-need-block p {
            margin: 0;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.55;
            overflow-wrap: anywhere;
        }

        .donor-qty-box {
            min-height: 88px;
            min-width: 0;
            border-radius: 12px;
            background: linear-gradient(145deg, rgba(0, 134, 0, .05), rgba(255, 255, 255, .9));
            display: grid;
            place-items: center;
            text-align: center;
            color: #169b36;
            padding: 14px;
            transition: transform .22s ease, background .22s ease;
        }

        .donor-qty-box i {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .donor-qty-box strong {
            display: block;
            color: #169b36;
            font-size: 14px;
            font-weight: 700;
        }

        .donor-qty-box span {
            color: #667085;
            font-size: 12px;
            font-weight: 500;
        }

        .donor-card-actions {
            border-left: 1px solid rgba(20, 32, 43, .08);
            padding-left: 18px;
            display: grid;
            gap: 16px;
            justify-items: center;
            min-width: 0;
        }

        .donor-detail-button {
            width: min(126px, 100%);
            height: 44px;
            border: 0;
            border-radius: 12px;
            background: #18a83a;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 14px 28px rgba(0, 134, 0, .16);
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .donor-detail-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(0, 134, 0, .22);
        }

        .donor-time {
            color: #667085;
            font-size: 12px;
            font-weight: 500;
        }

        .donor-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 13px;
            margin-top: 24px;
        }

        .donor-pagination button,
        .donor-pagination span {
            width: 38px;
            height: 38px;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 50%;
            background: rgba(255, 255, 255, .88);
            color: #667085;
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .04);
            cursor: pointer;
            transition: transform .2s ease, border-color .2s ease, background .2s ease, color .2s ease, box-shadow .2s ease;
        }

        .donor-pagination button:hover,
        .donor-pagination span:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 134, 0, .22);
            color: #008600;
            box-shadow: 0 14px 30px rgba(0, 80, 0, .10);
        }

        .donor-pagination .is-active {
            border-color: rgba(0, 134, 0, .18);
            background: rgba(0, 134, 0, .68);
            color: #ffffff;
            box-shadow: 0 16px 32px rgba(0, 134, 0, .18);
            transform: translateY(-2px);
        }

        .donor-pagination .is-active:hover {
            color: #ffffff;
            background: #008600;
        }

        .recipient-layout {
            position: relative;
            z-index: 1;
            isolation: isolate;
            width: min(100%, 1430px);
            min-height: calc(100vh - 170px);
            margin: -34px auto 0;
            display: grid;
            grid-template-columns: minmax(500px, 660px) minmax(420px, 1fr);
            align-items: center;
            gap: 80px;
        }

        .recipient-request-shell {
            position: relative;
            width: 100%;
            margin: 0;
        }

        .recipient-form-card {
            width: 100%;
            padding: 38px;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background:
                linear-gradient(145deg, rgba(255, 255, 255, .64), rgba(212, 245, 218, .38)),
                linear-gradient(320deg, rgba(0, 134, 0, .11), rgba(255, 255, 255, .22) 48%, rgba(139, 209, 125, .14)),
                rgba(232, 250, 235, .34);
            border: 1px solid rgba(0, 134, 0, .22);
            backdrop-filter: blur(22px) saturate(1.18);
            -webkit-backdrop-filter: blur(22px) saturate(1.18);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .78),
                inset 0 -1px 0 rgba(0, 134, 0, .06),
                0 28px 70px rgba(34, 71, 41, .13);
            transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease, background .28s ease;
        }

        .recipient-form-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(115deg, transparent 0%, rgba(255, 255, 255, .46) 34%, transparent 58%),
                radial-gradient(circle at 18% 12%, rgba(255, 255, 255, .34), transparent 28%);
            opacity: .28;
            transform: translateX(-28%);
            transition: opacity .3s ease, transform .55s ease;
            pointer-events: none;
        }

        .recipient-form-card::after {
            content: "";
            position: absolute;
            inset: 1px;
            border-radius: 19px;
            border: 1px solid rgba(255, 255, 255, .48);
            pointer-events: none;
        }

        .recipient-form-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 134, 0, .32);
            background:
                linear-gradient(145deg, rgba(255, 255, 255, .68), rgba(202, 244, 210, .44)),
                linear-gradient(320deg, rgba(0, 134, 0, .14), rgba(255, 255, 255, .24) 48%, rgba(139, 209, 125, .18)),
                rgba(232, 250, 235, .38);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .82),
                inset 0 -1px 0 rgba(0, 134, 0, .08),
                0 34px 86px rgba(34, 71, 41, .18);
        }

        .recipient-form-card:hover::before {
            opacity: .48;
            transform: translateX(18%);
        }

        .recipient-card-heading {
            display: grid;
            grid-template-columns: 76px minmax(0, 1fr);
            gap: 22px;
            align-items: center;
            padding-bottom: 28px;
            margin-bottom: 28px;
            border-bottom: 1px solid rgba(16, 24, 40, .10);
            position: relative;
            z-index: 1;
        }

        .recipient-card-icon {
            width: 76px;
            height: 76px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #e8f5e9;
            color: #10952c;
            font-size: 28px;
        }

        .recipient-card-heading h2 {
            margin: 0 0 8px;
            color: #111827;
            font-size: 22px;
            font-weight: 700;
            line-height: 1.15;
        }

        .recipient-card-heading p {
            margin: 0;
            max-width: 420px;
            color: #667085;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.55;
        }

        .recipient-copy {
            max-width: 620px;
            align-self: center;
            padding-top: 0;
            margin-left: auto;
            text-align: right;
        }

        .recipient-copy-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 26px;
            padding: 10px 16px;
            border-radius: 10px;
            background: rgba(29, 151, 47, .13);
            color: #15922d;
            font-size: 15px;
            font-weight: 700;
        }

        .recipient-copy h1 {
            margin: -14px 0 0;
            color: #008600;
            font-size: clamp(32px, 2.75vw, 44px);
            font-weight: 650;
            line-height: 1.13;
        }

        .recipient-copy h1 span {
            color: #008600;
        }

        .recipient-copy p {
            margin: 24px 0 0;
            margin-left: auto;
            max-width: 540px;
            color: #667085;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.65;
        }

        .recipient-form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            position: relative;
            z-index: 1;
        }

        .recipient-form-card form {
            position: relative;
            z-index: 1;
        }

        .input-box textarea {
            resize: none;
            height: 100%;
            padding: 20px 0;
            line-height: 1.45;
        }

        .textarea-box {
            height: 124px;
            align-items: flex-start;
        }

        .is-recipient-page .recipient-form-card .textarea-box {
            min-height: 124px;
            height: 124px;
            padding: 0 16px;
        }

        .is-recipient-page .recipient-form-card .textarea-box textarea {
            padding: 18px 0;
            min-height: 86px;
        }

        .recipient-note {
            margin-top: 14px;
            color: #667085;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.45;
        }

        .recipient-inline-note {
            max-width: 330px;
            color: rgba(102, 112, 133, .68);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.45;
        }

        .recipient-inline-note i {
            color: #008600;
            font-size: 13px;
        }

        .confirm-overlay {
            position: fixed;
            inset: 0;
            z-index: 90;
            display: grid;
            place-items: center;
            padding: 24px;
            background: rgba(255, 255, 255, .36);
            backdrop-filter: blur(12px);
            animation: riseIn .22s ease both;
        }

        .confirm-card {
            width: min(430px, 100%);
            padding: 30px;
            text-align: center;
            border-radius: 22px;
            background: rgba(255, 255, 255, .94);
            border: 1px solid rgba(0, 134, 0, .14);
            box-shadow: 0 24px 64px rgba(0, 80, 0, .17);
            font-family: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .confirm-card h3 {
            margin: 0 0 10px;
            color: #111827;
            font-size: 24px;
            font-weight: 650;
            line-height: 1.18;
        }

        .confirm-card p {
            margin: 0 auto 24px;
            max-width: 300px;
            color: rgba(102, 112, 133, .72);
            font-size: 13px;
            font-weight: 500;
            line-height: 1.55;
        }

        .confirm-card .big-icon {
            width: 68px !important;
            height: 68px !important;
            margin-bottom: 16px !important;
            border-radius: 20px;
            font-size: 25px !important;
        }

        .confirm-card .primary-btn,
        .confirm-card .secondary-btn {
            min-height: 46px;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 650;
            padding: 0 24px;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .confirm-card .primary-btn:hover,
        .confirm-card .secondary-btn:hover,
        .recipient-success-card .primary-btn:hover,
        .recipient-success-card .secondary-btn:hover {
            transform: translateY(-2px);
        }

        .confirm-card .primary-btn:active,
        .confirm-card .secondary-btn:active,
        .recipient-success-card .primary-btn:active,
        .recipient-success-card .secondary-btn:active {
            transform: translateY(0) scale(.98);
        }

        .saved-request-card {
            width: min(520px, 100%);
            margin: 26px auto 0;
            padding: 22px;
            text-align: left;
            border-radius: 24px;
            background: #f7fbf8;
            border: 1px solid rgba(0, 134, 0, .14);
        }

        .saved-request-card span {
            display: inline-flex;
            margin-bottom: 12px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #fff6df;
            color: #9a6500;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
        }

        .saved-request-card h3 {
            margin: 0 0 8px;
            color: #101010;
            font-size: 22px;
            font-weight: 850;
        }

        .saved-request-card p {
            margin: 0;
            color: #6b7280;
            font-size: 15px;
            font-weight: 700;
            line-height: 1.55;
        }

        .recipient-success-card {
            width: 100%;
            max-width: none;
            padding: 34px 42px;
            animation: successFlipIn .42s ease both;
            transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease, background .28s ease;
        }

        .recipient-success-card .big-icon {
            width: 62px;
            height: 62px;
            margin-bottom: 16px;
            border-radius: 18px;
            font-size: 24px;
        }

        .recipient-success-card h2 {
            margin-bottom: 10px;
            font-size: 23px;
            font-weight: 500;
            line-height: 1.15;
        }

        .recipient-success-card > p {
            max-width: 430px;
            margin-bottom: 0;
            color: rgba(102, 112, 133, .78);
            font-size: 13px;
            font-weight: 400;
            line-height: 1.55;
        }

        .recipient-success-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 134, 0, .32);
            background:
                linear-gradient(145deg, rgba(255, 255, 255, .68), rgba(202, 244, 210, .44)),
                linear-gradient(320deg, rgba(0, 134, 0, .14), rgba(255, 255, 255, .24) 48%, rgba(139, 209, 125, .18)),
                rgba(232, 250, 235, .38);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .82),
                inset 0 -1px 0 rgba(0, 134, 0, .08),
                0 34px 86px rgba(34, 71, 41, .18);
        }

        .recipient-success-card .saved-request-card {
            width: 100%;
            margin-top: 20px;
            padding: 18px;
            border-radius: 16px;
        }

        .recipient-success-card .saved-request-card span {
            font-size: 11px;
            font-weight: 700;
        }

        .recipient-success-card .saved-request-card h3 {
            font-size: 20px;
            font-weight: 650;
        }

        .recipient-success-card .saved-request-card p {
            font-size: 14px;
            font-weight: 500;
        }

        .recipient-success-card .primary-btn,
        .recipient-success-card .secondary-btn {
            min-height: 46px;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 650;
            padding: 0 24px;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .search-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 76px;
            gap: 18px;
            margin-bottom: 20px;
        }

        .search-box,
        .input-box {
            height: 70px;
            border: 1px solid #dfeee0;
            border-radius: 22px;
            background: rgba(255, 255, 255, .86);
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 0 24px;
            box-shadow: 0 14px 34px rgba(0, 0, 0, .06);
        }

        .is-recipient-page .recipient-form-card .input-box {
            height: 54px;
            border-radius: 8px;
            padding: 0 16px;
            box-shadow: 0 12px 26px rgba(0, 0, 0, .045);
        }

        .is-recipient-page .recipient-form-card .input-box i {
            font-size: 19px;
        }

        .search-box i,
        .input-box i {
            color: #8a95a4;
            font-size: 24px;
        }

        .search-box input,
        .input-box input,
        .input-box select,
        .input-box textarea {
            width: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            color: #101010;
            font: inherit;
            font-size: 18px;
            font-weight: 750;
        }

        .is-recipient-page .recipient-form-card .input-box input,
        .is-recipient-page .recipient-form-card .input-box select,
        .is-recipient-page .recipient-form-card .input-box textarea {
            font-size: 14px;
            font-weight: 500;
        }

        .is-recipient-page .recipient-form-card .input-box input::placeholder,
        .is-recipient-page .recipient-form-card .input-box textarea::placeholder {
            color: rgba(102, 112, 133, .58);
            font-size: 13px;
            font-weight: 500;
        }

        .filter-button {
            border: 0;
            border-radius: 18px;
            background: #ffffff;
            color: #747474;
            font-size: 25px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, .12);
        }

        .chip-row {
            display: flex;
            gap: 18px;
            overflow-x: auto;
            padding: 12px 0 28px;
        }

        .chip-row button {
            min-width: 180px;
            height: 54px;
            border: 1px solid #cfcfcf;
            border-radius: 999px;
            background: #ffffff;
            color: #101010;
            font-size: 17px;
            font-weight: 750;
            transition: .2s ease;
        }

        .chip-row button:hover,
        .chip-row button.is-active {
            border-color: #008600;
            background: #008600;
            color: #ffffff;
            box-shadow: 0 14px 28px rgba(0, 134, 0, .18);
        }

        .request-list {
            display: grid;
            gap: 22px;
        }

        .request-card,
        .glass-card {
            border: 1px solid rgba(0, 134, 0, .14);
            border-radius: 28px;
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 16px 34px rgba(0, 0, 0, .10);
        }

        .request-card {
            padding: 26px;
            display: grid;
            grid-template-columns: 92px minmax(0, 1fr) auto;
            align-items: center;
            gap: 24px;
            cursor: pointer;
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
        }

        .request-card:hover {
            border-color: #008600;
            transform: translateY(-3px);
            box-shadow: 0 22px 38px rgba(0, 0, 0, .12);
        }

        .recipient-logo {
            width: 74px;
            height: 74px;
            border: 2px solid #d5d5d5;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #ffffff;
            color: #bd222a;
            font-size: 32px;
        }

        .request-card h3 {
            margin: 0 0 8px;
            font-size: 22px;
            font-weight: 800;
        }

        .request-card p {
            margin: 0;
            color: #101010;
            font-size: 18px;
            font-weight: 500;
            line-height: 1.45;
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #eef8ef;
            color: #008600;
            font-size: 12px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .primary-btn,
        .secondary-btn,
        .ghost-btn {
            border: 0;
            min-height: 54px;
            border-radius: 18px;
            padding: 0 34px;
            font-size: 17px;
            font-weight: 850;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: .22s ease;
        }

        .primary-btn {
            background: #008600;
            color: #ffffff;
            box-shadow: 0 16px 34px rgba(0, 134, 0, .22);
        }

        .is-recipient-page .recipient-form-card .primary-btn {
            min-height: 48px;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 700;
            padding: 0 30px;
        }

        .primary-btn:hover {
            color: #ffffff;
            transform: translateY(-2px);
        }

        .secondary-btn {
            background: #f2f5f3;
            color: #3f4750;
        }

        .ghost-btn {
            border: 1px solid #badabb;
            background: #ffffff;
            color: #008600;
        }

        .panel {
            padding: 42px;
            animation: riseIn .35s ease both;
        }

        .panel-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 22px;
            margin-bottom: 28px;
        }

        .panel-title h2 {
            margin: 0 0 8px;
            font-size: 34px;
            font-weight: 850;
        }

        .panel-title p {
            margin: 0;
            color: #9a9a9a;
            font-size: 17px;
            font-weight: 700;
            line-height: 1.45;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 310px minmax(0, 1fr);
            gap: 28px;
            align-items: start;
        }

        .detail-summary {
            padding: 28px;
            text-align: center;
        }

        .detail-summary .recipient-logo {
            width: 102px;
            height: 102px;
            margin: 0 auto 18px;
            font-size: 43px;
        }

        .detail-summary h3 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 850;
        }

        .detail-summary p {
            color: #747474;
            font-size: 16px;
            font-weight: 650;
            line-height: 1.45;
        }

        .detail-box {
            padding: 30px;
        }

        .detail-box h3 {
            margin: 0 0 26px;
            font-size: 28px;
            font-weight: 850;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .info-item {
            min-height: 104px;
            border: 1px solid #dfeee0;
            border-radius: 20px;
            padding: 18px 20px;
            background: rgba(250, 252, 250, .9);
        }

        .info-item span {
            display: block;
            color: #777;
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .06em;
            margin-bottom: 9px;
        }

        .info-item strong,
        .info-item p {
            margin: 0;
            color: #111827;
            font-size: 19px;
            font-weight: 800;
            line-height: 1.45;
        }

        .info-item.is-wide {
            grid-column: 1 / -1;
        }

        .location-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.05fr) minmax(360px, .95fr);
            gap: 28px;
            align-items: start;
        }

        .location-list {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            max-height: 650px;
            overflow: auto;
            padding: 4px 6px 4px 0;
        }

        .location-card {
            position: relative;
            border: 1px solid #dfeee0;
            border-radius: 24px;
            overflow: hidden;
            background: #ffffff;
            cursor: pointer;
            box-shadow: 0 12px 28px rgba(0, 0, 0, .05);
            transition: .22s ease;
        }

        .location-card:hover,
        .location-card.is-selected {
            border-color: #008600;
            transform: translateY(-2px);
        }

        .location-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            display: block;
        }

        .distance-pill,
        .code-pill {
            position: absolute;
            z-index: 2;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 900;
        }

        .distance-pill {
            top: 13px;
            left: 13px;
            padding: 8px 13px;
            background: rgba(255, 255, 255, .92);
            color: #008600;
        }

        .code-pill {
            left: 13px;
            top: 122px;
            padding: 8px 14px;
            background: #008600;
            color: #ffffff;
        }

        .location-card-body {
            padding: 18px 18px 22px;
        }

        .location-card h3 {
            margin: 0 0 8px;
            font-size: 21px;
            font-weight: 850;
        }

        .location-card p {
            margin: 0;
            color: #747474;
            font-size: 15px;
            font-weight: 750;
        }

        .plus-badge {
            position: absolute;
            right: 16px;
            top: 132px;
            width: 58px;
            height: 58px;
            border: 7px solid #ffffff;
            border-radius: 50%;
            background: #008600;
            color: #ffffff;
            display: grid;
            place-items: center;
            font-size: 28px;
            box-shadow: inset 0 8px 16px rgba(255, 255, 255, .18), 0 14px 28px rgba(0, 134, 0, .20);
        }

        .inventory-panel {
            padding: 28px;
            position: sticky;
            top: 24px;
        }

        .fulfillment-page {
            width: min(100%, 1420px);
            margin: 0 auto;
            display: grid;
            gap: 18px;
        }

        .fulfillment-top {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 420px;
            gap: 18px;
            align-items: stretch;
        }

        .fulfillment-summary {
            width: 100%;
            padding: 20px 24px;
            border-radius: 16px;
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(20, 32, 43, .08);
            box-shadow: 0 18px 52px rgba(15, 23, 42, .06);
            animation: riseIn .32s ease both;
            transition: transform .24s ease, border-color .24s ease, background .24s ease, box-shadow .24s ease;
        }

        .fulfillment-summary:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 134, 0, .20);
            background:
                linear-gradient(135deg, rgba(232, 248, 235, .62), rgba(255, 255, 255, .96) 54%),
                rgba(255, 255, 255, .94);
            box-shadow: 0 24px 62px rgba(0, 80, 0, .09);
        }

        .fulfillment-summary-main {
            display: grid;
            grid-template-columns: 84px minmax(190px, 1fr) 128px 128px minmax(170px, .78fr);
            gap: 24px;
            align-items: center;
            padding: 0;
        }

        .fulfillment-recipient,
        .fulfillment-need,
        .fulfillment-meta {
            min-width: 0;
        }

        .fulfillment-recipient {
            display: grid;
            grid-template-columns: 82px minmax(0, 1fr);
            gap: 18px;
            align-items: center;
            padding-right: 22px;
            border-right: 1px solid rgba(20, 32, 43, .08);
        }

        .fulfillment-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #ffffff;
            border: 1px solid rgba(20, 32, 43, .10);
            color: #0ea5e9;
            font-size: 25px;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .08);
        }

        .fulfillment-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .fulfillment-label {
            display: block;
            margin-bottom: 6px;
            color: #667085;
            font-size: 12px;
            font-weight: 600;
        }

        .fulfillment-recipient h3,
        .fulfillment-need h3,
        .fulfillment-meta strong {
            margin: 0;
            color: #111827;
            font-size: 17px;
            font-weight: 600;
            line-height: 1.25;
            overflow-wrap: anywhere;
        }

        .fulfillment-need {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0;
            align-items: start;
            padding-right: 24px;
            border-right: 1px solid rgba(20, 32, 43, .08);
        }

        .fulfillment-need-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: #e8f6ea;
            color: #008600;
            font-size: 22px;
        }

        .fulfillment-need p,
        .fulfillment-description p {
            margin: 8px 0 0;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.55;
            overflow-wrap: anywhere;
        }

        .fulfillment-meta {
            min-height: 56px;
            padding-right: 24px;
            border-right: 1px solid rgba(20, 32, 43, .08);
        }

        .fulfillment-date {
            color: #008600 !important;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .fulfillment-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 10px;
            padding: 5px 10px;
            border-radius: 999px;
            background: rgba(0, 134, 0, .10);
            color: #008600;
            font-size: 12px;
            font-weight: 650;
        }

        .fulfillment-description {
            margin-top: 18px;
            padding-top: 16px;
            padding-left: 108px;
            padding-right: 24px;
            border-top: 1px solid rgba(20, 32, 43, .08);
        }

        .fulfillment-description h4 {
            margin: 0;
            color: #667085;
            font-size: 13px;
            font-weight: 600;
        }

        .fulfillment-description p {
            margin-top: 6px;
            font-size: 13px;
            line-height: 1.45;
        }

        .donation-motion-card {
            position: relative;
            overflow: hidden;
            min-height: 142px;
            border-radius: 16px;
            border: 1px solid rgba(0, 134, 0, .10);
            background:
                radial-gradient(circle at 72% 26%, rgba(0, 134, 0, .14), transparent 32%),
                radial-gradient(circle at 24% 72%, rgba(0, 134, 0, .09), transparent 30%),
                linear-gradient(135deg, rgba(255, 255, 255, .88), rgba(234, 249, 237, .74));
            box-shadow: 0 18px 52px rgba(15, 23, 42, .055);
            animation: riseIn .36s ease both;
            transition: transform .24s ease, border-color .24s ease, box-shadow .24s ease;
        }

        .donation-motion-card:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 134, 0, .22);
            box-shadow: 0 24px 62px rgba(0, 80, 0, .10);
        }

        .donation-motion-box,
        .donation-motion-hand,
        .donation-motion-heart,
        .donation-motion-gift {
            position: absolute;
            display: grid;
            place-items: center;
            color: #008600;
            background: rgba(255, 255, 255, .82);
            box-shadow: 0 14px 30px rgba(0, 80, 0, .10);
        }

        .donation-motion-box {
            left: 62px;
            top: 48px;
            width: 64px;
            height: 64px;
            border-radius: 18px;
            font-size: 27px;
            animation: donateBoxFloat 3.4s ease-in-out infinite;
        }

        .donation-motion-hand {
            right: 58px;
            top: 48px;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            font-size: 27px;
            animation: donateHandFloat 3.4s ease-in-out infinite;
        }

        .donation-motion-heart {
            left: 50%;
            top: 18px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            font-size: 18px;
            transform: translateX(-50%);
            animation: donateHeartPulse 2.4s ease-in-out infinite;
        }

        .donation-motion-gift {
            left: 50%;
            bottom: 18px;
            width: 40px;
            height: 40px;
            border-radius: 14px;
            font-size: 17px;
            transform: translateX(-50%);
            animation: donateGiftLift 3.2s ease-in-out infinite;
        }

        .donation-motion-dot {
            position: absolute;
            left: 132px;
            top: 72px;
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #008600;
            opacity: .22;
            animation: donateDotMove 2.4s ease-in-out infinite;
        }

        .donation-motion-spark {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: rgba(0, 134, 0, .35);
            animation: donateSpark 2.8s ease-in-out infinite;
        }

        .donation-motion-spark.is-one {
            left: 34%;
            top: 34px;
        }

        .donation-motion-spark.is-two {
            right: 30%;
            bottom: 38px;
            animation-delay: .6s;
        }

        .fulfillment-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 420px;
            gap: 18px;
            align-items: stretch;
        }

        .fulfillment-locations,
        .fulfillment-inventory,
        .fulfillment-action {
            padding: 24px;
            border-radius: 16px;
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(20, 32, 43, .08);
            box-shadow: 0 18px 52px rgba(15, 23, 42, .055);
            animation: riseIn .36s ease both;
        }

        .fulfillment-locations {
            overflow: hidden;
        }

        .fulfillment-locations,
        .fulfillment-inventory {
            height: 560px;
        }

        .fulfillment-section-title {
            margin: 0 0 20px;
            color: #111827;
            font-size: 22px;
            font-weight: 600;
        }

        .fulfillment-section-title span {
            color: #008600;
        }

        .fulfillment-page .search-box {
            height: 52px;
            margin-bottom: 16px;
            border-radius: 14px;
        }

        .fulfillment-page .search-box i {
            color: #98a2b3;
            font-size: 22px;
        }

        .fulfillment-page .search-box input {
            color: #667085;
            font-size: 15px;
            font-weight: 450;
        }

        .fulfillment-page .location-list {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            max-height: 476px;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 0 8px 16px 0;
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 134, 0, .35) rgba(0, 134, 0, .06);
        }

        .fulfillment-page .location-list::-webkit-scrollbar {
            width: 8px;
        }

        .fulfillment-page .location-list::-webkit-scrollbar-track {
            background: rgba(0, 134, 0, .06);
            border-radius: 999px;
        }

        .fulfillment-page .location-list::-webkit-scrollbar-thumb {
            background: rgba(0, 134, 0, .32);
            border-radius: 999px;
        }

        .fulfillment-page .location-card {
            border-radius: 14px;
        }

        .fulfillment-page .location-card img {
            height: 135px;
        }

        .fulfillment-page .code-pill {
            top: 100px;
            font-size: 11px;
            font-weight: 700;
            padding: 7px 11px;
        }

        .fulfillment-page .distance-pill {
            font-size: 11px;
            font-weight: 700;
            padding: 7px 11px;
        }

        .fulfillment-page .plus-badge {
            top: 108px;
            width: 48px;
            height: 48px;
            border-width: 6px;
            font-size: 22px;
            transition: transform .2s ease, background .2s ease;
        }

        .fulfillment-page .location-card.is-selected .plus-badge {
            background: #008600;
        }

        .fulfillment-page .location-card.is-selected .plus-badge i::before {
            content: "\f00c";
        }

        .fulfillment-page .location-card h3 {
            font-size: 18px;
            font-weight: 600;
        }

        .fulfillment-page .location-card p {
            font-size: 13px;
            font-weight: 450;
        }

        .fulfillment-inventory {
            position: sticky;
            top: 24px;
        }

        .fulfillment-inventory .inventory-list {
            margin-top: 0;
        }

        .fulfillment-inventory .inventory-item {
            border-radius: 14px;
            grid-template-columns: 48px minmax(0, 1fr) 46px;
            padding: 14px;
        }

        .fulfillment-inventory .inventory-item strong {
            font-weight: 600;
        }

        .fulfillment-inventory .inventory-item span,
        .fulfillment-location-info {
            font-weight: 450;
        }

        .inventory-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: #eef5ff;
            color: #2563eb;
            font-size: 18px;
        }

        .inventory-icon i {
            line-height: 1;
        }

        .fulfillment-location-info {
            margin-top: 22px;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 14px;
            background: #fbfdfb;
            padding: 18px;
            display: grid;
            gap: 8px;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
        }

        .fulfillment-location-info strong {
            color: #3d4651;
            font-weight: 600;
        }

        .fulfillment-action {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 18px 24px;
        }

        .fulfillment-safe-note {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #4d5966;
            font-size: 13px;
            font-weight: 450;
        }

        .fulfillment-safe-note i {
            width: 36px;
            height: 36px;
            border-radius: 11px;
            display: grid;
            place-items: center;
            background: #e8f6ea;
            color: #008600;
            font-size: 16px;
        }

        .fulfillment-action .primary-btn,
        .fulfillment-action .secondary-btn {
            min-height: 44px;
            border-radius: 14px;
            padding: 0 24px;
            font-size: 14px;
            font-weight: 650;
        }

        .fulfillment-action .primary-btn {
            min-width: 300px;
            box-shadow: 0 14px 28px rgba(0, 134, 0, .18);
        }

        .fulfillment-action .secondary-btn {
            min-width: 120px;
        }

        .fulfillment-action .primary-btn:hover,
        .fulfillment-action .secondary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px rgba(0, 80, 0, .12);
        }

        .fulfillment-action .primary-btn:active,
        .fulfillment-action .secondary-btn:active {
            transform: translateY(0) scale(.98);
        }

        .inventory-list {
            display: grid;
            gap: 12px;
            margin: 22px 0 28px;
        }

        .inventory-item {
            border: 1px solid #e3eee3;
            border-radius: 18px;
            padding: 16px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 58px;
            gap: 12px;
            align-items: center;
            background: #fbfdfb;
        }

        .inventory-item strong {
            display: block;
            font-size: 17px;
            font-weight: 850;
        }

        .inventory-item span {
            color: #747474;
            font-size: 13px;
            font-weight: 750;
        }

        .qty-badge {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: #eef5ff;
            color: #2563eb;
            font-size: 21px;
            font-weight: 900;
        }

        .code-card,
        .success-card {
            max-width: 720px;
            margin: 0 auto;
            padding: 52px;
            text-align: center;
        }

        .code-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 80;
            display: grid;
            place-items: center;
            padding: 24px;
            background: rgba(255, 255, 255, .34);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            animation: modalFadeIn .22s ease both;
        }

        .code-modal-card {
            width: min(520px, 100%);
            padding: 28px;
            border-radius: 22px;
            text-align: center;
            background: rgba(255, 255, 255, .96);
            border: 1px solid rgba(0, 134, 0, .16);
            box-shadow: 0 30px 80px rgba(0, 80, 0, .18);
            animation: modalPopIn .28s ease both;
        }

        .donor-flow-card {
            width: min(520px, 100%);
            padding: 28px;
            border-radius: 22px;
            text-align: center;
            background:
                linear-gradient(145deg, rgba(255, 255, 255, .96), rgba(247, 253, 248, .9)),
                rgba(255, 255, 255, .94);
            border: 1px solid rgba(0, 134, 0, .16);
            box-shadow: 0 30px 80px rgba(0, 80, 0, .18);
            font-family: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            animation: modalFlipIn .34s ease both;
            transform-style: preserve-3d;
        }

        .donor-flow-card .big-icon {
            width: 62px;
            height: 62px;
            margin-bottom: 14px;
            border-radius: 18px;
            font-size: 24px;
        }

        .donor-flow-card h2 {
            margin: 0 0 9px;
            color: #111827;
            font-size: 23px;
            font-weight: 580;
            line-height: 1.18;
            letter-spacing: 0;
        }

        .donor-flow-card > p,
        .donor-flow-copy {
            margin: 0 auto 18px;
            max-width: 390px;
            color: rgba(102, 112, 133, .78);
            font-size: 13px;
            font-weight: 430;
            line-height: 1.55;
        }

        .donor-flow-card .code-info,
        .donor-flow-summary {
            margin: 16px 0;
            border-radius: 16px;
            padding: 13px 15px;
            background: rgba(249, 251, 252, .84);
            font-size: 13px;
            font-weight: 430;
            line-height: 1.65;
        }

        .donor-flow-card .code-info strong,
        .donor-flow-summary strong {
            font-weight: 580;
        }

        .donor-flow-form {
            display: grid;
            gap: 12px;
            margin-top: 4px;
            text-align: left;
        }

        .donor-flow-form .form-field label {
            margin-bottom: 7px;
            color: rgba(116, 116, 116, .78);
            font-size: 10px;
            font-weight: 560;
            letter-spacing: .055em;
        }

        .donor-flow-form .input-box,
        .donor-flow-form .readonly-box {
            min-height: 46px;
            height: 46px;
            border-radius: 13px;
            padding: 0 15px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .045);
        }

        .donor-flow-form .input-box {
            gap: 12px;
        }

        .donor-flow-form .input-box i {
            color: #8a95a4;
            font-size: 16px;
        }

        .donor-flow-form .input-box input,
        .donor-flow-form .input-box select,
        .donor-flow-form .readonly-box {
            color: #111827;
            font-size: 13px;
            font-weight: 430;
        }

        .donor-flow-form .readonly-box {
            display: flex;
            align-items: center;
            background: rgba(250, 253, 250, .82);
        }

        .donor-flow-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .donor-flow-actions .primary-btn,
        .donor-flow-actions .secondary-btn,
        .donor-flow-actions .ghost-btn {
            min-height: 44px;
            border-radius: 14px;
            padding: 0 24px;
            font-size: 14px;
            font-weight: 620;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease, border-color .2s ease;
        }

        .donor-flow-actions .primary-btn:hover,
        .donor-flow-actions .secondary-btn:hover,
        .donor-flow-actions .ghost-btn:hover {
            transform: translateY(-2px);
        }

        .donor-flow-actions .primary-btn:active,
        .donor-flow-actions .secondary-btn:active,
        .donor-flow-actions .ghost-btn:active {
            transform: translateY(0) scale(.98);
        }

        .donor-flow-card.is-thanks .big-icon {
            background: #e8f5e9;
            color: #008600;
        }

        .donor-flow-card.is-thanks h2 {
            font-size: 24px;
            font-weight: 580;
        }

        .donor-flow-card.is-thanks .notice-yellow {
            padding: 12px 14px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 560;
        }

        .code-modal-card .big-icon {
            width: 68px;
            height: 68px;
            margin-bottom: 16px;
            border-radius: 18px;
            font-size: 26px;
        }

        .code-modal-card h2 {
            margin: 0 0 10px;
            color: #111827;
            font-size: 24px;
            font-weight: 600;
            line-height: 1.2;
        }

        .code-modal-card > p {
            max-width: 390px;
            margin: 0 auto 18px;
            color: rgba(102, 112, 133, .82);
            font-size: 13px;
            font-weight: 450;
            line-height: 1.55;
        }

        .code-modal-card .code-info {
            margin: 18px 0;
            border-radius: 16px;
            padding: 14px 16px;
            font-size: 13px;
            font-weight: 450;
        }

        .code-modal-card .code-info strong {
            font-weight: 600;
        }

        .code-modal-card .input-box {
            min-height: 52px;
            border-radius: 15px;
            padding: 0 16px;
        }

        .code-modal-card .input-box input {
            font-size: 15px;
            font-weight: 500;
        }

        .code-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 14px;
            margin-top: 22px;
            flex-wrap: wrap;
        }

        .code-modal-actions .primary-btn,
        .code-modal-actions .secondary-btn {
            min-height: 46px;
            border-radius: 12px;
            padding: 0 24px;
            font-size: 14px;
            font-weight: 800;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .code-modal-actions .secondary-btn {
            min-width: 96px;
            background: #f5f6f5;
            color: #111827;
            box-shadow: none;
        }

        .code-modal-actions .primary-btn {
            min-width: 176px;
            background: linear-gradient(135deg, #17c43e, #00941e);
            box-shadow: 0 16px 30px rgba(0, 134, 0, .26);
        }

        .code-modal-actions .primary-btn:hover,
        .code-modal-actions .secondary-btn:hover {
            transform: translateY(-2px);
        }

        .code-modal-actions .primary-btn:active,
        .code-modal-actions .secondary-btn:active {
            transform: translateY(0) scale(.98);
        }

        .request-qr-flow {
            width: min(980px, calc(100vw - 80px));
            padding: 0;
            overflow: hidden;
            text-align: left;
            border-radius: 22px;
            border-color: rgba(15, 23, 42, .05);
            background: #ffffff;
            box-shadow: 0 26px 88px rgba(15, 23, 42, .13);
        }

        .request-qr-shell {
            display: grid;
            grid-template-columns: minmax(0, 52.2%) minmax(0, 47.8%);
            min-height: 560px;
        }

        .request-qr-visual {
            padding: 22px 26px;
            background:
                radial-gradient(circle at 72% 74%, rgba(22, 163, 74, .18), transparent 30%),
                radial-gradient(circle at 18% 20%, rgba(34, 197, 94, .18), transparent 31%),
                linear-gradient(145deg, #06150f 0%, #062116 50%, #07381e 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .request-qr-content {
            padding: 24px 32px 24px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background:
                radial-gradient(circle at 10% 50%, rgba(0, 134, 0, .045), transparent 34%),
                radial-gradient(circle at 84% 8%, rgba(15, 23, 42, .045), transparent 28%),
                linear-gradient(180deg, #ffffff 0%, #fbfdfc 100%);
        }

        .request-qr-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #ffffff;
            font-size: 15px;
            font-weight: 650;
        }

        .request-qr-safe {
            margin-left: auto;
            height: 34px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0 13px;
            border-radius: 999px;
            color: #ffffff;
            background: rgba(255, 255, 255, .075);
            border: 1px solid rgba(255, 255, 255, .13);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .09), 0 12px 28px rgba(0, 0, 0, .13);
            font-size: 12px;
            font-weight: 600;
        }

        .request-qr-safe i {
            color: #65f083;
            font-size: 14px;
        }

        .request-qr-brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #15c84b, #008c28);
            color: #ffffff;
            box-shadow: 0 20px 46px rgba(0, 170, 48, .30);
            font-size: 19px;
        }

        .request-qr-content .big-icon {
            width: 50px;
            height: 50px;
            margin: 0 0 16px;
            border-radius: 15px;
            font-size: 20px;
            background: linear-gradient(145deg, #f4fbf6, #ffffff);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .07);
        }

        .request-qr-content h2 {
            text-align: left;
            margin-bottom: 8px;
            color: #111827;
            font-size: 24px;
            font-weight: 650;
        }

        .request-qr-copy {
            max-width: 390px;
            margin: 0 0 16px;
            color: rgba(102, 112, 133, .82);
            font-size: 13px;
            font-weight: 450;
            line-height: 1.6;
        }

        .request-location-card {
            border: 1px solid rgba(15, 23, 42, .10);
            border-radius: 16px;
            padding: 14px;
            background: #ffffff;
            display: grid;
            gap: 12px;
            margin-bottom: 18px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, .07);
        }

        .request-location-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            min-height: 44px;
        }

        .request-location-main > div {
            position: relative;
            min-width: 0;
            min-height: 40px;
            padding-left: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .request-location-main > div::before {
            content: "\f3c5";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: #111827;
            background: linear-gradient(145deg, #eaf9ee, #f8fffa);
            box-shadow: 0 14px 28px rgba(0, 134, 0, .07);
        }

        .request-location-main strong,
        .request-manual-title {
            display: block;
            color: #111827;
            font-size: 14px;
            font-weight: 650;
        }

        .request-location-main span {
            display: block;
            margin-top: 5px;
            color: #667085;
            font-size: 12px;
            font-weight: 450;
        }

        .request-code-pill {
            display: none;
        }

        .request-location-main .request-box-code-pill {
            min-width: 70px;
            max-width: 105px;
            height: 32px;
            margin-top: 0;
            padding: 0 12px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #008600;
            background: #effaf1;
            font-size: 12px;
            font-weight: 650;
            line-height: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex: 0 0 auto;
        }

        .request-location-main .request-box-code-pill::before {
            display: none;
        }

        .request-scan-hint {
            min-height: 42px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 8px;
            border-radius: 10px;
            padding: 10px 13px;
            color: #06701c;
            background: linear-gradient(135deg, #e3f7e6, #edf8ef);
            font-size: 12px;
            font-weight: 600;
            line-height: 1.35;
        }

        .request-scan-hint-text {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .request-qr-box {
            border-radius: 0;
            border: 0;
            overflow: hidden;
            background: transparent;
            box-shadow: none;
            backdrop-filter: blur(14px);
        }

        .request-qr-camera {
            min-height: 330px;
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, .16);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .08);
            background:
                radial-gradient(circle at center, rgba(74, 222, 128, .08), transparent 35%),
                linear-gradient(145deg, #082719, #06341e);
        }

        .request-qr-camera::before {
            content: "Arahkan kamera ke kode QR";
            position: absolute;
            z-index: 5;
            left: 50%;
            top: 22px;
            transform: translateX(-50%);
            min-height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 18px;
            border-radius: 999px;
            color: rgba(255, 255, 255, .90);
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .16);
            box-shadow: 0 16px 42px rgba(0, 0, 0, .16);
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
            pointer-events: none;
        }

        .request-qr-camera video {
            position: absolute;
            inset: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .request-qr-empty {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: grid;
            place-items: center;
            padding: 20px;
            color: #ffffff;
            text-align: center;
            background:
                radial-gradient(circle at center, rgba(0, 0, 0, .18), transparent 28%),
                linear-gradient(135deg, rgba(0, 38, 23, .78), rgba(0, 69, 38, .52));
        }

        .request-qr-empty::before {
            display: none;
        }

        .request-qr-empty.is-hidden {
            display: none;
        }

        .request-qr-empty i {
            position: relative;
            display: grid;
            place-items: center;
            width: 70px;
            height: 62px;
            margin: 0 auto 24px;
            border-radius: 16px;
            background: transparent;
            color: #ffffff;
            font-size: 46px;
            box-shadow: none;
        }

        .request-qr-empty strong {
            display: block;
            font-size: 17px;
            margin-bottom: 10px;
            font-weight: 650;
        }

        .request-qr-empty p {
            margin: 0;
            font-size: 13px;
            font-weight: 450;
        }

        .request-qr-glass-code {
            --qr-glass-size: 156px;
            --qr-scan-distance: calc(var(--qr-glass-size) - 28px);
            position: absolute;
            z-index: 3;
            left: 50%;
            top: 50%;
            width: var(--qr-glass-size);
            aspect-ratio: 1;
            transform: translate(-50%, -50%);
            display: grid;
            place-items: center;
            overflow: hidden;
            border-radius: 22px;
            color: rgba(255, 255, 255, .42);
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .22);
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .20),
                0 18px 44px rgba(0, 0, 0, .18);
            backdrop-filter: blur(8px) saturate(110%);
            -webkit-backdrop-filter: blur(8px) saturate(110%);
            contain: layout paint;
            pointer-events: none;
        }

        .request-qr-camera:not(.is-scanning) .request-qr-glass-code {
            display: none;
        }

        .request-qr-glass-code i {
            font-size: clamp(90px, 78%, 124px);
            opacity: .58;
            filter: drop-shadow(0 2px 8px rgba(255, 255, 255, .14));
        }

        .request-qr-glass-code::after {
            content: "";
            position: absolute;
            left: -18%;
            right: -18%;
            top: 12px;
            height: 2px;
            border-radius: 999px;
            background: linear-gradient(90deg, transparent, rgba(101, 240, 131, .96), transparent);
            box-shadow:
                0 0 12px rgba(101, 240, 131, .78),
                0 0 28px rgba(101, 240, 131, .32);
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            will-change: transform;
            animation: requestQrGlassScan 2.2s ease-in-out infinite alternate;
        }

        .request-qr-glass-code::before {
            content: "";
            position: absolute;
            left: -8%;
            right: -8%;
            top: 0;
            height: 42px;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(101, 240, 131, .18), transparent);
            opacity: .72;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            will-change: transform;
            animation: requestQrGlassScanGlow 2.2s ease-in-out infinite alternate;
        }

        .request-qr-frame {
            position: absolute;
            z-index: 4;
            inset: 54px 28px 22px;
            border: 0;
            border-radius: 10px;
            pointer-events: none;
            box-shadow: none;
        }

        .request-qr-frame::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: inherit;
            background:
                linear-gradient(#5cff74, #5cff74) left top / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) left top / 6px 38px no-repeat,
                linear-gradient(#5cff74, #5cff74) right top / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) right top / 6px 38px no-repeat,
                linear-gradient(#5cff74, #5cff74) left bottom / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) left bottom / 6px 38px no-repeat,
                linear-gradient(#5cff74, #5cff74) right bottom / 38px 6px no-repeat,
                linear-gradient(#5cff74, #5cff74) right bottom / 6px 38px no-repeat;
        }

        .request-qr-frame::after {
            display: none;
        }

        .request-qr-actions {
            display: flex;
            gap: 12px;
            padding: 0;
            margin: 16px 0 0;
            background: transparent;
        }

        .request-qr-actions .primary-btn,
        .request-qr-actions .secondary-btn {
            flex: 1;
            min-width: 128px;
            min-height: 44px;
            border-radius: 13px;
            font-size: 13px;
            font-weight: 600;
        }

        .request-qr-actions .primary-btn {
            background: linear-gradient(135deg, #18cf3c, #00a522);
            box-shadow: 0 18px 38px rgba(0, 134, 0, .32);
        }

        .request-qr-actions .secondary-btn {
            color: rgba(255, 255, 255, .84);
            background: rgba(255, 255, 255, .08);
            border: 1px solid rgba(255, 255, 255, .10);
        }

        .request-qr-status {
            margin: 14px 0 0;
            border-radius: 14px;
            padding: 13px 15px 13px 46px;
            position: relative;
            color: rgba(255, 255, 255, .92);
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .09);
            font-size: 12px;
            font-weight: 550;
            line-height: 1.4;
        }

        .request-qr-status::before {
            content: "\f05a";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #72f087;
            background: transparent;
            font-size: 18px;
        }

        .request-qr-status.is-error {
            color: #dc2626;
        }

        .request-method-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 14px 0 16px;
            color: #667085;
            font-size: 11px;
            font-weight: 650;
            text-transform: uppercase;
        }

        .request-method-divider::before,
        .request-method-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(102, 112, 133, .18);
        }

        .request-manual-card {
            border-radius: 16px;
            padding: 14px;
            background: #ffffff;
            border: 1px solid rgba(20, 32, 43, .08);
            box-shadow: 0 18px 48px rgba(15, 23, 42, .05);
        }

        .request-manual-card .input-box {
            min-height: 48px;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: none;
            border-color: rgba(15, 23, 42, .11);
            padding: 0 13px;
        }

        .request-manual-card .input-box i {
            width: 30px;
            height: 30px;
            border-radius: 11px;
            display: grid;
            place-items: center;
            color: #008600;
            background: #eef9f0;
            font-size: 14px;
        }

        .request-manual-card .input-box input {
            color: #111827;
            font-size: 13px;
            font-weight: 450;
        }

        .request-manual-card .input-box input::placeholder {
            color: #7c8596;
        }

        .request-manual-title {
            margin-bottom: 9px;
        }

        .request-manual-note {
            margin: 2px 0 0;
            color: #667085;
            font-size: 12px;
            font-weight: 450;
            line-height: 1.45;
        }

        @keyframes requestQrLine {
            from { transform: translateY(-44px); }
            to { transform: translateY(116px); }
        }

        @keyframes requestQrGlassScan {
            from { transform: translate3d(0, 0, 0); }
            to { transform: translate3d(0, var(--qr-scan-distance), 0); }
        }

        @keyframes requestQrGlassScanGlow {
            from { transform: translate3d(0, 0, 0); }
            to { transform: translate3d(0, calc(var(--qr-scan-distance) - 20px), 0); }
        }

        .big-icon {
            width: 112px;
            height: 112px;
            margin: 0 auto 24px;
            border-radius: 30px;
            display: grid;
            place-items: center;
            background: #e9f8eb;
            color: #008600;
            font-size: 42px;
        }

        .code-card h2,
        .success-card h2 {
            margin: 0 0 16px;
            font-size: 39px;
            font-weight: 850;
        }

        .code-card p,
        .success-card p {
            margin: 0 auto 28px;
            max-width: 570px;
            color: #6b7280;
            font-size: 19px;
            font-weight: 600;
            line-height: 1.55;
        }

        .success-card.recipient-success-card h2 {
            margin: 0 0 8px;
            color: #111827;
            font-size: 22px;
            font-weight: 600;
            line-height: 1.18;
        }

        .success-card.recipient-success-card > p {
            margin: 0 auto;
            max-width: 360px;
            color: rgba(102, 112, 133, .72);
            font-size: 13px;
            font-weight: 450;
            line-height: 1.5;
        }

        .code-info {
            margin: 22px 0;
            border: 1px solid #dfe5ea;
            border-radius: 20px;
            background: #f9fbfc;
            padding: 18px 20px;
            text-align: left;
            color: #4b5563;
            font-size: 16px;
            font-weight: 700;
            line-height: 1.7;
        }

        .pickup-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .pickup-card {
            width: min(100%, 560px);
            margin: 0 auto;
            padding: 24px;
            border-radius: 20px;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, .92), rgba(244, 251, 245, .78)),
                rgba(255, 255, 255, .9);
            border: 1px solid rgba(0, 134, 0, .12);
            box-shadow: 0 24px 70px rgba(15, 23, 42, .08);
        }

        .pickup-card .panel-header {
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .pickup-card .panel-title h2 {
            color: #111827;
            font-size: 22px;
            font-weight: 520;
            line-height: 1.15;
        }

        .pickup-card .panel-title p {
            color: rgba(102, 112, 133, .74);
            font-size: 13px;
            font-weight: 400;
            line-height: 1.5;
        }

        .pickup-card .ghost-btn {
            min-height: 42px;
            border-radius: 13px;
            padding: 0 22px;
            color: #008600;
            font-size: 14px;
            font-weight: 600;
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
        }

        .pickup-card .ghost-btn:hover {
            background: rgba(0, 134, 0, .07);
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(0, 80, 0, .08);
        }

        .pickup-card .pickup-grid {
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .pickup-card .form-field label {
            margin-bottom: 8px;
            color: rgba(116, 116, 116, .82);
            font-size: 11px;
            font-weight: 560;
            letter-spacing: .06em;
        }

        .pickup-card .input-box,
        .pickup-card .readonly-box {
            min-height: 48px;
            height: 48px;
            border-radius: 13px;
            padding: 0 16px;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .045);
        }

        .pickup-card .input-box {
            gap: 14px;
        }

        .pickup-card .input-box i {
            font-size: 18px;
            color: #8a95a4;
        }

        .pickup-card .input-box input,
        .pickup-card .input-box select,
        .pickup-card .readonly-box {
            color: #111827;
            font-size: 14px;
            font-weight: 450;
        }

        .pickup-card .readonly-box {
            display: flex;
            align-items: center;
            background: rgba(250, 253, 250, .82);
        }

        .pickup-submit-row {
            display: flex;
            justify-content: stretch;
            margin-top: 18px;
        }

        .pickup-card .primary-btn {
            width: 100%;
            min-height: 44px;
            border-radius: 14px;
            padding: 0 26px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 14px 28px rgba(0, 134, 0, .18);
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .pickup-card .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(0, 134, 0, .24);
        }

        .pickup-card .primary-btn:active {
            transform: translateY(0) scale(.98);
        }

        .request-page .pickup-card.panel {
            width: min(100%, 560px);
            padding: 24px;
        }

        .request-page .pickup-card .panel-title h2 {
            font-size: 22px;
            font-weight: 520;
        }

        .request-page .pickup-card .panel-title p,
        .request-page .pickup-card .input-box input,
        .request-page .pickup-card .input-box select,
        .request-page .pickup-card .readonly-box {
            font-weight: 450;
        }

        .form-field {
            text-align: left;
        }

        .form-field label {
            display: block;
            margin-bottom: 10px;
            color: #747474;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .form-field.is-wide {
            grid-column: 1 / -1;
        }

        .readonly-box {
            min-height: 64px;
            border: 1px solid #dfeee0;
            border-radius: 18px;
            background: #f9fbfa;
            padding: 18px 20px;
            color: #4b5563;
            font-size: 18px;
            font-weight: 800;
        }

        .notice-yellow {
            border: 1px solid #ffe08a;
            border-radius: 20px;
            background: #fff7db;
            color: #8a5b00;
            padding: 18px 20px;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.5;
            text-align: left;
        }

        .error-text {
            display: block;
            margin-top: 8px;
            color: #ef1d1d;
            font-size: 13px;
            font-weight: 800;
        }

        @keyframes riseIn {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes successFlipIn {
            from {
                opacity: 0;
                transform: perspective(900px) rotateY(-10deg) translateY(12px) scale(.98);
            }
            to {
                opacity: 1;
                transform: perspective(900px) rotateY(0) translateY(0) scale(1);
            }
        }

        @keyframes formFlipIn {
            from {
                opacity: 0;
                transform: perspective(900px) rotateY(10deg) translateY(12px) scale(.98);
            }
            to {
                opacity: 1;
                transform: perspective(900px) rotateY(0) translateY(0) scale(1);
            }
        }

        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes modalPopIn {
            from {
                opacity: 0;
                transform: translateY(14px) scale(.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes modalFlipIn {
            from {
                opacity: 0;
                transform: perspective(900px) rotateY(-12deg) translateY(12px) scale(.96);
            }
            to {
                opacity: 1;
                transform: perspective(900px) rotateY(0) translateY(0) scale(1);
            }
        }

        @keyframes donateBoxFloat {
            0%, 100% { transform: translate(0, 0) rotate(0); }
            50% { transform: translate(16px, -6px) rotate(-3deg); }
        }

        @keyframes donateHandFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(-14px, 6px) scale(1.04); }
        }

        @keyframes donateHeartPulse {
            0%, 100% { opacity: .76; transform: translateX(-50%) scale(1); }
            50% { opacity: 1; transform: translateX(-50%) scale(1.12); }
        }

        @keyframes donateDotMove {
            0% { opacity: 0; transform: translateX(0) scale(.7); }
            20% { opacity: .28; }
            70% { opacity: .28; }
            100% { opacity: 0; transform: translateX(132px) scale(1); }
        }

        @keyframes donateGiftLift {
            0%, 100% { opacity: .72; transform: translateX(-50%) translateY(0) rotate(0); }
            50% { opacity: 1; transform: translateX(-50%) translateY(-10px) rotate(4deg); }
        }

        @keyframes donateSpark {
            0%, 100% { opacity: .18; transform: translateY(0) scale(.8); }
            50% { opacity: .7; transform: translateY(-8px) scale(1.18); }
        }

        @media (max-width: 1100px) {
            .request-page {
                padding: 22px 20px 54px;
            }

            .top-shell,
            .recipient-layout,
            .donor-hero,
            .donor-layout,
            .detail-grid,
            .location-layout,
            .pickup-grid {
                grid-template-columns: 1fr;
            }

            .recipient-layout {
                min-height: 0;
                margin-top: 0;
                gap: 36px;
            }

            .recipient-copy {
                max-width: 760px;
                padding-top: 0;
            }

            .top-shell {
                gap: 16px;
            }

            .profile-dropdown {
                width: 142px;
                justify-self: end;
            }

            .top-nav {
                overflow-x: auto;
                display: flex;
            }

            .donor-hero-art {
                display: none;
            }

            .donor-request-card {
                grid-template-columns: 1fr;
            }

            .donor-need-block,
            .donor-card-actions {
                border-left: 0;
                padding-left: 0;
            }

            .fulfillment-summary-main,
            .fulfillment-top,
            .fulfillment-grid {
                grid-template-columns: 1fr;
            }

            .fulfillment-summary {
                width: 100%;
            }

            .donation-motion-card {
                min-height: 132px;
            }

            .fulfillment-recipient,
            .fulfillment-need,
            .fulfillment-meta {
                border-right: 0;
                padding-right: 0;
            }

            .fulfillment-description {
                padding-left: 0;
                padding-right: 0;
            }

            .fulfillment-page .location-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .fulfillment-inventory {
                position: static;
            }

            .fulfillment-locations,
            .fulfillment-inventory {
                height: auto;
            }

            .fulfillment-action {
                align-items: stretch;
                flex-direction: column;
            }

            .request-qr-shell {
                grid-template-columns: 1fr;
                max-height: calc(100vh - 48px);
                overflow-y: auto;
            }

            .request-qr-visual,
            .request-qr-content {
                padding: 20px;
            }

            .request-qr-camera {
                min-height: 260px;
                aspect-ratio: 16 / 10;
            }

            .request-qr-glass-code {
                --qr-glass-size: 132px;
            }
        }

        @media (min-width: 1101px) and (max-width: 1380px) {
            .donor-layout {
                grid-template-columns: 280px minmax(0, 1fr);
                gap: 14px;
            }

            .donor-list-panel,
            .donor-filter-panel {
                padding: 22px;
            }

            .donor-request-card {
                grid-template-columns: minmax(220px, 1fr) minmax(220px, 1fr) minmax(118px, .45fr) minmax(118px, .45fr);
                gap: 14px;
                padding: 20px;
            }

            .donor-recipient-avatar {
                width: 64px;
                height: 64px;
                font-size: 24px;
            }

            .donor-recipient-block {
                grid-template-columns: 64px minmax(0, 1fr);
                gap: 14px;
            }
        }

        @media (max-width: 720px) {
            .request-page.is-recipient-page::before {
                right: -220px;
                width: 980px;
            }

            .request-page.is-recipient-page::after {
                width: 210px;
                opacity: .45;
            }

            .recipient-form-card {
                padding: 24px;
            }

            .recipient-card-heading {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .recipient-form-grid {
                grid-template-columns: 1fr;
            }

            .recipient-copy h1 {
                font-size: 38px;
            }

            .request-hero h1 {
                font-size: 34px;
            }

            .request-card {
                grid-template-columns: 74px minmax(0, 1fr);
            }

            .request-card .primary-btn {
                grid-column: 1 / -1;
                width: 100%;
            }

            .location-list,
            .info-grid {
                grid-template-columns: 1fr;
            }

            .fulfillment-page .location-list {
                grid-template-columns: 1fr;
            }

            .fulfillment-summary,
            .fulfillment-locations,
            .fulfillment-inventory,
            .fulfillment-action {
                padding: 22px;
            }

            .fulfillment-action .primary-btn,
            .fulfillment-action .secondary-btn {
                width: 100%;
                justify-content: center;
            }

            .pickup-card {
                padding: 24px;
            }

            .pickup-card .panel-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .panel,
            .code-card,
            .success-card {
                padding: 28px;
            }

            .recipient-success-card {
                padding: 26px;
            }
        }
    </style>

    <div class="top-shell">
        <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Navigasi Rebox">
            <a href="/dashboard" class="{{ request()->is('dashboard*') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
            @if(auth()->user()?->role !== 'penerima')
                <a href="{{ route('form-donasi', ['name' => 'Rebox Dago']) }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
            @endif
            <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
            <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
            <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
        </nav>

        <div class="profile-dropdown" data-profile-dropdown>
            <button class="profile-pill" type="button" aria-label="Buka menu profil" onclick="event.preventDefault(); event.stopImmediatePropagation(); this.closest('[data-profile-dropdown]')?.classList.toggle('is-open');">
                <span class="profile-avatar-fallback">{{ $initial }}</span>
                <span class="profile-caret" aria-hidden="true"></span>
            </button>

            <div class="profile-menu">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    @if(auth()->user()?->role === 'penerima')
        <div class="recipient-layout">
            <main class="recipient-request-shell">
                @if ($step === 'recipient_form')
                    <section class="recipient-form-card glass-card" style="animation: formFlipIn .42s ease both;">
                        <div class="recipient-card-heading">
                            <div class="recipient-card-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div>
                                <h2>Form Pengajuan</h2>
                                <p>Isi detail kebutuhan dengan jelas agar donatur lebih mudah memahami barang yang Anda perlukan.</p>
                            </div>
                        </div>

                        <form wire:submit.prevent="askSubmitRequest">
                            <div class="recipient-form-grid">
                                <div class="form-field is-wide">
                                    <label>Nama Barang</label>
                                    <div class="input-box">
                                        <i class="fas fa-box"></i>
                                        <input type="text" wire:model="request_nama_barang" placeholder="Contoh: Pakaian Muslim, Buku Pelajaran, Selimut">
                                    </div>
                                    @error('request_nama_barang') <span class="error-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-field">
                                    <label>Kategori</label>
                                    <div class="input-box">
                                        <i class="fas fa-layer-group"></i>
                                        <select wire:model="request_kategori">
                                            <option value="">Pilih kategori barang</option>
                                            <option value="Pakaian">Pakaian</option>
                                            <option value="Buku">Buku</option>
                                            <option value="Elektronik">Elektronik</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    @error('request_kategori') <span class="error-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-field">
                                    <label>Jumlah Kebutuhan</label>
                                    <div class="input-box">
                                        <i class="fas fa-list-ol"></i>
                                        <input type="number" wire:model="request_jumlah" min="1" max="1000" placeholder="Masukkan jumlah">
                                    </div>
                                    @error('request_jumlah') <span class="error-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-field is-wide">
                                    <label>Deskripsi Kebutuhan</label>
                                    <div class="input-box textarea-box">
                                        <textarea wire:model="request_deskripsi" placeholder="Jelaskan kebutuhan barang, penerima manfaat, dan alasan barang tersebut dibutuhkan."></textarea>
                                    </div>
                                    @error('request_deskripsi') <span class="error-text">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-field is-wide">
                                    <label>Link Maps Lokasi</label>
                                    <div class="input-box">
                                        <i class="fas fa-location-dot"></i>
                                        <input type="url" wire:model="request_maps_link" placeholder="Tempel link Google Maps lokasi penerima">
                                    </div>
                                    @error('request_maps_link') <span class="error-text">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div style="display:flex;align-items:center;justify-content:space-between;gap:20px;margin-top:28px;flex-wrap:wrap;">
                                <span class="recipient-inline-note">
                                    <i class="fas fa-circle-info"></i>
                                    Permintaan yang dikirim akan masuk ke daftar donatur untuk dipenuhi
                                </span>
                                <button type="submit" class="primary-btn">
                                    Ajukan Permintaan <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </section>
                @endif

                @if ($show_request_confirm)
                    <div class="confirm-overlay">
                        <div class="confirm-card">
                            <div class="big-icon" style="width:84px;height:84px;margin-bottom:18px;font-size:32px;">
                                <i class="fas fa-question"></i>
                            </div>
                            <h3>Ajukan permintaan ini?</h3>
                            <p>Pastikan data barang, kategori, jumlah, dan deskripsi sudah benar sebelum dikirim ke daftar permintaan donatur.</p>
                            <div style="display:flex;justify-content:center;gap:14px;flex-wrap:wrap;">
                                <button type="button" class="secondary-btn" wire:click="cancelSubmitRequest">Tidak</button>
                                <button type="button" class="primary-btn" wire:click="confirmSubmitRequest">Iya</button>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($step === 'recipient_success')
                    <section class="success-card glass-card recipient-success-card">
                        <div class="big-icon"><i class="fas fa-circle-check"></i></div>
                        <h2>Permintaan Terkirim!</h2>
                        <p>
                            Terima kasih telah mengajukan. Permintaan Anda sedang diproses.
                            Mohon tunggu hingga ada donatur yang memenuhi permintaan Anda.
                        </p>

                        <div style="display:flex;justify-content:center;gap:14px;margin-top:24px;flex-wrap:wrap;">
                            <a href="/dashboard" wire:navigate class="primary-btn">Kembali ke Beranda</a>
                            <button type="button" class="secondary-btn" wire:click="createAnotherRequest">Ajukan Lagi</button>
                        </div>
                    </section>
                @endif
            </main>

            <aside class="recipient-copy">
                <h1>Ajukan Permintaan <span>Barang</span> untuk Kebutuhan Anda</h1>
                <p>Ajukan permintaan barang yang komunitas atau panti Anda butuhkan. Permintaan akan tampil di halaman donatur untuk dipenuhi.</p>
            </aside>
        </div>
    @else
        <main class="request-shell">
        @if ($step === 'list')
            <section class="donor-layout">
                <aside class="donor-filter-panel">
                    <div class="donor-panel-title">
                        <h2>Filter Pencarian</h2>
                        <span class="donor-filter-icon"><i class="fas fa-sliders"></i></span>
                    </div>

                    <label class="donor-search-box">
                        <i class="fas fa-search"></i>
                        <input type="search" wire:model.live.debounce.250ms="search" placeholder="Cari penerima, barang, atau lokasi...">
                    </label>

                    <p class="donor-filter-label">Kategori</p>
                    <div class="donor-category-list">
                        @foreach ([
                            ['label' => 'Semua', 'icon' => 'fas fa-grip'],
                            ['label' => 'Komunitas', 'icon' => 'fas fa-people-group'],
                            ['label' => 'Panti Asuhan', 'icon' => 'fas fa-house-chimney'],
                            ['label' => 'Panti Jompo', 'icon' => 'fas fa-person-cane'],
                            ['label' => 'Panti Disabilitas', 'icon' => 'fas fa-wheelchair'],
                        ] as $category)
                            <button type="button" wire:click="setCategory('{{ $category['label'] }}')" class="donor-category-button {{ $category_filter === $category['label'] ? 'is-active' : '' }}">
                                <i class="{{ $category['icon'] }}"></i>
                                {{ $category['label'] === 'Semua' ? 'Semua Kategori' : $category['label'] }}
                            </button>
                        @endforeach
                    </div>

                </aside>

                <section class="donor-list-panel">
                    <div class="donor-list-head">
                        <h2>Daftar Permintaan <span class="donor-count-pill">{{ $totalRequests }} Permintaan</span></h2>
                    </div>

                    <div class="donor-request-list">
                        @forelse ($requests as $item)
                            @php
                                $typeKey = strtolower(str_replace(' ', '-', $item['jenis_penerima']));
                                $typeIcon = match ($item['jenis_penerima']) {
                                    'Komunitas' => 'fas fa-people-group',
                                    'Panti Asuhan' => 'fas fa-hands-holding-child',
                                    'Panti Jompo' => 'fas fa-person-cane',
                                    'Panti Disabilitas' => 'fas fa-wheelchair',
                                    default => 'fas fa-hand-holding-heart',
                                };
                            @endphp
                            <article class="donor-request-card" wire:key="donor-request-{{ $item['id'] }}" wire:click="showDetail({{ $item['id'] }})">
                                <div class="donor-recipient-block">
                                    <div class="donor-recipient-avatar is-{{ $typeKey }}">
                                        <i class="{{ $typeIcon }}"></i>
                                    </div>
                                    <div>
                                        <h3>{{ $item['penerima'] }}</h3>
                                        <span class="donor-status-badge"><i class="fas fa-circle-check"></i> Butuh Bantuan</span>
                                    </div>
                                </div>

                                <div class="donor-need-block">
                                    <span>Kebutuhan Utama</span>
                                    <h3>{{ $item['nama_barang'] }}</h3>
                                    <p>{{ $item['deskripsi'] }}</p>
                                </div>

                                <div class="donor-qty-box">
                                    <div>
                                        <i class="fas fa-cube"></i>
                                        <strong>{{ $item['jumlah'] }} Barang</strong>
                                        <span>Dibutuhkan</span>
                                    </div>
                                </div>

                                <div class="donor-card-actions">
                                    <button type="button" class="donor-detail-button" wire:click.stop="showDetail({{ $item['id'] }})">Lihat Detail</button>
                                    <span class="donor-time">{{ $item['date_label'] ?? ($loop->index === 0 ? '2 jam yang lalu' : ($loop->index === 1 ? '5 jam yang lalu' : '1 hari yang lalu')) }}</span>
                                </div>
                            </article>
                        @empty
                            <div class="glass-card panel" style="text-align:center;">
                                <h2 style="margin:0 0 10px;">Belum ada permintaan yang cocok</h2>
                                <p style="margin:0;color:#747474;font-weight:700;">Coba kata kunci lain atau pilih kategori Semua.</p>
                            </div>
                        @endforelse
                    </div>

                    @if ($totalRequests > 0)
                        <div class="donor-pagination" aria-label="Navigasi halaman permintaan">
                            <button type="button" wire:click="previousRequestPage" aria-label="Halaman sebelumnya"><i class="fas fa-chevron-left"></i></button>
                            @for ($page = 1; $page <= $requestPageCount; $page++)
                                <button
                                    type="button"
                                    wire:click="setRequestPage({{ $page }})"
                                    class="{{ $request_page === $page ? 'is-active' : '' }}"
                                    aria-label="Halaman {{ $page }}"
                                >
                                    {{ $page }}
                                </button>
                            @endfor
                            <button type="button" wire:click="nextRequestPage" aria-label="Halaman berikutnya"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    @endif
                </section>
            </section>
        @endif

        @if ($step === 'detail' && $activeRequest)
            @php
                $requestIcon = match ($activeRequest['kategori_barang'] ?? '') {
                    'Buku' => 'fas fa-book-open',
                    'Elektronik' => 'fas fa-laptop',
                    'Pakaian' => 'fas fa-shirt',
                    default => 'fas fa-box-open',
                };
            @endphp

            <section class="fulfillment-page">
                <div class="fulfillment-top">
                    <section class="fulfillment-summary">
                        <div class="fulfillment-summary-main">
                            <div class="fulfillment-avatar">
                                @if(! empty($activeRequest['penerima_photo']))
                                    <img src="{{ $activeRequest['penerima_photo'] }}" alt="{{ $activeRequest['penerima'] }}">
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                            </div>

                            <div class="fulfillment-need">
                                <div>
                                    <span class="fulfillment-label">Kebutuhan Utama</span>
                                    <h3>{{ $activeRequest['nama_barang'] }}</h3>
                                </div>
                            </div>

                            <div class="fulfillment-meta">
                                <span class="fulfillment-label">Jumlah</span>
                                <strong>{{ $activeRequest['jumlah'] }} Pcs</strong>
                            </div>

                            <div class="fulfillment-meta">
                                <span class="fulfillment-label">Kategori</span>
                                <strong>{{ $activeRequest['kategori_barang'] }}</strong>
                            </div>

                            <div class="fulfillment-meta" style="border-right:0;padding-right:0;">
                                <span class="fulfillment-label">Tujuan Penerima</span>
                                <strong>{{ $activeRequest['penerima'] }}</strong>
                            </div>
                        </div>

                        <div class="fulfillment-description">
                            <h4>Deskripsi Lengkap</h4>
                            <p>{{ $activeRequest['deskripsi'] }}</p>
                        </div>
                    </section>

                    <aside class="donation-motion-card" aria-label="Animasi alur donasi">
                        <span class="donation-motion-box"><i class="fas fa-box-open"></i></span>
                        <span class="donation-motion-dot"></span>
                        <span class="donation-motion-heart"><i class="fas fa-heart"></i></span>
                        <span class="donation-motion-gift"><i class="fas fa-gift"></i></span>
                        <span class="donation-motion-hand"><i class="fas fa-hand-holding-heart"></i></span>
                        <span class="donation-motion-spark is-one"></span>
                        <span class="donation-motion-spark is-two"></span>
                    </aside>
                </div>

                <div class="fulfillment-grid">
                    <section class="fulfillment-locations">
                        <label class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="search" wire:model.live.debounce.250ms="location_search" placeholder="Cari lokasi Rebox...">
                        </label>

                        <div class="location-list">
                            @foreach ($locations as $location)
                                <article
                                    class="location-card {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'is-selected' : '' }}"
                                    wire:key="detail-location-{{ $location['id'] }}"
                                    wire:click="selectLocation('{{ $location['name'] }}')"
                                >
                                    <img src="{{ $location['image'] }}" alt="{{ $location['title'] }}">
                                    <span class="distance-pill"><i class="fas fa-location-dot"></i> {{ $location['distance'] }}</span>
                                    <span class="code-pill"><i class="fas fa-shield-heart"></i> Kode Box {{ $location['code'] }}</span>
                                    <span class="plus-badge"><i class="fas fa-plus"></i></span>
                                    <div class="location-card-body">
                                        <h3>{{ $location['title'] }}</h3>
                                        <p>Area {{ $location['area'] }}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>

                    <aside class="fulfillment-inventory">
                        <div class="inventory-list">
                            @forelse ($inventoryItems as $inventory)
                                @php
                                    $inventoryIcon = match ($inventory['kategori'] ?? '') {
                                        'Buku' => 'fas fa-book-open',
                                        'Elektronik' => 'fas fa-desktop',
                                        'Pakaian' => 'fas fa-shirt',
                                        default => 'fas fa-box-open',
                                    };
                                @endphp
                                <div class="inventory-item" wire:key="detail-inventory-{{ $loop->index }}">
                                    <div class="inventory-icon"><i class="{{ $inventoryIcon }}"></i></div>
                                    <div>
                                        <strong>{{ $inventory['nama_barang'] }}</strong>
                                        <span>{{ $inventory['kategori'] }}</span>
                                    </div>
                                    <div class="qty-badge">{{ $inventory['jumlah'] }}</div>
                                </div>
                            @empty
                                <div class="inventory-item">
                                    <div class="inventory-icon"><i class="fas fa-box-open"></i></div>
                                    <div>
                                        <strong>Belum ada barang</strong>
                                        <span>Stok asli belum tersedia di box ini.</span>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <div class="fulfillment-location-info">
                            <div><i class="fas fa-location-dot"></i> Lokasi: <strong>{{ $selectedLocation['title'] ?? '-' }}</strong></div>
                            <div>Area: <strong>{{ $selectedLocation['area'] ?? '-' }}</strong></div>
                            <div>Kode Box: <strong>{{ $selectedLocation['code'] ?? '-' }}</strong></div>
                        </div>
                    </aside>
                </div>

                <section class="fulfillment-action">
                    <span class="fulfillment-safe-note">
                        <i class="fas fa-shield-heart"></i>
                        Rebox memastikan setiap bantuan tersalurkan dengan amanah dan tepat sasaran.
                    </span>
                    <div style="display:flex;gap:14px;align-items:center;flex-wrap:wrap;justify-content:flex-end;">
                        <button type="button" class="secondary-btn" wire:click="backToList">Kembali</button>
                        <button type="button" class="primary-btn" wire:click="goToCode">
                            <i class="fas fa-briefcase"></i> Penuhi Permintaan Sekarang
                        </button>
                    </div>
                </section>
            </section>
        @endif

        @if ($step === 'location')
            <section class="panel glass-card pickup-card">
                <div class="panel-header">
                    <div class="panel-title">
                        <h2>Pilih Lokasi Rebox</h2>
                        <p>Pilih box terdekat, lalu cek isi barang yang tersedia sebelum membuka box.</p>
                    </div>
                    <button type="button" class="ghost-btn" wire:click="backToDetail">
                        <i class="fas fa-arrow-left"></i> Detail
                    </button>
                </div>

                <div class="location-layout">
                    <section>
                        <label class="search-box" style="margin-bottom:18px;">
                            <i class="fas fa-search"></i>
                            <input type="search" wire:model.live.debounce.250ms="location_search" placeholder="Cari Rebox Dago, Bojongsoang...">
                        </label>

                        <div class="location-list">
                            @foreach ($locations as $location)
                                <article
                                    class="location-card {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'is-selected' : '' }}"
                                    wire:key="location-{{ $location['id'] }}"
                                    wire:click="selectLocation('{{ $location['name'] }}')"
                                >
                                    <img src="{{ $location['image'] }}" alt="{{ $location['title'] }}">
                                    <span class="distance-pill"><i class="fas fa-location-dot"></i> {{ $location['distance'] }}</span>
                                    <span class="code-pill"><i class="fas fa-key"></i> Kode Box ({{ $location['code'] }})</span>
                                    <span class="plus-badge"><i class="fas fa-plus"></i></span>
                                    <div class="location-card-body">
                                        <h3>{{ $location['title'] }}</h3>
                                        <p>Area {{ $location['area'] }}</p>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>

                    <aside class="inventory-panel glass-card">
                        <div class="panel-title">
                            <h2 style="font-size:29px;">Isi {{ $selectedLocation['title'] ?? 'Rebox' }}</h2>
                            <p>Data barang dari donasi yang masuk ke box ini.</p>
                        </div>

                        <div class="inventory-list">
                            @forelse ($inventoryItems as $inventory)
                                <div class="inventory-item" wire:key="inventory-{{ $loop->index }}">
                                    <div>
                                        <strong>{{ $inventory['nama_barang'] }}</strong>
                                        <span>{{ $inventory['kategori'] }}</span>
                                    </div>
                                    <div class="qty-badge">{{ $inventory['jumlah'] }}</div>
                                </div>
                            @empty
                                <div class="inventory-item">
                                    <div>
                                        <strong>Belum ada barang</strong>
                                        <span>Stok asli belum tersedia di box ini.</span>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <div class="code-info" style="margin-bottom:22px;">
                            <div>Lokasi: <strong>{{ $selectedLocation['title'] ?? '-' }}</strong></div>
                            <div>Area: <strong>{{ $selectedLocation['area'] ?? '-' }}</strong></div>
                            <div>Kode box: <strong>{{ $selectedLocation['code'] ?? '-' }}</strong></div>
                        </div>

                        <button type="button" class="primary-btn" wire:click="goToCode" style="width:100%;">
                            Lanjutkan <i class="fas fa-arrow-right"></i>
                        </button>
                    </aside>
                </div>
            </section>
        @endif

        @if ($show_code_modal)
            <div class="code-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="code-modal-title">
            <section class="donor-flow-card glass-card request-qr-flow">
                <form wire:submit.prevent="openBox">
                    <div class="request-qr-shell">
                        <div class="request-qr-visual">
                            <div class="request-qr-brand">
                                <span class="request-qr-brand-icon"><i class="fas fa-qrcode"></i></span>
                                <span>QR Box</span>
                                <span class="request-qr-safe"><i class="fas fa-shield-heart"></i> Aman</span>
                            </div>
                            <div class="request-qr-box" data-request-qr-scanner data-expected-code="{{ $selectedLocation['code'] ?? '' }}">
                                <div class="request-qr-camera">
                                    <video playsinline muted data-request-qr-video></video>
                                    <div class="request-qr-glass-code" aria-hidden="true">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <div class="request-qr-empty" data-request-qr-empty>
                                        <div>
                                            <i class="fas fa-camera"></i>
                                            <strong>Kamera laptop belum aktif</strong>
                                            <p>Klik aktifkan kamera, lalu izinkan akses kamera di browser.</p>
                                        </div>
                                    </div>
                                    <div class="request-qr-frame" aria-hidden="true"></div>
                                </div>
                                <div class="request-qr-actions">
                                    <button type="button" class="primary-btn" data-request-qr-start>
                                        <i class="fas fa-camera"></i> Aktifkan Kamera
                                    </button>
                                    <button type="button" class="secondary-btn" data-request-qr-stop>Matikan Kamera</button>
                                </div>
                                <div class="request-qr-status" data-request-qr-status>
                                    Kamera dimatikan.
                                </div>
                            </div>
                        </div>

                        <div class="request-qr-content">
                            <div class="big-icon"><i class="fas fa-qrcode"></i></div>
                            <h2 id="code-modal-title">Scan QR Box</h2>
                            <p class="request-qr-copy">Arahkan QR ke kamera untuk membuka akses pengambilan barang. Input manual hanya dipakai kalau QR tidak terbaca.</p>

                            <div class="request-location-card">
                                <div class="request-location-main">
                                    <div>
                                        <strong>{{ $selectedLocation['title'] ?? '-' }}</strong>
                                        <span>{{ $selectedLocation['area'] ?? '-' }}</span>
                                    </div>
                                    <span class="request-box-code-pill">{{ $selectedLocation['code'] ?? '-' }}</span>
                                </div>
                                <div class="request-scan-hint">
                                    <span class="request-scan-hint-text">
                                        <i class="fas fa-shield-heart"></i>
                                        QR harus berisi kode lokasi ini agar box bisa dibuka.
                                    </span>
                                    <span class="request-code-pill">{{ $selectedLocation['code'] ?? '-' }}</span>
                                </div>
                            </div>

                            <div class="request-method-divider">atau</div>

                            <div class="request-manual-card">
                                <div class="request-manual-title">Masukkan kode manual</div>
                                <label class="input-box" style="margin-bottom:10px;">
                                    <i class="fas fa-lock-open"></i>
                                    <input type="text" wire:model="kode_box_input" data-request-qr-input placeholder="Contoh: {{ $selectedLocation['code'] ?? 'DG-31' }}">
                                </label>
                                <p class="request-manual-note">Masukkan kode lokasi secara manual jika diperlukan.</p>
                                @error('kode_box_input') <span class="error-text" style="text-align:left;">{{ $message }}</span> @enderror
                            </div>

                            <div class="code-modal-actions">
                                <button type="button" class="secondary-btn" wire:click="closeCodeModal">Batal</button>
                                <button type="submit" class="primary-btn" data-request-open-submit><i class="fas fa-lock-open"></i> Buka Box</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
            </div>
        @endif

        @if ($show_fulfillment_modal)
            <div class="code-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="fulfillment-modal-title">
            <section class="donor-flow-card glass-card is-open-box">
                <div class="big-icon"><i class="fas fa-briefcase"></i></div>
                <h2 id="fulfillment-modal-title">Box Terbuka</h2>
                <p>Ambil barang yang sesuai, lalu cek kembali data penyaluran sebelum box ditutup.</p>
                <form wire:submit.prevent="completeFulfillment">
                    <div class="donor-flow-form">
                        <div class="form-field">
                            <label>Nama Barang</label>
                            <div class="input-box">
                                <i class="fas fa-box"></i>
                                <input type="text" wire:model="salurkan_nama_barang">
                            </div>
                            @error('salurkan_nama_barang') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-field">
                            <label>Kategori</label>
                            <div class="input-box">
                                <i class="fas fa-layer-group"></i>
                                <select wire:model="salurkan_kategori">
                                    <option value="">Pilih kategori</option>
                                    <option value="Pakaian">Pakaian</option>
                                    <option value="Buku">Buku</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            @error('salurkan_kategori') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-field">
                            <label>Jumlah</label>
                            <div class="input-box">
                                <i class="fas fa-list-ol"></i>
                                <input type="number" wire:model="salurkan_jumlah" min="1" max="1000">
                            </div>
                            @error('salurkan_jumlah') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-field">
                            <label>Lokasi Rebox</label>
                            <div class="readonly-box">{{ $selectedLocation['title'] ?? '-' }}</div>
                        </div>

                        <div class="form-field is-wide">
                            <label>Didonasikan Untuk</label>
                            <div class="readonly-box">{{ $selectedRequest['penerima'] ?? '-' }} - {{ $selectedRequest['nama_barang'] ?? '-' }}</div>
                        </div>
                    </div>

                    <div class="donor-flow-actions">
                        <button type="button" class="secondary-btn" wire:click="closeFulfillmentModal">Batal</button>
                        <button type="submit" class="primary-btn">
                            Kirim dan Tutup Box <i class="fas fa-circle-check"></i>
                        </button>
                    </div>
                </form>
            </section>
            </div>
        @endif

        @if ($show_success_modal)
            <div class="code-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="success-modal-title">
            <section class="donor-flow-card glass-card is-thanks">
                <div class="big-icon"><i class="fas fa-briefcase"></i></div>
                <h2 id="success-modal-title">Terima Kasih atas Kebaikanmu</h2>
                <p>Barang sudah dicatat untuk disalurkan. Segera lakukan pengiriman kepada penerima yang bersangkutan dan membutuhkan.</p>

                <div class="donor-flow-summary">
                    <div>Tujuan: <strong>{{ $selectedRequest['penerima'] ?? '-' }}</strong></div>
                    <div>Status: <strong style="color:#b7791f;">Proses pengantaran</strong></div>
                </div>

                <div class="notice-yellow">
                    <i class="fas fa-triangle-exclamation"></i>
                    Riwayat salurkan akan menjadi selesai setelah penerima mengisi feedback dan bukti bahwa barang telah diterima.
                </div>

                <div class="donor-flow-actions">
                    <a href="{{ $mapsUrl }}" target="_blank" rel="noopener" class="primary-btn">
                        Buka Google Maps <i class="fas fa-location-arrow"></i>
                    </a>
                    <a href="/dashboard" wire:navigate class="secondary-btn">Dashboard</a>
                </div>
            </section>
            </div>
        @endif
        </main>
    @endif

    <script src="{{ asset('jsQR.min.js') }}"></script>
    <script>
        function stopRequestQrScanner() {
            if (window.reboxRequestQrFrame) {
                window.cancelAnimationFrame(window.reboxRequestQrFrame);
                window.reboxRequestQrFrame = null;
            }

            window.reboxRequestQrScanning = false;

            if (window.reboxRequestQrStream) {
                window.reboxRequestQrStream.getTracks().forEach((track) => track.stop());
                window.reboxRequestQrStream = null;
            }

            document.querySelectorAll('[data-request-qr-video]').forEach((video) => {
                video.pause();
                video.srcObject = null;
            });

            document.querySelectorAll('[data-request-qr-empty]').forEach((empty) => empty.classList.remove('is-hidden'));
            document.querySelectorAll('.request-qr-camera.is-scanning').forEach((camera) => camera.classList.remove('is-scanning'));
        }

        function setRequestQrStatus(scanner, message, isError = false) {
            const status = scanner?.querySelector('[data-request-qr-status]');

            if (!status) return;

            status.textContent = message;
            status.classList.toggle('is-error', isError);
        }

        function extractRequestQrCode(value) {
            const match = String(value || '').toUpperCase().match(/[A-Z]{2}-\d{2}/);
            return match ? match[0] : String(value || '').trim().toUpperCase();
        }

        function initRequestQrScanner(root = document) {
            const scanner = root.querySelector('[data-request-qr-scanner]');

            if (!scanner) {
                stopRequestQrScanner();
                return;
            }

            if (scanner.dataset.ready === 'true') return;
            scanner.dataset.ready = 'true';

            const expectedCode = scanner.dataset.expectedCode;
            const video = scanner.querySelector('[data-request-qr-video]');
            const empty = scanner.querySelector('[data-request-qr-empty]');
            const startButton = scanner.querySelector('[data-request-qr-start]');
            const stopButton = scanner.querySelector('[data-request-qr-stop]');
            const input = document.querySelector('[data-request-qr-input]');
            const submitButton = document.querySelector('[data-request-open-submit]');
            let lastScanAt = 0;
            let scanFrameCount = 0;

            const submitScannedCode = (code) => {
                const component = window.Livewire?.find(scanner.closest('[wire\\:id]')?.getAttribute('wire:id'));

                stopRequestQrScanner();
                input && (input.value = code);
                setRequestQrStatus(scanner, `QR cocok (${code}). Membuka box...`);

                if (component) {
                    component.set('kode_box_input', code).then(() => submitButton?.click());
                    return;
                }

                window.setTimeout(() => submitButton?.click(), 250);
            };

            const handleScanValue = (value) => {
                const code = extractRequestQrCode(value);

                if (code === expectedCode) {
                    submitScannedCode(code);
                    return;
                }

                window.reboxRequestQrLastValue = '';
                setRequestQrStatus(scanner, `QR terbaca (${code || 'tidak valid'}), tapi tidak cocok dengan ${expectedCode}. Arahkan QR yang benar.`, true);
            };

            const decodeCanvas = (sourceCanvas, crop = null) => {
                const sourceContext = sourceCanvas.getContext('2d', { willReadFrequently: true });

                if (!sourceContext || typeof window.jsQR !== 'function') {
                    return null;
                }

                if (!crop) {
                    const imageData = sourceContext.getImageData(0, 0, sourceCanvas.width, sourceCanvas.height);
                    return window.jsQR(imageData.data, sourceCanvas.width, sourceCanvas.height, {
                        inversionAttempts: 'attemptBoth',
                    });
                }

                const cropCanvas = window.reboxRequestQrCropCanvas || document.createElement('canvas');
                const cropContext = cropCanvas.getContext('2d', { willReadFrequently: true });
                window.reboxRequestQrCropCanvas = cropCanvas;

                if (!cropContext) return null;

                cropCanvas.width = crop.width;
                cropCanvas.height = crop.height;
                cropContext.drawImage(sourceCanvas, crop.x, crop.y, crop.width, crop.height, 0, 0, crop.width, crop.height);

                const imageData = cropContext.getImageData(0, 0, crop.width, crop.height);
                return window.jsQR(imageData.data, crop.width, crop.height, {
                    inversionAttempts: 'attemptBoth',
                });
            };

            const scanLoop = () => {
                if (!window.reboxRequestQrScanning || !video) return;

                const now = performance.now();

                if (video.readyState >= HTMLMediaElement.HAVE_CURRENT_DATA && now - lastScanAt >= 90) {
                    try {
                        const canvas = window.reboxRequestQrCanvas || document.createElement('canvas');
                        const context = canvas.getContext('2d', { willReadFrequently: true });
                        const sourceWidth = video.videoWidth;
                        const sourceHeight = video.videoHeight;
                        const scale = Math.min(1, 720 / Math.max(sourceWidth || 1, sourceHeight || 1));
                        const width = Math.max(1, Math.floor(sourceWidth * scale));
                        const height = Math.max(1, Math.floor(sourceHeight * scale));
                        window.reboxRequestQrCanvas = canvas;

                        if (sourceWidth && sourceHeight && width && height && context && typeof window.jsQR === 'function') {
                            lastScanAt = now;
                            canvas.width = width;
                            canvas.height = height;
                            context.drawImage(video, 0, 0, sourceWidth, sourceHeight, 0, 0, width, height);

                            const centerSize = Math.floor(Math.min(width, height) * .86);
                            const centerCrop = {
                                x: Math.max(0, Math.floor((width - centerSize) / 2)),
                                y: Math.max(0, Math.floor((height - centerSize) / 2)),
                                width: centerSize,
                                height: centerSize,
                            };
                            const wideHeight = Math.floor(height * .82);
                            const wideCrop = {
                                x: 0,
                                y: Math.max(0, Math.floor((height - wideHeight) / 2)),
                                width,
                                height: wideHeight,
                            };

                            const qr = decodeCanvas(canvas, centerCrop)
                                || (scanFrameCount % 2 === 0 ? decodeCanvas(canvas) : null)
                                || (scanFrameCount % 3 === 0 ? decodeCanvas(canvas, wideCrop) : null);

                            if (qr?.data) {
                                const scannedValue = String(qr.data);

                                if (scannedValue === window.reboxRequestQrLastValue && performance.now() - (window.reboxRequestQrLastSeenAt || 0) < 450) {
                                    scanFrameCount += 1;
                                    window.reboxRequestQrFrame = window.requestAnimationFrame(scanLoop);
                                    return;
                                }

                                window.reboxRequestQrLastValue = scannedValue;
                                window.reboxRequestQrLastSeenAt = performance.now();
                                handleScanValue(scannedValue);
                            }
                        } else if (typeof window.jsQR !== 'function') {
                            setRequestQrStatus(scanner, 'Decoder QR belum termuat. Refresh halaman lalu coba lagi.', true);
                        }
                    } catch (error) {
                        if (scanFrameCount % 45 === 0) {
                            setRequestQrStatus(scanner, 'Kamera aktif. Dekatkan QR dan pastikan gambar tidak blur.');
                        }
                    }
                }

                scanFrameCount += 1;

                if (window.reboxRequestQrScanning) {
                    window.reboxRequestQrFrame = window.requestAnimationFrame(scanLoop);
                }
            };

            startButton?.addEventListener('click', async () => {
                if (!navigator.mediaDevices?.getUserMedia) {
                    setRequestQrStatus(scanner, 'Browser tidak mendukung akses kamera. Gunakan Chrome terbaru di laptop ini.', true);
                    return;
                }

                if (typeof window.jsQR !== 'function') {
                    setRequestQrStatus(scanner, 'Decoder QR belum termuat. Refresh halaman lalu coba lagi.', true);
                    return;
                }

                try {
                    stopRequestQrScanner();

                    try {
                        window.reboxRequestQrStream = await navigator.mediaDevices.getUserMedia({
                            video: {
                                width: { ideal: 960 },
                                height: { ideal: 540 },
                                facingMode: 'environment',
                            },
                            audio: false,
                        });
                    } catch (cameraError) {
                        window.reboxRequestQrStream = await navigator.mediaDevices.getUserMedia({
                            video: {
                                width: { ideal: 960 },
                                height: { ideal: 540 },
                            },
                            audio: false,
                        });
                    }

                    video.srcObject = window.reboxRequestQrStream;
                    empty?.classList.add('is-hidden');
                    video.closest('.request-qr-camera')?.classList.add('is-scanning');
                    window.reboxRequestQrScanning = true;
                    scanFrameCount = 0;
                    setRequestQrStatus(scanner, 'Kamera laptop aktif. Tampilkan QR ke kamera, box akan terbuka otomatis saat kode cocok.');
                    await video.play();
                    scanLoop();
                } catch (error) {
                    setRequestQrStatus(scanner, 'Kamera gagal aktif. Izinkan akses kamera di browser, lalu coba lagi.', true);
                }
            });

            stopButton?.addEventListener('click', () => {
                stopRequestQrScanner();
                setRequestQrStatus(scanner, 'Kamera dimatikan.');
            });
        }

        function queueRequestInit() {
            window.requestAnimationFrame(() => window.setTimeout(() => {
                initRequestProfileMenu();
                initRequestQrScanner();
            }, 0));
        }

        function initRequestProfileMenu() {
            document.querySelectorAll('[data-profile-dropdown]').forEach((dropdown) => {
                if (dropdown.dataset.ready === 'true') return;
                dropdown.dataset.ready = 'true';
                const button = dropdown.querySelector('.profile-pill');

                button?.addEventListener('click', (event) => {
                    event.stopPropagation();
                    dropdown.classList.toggle('is-open');
                });
            });
        }

        document.addEventListener('click', () => {
            document.querySelectorAll('[data-profile-dropdown].is-open').forEach((dropdown) => dropdown.classList.remove('is-open'));
        });
        window.addEventListener('beforeunload', stopRequestQrScanner);
        document.addEventListener('DOMContentLoaded', queueRequestInit);
        document.addEventListener('livewire:navigated', queueRequestInit);
        document.addEventListener('livewire:initialized', queueRequestInit);
        document.addEventListener('livewire:update', queueRequestInit);
        document.addEventListener('livewire:updated', queueRequestInit);

        document.addEventListener('livewire:init', () => {
            if (window.Livewire) {
                try {
                    window.Livewire.hook('morph.updated', queueRequestInit);
                    window.Livewire.hook('commit', (payload = {}) => {
                        if (typeof payload.succeed === 'function') {
                            payload.succeed(queueRequestInit);
                        } else {
                            queueRequestInit();
                        }
                    });
                } catch (error) {
                    queueRequestInit();
                }
            }
        });

        if (!window.reboxRequestObserver) {
            window.reboxRequestObserver = new MutationObserver(queueRequestInit);
            window.reboxRequestObserver.observe(document.body, {
                childList: true,
                subtree: true,
            });
        }
    </script>
</div>
