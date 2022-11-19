{{-- Sidebar --}}
<div class="text-center mt-5">
    <div class="m-auto icon-shape icon-shape-large">
        <i class="fa fa-user"></i>
    </div>

    {{-- Display name --}}
    <p class="m-auto display-7 mt-4">{{ $labelName }}</p>
</div>

<div class="mt-5 p-4">
    <ul class="list-group sidebar">
        <li class="bg-transparent border-0 mt-4 py-2">
            <a href="{{ route('home') }}" class="list-group-item text-decoration-none text-dark">
                <div class="icon-shape icon-shape-small me-4">
                    <i class="fa fa-home"></i>
                </div>
                <span>Overview</span>
            </a>
        </li>

        @cannot('cannotView', \App\Models\User::class)
        <li class="bg-transparent border-0 mt-4 py-2">
            <a href="{{ route('users') }}" class="list-group-item text-decoration-none text-dark">
                <div class="icon-shape icon-shape-small me-4">
                    <i class="fa fa-users"></i>
                </div>
                <span>Users</span>
            </a>
        </li>
        @endcannot

        @can('create', \App\Models\User::class)
        <li class="bg-transparent border-0 mt-4 py-2">
            <a href="{{ route('new') }}" class="list-group-item text-decoration-none text-dark">
                <div class="icon-shape icon-shape-small me-4">
                    <i class="fa fa-user-plus"></i>
                </div>
                <span>New User</span>
            </a>
        </li>
        @endcan

        <li class="bg-transparent border-0 mt-4 py-2">
            <a href="{{ url('/users/update/' . auth()->user()->id ) }}" class="list-group-item text-decoration-none text-dark">
                <div class="icon-shape icon-shape-small me-4">
                    <i class="fa fa-pencil"></i>
                </div>
                <span>Edit profile</span>
            </a>
        </li>
    </ul>
</div>
