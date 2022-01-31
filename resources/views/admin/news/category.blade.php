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
                        <a href="{{ route('show-news-category') }}" class="btn btn-info float-end">Sow News Category</a>
                    </h4>
                </div>
                <div class="card-body bg-blend-overlay">

                    <form action="{{ route('add-news-category') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Caegory Title</label>
                            <input type="text" name="category" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
