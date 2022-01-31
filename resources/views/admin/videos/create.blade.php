@extends('admin.master')

@section('content')

<div class="container mt-5">
    <form action="{{ route('add-videos') }}" method="POST" enctype="multipart/form-data">
      <h3 class="text-center mb-5">Upload File in Laravel</h3>
        @csrf

        <div class="form-group mb-3">
            <label for="">Video Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Select Video</label>
            <input type="file"  name="video" class="form-control">
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload Files
        </button>
    </form>
</div>

@endsection
