<div class="rebox-profile-page">
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

        .rebox-profile-page {
            min-height: 100vh;
            overflow: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 78% 12%, rgba(0, 134, 0, 0.08), transparent 20%),
                radial-gradient(circle at 18% 78%, rgba(0, 134, 0, 0.055), transparent 22%),
                linear-gradient(90deg, #ffffff 0%, #ffffff 62%, #f5fcf6 100%);
            position: relative;
        }

        .rebox-profile-page::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            left: 50%;
            top: 180px;
            transform: translateX(-50%);
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 134, 0, 0.10), transparent 68%);
            filter: blur(20px);
            animation: ambientPulse 6s ease-in-out infinite alternate;
            pointer-events: none;
        }

        .profile-inner {
            width: min(100%, 1280px);
            margin: 0 auto;
            padding: 26px 54px 90px;
            position: relative;
            z-index: 1;
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

        .top-nav a:hover, .top-nav a.is-active {
            background: #8bd17d;
            color: #006b00;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.28), 0 10px 22px rgba(0, 80, 0, 0.16);
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

        .profile-hero {
            margin-bottom: 46px;
            text-align: center;
            animation: heroIn 0.8s ease both;
        }

        .profile-hero p {
            color: var(--rebox-green);
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 12px;
        }

        .profile-hero h1 {
            color: var(--rebox-green);
            font-size: 34px;
            line-height: 1.08;
            font-weight: 600;
            margin: 0;
            text-shadow: 0 14px 28px rgba(0, 134, 0, 0.08);
        }

        .profile-hero span {
            display: block;
            color: #a1a1a1;
            font-size: 15px;
            font-weight: 600;
            margin-top: 24px;
        }

        .profile-layout {
            width: min(100%, 1080px);
            margin: 0 auto;
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 30px;
            align-items: stretch;
        }

        .profile-card, .info-card {
            border: 1px solid rgba(0, 134, 0, 0.16);
            background: rgba(255, 255, 255, 0.82);
            border-radius: 26px;
            box-shadow: 0 22px 48px rgba(0, 134, 0, 0.10), 0 8px 20px rgba(17, 17, 17, 0.04);
            backdrop-filter: blur(10px);
        }

        .profile-action-icon,
        .profile-action-arrow,
        .profile-action-copy small {
            display: none;
        }

        .profile-action-copy strong {
            font: inherit;
        }

        .profile-card {
            padding: 34px 28px;
            text-align: center;
            height: 100%;
        }
        .avatar-wrap {
            width: 144px;
            height: 144px;
            margin: 0 auto 22px;
            border-radius: 50%;
            background: #f7fbf8;
            box-shadow: inset 0 0 24px rgba(0, 134, 0, 0.06), 0 14px 30px rgba(17, 17, 17, 0.08);
            position: relative;
            display: grid;
            place-items: center;
            overflow: visible;
        }
        .avatar-wrap img, .avatar-empty {
            width: 126px;
            height: 126px;
            border-radius: 50%;
            object-fit: cover;
        }
        .avatar-empty {
            display: grid;
            place-items: center;
            color: #29323d;
            background: #f1f5f2;
            font-size: 54px;
        }
        .edit-photo-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            margin-bottom: 22px;
            border-radius: 20px;
            background: rgba(0, 134, 0, 0.045);
            border: 1px solid rgba(0, 134, 0, 0.11);
        }

        .edit-photo-preview {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            overflow: hidden;
            background: #f1f5f2;
            color: #29323d;
            font-size: 28px;
            font-weight: 700;
            box-shadow: inset 0 0 18px rgba(0, 134, 0, 0.06);
            flex: 0 0 auto;
        }

        .edit-photo-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .edit-photo-copy {
            flex: 1;
            min-width: 0;
            text-align: left;
        }

        .edit-photo-copy strong {
            display: block;
            color: #111111;
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .edit-photo-copy span {
            display: block;
            color: #737373;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.4;
        }

        .edit-photo-button {
            height: 42px;
            padding: 0 16px;
            border-radius: 14px;
            border: 1px solid rgba(0, 134, 0, 0.22);
            background: #ffffff;
            color: var(--rebox-green);
            display: inline-flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
        }

        .edit-photo-button:hover {
            transform: translateY(-2px);
            background: rgba(0, 134, 0, 0.07);
            box-shadow: 0 12px 24px rgba(0, 134, 0, 0.10);
        }

        .profile-file-input {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .photo-upload-state {
            margin-top: -12px;
            margin-bottom: 18px;
            color: var(--rebox-green);
            font-size: 12px;
            font-weight: 700;
        }

        .profile-name { margin: 0; color: #111111; font-size: 24px; font-weight: 700; }
        .profile-email { margin: 8px 0 16px; color: #737373; font-size: 14px; font-weight: 600; }
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }
        .status-badge.verified { background: rgba(0, 134, 0, 0.10); color: var(--rebox-green); }
        .status-badge.pending { background: rgba(217, 119, 6, 0.12); color: #b45309; }
        .status-badge.unverified { background: rgba(115, 115, 115, 0.12); color: #5f6368; }

        .profile-stats {
            margin-top: 24px;
            padding-top: 22px;
            border-top: 1px solid rgba(17, 17, 17, 0.08);
            display: grid;
            gap: 12px;
        }
        .stat-row {
            min-height: 74px;
            border-radius: 18px;
            background: #f8faf9;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px;
            text-align: left;
        }
        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 13px;
            background: #ffffff;
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            box-shadow: inset 0 0 12px rgba(0, 134, 0, 0.08);
        }
        .stat-row strong { display: block; color: #1f2937; font-size: 18px; font-weight: 800; }
        .stat-row span { color: #737373; font-size: 12px; font-weight: 600; }

        .recipient-profile-visual {
            margin-top: 24px;
            padding-top: 22px;
            border-top: 1px solid rgba(17, 17, 17, 0.08);
        }

        .donation-scene {
            min-height: 176px;
            border-radius: 22px;
            background:
                radial-gradient(circle at 18% 20%, rgba(0, 134, 0, .09), transparent 28%),
                linear-gradient(145deg, rgba(255, 255, 255, .88), rgba(232, 250, 235, .62));
            border: 1px solid rgba(0, 134, 0, .12);
            position: relative;
            overflow: hidden;
            display: grid;
            place-items: center;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .74);
            transition: transform .26s ease, box-shadow .26s ease, border-color .26s ease;
        }

        .donation-scene:hover {
            transform: translateY(-3px);
            border-color: rgba(0, 134, 0, .24);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .82), 0 18px 34px rgba(0, 134, 0, .12);
        }

        .donation-orbit {
            position: absolute;
            width: 132px;
            height: 132px;
            border: 1px dashed rgba(0, 134, 0, .18);
            border-radius: 50%;
            animation: donationOrbit 12s linear infinite;
        }

        .floating-gift,
        .floating-heart {
            position: absolute;
            width: 34px;
            height: 34px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: rgba(255, 255, 255, .82);
            color: var(--rebox-green);
            box-shadow: 0 10px 22px rgba(0, 134, 0, .10);
            animation: donationFloat 3.8s ease-in-out infinite alternate;
        }

        .floating-gift { left: 26px; top: 32px; }
        .floating-heart { right: 28px; bottom: 34px; animation-delay: -1.4s; }

        .donation-box {
            width: 92px;
            height: 72px;
            border-radius: 14px 14px 18px 18px;
            background: linear-gradient(160deg, #8bd17d, #008600);
            color: #ffffff;
            display: grid;
            place-items: center;
            font-size: 30px;
            position: relative;
            z-index: 1;
            box-shadow: 0 18px 34px rgba(0, 134, 0, .22);
            animation: donationBoxBreath 4s ease-in-out infinite;
        }

        .donation-box::before {
            content: "";
            position: absolute;
            top: -12px;
            left: 12px;
            right: 12px;
            height: 18px;
            border-radius: 10px 10px 4px 4px;
            background: rgba(0, 134, 0, .78);
            transform: rotate(-2deg);
        }

        .donation-caption {
            margin: 14px auto 0;
            max-width: 240px;
            color: #667085;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.45;
        }

        .verify-box {
            margin-top: 24px;
            padding: 20px;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(0, 134, 0, 0.08), rgba(255, 255, 255, 0.72));
            border: 1px solid rgba(0, 134, 0, 0.12);
            text-align: left;
        }
        .verify-box h3 { margin: 0 0 8px; color: #111111; font-size: 17px; font-weight: 800; }
        .verify-box p { margin: 0 0 16px; color: #737373; font-size: 12px; font-weight: 600; line-height: 1.45; }

        .info-card { padding: 34px; }
        .info-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 26px;
        }
        .info-card h2 { margin: 0 0 8px; color: #111111; font-size: 24px; font-weight: 700; }
        .info-card p { margin: 0; color: #a1a1a1; font-size: 14px; font-weight: 600; }

        .edit-button, .ghost-button, .save-button {
            height: 46px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
        }
        .edit-button, .save-button {
            border: 0;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.24), 0 14px 28px rgba(0, 134, 0, 0.20);
            padding: 0 22px;
        }
        .ghost-button {
            border: 1px solid rgba(0, 134, 0, 0.28);
            background: rgba(255, 255, 255, 0.82);
            color: var(--rebox-green);
            padding: 0 18px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }
        .field.full { grid-column: 1 / -1; }
        .field label {
            display: block;
            color: #737373;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            margin-bottom: 9px;
        }
        .field-box {
            height: 56px;
            border-radius: 16px;
            background: #f7faf8;
            border: 1px solid rgba(0, 134, 0, 0.10);
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 17px;
            color: #737373;
        }
        .field-box input {
            width: 100%;
            border: 0;
            outline: none;
            background: transparent;
            color: #111111;
            font-size: 15px;
            font-weight: 700;
        }
        .field-box input:disabled { color: #4b5563; }
        .field-note {
            margin-top: 9px;
            color: #737373;
            font-size: 12px;
            font-weight: 600;
        }

        .password-panel {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            padding: 18px;
            border-radius: 20px;
            background: rgba(0, 134, 0, 0.045);
            animation: panelIn 0.35s ease both;
        }

        .panel-content {
            animation: cardSwitch 0.36s ease both;
            transform-origin: center top;
        }
        .panel-actions {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-top: 24px;
        }
        .panel-actions .edit-button,
        .panel-actions .ghost-button {
            width: 100%;
        }
        .panel-actions .panel-button {
            border: 1px solid rgba(0, 134, 0, 0.24);
            background: rgba(255, 255, 255, 0.88);
            color: var(--rebox-green);
            box-shadow: none;
            transition: transform 0.24s ease, background 0.24s ease, color 0.24s ease, box-shadow 0.24s ease;
        }
        .panel-actions .panel-button:hover,
        .panel-actions .panel-button.is-selected {
            border-color: transparent;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.24), 0 14px 28px rgba(0, 134, 0, 0.20);
            transform: translateY(-2px);
        }
        .action-row {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
        }
        .mode-card {
            padding: 18px;
            border-radius: 20px;
            background: rgba(0, 134, 0, 0.045);
        }
        .mode-card .form-grid {
            gap: 16px;
        }
        .status-panel {
            margin-top: 18px;
            padding: 18px;
            border-radius: 18px;
            background: rgba(0, 134, 0, 0.06);
            color: #4b5563;
            font-size: 13px;
            font-weight: 700;
            line-height: 1.5;
        }

        .form-footer {
            margin-top: 26px;
            padding: 18px;
            border-radius: 18px;
            background: #f8faf9;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }
        .form-footer p { margin: 0; color: #737373; font-size: 13px; font-weight: 600; }

        .success-alert, .error-alert {
            margin-top: 14px;
            padding: 14px 16px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            font-weight: 700;
            animation: panelIn 0.34s ease both;
        }
        .success-alert { background: rgba(0, 134, 0, 0.10); color: var(--rebox-green); }
        .error-alert { background: rgba(220, 38, 38, 0.10); color: #dc2626; }

        @keyframes menuDrop {
            from { opacity: 0; transform: translateY(-8px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes heroIn {
            from { opacity: 0; transform: translateY(22px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes panelIn {
            from { opacity: 0; transform: translateY(14px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes cardSwitch {
            from { opacity: 0; transform: rotateX(-7deg) translateY(16px); filter: blur(4px); }
            to { opacity: 1; transform: rotateX(0) translateY(0); filter: blur(0); }
        }
        @keyframes ambientPulse {
            from { opacity: 0.56; transform: translateX(-50%) scale(0.96); }
            to { opacity: 0.92; transform: translateX(-50%) scale(1.04); }
        }
        @keyframes donationOrbit {
            to { transform: rotate(360deg); }
        }
        @keyframes donationFloat {
            from { transform: translateY(0); }
            to { transform: translateY(-9px); }
        }
        @keyframes donationBoxBreath {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-3px) scale(1.03); }
        }

        @media (max-width: 1024px) {
            .profile-inner { padding: 24px 28px 70px; }
            .top-shell, .profile-layout { grid-template-columns: 1fr; }
            .profile-dropdown { justify-self: end; margin-top: -18px; }
            .password-panel { grid-template-columns: 1fr; }
            .panel-actions { grid-template-columns: 1fr; }

            .profile-hero {
                display: none;
            }

            .profile-hero p {
                display: none;
            }

            .profile-hero h1 {
                color: #08782b;
                font-size: 30px;
            }

            .profile-hero span {
                display: none;
            }

            .profile-layout {
                width: min(100%, 620px);
                gap: 18px;
            }

            .profile-card {
                height: auto;
                padding: 0;
                border: 0;
                background: transparent;
                box-shadow: none;
                backdrop-filter: none;
            }

            .profile-identity-card {
                padding: 24px 22px;
                border: 1px solid rgba(0, 134, 0, .12);
                border-radius: 22px;
                background: rgba(255, 255, 255, .9);
                box-shadow: 0 16px 38px rgba(26, 73, 38, .09);
            }

            .avatar-wrap {
                width: 118px;
                height: 118px;
                margin-bottom: 14px;
            }

            .avatar-wrap img,
            .avatar-empty {
                width: 104px;
                height: 104px;
            }

            .profile-card .profile-name {
                font-size: 20px;
            }

            .profile-card .profile-email {
                margin: 6px 0 12px;
                font-size: 12px;
            }

            .profile-card .status-badge {
                padding: 7px 13px;
                font-size: 10px;
            }

            .profile-stats {
                margin-top: 18px;
                padding-top: 0;
                border-top: 0;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                align-items: stretch;
                gap: 12px;
            }

            .stat-row {
                min-width: 0;
                min-height: 92px;
                position: relative;
                padding: 14px;
                border: 1px solid rgba(0, 134, 0, .12);
                border-radius: 18px;
                background: rgba(255, 255, 255, .88);
                box-shadow: 0 12px 28px rgba(26, 73, 38, .07);
            }

            .stat-row::after {
                content: none;
            }

            .stat-row strong {
                color: #07952b;
                font-size: clamp(13px, 2.8vw, 17px);
                overflow-wrap: anywhere;
            }

            .stat-row span {
                font-size: 11px;
                line-height: 1.35;
            }

            .info-card {
                border-radius: 20px;
                box-shadow: 0 14px 34px rgba(26, 73, 38, .08);
            }

            .info-card.is-overview {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .info-card.is-overview .panel-content {
                padding: 0;
            }

            .info-card.is-overview .info-head,
            .info-card.is-overview .form-grid {
                display: none;
            }

            .info-card.is-overview .panel-actions {
                display: grid;
                gap: 0;
                margin: 0;
                padding: 6px 16px;
            }

            .info-card.is-overview .panel-button {
                width: 100%;
                min-height: 70px;
                display: grid;
                grid-template-columns: 42px minmax(0, 1fr) 18px;
                align-items: center;
                gap: 12px;
                padding: 10px 0;
                border: 0;
                border-bottom: 1px solid rgba(17, 17, 17, .08);
                border-radius: 0;
                color: #1f2937;
                background: transparent;
                box-shadow: none;
                text-align: left;
            }

            .info-card.is-overview .panel-button:last-child {
                border-bottom: 0;
            }

            .profile-action-icon {
                width: 38px;
                height: 38px;
                display: grid;
                place-items: center;
                border: 1px solid rgba(0, 134, 0, .12);
                border-radius: 12px;
                color: var(--rebox-green);
                background: #f8fcf9;
                font-size: 16px;
            }

            .profile-action-copy strong {
                display: block;
                margin-bottom: 4px;
                font-size: 14px;
                font-weight: 750;
            }

            .profile-action-copy small {
                display: block;
                color: #737373;
                font-size: 10px;
                font-weight: 550;
            }

            .profile-action-arrow {
                display: block;
                color: var(--rebox-green);
                font-size: 12px;
                justify-self: end;
                margin-right: 14px;
            }

            .info-card.is-overview .form-footer {
                margin: 0 16px;
                padding: 12px 0 14px;
                border-top: 1px solid rgba(17, 17, 17, .08);
            }

            .info-card.is-overview .form-footer p {
                font-size: 10px;
            }
        }
        @media (max-width: 720px) {
            .profile-inner { padding: 18px 16px 54px; }
            .top-nav { height: auto; grid-template-columns: repeat(2, 1fr); gap: 14px; padding: 18px 22px; }
            .profile-hero h1 { font-size: 24px; }
            .form-grid { grid-template-columns: 1fr; }
            .info-head, .form-footer { align-items: stretch; flex-direction: column; }
            .edit-photo-card { align-items: flex-start; flex-direction: column; }
            .edit-photo-button { width: 100%; justify-content: center; }
            .edit-button, .save-button, .ghost-button { width: 100%; }
        }
    </style>

    @php
        $avatarUrl = $photo
            ? $photo->temporaryUrl()
            : ($current_photo ? asset('storage/' . $current_photo) : null);
        $initial = strtoupper(substr($username ?: 'R', 0, 1));
        $roleLabel = ucfirst($role ?: 'Donatur');
        $verificationStatus = $verification_status ?: 'unverified';
    @endphp

    <div class="profile-inner">
        <header class="top-shell" wire:ignore>
            <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Profile navigation">
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
                @if(auth()->user()?->role !== 'penerima')
                    <a href="{{ route('form-donasi') }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
                @endif
                <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
                <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
                <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
            </nav>

            <div class="profile-dropdown" data-profile-dropdown>
                <button class="profile-pill rebox-profile-identity-pill" type="button" aria-label="Buka menu profil" onclick="event.preventDefault(); event.stopImmediatePropagation(); this.closest('[data-profile-dropdown]')?.classList.toggle('is-open');">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ $username }}">
                    @else
                        <span class="profile-avatar-fallback">{{ $initial }}</span>
                    @endif
                    <span class="profile-identity">
                        <span class="profile-name">{{ $username }}</span>
                        <span class="profile-role">{{ auth()->user()?->role }}</span>
                    </span>
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

        <section class="profile-hero">
            <p>Profil Rebox</p>
            <h1>Kelola Akunmu<br>dengan Lebih Rapi</h1>
            <span>Perbarui identitas, foto profil, dan lihat ringkasan kontribusimu.</span>
        </section>

        <section class="profile-layout">
            <aside class="profile-card">
                <div class="profile-identity-card">
                    <div class="avatar-wrap">
                        @if($avatarUrl)
                            <img src="{{ $avatarUrl }}" alt="{{ $username }}">
                        @else
                            <div class="avatar-empty">{{ $initial }}</div>
                        @endif
                    </div>

                    <h2 class="profile-name">{{ $username }}</h2>
                    <p class="profile-email">{{ $email }}</p>

                    @if($verificationStatus === 'verified')
                        <span class="status-badge verified"><i class="fas fa-check-circle"></i> Akun Terverifikasi</span>
                    @elseif($verificationStatus === 'pending')
                        <span class="status-badge pending"><i class="fas fa-clock"></i> Menunggu Verifikasi</span>
                    @else
                        <span class="status-badge unverified"><i class="fas fa-circle-info"></i> Belum Terverifikasi</span>
                    @endif
                </div>

                @if(auth()->user()?->role === 'penerima')
                    <div class="recipient-profile-visual">
                        <div class="donation-scene" aria-label="Ilustrasi donasi untuk penerima">
                            <span class="donation-orbit" aria-hidden="true"></span>
                            <span class="floating-gift" aria-hidden="true"><i class="fas fa-gift"></i></span>
                            <span class="floating-heart" aria-hidden="true"><i class="fas fa-heart"></i></span>
                            <div class="donation-box" aria-hidden="true">
                                <i class="fas fa-box-open"></i>
                            </div>
                        </div>
                        <p class="donation-caption">Pantau kebutuhan yang Anda ajukan dan dukungan yang akan dipenuhi donatur.</p>
                    </div>
                @else
                    <div class="profile-stats">
                        <div class="stat-row">
                            <div class="stat-icon"><i class="fas fa-box-open"></i></div>
                            <div>
                                <strong>{{ $donation_count }} Donasi</strong>
                                <span>Jumlah donasi ke Box Rebox</span>
                            </div>
                        </div>
                        <div class="stat-row">
                            <div class="stat-icon"><i class="fas fa-hand-holding-heart"></i></div>
                            <div>
                                <strong>{{ $distribution_count }} Penyaluran</strong>
                                <span>Donasi tersalurkan ke penerima</span>
                            </div>
                        </div>
                    </div>
                @endif
            </aside>

            <section class="info-card {{ $profilePanel === 'info' ? 'is-overview' : '' }}">
                <div class="panel-content" wire:key="profile-panel-{{ $profilePanel }}">
                    @if($profilePanel === 'edit')
                        <form wire:submit.prevent="updateProfile">
                            <div class="info-head">
                                <div>
                                    <h2>Edit Profil</h2>
                                    <p>Perbarui nama tampilan akunmu. Email dan role tetap mengikuti data akun.</p>
                                </div>
                                <div class="action-row">
                                    <button type="button" class="ghost-button" wire:click="showPanel('info')">Batal</button>
                                    <button type="submit" class="save-button" wire:loading.attr="disabled" wire:target="updateProfile,photo">
                                        <span wire:loading.remove wire:target="updateProfile,photo">Simpan</span>
                                        <span wire:loading wire:target="photo">Mengunggah...</span>
                                        <span wire:loading wire:target="updateProfile">Menyimpan...</span>
                                    </button>
                                </div>
                            </div>

                            <div class="edit-photo-card">
                                <div class="edit-photo-preview">
                                    @if($avatarUrl)
                                        <img src="{{ $avatarUrl }}" alt="{{ $username }}">
                                    @else
                                        <span>{{ $initial }}</span>
                                    @endif
                                </div>
                                <div class="edit-photo-copy">
                                    <strong>Foto Profil</strong>
                                    <span>Pilih foto baru untuk mengganti tampilan profil akun.</span>
                                </div>
                                <label for="photo-upload" class="edit-photo-button">
                                    <i class="fas fa-camera"></i>
                                    Ganti Foto
                                </label>
                                <input type="file" wire:model="photo" id="photo-upload" class="profile-file-input" accept="image/png,image/jpeg,image/webp">
                            </div>
                            <div class="photo-upload-state" wire:loading wire:target="photo">
                                Mengunggah foto, tunggu sebentar sebelum menyimpan.
                            </div>
                            @error('photo') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror

                            <div class="form-grid">
                                <div class="field full">
                                    <label>Username</label>
                                    <div class="field-box">
                                        <i class="far fa-user"></i>
                                        <input type="text" wire:model="username" placeholder="Nama pengguna">
                                    </div>
                                    @error('username') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>
                                <div class="field">
                                    <label>Alamat Email</label>
                                    <div class="field-box">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" value="{{ $email }}" disabled>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Role Pengguna</label>
                                    <div class="field-box">
                                        <i class="fas fa-shield-alt"></i>
                                        <input type="text" value="{{ $roleLabel }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer">
                                <p><i class="fas fa-info-circle"></i> Foto maksimal 5MB. Email dan role bersifat permanen.</p>
                            </div>
                        </form>
                    @elseif($profilePanel === 'password')
                        <form wire:submit.prevent="updatePassword">
                            <div class="info-head">
                                <div>
                                    <h2>Ubah Password</h2>
                                    <p>Masukkan password lama, lalu buat password baru untuk akun Rebox.</p>
                                </div>
                                <div class="action-row">
                                    <button type="button" class="ghost-button" wire:click="showPanel('info')">Batal</button>
                                    <button type="submit" class="save-button" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Simpan</span>
                                        <span wire:loading>Menyimpan...</span>
                                    </button>
                                </div>
                            </div>

                            <div class="mode-card">
                                <div class="form-grid">
                                    <div class="field">
                                        <label>Password Saat Ini</label>
                                        <div class="field-box">
                                            <i class="fas fa-key"></i>
                                            <input type="password" wire:model="current_password" placeholder="Password lama">
                                        </div>
                                        @error('current_password') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                    </div>
                                    <div class="field">
                                        <label>Password Baru</label>
                                        <div class="field-box">
                                            <i class="fas fa-lock"></i>
                                            <input type="password" wire:model="new_password" placeholder="Password baru">
                                        </div>
                                        @error('new_password') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                    </div>
                                    <div class="field">
                                        <label>Ulangi Password</label>
                                        <div class="field-box">
                                            <i class="fas fa-check-circle"></i>
                                            <input type="password" wire:model="new_password_confirmation" placeholder="Ulangi password">
                                        </div>
                                    </div>
                                    <div class="field full">
                                        <div class="field-note">Minimal 8 karakter, wajib ada huruf, angka, dan simbol.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer">
                                <p><i class="fas fa-info-circle"></i> Password akan diperbarui setelah data valid.</p>
                            </div>
                        </form>
                    @elseif($profilePanel === 'verification')
                        <div class="info-head">
                            <div>
                                <h2>Verifikasi Akun</h2>
                                <p>Kirim data singkat agar admin bisa meninjau identitas akunmu.</p>
                            </div>
                            <button type="button" class="ghost-button" wire:click="showPanel('info')">Kembali</button>
                        </div>

                        @if($verificationStatus === 'verified')
                            <div class="status-panel">
                                <i class="fas fa-check-circle"></i> Akunmu sudah terverifikasi dan disetujui oleh admin.
                            </div>
                        @elseif($verificationStatus === 'pending')
                            <div class="status-panel">
                                <i class="fas fa-clock"></i> Data verifikasi sudah dikirim. Mohon tunggu sampai admin Rebox menyetujui akunmu.
                            </div>
                        @else
                            <form wire:submit.prevent="submitVerification">
                                <div class="mode-card">
                                    <div class="form-grid">
                                        <div class="field">
                                            <label>Username</label>
                                            <div class="field-box">
                                                <i class="far fa-user"></i>
                                                <input type="text" wire:model="verification_username" placeholder="Username">
                                            </div>
                                            @error('verification_username') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                        </div>
                                        <div class="field">
                                            <label>NIK</label>
                                            <div class="field-box">
                                                <i class="far fa-id-card"></i>
                                                <input type="text" wire:model="verification_nik" placeholder="16 digit NIK">
                                            </div>
                                            @error('verification_nik') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                        </div>
                                        <div class="field full">
                                            <label>Nama Lengkap di NIK</label>
                                            <div class="field-box">
                                                <i class="far fa-address-card"></i>
                                                <input type="text" wire:model="verification_nik_name" placeholder="Nama lengkap sesuai NIK">
                                            </div>
                                            @error('verification_nik_name') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-footer">
                                    <p><i class="fas fa-info-circle"></i> Data akan ditinjau admin sebelum status akun berubah.</p>
                                    <button type="submit" class="save-button" wire:loading.attr="disabled">
                                        <span wire:loading.remove>Kirim Verifikasi</span>
                                        <span wire:loading>Mengirim...</span>
                                    </button>
                                </div>
                            </form>
                        @endif
                    @else
                        <div class="info-head">
                            <div>
                                <h2>Informasi Pribadi</h2>
                                <p>Data utama ditampilkan read-only. Gunakan tombol di bawah untuk mengubah data akun.</p>
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="field full">
                                <label>Username</label>
                                <div class="field-box">
                                    <i class="far fa-user"></i>
                                    <input type="text" value="{{ $username }}" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Alamat Email</label>
                                <div class="field-box">
                                    <i class="far fa-envelope"></i>
                                    <input type="email" value="{{ $email }}" disabled>
                                </div>
                            </div>
                            <div class="field">
                                <label>Role Pengguna</label>
                                <div class="field-box">
                                    <i class="fas fa-shield-alt"></i>
                                    <input type="text" value="{{ $roleLabel }}" disabled>
                                </div>
                            </div>
                            <div class="field full">
                                <label>Password</label>
                                <div class="field-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" value="password-rebox" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="panel-actions">
                            <button type="button" class="ghost-button panel-button" wire:click="showPanel('edit')">
                                <span class="profile-action-icon"><i class="fas fa-user-edit"></i></span>
                                <span class="profile-action-copy"><strong>Edit Profil</strong><small>Perbarui informasi pribadi kamu</small></span>
                                <i class="fas fa-chevron-right profile-action-arrow"></i>
                            </button>
                            <button type="button" class="ghost-button panel-button" wire:click="showPanel('password')">
                                <span class="profile-action-icon"><i class="fas fa-lock"></i></span>
                                <span class="profile-action-copy"><strong>Ubah Password</strong><small>Atur ulang kata sandi akunmu</small></span>
                                <i class="fas fa-chevron-right profile-action-arrow"></i>
                            </button>
                            <button type="button" class="ghost-button panel-button" wire:click="showPanel('verification')">
                                <span class="profile-action-icon"><i class="fas fa-shield-alt"></i></span>
                                <span class="profile-action-copy"><strong>Verifikasi Akun</strong><small>Tingkatkan keamanan akunmu</small></span>
                                <i class="fas fa-chevron-right profile-action-arrow"></i>
                            </button>
                        </div>

                        <div class="form-footer">
                            <p><i class="fas fa-info-circle"></i> Email dan role bersifat permanen.</p>
                        </div>
                    @endif
                </div>

                @if (session()->has('message'))
                    <div class="success-alert"><i class="fas fa-check-circle"></i>{{ session('message') }}</div>
                @endif
                @if (session()->has('verification_message'))
                    <div class="success-alert"><i class="fas fa-check-circle"></i>{{ session('verification_message') }}</div>
                @endif
            </section>
        </section>
    </div>

    <script>
        function initReboxProfile() {
            const root = document.querySelector('.rebox-profile-page');
            if (!root || root.dataset.ready === 'true') return;
            root.dataset.ready = 'true';

            const profileDropdown = root.querySelector('[data-profile-dropdown]');
            const profileButton = profileDropdown?.querySelector('.profile-pill');

            profileButton?.addEventListener('click', (event) => {
                event.stopPropagation();
                profileDropdown.classList.toggle('is-open');
            });

            document.addEventListener('click', (event) => {
                if (profileDropdown && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.remove('is-open');
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') profileDropdown?.classList.remove('is-open');
            });
        }

        document.addEventListener('DOMContentLoaded', initReboxProfile);
        document.addEventListener('livewire:navigated', initReboxProfile);
    </script>
</div>
