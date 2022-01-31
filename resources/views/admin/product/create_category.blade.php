@extends('admin.home')

@section('content')

<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="addModal">Add New Categpry</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{url('store-product-category')}}" method="POST">
                @csrf
            <div class="form-group mb-3">
                <ul id="error_list">
                </ul>
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>

        </div>
        {{-- modal-body --}}
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <!--Add Modal -->



<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div id="success-messages">

            </div>
            <div class="card">

                <div class="card-header">
                    <div class="row">

                        <div class="form-group col-md-2">
                            <span class="text-center mt-3 text-bold">Show  <a href="{{route('show-product-category')}}" class="text-danger">Categories</a>
                            </span>
                        </div>

                        <div class="form-group col-md-6">
                            <form action="{{route('search-product-category')}}" method="POST" role="search">
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

                        <div class="form-group col-md-3">
                            <a href="" class="btn btn-primary btn-sm float-end mt-2" data-bs-toggle="modal"
                                data-bs-target="#addModal">Add New Category</a>
                        </div>

                    </div>
                    {{-- Row closed --}}
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>S.NO</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp

                            @foreach ($product_category as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ url('edit-product-category/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                               |
                                    <a href="{{ url('delete-product-category/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete this Record ?')">Delete</a>
                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- card-closed --}}
        </div>
        {{-- col-md-12 --}}
    </div>
    {{-- row closed --}}

</div>
{{-- top-container closed --}}

@endsection
