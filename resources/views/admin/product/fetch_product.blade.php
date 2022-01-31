@extends('admin.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 bg-secondary">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card text-primary">
                <div class="card-header">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <span class="text-center mt-3 text-bold">Show  <a href="{{route('show-product')}}" class="text-danger">Products</a>
                            </span>
                        </div>

                        <div class="form-group col-md-6">
                            <form action="{{route('search-product')}}" method="POST" role="search">
                            @csrf
                            <div class="form-group ">
                                <input type="text" class="" name="search" id="search" placeholder="Enter Your keyword here....">
                                <span><button class="btn btn-sm btn-primary" type="submit">Search</button></span>
                            </div>

                            </form>
                        </div>

                        <div class="form-group col-md-1">
                            <a href="{{route('print-user')}}" class="btnprn btn btn-otline-dark">
                                <i class="icon-printer"></i> Print</a>
                        </div>

                        <div class="form-group col-md-2">
                            <a href="{{ url('add-product') }}" class="btn btn-success btn-sm float-end mt-2">Add New User</a>
                       </div>

                    </div>
                    {{-- Row closed --}}
                </div>
                {{-- card-header closed --}}
                <div class="card-body text-primary">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            @if (isset($products))
                            <table class="table table-bordered table-striped table-hover text-center">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                @if (count($products)> 0)
                                    @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>

                                        <td>
                                            <img src="{{ asset('uploads/products/'.$item->image) }}"  width="30px" />
                                        </td>
                                        <td>{{ $item->name}}</td>

                                        <td>
                                            <a href="{{ url('edit-product/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            |
                                            <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete this Record ?')">Delete</a>
                                        </td>

                                    </tr>
                                    @endforeach

                                @else
                                    <tr>
                                        <td>(<code>No Record Found!</code>)</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>


                    {{-- card-body-closed --}}
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="d-flex justify-content-center">
                                {{-- <h6 class="text-primary"> Displaying {{$products->count()}} of {{ $products->total() }} user(s).</h6> --}}
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-3">
                            <div class="d-flex justify-content-center">
                                {{-- {!!$products->links() !!} --}}
                            </div>
                        </div>
                    </div>

                @endif

                </div>

            </div>

        </div>
        {{-- col-md-12 top --}}
    </div>
    {{-- top-row closed --}}
</div>
{{-- container-closed --}}
@endsection
