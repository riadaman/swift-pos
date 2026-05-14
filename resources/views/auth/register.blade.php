<x-layouts.app title="Register | Swift POS">
    <main class="center-wrap">
        <div class="container auth-grid reverse panel" style="max-width: 1080px; overflow: hidden;">
            <section class="content-pad">
                <div style="max-width: 460px; margin: 0 auto;">
                    <h1 class="title-md">Create a staff account</h1>
                    <p style="margin-top: 12px; color: #57534e; line-height: 1.7;">
                        Register a new user and assign the correct role before they enter the system.
                    </p>

                    <form method="POST" action="{{ route('register.store') }}" class="form">
                        @csrf
                        <div class="field">
                            <label for="name">Full name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus class="input">
                            @error('name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required class="input">
                            @error('email')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="role">Role</label>
                            <select id="role" name="role" required class="select">
                                <option value="">Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" @selected(old('role') === $role)>{{ ucfirst($role) }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password" required class="input">
                            @error('password')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="password_confirmation">Confirm password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required class="input">
                        </div>

                        <button type="submit" class="btn">
                            Register and continue
                        </button>
                    </form>

                    <p style="margin-top: 18px; color: #57534e;">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-link">Login here</a>
                    </p>
                </div>
            </section>

            <section class="panel-dark content-pad">
                <p class="kicker">Roles</p>
                <h2 class="title-md" style="margin-top: 16px;">Built for the whole finance and sales floor.</h2>

                <div class="stack" style="margin-top: 26px;">
                    <div class="info-box">
                        <p style="font-weight: 700; color: #fde68a;">Admin</p>
                        <p class="subtle" style="margin-top: 10px;">Full operational visibility and account management oversight.</p>
                    </div>
                    <div class="info-box">
                        <p style="font-weight: 700; color: #fde68a;">Cashier</p>
                        <p class="subtle" style="margin-top: 10px;">Transaction-focused access for counters, receipts, and customer flow.</p>
                    </div>
                    <div class="info-box">
                        <p style="font-weight: 700; color: #fde68a;">Accountant</p>
                        <p class="subtle" style="margin-top: 10px;">Finance-oriented access for reconciliations, reports, and payment review.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-layouts.app>
