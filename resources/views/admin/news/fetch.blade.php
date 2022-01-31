@extends('admin.master')

@section('content')

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Products List
                        <a href="{{ route('view-news') }}" class="btn btn-success float-end">Add New News</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach ($news as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->created_at}}</td>
                                <td><img src="uploads/news/{{ $item->image }}" width="200"></td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->author }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ url('edit-news/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('delete-news/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete News')">Delete</a>
                                </td>
                            </tr>


                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
