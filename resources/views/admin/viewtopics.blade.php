@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Topics</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add topic</button>
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
                    <th scope="col">url</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Order</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                {{-- <php foreach  ($output as $admin) { ?> --}}
                <tr>
                    <th>1</th>
                    <td>Alphabets</td>
                    <td>https://lumi/english-language/xyz</td>
                    <td>English Language</td>
                    <th>1</th>
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
                    <td>Oral English</td>
                    <td>https://lumi/english-language/idxyz</td>
                    <td>English Language</td>
                    <th>2</th>
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
                    <td>Vowel Sound</td>
                    <td>https://lumi/english-language/idxyz</td>
                    <td>English Language</td>
                    <th>3</th>
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
                    <td>Consonant Sounds</td>
                    <td>https://lumi/english-language/idxyz</td>
                    <td>English Language</td>
                    <th>3</th>
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
                    <td>Part of Speech</td>
                    <td>https://lumi/english-language/xyz</td>
                    <td>English Language</td>
                    <th>4</th>
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
                    <h1 class="modal-title fs-5" id="addModalLabel">Add new topic</h1>
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
                                    <label for="addInputLastname" class="form-label">Url</label>
                                    <input type="text" name="lname" class="form-control py-2" id="addInputLastname"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="addInputLastname" class="form-label">Subject</label>
                                <input type="text" name="lname" class="form-control py-2" value="English Language"
                                    disabled id="addInputLastname" required>
                            </div>
                            {{-- <div class="col-12">
                                <div class="mb-3">
                                    <label for="addInputuserole" class="form-label">Subject</label>
                                        <select name="userrole" id="addInputuserole" class="form-control py-2">
                                        <option value ="undefined">Select Class</option>
                                        <php if ($page === "admin") {?>
                                        <option value="jss1">JSS 1</option>
                                        <option value="jss2">Jss 2</option>
                                        <option value="jss3">Jss 3</option>
                                        <php } else {?>
                                        <option value="member">Member</option>
                                        <option value="author">Author</option>
                                        <php }?>
                                    </select> 
                                </div>
                            </div> --}}
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
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form">
                <div class="form-response text-center mb-3">
                    <span class="error hidden"></span>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit topic</h1>
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
                                    <label for="editInputLastname" class="form-label">Url</label>
                                    <input type="text" name="lname" class="form-control py-2"
                                        id="editInputLastname">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="addInputLastname" class="form-label">Subject</label>
                                    <input type="text" name="lname" class="form-control py-2"
                                        value="English Language" disabled id="addInputLastname" required>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="editInputuserole" class="form-label">User Role</label>
                                    <select name="userrole" id="editInputuserole" class="form-control py-2">
                                        <option value ="undefined">Select Role</option>
                                        <php if ($page === "admin") {?>
                                        <option value="sadmin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                        <php } else {?>
                                        <option value="member">Member</option>
                                        <php }?>
                                    </select>
                                </div> --}}
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
