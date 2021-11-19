@extends("admin.layouts.base")

@section("admin_content")
    <h1 class="mt-4">Houses</h1>
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
                            <td><input type="text" class="controlled-input"   name="{{"house-".$house->id."-name"}}" value="{{$house->name}}"></td>
                            <td><input type="text" class="controlled-input"    name="{{"house-".$house->id."-price"}}" value="{{$house->price}}"></td>
                            <td>{{$house->address}}</td>
                            <td>{{$house->created_at->diffForHumans()}}</td>
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


