{{-- 

    Users
    ========

    Display user statistic
    
--}}

<div class="row p-4 m-0">

    <div class="col-lg-3 p-2 ps-0">
        <div class="card box-round shadow">
            <div class="card-body d-flex box-round justify-content-between align-items-center bg-white">
                <div>
                    <p class="p-0 m-0">
                        <small class="text-muted">Total users</small>
                    </p>
                    <p class="p-0 m-0">
                        <strong>{{ $users }}</strong>
                    </p>
                </div>
                <div class="icon-shape icon-shape-medium bg-rose shadow">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 p-2">
        <div class="card box-round shadow">
            <div class="card-body d-flex box-round justify-content-between align-items-center bg-white">
                <div>
                    <p class="p-0 m-0">
                        <small class="text-muted">Administrators</small>
                    </p>
                    <p class="p-0 m-0">
                        <strong>{{ $admins }}</strong>
                    </p>
                </div>
                <div class="icon-shape icon-shape-medium bg-rose shadow">
                    <i class="fa-sharp fa-solid fa-user-tie"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 p-2">
        <div class="card box-round shadow">
            <div class="card-body d-flex box-round justify-content-between align-items-center bg-white">
                <div>
                    <p class="p-0 m-0">
                        <small class="text-muted">Secretaries</small>
                    </p>
                    <p class="p-0 m-0">
                        <strong>{{ $secretaries }}</strong>
                    </p>
                </div>
                <div class="icon-shape icon-shape-medium bg-rose shadow">
                    <i class="fa-sharp fa-solid fa-person-shelter"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 p-2 pe-0">
        <div class="card box-round shadow">
            <div class="card-body d-flex box-round justify-content-between align-items-center bg-white">
                <div>
                    <p class="p-0 m-0">
                        <small class="text-muted">Clients</small>
                    </p>
                    <p class="p-0 m-0">
                        <strong>{{ $clients }}</strong>
                    </p>
                </div>
                <div class="icon-shape icon-shape-medium bg-rose shadow">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
            </div>
        </div>
    </div>

</div>