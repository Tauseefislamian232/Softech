@extends('admin.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 bg-secondary">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card text-primary">
                <div class="card-header">
                    <div class="row">

                    </div>
                    {{-- Row closed --}}
                </div>
                {{-- card-header closed --}}
                <div class="card-body text-primary">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            @if (isset($user))
                            <table class="table table-bordered table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        {{-- <th>Password</th> --}}
                                        <th>Image</th>
                                        {{-- <th>Role</th> --}}
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1; @endphp
                                @if (count($user)> 0)
                                    @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        {{-- <td>{{ $item->password }}</td> --}}
                                        <td><img src="{{ asset('uploads/users/'. $item->image) }}" /> </td>
                                        {{-- <td>{{ $item->user_type }}</td> --}}
                                        {{-- <td>
                                            <a href="{{ url('edit-user/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            |
                                            <a href="{{ url('delete-user/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Delete this Record ?')">Delete</a>
                                        </td> --}}

                                    </tr>
                                    @endforeach

                                @else
                                    <tr>
                                        <td>(<code>No Record Found!</code>)</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>


                    {{-- card-body-closed --}}

                @endif

                </div>

            </div>

        </div>
        {{-- col-md-12 top --}}
    </div>
    {{-- top-row closed --}}
</div>
{{-- container-closed --}}
@endsection
