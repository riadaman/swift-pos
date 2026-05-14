<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Swift POS' }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <style>
            :root {
                --bg-1: #fff8f1;
                --bg-2: #f2ebe2;
                --panel: rgba(255, 255, 255, 0.78);
                --panel-solid: #ffffff;
                --ink: #1c1917;
                --muted: #57534e;
                --brand: #b45309;
                --brand-dark: #7c2d12;
                --accent: #fbbf24;
                --line: rgba(120, 113, 108, 0.18);
                --shadow: 0 24px 60px rgba(120, 53, 15, 0.14);
                --radius-lg: 32px;
                --radius-md: 24px;
                --radius-sm: 18px;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Instrument Sans', sans-serif;
                color: var(--ink);
                background:
                    radial-gradient(circle at top, rgba(251, 191, 36, 0.26), transparent 30%),
                    linear-gradient(180deg, var(--bg-1) 0%, var(--bg-2) 100%);
            }

            a {
                color: inherit;
                text-decoration: none;
            }

            button,
            input,
            select {
                font: inherit;
            }

            .page-shell {
                position: relative;
                min-height: 100vh;
                overflow: hidden;
            }

            .page-shell::before,
            .page-shell::after {
                content: '';
                position: absolute;
                border-radius: 999px;
                filter: blur(70px);
                opacity: 0.55;
                pointer-events: none;
            }

            .page-shell::before {
                width: 320px;
                height: 320px;
                left: -120px;
                top: 100px;
                background: rgba(251, 191, 36, 0.35);
            }

            .page-shell::after {
                width: 360px;
                height: 360px;
                right: -120px;
                bottom: -40px;
                background: rgba(249, 115, 22, 0.28);
            }

            .container {
                width: min(1180px, calc(100% - 32px));
                margin: 0 auto;
            }

            .center-wrap {
                display: grid;
                align-items: center;
                min-height: 100vh;
                padding: 32px 0;
            }

            .grid-2 {
                display: grid;
                gap: 24px;
            }

            .panel {
                position: relative;
                background: var(--panel);
                backdrop-filter: blur(18px);
                border: 1px solid rgba(255, 255, 255, 0.65);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow);
            }

            .panel-solid {
                background: var(--panel-solid);
                border: 1px solid var(--line);
                border-radius: var(--radius-lg);
                box-shadow: 0 24px 60px rgba(120, 53, 15, 0.10);
            }

            .panel-dark {
                background: linear-gradient(180deg, #1c1917 0%, #431407 100%);
                color: #fff;
                border-radius: var(--radius-lg);
                box-shadow: 0 24px 60px rgba(28, 25, 23, 0.26);
            }

            .hero-grid,
            .auth-grid,
            .dashboard-grid,
            .stats-grid,
            .mini-grid {
                display: grid;
                gap: 24px;
            }

            .content-pad {
                padding: 32px;
            }

            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                padding: 10px 16px;
                border-radius: 999px;
                background: #fffbeb;
                color: #92400e;
                border: 1px solid #fde68a;
                font-size: 13px;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: #10b981;
            }

            h1,
            h2,
            h3,
            p {
                margin: 0;
            }

            .title-xl {
                font-size: clamp(2.6rem, 5vw, 4.7rem);
                line-height: 0.98;
                font-weight: 800;
                letter-spacing: -0.04em;
            }

            .title-lg {
                font-size: clamp(2rem, 3vw, 3rem);
                line-height: 1.05;
                font-weight: 800;
                letter-spacing: -0.03em;
            }

            .title-md {
                font-size: 1.8rem;
                line-height: 1.15;
                font-weight: 800;
            }

            .lede {
                margin-top: 20px;
                font-size: 1.05rem;
                line-height: 1.8;
                color: var(--muted);
            }

            .stack {
                display: grid;
                gap: 16px;
            }

            .mini-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .mini-card {
                padding: 22px;
                border-radius: var(--radius-md);
                background: #fff;
                border: 1px solid var(--line);
            }

            .mini-card.dark {
                background: #1c1917;
                color: #fff;
                border: none;
            }

            .card-label {
                font-size: 0.76rem;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                font-weight: 700;
            }

            .card-text {
                margin-top: 12px;
                font-size: 0.95rem;
                line-height: 1.7;
                color: inherit;
                opacity: 0.82;
            }

            .actions {
                display: grid;
                gap: 14px;
                margin-top: 28px;
            }

            .btn,
            .btn-secondary {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                border: none;
                border-radius: 18px;
                padding: 15px 18px;
                font-weight: 800;
                cursor: pointer;
                transition: transform 0.18s ease, opacity 0.18s ease, background 0.18s ease;
            }

            .btn:hover,
            .btn-secondary:hover {
                transform: translateY(-1px);
            }

            .btn {
                background: #1c1917;
                color: #fff;
            }

            .btn-gold {
                background: #fbbf24;
                color: #1c1917;
            }

            .btn-secondary {
                background: rgba(255, 255, 255, 0.08);
                color: #fff;
                border: 1px solid rgba(255, 255, 255, 0.12);
            }

            .form {
                margin-top: 28px;
                display: grid;
                gap: 18px;
            }

            .field label {
                display: block;
                margin-bottom: 8px;
                font-size: 0.95rem;
                font-weight: 700;
                color: #44403c;
            }

            .input,
            .select {
                width: 100%;
                border-radius: 18px;
                border: 1px solid rgba(168, 162, 158, 0.45);
                padding: 14px 16px;
                background: #fff;
                color: #1c1917;
                outline: none;
            }

            .input:focus,
            .select:focus {
                border-color: #ea580c;
            }

            .error {
                margin-top: 8px;
                font-size: 0.9rem;
                color: #dc2626;
            }

            .muted-link {
                color: #cbd5e1;
            }

            .text-link {
                color: #c2410c;
                font-weight: 700;
            }

            .checkbox-row {
                display: flex;
                align-items: center;
                gap: 10px;
                color: var(--muted);
                font-size: 0.95rem;
            }

            .header-card {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                align-items: center;
                padding: 28px;
                margin-top: 24px;
            }

            .badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 8px 14px;
                border-radius: 999px;
                background: #ffedd5;
                color: #9a3412;
                font-size: 0.92rem;
                font-weight: 700;
            }

            .stats-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .stat-card {
                padding: 24px;
                border-radius: var(--radius-md);
            }

            .stat-dark {
                background: #1c1917;
                color: #fff;
            }

            .stat-light {
                background: rgba(255, 255, 255, 0.82);
                border: 1px solid rgba(255, 255, 255, 0.7);
            }

            .stat-number {
                margin-top: 16px;
                font-size: 2.5rem;
                font-weight: 800;
                letter-spacing: -0.04em;
            }

            .role-grid {
                display: grid;
                gap: 16px;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                margin-top: 24px;
            }

            .role-card {
                padding: 22px;
                border-radius: var(--radius-md);
                background: #f5f5f4;
            }

            .account-box,
            .info-box {
                padding: 22px;
                border-radius: var(--radius-md);
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .kicker {
                font-size: 0.76rem;
                letter-spacing: 0.28em;
                text-transform: uppercase;
                color: #fcd34d;
            }

            .subtle {
                color: #d6d3d1;
                line-height: 1.75;
            }

            .divider-space {
                margin-top: 24px;
            }

            @media (min-width: 900px) {
                .hero-grid {
                    grid-template-columns: 1.1fr 0.9fr;
                }

                .auth-grid {
                    grid-template-columns: 0.95fr 1.05fr;
                }

                .auth-grid.reverse {
                    grid-template-columns: 1.05fr 0.95fr;
                }

                .dashboard-grid {
                    grid-template-columns: 1.2fr 0.8fr;
                }
            }

            @media (max-width: 899px) {
                .mini-grid,
                .stats-grid,
                .role-grid {
                    grid-template-columns: 1fr;
                }

                .header-card {
                    flex-direction: column;
                    align-items: flex-start;
                }
            }

            @media (max-width: 640px) {
                .container {
                    width: min(100% - 20px, 1180px);
                }

                .content-pad {
                    padding: 22px;
                }

                .title-xl {
                    font-size: 2.35rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-shell">
            {{ $slot }}
        </div>
    </body>
</html>
