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
            min-height: 64px;
            width: 250px;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.42);
            border-radius: 999px;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.08), rgba(255, 255, 255, 0.015) 46%, rgba(0, 70, 25, 0.035));
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
            padding: 7px 16px 7px 8px;
            cursor: pointer;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.68),
                inset 0 -1px 1px rgba(0, 75, 25, 0.16),
                inset 8px 8px 18px rgba(255, 255, 255, 0.035),
                0 14px 30px rgba(0, 80, 20, 0.10);
            backdrop-filter: blur(20px) saturate(165%) contrast(108%);
            -webkit-backdrop-filter: blur(20px) saturate(165%) contrast(108%);
            transition: transform 0.24s ease, background 0.24s ease, box-shadow 0.24s ease;
        }

        .profile-pill:hover,
        .profile-dropdown.is-open .profile-pill {
            transform: translateY(-2px);
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.12), rgba(255, 255, 255, 0.025) 46%, rgba(0, 70, 25, 0.05));
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

        .profile-identity {
            min-width: 0;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 3px;
            text-align: left;
            line-height: 1.05;
        }

        .profile-name {
            width: 100%;
            overflow: hidden;
            color: #075f24;
            font-size: 14px;
            font-weight: 750;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .profile-role {
            color: rgba(7, 95, 36, 0.72);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0;
            text-transform: capitalize;
        }

        .profile-caret {
            width: 18px;
            height: 18px;
            flex: 0 0 18px;
            display: grid;
            place-items: center;
        }

        .profile-caret::before {
            content: "";
            width: 16px;
            height: 13px;
            background: #087327;
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
            overflow: hidden;
        }

        .inventory-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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

        .inventory-photo-empty {
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
            color: var(--rebox-green);
            font-size: 26px;
        }

        .inventory-empty {
            min-height: 220px;
            display: grid;
            place-items: center;
            align-content: center;
            gap: 8px;
            border: 1px dashed rgba(255, 255, 255, .62);
            border-radius: 18px;
            color: #31553a;
            background: rgba(255, 255, 255, .42);
            text-align: center;
            padding: 28px;
        }

        .inventory-empty i {
            font-size: 34px;
            color: var(--rebox-green);
        }

        .inventory-empty span {
            font-size: 12px;
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

            .profile-pill {
                width: min(250px, 48vw);
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
            .top-shell.rebox-menu-ready > .profile-dropdown .profile-pill {
                width: min(230px, 62vw);
                max-width: none;
            }

            .profile-pill img,
            .profile-avatar-fallback {
                width: 42px;
                height: 42px;
                flex: 0 0 42px;
            }

            .profile-name {
                font-size: 12px;
            }

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

            .welcome-text {
                margin-bottom: 34px;
                font-size: 21px;
            }

            .hero-title {
                margin-bottom: 30px;
                font-size: 30px;
                line-height: 1.14;
            }

            .hero-subtitle {
                margin-bottom: 36px;
                font-size: 13px;
                line-height: 1.4;
            }

            .hero-hand {
                display: none;
            }

            .carousel-window {
                grid-template-columns: 1fr;
                justify-items: center;
            }

            .all-locations {
                width: calc(100% + 28px);
                margin-right: -14px;
                margin-left: -14px;
                overflow: hidden;
            }

            .detail-grid {
                display: flex;
                justify-content: flex-start;
                gap: 18px;
                width: 100%;
                padding: 12px 14px 24px;
                overflow-x: auto;
                overflow-y: hidden;
                scroll-snap-type: x mandatory;
                scroll-padding-inline: 14px;
                overscroll-behavior-inline: contain;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: thin;
                scrollbar-color: rgba(0, 134, 0, .38) transparent;
            }

            .detail-grid::-webkit-scrollbar {
                height: 5px;
            }

            .detail-grid::-webkit-scrollbar-thumb {
                border-radius: 999px;
                background: rgba(0, 134, 0, .38);
            }

            .detail-grid .box-card {
                flex: 0 0 min(78vw, 288px);
                width: min(78vw, 288px);
                scroll-snap-align: center;
                scroll-snap-stop: always;
            }

            .category-strip {
                width: min(100%, 340px);
                margin-inline: auto;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                justify-content: center;
                justify-items: center;
                gap: 28px 12px;
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
                max-width: min(100%, 420px);
                justify-self: center;
                font-size: 28px;
                line-height: 1.12;
                overflow-wrap: anywhere;
            }

            .total-number {
                min-height: 112px;
                font-size: 68px;
            }

            .total-number-current {
                min-width: 110px;
                font-size: 68px;
            }

            .total-number-prev,
            .total-number-next {
                font-size: 30px;
            }

            .quote-box {
                font-size: 16px;
                line-height: 1.25;
            }

            .steps-section h3 {
                font-size: 15px;
            }

            .step-number {
                font-size: 36px;
            }

            .step-copy {
                font-size: 13px;
                line-height: 1.2;
            }

            .step-copy strong {
                font-size: 15px;
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

            .step-one-number { order: 1; }
            .step-one-copy { order: 2; }
            .step-two-number { order: 3; }
            .step-two-copy { order: 4; }
            .step-three-number { order: 5; }
            .step-three-copy { order: 6; }

            .steps-section {
                margin-bottom: 42px;
            }

            .credit-line {
                margin-top: 34px;
            }

            .modern-card {
                min-height: auto;
                margin-bottom: 54px;
                padding: 12px 0;
                grid-template-columns: 1fr;
                text-align: center;
                border: 0;
                border-radius: 0;
                background: transparent;
                box-shadow: none;
                overflow: visible;
            }

            .modern-card small {
                font-size: 10px;
            }

            .modern-card h2 {
                font-size: 24px;
                line-height: 1.12;
                margin-top: 12px;
                margin-bottom: 18px;
            }

            .modern-card p {
                font-size: 12px;
                line-height: 1.4;
            }

            .modern-card h2,
            .modern-card p {
                margin-left: auto;
                margin-right: auto;
            }

            .modern-mockup {
                justify-content: center;
                min-height: 160px;
                transform: none;
            }

            .modern-mockup img {
                width: min(78%, 380px);
                max-height: 230px;
                object-position: center;
                margin-inline: auto;
                transform: translateX(7%);
            }

            .footer-links {
                flex-wrap: wrap;
                gap: 14px 24px;
                margin-bottom: 0;
            }

            .footer-dashboard {
                width: 100vw;
                height: 44px;
                margin: 0 calc(50% - 50vw) -70px;
                padding: 0;
                border-radius: 0;
                background: transparent;
                box-shadow: none;
                opacity: 1 !important;
                visibility: visible;
                transform: none !important;
                z-index: 2;
            }

            .footer-dashboard::before,
            .footer-dashboard::after {
                display: block;
                top: 0;
                bottom: auto;
                width: 18%;
                height: 100%;
                background: var(--rebox-green);
                box-shadow: 0 -5px 18px rgba(0, 134, 0, 0.24);
            }

            .footer-dashboard::before {
                left: 0;
                border-radius: 0 28px 0 0;
            }

            .footer-dashboard::after {
                right: 0;
                border-radius: 28px 0 0 0;
            }

            .footer-dashboard > * {
                display: none;
            }
        }

        @media (max-width: 640px) {
            .welcome-text {
                margin-bottom: 26px;
                font-size: 17px;
            }

            .hero-title {
                margin-bottom: 24px;
                font-size: 25px;
            }

            .hero-subtitle {
                font-size: 12px;
            }

            .donation-total h2 {
                max-width: 280px;
                font-size: 22px;
                line-height: 1.16;
            }

            .total-number {
                min-height: 88px;
                font-size: 52px;
            }

            .total-number-window {
                gap: 4px;
            }

            .total-number-current {
                min-width: 82px;
                font-size: 52px;
            }

            .total-number-prev,
            .total-number-next {
                font-size: 23px;
            }

            .quote-box {
                font-size: 14px;
                line-height: 1.28;
            }

            .steps-section h3 {
                font-size: 13px;
            }

            .step-number {
                font-size: 32px;
            }

            .step-copy {
                font-size: 11px;
            }

            .step-copy strong {
                font-size: 13px;
            }

            .modern-card {
                margin-bottom: 8px;
                padding-inline: 8px;
            }

            .modern-card h2 {
                max-width: 270px;
                font-size: 20px;
                line-height: 1.12;
            }

            .modern-card p {
                max-width: 270px;
                font-size: 11px;
                line-height: 1.38;
            }

            .steps-section {
                margin-bottom: 30px;
            }

            .credit-line {
                margin-top: 26px;
            }

            .modern-mockup {
                min-height: 135px;
            }

            .modern-mockup img {
                width: min(72%, 290px);
                max-height: 175px;
                transform: translateX(7%);
            }

            .footer-dashboard {
                height: 28px;
            }

            .footer-dashboard::before,
            .footer-dashboard::after {
                width: 22%;
                border-radius: 0 18px 0 0;
            }

            .footer-dashboard::after {
                border-radius: 18px 0 0 0;
            }

            .carousel-stage {
                grid-template-columns: repeat(2, 48px);
                grid-template-rows: auto 48px;
                justify-content: center;
                column-gap: 18px;
                row-gap: 14px;
            }

            .carousel-window {
                grid-column: 1 / -1;
                grid-row: 1;
                width: 100%;
                min-height: 370px;
            }

            .carousel-arrow {
                width: 46px;
                height: 46px;
                align-self: center;
                font-size: 22px;
            }

            [data-carousel-prev] {
                grid-column: 1;
                grid-row: 2;
            }

            [data-carousel-next] {
                grid-column: 2;
                grid-row: 2;
            }
        }
    </style>

    @php
        $firstName = explode(' ', auth()->user()->name ?? 'Rhei')[0];
        $avatarUrl = auth()->user()?->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : null;
        $handGive = asset('images/TanganAtasMemberi.png');
        $handReceive = asset('images/TanganBawahMenerima.png');
        $locations = \App\Support\ReboxLocations::all();
    @endphp

    <div class="dashboard-inner">
        <header class="top-shell reveal" wire:ignore>
            <nav class="top-nav {{ auth()->user()?->role === 'penerima' ? 'is-recipient' : '' }}" aria-label="Dashboard navigation">
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
                        <img src="{{ $avatarUrl }}" alt="{{ auth()->user()->name }}">
                    @else
                        <span class="profile-avatar-fallback">{{ strtoupper(substr(auth()->user()->name ?? 'R', 0, 1)) }}</span>
                    @endif
                    <span class="profile-identity">
                        <span class="profile-name">{{ auth()->user()->name }}</span>
                        <span class="profile-role">{{ auth()->user()->role }}</span>
                    </span>
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
            <p class="welcome-text">Selamat Datang Di Rebox</p>
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
            <a href="{{ auth()->user()?->role === 'penerima' ? route('permintaan') : route('form-donasi') }}" class="donate-cta" wire:navigate>
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
                    <article class="box-card" data-card-index="{{ $index }}" data-card-link="{{ auth()->user()?->role === 'penerima' ? '' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" data-rebox-id="{{ $location['id'] }}" data-rebox-name="{{ $location['name'] }}" data-rebox-code="{{ $location['code'] }}" data-rebox-image="{{ $location['image'] }}">
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
                    <article class="box-card" data-card-link="{{ auth()->user()?->role === 'penerima' ? '' : route('form-donasi', ['name' => 'Rebox ' . $location['name']]) }}" data-rebox-id="{{ $location['id'] }}" data-rebox-name="{{ $location['name'] }}" data-rebox-code="{{ $location['code'] }}" data-rebox-image="{{ $location['image'] }}">
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

                        <div class="inventory-list" data-inventory-list></div>
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
                <div class="step-number step-one-number">01</div>
                <div class="step-copy step-one-copy">
                    <strong>Daftar & Login</strong>
                    Buat akunmu dan masuk ke Rebox dengan mudah
                </div>

                <div></div>
                <div class="step-line"></div>
                <div></div>

                <div class="step-copy left step-two-copy">
                    <strong>Temukan Box Rebox</strong>
                    Cari dan temukan Rebox terdekat dan lakukan donasi
                </div>
                <div class="step-number step-two-number">02</div>
                <div></div>

                <div></div>
                <div class="step-line"></div>
                <div></div>

                <div></div>
                <div class="step-number step-three-number">03</div>
                <div class="step-copy step-three-copy">
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
                <span>Kepedulian</span>
                <span>Keberlanjutan</span>
                <span>Dampak</span>
                <span>Transparansi</span>
                <span>Komunitas</span>
            </div>
            <p class="footer-copy">
                Berbagi lebih banyak, mengurangi limbah, dan terhubung melalui kebaikan. Nilai terbesar barang layak pakai bukan saat disimpan, tetapi saat menciptakan cerita baru bagi mereka yang membutuhkan.
            </p>
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
            const inventoryList = root.querySelector('[data-inventory-list]');
            const inventoryByLocation = @json($inventoryByLocation);

            function renderInventory(reboxId, reboxName) {
                if (!inventoryList) return;

                inventoryList.replaceChildren();
                const donations = inventoryByLocation[String(reboxId)] || [];

                if (!donations.length) {
                    const empty = document.createElement('div');
                    empty.className = 'inventory-empty';
                    const emptyIcon = document.createElement('i');
                    emptyIcon.className = 'fas fa-box-open';
                    emptyIcon.setAttribute('aria-hidden', 'true');

                    const emptyTitle = document.createElement('strong');
                    emptyTitle.textContent = 'Belum ada barang';

                    const emptyDescription = document.createElement('span');
                    emptyDescription.textContent = 'Belum ada donasi yang tercatat di lokasi ini.';

                    empty.append(emptyIcon, emptyTitle, emptyDescription);
                    inventoryList.appendChild(empty);
                    return;
                }

                donations.forEach((donation) => {
                    const card = document.createElement('article');
                    card.className = 'inventory-donation-card';

                    const mediaColumn = document.createElement('div');
                    const donorHeader = document.createElement('div');
                    donorHeader.className = 'inventory-donor';

                    const donorProfile = document.createElement('div');
                    donorProfile.className = 'inventory-donor-profile';

                    const avatar = document.createElement('span');
                    avatar.className = 'inventory-avatar';

                    const donorIdentity = document.createElement('div');
                    const donorName = document.createElement('div');
                    donorName.className = 'inventory-donor-name';
                    donorName.textContent = donation.donor;

                    const donorRole = document.createElement('div');
                    donorRole.className = 'inventory-donor-role';
                    donorRole.textContent = 'Donatur';

                    const donationDate = document.createElement('span');
                    donationDate.className = 'inventory-date';
                    donationDate.textContent = donation.date;

                    const itemPhoto = document.createElement('div');
                    itemPhoto.className = 'inventory-item-photo';

                    if (donation.donor_avatar) {
                        const avatarImage = document.createElement('img');
                        avatarImage.src = donation.donor_avatar;
                        avatarImage.alt = `Foto profil ${donation.donor}`;
                        avatar.appendChild(avatarImage);
                    } else {
                        avatar.textContent = String(donation.donor || 'D').trim().charAt(0).toUpperCase();
                    }

                    if (donation.image) {
                        const image = document.createElement('img');
                        image.src = donation.image;
                        image.alt = donation.item;
                        itemPhoto.appendChild(image);
                    } else {
                        const emptyPhoto = document.createElement('span');
                        emptyPhoto.className = 'inventory-photo-empty';
                        const emptyPhotoIcon = document.createElement('i');
                        emptyPhotoIcon.className = 'fas fa-box';
                        emptyPhotoIcon.setAttribute('aria-hidden', 'true');
                        emptyPhoto.appendChild(emptyPhotoIcon);
                        itemPhoto.appendChild(emptyPhoto);
                    }

                    donorIdentity.append(donorName, donorRole);
                    donorProfile.append(avatar, donorIdentity);
                    donorHeader.append(donorProfile, donationDate);
                    mediaColumn.append(donorHeader, itemPhoto);

                    const itemInfo = document.createElement('div');
                    itemInfo.className = 'inventory-item-info';

                    [
                        ['Nama Barang', donation.item],
                        ['Lokasi Box', `Rebox ${reboxName}`],
                        ['Jumlah', `${donation.amount} Pcs`],
                    ].forEach(([label, value]) => {
                        const field = document.createElement('div');
                        const fieldLabel = document.createElement('strong');
                        const fieldValue = document.createElement('span');
                        fieldLabel.textContent = label;
                        fieldValue.textContent = value;
                        field.append(fieldLabel, fieldValue);
                        itemInfo.appendChild(field);
                    });

                    card.append(mediaColumn, itemInfo);
                    inventoryList.appendChild(card);
                });
            }

            function openInventoryModal(card) {
                if (!inventoryModal || !card) {
                    return;
                }

                const reboxName = card.dataset.reboxName || 'Dago';
                const reboxId = card.dataset.reboxId || '';
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

                renderInventory(reboxId, reboxName);

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
