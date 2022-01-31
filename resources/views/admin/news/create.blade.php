@extends('admin.master')

@section('content')

<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>

            @endif

            <div class="card">
                <div class="card-header thead-dark">
                    {{-- <h4>Add New Product</h4> --}}
                    <h4>Add News Details
                        <a href="{{ route('show-news') }}" class="btn btn-info float-end">SHOW NEWS</a>
                    </h4>
                </div>
                <div class="card-body bg-blend-overlay">

                    <form action="{{ url('add-news') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">News Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea id="form10" class="md-textarea form-control"  name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">News Image</label>
                            <input type="file" name="image" required class="course form-control">
                        </div>

                            <div class="form-group mb-3">
                                <label for="">News Category</label>
                                <select name="category" class="form-control" id="exampleFormControlSelect1">
                                   @foreach ($data as $row)
                                    <option value="{{ $row->id }}" > {{ $row->category }} </option>
                                   @endforeach
                                </select>
                            </div>
                        <div class="form-group mb-3">
                            <label for="">News Author</label>
                            <input type="author" name="author" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save News</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
