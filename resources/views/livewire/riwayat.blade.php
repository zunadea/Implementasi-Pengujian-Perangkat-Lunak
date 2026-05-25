<div class="rebox-riwayat-page {{ auth()->user()?->role === 'penerima' ? 'is-recipient-history' : '' }}">
    @php
        $user = auth()->user();
        $displayName = $user->name ?? $user->username ?? 'Rhei';
        $initial = strtoupper(substr($displayName, 0, 1));
        $avatarUrl = !empty($user->profile_photo) ? asset('storage/' . $user->profile_photo) : null;
        $isRecipient = $user?->role === 'penerima';
        $currentHistories = $isRecipient ? $recipientRequests : $donorHistories;
    @endphp

    <style>
        :root {
            --rebox-green: #008600;
            --rebox-ink: #111111;
            --rebox-muted: #737373;
            --sf-pro: "SF Pro Display", "SF Pro Text", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        body { background: #ffffff; font-family: var(--sf-pro); }
        .rebox-navbar-area { display: none !important; }
        .content-wrapper, .content, .container-fluid {
            width: 100% !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
        }

        .rebox-riwayat-page {
            min-height: 100vh;
            overflow: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 84% 16%, rgba(0, 134, 0, 0.09), transparent 22%),
                radial-gradient(circle at 8% 76%, rgba(0, 134, 0, 0.05), transparent 22%),
                linear-gradient(90deg, #ffffff 0%, #ffffff 66%, #f5fcf6 100%);
        }

        .rebox-riwayat-page.is-recipient-history {
            position: relative;
            isolation: isolate;
            background: #ffffff;
        }

        .riwayat-inner {
            width: min(100%, 1280px);
            margin: 0 auto;
            padding: 26px 54px 90px;
            position: relative;
        }

        .top-shell {
            display: grid;
            grid-template-columns: 1fr 142px;
            align-items: center;
            gap: 42px;
            width: min(100%, 1280px);
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

        .profile-dropdown { position: relative; }
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

        .profile-pill img, .profile-avatar-fallback {
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
            z-index: 10;
        }

        .profile-dropdown.is-open .profile-menu { display: block; animation: menuDrop 0.22s ease both; }
        .profile-menu form { margin: 0; }
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
        .profile-menu button:hover { background: rgba(0, 134, 0, 0.09); color: var(--rebox-green); }

        .history-hero {
            text-align: center;
            margin-bottom: 34px;
            animation: heroIn .48s ease both;
        }

        .history-hero .eyebrow {
            margin: 0 0 10px;
            color: var(--rebox-green);
            font-size: 16px;
            font-weight: 750;
        }

        .history-hero h1 {
            margin: 0;
            color: var(--rebox-green);
            font-size: 38px;
            line-height: 1.1;
            font-weight: 700;
        }

        .history-hero p {
            max-width: 620px;
            margin: 14px auto 0;
            color: #a1a1a1;
            font-size: 15px;
            font-weight: 650;
            line-height: 1.55;
        }

        .history-panel {
            width: min(100%, 1080px);
            margin: 0 auto;
            border: 1px solid rgba(0, 134, 0, .14);
            border-radius: 28px;
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 22px 48px rgba(0, 134, 0, .10), 0 8px 20px rgba(17, 17, 17, .04);
            backdrop-filter: blur(10px);
            padding: 28px;
        }

        .donor-history-hero {
            width: min(100%, 1160px);
            min-height: 170px;
            margin: -8px auto 28px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 420px;
            gap: 32px;
            align-items: center;
            animation: heroIn .48s ease both;
        }

        .donor-history-copy {
            text-align: left;
        }

        .donor-history-copy .eyebrow {
            margin: 0 0 16px;
            color: var(--rebox-green);
            font-size: 15px;
            font-weight: 600;
        }

        .donor-history-copy h1 {
            margin: 0;
            color: #14202b;
            font-size: clamp(34px, 4vw, 48px);
            font-weight: 620;
            line-height: 1.08;
            letter-spacing: 0;
        }

        .donor-history-copy h1 span {
            color: var(--rebox-green);
        }

        .donor-history-copy p {
            max-width: 610px;
            margin: 22px 0 0;
            color: #667085;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.65;
        }

        .donor-history-art {
            height: 180px;
            position: relative;
            opacity: .72;
            pointer-events: none;
        }

        .donor-history-art .box {
            position: absolute;
            right: 104px;
            bottom: 0;
            width: 190px;
            height: 118px;
            border-radius: 14px 14px 20px 20px;
            background: linear-gradient(145deg, rgba(0, 134, 0, .16), rgba(222, 248, 227, .62));
            box-shadow: 0 24px 60px rgba(0, 134, 0, .09);
        }

        .donor-history-art .box::before {
            content: "";
            position: absolute;
            left: 22px;
            right: 22px;
            top: -34px;
            height: 46px;
            border-radius: 16px;
            background: rgba(235, 249, 238, .72);
            transform: rotate(5deg);
        }

        .donor-history-art .bear,
        .donor-history-art .book,
        .donor-history-art .heart,
        .donor-history-art .hand {
            position: absolute;
            display: grid;
            place-items: center;
            color: rgba(0, 134, 0, .68);
            background: rgba(255, 255, 255, .72);
            box-shadow: 0 16px 36px rgba(0, 134, 0, .07);
        }

        .donor-history-art .bear {
            right: 184px;
            top: 2px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            font-size: 30px;
        }

        .donor-history-art .book {
            right: 122px;
            top: 66px;
            width: 72px;
            height: 48px;
            border-radius: 14px;
            font-size: 24px;
        }

        .donor-history-art .heart {
            left: 32px;
            top: 50px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            animation: donorFloat 3.2s ease-in-out infinite;
        }

        .donor-history-art .hand {
            right: 12px;
            top: 74px;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            font-size: 22px;
            animation: donorFloat 3.4s ease-in-out .4s infinite;
        }

        .donor-history-art .line {
            position: absolute;
            right: 34px;
            top: 44px;
            width: 280px;
            height: 92px;
            border-top: 2px dashed rgba(0, 134, 0, .16);
            border-radius: 50%;
            transform: rotate(8deg);
        }

        .donor-history-panel {
            width: min(100%, 1160px);
            margin: 0 auto;
            border: 1px solid rgba(20, 32, 43, .07);
            border-radius: 20px;
            background: rgba(255, 255, 255, .88);
            box-shadow: 0 22px 70px rgba(15, 23, 42, .08);
            backdrop-filter: blur(16px);
            padding: 24px;
            animation: recipientPanelIn .42s ease both;
        }

        .donor-history-toolbar {
            display: grid;
            grid-template-columns: minmax(280px, 360px) 1fr auto;
            align-items: center;
            gap: 22px;
            margin-bottom: 24px;
        }

        .donor-history-tabs {
            height: 54px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: 1px solid rgba(0, 134, 0, .12);
            border-radius: 17px;
            background: rgba(255, 255, 255, .82);
            padding: 5px;
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .92),
                0 16px 34px rgba(15, 23, 42, .06);
            position: relative;
            overflow: hidden;
        }

        .donor-history-tabs::before {
            content: "";
            position: absolute;
            z-index: 0;
            top: 5px;
            bottom: 5px;
            left: 5px;
            width: calc(50% - 5px);
            border-radius: 13px;
            background: rgba(0, 134, 0, .09);
            box-shadow: 0 12px 24px rgba(0, 80, 0, .08);
            transform: translateX(0);
            transition: transform .34s cubic-bezier(.22, 1, .36, 1), background .22s ease, box-shadow .22s ease;
        }

        .donor-history-tabs.is-rebox::before {
            transform: translateX(100%);
        }

        .donor-history-tabs button {
            border: 0;
            border-radius: 13px;
            background: transparent;
            color: #667085;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 650;
            cursor: pointer;
            position: relative;
            z-index: 1;
            isolation: isolate;
            overflow: hidden;
            transition: transform .22s ease, color .22s ease, background .22s ease, box-shadow .22s ease;
        }

        .donor-history-tabs button::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            border-radius: inherit;
            background:
                linear-gradient(135deg, rgba(0, 134, 0, .14), rgba(139, 209, 125, .12)),
                rgba(0, 134, 0, .06);
            opacity: 0;
            transform: scale(.94);
            transition: opacity .22s ease, transform .22s ease;
        }

        .donor-history-tabs button i {
            font-size: 16px;
            transition: transform .22s ease, color .22s ease;
        }

        .donor-history-tabs button:hover {
            color: var(--rebox-green);
            transform: translateY(-2px);
        }

        .donor-history-tabs button:hover::before {
            opacity: 0;
            transform: scale(.94);
        }

        .donor-history-tabs button:hover i {
            transform: translateY(-1px) scale(1.06);
        }

        .donor-history-tabs button:active {
            transform: translateY(0) scale(.97);
        }

        .donor-history-tabs button.is-active {
            color: #008600;
            background: transparent;
            box-shadow: none;
        }

        .donor-history-tabs button.is-active::before {
            opacity: 0;
        }

        .donor-history-tabs button.is-active i {
            color: #008600;
            animation: tabIconPop .36s ease both;
        }

        .donor-activity-count {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #667085;
            font-size: 14px;
            font-weight: 560;
        }

        .donor-activity-count i {
            color: var(--rebox-green);
            font-size: 18px;
        }

        .donor-time-select {
            position: relative;
            justify-self: end;
        }

        .donor-time-select[open] .donor-time-filter {
            border-color: rgba(0, 134, 0, .22);
            color: var(--rebox-green);
            box-shadow: 0 15px 32px rgba(0, 134, 0, .12);
        }

        .donor-time-select[open] .donor-time-filter i:last-child {
            transform: rotate(180deg);
        }

        .donor-time-filter {
            height: 44px;
            border: 1px solid rgba(20, 32, 43, .09);
            border-radius: 14px;
            background: rgba(255, 255, 255, .82);
            color: #667085;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding: 0 18px;
            font-size: 13px;
            font-weight: 560;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .04);
            cursor: pointer;
            list-style: none;
            user-select: none;
            transition:
                transform .22s cubic-bezier(.2,.8,.2,1),
                box-shadow .22s ease,
                border-color .22s ease,
                color .22s ease,
                background .22s ease;
        }

        .donor-time-filter::-webkit-details-marker {
            display: none;
        }

        .donor-time-filter:hover {
            color: var(--rebox-green);
            border-color: rgba(0, 134, 0, .18);
            background: rgba(248, 255, 249, .96);
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(0, 134, 0, .10);
        }

        .donor-time-filter:active {
            transform: translateY(0) scale(.98);
        }

        .donor-time-filter i:first-child {
            color: var(--rebox-green);
        }

        .donor-time-filter i:last-child {
            transition: transform .2s ease;
        }

        .donor-time-menu {
            position: absolute;
            right: 0;
            top: calc(100% + 10px);
            z-index: 20;
            width: 178px;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 16px;
            background: rgba(255, 255, 255, .96);
            box-shadow: 0 22px 46px rgba(15, 23, 42, .12);
            padding: 8px;
            transform-origin: top right;
            animation: timeMenuIn .2s cubic-bezier(.2,.8,.2,1) both;
        }

        .donor-time-option {
            width: 100%;
            border: 0;
            border-radius: 12px;
            background: transparent;
            color: #667085;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 12px;
            font-family: var(--sf-pro);
            font-size: 13px;
            font-weight: 560;
            text-align: left;
            cursor: pointer;
            transition:
                transform .18s ease,
                background .18s ease,
                color .18s ease;
        }

        .donor-time-option i {
            width: 16px;
            color: currentColor;
            opacity: .88;
        }

        .donor-time-option:hover {
            color: var(--rebox-green);
            background: rgba(0, 134, 0, .07);
            transform: translateX(3px);
        }

        .donor-time-option:active {
            transform: translateX(1px) scale(.98);
        }

        .donor-time-option.is-active {
            color: var(--rebox-green);
            background: rgba(0, 134, 0, .10);
        }

        @keyframes timeMenuIn {
            from {
                opacity: 0;
                transform: translateY(-8px) scale(.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .donor-history-list {
            display: grid;
            gap: 12px;
        }

        .donor-history-card {
            min-height: 142px;
            display: grid;
            grid-template-columns: 118px minmax(260px, 1.3fr) minmax(150px, .72fr) minmax(110px, .45fr) minmax(145px, .58fr) minmax(150px, .64fr) 44px;
            gap: 22px;
            align-items: center;
            border: 1px solid rgba(20, 32, 43, .07);
            border-radius: 18px;
            background: rgba(255, 255, 255, .92);
            padding: 18px 18px 18px 20px;
            box-shadow: 0 12px 32px rgba(15, 23, 42, .05);
            animation: donorRowIn .36s ease both;
            animation-delay: calc(var(--row-index, 0) * 60ms);
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease, background .22s ease;
        }

        .donor-history-card:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 134, 0, .18);
            background: rgba(250, 255, 251, .96);
            box-shadow: 0 18px 42px rgba(15, 23, 42, .08);
        }

        .donor-history-card:hover .donor-history-arrow {
            transform: translateX(3px);
            color: var(--rebox-green);
            border-color: rgba(0, 134, 0, .22);
        }

        .donor-history-image {
            width: 98px;
            height: 98px;
            border-radius: 14px;
            object-fit: cover;
            background: #eef5ef;
            box-shadow: 0 12px 22px rgba(15, 23, 42, .07);
        }

        .donor-history-main {
            min-width: 0;
        }

        .donor-history-main.is-salurkan {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            align-items: center;
            column-gap: 18px;
        }

        .donor-history-person {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 12px;
            align-items: center;
            margin-bottom: 12px;
        }

        .donor-history-person.has-avatar {
            grid-template-columns: 42px minmax(0, 1fr);
        }

        .donor-history-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #e7f5e9;
            color: #14202b;
            font-size: 13px;
            font-weight: 650;
            object-fit: cover;
        }

        .donor-history-person strong {
            display: block;
            color: #14202b;
            font-size: 16px;
            font-weight: 650;
            line-height: 1.1;
        }

        .donor-history-person span {
            color: #667085;
            font-size: 12px;
            font-weight: 500;
        }

        .donor-history-main h3 {
            margin: 0 0 7px;
            color: #14202b;
            font-size: 18px;
            font-weight: 650;
            line-height: 1.2;
        }

        .donor-history-main p {
            margin: 0;
            color: #667085;
            font-size: 13px;
            font-weight: 450;
            line-height: 1.45;
        }

        .recipient-map-link {
            min-width: 82px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            color: #ffffff;
            background: #4f83f1;
            border: 1px solid rgba(79, 131, 241, .42);
            border-radius: 999px;
            padding: 0 12px;
            font-size: 13px;
            font-weight: 560;
            line-height: 1;
            text-decoration: none;
            justify-self: end;
            box-shadow: 0 10px 18px rgba(79, 131, 241, .16);
            transition:
                transform .2s cubic-bezier(.2,.8,.2,1),
            background .2s ease,
            box-shadow .2s ease,
            border-color .2s ease;
        }

        .recipient-map-link:hover {
            color: #ffffff;
            background: #4578e8;
            border-color: rgba(79, 131, 241, .58);
            transform: translateY(-2px);
            box-shadow: 0 13px 24px rgba(79, 131, 241, .22);
        }

        .recipient-map-link:active {
            transform: translateY(0) scale(.97);
        }

        .recipient-map-link i {
            color: #ffbd18;
            font-size: 13px;
        }

        .donor-success-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 10px;
            height: 25px;
            padding: 0 10px;
            border-radius: 999px;
            color: #169b36;
            background: rgba(0, 134, 0, .08);
            font-size: 12px;
            font-weight: 600;
        }

        .donor-data-block {
            min-height: 70px;
            border-left: 1px solid rgba(20, 32, 43, .08);
            padding-left: 22px;
            display: grid;
            align-content: center;
            gap: 6px;
        }

        .donor-data-block span {
            color: #667085;
            font-size: 11px;
            font-weight: 650;
            text-transform: uppercase;
            letter-spacing: .06em;
        }

        .donor-data-block strong {
            color: #14202b;
            font-size: 15px;
            font-weight: 650;
            line-height: 1.35;
        }

        .donor-data-block small {
            color: #667085;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.35;
        }

        .donor-date-lines {
            display: grid;
            gap: 8px;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
        }

        .donor-date-lines div {
            display: inline-flex;
            align-items: center;
            gap: 9px;
        }

        .donor-status-box {
            min-height: 58px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 0 18px;
            font-size: 13px;
            font-weight: 650;
            line-height: 1.35;
        }

        .donor-status-box.is-process {
            color: #d28a00;
            background: #fff4d8;
        }

        .donor-status-box.is-done {
            color: #169b36;
            background: #edf9ef;
        }

        .donor-status-box i {
            font-size: 17px;
        }

        .donor-history-arrow {
            width: 38px;
            height: 38px;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 12px;
            background: #ffffff;
            color: #14202b;
            display: grid;
            place-items: center;
            text-decoration: none;
            box-shadow: 0 10px 20px rgba(15, 23, 42, .05);
            transition: transform .2s ease, color .2s ease, border-color .2s ease, box-shadow .2s ease;
        }

        .donor-pagination {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 22px;
        }

        .donor-pagination button {
            width: 42px;
            height: 42px;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 13px;
            background: rgba(255, 255, 255, .88);
            color: #667085;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .05);
            transition: transform .2s ease, background .2s ease, color .2s ease, box-shadow .2s ease;
        }

        .donor-pagination button:hover {
            transform: translateY(-2px);
            color: var(--rebox-green);
            box-shadow: 0 15px 28px rgba(15, 23, 42, .08);
        }

        .donor-pagination button.is-active {
            color: #ffffff;
            background: rgba(0, 134, 0, .68);
            border-color: transparent;
        }

        .recipient-history-hero {
            width: min(100%, 1160px);
            margin: 0 auto 42px;
            display: block;
            position: relative;
        }

        .recipient-history-hero-icon {
            width: 72px;
            height: 72px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            background: rgba(225, 246, 229, .82);
            color: var(--rebox-green);
            font-size: 34px;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.84), 0 20px 42px rgba(0, 134, 0, .10);
            backdrop-filter: blur(12px);
        }

        .recipient-history-eyebrow {
            margin: 10px 0 14px;
            color: var(--rebox-green);
            font-size: 16px;
            font-weight: 500;
        }

        .recipient-history-hero h1 {
            margin: 0;
            color: var(--rebox-green);
            font-size: clamp(34px, 4vw, 48px);
            font-weight: 600;
            line-height: 1.08;
        }

        .recipient-history-hero h1 span {
            color: var(--rebox-green);
        }

        .recipient-history-hero p {
            margin: 24px 0 0;
            max-width: 760px;
            color: var(--rebox-green);
            font-size: 16px;
            font-weight: 500;
            line-height: 1.65;
            opacity: .72;
        }

        .recipient-history-panel {
            width: min(100%, 1160px);
            margin: 0 auto;
            border: 1px solid rgba(20, 32, 43, .06);
            border-radius: 8px;
            background: rgba(255, 255, 255, .82);
            box-shadow: 0 22px 70px rgba(15, 23, 42, .08);
            backdrop-filter: blur(18px);
            overflow: hidden;
            animation: recipientPanelIn .42s ease both;
        }

        .recipient-filter-bar {
            min-height: 74px;
            display: grid;
            grid-template-columns: repeat(5, minmax(120px, auto)) 1fr;
            align-items: center;
            gap: 12px;
            padding: 0 22px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .72);
        }

        .recipient-filter-tab {
            height: 52px;
            border: 0;
            border-radius: 8px;
            background: transparent;
            color: #667085;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0 14px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: color .2s ease, background .2s ease, box-shadow .2s ease, transform .2s ease;
        }

        .recipient-filter-button {
            display: none;
        }

        .recipient-filter-tab:hover {
            color: var(--rebox-green);
            background: rgba(0, 134, 0, .055);
            transform: translateY(-1px);
        }

        .recipient-filter-tab:active {
            transform: translateY(0) scale(.97);
        }

        .recipient-filter-tab.is-active {
            color: var(--rebox-green);
            background: rgba(0, 134, 0, .07);
            box-shadow: inset 0 -3px 0 var(--rebox-green);
        }


        .recipient-history-list {
            display: grid;
        }

        .recipient-history-card {
            display: grid;
            grid-template-columns: 98px minmax(320px, 1fr) 135px 135px 150px 148px;
            gap: 24px;
            align-items: center;
            min-height: 136px;
            padding: 26px 22px 26px 34px;
            border-bottom: 1px solid rgba(15, 23, 42, .08);
            background: rgba(255, 255, 255, .72);
            animation: recipientRowIn .34s ease both;
            animation-delay: calc(var(--row-index, 0) * 55ms);
            transition: background .22s ease, transform .22s ease, box-shadow .22s ease;
        }

        .recipient-history-card:hover {
            background: rgba(248, 255, 249, .90);
            transform: translateY(-2px);
            box-shadow: inset 3px 0 0 rgba(0, 134, 0, .26), 0 12px 28px rgba(15, 23, 42, .045);
        }

        .recipient-history-card:hover .recipient-category-icon {
            transform: translateY(-2px) scale(1.03);
        }

        .recipient-history-card:hover .recipient-detail-btn i {
            transform: translateX(3px);
        }

        .recipient-category-icon {
            width: 78px;
            height: 78px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: #eff6ff;
            color: #2563eb;
            font-size: 34px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .80), 0 16px 32px rgba(37, 99, 235, .08);
            transition: transform .22s ease, box-shadow .22s ease;
        }

        .recipient-category-icon.is-pakaian,
        .recipient-category-icon.is-buku,
        .recipient-category-icon.is-elektronik,
        .recipient-category-icon.is-lainnya {
            color: #2563eb;
            background: #eff6ff;
        }

        .recipient-item-main {
            min-width: 0;
        }

        .recipient-request-code {
            display: inline-flex;
            align-items: center;
            height: 24px;
            padding: 0 8px;
            border-radius: 7px;
            background: rgba(0, 134, 0, .10);
            color: var(--rebox-green);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .recipient-item-main h3 {
            margin: 0 0 7px;
            color: #14202b;
            font-size: 19px;
            font-weight: 700;
            line-height: 1.18;
        }

        .recipient-item-main p {
            margin: 0 0 8px;
            color: #667085;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.5;
        }

        .recipient-item-location {
            color: #667085;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
        }

        .recipient-data-label {
            display: block;
            color: #667085;
            font-size: 12px;
            font-weight: 650;
            margin-bottom: 8px;
        }

        .recipient-data-value {
            color: #14202b;
            font-size: 15px;
            font-weight: 700;
        }

        .recipient-status-area {
            display: grid;
            gap: 12px;
            justify-items: start;
        }

        .recipient-status-pill {
            min-width: 112px;
            height: 34px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 650;
        }

        .recipient-status-pill.is-menunggu { color: #d28a00; background: #fff4d8; }
        .recipient-status-pill.is-diproses { color: #2563eb; background: #eaf2ff; }
        .recipient-status-pill.is-disetujui { color: #14933a; background: #e8f8ec; }
        .recipient-status-pill.is-ditolak { color: #dc2626; background: #feecec; }

        .recipient-time {
            color: #667085;
            font-size: 14px;
            font-weight: 500;
        }

        .recipient-detail-btn {
            width: 128px;
            height: 42px;
            border: 1px solid rgba(102, 112, 133, .15);
            border-radius: 10px;
            background: rgba(255, 255, 255, .78);
            color: #14202b;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 8px 18px rgba(15, 23, 42, .06);
            cursor: pointer;
            transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .recipient-detail-btn i {
            transition: transform .2s ease;
        }

        .recipient-detail-btn:hover {
            background: #ffffff;
            border-color: rgba(37, 99, 235, .22);
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, .09);
        }

        .recipient-detail-btn:active {
            transform: translateY(0) scale(.98);
        }

        .recipient-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 80;
            display: grid;
            place-items: center;
            padding: 24px;
            background: rgba(255, 255, 255, .48);
            backdrop-filter: blur(14px);
            animation: recipientModalFade .22s ease both;
        }

        .recipient-modal-card {
            width: min(760px, 100%);
            max-height: min(86vh, 820px);
            overflow: auto;
            border: 1px solid rgba(20, 32, 43, .08);
            border-radius: 18px;
            background: rgba(255, 255, 255, .96);
            box-shadow: 0 28px 80px rgba(15, 23, 42, .16);
            padding: 26px;
            animation: recipientModalPop .28s ease both;
        }

        .recipient-modal-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 22px;
        }

        .recipient-modal-head h2 {
            margin: 6px 0 8px;
            color: #14202b;
            font-size: 24px;
            font-weight: 600;
            line-height: 1.15;
        }

        .recipient-modal-head p {
            margin: 0;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.5;
        }

        .recipient-modal-close {
            width: 38px;
            height: 38px;
            border: 0;
            border-radius: 12px;
            background: #f3f6f4;
            color: #667085;
            cursor: pointer;
            transition: transform .2s ease, background .2s ease;
        }

        .recipient-modal-close:hover {
            transform: translateY(-1px);
            background: #e8f8ec;
            color: var(--rebox-green);
        }

        .recipient-detail-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 20px;
        }

        .recipient-detail-item {
            min-height: 76px;
            border: 1px solid rgba(20, 32, 43, .07);
            border-radius: 14px;
            background: #fbfdfb;
            padding: 14px 16px;
        }

        .recipient-detail-item.is-wide {
            grid-column: 1 / -1;
        }

        .recipient-detail-item span {
            display: block;
            color: #667085;
            font-size: 11px;
            font-weight: 650;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 7px;
        }

        .recipient-detail-item strong,
        .recipient-detail-item p {
            margin: 0;
            color: #14202b;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.45;
        }

        .recipient-feedback-form {
            margin-top: 20px;
            border-top: 1px solid rgba(20, 32, 43, .08);
            padding-top: 20px;
            animation: recipientModalPop .26s ease both;
        }

        .recipient-feedback-form h3 {
            margin: 0 0 14px;
            color: #14202b;
            font-size: 18px;
            font-weight: 600;
        }

        .feedback-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .feedback-field.is-wide {
            grid-column: 1 / -1;
        }

        .feedback-field label {
            display: block;
            margin-bottom: 8px;
            color: #667085;
            font-size: 12px;
            font-weight: 650;
        }

        .feedback-field input,
        .feedback-field textarea {
            width: 100%;
            border: 1px solid rgba(0, 134, 0, .12);
            border-radius: 12px;
            background: #fbfdfb;
            color: #14202b;
            font-size: 14px;
            font-weight: 500;
            padding: 12px 14px;
            outline: none;
        }

        .feedback-field input:disabled {
            color: #667085;
            background: #f3f6f4;
        }

        .feedback-field textarea {
            min-height: 92px;
            resize: vertical;
        }

        .feedback-preview {
            width: 100%;
            max-height: 210px;
            object-fit: cover;
            border-radius: 14px;
            margin-top: 10px;
            border: 1px solid rgba(20, 32, 43, .08);
        }

        .recipient-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .recipient-action-primary,
        .recipient-action-secondary {
            min-height: 44px;
            border-radius: 12px;
            border: 0;
            padding: 0 20px;
            font-size: 14px;
            font-weight: 650;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .recipient-action-primary {
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 12px 24px rgba(0, 134, 0, .16);
        }

        .recipient-action-secondary {
            background: #f3f6f4;
            color: #14202b;
        }

        .recipient-action-primary:hover,
        .recipient-action-secondary:hover {
            transform: translateY(-2px);
        }

        .recipient-action-primary:active,
        .recipient-action-secondary:active {
            transform: translateY(0) scale(.98);
        }

        .feedback-complete-box {
            margin-top: 18px;
            border: 1px solid rgba(0, 134, 0, .12);
            border-radius: 14px;
            background: #f7fcf8;
            padding: 14px;
            color: #667085;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.5;
        }

        .error-text {
            display: block;
            margin-top: 7px;
            color: #dc2626;
            font-size: 12px;
            font-weight: 600;
        }

        @keyframes recipientModalFade {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes recipientModalPop {
            from { opacity: 0; transform: translateY(16px) scale(.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .history-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .history-tabs {
            width: min(100%, 390px);
            height: 54px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border: 1px solid rgba(0, 134, 0, .12);
            border-radius: 18px;
            background: #f7faf8;
            padding: 5px;
        }

        .history-tabs button {
            border: 0;
            border-radius: 14px;
            background: transparent;
            color: #4b5563;
            font-size: 15px;
            font-weight: 800;
            transition: .2s ease;
        }

        .history-tabs button:hover,
        .history-tabs button.is-active {
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 12px 22px rgba(0, 134, 0, .18);
        }

        .history-summary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #737373;
            font-size: 14px;
            font-weight: 750;
        }

        .history-summary i {
            color: var(--rebox-green);
        }

        .history-list {
            display: grid;
            gap: 18px;
        }

        .history-card {
            display: grid;
            grid-template-columns: 112px minmax(0, 1fr) 210px;
            gap: 20px;
            align-items: center;
            border: 1px solid rgba(0, 134, 0, .10);
            border-radius: 22px;
            background: rgba(255, 255, 255, .96);
            padding: 18px;
            box-shadow: 0 14px 28px rgba(17, 17, 17, .055);
            animation: cardIn .26s ease both;
        }

        .history-image {
            width: 112px;
            height: 112px;
            border-radius: 18px;
            object-fit: cover;
            background: #eef5ef;
        }

        .history-main {
            min-width: 0;
        }

        .history-meta {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .history-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            background: #e9f5ec;
            border: 2px solid #edf3ee;
        }

        .history-name strong {
            display: block;
            color: #111111;
            font-size: 16px;
            font-weight: 850;
            line-height: 1.05;
        }

        .history-name span {
            color: #737373;
            font-size: 12px;
            font-weight: 700;
        }

        .history-card h3 {
            margin: 0 0 8px;
            color: #111111;
            font-size: 22px;
            font-weight: 850;
            line-height: 1.1;
        }

        .history-card p {
            margin: 0;
            color: #737373;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.55;
        }

        .history-info {
            display: grid;
            gap: 10px;
            justify-items: end;
            text-align: right;
        }

        .detail-line span {
            display: block;
            color: #737373;
            font-size: 11px;
            font-weight: 850;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 3px;
        }

        .detail-line strong {
            display: block;
            color: #111111;
            font-size: 15px;
            font-weight: 850;
            line-height: 1.25;
        }

        .status-pill {
            min-width: 92px;
            height: 34px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 13px;
            font-weight: 850;
        }

        .status-pill.is-process { background: #f7b500; }
        .status-pill.is-done { background: var(--rebox-green); }

        .empty-state {
            padding: 54px 24px;
            text-align: center;
        }

        .empty-state i {
            color: var(--rebox-green);
            font-size: 36px;
            margin-bottom: 14px;
        }

        .empty-state h2 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 850;
        }

        .empty-state p {
            margin: 0;
            color: #737373;
            font-size: 15px;
            font-weight: 650;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes heroIn {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes recipientPanelIn {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes recipientRowIn {
            from {
                opacity: 0;
                transform: translateY(16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes donorRowIn {
            from {
                opacity: 0;
                transform: translateY(14px) scale(.985);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes donorFloat {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes tabIconPop {
            0% {
                transform: scale(.92) rotate(-4deg);
            }
            55% {
                transform: scale(1.12) rotate(3deg);
            }
            100% {
                transform: scale(1) rotate(0);
            }
        }

        @keyframes menuDrop {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 1100px) {
            .riwayat-inner { padding: 22px 20px 64px; }
            .top-shell { grid-template-columns: 1fr; gap: 16px; }
            .profile-dropdown { justify-self: end; }
            .history-card { grid-template-columns: 96px minmax(0, 1fr); }
            .history-info { grid-column: 1 / -1; grid-template-columns: repeat(3, minmax(0, 1fr)); justify-items: start; text-align: left; }

            .donor-history-hero {
                grid-template-columns: 1fr;
            }

            .donor-history-art {
                display: none;
            }

            .donor-history-toolbar {
                grid-template-columns: 1fr;
            }

            .donor-history-card {
                grid-template-columns: 92px minmax(0, 1fr) minmax(120px, .5fr);
            }

            .donor-data-block {
                border-left: 0;
                padding-left: 0;
            }

            .donor-status-box,
            .donor-history-arrow {
                grid-column: auto;
            }

            .recipient-filter-bar {
                grid-template-columns: repeat(3, minmax(130px, 1fr));
                padding: 14px;
            }

            .recipient-history-card {
                grid-template-columns: 82px minmax(0, 1fr) repeat(2, minmax(120px, auto));
            }

            .recipient-status-area,
            .recipient-detail-btn {
                grid-column: auto;
            }
        }

        @media (max-width: 700px) {
            .top-nav {
                height: auto;
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
                padding: 18px 22px;
            }

            .history-panel { padding: 20px; }
            .history-card { grid-template-columns: 1fr; }
            .history-image { width: 100%; height: 190px; }
            .history-info { grid-template-columns: 1fr; }

            .donor-history-panel {
                padding: 18px;
            }

            .donor-history-card {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .donor-history-image {
                width: 100%;
                height: 170px;
            }

            .donor-history-arrow {
                width: 100%;
            }

            .recipient-history-hero {
                display: block;
            }

            .recipient-history-hero h1 {
                font-size: 34px;
            }

            .recipient-filter-bar {
                grid-template-columns: 1fr 1fr;
            }

            .recipient-history-card {
                grid-template-columns: 1fr;
                gap: 14px;
                padding: 22px;
            }

            .recipient-detail-grid,
            .feedback-grid {
                grid-template-columns: 1fr;
            }

            .recipient-category-icon {
                width: 74px;
                height: 74px;
            }
        }
    </style>

    <div class="riwayat-inner">
        <header class="top-shell">
            <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Riwayat navigation">
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
                        <img src="{{ $avatarUrl }}" alt="{{ $displayName }}">
                    @else
                        <span class="profile-avatar-fallback">{{ $initial }}</span>
                    @endif
                    <span class="profile-caret" aria-hidden="true"></span>
                </button>

                <div class="profile-menu">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        @if($isRecipient)
            <section class="recipient-history-panel">
                <div class="recipient-filter-bar">
                    @foreach ([
                        ['label' => 'Semua', 'icon' => 'fas fa-grip'],
                        ['label' => 'Menunggu', 'icon' => 'far fa-clock'],
                        ['label' => 'Diproses', 'icon' => 'fas fa-arrows-rotate'],
                        ['label' => 'Disetujui', 'icon' => 'far fa-circle-check'],
                        ['label' => 'Ditolak', 'icon' => 'far fa-circle-xmark'],
                    ] as $filter)
                        <button
                            type="button"
                            wire:click="setRecipientStatusFilter('{{ $filter['label'] }}')"
                            class="recipient-filter-tab {{ $recipientStatusFilter === $filter['label'] ? 'is-active' : '' }}"
                        >
                            <i class="{{ $filter['icon'] }}"></i>
                            {{ $filter['label'] }}
                        </button>
                    @endforeach
                </div>

                @if (count($currentHistories) > 0)
                    <div class="recipient-history-list">
                        @foreach ($currentHistories as $history)
                            @php
                                $statusClass = 'is-' . strtolower($history['status']);
                                $statusIcon = match ($history['status']) {
                                    'Menunggu' => 'far fa-clock',
                                    'Diproses' => 'fas fa-arrows-rotate',
                                    'Disetujui' => 'far fa-circle-check',
                                    'Ditolak' => 'far fa-circle-xmark',
                                    default => 'far fa-clock',
                                };
                            @endphp
                            <article class="recipient-history-card" style="--row-index: {{ $loop->index }};" wire:key="recipient-history-{{ $history['id'] ?? $loop->index }}">
                                <div class="recipient-category-icon is-{{ $history['category_key'] }}">
                                    <i class="{{ $history['icon'] }}"></i>
                                </div>

                                <div class="recipient-item-main">
                                    <span class="recipient-request-code">{{ $history['code'] }}</span>
                                    <h3>{{ $history['nama_barang'] }}</h3>
                                    <span class="recipient-item-location">
                                        <i class="far fa-building"></i>
                                        {{ $displayName }}
                                    </span>
                                </div>

                                <div>
                                    <span class="recipient-data-label">Kategori</span>
                                    <strong class="recipient-data-value">{{ $history['kategori'] }}</strong>
                                </div>

                                <div>
                                    <span class="recipient-data-label">Jumlah</span>
                                    <strong class="recipient-data-value">{{ $history['jumlah'] }}</strong>
                                </div>

                                <div class="recipient-status-area">
                                    <span class="recipient-status-pill {{ $statusClass }}">
                                        <i class="{{ $statusIcon }}"></i>
                                        {{ $history['status'] }}
                                    </span>
                                    <span class="recipient-time">{{ $history['time_ago'] }}</span>
                                </div>

                                <button type="button" class="recipient-detail-btn" wire:click="openRecipientDetail({{ $history['id'] }})">
                                    Lihat Detail
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-clock-rotate-left"></i>
                        <h2>Belum ada riwayat permintaan</h2>
                        <p>Permintaan yang kamu ajukan akan muncul di sini.</p>
                    </div>
                @endif
            </section>

            @if($showRecipientDetail && !empty($selectedRecipientRequest))
                <div class="recipient-modal-overlay" wire:key="recipient-detail-modal">
                    <section class="recipient-modal-card">
                        <div class="recipient-modal-head">
                            <div>
                                <span class="recipient-request-code">{{ $selectedRecipientRequest['code'] }}</span>
                                <h2>{{ $selectedRecipientRequest['nama_barang'] }}</h2>
                                <p>{{ $selectedRecipientRequest['deskripsi'] }}</p>
                            </div>
                            <button type="button" class="recipient-modal-close" wire:click="closeRecipientDetail" aria-label="Tutup detail">
                                <i class="fas fa-xmark"></i>
                            </button>
                        </div>

                        <div class="recipient-detail-grid">
                            <div class="recipient-detail-item">
                                <span>Status</span>
                                <strong>{{ $selectedRecipientRequest['status'] }}</strong>
                            </div>
                            <div class="recipient-detail-item">
                                <span>Donatur</span>
                                <strong>{{ $selectedRecipientRequest['donatur'] }}</strong>
                            </div>
                            <div class="recipient-detail-item">
                                <span>Kategori</span>
                                <strong>{{ $selectedRecipientRequest['kategori'] }}</strong>
                            </div>
                            <div class="recipient-detail-item">
                                <span>Jumlah</span>
                                <strong>{{ $selectedRecipientRequest['jumlah'] }}</strong>
                            </div>
                            <div class="recipient-detail-item">
                                <span>Diajukan</span>
                                <strong>{{ $selectedRecipientRequest['date'] }}</strong>
                            </div>
                            <div class="recipient-detail-item">
                                <span>Dipenuhi</span>
                                <strong>{{ $selectedRecipientRequest['fulfilled_at'] }}</strong>
                            </div>
                        </div>

                        @if($selectedRecipientRequest['status'] === 'Diproses' && ! $showFeedbackForm)
                            <div class="recipient-modal-actions">
                                <button type="button" class="recipient-action-secondary" wire:click="closeRecipientDetail">Nanti</button>
                                <button type="button" class="recipient-action-primary" wire:click="openFeedbackForm">Isi Feedback</button>
                            </div>
                        @endif

                        @if($showFeedbackForm)
                            <form class="recipient-feedback-form" wire:submit.prevent="submitFeedback">
                                <h3>Feedback Barang Diterima</h3>
                                <div class="feedback-grid">
                                    <div class="feedback-field is-wide">
                                        <label>Foto Barang Diterima</label>
                                        <input type="file" wire:model="feedback_photo" accept="image/*">
                                        @error('feedback_photo') <span class="error-text">{{ $message }}</span> @enderror
                                        @if($feedback_photo)
                                            <img src="{{ $feedback_photo->temporaryUrl() }}" class="feedback-preview" alt="Preview feedback">
                                        @endif
                                    </div>
                                    <div class="feedback-field">
                                        <label>Nama Barang</label>
                                        <input type="text" wire:model="feedback_nama_barang">
                                        @error('feedback_nama_barang') <span class="error-text">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="feedback-field">
                                        <label>Jumlah</label>
                                        <input type="number" min="1" max="1000" wire:model="feedback_jumlah">
                                        @error('feedback_jumlah') <span class="error-text">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="feedback-field">
                                        <label>Nama Donatur</label>
                                        <input type="text" value="{{ $selectedRecipientRequest['donatur'] }}" disabled>
                                    </div>
                                    <div class="feedback-field is-wide">
                                        <label>Catatan Singkat</label>
                                        <textarea wire:model="feedback_note" placeholder="Opsional, tulis kondisi barang atau ucapan terima kasih."></textarea>
                                        @error('feedback_note') <span class="error-text">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="recipient-modal-actions">
                                    <button type="button" class="recipient-action-secondary" wire:click="closeRecipientDetail">Batal</button>
                                    <button type="submit" class="recipient-action-primary">Kirim Feedback</button>
                                </div>
                            </form>
                        @endif

                        @if($selectedRecipientRequest['status'] === 'Disetujui')
                            <div class="feedback-complete-box">
                                <strong>Feedback sudah dikirim.</strong>
                                @if($selectedRecipientRequest['feedback_at'])
                                    Diterima pada {{ $selectedRecipientRequest['feedback_at'] }}.
                                @endif
                                @if($selectedRecipientRequest['feedback_photo_url'])
                                    <img src="{{ $selectedRecipientRequest['feedback_photo_url'] }}" class="feedback-preview" alt="Foto feedback barang diterima">
                                @endif
                            </div>
                        @endif
                    </section>
                </div>
            @endif
        @else
        <section class="donor-history-panel">
            <div class="donor-history-toolbar">
                <div class="donor-history-tabs {{ $tab === 'rebox' ? 'is-rebox' : '' }}" role="tablist" aria-label="Jenis riwayat donatur">
                    <button type="button" wire:click="setTab('salurkan')" class="{{ $tab === 'salurkan' ? 'is-active' : '' }}">
                        <i class="fas fa-paper-plane"></i>
                        Salurkan
                    </button>
                    <button type="button" wire:click="setTab('rebox')" class="{{ $tab === 'rebox' ? 'is-active' : '' }}">
                        <i class="fas fa-cube"></i>
                        Rebox
                    </button>
                </div>

                <div class="donor-activity-count">
                    <i class="fas fa-clock-rotate-left"></i>
                    {{ $donorHistoryTotal }} aktivitas {{ $tab === 'salurkan' ? 'salurkan' : 'Rebox' }}
                </div>

                <details class="donor-time-select" data-time-filter>
                    <summary class="donor-time-filter">
                        <i class="far fa-calendar"></i>
                        {{ $donorTimeFilterLabel }}
                        <i class="fas fa-chevron-down"></i>
                    </summary>

                    <div class="donor-time-menu">
                        @foreach([
                            ['key' => 'all', 'label' => 'Semua Waktu', 'icon' => 'far fa-calendar'],
                            ['key' => 'latest', 'label' => 'Terbaru', 'icon' => 'fas fa-arrow-down-wide-short'],
                            ['key' => 'oldest', 'label' => 'Terlama', 'icon' => 'fas fa-arrow-up-wide-short'],
                            ['key' => '30days', 'label' => '30 Hari', 'icon' => 'far fa-calendar-days'],
                            ['key' => '7days', 'label' => '7 Hari', 'icon' => 'far fa-clock'],
                        ] as $option)
                            <button
                                type="button"
                                wire:click="setDonorTimeFilter('{{ $option['key'] }}')"
                                class="donor-time-option {{ $donorTimeFilter === $option['key'] ? 'is-active' : '' }}"
                            >
                                <i class="{{ $option['icon'] }}"></i>
                                {{ $option['label'] }}
                            </button>
                        @endforeach
                    </div>
                </details>
            </div>

            @if (count($currentHistories) > 0)
                <div class="donor-history-list">
                    @foreach ($currentHistories as $history)
                        @php
                            $donorInitials = collect(explode(' ', $history['donatur'] ?? $displayName))
                                ->filter()
                                ->take(2)
                                ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
                                ->implode('');
                            $isDone = strtolower($history['status'] ?? '') === 'selesai';
                        @endphp
                        <article class="donor-history-card" style="--row-index: {{ $loop->index }};" wire:key="{{ $tab }}-history-{{ $loop->index }}">
                            <img src="{{ $history['image'] }}" class="donor-history-image" alt="{{ $history['nama_barang'] }}">

                            <div class="donor-history-main {{ $tab === 'salurkan' ? 'is-salurkan' : '' }}">
                                <div>
                                    <div class="donor-history-person {{ $tab === 'salurkan' ? '' : 'has-avatar' }}">
                                        @if($tab !== 'salurkan' && $avatarUrl)
                                            <img src="{{ $avatarUrl }}" class="donor-history-avatar" alt="{{ $history['donatur'] }}">
                                        @elseif($tab !== 'salurkan')
                                            <span class="donor-history-avatar">{{ $donorInitials ?: $initial }}</span>
                                        @endif
                                        <div>
                                            <strong>{{ $history['donatur'] }}</strong>
                                            <span>{{ ucfirst($history['role']) }}</span>
                                        </div>
                                    </div>

                                    <h3>{{ $history['nama_barang'] }}</h3>
                                </div>

                                @if ($tab === 'salurkan')
                                    <a class="recipient-map-link" href="{{ $history['maps_url'] ?? 'https://www.google.com/maps/search/?api=1&query=' . urlencode($history['tujuan'] ?? 'Penerima Rebox') }}" target="_blank" rel="noopener noreferrer">
                                        <i class="fas fa-location-dot"></i>
                                        maps
                                    </a>
                                @else
                                    <p>Dimasukkan ke {{ $history['lokasi_box'] }}.</p>
                                @endif
                            </div>

                            <div class="donor-data-block">
                                <span>{{ $tab === 'salurkan' ? 'Tujuan Donasi' : 'Lokasi Rebox' }}</span>
                                <strong>{{ $tab === 'salurkan' ? ($history['tujuan'] ?? '-') : ($history['lokasi_box'] ?? '-') }}</strong>
                                @if($tab === 'salurkan')
                                    <small>{{ $history['kategori'] ?? 'Penerima' }}</small>
                                @else
                                    <small>Box Rebox</small>
                                @endif
                            </div>

                            <div class="donor-data-block">
                                <span>Jumlah</span>
                                <strong>{{ $history['jumlah'] }}</strong>
                            </div>

                            <div class="donor-data-block">
                                <span>Tanggal</span>
                                <div class="donor-date-lines">
                                    <div><i class="far fa-calendar"></i> {{ $history['date'] }}</div>
                                    <div><i class="far fa-clock"></i> {{ $history['time'] ?? '10:30 WIB' }}</div>
                                </div>
                            </div>

                            @if ($tab === 'salurkan')
                                <div class="donor-status-box {{ $isDone ? 'is-done' : 'is-process' }}">
                                    <i class="{{ $isDone ? 'far fa-circle-check' : 'far fa-clock' }}"></i>
                                    <span>
                                        @if($isDone)
                                            Selesai<br>Disalurkan
                                        @else
                                            Proses<br>Penyaluran
                                        @endif
                                    </span>
                                </div>
                            @else
                                <div class="donor-data-block">
                                    <span>Jenis</span>
                                    <strong>Donasi Rebox</strong>
                                </div>
                            @endif

                            <button type="button" class="donor-history-arrow" aria-label="Lihat detail {{ $history['nama_barang'] }}">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </article>
                    @endforeach
                </div>

                @if($donorHistoryPageCount > 1)
                    <div class="donor-pagination" aria-label="Navigasi riwayat donatur">
                        <button type="button" wire:click="previousDonorHistoryPage" aria-label="Halaman sebelumnya">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        @for($page = 1; $page <= $donorHistoryPageCount; $page++)
                            <button
                                type="button"
                                wire:click="setDonorHistoryPage({{ $page }})"
                                class="{{ $donorHistoryPage === $page ? 'is-active' : '' }}"
                                aria-label="Halaman {{ $page }}"
                            >
                                {{ $page }}
                            </button>
                        @endfor
                        <button type="button" wire:click="nextDonorHistoryPage" aria-label="Halaman berikutnya">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-clock-rotate-left"></i>
                    <h2>Belum ada riwayat {{ $tab === 'salurkan' ? 'salurkan' : 'Rebox' }}</h2>
                    <p>Aktivitasmu akan muncul di sini setelah proses selesai dicatat.</p>
                </div>
            @endif
        </section>
        @endif
    </div>

    <script>
        function initRiwayatProfileDropdown() {
            document.querySelectorAll('[data-profile-dropdown]').forEach((dropdown) => {
                if (dropdown.dataset.ready === 'true') return;
                dropdown.dataset.ready = 'true';
                const button = dropdown.querySelector('.profile-pill');

                button?.addEventListener('click', (event) => {
                    event.stopPropagation();
                    dropdown.classList.toggle('is-open');
                });
            });

            document.querySelectorAll('[data-time-filter]').forEach((filter) => {
                if (filter.dataset.ready === 'true') return;
                filter.dataset.ready = 'true';

                filter.querySelectorAll('.donor-time-option').forEach((option) => {
                    option.addEventListener('click', () => {
                        window.setTimeout(() => filter.removeAttribute('open'), 80);
                    });
                });
            });
        }

        document.addEventListener('click', (event) => {
            document.querySelectorAll('[data-profile-dropdown].is-open').forEach((dropdown) => dropdown.classList.remove('is-open'));
            document.querySelectorAll('[data-time-filter][open]').forEach((filter) => {
                if (!filter.contains(event.target)) {
                    filter.removeAttribute('open');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', initRiwayatProfileDropdown);
        document.addEventListener('livewire:navigated', initRiwayatProfileDropdown);
        document.addEventListener('livewire:updated', initRiwayatProfileDropdown);
    </script>
</div>
