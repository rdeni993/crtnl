{{-- 

    Logs
    =========
    
--}}
<div class="card box-round shadow h-100">
    <div class="card-body">

        <h5 class="text-muted">Activity</h5>

        @if ( sizeof($notifications) )
        <ul class="list-group mt-5">
                @foreach ($notifications as $note)
                <li class="list-group-item border-0 d-flex ps-0 align-items-center">
                    <div class="icon-shape icon-shape-small bg-rose text-white me-3">
                        <i class="fa fa-bell"></i>
                    </div>
                    <span>
                        <small>{{ $note->data['message'] }}</small>
                    </span>
                </li>
                @endforeach
        </ul>
        @empty($full)
            <a href="{{ route('notifications') }}" class="p-0 m-0 mt-5 btn btn-link text-decoration-none">View All</a>
        @endempty

        @isset($full)
            {{ $notifications->links() }}

            <div class="text-end">
                <a href="{{ route('clear') }}">Clear Notifications</a>
            </div>
        @endisset

        @else
            <p class="text-muted">You are up to date</p>
        @endif

    </div>
</div>

