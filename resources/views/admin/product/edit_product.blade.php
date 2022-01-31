@extends('admin.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card text-primary">
                <div class="card-header">
                    <h4 class="text-center mt-3 text-bold">Edit & Update Product Form
                        <a href="{{ url('show-product') }}" class="btn btn-dark btn-sm float-end mb-2">Show User Table</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Product Title</label>
                            <input type="text" name="title" class="form-control" value="{{$products->title}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="number" name="price" min="1" class="form-control" value="{{$products->price}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" max="1000" min="1" class="form-control" value="{{$products->quantity}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea id="form10" class="md-textarea form-control"  name="description" rows="3">
                                {{$products->description}}
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <p class="text-danger">Old Image</p>
                            <img src="{{asset('uploads/products/'.$products->image)}}" width="60" alt=""><br>
                            <label for="">New Product Image</label>
                            <input type="file" name="image" required class="course form-control" >

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
