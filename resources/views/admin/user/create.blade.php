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

                    <form action="{{ url('store-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">User Name</label>
                                <input type="text" name="name" class="form-control"  value="{{ old('name') }}" >
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">User Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone" class="form-control" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter You Password" value="{{ old('password') }}">
                                <input type="checkbox" onclick="myFunction()">Show Password
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Confirm Password</label>
                                <input type="text" name="confirm_password" class="form-control" value="{{ old('confirm_password') }}">
                                @if ($errors->has('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Upload Image</label>
                                <input type="file" name="image"  class="course form-control"  value="{{ old('image') }}">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Role As</label>
                                <input type="null" name="user_type" class="form-control" readonly>

                            </div>
                        </div>

                        <div class="form-group mb-3 mt-2 ">
                            <button type="submit" class="btn btn-primary btn-md">Register User</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
