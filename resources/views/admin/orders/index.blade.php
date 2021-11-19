@extends("admin.layouts.base")

@section("admin_content")
    <h1 class="mt-4">Order List</h1>
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


