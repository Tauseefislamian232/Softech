@extends('admin.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Student
                        <a href="{{ route('show-news') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-news/'.$news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">News Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $news->title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea id="form10" class="form-control"  name="description" >
                            {{$news->description}}
                            </textarea>
                            <br>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">News old image</label>
                            <img src="{{ asset('uploads/news/' . $news->image) }}" height="150" width="150" />
                            <br>
                            <label for="">News New image</label>
                            <input type="file" name="image" id="image">
                            {{-- <img src="uploads/News/{{ $news->image }}" width="150" height="150" alt="" alt="old-post-image"> --}}
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <input type="text" name="category"  value="{{$news->category}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">News Author</label>
                            <input type="text" name="author"  value="{{$news->author}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update News</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
