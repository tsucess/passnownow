@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Classes</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add New Class</button>
            </div>
        </div>
    </div>
    {{-- <php if (isset($output)) {?> --}}
    <div class="table-responsive mb-5 pb-5">
        <table id="admin-table" class="table custom-table mb-5 pb-5">
            <thead class="bg-info">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                {{-- <php foreach  ($output as $admin) { ?> --}}
                <tr>
                    <th>1</th>
                    <td>JSS 1</td>
                    <td>Junior Secondary School 1 First basic class</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>JSS 2</td>
                    <td>Junior Secondary School 2  Second basic class</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>JSS 3</td>
                    <td>Junior Secondary School 3 Final basic class</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>4</th>
                    <td>SSS 1</td>
                    <td>Senior Secondary School 1  First Senior class</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>5</th>
                    <td>SSS 2</td>
                    <td>Senior Secondary School 2 Second Senior class</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>6</th>
                    <td>SSS 3</td>
                    <td>Senior Secondary School 3  Final Senior class</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
               
                {{-- <php }}?>		 --}}
            </tbody>
        </table>
    </div>






    <!-- Add User Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form_add">
                <div class="form-response text-center mb-3">
                    <span class="error hidden"></span>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Classes</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="page" value="<= $page ?>" class="form-control py-2"
                            id="addInputPage" required>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="addInputFirstname" class="form-label">Title</label>
                                    <input type="text" name="fname" class="form-control py-2"
                                        id="addInputFirstname" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="addInputLastname" class="form-label">Description</label>
                                    <input type="text" name="lname" class="form-control py-2" id="addInputLastname"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" name="submit" id="save" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit User Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form">
                <div class="form-response text-center mb-3">
                    <span class="error hidden"></span>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Class</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="page" value="<= page ?>" class="form-control py-2"
                            id="editInputPage" required>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="hidden" name="user_id" class="form-control py-2" id="editInputId">
                                    <label for="editInputFirstname" class="form-label">Title</label>
                                    <input type="text" name="fname" class="form-control py-2"
                                        id="editInputFirstname">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="editInputLastname" class="form-label">Description</label>
                                    <input type="text" name="lname" class="form-control py-2"
                                        id="editInputLastname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="submit" id="updateUser" class="btn btn-success">Update
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>











    <script src="{{ 'assets/js/table/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'assets/js/table/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'assets/js/table/dataTables.bootstrap.min.js' }}"></script>



    <script>
        let table = new DataTable('#admin-table');
    </script>
@endsection
