{{-- 

    Settings Dropdown menu
    ======================
    
--}}
<div class="dropdown">
    <button class="btn btn-primarz dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-gears"></i>
    </button>
    <ul class="dropdown-menu borders">
        @can('view', $user)
        <li>
            <a class="dropdown-item" href="{{ url('/users/profile/' . $user->id ) }}">
                <div class="icon-shape icon-shape-small me-3">
                    <i class="fa fa-eye"></i>
                </div>
                <span>View profile</span>
            </a>
        </li>
        @endcan

        {{--
            Delete button display only to
            users who can delete users...
        --}}
        @can('delete', $user)        
        <li>
            <a onclick="return window.confirm('Are you sure?')"  class="dropdown-item" href="{{ url('/users/remove/' . $user->id ) }}">
                <div class="icon-shape icon-shape-small me-3">
                    <i class="fa fa-eraser"></i>
                </div>
                <span>Delete profile</span>
            </a>
        </li>
        @endcan

        {{-- 
            Update user button    
        --}}
        @can('update', $user)
        <li>
            <a class="dropdown-item" href="{{ url('/users/update/' . $user->id ) }}">
                <div class="icon-shape icon-shape-small me-3">
                    <i class="fa fa-pencil"></i>
                </div>
                <span>Update profile</span>
            </a>
        </li>
        @endcan

        {{-- 
            Upload Document button can see
            only user who can upload document
        --}}
      
        @can('assign', App\Models\File::class)
        <li>
            <a class="dropdown-item" href="{{ url('/upload/' . $user->id ) }}">
                <div class="icon-shape icon-shape-small me-3">
                    <i class="fa fa-upload"></i>
                </div>
                <span>Upload Document</span>
            </a>
        </li>
        @endcan

    </ul>
</div>