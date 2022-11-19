{{-- 

    Notifications
    
--}}
@extends('ui.dashboard-template')

@section('dashboardContent')
    <div class="row m-0 p-4">
        <div class="col-lg-12 p-0">
            @include('ui.parts.logs', [
                'notifications' => $notifications,
                'full' => true
            ])
        </div>
    </div>
@endsection