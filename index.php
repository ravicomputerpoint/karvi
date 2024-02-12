<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ravi Computer Point</title>
    <link rel="shortcut icon" href="Transparent Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

    <h3 class="text-center p-3 text-white bg-primary bg-gradeint">CRUD Application with Ajax, Bootstrap & Jquery.</h3>
    <div class="container mt-4">

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew">
                <i class="fa fa-user"></i> Add New User
            </button>
        </div>
            
        <!-- Add New User Modal -->
            
            <div class="modal fade modal-lg" id="addnew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa fa-user"></i> Add New User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="add-form">
                    <div class="modal-body">
                        <div class="row gy-4">
                            <div class="col-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mt-2" id="name" placeholder="Enter Name">
                            </div>
                            <div class="col-6">
                                <label for="father">Father Name</label>
                                <input type="text" class="form-control mt-2" id="father" placeholder="Enter Father Name">
                            </div>
                            <div class="col-6">
                                <label for="mother">Mother Name</label>
                                <input type="text" class="form-control mt-2" id="mother" placeholder="Enter Mother Name">
                            </div>
                            <div class="col-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control mt-2" id="dob">
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="save-btn">Save</button>
                    </div>
                    </div>
                </div>
            </div>
            
        
        <!-- Update User Modal -->
            <div class="modal fade modal-lg" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa fa-edit"></i> Update User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <div class="row gy-4">
                            <div class="col-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control mt-2" id="update_name" placeholder="Enter Name">
                            </div>
                            <div class="col-6">
                                <label for="father">Father Name</label>
                                <input type="text" class="form-control mt-2" id="update_father" placeholder="Enter Father Name">
                            </div>
                            <div class="col-6">
                                <label for="mother">Mother Name</label>
                                <input type="text" class="form-control mt-2" id="update_mother" placeholder="Enter Mother Name">
                            </div>
                            <div class="col-6">
                                <label for="dob">Date of Birth</label>
                                <input type="date" class="form-control mt-2" id="update_dob">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update-btn">Update</button>
                    </div>
                    </div>
                </div>
            </div>

        <!-- User Table -->
            <div class="mt-4 card p-3 shadow-sm">
                <div class="d-flex justify-content-between">
                    <button id="refresh" class="btn btn-secondary"><i class="fa fa-refresh"></i> Refresh</button>
                    <input type="text" class="form-control w-25" placeholder="Search" id="search" autocomplete="off" autofocus>
                </div>
            </div>

            <div class="card mt-4 p-3 shadow-sm">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Father</th>
                        <th>Mother</th>
                        <th>Date of Birth</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="table-data">

                </tbody>
            </table>
            </div>
    </div>
    <!-- Jquery, Bootstrap and Sweet Alert CDN Links -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){

            function sweet(data)
            {
               if(data==0)
               {
                Swal.fire({
                    title: "Error!",
                    text: "Database not connected properply",
                    icon: "error",
                });
               }else if(data==1)
               {
                Swal.fire({
                        title: "Nice!",
                        text: "Data save successfully",
                        icon: "success",
                    });
               }else if(data==2)
               {
                Swal.fire({
                    title: "Error!",
                    text: "Data not saved properply",
                    icon: "error",
                });
               }else
               {
                Swal.fire({
                    title: "Error!",
                    text: "Unknown Error",
                    icon: "error",
                });
               }
            }

            function loadTable()
            {
                $.ajax({
                    url: 'crud.php',
                    type: 'post',
                    data: {fetch:'fetch'},
                    success: function(data)
                    {
                        $("#table-data").html(data);
                    }
                });
            }

            loadTable();
            $("#save-btn").on('click',function(e){
                e.preventDefault();
                let name = $("#name").val();
                let father = $("#father").val();
                let mother = $("#mother").val();
                let dob = $("#dob").val();

                $.ajax({
                    url: 'crud.php',
                    type: 'post',
                    data: {name:name,father:father,mother:mother,dob:dob,insert:'insert2'},
                    success: function(data)
                    {
                        sweet(data);
                        $("#addnew").modal('hide');
                        $("#add-form").trigger('reset');
                        loadTable();
                    }
                });
            });

            $(document).on('click','.btn-warning',function(){
                let id = $(this).data("edit");
                $.ajax({
                    url: 'crud.php',
                    type: 'post',
                    data: {id:id,edit_find:'edit_find'},
                    success: function(data)
                    {
                        data = JSON.parse(data);
                        $("#update").modal('show');
                        $("#update_name").val(data['name']);
                        $("#update_father").val(data['father']);
                        $("#update_mother").val(data['mother']);
                        $("#update_dob").val(data['dob']);
                    }
                });
                $("#update-btn").on('click',function(e){
                        e.preventDefault();
                        let name = $("#update_name").val();
                        let father = $("#update_father").val();
                        let mother = $("#update_mother").val();
                        let dob = $("#update_dob").val();

                        $.ajax({
                            url: 'crud.php',
                            type: 'post',
                            data: {name:name,father:father,mother:mother,dob:dob,id:id,update:'update'},
                            success: function(data)
                            {
                                sweet(data);
                                $("#update").modal('hide');
                                loadTable();
                            }
                        });

                });
            });

            $(document).on('click','.btn-danger',function(){
                let id = $(this).data('delete');
                $.ajax({
                    url: 'crud.php',
                    type: 'post',
                    data: {id:id,delete:'delete'},
                    success: function(data)
                    {
                        sweet(data);
                        loadTable();
                    }
                });
            });

            $("#search").on('keyup',function(){
                let search = $("#search").val();
                $.ajax({
                    url: 'crud.php',
                    type: 'post',
                    data: {search:search,find:'find'},
                    success: function(data)
                    {
                        $("#table-data").html(data);
                    }
                });
            });

            $("#refresh").on('click',function(){
                window.location.href = 'index.php';
            });
        });
    </script>
</body>
</html>