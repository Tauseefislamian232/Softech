@extends('admin.home')

@section('content')

<!--Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="addModal">Add Employee</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

                        <div class="form-group mb-3">
                            <ul id="error_list">
                            </ul>
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <input type="checkbox" onclick="myFunction()">Show Password
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea name="address" id="address" class="form-control" cols="50" rows="5" >
                            </textarea>
                        </div>

        </div>
        {{-- modal-body --}}
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="add_student btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  {{-- edit-modal --}}
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit & Update Employee's Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <ul id="update_error_list">

            </ul>
            <input type="hidden"  id="edit_stud_id">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" id="edit_name"  class="name form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" id="edit_email"  class="email form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone</label>
                <input type="number" id="edit_phone" class="phone form-control">
                </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <textarea id="edit_address" class="address form-control">
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" id="edit_password" class="password form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Image</label>
                <input type="text" id="edit_image" class="image form-control">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="update_student btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

  {{-- delete-modal --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Employee's Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <input type="hidden"  id="delete_stud_id">
            <h3>Are you Sure to delete this Record?</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="cofirm_delete btn btn-danger">Yes Delete</button>
        </div>
      </div>
    </div>
  </div>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div id="success-messages">

            </div>
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    <span><input type="text" name="" id=""></span>
                <h2>Employees Insertion using Ajax
                    <a href="" class="btn btn-primary btn-sm float-end mt-2" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add Employee Modal</a>
                </h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- card-closed --}}
        </div>
        {{-- col-md-12 --}}
    </div>
    {{-- row closed --}}

</div>
{{-- top-container closed --}}

@endsection

@section('scripts')

<script>

$(document).ready( function(){

    fetchstudents();
    function fetchstudents(){

        $.ajax({
            type: "GET",
            url: "{{ route('show-employee') }}",
            dataType: "json",
            success: function (response) {
                // console.log(response.employees);
                $.each(response.employees, function (key, item) {
                    $('tbody').append('<tr>\
                                <td>'+item.id+'</td>\
                                <td>'+item.name+'</td>\
                                <td>'+item.email+'</td>\
                                <td>'+item.phone+'</td>\
                                <td><button type="button" value="'+item.id+'" class="edit_student btn btn-primary btn-sm">Edit</button></td>\
                                <td><button type="button" value="'+item.id+'" class="delete_record btn btn-danger btn-sm">Delete</button></td>\
                            </tr>');
                }); // ajax each function closed
            } //success function closed
        }); //ajax function closed
} //fetch function closed here

    $(document).on('click', '.delete_record',function (e) {

    e.preventDefault();
    var stud_id = $(this).val();
    // alert(stud_id);

    $('#delete_stud_id').val(stud_id);
    $('#deleteModal').modal('show');

    });

        $(document).on('click', '.cofirm_delete',function (e) {

            e.preventDefault();

            $(this).text("Deleting");
            var stud_id = $('#delete_stud_id').val();
                // alert(stud_id);

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            }); //ajax header included from laravel8 documentations

            $.ajax({
                type: "DELETE",
                url: "delete-employee/"+stud_id,
                success: function (response) {
                    // console.log(response);

                        $('#success-messages').addClass('alert alert-success');
                        $('#success-messages').text(response.message);
                        $('#deleteModal').modal('hide');
                        $('.cofirm_delete').text("Deleting");
                        // fetchstudents();
                }
            });
            });



$(document).on('click','.edit_student',function (e) {

        e.preventDefault();
        var stud_id = $(this).val();
        // console.log(stud_id);

        $('#editModal').modal('show');
        $.ajax({
            type: "GET",
            url: "edit-employee/"+stud_id,
            success: function (response) {

                // console.log(response);
                if(response.status == 404){

                    $('#success-messages').html(" ");
                    $('#success-messages').addClass("alert alert-danger");
                    $('#success-messages').text(response.message);

                }
                else{
                    $('#edit_name').val(response.employees.name);
                    $('#edit_email').val(response.employees.email);
                    $('#edit_phone').val(response.employees.phone);
                    $('#edit_address').val(response.employees.address);
                    $('#edit_password').val(response.employees.password);
                    $('#edit_image').val(response.employees.image);
                    $('#edit_stud_id').val(stud_id);
                }
            }
        });
}); //edit function closed here

$(document).on('click', '.update_student',function (e) {

        e.preventDefault();
        $(this).text("Updating");

        var stud_id = $('#edit_stud_id').val();
        // console.log(stud_id);
        var data = {
            'name': $('#edit_name').val(),
            'email': $('#edit_email').val(),
            'phone': $('#edit_phone').val(),
            'address': $('#edit_address').val(),
            'password': $('#edit_password').val(),
            'image': $('#edit_image').val(),
        }

        $.ajaxSetup({

            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        }); //ajax header included from laravel8 documentations

    $.ajax({
        type: "POST",
        url:  "update-employee/"+stud_id,
        data: data,
        dataType: "json",
        success: function (response) {

            // console.log(response);
            if(response.status == 400)
            {
                $('#update_error_list').html("");
                $('#update_error_list').addClass('alert alert-danger');
                $.each(response.errors, function (key, error_values) {
                    $('#update_error_list').append('<li>'+error_values+'</li>');
                    $('.update_student').text("Update");
                });
            }
            else if(response.status == 404){

                $('#update_error_list').html(" ");
                $('#success-messages').addClass('alert alert-success');
                $('#success-messages').text(response.message);
                $('.update_student').text("Update");

            }
            else{

                $('#update_error_list').html(" ");
                $('#success-messages').html("");
                $('#success-messages').addClass('alert alert-success');
                $('#success-messages').text(response.message);
                $('#editModal').modal('hide');
                $('.update_student').text("Update");
                fetchstudents();
            }
        }
    });
    }); //update function closed here

    $(document).on('click','.add_student', function(e) {

        e.preventDefault();

        var data = {
            'name' : $('#name').val(),
            'email' : $('#email').val(),
            'phone' : $('#phone').val(),
            'address' : $('#address').val(),
            'password' : $('#password').val(),
            'image' : $('#image').val(),
        }
        // console.log(data);

        $.ajaxSetup({

            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        }); //ajax header included from laravel8 documentations

        $.ajax({
            type: "POST",
            url: "{{ url('store-employee') }}",
            data: data,
            dataType: "json",
            success: function (response) {
                // console.log(response);
                // console.log(response.name);
                // alert(data);
                if(response.status == 400)
                {
                    $('#error_list').html("");
                    $('#error_list').addClass('alert alert-danger');
                    $.each(response.errors, function (key, error_values) {
                        $('#error_list').append('<li>'+error_values+'</li>');
                    });
                }
                else{

                    $('#error_list').html(" ");
                    $('#success-messages').addClass('alert alert-success');
                    $('#success-messages').text(response.message);
                    $('#addModal').modal('hide');
                    $('#addModal').find('input').val("");
                    fetchstudents();
                }
            }
        }); // ajax function closed here

    }); // on-click add-function closed here



}); // ready function closed here

</script>
@endsection
