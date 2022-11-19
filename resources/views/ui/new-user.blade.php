{{-- 

    New User
    ==========

--}}
@extends('ui.dashboard-template')

@section('dashboardContent')
    <div class="row m-0 p-4">
        <div class="col-lg-12 p-0">
            <div class="card box-round shadow">
                <div class="card-body">
                    <h5 class="text-muted">Create New User</h5>

                    <div class="card border-0 w-50">
                        <div class="card-body">

                            @if( null !== session('alert-success-message') )
                                <div class="alert alert-success">
                                    <small>{{ session('alert-success-message') }}</small>
                                </div>
                            @endif

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <small>{{ $error }}</small>
                                    </div>
                                @endforeach
                            @endif
                                    
                            <form action="{{ url('/users/new') }}" method="POST">
                                @csrf

                                {{-- Register form fields --}}
                                @include('ui.parts.register-form')

                                {{-- Roles --}}
                                <div class="form-input mt-4">
                                    <label for="role">Select role</label>
                                    <select name="role" class="form-select">
                                        <option value="client" selected>Client</option>
                                        <option value="secretary">Secretary</option>
                                        <option value="administrator">Administrator</option>
                                    </select>
                                </div>

                                {{-- Agreed Button --}}
                                <div class="form-input mt-4">
                                    <input type="checkbox" name="agreed" /> User agreed with <a href="#" class="m-0 p-0 d-inline">Terms and Services</a>
                                    <p>
                                        @error('agreed')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </p>
                                </div>

                                <div class="form-input mt-4">
                                    <button class="btn btn-primary">Create New User</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection