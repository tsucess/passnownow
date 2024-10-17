@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Exams</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add Exams</button>
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
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                {{-- <php foreach  ($output as $admin) { ?> --}}
                <tr>
                    <th>1</th>
                    <td>SSCE West African Examination</td>
                    <td>This an Exam for Senior Secondary Students</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="form-check form-switch">
                            {{-- <input class="form-check-input enable-btn" value="<=$video['status'];?>" type="checkbox" data-value ="<=$video['id'];?>" <?php if($video['status'] == 1 ){echo 'checked';}?> > --}}
                            <input class="form-check-input enable-btn" value="" type="checkbox" data-value ="" checked >
                        </div>
                    </td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a href="{{ url('adpastquestions') }}" class="btn btn-primary p-1">Questions</a></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>UTME JAMB</td>
                    <td>This an Exam for obtaining Admission into Higher Institution</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="form-check form-switch">
                            {{-- <input class="form-check-input enable-btn" value="<=$video['status'];?>" type="checkbox" data-value ="<=$video['id'];?>" <?php if($video['status'] == 1 ){echo 'checked';}?> > --}}
                            <input class="form-check-input enable-btn" value="" type="checkbox" data-value ="" checked >
                        </div>
                    </td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a href="{{ url('adpastquestions') }}" class="btn btn-primary p-1">Questions</a></li>
                                <li><a onclick="validate(this)" href="assets/php/includes/deletedata.inc.php?id=&page="
                                        class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Junior Secondary Certificate Examination</td>
                    <td>This an Exam for Junior Secondary Students</td>
                    <td>20-9-2024</td>
                    <td>
                        <div class="form-check form-switch">
                            {{-- <input class="form-check-input enable-btn" value="<=$video['status'];?>" type="checkbox" data-value ="<=$video['id'];?>" <?php if($video['status'] == 1 ){echo 'checked';}?> > --}}
                            <input class="form-check-input enable-btn" value="" type="checkbox" data-value ="" checked >
                        </div>
                    </td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning user-edit-btn p-1" data-bs-toggle="modal"
                                        data-bs-target="#editModal">edit</button></li>
                                <li><a href="{{ url('adpastquestions') }}" class="btn btn-primary p-1">Questions</a></li>
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

    {{-- <section>
        <iframe src="https://app.Lumi.education/api/v1/run/gWQ6dY/embed" width="1088" height="720" frameborder="0" allowfullscreen="allowfullscreen" allow="geolocation *; microphone *; camera *; midi *; encrypted-media *"></iframe>
        <script src="https://app.Lumi.education/api/v1/h5p/core/js/h5p-resizer.js" charset="UTF-8"></script>
    </section> --}}



    <!-- Add Exam Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form_add">
                <div class="form-response text-center mb-3">
                    <span class="error hidden"></span>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Exams</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('adexams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <x-text-input type="hidden" class="form-control" name="unique_id"
                        value="{{ rand(time(), 10000000) }}" />
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Title')" />
                                        <x-text-input type="text" class="form-control" name="title" :value="old('title')"
                                        aria-describedby="textBlock"/>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Description')" />
                                    <x-text-input type="text" class="form-control" name="description" :value="old('description')"
                                        aria-describedby="textBlock" />
                                    <x-input-error :messages="$errors->get('description')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Subject Image')" />
                                        <input type="file" class="form-control" name="avatar" :value="old('avatar')"
                                        aria-describedby="textBlock" />
                                    <x-input-error :messages="$errors->get('avatar')" class="mt-2 text-danger" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-6">
                                <div class="mb-3">
                                    <input-label for="addInputphone" :value="__('Class')" class="form-label">Phone number</label>
                                    <input type="text" name="phone" :value="old('class')" class="form-control py-2" id="addInputphone"
                                        required>
                                </div>
                                <input-error :messages="$errors->get('class')" class="mt-2 text-danger" />
                            </div> --}}
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="addInputuserole" class="form-label">Class</label>
                                    <select name="" id="addInputuserole" class="form-control py-2">
                                        <option value ="undefined">Select Class</option>
                                        {{-- <php if ($page === "admin") {?> --}}
                                        <option value="jss1">JSS 1</option>
                                        <option value="jss2">Jss 2</option>
                                        <option value="jss3">Jss 3</option>
                                        {{-- <php } else {?> --}}
                                        {{-- <option value="member">Member</option>
                                        <option value="author">Author</option> --}}
                                        {{-- <php }?> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" name="submit" id="save" class="btn btn-primary">Save
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
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Subject</h1>
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

                        <div class="row">
                            {{-- <div class="col-6">
                                <div class="mb-3">
                                    <label for="editInputphone" class="form-label">Phone number</label>
                                    <input type="number" name="phone" class="form-control py-2" id="editInputphone">
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="editInputuserole" class="form-label">Class</label>
                                    <select name="userrole" id="editInputuserole" class="form-control py-2">
                                        <option value ="undefined">Select Class</option>
                                        {{-- <php if ($page === "admin") {?> --}}
                                        <option value="jss1">JSS 1</option>
                                        <option value="jss2">Jss 2</option>
                                        <option value="jss3">Jss 3</option>
                                        {{-- <php } else {?> --}}
                                        {{-- <option value="member">Member</option> --}}
                                        {{-- <php }?> --}}
                                    </select>
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
