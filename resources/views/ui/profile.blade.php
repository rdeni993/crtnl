{{-- 

    User profile
    ============

--}}
@extends('ui.dashboard-template')

@section('dashboardContent')
    <div class="row m-0 p-4">

        <div class="col-lg-12 p-0">
            <div class="card box-round shadow">
                <div class="card-body">
                    <h5 class="text-muted">User profile</h5>
                    <ul class="list-group m-0 mt-5 p-0"> 
                        <li class="list-group-item p-0 border-0">
                            <p class="m-0">
                                <small class="text-muted text-uppercase">name</small>
                            </p>
                            <p><strong>{{ $user->name }}</strong></p>
                        </li>           
                        <li class="list-group-item p-0 border-0">
                            <p class="m-0">
                                <small class="text-muted text-uppercase">ID</small>
                            </p>
                            <p>{{ strtoupper($user->unique_id) }}</p>
                        </li>         
                        <li class="list-group-item p-0 border-0">
                            <p class="m-0">
                                <small class="text-muted text-uppercase">username</small>
                            </p>
                            <p>{{ $user->username }}</p>
                        </li>
                        <li class="list-group-item p-0 border-0">
                            <p class="m-0">
                                <small class="text-muted text-uppercase">E-mail</small>
                            </p>
                            <p>{{ $user->email }}</p>
                        </li>
                        <li class="list-group-item p-0 border-0">
                            <p class="m-0">
                                <small class="text-muted text-uppercase">Role</small>
                            </p>
                            <p>{{ $user->role }}</p>
                        </li>
                        <li class="list-group-item p-0 border-0">
                            <p class="m-0">
                                <small class="text-muted text-uppercase">Options</small>
                            </p>

                            <div>
                                @include('ui.parts.settings')
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-12 p-0 mt-4">
            @include('ui.parts.user-files', [
                'documents' => $user->documents
            ])
        </div>

    </div>
@endsection