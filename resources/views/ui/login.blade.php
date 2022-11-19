{{-- 

    Login Screen
    ============
    
--}}
@extends('ui.template')

@section('pageContent')
    <div class="container-fluid justify-content-center w-100 h-100 d-flex align-items-center position-absolute">
        <div class="card form-card">
            <div class="card-body">
                <form action="{{ url('/login') }}" method="POST">
                    @csrf

                    <h5 class="mb-5">Login</h5>

                    @if ( null !== session('alert-success-message') )
                        <div class="alert alert-success">
                            {{ session('alert-success-message') }}
                        </div>
                    @endif

                    @if ( $errors->any() )
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger mb-3">
                            <p class="m-0">{{ $error }}</p>
                        </div>
                        @endforeach
                    @endif

                    <div class="form-input">
                        <label for="email">
                            <small>E-mail</small>
                        </label>
                        <input class="form-control" type="email" name="email" placeholder="eg. username@email.com" required />
                        @error('email')
                            <p><small class="text-danger">{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="form-input mt-4">
                        <label for="password">
                            <small>Password</small>
                        </label>
                        <input class="form-control" type="password" name="password" placeholder="******" required />
                    </div>

                    <div class="form-input mt-4">
                        <input type="checkbox" name="remember" /> Remember me
                    </div>

                    <div class="form-input">
                        <button class="btn btn-primary form-control mt-4">
                            Login
                        </button>
                    </div>

                </form>
            </div>
            <div class="card-body">
                <a href="{{ route('signup') }}" class="btn btn-link text-decoration-none">Create New Account</a>
            </div>
        </div>
    </div>
@endsection