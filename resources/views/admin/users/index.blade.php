@extends("admin.layouts.base")

@section("admin_content")
    <h1 class="mt-4">Users</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users List
        </div>
        <div class="card-body">
            @if(session()->has('users_updated'))
                <div class="text-success">
                    {{ session()->get('users_updated') }}
                </div>
            @endif
            <form method="POST" id="users_form" action="{{route("user.admin.users.update")}}">
                @csrf
                <button class="btn btn-success mb-1" type="submit">Save changes</button>
                <table id="users_table" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->diffForHumans()}}</td>
                            <td><select  class="controlled-input" size="1" name="{{"user-".$user->id."-role_id"}}">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" @if($user->role->id === $role->id) selected @endif>
                                            {{$role->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@endsection

@once
    @push("admin_js")
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset("js/admin-panel/datatables-simple-demo.js")}}"></script>
        <script src="{{asset("js/admin-panel/scripts.js")}}"></script>
    @endpush
@endonce


