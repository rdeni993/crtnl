{{-- 

    Upload Documents
    ================
    
--}}
@extends('ui.dashboard-template')

@section('dashboardContent')
    <div class="row m-0 p-4">
        <div class="col-lg-6 p-0">
            <div class="card border-0 box-round shadow">
                <div class="card-body">
                    <h5 class="text-muted">Upload documents</h5>
                    <div class="card border-0 p-0 mt-5">
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

                            <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-input mt-4">
                                    <small class="text-muted">File owner</small>
                                    <strong>
                                        <a href="{{ url("/users/profile/" . $user->id ) }}">
                                            {{ $user->name }}
                                        </a>
                                    </strong>
                                </div>
                                <div class="form-input mt-4">
                                    <input type="file" name="document" class="form-control" />
                                    <input type="hidden" name="user_id" value="{{ $user->id }}" />
                                </div>
                                <div class="form-input mt-4">
                                    <button class="btn btn-primary">Upload Document</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection