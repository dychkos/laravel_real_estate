@extends("admin.layouts.base")

@section("admin_content")
    <h1 class="mt-4">Dashboard</h1>
    <div class="row row-cols-1 row-cols-md-2 mb-4 g-4">
        <div class="col">
            <div class="card mb4">
                <div class="card-header">Features</div>
                <div class="card-body">
                    <form action="{{route('user.admin.features.store')}}" method="POST">
                        @csrf
                        @if(session()->has('feature_created'))
                            <div class="text-success">
                                {{ session()->get('feature_created') }}
                            </div>
                        @endif
                        @error("title")
                        <div class="validation-fail text-danger">{{$message}}</div>
                        @enderror
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title" placeholder="Features title">
                            <button class="btn btn-outline-secondary" type="submit">Add feature</button>
                        </div>
                    </form>
                    <form method="POST"  action="{{route("user.admin.features.delete")}}">
                        @csrf @method("DELETE")
                        <button class="btn btn-danger mb-1" type="submit">Delete chosen</button>
                        @if(session()->has('feature_removed'))
                            <div class="text-success">
                                {{ session()->get('feature_removed') }}
                            </div>
                        @endif
                        @error("features_remove_error")
                        <div class="validation-fail text-danger">{{$message}}</div>
                        @enderror
                        <table id="features_table" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($features as $feature)
                                <tr>
                                    <td>{{$feature->title}}</td>
                                    <td><input type="checkbox" name="{{"remove_feature_".$feature->id}}" value="{{$feature->id}}"></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb4">
                <div class="card-header">Comments</div>
                <div class="card-body">
                    <div>
                        <form method="POST" action="{{route("user.admin.comments.delete")}}">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger mb-1" id="button">Delete chosen</button>
                            @if(session()->has('comment_removed'))
                                <div class="text-success">
                                    {{ session()->get('comment_removed') }}
                                </div>
                            @endif
                            @error("comment_remove_error")
                            <div class="validation-fail text-danger">{{$message}}</div>
                            @enderror

                            <table id="comments_table" class="display" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Message</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->author_name}}</td>
                                        <td>{{$comment->author_message}}</td>
                                        <td><input type="checkbox" name="remove_comment" value="{{$comment->id}}"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
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
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Houses List
        </div>
        <div class="card-body">
            @if(session()->has('houses_updated'))
                <div class="text-success">
                    {{ session()->get('houses_updated') }}
                </div>
            @endif
            <form method="POST" id="houses_form" action="{{route("user.admin.houses.update")}}">
                @csrf
                @error("price")
                <div class="text-danger">{{$message}}</div>
                @enderror
                @error("name")
                <div class="text-danger">{{$message}}</div>
                @enderror
                <button class="btn btn-success mb-1" type="submit">Save changes</button>
                <table id="houses_table" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Address</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($houses as $house)
                        <tr>
                            <td><input type="text" class="controlled-input"  name="{{"house-".$house->id."-name"}}" value="{{$house->name}}"></td>
                            <td><input type="text" class="controlled-input"  name="{{"house-".$house->id."-price"}}" value="{{$house->price}}"></td>
                            <td>{{$house->address}}</td>
                            <td>{{$house->created_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Customer order List
        </div>
        <div class="card-body">
            <table id="orders_table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Home</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $customer)
                    <tr>
                        <td>{{$customer->customer_name}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td>{{$customer->customer_phone}}</td>
                        <td>{{$customer->house->name}}</td>
                        <td>{{$customer->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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


