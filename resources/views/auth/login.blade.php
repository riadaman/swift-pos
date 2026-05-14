<x-layouts.app title="Login | Swift POS">
    <main class="center-wrap">
        <div class="container auth-grid panel" style="max-width: 1080px; overflow: hidden;">
            <section class="content-pad" style="background: #1c1917; color: #fff;">
                <p class="kicker">Welcome back</p>
                <h1 class="title-lg" style="margin-top: 16px;">Login to Swift POS</h1>
                <p class="subtle" style="margin-top: 16px; max-width: 460px;">
                    Use your staff email and password to continue. After login, you will be redirected directly to the dashboard.
                </p>

                <div class="stack" style="margin-top: 32px;">
                    <div class="info-box">
                        <p style="font-weight: 700; color: #fde68a;">Quick access</p>
                        <p class="subtle" style="margin-top: 10px;">Admins monitor operations, cashiers handle checkout, and accountants track daily numbers from one shared workspace.</p>
                    </div>
                </div>
            </section>

            <section class="content-pad">
                <div style="max-width: 440px; margin: 0 auto;">
                    <h2 class="title-md">Sign in</h2>
                    <p style="margin-top: 8px; color: #57534e;">
                        New here?
                        <a href="{{ route('register') }}" class="text-link">Create an account</a>
                    </p>

                    <form method="POST" action="{{ route('login.attempt') }}" class="form">
                        @csrf
                        <div class="field">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="input">
                            @error('email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" required class="input">
                        </div>

                        <label class="checkbox-row">
                            <input type="checkbox" name="remember">
                            Keep me logged in
                        </label>

                        <button type="submit" class="btn">
                            Login
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>
</x-layouts.app>
