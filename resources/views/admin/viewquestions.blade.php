@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Question</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/adsubjects" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                <button type="button" class="btn btn-md btn-outline-primary addTopic px-4"
                    data-subject_id="{{ $subject }}" data-id="{{ $sub_id }}" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add Question</button>
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
            <thead class="bg-info">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content/URL</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Term</th>
                    <th scope="col">Order</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @php use Illuminate\Support\Str; @endphp

                @php $sn = 0  @endphp
                @foreach ($fetchTopics as $Topic)
                    <tr>
                        <th>{{ ++$sn }}</th>
                        <td>{{ $Topic->title }}</td>
                        {{-- <td>{{ $Topic->{$Topic->content_type} }}</td> --}}
                        <td>{{ Str::limit($Topic->{$Topic->content_type}, 150) }}</td>
                        <td>{{ $subject }}</td>
                        <th>{{ $Topic->term }}</th>
                        <th>{{ $Topic->order }}</th>
                        <td>{{ $Topic->created_at }}</td>
                        <td>
                            <div class="action">
                                <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                                <ul class="more-options">
                                    <li><button id="" class="btn btn-warning edit-btn p-1"
                                            data-id="{{ $Topic->id }}" data-title="{{ $Topic->title }}"
                                            data-url="{{ $Topic->url }}" data-order="{{ $Topic->order }}"
                                            data-term="{{ $Topic->term }}" data-subjectu_id="{{ $subject }}"
                                            data-content="{{ $Topic->content }}"
                                            data-content_type="{{ $Topic->content_type }}" data-bs-toggle="modal"
                                            data-bs-target="#editModal">edit</button></li>
                                    <li><a onclick="validate(this)"
                                            href="{{ route('viewquestions.destroy', ['data' => $Topic->id]) }}"
                                            class="btn btn-danger p-1">delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Title</h3>

                            <div class="card-tools">
                                <a class="btn btn-info btn-sm" href="javascript:;" data-toggle="modal"
                                    data-target="#myModal">Add new</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>ans</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $key => $question)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $question['questions'] }}</td>
                                            <td>{{ $question['ans'] }}</td>
                                            <td><input class="question_status" data-id="{{ $question['id'] }}"
                                                    <?php if ($question['status'] == 1) {
                                                        echo 'checked';
                                                    } ?> type="checkbox" name="status"></td>
                                            <td>
                                                <a href="{{ url('admin/update_question/' . $question['id']) }}"
                                                    class="btn btn-primary btn-sm">Update</a>
                                                <a href="{{ url('admin/delete_question/' . $question['id']) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>ans</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>





     <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new Question</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/add_new_question') }}" class="database_operation">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Enter Question</label>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="exam_id" value="{{ Request::segment(3) }}">
                                        <input type="text" required="required" name="question"
                                            placeholder="Enter Question" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Enter Option 1</label>
                                        <input type="text" required="required" name="option_1"
                                            placeholder="Enter Question" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Enter Option 2</label>
                                        <input type="text" required="required" name="option_2"
                                            placeholder="Enter Option 2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Enter Option 3</label>
                                        <input type="text" required="required" name="option_3"
                                            placeholder="Enter  Option 3" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Enter Option 4</label>
                                        <input type="text" required="required" name="option_4"
                                            placeholder="Enter  Option 4" class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Enter correct ans</label>
                            <input type="text" required="required" name="ans" placeholder="Enter  correct ans" class="form-control">
                        </div>
                    </div> --}}
                                <div class="form-group">
                                    <label for="">Select correct option</label>
                                    <select class="form-control" required="required" name="ans">
                                        <option value="">Select</option>

                                        <option value="option_1">option 1</option>
                                        <option value="option_2">option 2</option>
                                        <option value="option_3">option 3</option>
                                        <option value="option_4">option 4</option>

                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    <!-- Add Question Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
            <div class="modal-content" id="form_add" style="overflow-y:scroll;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Question</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('viewquestions.store') }}">
                    @csrf
                    <div class="modal-body">
                        <x-text-input type="hidden" class="form-control" name="unique_id"
                            value="{{ rand(time(), 10000000) }}" />
                        <x-text-input type="hidden" class="form-control" name="sub_id" id="sub_id" />
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Subject</label>
                                    <input type="text" name="subject_id" class="form-control py-2" id="subject_id"
                                        readonly />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <x-input-label :value="__('Term')" class="form-label" />
                                    <select class="form-control py-2" name = "term">
                                        <option value ="">Select Term</option>
                                        <option value="first">First Term</option>
                                        <option value="second">Second Term</option>
                                        <option value="third">Thrid Term</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Order</label>
                                    <input type="text" name="order" class="form-control py-2" id="order"
                                        required />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control py-2" id="title"
                                        required />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <x-input-label :value="__('Content Type')" class="form-label" />
                                        <select class="form-control py-2" name="content_type" required>
                                            <option value ="">Select Content Type</option>
                                            <option value="url">url</option>
                                            <option value="content">Content</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 url-field" id="url-field">
                                    <label for="url" class="form-label">Url</label>
                                    <input type="text" name="url" class="form-control py-2" id="url" />
                                </div>
                                <div class="mb-3 content-field" id="content-field" style="display: none">
                                    <label for="content" class="form-label">Content</label> <br>
                                    <textarea name="content" class="w-100" id="editor" rows="15"
                                        style="min-height:700px;max-height:1000px;resize:vertical;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Question Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" id="form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Question</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-form" method="POST" action="{{ route('viewquestions.update') }}">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <input type="hidden" name="subject_id" id="subjectu_id" class="form-control py-2" />
                        <input type="hidden" name="id" id="edit-id" class="form-control py-2" />
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="edit-title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control py-2" id="edit-title" />
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <x-input-label :value="__('Term')" class="form-label" />
                                    <input type="hidden" name="prevterm" id="prev-term" class="form-control py-2" />
                                    <select class="form-control py-2" name = "term">
                                        <option value ="">Select Term</option>
                                        <option value="first">First Term</option>
                                        <option value="second">Second Term</option>
                                        <option value="third">Thrid Term</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="edit-order" class="form-label">Order</label>
                                    <input type="text" name="edit_order" class="form-control py-2" id="edit-order">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <x-input-label :value="__('Content Type')" class="form-label" />
                                        <select class="form-control py-2" name="edit_content_type" id="edit_content_type"
                                            required>
                                            <option value ="">Select Content Type</option>
                                            <option value="url">url</option>
                                            <option value="content">Content</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3 edit-url-field" id="edit-url-field">
                                    <label for="edit-url" class="form-label">Url</label>
                                    <input type="text" name="edit_url" class="form-control py-2" id="edit-url">
                                </div>
                            </div>

                            <div class="col-12">
                                {{-- <div class="mb-3 url-field" id="url-field">
                                    <label for="url" class="form-label">Url</label>
                                    <input type="text" name="url" class="form-control py-2" id="url" />
                                </div> --}}
                                <div class="mb-3 edit-content-field" id="edit-content-field" style="display: none">
                                    <label for="editor2" class="form-label">Content</label> <br>
                                    <textarea name="edit_content" class="w-100" id="editor2" rows="15"
                                        style="min-height:700px;max-height:1000px;resize:vertical;"></textarea>
                                </div>
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

    <script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor', {
            height: 700
        });

        CKEDITOR.replace('editor2', {
            height: 700
        });
    </script>


    <script src="{{ url('js/table/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('js/table/dataTables.bootstrap.min.js') }}"></script>



    <script>
        let table = new DataTable('#admin-table');
    </script>

    <script>
        $(document).ready(function() {
            // Show/hide url/content fields based on content_type selection
            $("select[name='content_type']").on('change', function() {
                var val = $(this).val();
                if (val === 'url') {
                    $('#url-field').show();
                    $('#content-field').hide();
                    if (window.CKEDITOR && CKEDITOR.instances.editor) {
                        CKEDITOR.instances.editor.setData('');
                    } else {
                        $('#editor').val('');
                    }
                } else if (val === 'content') {
                    $('#content-field').show();
                    $('#url-field').hide();
                    $('#url').val('');
                } else {
                    $('#url-field').hide();
                    $('#content-field').hide();
                    $('#url').val('');
                    if (window.CKEDITOR && CKEDITOR.instances.editor) {
                        CKEDITOR.instances.editor.setData('');
                    } else {
                        $('#editor').val('');
                    }
                }
            });



            $("select[name='edit_content_type']").on('change', function() {
                var val = $(this).val();
                if (val === 'url') {
                    $('#edit-url-field').show();
                    $('#edit-content-field').hide();
                    if (window.CKEDITOR && CKEDITOR.instances.editor) {
                        CKEDITOR.instances.editor.setData('');
                    } else {
                        $('#editor').val('');
                    }
                } else if (val === 'content') {
                    $('#edit-content-field').show();
                    $('#edit-url-field').hide();
                    // $('#edit-url').val('');
                } else {
                    $('#edit-url-field').hide();
                    $('#edit-content-field').hide();
                    // $('#edit-url').val('');
                    if (window.CKEDITOR && CKEDITOR.instances.editor) {
                        CKEDITOR.instances.editor.setData('');
                    } else {
                        $('#editor').val('');
                    }
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#topButton').on('click', '.addTopic', function() {
                var subject_id = $(this).data('subject_id');
                var sub_id = $(this).data('id');
                $('#subject_id').val(subject_id);
                $('#sub_id').val(sub_id);
            });


            $('#admin-table tbody').on('click', '.edit-btn', function() {
                var subjectu_id = $(this).data('subjectu_id');
                var id = $(this).data('id');
                var title = $(this).data('title');
                var url = $(this).data('url');
                var content = $(this).data('content');
                var content_type = $(this).data('content_type');
                var editorder = $(this).data('order');
                var editterm = $(this).data('term');

                console.log(content)


                $('#subjectu_id').val(subjectu_id);
                $('#edit-id').val(id);
                $('#edit-title').val(title);
                $('#editor2').val(content);
                $('#edit-content-type').val(content_type);
                $('#edit-url').val(url);
                $('#edit-order').val(editorder);
                $('#prev-term').val(editterm);

            });



        });
    </script>





@endsection
