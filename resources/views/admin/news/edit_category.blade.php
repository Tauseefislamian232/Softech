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
                        <a href="{{ route('show-news-category') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-news-category/'.$news_category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <input type="text" name="category"  value="{{$news_category->category}}" class="form-control">
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label for="">News Author</label>
                            <input type="text" name="author"  value="{{$news_category_category->author}}" class="form-control">
                        </div> --}}
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
