{{-- 
    Dashboard 
    =========

--}}
@extends('ui.dashboard-template')

@section('dashboardContent')
 
    @if ( null !== session('alert-success-message') )
        <div class="row m-0 p-4">
            <div class="col-lg-12 p-0">
                <div class="alert alert-success">
                    {{ session('alert-success-message') }}
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <small>{{ $error }}</small>
            </div>
        @endforeach
    @endif

    @cannot('cannotView', \App\Models\User::class)
        {{-- Load Users --}}
        @include('ui.parts.users', [
            'users'   => $countUsers,
            'admins'  => $countAdmins,
            'clients' => $countClients,
            'secretaries' => $countSecretaries
        ])    
    @endcannot

    {{--  --}}
    @cannot('cannotView', \App\Models\User::class)
    <div class="row m-0 p-4 d-flex row-eq-height">
        <div class="col-lg-8 pe-2 h-100 ps-0">
            @include('ui.parts.dashboard-users', [
                'users' => $clients
            ])
        </div>
        <div class="col-lg-4 ps-2 pe-0">
            @include('ui.parts.logs', [
                'notifications' => $notifications
            ])
        </div>
    </div>
    <div class="row m-0 p-4 mt-1">
        <div class="col-lg-12 p-0">
            @include('ui.parts.user-files', [
                'documents' => $documents
            ])
        </div>
    </div>
    @endcannot


@endsection