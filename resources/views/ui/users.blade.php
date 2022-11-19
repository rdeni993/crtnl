{{-- 

    User Control
    ============

--}}
@extends('ui.dashboard-template')

@section('dashboardContent')
    <div class="row m-0 p-4">
        @if (null !== session('alert-success-message'))
            <div class="col-lg-12">
                <div class="alert alert-success">
                    {{ session('alert-success-message') }}
                </div>
            </div>
        @endif
        <div class="col-lg-12 p-0">
            @include('ui.parts.dashboard-users', [
                'users' => $userData,
                'full' => true
            ])
        </div>
    </div>
@endsection