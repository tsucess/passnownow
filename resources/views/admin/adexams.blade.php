@extends('layouts.dasboardtemp')

@section('admincontent')

    @if (Auth::user()->role === 'user')
        <div class = "row mt-3 gap-2">

            @foreach ($fetchExams as $Exam)
                <div class = "col-12 col-md-4 text-center shadow" style="width: 32%">
                    <img src="{{ asset('storage/' . $Exam->avatar) }}" class = "img-fluid mb-3" style="height: 15rem" />
                    <div class="mb-3" style="height: 12rem">
                        <h5 class = "text-center fw-bold px-3">{{ strtoupper($Exam->title) }}</h5>
                        <p class = "text-md-center px-4 py-2">
                            {{ $Exam->description }}
                        </p>
                        <a href="{{ route('showpastquestions', ['data' => $Exam]) }}" class="btn btn-outline-primary mb-3 p-2">VIEW ALL QUESTIONS</a>
                    </div>
                </div>
            @endforeach

            {{-- <div class = "col-sm-4"><img src="{{ asset('/images/ssce.png') }}" class = "img-fluid mb-2" /><span
                class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">SSCE Past Questions</span>
            <p class = "p text-md-center">
                Start Studying with our wide collection of
                all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-center mb-3">
                <button type="button" class="btn btn-outline-primary mb-3 p-2">VIEW ALL QUESTIONS</button>
            </div>
        </div>
        <div class = "col-sm-4"><img src="{{ asset('/images/jamb.png') }}" class = "img-fluid mb-2" /><span
                class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JAMB Past Questions</span>
            <p class = "p text-md-center">
                Start Studying with our wide collection of
                all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-center mb-3">
                <button type="button" class="btn btn-outline-primary mb-3 p-2">VIEW ALL QUESTION</button>
            </div>
        </div> --}}

        </div>
    @else
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Exams</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-md btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add Exams</button>
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
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">S/N</th>
                        <th scope="col" class="col-3">Title</th>
                        <th scope="col" class="col-3">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>

                    </tr>
                </thead>
                <tbody>

                    @php $sn = 0  @endphp
                    @foreach ($fetchExams as $Exam)
                        <tr>
                            <th>{{ ++$sn }}</th>
                            <td>{{ $Exam->title }}</td>
                            <td>{{ $Exam->description }}</td>
                            <td>{{ $Exam->created_at }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    {{-- <input class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" value=""  {{ $Exam->status?'checked': ''}}    /> --}}
                                    <input class="form-check-input enable-btn" data-id="{{ $Exam->id }}"
                                        value="{{ $Exam->status }}" type="checkbox"
                                        @if ($Exam->status === 1) {{ 'checked' }} @endif />
                                </div>
                            </td>
                            <td>
                                <div class="action">
                                    <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                                    {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                                    <ul class="more-options">
                                        <li><button id="" class="btn btn-warning edit-btn p-1"
                                                data-id="{{ $Exam->id }}" data-title="{{ $Exam->title }}"
                                                data-description="{{ $Exam->description }}"
                                                data-avatar="{{ $Exam->avatar }}" data-bs-toggle="modal"
                                                data-bs-target="#editModal">edit</button></li>

                                        <li><a href="{{ route('adpastquestions', ['data' => $Exam]) }}"
                                                class="btn btn-primary p-1">Questions</a>
                                        </li>
                                        <li><a onclick="validate(this)"
                                                href="{{ route('adexams.destroy', ['data' => $Exam->id]) }}"
                                                class="btn btn-danger p-1">delete</a></li>
                                    </ul>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
                                            aria-describedby="textBlock" aria-placeholder="Enter Title" />
                                        <x-input-error :messages="$errors->get('title')" class="mt-2 text-danger" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <x-input-label :value="__('Description')" />
                                        <x-text-input type="text" class="form-control" name="description"
                                            :value="old('description')" aria-describedby="textBlock" />
                                        <x-input-error :messages="$errors->get('descripion')" class="mt-2 text-danger" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <x-input-label :value="__('Exam Image')" />
                                        <input type="file" class="form-control" name="avatar"
                                            aria-describedby="textBlock" />
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
        <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="form">
                    <div class="form-response text-center mb-3">
                        <span class="error hidden"></span>
                    </div>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Subject</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('adexams.update') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('patch')

                        <div class="modal-body">
                            <input type="hidden" name="id" id="edit-id" class="form-control py-2" />
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="hidden" name="user_id" class="form-control py-2" id="editInputId">
                                        <label for="editInputFirstname" class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control py-2"
                                            id="edit-title" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="editInputLastname" class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control py-2"
                                            id="edit-description">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Exam Image')" />
                                    <input type="hidden" name="prevavatar" id="prev-avatar"
                                        class="form-control py-2" />
                                    <input type="file" class="form-control" name="avatar" />
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
    @endif

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
                // var editclass = $(this).data('class');
                var editavatar = $(this).data('avatar');

                $('#edit-id').val(id);
                $('#edit-title').val(title);
                $('#edit-description').val(description);
                // $('#prev-class').val(editclass);
                $('#prev-avatar').val(editavatar);
            });

            $('#admin-table tbody').on('change', '.enable-btn', function() {

                let statusVal = $(this).prop('checked') === true ? 1 : 0;
                let exam_id = $(this).data('id');
                // console.log(id);
                // console.log(statusVal);

                $.ajax({
                    type: "GET",
                    dataType: "application/json",
                    // url: "/enableExam",
                    url: "{{ url('/adexams/enableExam') }}",
                    _token: '{{ csrf_token() }}',
                    contentType: 'application/json; charset=utf-8',
                    data: {
                        "status": statusVal,
                        "id": exam_id
                    },
                    success: function(data) {
                        console.log("Success");
                    },
                    error: function(data) {
                        alert("fail");
                    }
                });


            });

        });
    </script>


@endsection
