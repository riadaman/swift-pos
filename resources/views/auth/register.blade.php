<x-layouts.app title="Register | Swift POS">
<style>
    body {
        background: #0d1017 !important;
    }
    .page-shell::before,
    .page-shell::after {
        display: none;
    }
    .pos-shell {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 32px 24px;
        background: radial-gradient(ellipse at 50% 0%, rgba(245,158,11,0.08) 0%, transparent 60%),
                    linear-gradient(180deg, #111827 0%, #0d1017 100%);
    }
    .pos-brand-area {
        text-align: center;
        margin-bottom: 32px;
    }
    .pos-icon {
        width: 68px;
        height: 68px;
        background: linear-gradient(145deg, #f59e0b, #b45309);
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        box-shadow: 0 0 48px rgba(245,158,11,0.30), 0 8px 24px rgba(0,0,0,0.4);
    }
    .pos-name {
        font-size: 2.1rem;
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.04em;
        line-height: 1;
    }
    .pos-name span {
        color: #f59e0b;
    }
    .pos-tag {
        display: inline-block;
        margin-top: 10px;
        padding: 5px 14px;
        background: rgba(245,158,11,0.1);
        border: 1px solid rgba(245,158,11,0.25);
        border-radius: 999px;
        color: #f59e0b;
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.2em;
        text-transform: uppercase;
    }
    .pos-card {
        width: 100%;
        max-width: 500px;
        background: #161b26;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 24px;
        padding: 38px 36px 32px;
        box-shadow: 0 40px 100px rgba(0,0,0,0.55);
    }
    .pos-heading {
        font-size: 1.45rem;
        font-weight: 800;
        color: #f9fafb;
        margin-bottom: 4px;
        letter-spacing: -0.02em;
    }
    .pos-sub {
        font-size: 0.9rem;
        color: #4b5563;
        margin-bottom: 28px;
    }
    .pos-field {
        margin-bottom: 18px;
    }
    .pos-field label {
        display: block;
        font-size: 0.75rem;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        margin-bottom: 8px;
    }
    .pos-input,
    .pos-select {
        width: 100%;
        background: #0d1017;
        border: 1px solid rgba(255,255,255,0.09);
        border-radius: 12px;
        padding: 15px 18px;
        color: #f9fafb;
        font-size: 1rem;
        font-family: inherit;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
        box-sizing: border-box;
    }
    .pos-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 44px;
        cursor: pointer;
    }
    .pos-select option {
        background: #161b26;
        color: #f9fafb;
    }
    .pos-input::placeholder {
        color: #2d3748;
    }
    .pos-input:focus,
    .pos-select:focus {
        border-color: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245,158,11,0.1);
    }
    .pos-error {
        margin-top: 7px;
        font-size: 0.85rem;
        color: #f87171;
    }
    .pos-role-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        margin-bottom: 18px;
    }
    .pos-role-card {
        padding: 14px 12px;
        background: #0d1017;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 12px;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.2s, background 0.2s;
    }
    .pos-role-card:hover {
        border-color: rgba(245,158,11,0.3);
        background: rgba(245,158,11,0.04);
    }
    .pos-role-icon {
        font-size: 1.4rem;
        margin-bottom: 6px;
    }
    .pos-role-name {
        font-size: 0.78rem;
        font-weight: 700;
        color: #9ca3af;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }
    .pos-role-desc {
        font-size: 0.72rem;
        color: #4b5563;
        margin-top: 4px;
        line-height: 1.4;
    }
    .pos-divider {
        border: none;
        border-top: 1px solid rgba(255,255,255,0.05);
        margin: 6px 0 20px;
    }
    .pos-submit {
        width: 100%;
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: #0d1017;
        border: none;
        border-radius: 12px;
        padding: 16px;
        font-size: 1rem;
        font-weight: 800;
        font-family: inherit;
        cursor: pointer;
        letter-spacing: 0.02em;
        transition: opacity 0.18s, transform 0.18s, box-shadow 0.18s;
        box-shadow: 0 4px 20px rgba(245,158,11,0.3);
        margin-top: 8px;
    }
    .pos-submit:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        box-shadow: 0 8px 28px rgba(245,158,11,0.4);
    }
    .pos-submit:active {
        transform: translateY(0);
    }
    .pos-footer {
        text-align: center;
        margin-top: 22px;
        font-size: 0.88rem;
        color: #374151;
    }
    .pos-footer a {
        color: #f59e0b;
        font-weight: 700;
        text-decoration: none;
    }
    .pos-footer a:hover {
        text-decoration: underline;
    }
    .pos-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }
    @media (max-width: 520px) {
        .pos-card {
            padding: 28px 22px 24px;
        }
        .pos-role-grid {
            grid-template-columns: 1fr;
        }
        .pos-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="pos-shell">
    <div class="pos-brand-area">
        <div class="pos-icon">
            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="5" width="20" height="14" rx="2" fill="rgba(0,0,0,0.35)"/>
                <path d="M7 10h2M11 10h2M15 10h2M7 14h2M11 14h2M15 14h2" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/>
                <path d="M7 6.5h10v2H7z" fill="rgba(255,255,255,0.25)"/>
            </svg>
        </div>
        <div class="pos-name">Swift<span>POS</span></div>
        <div class="pos-tag">New Staff Account</div>
    </div>

    <div class="pos-card">
        <div class="pos-heading">Create a staff account</div>
        <div class="pos-sub">Fill in the details below and assign a role to get started</div>

        <div class="pos-role-grid">
            <div class="pos-role-card">
                <div class="pos-role-icon">🛡️</div>
                <div class="pos-role-name">Admin</div>
                <div class="pos-role-desc">Full system access</div>
            </div>
            <div class="pos-role-card">
                <div class="pos-role-icon">🖥️</div>
                <div class="pos-role-name">Cashier</div>
                <div class="pos-role-desc">Counter & checkout</div>
            </div>
            <div class="pos-role-card">
                <div class="pos-role-icon">📊</div>
                <div class="pos-role-name">Accountant</div>
                <div class="pos-role-desc">Finance & reports</div>
            </div>
        </div>

        <hr class="pos-divider">

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="pos-row">
                <div class="pos-field">
                    <label for="name">Full Name</label>
                    <input id="name" name="name" type="text"
                           value="{{ old('name') }}"
                           placeholder="Jane Smith"
                           required autofocus
                           class="pos-input">
                    @error('name')
                        <p class="pos-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pos-field">
                    <label for="role">Role</label>
                    <select id="role" name="role" required class="pos-select">
                        <option value="">Select role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" @selected(old('role') === $role)>{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="pos-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pos-field">
                <label for="email">Email Address</label>
                <input id="email" name="email" type="email"
                       value="{{ old('email') }}"
                       placeholder="jane@store.com"
                       required
                       class="pos-input">
                @error('email')
                    <p class="pos-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="pos-row">
                <div class="pos-field">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password"
                           placeholder="••••••••"
                           required
                           class="pos-input">
                    @error('password')
                        <p class="pos-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pos-field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           placeholder="••••••••"
                           required
                           class="pos-input">
                </div>
            </div>

            <button type="submit" class="pos-submit">Create Account</button>
        </form>

        <div class="pos-footer">
            Already have an account? <a href="{{ route('login') }}">Sign in here</a>
        </div>
    </div>
</div>
</x-layouts.app>
