<x-layouts.app title="Swift POS — Retail Operations">
<style>
    body { background: #0b0f18 !important; }
    .page-shell::before, .page-shell::after { display: none; }

    /* ── Shell ── */
    .wel-shell {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background: #0b0f18;
    }

    /* ── Nav ── */
    .wel-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 40px;
        height: 64px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        background: rgba(11,15,24,0.9);
        backdrop-filter: blur(12px);
        position: sticky;
        top: 0;
        z-index: 50;
    }
    .wel-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }
    .wel-brand-icon {
        width: 38px;
        height: 38px;
        background: linear-gradient(145deg, #f59e0b, #b45309);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 20px rgba(245,158,11,0.3);
    }
    .wel-brand-name {
        font-size: 1.1rem;
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.03em;
    }
    .wel-brand-name span { color: #f59e0b; }
    .wel-nav-links {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .wel-nav-btn {
        display: inline-flex;
        align-items: center;
        padding: 9px 20px;
        border-radius: 10px;
        font-size: 0.88rem;
        font-weight: 700;
        text-decoration: none;
        transition: background 0.18s, border-color 0.18s;
        font-family: inherit;
    }
    .wel-nav-btn-outline {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.1);
        color: #9ca3af;
    }
    .wel-nav-btn-outline:hover {
        background: rgba(255,255,255,0.05);
        border-color: rgba(255,255,255,0.18);
        color: #e5e7eb;
    }
    .wel-nav-btn-primary {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #0b0f18;
        border: none;
        box-shadow: 0 4px 16px rgba(245,158,11,0.25);
    }
    .wel-nav-btn-primary:hover {
        opacity: 0.9;
        box-shadow: 0 6px 22px rgba(245,158,11,0.35);
    }

    /* ── Hero ── */
    .wel-hero {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 80px 24px 60px;
        position: relative;
        overflow: hidden;
    }
    .wel-hero::before {
        content: '';
        position: absolute;
        top: -80px;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(245,158,11,0.1) 0%, transparent 70%);
        pointer-events: none;
    }
    .wel-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 16px;
        background: rgba(245,158,11,0.08);
        border: 1px solid rgba(245,158,11,0.22);
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        color: #f59e0b;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-bottom: 28px;
    }
    .wel-badge-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 8px rgba(16,185,129,0.7);
        animation: pulse 2s infinite;
    }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }
    .wel-headline {
        font-size: clamp(2.6rem, 6vw, 4.2rem);
        font-weight: 800;
        color: #f9fafb;
        letter-spacing: -0.04em;
        line-height: 1.05;
        max-width: 780px;
        margin-bottom: 20px;
    }
    .wel-headline span { color: #f59e0b; }
    .wel-subline {
        font-size: 1.05rem;
        color: #4b5563;
        line-height: 1.75;
        max-width: 540px;
        margin-bottom: 40px;
    }
    .wel-cta-group {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 72px;
    }
    .wel-cta-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #0b0f18;
        border-radius: 12px;
        font-size: 0.95rem;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 4px 24px rgba(245,158,11,0.35);
        transition: opacity 0.18s, transform 0.18s, box-shadow 0.18s;
        letter-spacing: 0.01em;
    }
    .wel-cta-primary:hover {
        opacity: 0.92;
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(245,158,11,0.45);
    }
    .wel-cta-secondary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 28px;
        background: #111622;
        border: 1px solid rgba(255,255,255,0.09);
        color: #9ca3af;
        border-radius: 12px;
        font-size: 0.95rem;
        font-weight: 700;
        text-decoration: none;
        transition: background 0.18s, border-color 0.18s, color 0.18s;
    }
    .wel-cta-secondary:hover {
        background: #161d2e;
        border-color: rgba(255,255,255,0.16);
        color: #e5e7eb;
    }

    /* ── Role cards ── */
    .wel-roles {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
        width: 100%;
        max-width: 860px;
    }
    .wel-role-card {
        background: #111622;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 18px;
        padding: 26px 24px;
        text-align: left;
        transition: border-color 0.2s, transform 0.2s;
        position: relative;
        overflow: hidden;
    }
    .wel-role-card:hover {
        border-color: rgba(255,255,255,0.12);
        transform: translateY(-3px);
    }
    .wel-role-card::before {
        content: '';
        position: absolute;
        top: -30px; right: -30px;
        width: 90px; height: 90px;
        border-radius: 50%;
        filter: blur(36px);
        opacity: 0.3;
        pointer-events: none;
    }
    .wel-role-card.admin::before  { background: #f59e0b; }
    .wel-role-card.cashier::before { background: #3b82f6; }
    .wel-role-card.acc::before    { background: #10b981; }
    .wel-role-icon {
        font-size: 1.6rem;
        margin-bottom: 14px;
    }
    .wel-role-name {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        margin-bottom: 8px;
    }
    .wel-role-card.admin  .wel-role-name { color: #f59e0b; }
    .wel-role-card.cashier .wel-role-name { color: #60a5fa; }
    .wel-role-card.acc    .wel-role-name { color: #34d399; }
    .wel-role-desc {
        font-size: 0.85rem;
        color: #4b5563;
        line-height: 1.65;
    }

    /* ── Features strip ── */
    .wel-features {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 12px 32px;
        padding: 28px 40px;
        border-top: 1px solid rgba(255,255,255,0.05);
        background: #0d1117;
    }
    .wel-feature-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.82rem;
        color: #374151;
        font-weight: 600;
    }
    .wel-feature-item svg { color: #f59e0b; flex-shrink: 0; }

    /* ── Responsive ── */
    @media (max-width: 720px) {
        .wel-nav { padding: 0 20px; }
        .wel-roles { grid-template-columns: 1fr; max-width: 420px; }
        .wel-headline { font-size: 2.4rem; }
        .wel-cta-group { flex-direction: column; width: 100%; max-width: 340px; }
        .wel-cta-primary, .wel-cta-secondary { width: 100%; justify-content: center; }
    }
    @media (max-width: 480px) {
        .wel-nav-btn-outline { display: none; }
    }
</style>

<div class="wel-shell">

    {{-- ── Nav ── --}}
    <nav class="wel-nav">
        <a href="/" class="wel-brand">
            <div class="wel-brand-icon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="5" width="20" height="14" rx="2" fill="rgba(0,0,0,0.35)"/>
                    <path d="M7 10h2M11 10h2M15 10h2M7 14h2M11 14h2M15 14h2" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M7 6.5h10v2H7z" fill="rgba(255,255,255,0.25)"/>
                </svg>
            </div>
            <span class="wel-brand-name">Swift<span>POS</span></span>
        </a>
        <div class="wel-nav-links">
            <a href="{{ route('register') }}" class="wel-nav-btn wel-nav-btn-outline">Create account</a>
            <a href="{{ route('login') }}" class="wel-nav-btn wel-nav-btn-primary">Sign in</a>
        </div>
    </nav>

    {{-- ── Hero ── --}}
    <section class="wel-hero">
        <div class="wel-badge">
            <div class="wel-badge-dot"></div>
            System Online · Ready for operations
        </div>

        <h1 class="wel-headline">
            The POS built for<br><span>fast retail teams.</span>
        </h1>
        <p class="wel-subline">
            One system for your entire floor. Admins, cashiers, and accountants — each with the right access to move fast and stay accurate.
        </p>

        <div class="wel-cta-group">
            <a href="{{ route('login') }}" class="wel-cta-primary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4M10 17l5-5-5-5M15 12H3"/></svg>
                Sign in to dashboard
            </a>
            <a href="{{ route('register') }}" class="wel-cta-secondary">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M12 7a4 4 0 110 8 4 4 0 010-8zM19 8v6M22 11h-6"/></svg>
                Register staff account
            </a>
        </div>

        <div class="wel-roles">
            <div class="wel-role-card admin">
                <div class="wel-role-icon">🛡️</div>
                <div class="wel-role-name">Admin</div>
                <div class="wel-role-desc">Full operational visibility — manage staff access, monitor store health, and approve daily actions.</div>
            </div>
            <div class="wel-role-card cashier">
                <div class="wel-role-icon">🖥️</div>
                <div class="wel-role-name">Cashier</div>
                <div class="wel-role-desc">Checkout-focused access for fast billing, queue flow, and shift-ready transaction handling.</div>
            </div>
            <div class="wel-role-card acc">
                <div class="wel-role-icon">📊</div>
                <div class="wel-role-name">Accountant</div>
                <div class="wel-role-desc">Finance-oriented tools for revenue tracking, payment review, and reconciliation reports.</div>
            </div>
        </div>
    </section>

    {{-- ── Feature strip ── --}}
    <footer class="wel-features">
        <div class="wel-feature-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
            Role-based access
        </div>
        <div class="wel-feature-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
            Real-time terminal monitoring
        </div>
        <div class="wel-feature-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
            Secure staff authentication
        </div>
        <div class="wel-feature-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
            Multi-counter support
        </div>
        <div class="wel-feature-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>
            Daily sales reporting
        </div>
    </footer>

</div>
</x-layouts.app>
