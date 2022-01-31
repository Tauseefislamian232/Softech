@extends('admin.home')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}
                </h6>
            @endif
                @php
                    // dd($edit_category);
                @endphp
            <div class="card text-primary">
                <div class="card-header">
                    <h4 class="text-center mt-3 text-bold">User Registration Form</h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-product-category/'.$edit_category->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Category Name</label>
                                <input type="text" name="name" class="form-control" value="{{$edit_category->name}}" >
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <input type="hidden" name="id" id="id">
                            </div>


                        <div class="form-group mb-3 mt-2 ">
                            <button type="submit" class="btn btn-primary btn-md">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
