@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subjects</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add Subject</button>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger pb-0">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="m-0">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(\Session::has('error'))
        <div class="alert alert-danger">
            <p class="m-0">{{ \Session::get('error') }}</p>
        </div>
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p class="m-0">{{ \Session::get('success') }}</p>
        </div>
    @endif

    <div class="table-responsive mb-5 pb-5">
        <table id="admin-table" class="table custom-table mb-5 pb-5">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Exam</th>
                    <th scope="col">Date</th>
                    {{-- <th scope="col">Status</th> --}}
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @php $sn = 0  @endphp
                @foreach ($fetchSubjects as $Subject)
                    <tr>
                        <th>{{ ++$sn }}</th>
                        <td>{{ $Subject->title }}</td>
                        <td>{{ $Subject->description }}</td>
                        <td>{{ $Subject->exam_unique_id }}</td>
                        <td>{{ $Subject->created_at }}</td>
                        {{-- <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input enable-btn" value="<=$video['status'];?>" type="checkbox" data-value ="<=$video['id'];?>"  {{if($video['status'] == 1){ 'checked';}} />
                            <input class="form-check-input enable-btn" value="" type="checkbox" data-value ="" checked />
                        </div>
                    </td> --}}
                        <td>
                            <div class="action">
                                <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                                {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                                <ul class="more-options">
                                    <li><button id="" class="btn btn-warning edit-btn p-1"
                                            data-id="{{ $Subject->id }}" data-title="{{ $Subject->title }}"
                                            data-description="{{ $Subject->description }}"
                                            data-exam="{{ $Subject->exam_unique_id }}"
                                            data-avatar="{{ $Subject->avatar }}" data-bs-toggle="modal"
                                            data-bs-target="#editModal">edit</button></li>
                                    <li><a href="{{ route('viewquestions', ['data' => $Subject]) }}"
                                            class="btn btn-primary p-1">Questions</a></li>
                                    <li><a onclick="validate(this)"
                                            href="{{ route('adsubjects.destroy', ['data' => $Subject->id]) }}"
                                            class="btn btn-danger p-1">delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
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
                    <h1 class="modal-title fs-5" id="addModalLabel">Add New Subject</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('adsubjects.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <x-text-input type="hidden" class="form-control" name="unique_id"
                            value="{{ rand(time(), 10000000) }}" />
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Title')" />
                                    <x-text-input type="text" class="form-control" name="title" :value="old('title')"
                                        aria-describedby="textBlock" placeholder="Enter class title" />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Description')" class="form-label" />
                                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('descripion')" class="mt-2 text-danger" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Exam')" class="form-label" />
                                    <select class="form-control py-2" name = "exam_id">
                                        <option value ="">Select Exam</option>
                                        @foreach ($fetchExams as $Exams)
                                            <option value="{{ $Exams->title }}">{{ $Exams->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Subject Image</label>
                                    <input type="file" name="avatar" class="form-control py-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" id="save" class="btn btn-primary">Save changes</button>
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
                <form id="edit-form" method="POST" action="{{ route('adsubjects.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id" class="form-control py-2" />
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="hidden" name="user_id" class="form-control py-2" id="editInputId">
                                    <label for="editInputFirstname" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control py-2" id="edit-title" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="editInputLastname" class="form-label">Description</label>
                                    <textarea name="description" class="form-control py-2" rows="2" id="edit-description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="edit-class" class="form-label">Exam</label>
                                    <input type="hidden" name="prevexam" id="prev-exam" class="form-control py-2" />
                                    <select name="exam_id" id="edit-exam" class="form-control py-2">
                                        <option value ="">Select Exam</option>
                                        @foreach ($fetchExams as $Exams)
                                            <option value="{{ $Exams->title }}">{{ $Exams->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="edit-avatar" class="form-label">Subject Image</label>
                                <input type="hidden" name="prevavatar" id="prev-avatar" class="form-control py-2" />
                                <input type="file" name="avatar" class="form-control py-2" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" id="updateUser" class="btn btn-success">Update
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>











    <script src="{{ 'js/table/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'js/table/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'js/table/dataTables.bootstrap.min.js' }}"></script>


    <script>
        let table = new DataTable('#admin-table');
    </script>

    <script>
        $(document).ready(function() {

            $('#admin-table tbody').on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');
                var editexam = $(this).data('exam');
                var editavatar = $(this).data('avatar');
               
                $('#edit-id').val(id);
                $('#edit-title').val(title);
                $('#edit-description').val(description);
                $('#prev-exam').val(editexam);
                $('#prev-avatar').val(editavatar);
            });

        });
    </script>
@endsection
