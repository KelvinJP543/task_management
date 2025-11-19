<x-guest-layout>

    <div class="card shadow-lg p-4">
        <div class="card-body">
            
            @if (session('status'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger mb-4" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                </div>

                <div class="form-check mb-3">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">Remember me</label>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-decoration-none" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        Log in
                    </button>
                </div>
                
                <div class="text-center mt-3">
                    <span class="text-sm text-muted">Don't have an account?</span>
                    <a href="{{ route('register') }}" class="text-sm text-decoration-none">
                         Register here
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>