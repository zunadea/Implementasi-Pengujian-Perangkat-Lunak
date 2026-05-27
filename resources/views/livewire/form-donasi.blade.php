<div class="rebox-donation-page" data-donation-root data-step="{{ $step }}">
    <style>
        :root {
            --rebox-green: #008600;
            --rebox-green-soft: #e9f7eb;
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

        .rebox-donation-page {
            min-height: 100vh;
            overflow-x: hidden;
            color: var(--rebox-ink);
            font-family: var(--sf-pro);
            background:
                radial-gradient(circle at 86% 12%, rgba(0, 134, 0, 0.08), transparent 20%),
                radial-gradient(circle at 7% 76%, rgba(0, 134, 0, 0.05), transparent 22%),
                linear-gradient(180deg, #ffffff 0%, #ffffff 62%, #f7fcf8 100%);
            position: relative;
        }

        .donation-inner {
            width: min(100%, 1480px);
            margin: 0 auto;
            padding: 26px 44px 70px;
            position: relative;
            z-index: 1;
        }

        .top-shell {
            display: grid;
            grid-template-columns: 1fr 142px;
            align-items: center;
            gap: 42px;
            width: min(100%, 1172px);
            margin: 0 auto 42px;
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

        .profile-caret::before {
            content: "";
            display: block;
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

        .donation-card {
            width: 100%;
            margin: 0;
            border: 0;
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            backdrop-filter: none;
            padding: 0;
            animation: panelIn 0.45s ease both;
        }

        .donation-panel {
            border: 1px solid rgba(20, 32, 43, 0.07);
            background: rgba(255, 255, 255, 0.88);
            border-radius: 18px;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.07);
            backdrop-filter: blur(14px);
            padding: 26px;
        }

        .form-layout {
            display: grid;
            grid-template-columns: minmax(360px, .82fr) minmax(0, 1.28fr);
            gap: 16px;
            align-items: stretch;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }

        .section-title .icon {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 16px;
            font-weight: 650;
        }

        .section-title h2 { margin: 0 0 4px; font-size: 18px; font-weight: 620; color: #14202b; }
        .section-title p { margin: 0; color: #667085; font-size: 13px; font-weight: 450; }

        .section-title-row {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: flex-start;
            margin-bottom: 28px;
        }

        .location-count-pill {
            height: 34px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 0 16px;
            background: rgba(0, 134, 0, .08);
            color: #4b5563;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .location-count-pill i {
            color: var(--rebox-green);
        }

        .field-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .field.full { grid-column: 1 / -1; }
        .field label {
            display: block;
            color: #14202b;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0;
            text-transform: none;
            margin-bottom: 9px;
        }

        .field-box, .field-control, .field-select, .field-textarea {
            width: 100%;
            border-radius: 14px;
            background: rgba(255, 255, 255, .92);
            border: 1px solid rgba(20, 32, 43, 0.08);
            color: #111111;
            font-size: 14px;
            font-weight: 500;
            outline: none;
            transition: border 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
        }

        .field-control, .field-select { height: 50px; padding: 0 16px; }
        .field-select { appearance: none; background-image: linear-gradient(45deg, transparent 50%, #008600 50%), linear-gradient(135deg, #008600 50%, transparent 50%); background-position: calc(100% - 20px) 22px, calc(100% - 13px) 22px; background-size: 7px 7px, 7px 7px; background-repeat: no-repeat; }
        .field-textarea { min-height: 150px; resize: none; padding: 16px; line-height: 1.55; }
        .field-control:focus, .field-select:focus, .field-textarea:focus {
            background: #ffffff;
            border-color: var(--rebox-green);
            box-shadow: 0 0 0 4px rgba(0, 134, 0, 0.08);
        }

        .condition-row {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .condition-btn {
            height: 48px;
            border-radius: 13px;
            border: 1px solid rgba(20, 32, 43, 0.08);
            background: rgba(255, 255, 255, 0.9);
            color: #667085;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.22s ease;
            position: relative;
        }

        .condition-btn:hover, .condition-btn.active {
            border-color: rgba(0, 134, 0, .38);
            background: rgba(255, 255, 255, .95);
            color: var(--rebox-green);
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(0, 134, 0, 0.18);
        }

        .condition-btn.active::after {
            content: "\f058";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--rebox-green);
        }

        .info-box {
            width: fit-content;
            margin-top: 18px;
            border: 1px solid rgba(220, 38, 38, 0.12);
            border-radius: 999px;
            background: rgba(220, 38, 38, 0.035);
            padding: 4px 10px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #dc2626;
            font-size: 12px;
            font-weight: 620;
            line-height: 1.05;
        }

        .info-box i { color: #dc2626; margin-top: 0; }

        .location-panel {
            min-height: 100%;
        }

        .location-search-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 52px;
            gap: 12px;
            margin-bottom: 24px;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
        }

        .search-box input {
            width: 100%;
            height: 50px;
            border-radius: 14px;
            border: 1px solid rgba(20, 32, 43, 0.08);
            background: #ffffff;
            padding: 0 16px 0 50px;
            outline: none;
            color: #14202b;
            font-size: 14px;
            font-weight: 500;
        }

        .filter-square {
            width: 52px;
            height: 50px;
            border: 1px solid rgba(20, 32, 43, 0.08);
            border-radius: 14px;
            background: #ffffff;
            color: #667085;
            display: grid;
            place-items: center;
            cursor: pointer;
            transition: transform .2s ease, box-shadow .2s ease, color .2s ease;
        }

        .filter-square:hover {
            color: var(--rebox-green);
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(15, 23, 42, .07);
        }

        .location-list {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            align-content: start;
            gap: 18px;
            max-height: 510px;
            overflow-y: auto;
            padding: 2px 4px 4px 0;
        }

        .location-list.is-single {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .location-card {
            border: 1px solid rgba(20, 32, 43, 0.08);
            background: #ffffff;
            border-radius: 15px;
            overflow: visible;
            padding: 0;
            cursor: pointer;
            text-align: left;
            align-self: start;
            transition: 0.24s ease;
        }

        .location-card:hover, .location-card.active {
            border-color: var(--rebox-green);
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
            transform: translateY(-2px);
        }

        .location-image {
            height: 126px;
            position: relative;
            overflow: hidden;
            border-radius: 14px 14px 0 0;
        }

        .location-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: inherit;
        }

        .location-code-pill {
            position: absolute;
            left: 10px;
            bottom: 10px;
            min-height: 27px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0 10px;
            border-radius: 999px;
            background: rgba(0, 134, 0, 0.94);
            color: #ffffff;
            font-size: 11px;
            font-weight: 650;
            letter-spacing: 0;
            box-shadow: 0 10px 18px rgba(0, 80, 0, 0.18);
        }

        .location-map-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: fit-content;
            color: var(--rebox-green);
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: transform .2s ease, color .2s ease, opacity .2s ease;
        }

        .location-map-link:hover {
            color: #006b00;
            opacity: .9;
            transform: translateX(2px);
        }

        .selected-location-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }

        .selected-code-pill {
            min-height: 25px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0 9px;
            border-radius: 999px;
            background: rgba(0, 134, 0, .08);
            color: var(--rebox-green);
            font-size: 11px;
            font-weight: 650;
        }

        .location-body {
            padding: 14px 14px 16px;
            position: relative;
        }

        .location-body h3 { margin: 0 0 7px; font-size: 15px; font-weight: 650; color: #14202b; }
        .location-body p { margin: 0; color: #737373; font-size: 12px; font-weight: 500; line-height: 1.35; }
        .location-add {
            position: absolute;
            right: 12px;
            top: -26px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--rebox-green);
            color: #ffffff;
            display: grid;
            place-items: center;
            border: 4px solid #ffffff;
            font-size: 17px;
            box-shadow: inset 0 1px 5px rgba(255,255,255,0.25), 0 14px 24px rgba(0, 134, 0, 0.22);
        }

        .selected-preview {
            margin-top: 22px;
        }

        .selected-preview-title {
            margin: 0 0 12px;
            color: #4b5563;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .selected-preview-card {
            width: 100%;
            min-height: 86px;
            display: grid;
            grid-template-columns: 178px minmax(0, 1fr) 46px;
            align-items: center;
            gap: 16px;
            border: 1px solid rgba(0, 134, 0, 0.38);
            background: #ffffff;
            border-radius: 15px;
            padding: 8px 12px 8px 8px;
            box-shadow: 0 18px 38px rgba(0, 134, 0, 0.10);
            animation: panelIn 0.32s ease both;
        }

        .selected-preview-card .location-image {
            height: 70px;
            border-radius: 12px;
        }

        .selected-preview-card .location-body {
            padding: 0;
        }

        .selected-preview-card .location-body h3 {
            font-size: 17px;
            font-weight: 650;
        }

        .selected-preview-card .location-body p {
            font-size: 13px;
        }

        .selected-preview-check {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 14px 24px rgba(0, 134, 0, .18);
        }

        .selection-hint {
            display: none;
            margin: -2px 0 14px;
            color: #8a8f98;
            font-size: 12px;
            font-weight: 700;
        }

        .submit-band {
            margin-top: 28px;
            border: 1px solid rgba(20, 32, 43, 0.07);
            border-radius: 18px;
            background: rgba(255, 255, 255, .88);
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            box-shadow: 0 22px 70px rgba(15, 23, 42, 0.07);
            backdrop-filter: blur(14px);
        }

        .submit-band-text {
            display: grid;
            grid-template-columns: 48px minmax(0, 1fr);
            gap: 16px;
            align-items: center;
        }

        .submit-band-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            font-size: 20px;
        }

        .submit-band h3 { margin: 0 0 5px; font-size: 17px; font-weight: 650; color: #14202b; }
        .submit-band p { margin: 0; color: #667085; font-size: 13px; font-weight: 450; }

        .btn-main, .btn-soft {
            min-width: 142px;
            height: 50px;
            border-radius: 15px;
            font-size: 14px;
            font-weight: 650;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
        }

        .btn-main {
            border: 0;
            background: var(--rebox-green);
            color: #ffffff;
            box-shadow: 0 14px 28px rgba(0, 134, 0, 0.20);
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .btn-main:hover,
        .btn-soft:hover {
            transform: translateY(-2px);
        }

        .btn-main:active,
        .btn-soft:active {
            transform: translateY(0) scale(.98);
        }

        .btn-soft {
            border: 1px solid rgba(0, 134, 0, 0.20);
            background: #f4f7f6;
            color: #344054;
        }

        .center-card {
            width: min(100%, 680px);
            margin: 0 auto;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(0, 134, 0, 0.14);
            box-shadow: 0 24px 60px rgba(17, 17, 17, 0.10);
            padding: 42px;
            animation: panelIn 0.42s ease both;
        }

        .center-icon {
            width: 104px;
            height: 104px;
            border-radius: 28px;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 42px;
            margin-bottom: 24px;
            position: relative;
            animation: floatBox 3.8s ease-in-out infinite;
        }

        .code-spark {
            position: absolute;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #ffffff;
            color: var(--rebox-green);
            display: grid;
            place-items: center;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 0 10px 20px rgba(0, 134, 0, 0.10);
        }
        .code-spark.one { left: -18px; top: 50px; }
        .code-spark.two { right: -18px; top: 12px; }
        .code-spark.three { right: -28px; bottom: 18px; }

        .center-card h2 { margin: 0 0 14px; font-size: 34px; font-weight: 800; color: #111111; }
        .center-card > p { margin: 0 0 26px; color: #737373; font-size: 17px; font-weight: 600; line-height: 1.6; }

        .timer-pill {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 26px;
            padding: 11px 17px;
            border-radius: 999px;
            background: #fff7ed;
            color: #c2410c;
            font-size: 16px;
            font-weight: 900;
        }

        .timer-display {
            color: var(--rebox-green);
            font-size: 72px;
            line-height: 1;
            font-weight: 900;
            margin: 18px 0 28px;
            text-shadow: 0 18px 32px rgba(0, 134, 0, 0.10);
        }

        .code-info {
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            padding: 18px 20px;
            color: #4b5563;
            font-weight: 650;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .code-input { margin-bottom: 22px; }
        .upload-proof {
            border: 2px dashed rgba(0, 134, 0, 0.24);
            border-radius: 20px;
            min-height: 158px;
            background: linear-gradient(135deg, rgba(0, 134, 0, 0.035), rgba(255,255,255,0.9));
            display: grid;
            place-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            color: var(--rebox-green);
            font-weight: 800;
        }

        .upload-proof input {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-proof img { width: 100%; height: 230px; object-fit: cover; }
        .proof-note {
            display: flex;
            justify-content: space-between;
            gap: 18px;
            color: #9ca3af;
            font-size: 13px;
            font-style: italic;
            margin: 12px 0 26px;
        }
        .proof-note strong { color: #dc2626; font-style: normal; }

        .donation-modal-overlay {
            position: fixed;
            inset: 0;
            z-index: 80;
            display: grid;
            place-items: center;
            padding: 24px;
            background: rgba(248, 252, 249, 0.34);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            perspective: 1300px;
            animation: modalFadeIn .24s ease both;
        }

        .donation-flow-card {
            width: min(100%, 520px);
            max-height: calc(100vh - 48px);
            overflow-y: auto;
            border-radius: 24px;
            border: 1px solid rgba(0, 134, 0, 0.16);
            background: rgba(255, 255, 255, 0.96);
            box-shadow: 0 32px 90px rgba(15, 23, 42, 0.16), 0 18px 48px rgba(0, 134, 0, 0.10);
            padding: 28px;
            color: #14202b;
            font-family: var(--sf-pro);
            animation: modalFlipIn .58s cubic-bezier(.18,.88,.22,1.08) both;
            transform-origin: center;
            transform-style: preserve-3d;
            will-change: transform, opacity;
        }

        .donation-flow-card.is-open {
            width: min(100%, 590px);
        }

        .donation-flow-card.is-code {
            width: min(1180px, calc(100vw - 80px));
            padding: 0;
            overflow: hidden;
            border-radius: 24px;
            border-color: rgba(15, 23, 42, .05);
            background: #ffffff;
            box-shadow: 0 26px 88px rgba(15, 23, 42, .13);
        }

        .donation-flow-card.is-success {
            width: min(100%, 560px);
            text-align: center;
        }

        .scan-shell {
            display: grid;
            grid-template-columns: minmax(0, 52.2%) minmax(0, 47.8%);
            min-height: 690px;
        }

        .scan-visual {
            padding: 26px 32px;
            background:
                radial-gradient(circle at 72% 74%, rgba(22, 163, 74, .18), transparent 30%),
                radial-gradient(circle at 18% 20%, rgba(34, 197, 94, .18), transparent 31%),
                linear-gradient(145deg, #06150f 0%, #062116 50%, #07381e 100%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .scan-content {
            padding: 28px 40px 28px 38px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background:
                radial-gradient(circle at 10% 50%, rgba(0, 134, 0, .045), transparent 34%),
                radial-gradient(circle at 84% 8%, rgba(15, 23, 42, .045), transparent 28%),
                linear-gradient(180deg, #ffffff 0%, #fbfdfc 100%);
        }

        .scan-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            color: #ffffff;
            font-size: 18px;
            font-weight: 850;
        }

        .scan-safe {
            margin-left: auto;
            height: 40px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 0 16px;
            border-radius: 999px;
            color: #ffffff;
            background: rgba(255, 255, 255, .075);
            border: 1px solid rgba(255, 255, 255, .13);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .09), 0 12px 28px rgba(0, 0, 0, .13);
            font-size: 13px;
            font-weight: 850;
        }

        .scan-safe i {
            color: #65f083;
            font-size: 16px;
        }

        .scan-brand-icon {
            width: 54px;
            height: 54px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            background: linear-gradient(145deg, #15c84b, #008c28);
            color: #ffffff;
            box-shadow: 0 20px 46px rgba(0, 170, 48, 0.30);
            font-size: 22px;
        }

        .flow-head {
            text-align: center;
            margin-bottom: 20px;
        }

        .scan-content .flow-head {
            text-align: left;
            margin-bottom: 0;
        }

        .scan-content .flow-head p {
            max-width: 390px;
            margin: 0 0 20px;
        }

        .modal-icon {
            width: 66px;
            height: 66px;
            margin: 0 auto 16px;
            border-radius: 19px;
            display: grid;
            place-items: center;
            background: var(--rebox-green-soft);
            color: var(--rebox-green);
            font-size: 27px;
            box-shadow: 0 14px 28px rgba(0, 134, 0, 0.08);
            animation: floatBox 3.6s ease-in-out infinite;
        }

        .scan-content .modal-icon {
            width: 60px;
            height: 60px;
            margin: 0 0 22px;
            border-radius: 16px;
            font-size: 24px;
            background: linear-gradient(145deg, #f4fbf6, #ffffff);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .07);
            animation: none;
        }

        .donation-flow-card h2 {
            margin: 0 0 10px;
            font-size: 30px;
            line-height: 1.15;
            font-weight: 850;
            letter-spacing: 0;
            color: #14202b;
        }

        .donation-flow-card p {
            margin: 0;
            color: rgba(102, 112, 133, 0.86);
            font-size: 14px;
            font-weight: 520;
            line-height: 1.6;
        }

        .modal-info {
            border-radius: 16px;
            border: 1px solid rgba(20, 32, 43, 0.09);
            background: rgba(248, 250, 252, 0.82);
            padding: 14px 16px;
            color: #4b5563;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.7;
            margin: 18px 0 18px;
        }

        .scan-location-card {
            border: 1px solid rgba(15, 23, 42, 0.10);
            border-radius: 18px;
            padding: 18px;
            background: #ffffff;
            display: grid;
            gap: 16px;
            margin-bottom: 24px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, .07);
        }

        .scan-location-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            min-height: 50px;
        }

        .scan-location-main > div {
            position: relative;
            min-width: 0;
            min-height: 42px;
            padding-left: 58px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .scan-location-main > div::before {
            content: "\f3c5";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 46px;
            height: 46px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            color: #111827;
            background: linear-gradient(145deg, #eaf9ee, #f8fffa);
            box-shadow: 0 14px 28px rgba(0, 134, 0, .07);
        }

        .scan-location-main strong {
            display: block;
            color: #111827;
            font-size: 15px;
            font-weight: 850;
            line-height: 1.2;
        }

        .scan-location-main span {
            display: block;
            color: #667085;
            font-size: 13px;
            font-weight: 700;
            margin-top: 7px;
        }

        .scan-code-pill {
            display: none;
        }

        .scan-location-main .scan-box-code-pill {
            min-width: 78px;
            max-width: 116px;
            height: 36px;
            margin-top: 0;
            padding: 0 14px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #008600;
            background: #effaf1;
            font-size: 13px;
            font-weight: 850;
            line-height: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex: 0 0 auto;
        }

        .scan-location-main .scan-box-code-pill::before {
            display: none;
        }

        .scan-hint {
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            border-radius: 10px;
            padding: 12px 16px;
            color: #06701c;
            background: linear-gradient(135deg, #e3f7e6, #edf8ef);
            font-size: 13px;
            font-weight: 750;
            line-height: 1.35;
        }

        .scan-hint-text {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .modal-info strong {
            color: #344054;
            font-weight: 620;
        }

        .modal-input {
            min-height: 54px;
            border-radius: 16px;
            border: 1px solid rgba(0, 134, 0, 0.14);
            background: rgba(255, 255, 255, 0.96);
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 16px;
            box-shadow: 0 14px 34px rgba(15, 23, 42, 0.05);
            transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
        }

        .modal-input:focus-within {
            border-color: rgba(0, 134, 0, 0.38);
            box-shadow: 0 18px 40px rgba(0, 134, 0, 0.10);
            transform: translateY(-1px);
        }

        .modal-input i {
            width: 34px;
            height: 34px;
            border-radius: 11px;
            display: grid;
            place-items: center;
            color: #008600;
            background: #eef9f0;
            font-size: 16px;
        }

        .modal-input input {
            border: 0;
            outline: 0;
            flex: 1;
            min-width: 0;
            background: transparent;
            color: #14202b;
            font-size: 15px;
            font-weight: 520;
        }

        .modal-input input::placeholder {
            color: rgba(102, 112, 133, 0.62);
            font-weight: 520;
        }

        .qr-scanner-box {
            margin: 0;
            border-radius: 0;
            border: 0;
            background: transparent;
            overflow: hidden;
            box-shadow: none;
            backdrop-filter: blur(14px);
        }

        .qr-camera-wrap {
            min-height: 420px;
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, .16);
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, .08);
            background:
                radial-gradient(circle at center, rgba(74, 222, 128, .08), transparent 35%),
                linear-gradient(145deg, #082719, #06341e);
        }

        .qr-camera-wrap::before {
            content: "Arahkan kamera ke kode QR";
            position: absolute;
            z-index: 5;
            left: 50%;
            top: 26px;
            transform: translateX(-50%);
            min-height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 22px;
            border-radius: 999px;
            color: rgba(255, 255, 255, 0.90);
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .16);
            box-shadow: 0 16px 42px rgba(0, 0, 0, .16);
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
            pointer-events: none;
        }

        .qr-camera-wrap video {
            position: absolute;
            inset: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .qr-camera-empty {
            position: absolute;
            inset: 0;
            z-index: 2;
            display: grid;
            place-items: center;
            padding: 24px;
            color: #ffffff;
            text-align: center;
            background:
                radial-gradient(circle at center, rgba(0, 0, 0, .18), transparent 28%),
                linear-gradient(135deg, rgba(0, 38, 23, .78), rgba(0, 69, 38, .52));
        }

        .qr-camera-empty::before {
            display: none;
        }

        .qr-camera-empty.is-hidden {
            display: none;
        }

        .qr-camera-empty i {
            position: relative;
            display: grid;
            place-items: center;
            width: 86px;
            height: 74px;
            margin: 0 auto 34px;
            border-radius: 18px;
            background: transparent;
            color: #ffffff;
            font-size: 58px;
            box-shadow: none;
        }

        .qr-camera-empty strong {
            display: block;
            font-size: 20px;
            margin-bottom: 14px;
        }

        .qr-camera-empty p {
            margin: 0;
            font-size: 15px;
            font-weight: 520;
        }

        .qr-glass-code {
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

        .qr-camera-wrap:not(.is-scanning) .qr-glass-code {
            display: none;
        }

        .qr-glass-code i {
            font-size: clamp(90px, 78%, 124px);
            opacity: .58;
            filter: drop-shadow(0 2px 8px rgba(255, 255, 255, .14));
        }

        .qr-glass-code::after {
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
            animation: qrGlassScan 2.2s ease-in-out infinite alternate;
        }

        .qr-glass-code::before {
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
            animation: qrGlassScanGlow 2.2s ease-in-out infinite alternate;
        }

        .qr-scan-frame {
            position: absolute;
            z-index: 4;
            inset: 54px 28px 22px;
            border: 0;
            border-radius: 10px;
            pointer-events: none;
            box-shadow: none;
        }

        .qr-scan-frame::before {
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

        .qr-scan-frame::after {
            display: none;
        }

        .qr-scanner-actions {
            display: flex;
            gap: 14px;
            padding: 0;
            margin: 16px 0 0;
            background: transparent;
        }

        .qr-scanner-actions .btn-main,
        .qr-scanner-actions .btn-soft {
            flex: 1;
            min-width: 145px;
            height: 50px;
            border-radius: 13px;
            font-size: 15px;
        }

        .qr-scanner-actions .btn-main {
            background: linear-gradient(135deg, #18cf3c, #00a522);
            box-shadow: 0 18px 38px rgba(0, 134, 0, 0.32);
        }

        .qr-scanner-actions .btn-soft {
            color: rgba(255, 255, 255, 0.84);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.08);
        }

        .qr-scan-status {
            margin: 16px 0 0;
            border-radius: 16px;
            padding: 16px 18px 16px 54px;
            position: relative;
            color: rgba(255, 255, 255, .92);
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .09);
            font-size: 13px;
            font-weight: 650;
            line-height: 1.4;
        }

        .qr-scan-status::before {
            content: "\f05a";
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            position: absolute;
            left: 18px;
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

        .qr-scan-status.is-error {
            color: #dc2626;
        }

        .open-method-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 16px 0;
            color: #667085;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .open-method-divider::before,
        .open-method-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(102, 112, 133, 0.18);
        }

        .manual-code-title {
            margin: 0 0 12px;
            color: #111827;
            font-size: 15px;
            font-weight: 850;
        }

        .manual-code-card {
            border-radius: 18px;
            padding: 18px;
            background: #ffffff;
            border: 1px solid rgba(20, 32, 43, 0.08);
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.05);
        }

        .manual-code-card .modal-input {
            min-height: 56px;
            border-radius: 13px;
            background: #ffffff;
        }

        @keyframes qrLine {
            from { transform: translateY(-44px); }
            to { transform: translateY(116px); }
        }

        @keyframes qrGlassScan {
            from { transform: translate3d(0, 0, 0); }
            to { transform: translate3d(0, var(--qr-scan-distance), 0); }
        }

        @keyframes qrGlassScanGlow {
            from { transform: translate3d(0, 0, 0); }
            to { transform: translate3d(0, calc(var(--qr-scan-distance) - 20px), 0); }
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 18px;
        }

        .modal-actions .btn-main,
        .modal-actions .btn-soft {
            min-width: 124px;
            height: 46px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 620;
            padding: 0 22px;
        }

        .scan-content .modal-actions {
            margin-top: 22px;
            gap: 14px;
            flex-wrap: wrap;
        }

        .scan-content .modal-actions .btn-main,
        .scan-content .modal-actions .btn-soft {
            min-width: 96px;
            border-radius: 12px;
            font-weight: 800;
            padding: 0 24px;
        }

        .scan-content .modal-actions .btn-soft {
            background: #f5f6f5;
            color: #111827;
            box-shadow: none;
        }

        .scan-content .modal-actions .btn-main {
            min-width: 176px;
            background: linear-gradient(135deg, #17c43e, #00941e);
            box-shadow: 0 16px 30px rgba(0, 134, 0, .26);
        }

        .open-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            height: 34px;
            padding: 0 16px;
            border-radius: 999px;
            background: var(--rebox-green);
            color: #ffffff;
            font-size: 12px;
            font-weight: 650;
            margin-bottom: 16px;
        }

        .open-timer-display {
            color: var(--rebox-green);
            font-size: 52px;
            line-height: 1;
            font-weight: 700;
            letter-spacing: 0;
            text-align: center;
            margin: 18px 0;
            text-shadow: 0 16px 34px rgba(0, 134, 0, 0.10);
        }

        .donation-flow-card .upload-proof {
            min-height: 134px;
            border-radius: 18px;
            font-size: 15px;
            font-weight: 620;
        }

        .donation-flow-card .proof-note {
            font-size: 12px;
            margin: 10px 0 18px;
        }

        .success-flow-actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-top: 24px;
        }

        .success-flow-actions .btn-main,
        .success-flow-actions .btn-soft {
            min-width: 138px;
            height: 46px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 620;
        }

        .success-card { text-align: center; }
        .success-card .center-icon { margin: 0 auto 24px; }
        .success-card h2 { font-size: 34px; }

        .success-actions {
            display: flex;
            justify-content: center;
            gap: 14px;
            margin-top: 30px;
        }

        .error-alert, .success-alert {
            margin-top: 10px;
            padding: 12px 14px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 13px;
            font-weight: 750;
        }
        .error-alert { background: rgba(220, 38, 38, 0.10); color: #dc2626; }
        .success-alert { background: rgba(0, 134, 0, 0.10); color: var(--rebox-green); }

        @keyframes menuDrop {
            from { opacity: 0; transform: translateY(-8px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes heroIn {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes panelIn {
            from { opacity: 0; transform: translateY(18px) scale(0.985); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes floatBox {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes modalFlipIn {
            0% {
                opacity: 0;
                transform: translateY(24px) rotateX(18deg) rotateY(-24deg) scale(.92);
                filter: blur(3px);
            }
            58% {
                opacity: 1;
                transform: translateY(-4px) rotateX(-3deg) rotateY(5deg) scale(1.015);
                filter: blur(0);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotateX(0) rotateY(0) scale(1);
                filter: blur(0);
            }
        }

        @media (max-width: 980px) {
            .donation-inner { padding: 24px 28px 70px; }
            .top-shell, .form-layout { grid-template-columns: 1fr; }
            .profile-dropdown { justify-self: end; margin-top: -18px; }
            .location-panel { height: auto; }
            .location-list { max-height: 620px; }
        }
        @media (max-width: 720px) {
            .top-nav { height: auto; grid-template-columns: repeat(2, 1fr); gap: 14px; padding: 18px 22px; }
            .donation-panel, .center-card { padding: 22px; }
            .location-list { grid-template-columns: 1fr; }
            .field-grid, .condition-row { grid-template-columns: 1fr; }
            .submit-band, .success-actions { flex-direction: column; align-items: stretch; }
            .btn-main, .btn-soft { width: 100%; }
            .modal-actions { flex-direction: column; }
            .donation-flow-card { padding: 24px; }
            .donation-flow-card.is-code { padding: 0; }
            .scan-shell { grid-template-columns: 1fr; max-height: calc(100vh - 48px); overflow-y: auto; }
            .scan-visual, .scan-content { padding: 20px; }
            .qr-camera-wrap { min-height: 260px; aspect-ratio: 16 / 10; }
            .qr-glass-code {
                --qr-glass-size: 132px;
            }
            .selected-preview-card { grid-template-columns: 1fr; }
        }
    </style>

    @php
        $user = auth()->user();
        $avatarUrl = $user?->profile_photo ? asset('storage/' . $user->profile_photo) : null;
        $initial = strtoupper(substr($user->name ?? 'R', 0, 1));
    @endphp

    <div class="donation-inner">
        <header class="top-shell">
            <nav class="top-nav" aria-label="Donation navigation">
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'is-active' : '' }}" wire:navigate>Dashboard</a>
                <a href="{{ route('form-donasi', ['name' => $selectedLocation['title'] ?? 'Rebox Dago']) }}" class="{{ request()->is('form-donasi*') ? 'is-active' : '' }}" wire:navigate>Donasi</a>
                <a href="/permintaan" class="{{ request()->is('permintaan*') ? 'is-active' : '' }}" wire:navigate>Permintaan</a>
                <a href="/riwayat" class="{{ request()->is('riwayat*') ? 'is-active' : '' }}" wire:navigate>Riwayat</a>
                <a href="/profile" class="{{ request()->is('profile*') ? 'is-active' : '' }}" wire:navigate>Profil</a>
            </nav>

            <div class="profile-dropdown" data-profile-dropdown>
                <button class="profile-pill" type="button" aria-label="Buka menu profil" onclick="event.preventDefault(); event.stopImmediatePropagation(); this.closest('[data-profile-dropdown]')?.classList.toggle('is-open');">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ $user->name }}">
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

        @if(in_array($step, ['form', 'code', 'open', 'success']))
            <section class="donation-card">
                <form wire:submit.prevent="kirimDonasi">
                    <div class="form-layout">
                        <div class="donation-panel">
                            <div class="section-title">
                                <div class="icon">1</div>
                                <div>
                                    <h2>Detail Barang</h2>
                                    <p>Isi detail utama barang donasi</p>
                                </div>
                            </div>

                            <div class="field-grid">
                                <div class="field full">
                                    <label>Nama Barang</label>
                                    <input class="field-control" type="text" wire:model="nama_barang" placeholder="Contoh: Buku Pelajaran, Pakaian, Barang Elektronik">
                                    @error('nama_barang') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Kategori Barang</label>
                                    <select class="field-select" wire:model="kategori">
                                        <option value="">Pilih kategori barang</option>
                                        <option value="Pakaian">Pakaian</option>
                                        <option value="Buku">Buku</option>
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    @error('kategori') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field">
                                    <label>Jumlah Barang</label>
                                    <input class="field-control" type="number" wire:model="jumlah" min="1" max="1000" placeholder="Masukkan jumlah">
                                    @error('jumlah') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field full">
                                    <label>Kondisi Barang</label>
                                    <div class="condition-row">
                                        <button type="button" class="condition-btn {{ $kondisi === 'Baru' ? 'active' : '' }}" wire:click="$set('kondisi', 'Baru')">Baru</button>
                                        <button type="button" class="condition-btn {{ $kondisi === 'Seperti Baru' ? 'active' : '' }}" wire:click="$set('kondisi', 'Seperti Baru')">Seperti Baru</button>
                                        <button type="button" class="condition-btn {{ $kondisi === 'Layak Pakai' ? 'active' : '' }}" wire:click="$set('kondisi', 'Layak Pakai')">Layak Pakai</button>
                                    </div>
                                    @error('kondisi') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>

                                <div class="field full">
                                    <label>Deskripsi Barang</label>
                                    <textarea class="field-textarea" wire:model="deskripsi" placeholder="Contoh: Buku masih lengkap, pakaian sudah dicuci, kondisi aman digunakan. Maksimal 100 kata."></textarea>
                                    @error('deskripsi') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                </div>
                            </div>

                            <div class="selected-preview">
                                <h3 class="selected-preview-title">Lokasi Box yang Dipilih</h3>
                                <article class="selected-preview-card">
                                    <div class="location-image">
                                        <img src="{{ $selectedLocation['image'] }}" alt="{{ $selectedLocation['title'] }}">
                                        <span class="location-code-pill"><i class="fas fa-key"></i>{{ $selectedLocation['code'] }}</span>
                                    </div>
                                    <div class="location-body">
                                        <h3>{{ $selectedLocation['title'] }}</h3>
                                        <div class="selected-location-meta">
                                            <a class="location-map-link" href="{{ $selectedLocation['maps_url'] }}" target="_blank" rel="noopener noreferrer">
                                                <i class="fas fa-location-dot"></i>
                                                Klik
                                            </a>
                                        </div>
                                    </div>
                                    <span class="selected-preview-check"><i class="fas fa-check"></i></span>
                                </article>
                            </div>
                        </div>

                        <aside class="donation-panel location-panel">
                            <div class="section-title-row">
                                <div class="section-title" style="margin-bottom:0;">
                                    <div class="icon">2</div>
                                    <div>
                                        <h2>Pilih Lokasi Rebox</h2>
                                        <p>Cari lalu pilih titik Rebox terdekat dari lokasimu</p>
                                    </div>
                                </div>
                                <span class="location-count-pill">
                                    <i class="fas fa-location-dot"></i>
                                    {{ count($locations) }} Lokasi Tersedia
                                </span>
                            </div>

                            <div class="location-search-row">
                                <label class="search-box">
                                    <i class="fas fa-search"></i>
                                    <input type="text" wire:model.live="search_lokasi" placeholder="Cari Rebox Dago, Bojongsoang...">
                                </label>
                                <button type="button" class="filter-square" aria-label="Filter lokasi">
                                    <i class="fas fa-sliders"></i>
                                </button>
                            </div>
                            <p class="selection-hint">Klik dua kali pada card untuk memilih lokasi box.</p>

                            <div class="location-list {{ count($locations) === 1 ? 'is-single' : '' }}">
                                @forelse($locations as $location)
                                    <button type="button" class="location-card {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'active' : '' }}" wire:click="selectLocation('{{ $location['name'] }}')">
                                        <div class="location-image">
                                            <img src="{{ $location['image'] }}" alt="{{ $location['title'] }}">
                                            <span class="location-code-pill"><i class="fas fa-key"></i>{{ $location['code'] }}</span>
                                        </div>
                                        <div class="location-body">
                                            <h3>{{ $location['title'] }}</h3>
                                            <p>Area {{ $location['area'] }}</p>
                                            <span class="location-add"><i class="fas {{ ($selectedLocation['id'] ?? null) === $location['id'] ? 'fa-check' : 'fa-plus' }}"></i></span>
                                        </div>
                                    </button>
                                @empty
                                @endforelse
                            </div>
                        </aside>
                    </div>

                    <div class="submit-band">
                        <div class="submit-band-text">
                            <span class="submit-band-icon"><i class="fas fa-shield-heart"></i></span>
                            <div>
                                <h3>Siap Berbagi Kebaikan?</h3>
                                <p>Donasi Anda akan sangat berarti bagi mereka yang membutuhkan.</p>
                            </div>
                        </div>
                        <button type="submit" class="btn-main">
                            <i class="fas fa-paper-plane"></i> Kirim Donasi
                        </button>
                    </div>
                </form>
            </section>

            @if($step === 'code')
                <div class="donation-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="code-box-title" wire:key="donation-code-overlay">
                    <section class="donation-flow-card is-code" wire:key="donation-code-card">
                        <form wire:submit.prevent="bukaBox">
                            <div class="scan-shell">
                                <div class="scan-visual">
                                    <div class="scan-brand">
                                        <span class="scan-brand-icon"><i class="fas fa-qrcode"></i></span>
                                        <span>QR Box</span>
                                        <span class="scan-safe"><i class="fas fa-shield-heart"></i> Aman</span>
                                    </div>
                                    <div class="qr-scanner-box" data-donation-qr-scanner data-expected-code="{{ $selectedLocation['code'] }}">
                                        <div class="qr-camera-wrap">
                                            <video data-donation-qr-video autoplay muted playsinline></video>
                                            <div class="qr-glass-code" aria-hidden="true">
                                                <i class="fas fa-qrcode"></i>
                                            </div>
                                            <div class="qr-scan-frame" aria-hidden="true"></div>
                                            <div class="qr-camera-empty" data-donation-qr-empty>
                                                <div>
                                                    <i class="fas fa-camera"></i>
                                                    <strong>Kamera laptop belum aktif</strong>
                                                    <p>Klik aktifkan kamera, lalu izinkan akses kamera di browser.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="qr-scanner-actions">
                                            <button type="button" class="btn-main" data-donation-qr-start>
                                                <i class="fas fa-camera"></i> Aktifkan Kamera
                                            </button>
                                            <button type="button" class="btn-soft" data-donation-qr-stop>
                                                Matikan Kamera
                                            </button>
                                        </div>
                                        <div class="qr-scan-status" data-donation-qr-status>
                                            Kamera dimatikan.
                                        </div>
                                    </div>
                                </div>

                                <div class="scan-content">
                                    <div class="flow-head">
                                        <div class="modal-icon"><i class="fas fa-qrcode"></i></div>
                                        <h2 id="code-box-title">Scan QR Box</h2>
                                        <p>Arahkan QR ke kamera untuk membuka akses pengambilan barang. Input manual hanya dipakai kalau QR tidak terbaca.</p>
                                    </div>

                                    @if (session()->has('message'))
                                        <div class="success-alert" style="margin-bottom: 16px;"><i class="fas fa-circle-info"></i>{{ session('message') }}</div>
                                    @endif

                                    <div class="scan-location-card">
                                        <div class="scan-location-main">
                                            <div>
                                                <strong>{{ $selectedLocation['title'] }}</strong>
                                                <span>{{ $selectedLocation['area'] }}</span>
                                            </div>
                                            <span class="scan-box-code-pill">{{ $selectedLocation['code'] }}</span>
                                        </div>
                                        <div class="scan-hint">
                                            <span class="scan-hint-text">
                                                <i class="fas fa-shield-heart"></i>
                                                QR harus berisi kode lokasi ini agar box bisa dibuka.
                                            </span>
                                            <span class="scan-code-pill">{{ $selectedLocation['code'] }}</span>
                                        </div>
                                    </div>

                                    <div class="open-method-divider">atau</div>

                                    <div class="manual-code-card">
                                        <p class="manual-code-title">Masukkan kode manual</p>
                                        <label class="modal-input" aria-label="Kode box area">
                                            <i class="fas fa-lock-open"></i>
                                            <input type="text" wire:model="kode_box_input" data-donation-qr-input placeholder="Contoh: {{ $selectedLocation['code'] }}">
                                        </label>
                                        @error('kode_box_input') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                                    </div>

                                    <div class="modal-actions">
                                        <button type="button" class="btn-soft" wire:click="resetToForm">Batal</button>
                                        <button type="submit" class="btn-main" data-donation-open-submit><i class="fas fa-lock-open"></i> Buka Box</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            @endif

            @if($step === 'open')
                <div class="donation-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="open-box-title" wire:key="donation-open-overlay">
                    <section class="donation-flow-card is-open" data-open-step wire:key="donation-open-card">
                        <button type="button" data-expire-box wire:click="expireBox" style="display:none"></button>

                        <div class="flow-head">
                            <span class="open-status-pill"><i class="fas fa-lock-open"></i> Box Terbuka</span>
                            <div class="modal-icon"><i class="fas fa-briefcase"></i></div>
                            <h2 id="open-box-title">Silahkan Masukkan Barang</h2>
                            <p>Tolong masukkan barang Anda dalam kurun waktu 3 menit. Box akan otomatis tertutup saat waktu habis.</p>
                            <div class="open-timer-display" data-countdown>03:00</div>
                        </div>

                        <div class="modal-info">
                            Box: <strong>{{ $selectedLocation['code'] }}</strong><br>
                            Lokasi: <strong>{{ $selectedLocation['title'] }}</strong>
                        </div>

                        <form wire:submit.prevent="selesaiDonasi">
                            <label class="upload-proof">
                                @if($foto)
                                    <img src="{{ $foto->temporaryUrl() }}" alt="Foto bukti barang">
                                @else
                                    <div>
                                        <i class="fas fa-cloud-upload-alt" style="font-size:28px;"></i><br>
                                        Tambahkan Foto Produk<br>
                                        <span style="color:#737373; font-size:12px;">PNG, JPG up to 2MB</span>
                                    </div>
                                @endif
                                <input type="file" wire:model="foto" accept="image/png,image/jpeg">
                            </label>
                            @error('foto') <div class="error-alert"><i class="fas fa-circle-exclamation"></i>{{ $message }}</div> @enderror
                            <div class="proof-note">
                                <span>Fotokan bukti barang yang sudah dimasukkan ke dalam kotak</span>
                                <strong>*Wajib Diisi</strong>
                            </div>
                            <div class="modal-actions">
                                <button type="submit" class="btn-main">Selesai Donasi <i class="fas fa-check-circle"></i></button>
                            </div>
                        </form>
                    </section>
                </div>
            @endif
            @if($step === 'success')
                <div class="donation-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="success-donation-title" wire:key="donation-success-overlay">
                    <section class="donation-flow-card is-success" wire:key="donation-success-card">
                        <div class="flow-head">
                            <div class="modal-icon"><i class="fas fa-briefcase"></i></div>
                            <h2 id="success-donation-title">Donasi Berhasil</h2>
                            <p>Terima kasih. Foto bukti sudah tersimpan dan donasi Anda berhasil dikirim untuk diproses admin.</p>
                        </div>

                        <div class="success-flow-actions">
                            <a href="/riwayat" class="btn-main" wire:navigate>Lihat Riwayat</a>
                            <a href="/dashboard" class="btn-soft" wire:navigate>Dashboard</a>
                        </div>
                    </section>
                </div>
            @endif
        @endif
    </div>

    <script src="{{ asset('jsQR.min.js') }}"></script>
    <script>
        function initDonationPage() {
            const root = document.querySelector('[data-donation-root]');
            if (!root) return;

            const profileDropdown = root.querySelector('[data-profile-dropdown]');
            const profileButton = profileDropdown?.querySelector('.profile-pill');

            if (profileButton && profileButton.dataset.bound !== 'true') {
                profileButton.dataset.bound = 'true';
                profileButton.addEventListener('click', (event) => {
                    event.stopPropagation();
                    profileDropdown.classList.toggle('is-open');
                });
            }

            initDonationQrScanner(root);

            const isOpenStep = root.dataset.step === 'open' || !!root.querySelector('[data-open-step]');

            if (!isOpenStep) {
                if (window.reboxDonationTimer) {
                    clearInterval(window.reboxDonationTimer);
                    window.reboxDonationTimer = null;
                }
                window.reboxDonationDeadline = null;
                window.reboxDonationDisplay = null;
                window.reboxDonationActiveStep = root.dataset.step || null;
                return;
            }

            const display = root.querySelector('[data-countdown]');
            const expireButton = root.querySelector('[data-expire-box]');

            if (!display || !expireButton) return;

            if (window.reboxDonationActiveStep !== 'open' || !window.reboxDonationDeadline) {
                window.reboxDonationDeadline = Date.now() + (3 * 60 * 1000);
                window.reboxDonationActiveStep = 'open';
            }

            const render = () => {
                const remaining = Math.max(0, Math.ceil((window.reboxDonationDeadline - Date.now()) / 1000));
                const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
                const seconds = String(remaining % 60).padStart(2, '0');
                display.textContent = `${minutes}:${seconds}`;

                if (remaining <= 0) {
                    clearInterval(window.reboxDonationTimer);
                    window.reboxDonationTimer = null;
                    window.reboxDonationDeadline = null;
                    expireButton.click();
                }
            };

            render();

            if (window.reboxDonationTimer && window.reboxDonationDisplay !== display) {
                clearInterval(window.reboxDonationTimer);
                window.reboxDonationTimer = null;
            }

            window.reboxDonationDisplay = display;

            if (!window.reboxDonationTimer) {
                window.reboxDonationTimer = setInterval(render, 1000);
            }
        }

        function setDonationQrStatus(scanner, message, isError = false) {
            const status = scanner?.querySelector('[data-donation-qr-status]');
            if (!status) return;
            status.textContent = message;
            status.classList.toggle('is-error', isError);
        }

        function stopDonationQrScanner() {
            window.reboxDonationQrScanning = false;

            if (window.reboxDonationQrFrame) {
                window.cancelAnimationFrame(window.reboxDonationQrFrame);
            }

            window.reboxDonationQrFrame = null;
            window.reboxDonationQrLastValue = '';

            if (window.reboxDonationQrStream) {
                window.reboxDonationQrStream.getTracks().forEach((track) => track.stop());
                window.reboxDonationQrStream = null;
            }

            const scanner = document.querySelector('[data-donation-qr-scanner]');
            const video = scanner?.querySelector('[data-donation-qr-video]');
            const empty = scanner?.querySelector('[data-donation-qr-empty]');
            const cameraWrap = scanner?.querySelector('.qr-camera-wrap');

            if (video) {
                video.srcObject = null;
            }

            empty?.classList.remove('is-hidden');
            cameraWrap?.classList.remove('is-scanning');
        }

        function extractDonationQrCode(value) {
            const match = String(value || '').toUpperCase().match(/[A-Z]{2}-\d{2}/);
            return match ? match[0] : String(value || '').trim().toUpperCase();
        }

        async function initDonationQrScanner(root) {
            const scanner = root.querySelector('[data-donation-qr-scanner]');

            if (!scanner) {
                stopDonationQrScanner();
                return;
            }

            const video = scanner.querySelector('[data-donation-qr-video]');
            const empty = scanner.querySelector('[data-donation-qr-empty]');
            const startButton = scanner.querySelector('[data-donation-qr-start]');
            const stopButton = scanner.querySelector('[data-donation-qr-stop]');
            const input = root.querySelector('[data-donation-qr-input]');
            const submitButton = root.querySelector('[data-donation-open-submit]');
            const expectedCode = scanner.dataset.expectedCode || '';
            let scanFrameCount = 0;
            let lastScanAt = 0;

            if (scanner.dataset.bound === 'true') {
                return;
            }

            scanner.dataset.bound = 'true';

            const handleScanValue = (rawValue) => {
                const code = extractDonationQrCode(rawValue);

                if (!code) {
                    setDonationQrStatus(scanner, 'QR terbaca, tetapi kode Rebox tidak ditemukan.', true);
                    return;
                }

                if (!input || !submitButton) {
                    setDonationQrStatus(scanner, 'Input kode box belum siap. Tutup modal lalu buka lagi.', true);
                    return;
                }

                if (code !== expectedCode) {
                    setDonationQrStatus(scanner, `QR terbaca ${code}, tetapi lokasi ini membutuhkan ${expectedCode}.`, true);
                    window.reboxDonationQrLastValue = '';
                    return;
                }

                input.value = code;
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.dispatchEvent(new Event('change', { bubbles: true }));

                setDonationQrStatus(scanner, `QR ${code} cocok. Membuka box...`);
                stopDonationQrScanner();

                const livewireRoot = root.closest('[wire\\:id]') || root;
                const livewireId = livewireRoot?.getAttribute('wire:id');
                const component = livewireId && window.Livewire ? window.Livewire.find(livewireId) : null;

                if (component) {
                    component.set('kode_box_input', code).then(() => submitButton?.click());
                    return;
                }

                window.setTimeout(() => submitButton?.click(), 350);
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

                const cropCanvas = window.reboxDonationQrCropCanvas || document.createElement('canvas');
                const cropContext = cropCanvas.getContext('2d', { willReadFrequently: true });

                window.reboxDonationQrCropCanvas = cropCanvas;

                if (!cropContext) {
                    return null;
                }

                cropCanvas.width = crop.width;
                cropCanvas.height = crop.height;
                cropContext.drawImage(
                    sourceCanvas,
                    crop.x,
                    crop.y,
                    crop.width,
                    crop.height,
                    0,
                    0,
                    crop.width,
                    crop.height
                );

                const imageData = cropContext.getImageData(0, 0, crop.width, crop.height);
                return window.jsQR(imageData.data, crop.width, crop.height, {
                    inversionAttempts: 'attemptBoth',
                });
            };

            const scanLoop = () => {
                if (!window.reboxDonationQrScanning || !video) {
                    return;
                }

                const now = performance.now();

                if (video.readyState >= HTMLMediaElement.HAVE_CURRENT_DATA && now - lastScanAt >= 90) {
                    try {
                        const canvas = window.reboxDonationQrCanvas || document.createElement('canvas');
                        const context = canvas.getContext('2d', { willReadFrequently: true });
                        const sourceWidth = video.videoWidth;
                        const sourceHeight = video.videoHeight;
                        const scale = Math.min(1, 720 / Math.max(sourceWidth || 1, sourceHeight || 1));
                        const width = Math.max(1, Math.floor(sourceWidth * scale));
                        const height = Math.max(1, Math.floor(sourceHeight * scale));

                        window.reboxDonationQrCanvas = canvas;

                        if (sourceWidth && sourceHeight && width && height && context && typeof window.jsQR === 'function') {
                            lastScanAt = now;
                            canvas.width = width;
                            canvas.height = height;
                            context.drawImage(video, 0, 0, sourceWidth, sourceHeight, 0, 0, width, height);

                            const centerSize = Math.floor(Math.min(width, height) * 0.86);
                            const centerCrop = {
                                x: Math.max(0, Math.floor((width - centerSize) / 2)),
                                y: Math.max(0, Math.floor((height - centerSize) / 2)),
                                width: centerSize,
                                height: centerSize,
                            };
                            const wideHeight = Math.floor(height * 0.82);
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

                                if (scannedValue === window.reboxDonationQrLastValue && performance.now() - (window.reboxDonationQrLastSeenAt || 0) < 450) {
                                    scanFrameCount += 1;
                                    window.reboxDonationQrFrame = window.requestAnimationFrame(scanLoop);
                                    return;
                                }

                                window.reboxDonationQrLastValue = scannedValue;
                                window.reboxDonationQrLastSeenAt = performance.now();
                                handleScanValue(scannedValue);
                            }
                        } else if (typeof window.jsQR !== 'function') {
                            setDonationQrStatus(scanner, 'Decoder QR belum termuat. Refresh halaman lalu coba lagi.', true);
                        }
                    } catch (error) {
                        if (scanFrameCount % 45 === 0) {
                            setDonationQrStatus(scanner, 'Kamera aktif. Arahkan QR lebih dekat dan pastikan gambar tidak blur.', false);
                        }
                    }
                }

                scanFrameCount += 1;

                if (window.reboxDonationQrScanning) {
                    window.reboxDonationQrFrame = window.requestAnimationFrame(scanLoop);
                }
            };

            startButton?.addEventListener('click', async () => {
                if (!navigator.mediaDevices?.getUserMedia) {
                    setDonationQrStatus(scanner, 'Browser tidak mendukung akses kamera. Gunakan Chrome terbaru di laptop ini.', true);
                    return;
                }

                if (typeof window.jsQR !== 'function') {
                    setDonationQrStatus(scanner, 'Decoder QR belum termuat. Refresh halaman lalu coba lagi.', true);
                    return;
                }

                try {
                    stopDonationQrScanner();

                    try {
                        window.reboxDonationQrStream = await navigator.mediaDevices.getUserMedia({
                            video: {
                                width: { ideal: 960 },
                                height: { ideal: 540 },
                                facingMode: 'environment',
                            },
                            audio: false,
                        });
                    } catch (cameraError) {
                        window.reboxDonationQrStream = await navigator.mediaDevices.getUserMedia({
                            video: {
                                width: { ideal: 960 },
                                height: { ideal: 540 },
                            },
                            audio: false,
                        });
                    }

                    video.srcObject = window.reboxDonationQrStream;
                    empty?.classList.add('is-hidden');
                    video.closest('.qr-camera-wrap')?.classList.add('is-scanning');
                    window.reboxDonationQrScanning = true;
                    scanFrameCount = 0;
                    setDonationQrStatus(scanner, 'Kamera laptop aktif. Tampilkan QR ke kamera, box akan terbuka otomatis saat kode cocok.');
                    await video.play();
                    scanLoop();
                } catch (error) {
                    setDonationQrStatus(scanner, 'Kamera gagal aktif. Izinkan akses kamera di browser, lalu coba lagi.', true);
                }
            });

            stopButton?.addEventListener('click', () => {
                stopDonationQrScanner();
                setDonationQrStatus(scanner, 'Kamera dimatikan.');
            });
        }

        function queueDonationInit() {
            window.requestAnimationFrame(() => window.setTimeout(initDonationPage, 0));
        }

        window.addEventListener('beforeunload', stopDonationQrScanner);

        document.addEventListener('click', (event) => {
            const dropdown = document.querySelector('[data-profile-dropdown]');
            if (dropdown && !dropdown.contains(event.target)) dropdown.classList.remove('is-open');
        });

        document.addEventListener('DOMContentLoaded', queueDonationInit);
        document.addEventListener('livewire:navigated', queueDonationInit);
        document.addEventListener('livewire:initialized', queueDonationInit);
        document.addEventListener('livewire:init', () => {
            if (window.Livewire) {
                try {
                    window.Livewire.hook('morph.updated', queueDonationInit);
                    window.Livewire.hook('commit', (payload = {}) => {
                        if (typeof payload.succeed === 'function') {
                            payload.succeed(queueDonationInit);
                        } else {
                            queueDonationInit();
                        }
                    });
                } catch (error) {
                    queueDonationInit();
                }
            }
        });
        document.addEventListener('livewire:update', queueDonationInit);
        document.addEventListener('livewire:updated', queueDonationInit);

        if (!window.reboxDonationObserver) {
            window.reboxDonationObserver = new MutationObserver(queueDonationInit);
            window.reboxDonationObserver.observe(document.body, {
                childList: true,
                subtree: true,
                attributes: true,
                attributeFilter: ['data-step'],
            });
        }

        if (!window.reboxDonationWatchdog) {
            window.reboxDonationWatchdog = window.setInterval(initDonationPage, 500);
        }
    </script>
</div>
