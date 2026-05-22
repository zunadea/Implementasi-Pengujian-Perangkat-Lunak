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
            padding: 9px 18px;
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
        }

        .hero-hand-receive {
            right: -278px;
            top: 334px;
            transform: rotate(-2deg);
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
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes lowerAmbient {
            from {
                transform: translateX(-50%) translateY(0) scale(1);
            }
            to {
                transform: translateX(-50%) translateY(28px) scale(1.02);
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
            background: rgba(255, 255, 255, 0.78);
            color: var(--rebox-green);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 800;
            text-decoration: none;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.24);
            cursor: pointer;
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
            font-size: 96px;
            font-weight: 800;
            line-height: 0.9;
            color: #111111;
        }

        .total-number span {
            display: block;
            color: rgba(17, 17, 17, 0.65);
            font-size: 46px;
            line-height: 1.1;
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
            }
        }
    </style>

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
        $locations = [
            ['name' => 'Dago', 'image' => $cardImages[0]],
            ['name' => 'Lembang', 'image' => $cardImages[1]],
            ['name' => 'Braga', 'image' => $cardImages[2]],
            ['name' => 'Cihampelas', 'image' => $cardImages[3]],
            ['name' => 'Gedebage', 'image' => $cardImages[0]],
            ['name' => 'Cibaduyut', 'image' => $cardImages[1]],
            ['name' => 'Ciwidey', 'image' => $cardImages[2]],
            ['name' => 'Pangalengan', 'image' => $cardImages[3]],
            ['name' => 'Bojongsoang', 'image' => $cardImages[0]],
            ['name' => 'Setiabudi', 'image' => $cardImages[1]],
            ['name' => 'Pasteur', 'image' => $cardImages[2]],
            ['name' => 'Antapani', 'image' => $cardImages[3]],
            ['name' => 'Arcamanik', 'image' => $cardImages[0]],
            ['name' => 'Ujungberung', 'image' => $cardImages[1]],
            ['name' => 'Soreang', 'image' => $cardImages[2]],
            ['name' => 'Padalarang', 'image' => $cardImages[3]],
            ['name' => 'Cimahi', 'image' => $cardImages[0]],
            ['name' => 'Jatinangor', 'image' => $cardImages[1]],
            ['name' => 'Dayeuhkolot', 'image' => $cardImages[2]],
            ['name' => 'Cileunyi', 'image' => $cardImages[3]],
        ];
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
                <button class="profile-pill" type="button" aria-label="Buka menu profil">
                    @if($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="{{ auth()->user()->name }}">
                    @else
                        <span class="profile-avatar-fallback">{{ strtoupper(substr(auth()->user()->name ?? 'R', 0, 1)) }}</span>
                    @endif
                    <span class="profile-caret" aria-hidden="true"></span>
                </button>

                <div class="profile-menu">
                    <a href="/profile" wire:navigate>Profil Saya</a>
                    <a href="/riwayat" wire:navigate>Riwayat</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
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
                    <article class="box-card" data-card-index="{{ $index }}" data-card-link="{{ auth()->user()?->role === 'penerima' ? '' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" data-rebox-name="{{ $location['name'] }}" data-rebox-image="{{ $location['image'] }}">
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
                    <article class="box-card" data-card-link="{{ auth()->user()?->role === 'penerima' ? '' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" data-rebox-name="{{ $location['name'] }}" data-rebox-image="{{ $location['image'] }}">
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
            <h2>Total Donasi<br>{{ auth()->user()->name ?? 'Muhammad Rheivandy' }}</h2>
            <div class="total-number">
                <span>45</span>
                46
                <span>47</span>
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

            detailToggle?.addEventListener('click', () => {
                const isOpen = detailPanel.classList.toggle('is-open');
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
