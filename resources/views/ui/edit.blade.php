{{-- 
    
    Edit User Data
    ==============
    
--}}
@extends('ui.dashboard-template')

@section('dashboardContent')
    <div class="row m-0 p-4">
        <div class="col-lg-6 p-0">

            <div class="card box-round shadow">
                <div class="card-body">
                    <h5 class="text-muted">
                        Edit profile 
                        <strong>
                            <small>
                                <a class="m-0 p-0 text-decoration-none" href="{{ url('/users/profile/' . $user->id ) }}">{{ $user->name }}</a>
                            </small>
                        </strong>
                    </h5>

                    @if ( null !== session('alert-success-message') )
                        <div class="alert alert-success mt-4">
                            {{ session('alert-success-message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger mt-4">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    <div class="mt-5">

                        <form action="{{ url('/users/update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ $user->id }}" />

                            <div class="form-input mt-4">
                                <label for="name"><small>Full Name</small></label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>              
                            <div class="form-input mt-4">
                                <label for="username"><small>Username</small></label>
                                <input type="text" name="username" value="{{ $user->username }}" class="form-control" />
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>            
                            <div class="form-input mt-4">
                                <label for="username"><small>Email</small></label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" />
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-input mt-4">
                                <button class="btn btn-primary">Update profile</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection