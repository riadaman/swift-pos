<x-layouts.app title="Login | Swift POS">
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
        padding: 24px;
        background: radial-gradient(ellipse at 50% 0%, rgba(245,158,11,0.08) 0%, transparent 60%),
                    linear-gradient(180deg, #111827 0%, #0d1017 100%);
    }
    .pos-brand-area {
        text-align: center;
        margin-bottom: 36px;
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
        max-width: 430px;
        background: #161b26;
        border: 1px solid rgba(255,255,255,0.07);
        border-radius: 24px;
        padding: 38px 36px 32px;
        box-shadow: 0 40px 100px rgba(0,0,0,0.55);
    }
    .pos-status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 22px;
        padding: 6px 12px;
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
        animation: pos-pulse 2s infinite;
    }
    @keyframes pos-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .pos-status-label {
        font-size: 0.72rem;
        font-weight: 700;
        color: #10b981;
        letter-spacing: 0.1em;
        text-transform: uppercase;
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
        margin-bottom: 30px;
    }
    .pos-field {
        margin-bottom: 20px;
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
    .pos-input {
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
    .pos-input::placeholder {
        color: #2d3748;
    }
    .pos-input:focus {
        border-color: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245,158,11,0.1);
    }
    .pos-error {
        margin-top: 7px;
        font-size: 0.85rem;
        color: #f87171;
    }
    .pos-remember {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #4b5563;
        font-size: 0.9rem;
        margin-bottom: 26px;
        cursor: pointer;
        user-select: none;
    }
    .pos-remember input[type="checkbox"] {
        accent-color: #f59e0b;
        width: 15px;
        height: 15px;
        cursor: pointer;
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
    }
    .pos-submit:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        box-shadow: 0 8px 28px rgba(245,158,11,0.4);
    }
    .pos-submit:active {
        transform: translateY(0);
    }
    .pos-divider {
        border: none;
        border-top: 1px solid rgba(255,255,255,0.05);
        margin: 26px 0 20px;
    }
    .pos-footer {
        text-align: center;
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
        <div class="pos-tag">Staff Access</div>
    </div>

    <div class="pos-card">
        <div class="pos-status">
            <div class="pos-status-dot"></div>
            <span class="pos-status-label">Terminal Online</span>
        </div>

        <div class="pos-heading">Sign in to your account</div>
        <div class="pos-sub">Enter your credentials to access the system</div>

        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf

            <div class="pos-field">
                <label for="email">Email Address</label>
                <input id="email" name="email" type="email"
                       value="{{ old('email') }}"
                       placeholder="you@store.com"
                       required autofocus
                       class="pos-input">
                @error('email')
                    <p class="pos-error">{{ $message }}</p>
                @enderror
            </div>

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

            <label class="pos-remember">
                <input type="checkbox" name="remember">
                Keep me signed in
            </label>

            <button type="submit" class="pos-submit">Sign In</button>
        </form>

        <hr class="pos-divider">

        <div class="pos-footer">
            New staff member? <a href="{{ route('register') }}">Create an account</a>
        </div>
    </div>
</div>
</x-layouts.app>
