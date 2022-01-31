@extends('admin.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}
                </h6>

            @endif

            <div class="card text-primary">
                <div class="card-header">
                    <h4 class="text-center mt-3 text-bold">User Registration Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('store-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Product Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="number" name="price" min="1" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" max="1000" min="1" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea id="form10" class="md-textarea form-control"  name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Product Image</label>
                            <input type="file" name="image" required class="course form-control">
                        </div><br>
                        <div class="form-group mb-3">
                            <label for="">Product Category</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="" class="readonly">Select One Category</option>
                               @foreach ($data as $row)
                                <option value="{{ $row->id }}" > {{ $row->name }} </option>
                               @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
