<x-guest-layout>
    
    <div class="card shadow-lg p-4">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger mb-4" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Input Role tersembunyi (Default: 'user') --}}
                <input type="hidden" name="role" value="user">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" class="form-control"
                        type="password"
                        name="password_confirmation" required />
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a class="text-sm text-decoration-none" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>