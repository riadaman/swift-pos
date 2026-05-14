<x-layouts.app title="Dashboard | Swift POS">
    <main class="container" style="padding: 24px 0 32px;">
        <header class="panel header-card">
            <div>
                <p class="card-label" style="color: #c2410c;">Dashboard</p>
                <h1 class="title-lg" style="margin-top: 10px;">
                    Welcome, {{ $user->name }}
                </h1>
                <p class="lede" style="margin-top: 12px;">
                    You are logged in as <strong>{{ ucfirst($user->role) }}</strong> and were redirected here after authentication.
                </p>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn" style="width: auto; min-width: 140px;">
                    Logout
                </button>
            </form>
        </header>

        <section class="dashboard-grid" style="margin-top: 24px;">
            <div class="stack">
                <div class="stats-grid">
                    <article class="stat-card stat-dark">
                        <p class="card-label" style="color: #fcd34d;">Today</p>
                        <p class="stat-number">128</p>
                        <p class="card-text">Transactions tracked</p>
                    </article>
                    <article class="stat-card stat-light">
                        <p class="card-label" style="color: #0369a1;">Revenue</p>
                        <p class="stat-number">$8.4K</p>
                        <p class="card-text" style="color: #57534e;">Live daily sales pulse</p>
                    </article>
                    <article class="stat-card stat-light">
                        <p class="card-label" style="color: #047857;">Status</p>
                        <p class="stat-number">98%</p>
                        <p class="card-text" style="color: #57534e;">Checkout uptime</p>
                    </article>
                </div>

                <article class="panel-solid content-pad">
                    <div class="header-card" style="padding: 0; margin-top: 0;">
                        <div>
                            <p class="card-label" style="color: #c2410c;">Role Summary</p>
                            <h2 class="title-md" style="margin-top: 8px;">What your access is meant for</h2>
                        </div>
                        <span class="badge">{{ ucfirst($user->role) }}</span>
                    </div>

                    <div class="role-grid">
                        <div class="role-card">
                            <p style="font-weight: 700;">Admin focus</p>
                            <p class="card-text" style="color: #57534e;">Review store performance, monitor people, and manage system access.</p>
                        </div>
                        <div class="role-card">
                            <p style="font-weight: 700;">Cashier focus</p>
                            <p class="card-text" style="color: #57534e;">Move fast at checkout, reduce queue time, and keep every order accurate.</p>
                        </div>
                        <div class="role-card">
                            <p style="font-weight: 700;">Accountant focus</p>
                            <p class="card-text" style="color: #57534e;">Keep reconciliations tight, payments visible, and reporting ready.</p>
                        </div>
                    </div>
                </article>
            </div>

            <aside class="panel-dark content-pad">
                <p class="kicker">Account Card</p>
                <div class="account-box divider-space">
                    <p class="card-label" style="color: #d6d3d1;">Name</p>
                    <p style="margin-top: 10px; font-size: 1.8rem; font-weight: 800;">{{ $user->name }}</p>
                    <p class="card-label" style="margin-top: 22px; color: #d6d3d1;">Email</p>
                    <p style="margin-top: 10px; color: #f5f5f4;">{{ $user->email }}</p>
                    <p class="card-label" style="margin-top: 22px; color: #d6d3d1;">Role</p>
                    <p class="badge" style="margin-top: 10px; background: #fcd34d; color: #1c1917;">{{ ucfirst($user->role) }}</p>
                </div>

                <div class="info-box divider-space">
                    <p style="font-weight: 700; color: #fde68a;">Next step</p>
                    <p class="subtle" style="margin-top: 10px;">
                        This dashboard is now the post-login landing page. From here, you can keep adding POS modules based on role permissions.
                    </p>
                </div>
            </aside>
        </section>
    </main>
</x-layouts.app>
