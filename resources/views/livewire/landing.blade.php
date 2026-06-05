<div class="rebox-dashboard-page rebox-landing-page">
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
            scroll-behavior: smooth;
        }

        .rebox-dashboard-page.rebox-landing-page {
            background: #ffffff;
        }

        #beranda,
        #tentang,
        #dampak,
        #cara-kerja,
        #faq {
            scroll-margin-top: 28px;
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

        .rebox-landing-page .dashboard-inner {
            isolation: isolate;
        }

        .rebox-landing-page .dashboard-inner::before {
            display: none;
        }

        .rebox-landing-page .dashboard-inner::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 0;
            width: 100vw;
            height: 1060px;
            transform: translateX(-50%);
            background:
                linear-gradient(180deg,
                    rgba(255, 255, 255, 0.02) 0%,
                    rgba(255, 255, 255, 0.05) 58%,
                    rgba(255, 255, 255, 0.82) 84%,
                    #ffffff 96%,
                    #ffffff 100%),
                var(--landing-hero-bg);
            background-size: cover;
            background-position: top center;
            background-repeat: no-repeat;
            pointer-events: none;
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
            grid-template-columns: 1fr 238px;
            align-items: center;
            gap: 34px;
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

        .top-nav a:hover,
        .top-nav a.is-active {
            background: #8bd17d;
            color: #006b00;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.28),
                0 10px 22px rgba(0, 80, 0, 0.16);
            transform: translateY(-2px);
        }

        .auth-actions {
            height: 59px;
            width: 238px;
            border: 0;
            border-radius: 25px;
            background: rgba(0, 134, 0, 0.70);
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 7px;
            padding: 7px;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
        }

        .auth-link {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            line-height: 1;
            transition: transform 0.24s ease, background 0.24s ease, color 0.24s ease, box-shadow 0.24s ease;
        }

        .auth-link::after {
            content: '';
            position: absolute;
            inset: -40% -70%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.36), transparent);
            transform: translateX(-130%);
            transition: transform 0.5s ease;
        }

        .auth-link:hover::after,
        .auth-link:focus-visible::after {
            transform: translateX(130%);
        }

        .auth-link:hover,
        .auth-link:focus-visible {
            background: #8bd17d;
            color: #006b00;
            outline: none;
            transform: translateY(-2px) scale(1.02);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.3),
                0 12px 24px rgba(0, 80, 0, 0.18);
        }

        .auth-link:active {
            transform: translateY(0) scale(0.96);
        }

        .auth-register {
            background: rgba(255, 255, 255, 0.12);
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
            gap: 18px;
            padding: 7px 14px 7px 10px;
            cursor: pointer;
            text-decoration: none;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 16px 30px rgba(0, 134, 0, 0.12);
            transition: transform 0.24s ease, box-shadow 0.24s ease;
        }

        .profile-avatar-fallback {
            width: 47px;
            height: 47px;
            border-radius: 50%;
            background: #d9f3df;
            display: grid;
            place-items: center;
            color: var(--rebox-green);
            font-weight: 800;
        }

        .hero-section {
            position: relative;
            text-align: center;
            padding: 112px 0 88px;
            min-height: 560px;
            isolation: isolate;
        }

        .rebox-landing-page .hero-section {
            padding: 126px 0 118px;
            min-height: 610px;
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
            transition: transform .24s cubic-bezier(.2,.8,.2,1), box-shadow .24s ease, background .24s ease, border-color .24s ease, color .24s ease;
        }

        .donate-cta::before,
        .detail-button::before {
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

        .donate-cta:hover::before,
        .detail-button:hover::before {
            transform: translateX(120%);
        }

        .donate-cta:active,
        .donate-cta.is-pressing {
            transform: translateY(0) scale(.97);
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
            transition: transform .22s ease, background .22s ease;
        }

        .carousel-arrow:hover {
            background: rgba(0, 134, 0, 0.16);
            transform: translateY(-2px);
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
            transition: transform .22s ease, box-shadow .22s ease;
        }

        .box-card:hover .box-add {
            transform: translateY(-4px) scale(1.08) rotate(90deg);
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
            transition: transform .22s cubic-bezier(.2,.8,.2,1), color .22s ease, background .22s ease, border-color .22s ease, box-shadow .22s ease;
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

        .detail-button.is-open {
            background: var(--rebox-green);
            color: #ffffff;
            border-color: var(--rebox-green);
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
            transition: transform .24s cubic-bezier(.2,.8,.2,1), box-shadow .24s ease;
        }

        .detail-grid .box-card .box-image img {
            transition: transform .32s ease, filter .32s ease;
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

        .all-locations.is-open .box-card {
            animation: detailCardIn 0.55s ease both;
        }

        .all-locations.is-open .box-card:nth-child(2n) { animation-delay: 0.05s; }
        .all-locations.is-open .box-card:nth-child(3n) { animation-delay: 0.1s; }
        .all-locations.is-open .box-card:nth-child(4n) { animation-delay: 0.15s; }

        .impact-section {
            width: min(100%, 1120px);
            min-height: 178px;
            margin: 0 auto 112px;
            display: grid;
            grid-template-columns: 250px 1fr;
            align-items: center;
            gap: 58px;
            padding: 24px 20px;
        }

        .impact-copy h2 {
            margin: 0 0 14px;
            color: #111111;
            font-size: 22px;
            font-weight: 650;
            line-height: 1.12;
        }

        .impact-copy p {
            width: min(100%, 225px);
            margin: 0;
            color: #526071;
            font-size: 13px;
            font-weight: 450;
            line-height: 1.45;
        }

        .impact-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(120px, 1fr));
            gap: 28px;
            align-items: start;
        }

        .impact-stat {
            display: grid;
            justify-items: center;
            text-align: center;
            gap: 9px;
            color: #111111;
        }

        .impact-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: var(--rebox-green);
            font-size: 18px;
            background: linear-gradient(145deg, #e8f8eb, #d6f1dc);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.78),
                0 12px 24px rgba(0, 134, 0, 0.10);
        }

        .impact-value {
            display: block;
            min-height: 38px;
            font-size: 30px;
            font-weight: 650;
            line-height: 1.05;
            letter-spacing: 0;
        }

        .impact-label {
            color: #4f5967;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.25;
        }

        .about-rebox-section {
            width: 100vw;
            min-height: 680px;
            margin: -44px 0 90px;
            margin-left: calc(50% - 50vw);
            position: relative;
            overflow: hidden;
            border-radius: 0;
            border: 0;
            box-shadow: none;
            isolation: isolate;
            background-image: var(--about-bg-main);
            background-size: cover;
            background-position: center 48%;
            background-repeat: no-repeat;
        }

        .about-rebox-section::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 1;
            pointer-events: none;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, 0.05) 0%, rgba(0, 0, 0, 0.12) 100%),
                radial-gradient(circle at 72% 28%, rgba(255, 255, 255, 0.24), transparent 30%);
        }

        .about-rebox-section::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            background:
                linear-gradient(90deg, rgba(7, 24, 14, 0.90) 0%, rgba(8, 54, 24, 0.74) 43%, rgba(8, 54, 24, 0.34) 68%, rgba(255, 255, 255, 0.04) 100%),
                radial-gradient(circle at 16% 82%, rgba(0, 134, 0, 0.22), transparent 36%);
        }

        .about-bg-stack {
            position: absolute;
            inset: 0;
            z-index: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .about-bg-frame {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center 48%;
            opacity: 0;
            transform: scale(1.035);
            filter: saturate(1.05) contrast(1.04);
            animation: aboutReboxCrossfade 24s ease-in-out infinite;
            will-change: opacity, transform;
        }

        .about-bg-frame-1 {
            background-image: var(--about-bg-1);
            animation-delay: 0s;
        }

        .about-bg-frame-2 {
            background-image: var(--about-bg-2);
            animation-delay: 6s;
        }

        .about-bg-frame-3 {
            background-image: var(--about-bg-3);
            animation-delay: 12s;
        }

        .about-bg-frame-4 {
            background-image: var(--about-bg-4);
            animation-delay: 18s;
        }

        .about-rebox-content {
            width: min(1120px, calc(100% - 48px));
            min-height: 680px;
            display: grid;
            grid-template-columns: minmax(0, 520px) minmax(380px, 1fr);
            align-items: center;
            align-content: center;
            column-gap: 64px;
            padding: 92px 68px;
            margin: 0 auto;
            color: #ffffff;
            position: relative;
            z-index: 3;
        }

        .about-rebox-copy {
            grid-column: 1;
            align-self: center;
            text-shadow: 0 2px 14px rgba(0, 0, 0, 0.32);
        }

        .about-rebox-eyebrow {
            display: inline-flex;
            width: fit-content;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
            color: #c9f6cf;
            font-size: 13px;
            font-weight: 600;
            grid-column: 1;
        }

        .about-rebox-content h2 {
            margin: 0;
            color: #ffffff;
            font-size: 36px;
            font-weight: 650;
            line-height: 1.08;
            letter-spacing: 0;
        }

        .about-rebox-content > p {
            margin: 16px 0 0;
            color: rgba(255, 255, 255, 0.84);
            font-size: 15px;
            font-weight: 450;
            line-height: 1.75;
        }

        .about-rebox-copy > p {
            margin: 10px 0 0;
            color: rgba(255, 255, 255, 0.84);
            font-size: 15px;
            font-weight: 450;
            line-height: 1.75;
        }

        .about-feature-list {
            display: grid;
            gap: 14px;
            margin-top: 0;
            grid-column: 2;
            grid-row: 1;
            align-self: center;
        }

        .about-feature {
            display: grid;
            grid-template-columns: 26px 1fr;
            gap: 18px;
            align-items: center;
            padding: 14px 24px;
            border-radius: 18px;
            border: 1px solid rgba(255, 255, 255, 0.22);
            background: rgba(12, 48, 25, 0.42);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0 18px 34px rgba(0, 0, 0, 0.18);
            transition: transform 0.28s ease, background 0.28s ease, border-color 0.28s ease;
        }

        .about-feature:hover {
            transform: translateX(8px);
            border-color: rgba(212, 246, 210, 0.36);
            background: rgba(18, 78, 35, 0.48);
        }

        .about-feature-icon {
            width: 26px;
            height: 26px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 26px;
            position: relative;
            overflow: visible;
            border-radius: 0;
            color: rgba(240, 255, 241, 0.98);
            background: transparent;
            box-shadow: none;
        }

        .about-feature-icon i {
            position: static !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: rgba(240, 255, 241, 0.98) !important;
            font-size: 20px;
            line-height: 1;
            transform: none !important;
        }

        .about-feature-icon svg {
            position: static !important;
            width: 20px !important;
            height: 20px !important;
            color: rgba(240, 255, 241, 0.98) !important;
            display: block;
            margin: auto;
            transform: none !important;
        }

        .about-feature strong {
            display: block;
            margin-bottom: 4px;
            color: #ffffff;
            font-size: 17px;
            font-weight: 650;
            line-height: 1.2;
        }

        .about-feature span {
            display: block;
            color: rgba(255, 255, 255, 0.76);
            font-size: 13px;
            font-weight: 450;
            line-height: 1.45;
        }

        @keyframes aboutReboxCrossfade {
            0%, 18% {
                opacity: 1;
                transform: scale(1.035);
            }

            28%, 90% {
                opacity: 0;
                transform: scale(1.085);
            }

            100% {
                opacity: 1;
                transform: scale(1.035);
            }
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
            align-items: center;
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
        }

        .step-line {
            width: 2px;
            height: 64px;
            justify-self: center;
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

        .step-copy.left { text-align: right; }

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

        .modern-mockup {
            width: 100%;
            min-height: 245px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            transform: translateX(32px);
        }

        .modern-mockup img {
            width: min(105%, 586px);
            max-height: 314px;
            object-fit: contain;
            object-position: right center;
            display: block;
        }

        .faq-section {
            width: min(860px, 100%);
            margin: -70px auto 118px;
            position: relative;
            isolation: isolate;
        }

        .faq-section::before,
        .faq-section::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            z-index: -1;
        }

        .faq-section::before {
            width: 300px;
            height: 300px;
            right: -76px;
            top: 8px;
            background:
                radial-gradient(circle at 38% 38%, rgba(0, 134, 0, 0.10), transparent 58%),
                radial-gradient(circle at 66% 70%, rgba(0, 134, 0, 0.045), transparent 54%);
            filter: blur(4px);
            animation: faqGlow 9s ease-in-out infinite alternate;
        }

        .faq-section::after {
            width: 170px;
            height: 170px;
            left: -58px;
            bottom: 6px;
            border: 1px dashed rgba(0, 134, 0, 0.14);
            opacity: 0.44;
            animation: faqOrbit 16s linear infinite;
        }

        .faq-heading {
            text-align: center;
            margin: 0 0 34px;
            color: #182231;
            font-size: 30px;
            font-weight: 620;
            line-height: 1.08;
            letter-spacing: 0;
        }

        .faq-list {
            display: grid;
            gap: 14px;
        }

        .faq-item {
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(0, 134, 0, 0.12);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.72),
                0 10px 24px rgba(0, 134, 0, 0.055);
            overflow: hidden;
            transform: translateY(0);
            transition: transform .24s ease, box-shadow .24s ease, background .24s ease, border-color .24s ease, color .24s ease;
        }

        .faq-item:hover {
            transform: translateY(-4px) scale(1.008);
            background: linear-gradient(135deg, rgba(239, 250, 238, 0.96), rgba(211, 241, 207, 0.92));
            border-color: rgba(0, 134, 0, 0.22);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.86),
                0 18px 38px rgba(0, 134, 0, 0.14);
        }

        .faq-item.is-open {
            transform: translateY(-3px);
            background: rgba(226, 245, 222, 0.92);
            border-color: rgba(0, 134, 0, 0.20);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.8),
                0 18px 42px rgba(0, 134, 0, 0.12);
        }

        .faq-question {
            width: 100%;
            min-height: 60px;
            border: 0;
            background: transparent;
            padding: 0 24px 0 26px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 22px;
            color: #1e293b;
            text-align: left;
            font-family: var(--sf-pro);
            font-size: 16px;
            font-weight: 620;
            line-height: 1.25;
            cursor: pointer;
            transition: color .24s ease;
        }

        .faq-question i {
            flex: 0 0 auto;
            color: #526355;
            font-size: 15px;
            transition: transform .28s ease, color .28s ease;
        }

        .faq-item:hover .faq-question {
            color: var(--rebox-green);
        }

        .faq-item:hover .faq-question i {
            color: var(--rebox-green);
            transform: translateX(2px);
        }

        .faq-item.is-open .faq-question i {
            color: var(--rebox-green);
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height .36s cubic-bezier(.2,.8,.2,1), opacity .26s ease;
        }

        .faq-answer p {
            margin: 0;
            padding: 0 26px 22px;
            color: #657164;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.55;
        }

        .faq-item.is-open .faq-answer {
            max-height: 180px;
            opacity: 1;
        }

        .trust-section {
            width: min(1120px, 100%);
            margin: -48px auto 132px;
            position: relative;
            isolation: isolate;
        }

        .trust-section::before {
            content: "";
            position: absolute;
            inset: -34px 6% auto auto;
            width: 340px;
            height: 160px;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(0, 134, 0, 0.10), transparent 68%);
            filter: blur(10px);
            z-index: -1;
            animation: trustAmbient 8s ease-in-out infinite alternate;
        }

        .trust-kicker {
            margin: 0 0 8px;
            color: var(--rebox-green);
            font-size: 13px;
            font-weight: 650;
            text-align: center;
        }

        .trust-heading {
            margin: 0 0 34px;
            color: #182231;
            font-size: 30px;
            font-weight: 620;
            line-height: 1.12;
            text-align: center;
        }

        .trust-gallery {
            height: 365px;
            display: flex;
            gap: 18px;
            align-items: stretch;
        }

        .trust-card {
            flex: 1;
            min-width: 0;
            position: relative;
            overflow: hidden;
            border-radius: 28px;
            background: #dff2e3;
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.30),
                0 18px 36px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            outline: none;
            isolation: isolate;
            transition: flex .48s cubic-bezier(.2,.8,.2,1), transform .28s ease, box-shadow .28s ease;
        }

        .trust-gallery:hover .trust-card {
            flex: 1;
        }

        .trust-gallery .trust-card:hover,
        .trust-gallery .trust-card:focus,
        .trust-gallery .trust-card.is-active {
            flex: 1.8;
            transform: translateY(-8px);
            box-shadow:
                inset 0 1px 1px rgba(255, 255, 255, 0.42),
                0 24px 48px rgba(0, 0, 0, 0.17),
                0 22px 42px rgba(0, 134, 0, 0.14);
        }

        .trust-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transform: scale(1.02);
            transition: transform .48s cubic-bezier(.2,.8,.2,1), filter .48s ease;
        }

        .trust-card:hover img,
        .trust-card:focus img,
        .trust-card.is-active img {
            transform: scale(1.08);
            filter: saturate(1.06) contrast(1.03);
        }

        .trust-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(180deg, rgba(0, 0, 0, 0.02) 22%, rgba(0, 0, 0, 0.72) 100%),
                linear-gradient(90deg, rgba(0, 134, 0, 0.15), transparent 54%);
            z-index: 1;
        }

        .trust-content {
            position: absolute;
            inset: auto 22px 22px;
            z-index: 2;
            color: #ffffff;
            display: grid;
            gap: 11px;
            text-shadow: 0 2px 18px rgba(0, 0, 0, 0.45);
        }

        .trust-title {
            margin: 0;
            font-size: 20px;
            font-weight: 650;
            line-height: 1.12;
            letter-spacing: 0;
        }

        .trust-quote {
            width: min(100%, 360px);
            margin: 0;
            color: rgba(255, 255, 255, 0.86);
            font-size: 13px;
            font-weight: 450;
            line-height: 1.42;
            opacity: 0;
            max-height: 0;
            transform: translateY(8px);
            overflow: hidden;
            transition: opacity .28s ease, max-height .38s ease, transform .28s ease;
        }

        .trust-card:hover .trust-quote,
        .trust-card:focus .trust-quote,
        .trust-card.is-active .trust-quote {
            opacity: 1;
            max-height: 82px;
            transform: translateY(0);
        }

        .trust-person {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.82);
            font-size: 12px;
            font-weight: 500;
            opacity: 0;
            max-height: 0;
            transform: translateY(10px);
            overflow: hidden;
            transition: opacity .28s ease .04s, max-height .38s ease, transform .28s ease .04s;
        }

        .trust-card:hover .trust-person,
        .trust-card:focus .trust-person,
        .trust-card.is-active .trust-person {
            opacity: 1;
            max-height: 34px;
            transform: translateY(0);
        }

        .trust-arrow {
            position: absolute;
            right: 20px;
            bottom: 20px;
            z-index: 3;
            color: #ffffff;
            font-size: 14px;
            transform: translate(0, 0);
            transition: transform .24s ease;
        }

        .trust-card:hover .trust-arrow,
        .trust-card:focus .trust-arrow,
        .trust-card.is-active .trust-arrow {
            transform: translate(4px, -4px);
        }

        .footer-dashboard {
            width: 100vw;
            margin: 0 calc(50% - 50vw) -80px;
            padding: 54px max(64px, calc((100vw - 1120px) / 2 + 64px)) 36px;
            border: 0;
            border-radius: 30px 30px 0 0;
            background:
                radial-gradient(circle at 12% 8%, rgba(255, 255, 255, 0.15), transparent 28%),
                radial-gradient(circle at 86% 18%, rgba(255, 255, 255, 0.10), transparent 30%),
                rgba(0, 134, 0, 0.70);
            box-shadow: 0 -18px 58px rgba(0, 76, 0, 0.13);
            position: relative;
            overflow: hidden;
            text-align: left;
        }

        .footer-dashboard::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255, 255, 255, 0.15) 1px, transparent 1px);
            background-size: 22px 22px;
            opacity: 0.18;
            pointer-events: none;
        }

        .footer-dashboard::after {
            content: "";
            position: absolute;
            right: -90px;
            bottom: -110px;
            width: 270px;
            height: 270px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.13);
            filter: blur(8px);
            pointer-events: none;
        }

        .footer-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: 1.25fr repeat(3, 0.75fr);
            gap: 54px;
            align-items: start;
        }

        .footer-legacy {
            position: relative;
            z-index: 1;
            width: min(1120px, 100%);
            margin: 0 auto 58px;
            padding: 0 24px;
            text-align: center;
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

        .footer-legacy-copy {
            width: min(360px, 100%);
            margin: 0 auto 28px;
            color: #8b978d;
            font-size: 13px;
            font-weight: 500;
            line-height: 1.25;
        }

        .footer-brand h3,
        .footer-column h4 {
            margin: 0 0 18px;
            color: #ffffff;
            font-size: 15px;
            font-weight: 650;
            line-height: 1.2;
        }

        .footer-copy {
            width: min(315px, 100%);
            margin: 0;
            color: rgba(255, 255, 255, 0.78);
            font-size: 13px;
            font-weight: 520;
            line-height: 1.55;
        }

        .footer-column {
            display: grid;
            gap: 13px;
        }

        .footer-column a {
            width: fit-content;
            color: rgba(255, 255, 255, 0.78);
            font-size: 13px;
            font-weight: 560;
            text-decoration: none;
            transition: color .22s ease, transform .22s ease;
        }

        .footer-column a:hover,
        .footer-column a:focus-visible {
            color: #ffffff;
            transform: translateX(4px);
            outline: none;
        }

        .socials {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .socials a {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #35513a;
            background: rgba(255, 255, 255, 0.42);
            border: 1px solid rgba(0, 134, 0, 0.10);
            text-decoration: none;
            font-size: 14px;
            transition: transform .22s ease, color .22s ease, background .22s ease, box-shadow .22s ease;
        }

        .socials a:hover,
        .socials a:focus-visible {
            color: #ffffff;
            background: var(--rebox-green);
            transform: translateY(-3px);
            box-shadow: 0 12px 22px rgba(0, 134, 0, 0.18);
            outline: none;
        }

        .footer-bottom {
            position: relative;
            z-index: 1;
            margin-top: 46px;
            padding-top: 22px;
            border-top: 1px solid rgba(255, 255, 255, 0.18);
            color: rgba(255, 255, 255, 0.72);
            font-size: 12px;
            font-weight: 560;
            text-align: center;
        }

        @keyframes lowerAmbient {
            from { transform: translateX(-50%) translateY(0) scale(1); }
            to { transform: translateX(-50%) translateY(28px) scale(1.02); }
        }

        @keyframes handGiveEnter {
            from { opacity: 0; transform: translateX(-110px) translateY(-18px) rotate(-5deg) scale(.96); }
            to { opacity: 1; transform: translateX(0) translateY(0) rotate(4deg) scale(1); }
        }

        @keyframes handReceiveEnter {
            from { opacity: 0; transform: translateX(120px) translateY(18px) rotate(7deg) scale(.96); }
            to { opacity: 1; transform: translateX(0) translateY(0) rotate(-2deg) scale(1); }
        }

        @keyframes handGiveIdle {
            0%, 100% { transform: translateY(0) rotate(4deg); }
            50% { transform: translateY(10px) rotate(2deg); }
        }

        @keyframes handReceiveIdle {
            0%, 100% { transform: translateY(0) rotate(-2deg); }
            50% { transform: translateY(-10px) rotate(-.5deg); }
        }

        @keyframes detailFade {
            from { opacity: 0; transform: translateY(28px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes detailCardIn {
            from { opacity: 0; transform: translateY(24px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        @keyframes faqGlow {
            from { transform: translateY(0) scale(1); opacity: .66; }
            to { transform: translateY(18px) scale(1.04); opacity: .95; }
        }

        @keyframes faqOrbit {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes trustAmbient {
            from { transform: translateX(0) translateY(0) scale(1); opacity: .72; }
            to { transform: translateX(-28px) translateY(18px) scale(1.08); opacity: 1; }
        }

        @media (max-width: 1180px) {
            .dashboard-inner { padding: 24px 28px 70px; }
            .top-shell { grid-template-columns: 1fr; }
            .auth-actions { justify-self: end; margin-top: -18px; }
            .carousel-stage { grid-template-columns: 52px 1fr 52px; gap: 12px; }
            .detail-grid { grid-template-columns: repeat(3, 288px); }
        }

        @media (max-width: 940px) {
            .rebox-landing-page .dashboard-inner::after {
                height: 740px;
                background-position: top center;
            }

            .top-nav {
                height: auto;
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
                padding: 18px 22px;
            }

            .auth-actions {
                width: min(100%, 320px);
            }

            .hero-section {
                padding-top: 70px;
                min-height: auto;
            }

            .rebox-landing-page .hero-section {
                padding-top: 78px;
                padding-bottom: 88px;
                min-height: 520px;
            }

            .hero-hand { display: none; }

            .category-strip,
            .detail-grid {
                grid-template-columns: 1fr;
                justify-items: center;
            }

            .rebox-landing-page .category-strip {
                margin-top: -10px;
            }

            .carousel-stage { grid-template-columns: 52px 1fr 52px; }

            [data-carousel] .box-card.is-prev,
            [data-carousel] .box-card.is-next {
                display: none;
            }

            .impact-section {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 32px;
                padding-inline: 0;
            }

            .impact-copy p {
                margin-inline: auto;
            }

            .impact-grid {
                grid-template-columns: repeat(2, minmax(130px, 1fr));
                gap: 28px 18px;
            }

            .about-rebox-section {
                min-height: 560px;
                margin: -22px 0 62px;
                margin-left: calc(50% - 50vw);
                border-radius: 0;
            }

            .about-rebox-section::after {
                background:
                    linear-gradient(180deg, rgba(7, 24, 14, 0.90) 0%, rgba(8, 54, 24, 0.76) 56%, rgba(8, 54, 24, 0.48) 100%),
                    radial-gradient(circle at 84% 18%, rgba(190, 241, 196, 0.20), transparent 34%);
            }

            .about-rebox-content {
                min-height: 560px;
                width: min(100%, calc(100% - 32px));
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 42px 24px;
                margin: 0 auto;
            }

            .about-rebox-section {
                background-position: center top;
            }

            .about-bg-frame {
                background-position: center top;
            }

            .about-rebox-content h2 {
                font-size: 28px;
            }

            .about-rebox-content > p {
                font-size: 14px;
                line-height: 1.65;
            }

            .about-feature {
                grid-template-columns: 24px 1fr;
                gap: 14px;
                padding: 13px 18px;
            }

            .about-feature-icon {
                width: 24px;
                height: 24px;
            }

            .steps-grid {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
                row-gap: 18px;
            }

            .step-line,
            .steps-grid > div:empty { display: none; }
            .step-copy,
            .step-copy.left { text-align: center; }

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
                transform: none;
            }

            .faq-section {
                margin-top: -70px;
            }

            .faq-heading {
                font-size: 24px;
            }

            .faq-question {
                min-height: 58px;
                padding-inline: 22px;
                font-size: 15px;
            }

            .faq-answer p {
                padding-inline: 22px;
                font-size: 14px;
            }

            .trust-section {
                margin-top: -48px;
            }

            .trust-heading {
                font-size: 24px;
                margin-bottom: 24px;
            }

            .trust-gallery {
                height: auto;
                flex-direction: column;
            }

            .trust-card,
            .trust-gallery:hover .trust-card,
            .trust-gallery .trust-card:hover,
            .trust-gallery .trust-card:focus,
            .trust-gallery .trust-card.is-active {
                flex: none;
                height: 230px;
                transform: none;
            }

            .trust-card:hover .trust-quote,
            .trust-card:focus .trust-quote,
            .trust-card.is-active .trust-quote {
                opacity: 1;
                max-height: 92px;
                transform: translateY(0);
            }

            .footer-dashboard {
                padding: 42px 24px 28px;
                border-radius: 24px 24px 0 0;
            }

            .footer-links {
                flex-wrap: wrap;
                gap: 18px 28px;
            }

            .footer-legacy {
                margin-bottom: 38px;
                padding-inline: 18px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-column {
                gap: 11px;
            }

            .footer-bottom {
                margin-top: 34px;
                text-align: left;
            }
        }
    </style>

    @php
        $handGive = asset('images/TanganAtasMemberi.png');
        $handReceive = asset('images/TanganBawahMenerima.png');
    @endphp

    <div class="dashboard-inner" style="--landing-hero-bg: url('{{ asset('images/BACKGROUND%20LANDING%20PAGE.png') }}');">
        <header class="top-shell reveal">
            <nav class="top-nav" aria-label="Landing navigation">
                <a href="#beranda" class="is-active">Beranda</a>
                <a href="#tentang">Tentang</a>
                <a href="#dampak">Dampak</a>
                <a href="#cara-kerja">Cara Kerja</a>
                <a href="#faq">FAQ</a>
            </nav>

            <div class="auth-actions" aria-label="Aksi akun">
                <a href="{{ route('login') }}" class="auth-link auth-login">Login</a>
                <a href="{{ url('/register') }}" class="auth-link auth-register">Register</a>
            </div>
        </header>

        <section id="beranda" class="hero-section reveal">
            <img src="{{ $handGive }}" alt="" class="hero-hand hero-hand-give" aria-hidden="true">
            <img src="{{ $handReceive }}" alt="" class="hero-hand hero-hand-receive" aria-hidden="true">
            <p class="welcome-text">Welcome to Rebox</p>
            <h1 class="hero-title">
                Berbagi Barang Jadi<br>
                Lebih Mudah Hari Ini
            </h1>
            <p class="hero-subtitle">
                Temukan titik Rebox terdekat, salurkan barang layak pakai,<br>
                dan bantu kebutuhan penerima dengan alur yang rapi.
            </p>
            <a href="{{ route('login') }}" class="donate-cta">Mulai Sekarang</a>
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
                    <article class="box-card" data-card-index="{{ $index }}" data-card-link="{{ route('login') }}">
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
                            <a href="{{ route('login') }}" class="box-add" aria-label="Login untuk memakai fitur Rebox {{ $location['name'] }}">
                                <i class="fas fa-plus"></i>
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
                    <article class="box-card" data-card-link="{{ route('login') }}">
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
                            <a href="{{ route('login') }}" class="box-add" aria-label="Login untuk memakai fitur Rebox {{ $location['name'] }}">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="impact-section reveal" id="dampak" aria-label="Dampak Rebox">
            <div class="impact-copy">
                <h2>Dampak Nyata<br>Bersama Rebox</h2>
                <p>Setiap donasi kecil yang Anda berikan membawa perubahan besar bagi mereka yang membutuhkan.</p>
            </div>

            <div class="impact-grid">
                <article class="impact-stat">
                    <span class="impact-icon"><i class="fas fa-cube"></i></span>
                    <strong class="impact-value" data-impact-value="1250">0+</strong>
                    <span class="impact-label">Box Donasi Aktif</span>
                </article>

                <article class="impact-stat">
                    <span class="impact-icon"><i class="fas fa-user-group"></i></span>
                    <strong class="impact-value" data-impact-value="18500">0+</strong>
                    <span class="impact-label">Penerima Terbantu</span>
                </article>

                <article class="impact-stat">
                    <span class="impact-icon"><i class="fas fa-box-open"></i></span>
                    <strong class="impact-value" data-impact-value="45300">0+</strong>
                    <span class="impact-label">Barang Tersalurkan</span>
                </article>

                <article class="impact-stat">
                    <span class="impact-icon"><i class="fas fa-location-dot"></i></span>
                    <strong class="impact-value" data-impact-value="120">0+</strong>
                    <span class="impact-label">Kota di Indonesia</span>
                </article>
            </div>
        </section>

        <section
            id="tentang"
            class="about-rebox-section reveal"
            aria-label="Apa itu Rebox"
            style="
                --about-bg-main: url('{{ asset('images/GambarcardRebox1.png') }}');
                --about-bg-1: url('{{ asset('images/GambarcardRebox1.png') }}');
                --about-bg-2: url('{{ asset('images/GambarcardRebox2.png') }}');
                --about-bg-3: url('{{ asset('images/GambarcardRebox3.png') }}');
                --about-bg-4: url('{{ asset('images/GambarcardRebox4.png') }}');
            "
        >
            <div class="about-bg-stack" aria-hidden="true">
                <div class="about-bg-frame about-bg-frame-1"></div>
                <div class="about-bg-frame about-bg-frame-2"></div>
                <div class="about-bg-frame about-bg-frame-3"></div>
                <div class="about-bg-frame about-bg-frame-4"></div>
            </div>

            <div class="about-rebox-content">
                <div class="about-rebox-copy">
                    <h2>Apa itu Rebox?</h2>
                    <p>
                        Rebox adalah ekosistem donasi barang bekas masa depan yang memadukan teknologi fisik berupa Smart Box
                        dengan manajemen digital transparan. Kami mempermudah siapa pun untuk berbagi dengan mereka yang
                        membutuhkan secara tepat sasaran.
                    </p>
                </div>

                <div class="about-feature-list">
                    <article class="about-feature">
                        <span class="about-feature-icon"><i class="fas fa-qrcode"></i></span>
                        <div>
                            <strong>Inovatif</strong>
                            <span>Sistem berbasis QR code sehingga barang yang disalurkan aman.</span>
                        </div>
                    </article>

                    <article class="about-feature">
                        <span class="about-feature-icon"><i class="fas fa-clipboard-list"></i></span>
                        <div>
                            <strong>Transparan</strong>
                            <span>Donasi yang jelas dan tercatat oleh sistem kami.</span>
                        </div>
                    </article>

                    <article class="about-feature">
                        <span class="about-feature-icon"><i class="fas fa-hand-holding-heart"></i></span>
                        <div>
                            <strong>Berdampak</strong>
                            <span>Langsung menyentuh lapisan masyarakat yang paling membutuhkan.</span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="quote-box reveal">
            Berbagi tidak pernah mengurangi apa yang<br>
            dimiliki, justru melipat gandakan kebahagiaan hati
        </section>

        <section id="cara-kerja" class="steps-section reveal">
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
                    Cari dan temukan Rebox terdekat untuk berdonasi
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
                    Barang tercatat lalu disalurkan kepada penerima
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
                    donasi dan permintaan barang lebih mudah dipahami.
                </p>
            </div>

            <div class="modern-mockup" aria-hidden="true">
                <img src="{{ asset('images/MockupRebox.png') }}" alt="">
            </div>
        </section>

        <section id="faq" class="faq-section reveal" aria-label="Pertanyaan populer">
            <h2 class="faq-heading">Pertanyaan Populer</h2>

            <div class="faq-list">
                <article class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Barang apa saja yang bisa didonasikan?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Pakaian layak pakai, buku, perlengkapan rumah, mainan, elektronik ringan, dan barang lain yang masih bersih serta dapat digunakan kembali.</p>
                    </div>
                </article>

                <article class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Bagaimana cara mengetahui barang saya sudah sampai?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Setiap donasi tercatat di riwayat. Untuk penyaluran langsung, status akan berubah setelah penerima mengirim feedback dan bukti barang telah diterima.</p>
                    </div>
                </article>

                <article class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Apakah ada biaya untuk donasi?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Tidak ada biaya aplikasi. Donatur cukup menyiapkan barang yang layak dan mengikuti alur Rebox agar proses pencatatan donasi tetap rapi.</p>
                    </div>
                </article>

                <article class="faq-item">
                    <button class="faq-question" type="button" aria-expanded="false">
                        <span>Apakah saya bisa memenuhi permintaan penerima?</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Bisa. Donatur dapat melihat daftar permintaan, memilih kebutuhan yang ingin dipenuhi, lalu mengikuti proses pembukaan box dan penyaluran barang.</p>
                    </div>
                </article>
            </div>
        </section>

        <section class="trust-section reveal" aria-label="Dipercaya banyak orang">
            <p class="trust-kicker">Cerita Pengguna</p>
            <h2 class="trust-heading">Dipercaya oleh Banyak Orang</h2>

            <div class="trust-gallery">
                <article class="trust-card" tabindex="0">
                    <img src="{{ asset('images/GambarcardRebox1.png') }}" alt="Titik Rebox digunakan komunitas">
                    <div class="trust-content">
                        <h3 class="trust-title">Komunitas Lebih Mudah Menyalurkan</h3>
                        <p class="trust-quote">“Rebox membantu komunitas kami menyalurkan barang dengan cara yang lebih rapi dan transparan.”</p>
                        <div class="trust-person">
                            <span>Siti Nurhaliza · Relawan Komunitas</span>
                        </div>
                    </div>
                    <i class="fas fa-arrow-right trust-arrow"></i>
                </article>

                <article class="trust-card" tabindex="0">
                    <img src="{{ asset('images/GambarcardRebox2.png') }}" alt="Box donasi Rebox di area publik">
                    <div class="trust-content">
                        <h3 class="trust-title">Drop-off Donasi Jadi Praktis</h3>
                        <p class="trust-quote">“Sistem QR-nya memudahkan donatur memasukkan barang dengan aman tanpa proses yang rumit.”</p>
                        <div class="trust-person">
                            <span>Andi Pratama · Pengelola Masjid</span>
                        </div>
                    </div>
                    <i class="fas fa-arrow-right trust-arrow"></i>
                </article>

                <article class="trust-card" tabindex="0">
                    <img src="{{ asset('images/GambarcardRebox3.png') }}" alt="Rebox menampung barang donasi">
                    <div class="trust-content">
                        <h3 class="trust-title">Barang Sampai ke Penerima</h3>
                        <p class="trust-quote">“Sekarang kami bisa menjangkau lebih banyak orang yang membutuhkan berkat alur donasi Rebox.”</p>
                        <div class="trust-person">
                            <span>Dewi Lestari · Koordinator Yayasan</span>
                        </div>
                    </div>
                    <i class="fas fa-arrow-right trust-arrow"></i>
                </article>

                <article class="trust-card" tabindex="0">
                    <img src="{{ asset('images/GambarcardRebox4.png') }}" alt="Rebox tersedia di lingkungan kota">
                    <div class="trust-content">
                        <h3 class="trust-title">Riwayat Donasi Lebih Jelas</h3>
                        <p class="trust-quote">“Setiap aktivitas tercatat, jadi donatur dan penerima bisa memantau prosesnya dengan lebih tenang.”</p>
                        <div class="trust-person">
                            <span>Raka Maulana · Donatur Aktif</span>
                        </div>
                    </div>
                    <i class="fas fa-arrow-right trust-arrow"></i>
                </article>
            </div>
        </section>

        <section class="footer-legacy reveal" aria-label="Nilai Rebox">
            <div class="footer-links">
                <span>Generality</span>
                <span>Sustainability</span>
                <span>Impact</span>
                <span>Transparency</span>
                <span>Community</span>
            </div>
            <p class="footer-legacy-copy">
                Give more, waste less, and connect through kindness. Because the greatest value of a pre-loved item is not in its storage, but in the new story it creates for someone in need
            </p>
            <div class="socials" aria-label="Media sosial Rebox">
                <a href="{{ route('landing') }}" aria-label="Facebook Rebox">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="{{ route('landing') }}" aria-label="Twitter Rebox">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="{{ route('landing') }}" aria-label="Instagram Rebox">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </section>

        <footer class="footer-dashboard reveal">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Rebox</h3>
                    <p class="footer-copy">
                        Menghubungkan kebaikan untuk lingkungan melalui teknologi cerdas dan komunitas yang solid.
                    </p>
                </div>

                <div class="footer-column">
                    <h4>Tautan Langsung</h4>
                    <a href="{{ route('landing') }}">Tentang Rebox</a>
                    <a href="{{ route('landing') }}">Cara Kerja</a>
                    <a href="{{ route('landing') }}">Lokasi Box</a>
                    <a href="{{ route('landing') }}">Karir</a>
                </div>

                <div class="footer-column">
                    <h4>Bantuan &amp; Syarat</h4>
                    <a href="{{ route('landing') }}">Pusat Bantuan</a>
                    <a href="{{ route('landing') }}">Syarat &amp; Ketentuan</a>
                    <a href="{{ route('landing') }}">Kebijakan Privasi</a>
                    <a href="{{ route('landing') }}">Kontak Kami</a>
                </div>

                <div class="footer-column">
                    <h4>Website</h4>
                    <a href="{{ route('landing') }}">Beranda</a>
                    <a href="#faq">FAQ</a>
                    <a href="/register">Daftar</a>
                </div>
            </div>

            <div class="footer-bottom">
                © 2026 Rebox. Menghubungkan Kebaikan untuk Lingkungan. Semua Hak Dilindungi.
            </div>
        </footer>
    </div>

    <script>
        function initReboxLanding() {
            const root = document.querySelector('.rebox-landing-page');
            if (!root || root.dataset.ready === 'true') {
                return;
            }

            root.dataset.ready = 'true';

            root.querySelectorAll('.top-nav a[href^="#"]').forEach((link) => {
                link.addEventListener('click', (event) => {
                    const target = root.querySelector(link.getAttribute('href'));

                    if (!target) {
                        return;
                    }

                    event.preventDefault();
                    root.querySelectorAll('.top-nav a').forEach((item) => item.classList.remove('is-active'));
                    link.classList.add('is-active');
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
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

            root.querySelectorAll('[data-card-link]').forEach((card) => {
                card.addEventListener('click', (event) => {
                    if (event.target.closest('a, button')) {
                        return;
                    }

                    window.location.href = card.dataset.cardLink;
                });
            });

            root.querySelectorAll('.donate-cta').forEach((cta) => {
                cta.addEventListener('click', () => {
                    cta.classList.add('is-pressing');
                    window.setTimeout(() => cta.classList.remove('is-pressing'), 180);
                });
            });

            const impactSection = root.querySelector('.impact-section');
            const impactValues = Array.from(root.querySelectorAll('[data-impact-value]'));

            function formatImpactValue(value) {
                return Math.round(value).toLocaleString('id-ID');
            }

            function animateImpactValues() {
                impactValues.forEach((item) => {
                    if (item.dataset.counted === 'true') {
                        return;
                    }

                    item.dataset.counted = 'true';
                    const target = Number(item.dataset.impactValue || 0);
                    const duration = 1350;
                    const start = performance.now();

                    function tick(now) {
                        const progress = Math.min((now - start) / duration, 1);
                        const eased = 1 - Math.pow(1 - progress, 3);
                        const current = target * eased;

                        item.textContent = `${formatImpactValue(current)}+`;

                        if (progress < 1) {
                            requestAnimationFrame(tick);
                        } else {
                            item.textContent = `${formatImpactValue(target)}+`;
                        }
                    }

                    requestAnimationFrame(tick);
                });
            }

            if (impactSection && impactValues.length) {
                const impactObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            animateImpactValues();
                            impactObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.32 });

                impactObserver.observe(impactSection);
            }

            const detailToggle = root.querySelector('[data-detail-toggle]');
            const detailPanel = root.querySelector('[data-detail-panel]');

            detailToggle?.addEventListener('click', () => {
                const isOpen = detailPanel.classList.toggle('is-open');
                detailToggle.classList.toggle('is-open', isOpen);
                detailToggle.textContent = isOpen ? 'Tutup Detail' : 'Lihat Semua';

                if (isOpen) {
                    detailPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });

            root.querySelectorAll('.faq-question').forEach((button) => {
                button.addEventListener('click', () => {
                    const currentItem = button.closest('.faq-item');
                    const isOpen = currentItem.classList.contains('is-open');

                    root.querySelectorAll('.faq-item').forEach((item) => {
                        item.classList.remove('is-open');
                        item.querySelector('.faq-question')?.setAttribute('aria-expanded', 'false');
                    });

                    if (!isOpen) {
                        currentItem.classList.add('is-open');
                        button.setAttribute('aria-expanded', 'true');
                    }
                });
            });

            const trustCards = Array.from(root.querySelectorAll('.trust-card'));
            const activateTrustCard = (activeCard) => {
                trustCards.forEach((card) => {
                    card.classList.toggle('is-active', card === activeCard);
                });
            };

            trustCards.forEach((card) => {
                card.addEventListener('mouseenter', () => activateTrustCard(card));
                card.addEventListener('focusin', () => activateTrustCard(card));
                card.addEventListener('click', () => activateTrustCard(card));
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

        document.addEventListener('DOMContentLoaded', initReboxLanding);
        document.addEventListener('livewire:navigated', initReboxLanding);
    </script>
</div>
