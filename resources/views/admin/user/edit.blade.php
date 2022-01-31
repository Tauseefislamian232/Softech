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
                    <h4 class="text-center mt-3 text-bold">Edit & Update User Form
                        <a href="{{ url('show-user') }}" class="btn btn-dark btn-sm float-end mb-2">Show User Table</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-user/'.$user->id) }}" method="POST" enctype='multipart/form-data'>
                        @csrf

                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">User Name</label>
                                <input type="text" name="name" class="form-control" value="{{$user->name}}" >
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">User Email</label>
                                <input type="text" name="email" class="form-control"  value="{{$user->email}}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        {{-- row1 closed --}}
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone" class="form-control"  value="{{$user->phone}}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control"  value="{{$user->address}}">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        {{-- row2 closed --}}
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Old Password</label>
                                <input type="text" name="old_password" class="form-control" value="{{$user->password}}" readonly>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">New Password</label>
                                <input type="password" name="password" class="myInput form-control" id="myInput"  value="{{$user->password}}" >
                                <input type="checkbox" onclick="myFunction()">Show Password
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        {{-- row3 closed --}}
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="" class="text-danger">Old Profile Image</label>
                                <span class="pl-3">
                                    <img src=" {{ asset('uploads/users/'.$user->image ) }}" width="100" height="100"/>
                                </span>

                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">New Profile Image</label>
                                <input type="file" name="image" class="form-control">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>

                        </div>
                        {{-- row4 closed --}}
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Role As</label>
                                <input type="text" name="user_type" class="form-control"  value="{{$user->user_type}}" readonly>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="">Role As</label>
                                <input type="text" name="dummy" class="form-control"  value="{{$user->user_type}}" readonly>
                            </div>
                        </div>
                         {{-- row5 closed --}}

                         <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
