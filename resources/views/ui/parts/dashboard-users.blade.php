<div class="card box-round shadow">
    <div class="card-body">
        @isset ($full)
            <h5 class="text-muted">Latest Users</h5>
        @else
            <h5 class="text-muted">Latest Clients</h5>
        @endisset

        @if (sizeof($users) > 0)
            <table class="table table-responsive mt-5 bg-white user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>

                        @isset($full)
                            <th>Username</th>
                        @endisset
                        <th>Role</th>

                        <th>E-mail</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ strtoupper($user->unique_id) }}</td>
                        <td>{{ $user->name }}</td>

                        @isset($full)
                            <td>{{ $user->username }}</td>
                        @endisset
                        <td>{{ ucfirst($user->role) }}</td>

                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-end">

                            @include('ui.parts.settings', [
                                'users' =>  $user
                            ])

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                @isset ($full)
                    {{ $userData->links() }}
                @else
                    <a href="{{ url('/users') }}" class="text-decoration-none btn btn-link m-0 p-0">View all</a>
                @endisset
            </div>
        @else 
            <p class="text-muted">No users yet</p>
        @endif
    </div>
</div>