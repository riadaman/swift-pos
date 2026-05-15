<x-layouts.app title="Dashboard | Swift POS">
<style>
    body { background: #0b0f18 !important; }
    .page-shell::before, .page-shell::after { display: none; }

    /* ── Layout shell ── */
    .pos-app {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background: #0b0f18;
        color: #e5e7eb;
        font-family: 'Instrument Sans', sans-serif;
    }

    /* ── Top nav ── */
    .pos-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 28px;
        height: 62px;
        background: #111622;
        border-bottom: 1px solid rgba(255,255,255,0.06);
        position: sticky;
        top: 0;
        z-index: 50;
        gap: 16px;
    }
    .pos-nav-brand {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-shrink: 0;
    }
    .pos-nav-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(145deg, #f59e0b, #b45309);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 0 16px rgba(245,158,11,0.25);
    }
    .pos-nav-name {
        font-size: 1.05rem;
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.03em;
    }
    .pos-nav-name span { color: #f59e0b; }
    .pos-nav-center {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    .pos-status-pill {
        display: flex;
        align-items: center;
        gap: 7px;
        padding: 5px 12px;
        background: rgba(16,185,129,0.08);
        border: 1px solid rgba(16,185,129,0.2);
        border-radius: 999px;
    }
    .pos-status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #10b981;
        box-shadow: 0 0 8px rgba(16,185,129,0.6);
        animation: pulse 2s infinite;
    }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.45} }
    .pos-status-pill span {
        font-size: 0.7rem;
        font-weight: 700;
        color: #10b981;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }
    .pos-clock {
        font-size: 0.88rem;
        font-weight: 700;
        color: #6b7280;
        letter-spacing: 0.04em;
        font-variant-numeric: tabular-nums;
    }
    .pos-nav-right {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-shrink: 0;
    }
    .pos-user-chip {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 6px 14px 6px 8px;
        background: #1a2035;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 999px;
    }
    .pos-avatar {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f59e0b, #b45309);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.72rem;
        font-weight: 800;
        color: #0b0f18;
        flex-shrink: 0;
    }
    .pos-user-info { line-height: 1.2; }
    .pos-user-name {
        font-size: 0.82rem;
        font-weight: 700;
        color: #e5e7eb;
    }
    .pos-user-role {
        font-size: 0.7rem;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }
    .pos-logout {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background: rgba(239,68,68,0.08);
        border: 1px solid rgba(239,68,68,0.2);
        border-radius: 10px;
        color: #f87171;
        font-size: 0.82rem;
        font-weight: 700;
        font-family: inherit;
        cursor: pointer;
        transition: background 0.18s, border-color 0.18s;
        letter-spacing: 0.02em;
    }
    .pos-logout:hover {
        background: rgba(239,68,68,0.14);
        border-color: rgba(239,68,68,0.35);
    }

    /* ── Page body ── */
    .pos-body {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 20px;
        padding: 24px 28px;
        flex: 1;
        align-items: start;
    }
    .pos-main { display: flex; flex-direction: column; gap: 20px; }

    /* ── Greeting ── */
    .pos-greeting {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }
    .pos-greeting-text { font-size: 1.5rem; font-weight: 800; color: #f9fafb; letter-spacing: -0.03em; }
    .pos-greeting-sub { font-size: 0.88rem; color: #4b5563; margin-top: 3px; }
    .pos-date-badge {
        padding: 8px 16px;
        background: #161d2e;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 10px;
        font-size: 0.82rem;
        font-weight: 600;
        color: #6b7280;
        white-space: nowrap;
    }

    /* ── Stat cards ── */
    .pos-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
    }
    .pos-stat {
        background: #111622;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 16px;
        padding: 22px 24px;
        position: relative;
        overflow: hidden;
        transition: border-color 0.2s;
    }
    .pos-stat:hover { border-color: rgba(255,255,255,0.12); }
    .pos-stat-glow {
        position: absolute;
        top: -20px; right: -20px;
        width: 80px; height: 80px;
        border-radius: 50%;
        filter: blur(30px);
        opacity: 0.35;
        pointer-events: none;
    }
    .pos-stat-label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: #4b5563;
        margin-bottom: 10px;
    }
    .pos-stat-value {
        font-size: 2.2rem;
        font-weight: 800;
        color: #f9fafb;
        letter-spacing: -0.04em;
        line-height: 1;
    }
    .pos-stat-desc {
        font-size: 0.8rem;
        color: #374151;
        margin-top: 8px;
    }
    .pos-stat-trend {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        margin-top: 10px;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 999px;
    }
    .trend-up { background: rgba(16,185,129,0.1); color: #10b981; }
    .trend-neutral { background: rgba(245,158,11,0.1); color: #f59e0b; }

    /* ── Quick actions ── */
    .pos-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        color: #374151;
        margin-bottom: 12px;
    }
    .pos-actions {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
    }
    .pos-action-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 20px 12px;
        background: #111622;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 16px;
        cursor: pointer;
        transition: background 0.18s, border-color 0.18s, transform 0.18s;
        text-decoration: none;
    }
    .pos-action-btn:hover {
        background: #161d2e;
        border-color: rgba(245,158,11,0.25);
        transform: translateY(-2px);
    }
    .pos-action-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
    }
    .pos-action-name {
        font-size: 0.8rem;
        font-weight: 700;
        color: #9ca3af;
        text-align: center;
        letter-spacing: 0.02em;
    }

    /* ── Activity feed ── */
    .pos-activity-card {
        background: #111622;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 16px;
        overflow: hidden;
    }
    .pos-activity-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 22px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .pos-activity-title {
        font-size: 0.88rem;
        font-weight: 700;
        color: #e5e7eb;
    }
    .pos-activity-badge {
        font-size: 0.7rem;
        font-weight: 700;
        padding: 3px 10px;
        background: rgba(245,158,11,0.1);
        border: 1px solid rgba(245,158,11,0.2);
        border-radius: 999px;
        color: #f59e0b;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }
    .pos-activity-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 22px;
        border-bottom: 1px solid rgba(255,255,255,0.04);
        transition: background 0.15s;
    }
    .pos-activity-row:last-child { border-bottom: none; }
    .pos-activity-row:hover { background: rgba(255,255,255,0.02); }
    .pos-activity-left { display: flex; align-items: center; gap: 12px; }
    .pos-activity-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }
    .pos-activity-id { font-size: 0.82rem; font-weight: 700; color: #d1d5db; }
    .pos-activity-meta { font-size: 0.75rem; color: #4b5563; margin-top: 2px; }
    .pos-activity-amount { font-size: 0.9rem; font-weight: 800; color: #f9fafb; }
    .pos-activity-status {
        font-size: 0.7rem;
        font-weight: 700;
        padding: 3px 9px;
        border-radius: 999px;
        margin-top: 4px;
        text-align: right;
    }
    .status-done { background: rgba(16,185,129,0.1); color: #10b981; }
    .status-pending { background: rgba(245,158,11,0.1); color: #f59e0b; }
    .status-void { background: rgba(239,68,68,0.1); color: #f87171; }

    /* ── Sidebar ── */
    .pos-sidebar { display: flex; flex-direction: column; gap: 16px; }
    .pos-sidebar-card {
        background: #111622;
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 16px;
        padding: 22px;
    }
    .pos-staff-avatar {
        width: 54px; height: 54px;
        border-radius: 14px;
        background: linear-gradient(135deg, #f59e0b, #b45309);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        font-weight: 800;
        color: #0b0f18;
        margin-bottom: 14px;
        box-shadow: 0 0 24px rgba(245,158,11,0.2);
    }
    .pos-staff-name { font-size: 1.1rem; font-weight: 800; color: #f9fafb; letter-spacing: -0.02em; }
    .pos-staff-email { font-size: 0.8rem; color: #4b5563; margin-top: 3px; word-break: break-all; }
    .pos-role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 14px;
        padding: 6px 14px;
        background: rgba(245,158,11,0.1);
        border: 1px solid rgba(245,158,11,0.25);
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        color: #f59e0b;
        text-transform: uppercase;
        letter-spacing: 0.1em;
    }
    .pos-divider { border: none; border-top: 1px solid rgba(255,255,255,0.05); margin: 16px 0; }
    .pos-info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255,255,255,0.04);
    }
    .pos-info-row:last-child { border-bottom: none; }
    .pos-info-key { font-size: 0.75rem; color: #4b5563; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; }
    .pos-info-val { font-size: 0.82rem; font-weight: 700; color: #9ca3af; }
    .pos-info-val.green { color: #10b981; }
    .pos-sidebar-section-label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.14em;
        color: #374151;
        margin-bottom: 14px;
    }
    .pos-tip {
        padding: 14px 16px;
        background: rgba(245,158,11,0.06);
        border: 1px solid rgba(245,158,11,0.15);
        border-radius: 12px;
        font-size: 0.8rem;
        color: #78716c;
        line-height: 1.6;
    }
    .pos-tip strong { color: #f59e0b; }

    /* ── Responsive ── */
    @media (max-width: 900px) {
        .pos-body { grid-template-columns: 1fr; }
        .pos-stats { grid-template-columns: 1fr 1fr; }
        .pos-actions { grid-template-columns: repeat(2, 1fr); }
        .pos-nav-center { display: none; }
    }
    @media (max-width: 580px) {
        .pos-nav { padding: 0 16px; }
        .pos-body { padding: 16px; gap: 14px; }
        .pos-stats { grid-template-columns: 1fr; }
        .pos-user-info { display: none; }
    }
</style>

<div class="pos-app">

    {{-- ── Top nav ── --}}
    <nav class="pos-nav">
        <div class="pos-nav-brand">
            <div class="pos-nav-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="5" width="20" height="14" rx="2" fill="rgba(0,0,0,0.35)"/>
                    <path d="M7 10h2M11 10h2M15 10h2M7 14h2M11 14h2M15 14h2" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                    <path d="M7 6.5h10v2H7z" fill="rgba(255,255,255,0.25)"/>
                </svg>
            </div>
            <span class="pos-nav-name">Swift<span>POS</span></span>
        </div>

        <div class="pos-nav-center">
            <div class="pos-status-pill">
                <div class="pos-status-dot"></div>
                <span>Terminal Online</span>
            </div>
            <div class="pos-clock" id="pos-clock">--:-- --</div>
        </div>

        <div class="pos-nav-right">
            <div class="pos-user-chip">
                <div class="pos-avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                <div class="pos-user-info">
                    <div class="pos-user-name">{{ $user->name }}</div>
                    <div class="pos-user-role">{{ ucfirst($user->role) }}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="pos-logout">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>

    {{-- ── Body ── --}}
    <div class="pos-body">
        <div class="pos-main">

            {{-- Greeting --}}
            <div class="pos-greeting">
                <div>
                    <div class="pos-greeting-text">Good day, {{ explode(' ', $user->name)[0] }} 👋</div>
                    <div class="pos-greeting-sub">Here's what's happening at your terminal today.</div>
                </div>
                <div class="pos-date-badge" id="pos-date">{{ now()->format('D, M j Y') }}</div>
            </div>

            {{-- Stat cards --}}
            <div class="pos-stats">
                <div class="pos-stat">
                    <div class="pos-stat-glow" style="background:#f59e0b;"></div>
                    <div class="pos-stat-label">Transactions</div>
                    <div class="pos-stat-value">128</div>
                    <div class="pos-stat-desc">Processed today</div>
                    <div class="pos-stat-trend trend-up">↑ 12% vs yesterday</div>
                </div>
                <div class="pos-stat">
                    <div class="pos-stat-glow" style="background:#3b82f6;"></div>
                    <div class="pos-stat-label">Revenue</div>
                    <div class="pos-stat-value">$8.4K</div>
                    <div class="pos-stat-desc">Live daily total</div>
                    <div class="pos-stat-trend trend-up">↑ 8% vs yesterday</div>
                </div>
                <div class="pos-stat">
                    <div class="pos-stat-glow" style="background:#10b981;"></div>
                    <div class="pos-stat-label">Uptime</div>
                    <div class="pos-stat-value">98%</div>
                    <div class="pos-stat-desc">Checkout availability</div>
                    <div class="pos-stat-trend trend-neutral">Stable</div>
                </div>
            </div>

            {{-- Quick actions --}}
            <div>
                <div class="pos-section-label">Quick Actions</div>
                <div class="pos-actions">
                    <a href="#" class="pos-action-btn">
                        <div class="pos-action-icon" style="background:rgba(245,158,11,0.12);">🛒</div>
                        <div class="pos-action-name">New Sale</div>
                    </a>
                    <a href="#" class="pos-action-btn">
                        <div class="pos-action-icon" style="background:rgba(59,130,246,0.12);">📋</div>
                        <div class="pos-action-name">Orders</div>
                    </a>
                    <a href="#" class="pos-action-btn">
                        <div class="pos-action-icon" style="background:rgba(16,185,129,0.12);">📊</div>
                        <div class="pos-action-name">Reports</div>
                    </a>
                    <a href="#" class="pos-action-btn">
                        <div class="pos-action-icon" style="background:rgba(139,92,246,0.12);">👥</div>
                        <div class="pos-action-name">Team</div>
                    </a>
                </div>
            </div>

            {{-- Recent activity --}}
            <div>
                <div class="pos-section-label">Recent Transactions</div>
                <div class="pos-activity-card">
                    <div class="pos-activity-header">
                        <span class="pos-activity-title">Today's Activity</span>
                        <span class="pos-activity-badge">Live</span>
                    </div>

                    @php
                    $transactions = [
                        ['id'=>'#TXN-0041','item'=>'4 items · Cash','time'=>'2 min ago','amount'=>'$124.00','status'=>'done'],
                        ['id'=>'#TXN-0040','item'=>'2 items · Card','time'=>'11 min ago','amount'=>'$56.50','status'=>'done'],
                        ['id'=>'#TXN-0039','item'=>'1 item · Card','time'=>'28 min ago','amount'=>'$19.99','status'=>'pending'],
                        ['id'=>'#TXN-0038','item'=>'6 items · Cash','time'=>'45 min ago','amount'=>'$208.30','status'=>'done'],
                        ['id'=>'#TXN-0037','item'=>'1 item · Card','time'=>'1 hr ago','amount'=>'$33.00','status'=>'void'],
                    ];
                    $colors = ['done'=>'#10b981','pending'=>'#f59e0b','void'=>'#f87171'];
                    @endphp

                    @foreach($transactions as $tx)
                    <div class="pos-activity-row">
                        <div class="pos-activity-left">
                            <div class="pos-activity-dot" style="background:{{ $colors[$tx['status']] }};box-shadow:0 0 6px {{ $colors[$tx['status']] }}66;"></div>
                            <div>
                                <div class="pos-activity-id">{{ $tx['id'] }}</div>
                                <div class="pos-activity-meta">{{ $tx['item'] }} · {{ $tx['time'] }}</div>
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <div class="pos-activity-amount">{{ $tx['amount'] }}</div>
                            <div class="pos-activity-status status-{{ $tx['status'] }}">{{ ucfirst($tx['status']) }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        {{-- ── Sidebar ── --}}
        <aside class="pos-sidebar">

            {{-- Staff card --}}
            <div class="pos-sidebar-card">
                <div class="pos-sidebar-section-label">Staff on duty</div>
                <div class="pos-staff-avatar">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                <div class="pos-staff-name">{{ $user->name }}</div>
                <div class="pos-staff-email">{{ $user->email }}</div>
                <div class="pos-role-badge">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a5 5 0 105 5 5 5 0 00-5-5zm0 8a3 3 0 110-6 3 3 0 010 6zm9 11v-1a7 7 0 00-14 0v1H5v-1a9 9 0 0118 0v1z"/></svg>
                    {{ ucfirst($user->role) }}
                </div>
            </div>

            {{-- Terminal info --}}
            <div class="pos-sidebar-card">
                <div class="pos-sidebar-section-label">Terminal Info</div>
                <div class="pos-info-row">
                    <span class="pos-info-key">Terminal</span>
                    <span class="pos-info-val">POS-01</span>
                </div>
                <div class="pos-info-row">
                    <span class="pos-info-key">Location</span>
                    <span class="pos-info-val">Counter A</span>
                </div>
                <div class="pos-info-row">
                    <span class="pos-info-key">Session</span>
                    <span class="pos-info-val green">Active</span>
                </div>
                <div class="pos-info-row">
                    <span class="pos-info-key">Shift</span>
                    <span class="pos-info-val">Morning</span>
                </div>
                <div class="pos-info-row">
                    <span class="pos-info-key">Version</span>
                    <span class="pos-info-val">v1.0.0</span>
                </div>
            </div>

            {{-- Tip --}}
            <div class="pos-sidebar-card" style="padding:18px;">
                <div class="pos-tip">
                    <strong>Next step:</strong> POS modules (sales, inventory, receipts) can be added here based on the <strong>{{ ucfirst($user->role) }}</strong> role permissions.
                </div>
            </div>

        </aside>
    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const h = now.getHours(), m = now.getMinutes(), s = now.getSeconds();
        const ampm = h >= 12 ? 'PM' : 'AM';
        const hh = (h % 12 || 12).toString().padStart(2, '0');
        const mm = m.toString().padStart(2, '0');
        const ss = s.toString().padStart(2, '0');
        const el = document.getElementById('pos-clock');
        if (el) el.textContent = `${hh}:${mm}:${ss} ${ampm}`;
    }
    updateClock();
    setInterval(updateClock, 1000);
</script>
</x-layouts.app>
