<x-layouts.app title="Swift POS">
    <main class="center-wrap">
        <div class="container hero-grid">
            <section class="panel content-pad">
                <div class="eyebrow">
                    <span class="dot"></span>
                    Retail operations cockpit
                </div>
                <h1 class="title-xl" style="margin-top: 24px; max-width: 760px;">
                    Swift POS keeps every counter, ledger, and manager in sync.
                </h1>
                <p class="lede" style="max-width: 720px;">
                    Sign in to run the day, or create a new staff account with an Admin, Cashier, or Accountant role.
                </p>

                <div class="mini-grid" style="margin-top: 32px;">
                    <div class="mini-card dark">
                        <p class="card-label" style="color: #fcd34d;">Admin</p>
                        <p class="card-text">Oversees staff access, store health, and daily approvals.</p>
                    </div>
                    <div class="mini-card">
                        <p class="card-label" style="color: #c2410c;">Cashier</p>
                        <p class="card-text" style="color: #57534e;">Handles billing, queue flow, and shift-ready checkout work.</p>
                    </div>
                    <div class="mini-card">
                        <p class="card-label" style="color: #0369a1;">Accountant</p>
                        <p class="card-text" style="color: #57534e;">Tracks revenue, payment health, and reconciliation tasks.</p>
                    </div>
                </div>
            </section>

            <section class="panel-dark content-pad" style="display: flex; flex-direction: column; justify-content: center;">
                <p class="kicker">Access</p>
                <h2 class="title-md" style="margin-top: 16px;">Choose how you want to enter Swift POS.</h2>
                <p class="subtle" style="margin-top: 16px;">
                    Existing staff can log in and get redirected straight to the dashboard. New staff can register with the correct role in one step.
                </p>

                <div class="actions">
                    <a href="{{ route('login') }}" class="btn btn-gold">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-secondary">
                        Register
                    </a>
                </div>
            </section>
        </div>
    </main>
</x-layouts.app>
