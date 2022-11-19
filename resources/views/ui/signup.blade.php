{{-- 

    Sign Up Screen
    ============

--}}
@extends('ui.template')

@section('pageContent')
    <div class="container-fluid w-100 h-100 d-flex align-items-center justify-content-center position-absolute">
        <div class="card form-card">
            <div class="card-body">
                <form action="{{ url('/signup') }}" method="POST">
                    @csrf

                    <h5>Sign Up</h5>

                    {{-- Load Register form --}}
                    @include('ui.parts.register-form')
                    
                    <div class="form-input mt-4">
                        <input type="checkbox" name="agreed" /> I agree with <a href="#" class="m-0 p-0 d-inline">Terms and Services</a>
                        <p>
                            @error('agreed')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </p>
                    </div>

                    <div class="form-input">
                        <button class="btn btn-primary form-control mt-4">
                            Sign Up
                        </button>
                    </div>

                </form>
            </div>
            <div class="card-footer bg-transparent py-3">
                <a href="{{ route('login') }}" class="btn btn-link m-0 p-0">Login instead</a>
            </div>
        </div>
    </div>
@endsection