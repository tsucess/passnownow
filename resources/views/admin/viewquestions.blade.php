@extends('layouts.dasboardtemp')

@section('admincontent')
    <style>
        label {
            font-weight: bold;
            margin-bottom: 0.5rem;

        }

        .primary_color {
            background-color: #1A69AF;
        }

        .btn-close {
            border: 1px solid #1A69AF;
            border-radius: 50%;
            padding: 0.5rem;
        }
    </style>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-2 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Questions for {{ $subject_name }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="{{ URL::previous() }}" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                <button type="button" class="btn btn-md btn-outline-primary addTopic px-4"
                    data-subject_id="{{ $subject_id }}" data-subject_name="{{ $subject_name }}"
                    data-id="{{ $sub_id }}" data-bs-toggle="modal" data-bs-target="#addModal">Upload Question</button>
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

    <div class="table-responsive mb-5 px-3  pb-5">
        <table id="admin-table" class="table custom-table mb-5 pb-5">
            <thead class="bg-info">
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Score (Points)</th>
                    {{-- <th scope="col">Subject</th> --}}
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @php use Illuminate\Support\Str; @endphp

                @php $sn = 0  @endphp
                @foreach ($fetchQuestions as $Question)
                    <tr>
                        <th>#{{ ++$sn }}</th>
                        <td>{{ $Question->question }}</td>
                        <td>{{ $Question->ans }}</td>
                        {{-- <td>{{ $Question->{$Question->ans} }}</td> --}}
                        <th>{{ $Question->mark }}</th>
                        {{-- <td>{{ $subject_name }}</td> --}}
                        <th>
                            <input class="question_status" data-id="{{ $Question->id }}" <?php if ($Question->status == 1) {
                                echo 'checked';
                            } ?>
                                type="checkbox" name="status">
                        </th>

                        {{-- <td>{{ Str::limit($Question->{$Question->content_type}, 150) }}</td> --}}
                        <td>{{ $Question->created_at }}</td>
                        <td>
                            <div class="action">
                                <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                                <ul class="more-options">
                                    <li><button id="" class="btn btn-warning edit-btn p-1"
                                            data-id="{{ $Question->id }}" data-question="{{ $Question->question }}"
                                            data-ans="{{ $Question->ans }}" data-order="{{ $Question->order }}"
                                            data-question_type="{{ $Question->question_type }}"
                                            data-mark="{{ $Question->mark }}" data-subjectu_id="{{ $subject_id }}"
                                            data-subjectu_name="{{ $subject_name }}"
                                            data-options="{{ $Question->options }}" data-bs-toggle="modal"
                                            data-bs-target="#editModal">edit</button></li>
                                    <li><a onclick="validate(this)"
                                            href="{{ route('viewquestions.destroy', ['data' => $Question->id]) }}"
                                            class="btn btn-danger p-1">delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="subject_id" class="form-label"><b>Subject</b></label>
                                    <input type="hidden" name="subject_id" class="form-control py-2" id="subject_id"
                                        readonly />
                                    <input type="text" class="form-control py-2" id="subject_name" readonly />
                                </div>
                            </div>

                            {{-- <div class="col-3">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Order (Optional)</label>
                                    <input type="text" name="order" class="form-control py-2" id="order" />
                                </div>
                            </div> --}}
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <b><x-input-label :value="__('Question Type')" class="form-label" /> </b>
                                        <select class="form-control py-2" name="question_type" required>
                                            <option value ="">Select Question Type</option>
                                            <option value="multiple">Multiple Choice</option>
                                            <option value="alternate">Alternate Choice</option>
                                            <option value="theory">Theory</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="question" class="form-label">Enter Questions</label>
                                    <input type="text" name="question" class="form-control py-2" id="question"
                                        required />
                                </div>
                            </div>

                            <div class="">
                                <div class="row theory-field" id="theory-field" style="display: none">
                                    <div class="col-12 mb-3">
                                        <label for="content" class="form-label">Answer</label> <br>
                                        <textarea name="ans" class="w-100" id="editor" rows="10"></textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="" class="form-label">Mark</label>
                                        <input type="text" name="mark" class="form-control py-2" />
                                    </div>
                                </div>

                                <div class="row multiple-options mb-3" id="multiple-options">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Enter Option 1</label>
                                            <input type="text" name="option1" placeholder="Enter Question"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Enter Option 2</label>
                                            <input type="text" name="option2" placeholder="Enter Option 2"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Enter Option 3</label>
                                            <input type="text" name="option3" placeholder="Enter  Option 3"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Enter Option 4</label>
                                            <input type="text" name="option4" placeholder="Enter  Option 4"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Select correct option</label>
                                            <select class="form-control" name="ans">
                                                <option value="">Select</option>
                                                <option value="option1">option 1</option>
                                                <option value="option2">option 2</option>
                                                <option value="option3">option 3</option>
                                                <option value="option4">option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mark</label>
                                            <input type="text" name="mark" class="form-control py-2" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row alternate-option" id="alternate-option" style="display: none">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Enter Option 1</label>
                                            <input type="text" name="option1" placeholder="Enter Question"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Enter Option 2</label>
                                            <input type="text" name="option2" placeholder="Enter Option 2"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label for="">Correct Answer</label>
                                            <select class="form-control" name="ans">
                                                <option value="">Select</option>
                                                <option value="option1">option 1</option>
                                                <option value="option2">option 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Mark</label>
                                            <input type="text" name="mark" class="form-control py-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn p-2 mx-auto primary_color text-white"
                            style="width: 25rem">Save Question</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Question Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen ">
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
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="subjectu_name" class="form-label">Subject</label>
                                    <input type="text" name="subject_name" class="form-control py-2"
                                        id="subjectu_name" readonly />
                                </div>
                            </div>
                            {{-- <div class="col-3">
                                <div class="mb-3">
                                    <label for="edit-order" class="form-label">Order (Optional)</label>
                                    <input type="text" name="edit_order" class="form-control py-2" id="edit-order">
                                </div>
                            </div> --}}
                            <div class="col-6">
                                <div class="mb-3">
                                    <x-input-label :value="__('Question Type')" class="form-label" />
                                    <select class="form-control py-2" name="edit_question_type" id="edit-question-type"
                                        required>
                                        <option value ="">Select Question Type</option>
                                        <option value="multiple">Multiple Choice</option>
                                        <option value="alternate">Alternate Choice</option>
                                        <option value="theory">Theory</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="edit-question" class="form-label">Enter Question</label>
                                    <input type="text" name="edit_question" class="form-control py-2"
                                        id="edit-question" required />
                                </div>
                            </div>
                            <div class="col-12">
                                {{-- <div class="mb-3 url-field" id="url-field">
                                    <label for="url" class="form-label">Url</label>
                                    <input type="text" name="url" class="form-control py-2" id="url" />
                                </div> --}}
                                <div class="row edit-theory-field" id="edit-theory-field">
                                    <div class="col-12 mb-3">
                                        <label for="edit_content" class="form-label">Answer</label>
                                        <textarea name="edit_ans" class="ckeditor w-100" id="editor2" rows="2"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="edit-mark1" class="form-label edit-mark">Mark</label>
                                            <input type="text" name="edit_mark" class="form-control py-2"
                                                id="edit-mark1">
                                        </div>
                                    </div>

                                </div>
                                <div class="row edit-multiple-options" id="edit-multiple-options">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Option 1</label>
                                            <input type="text" name="edit_option1" class="form-control"
                                                id="edit_option_1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Option 2</label>
                                            <input type="text" name="edit_option2" class="form-control"
                                                id="edit_option_2">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Option 3</label>
                                            <input type="text" name="edit_option3" class="form-control"
                                                id="edit_option_3">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Option 4</label>
                                            <input type="text" name="edit_option4" class="form-control"
                                                id="edit_option_4">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select correct option</label>
                                            <select class="form-control" name="edit_ans" id="edit_ans">
                                                <option value="">Select</option>
                                                <option value="option1">option 1</option>
                                                <option value="option2">option 2</option>
                                                <option value="option3">option 3</option>
                                                <option value="option4">option 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="edit-mark2" class="form-label edit-mark">Mark</label>
                                            <input type="text" name="edit_mark" class="form-control py-2"
                                                id="edit-mark2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row edit-alternate-option" id="edit-alternate-option">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Option 1</label>
                                            <input type="text" name="edit_option1" class="form-control"
                                                id="edit_alt_option_1">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Enter Option 2</label>
                                            <input type="text" name="edit_option2" class="form-control"
                                                id="edit_alt_option_2">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select correct option</label>
                                            <select class="form-control" name="edit_ans" id="edit_alt_ans">
                                                <option value="">Select</option>
                                                <option value="option1">option 1</option>
                                                <option value="option2">option 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="edit-mark3" class="form-label edit-mark">Mark</label>
                                            <input type="text" name="edit_mark" class="form-control py-2"
                                                id="edit-mark3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" id="updateUser"
                            class="btn p-2 mx-auto primary_color text-white" style="width: 25rem">Update changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor', {
            height: 120
        });

        CKEDITOR.replace('editor2', {
            height: 120
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
            $('#topButton').on('click', '.addTopic', function() {
                var subject_id = $(this).data('subject_id');
                var subject_name = $(this).data('subject_name');
                var sub_id = $(this).data('id');
                $('#subject_id').val(subject_id);
                $('#subject_name').val(subject_name);
                $('#sub_id').val(sub_id);

            });

            $('#admin-table tbody').on('click', '.edit-btn', function() {
                var subjectu_id = $(this).data('subjectu_id');
                var subjectu_name = $(this).data('subjectu_name');
                var id = $(this).data('id');
                var question = $(this).data('question');
                var edit_mark = $(this).data('mark');
                var edit_ans = $(this).data('ans');
                var options = $(this).data('options');
                var question_type = $(this).data('question_type');
                var editorder = $(this).data('order');

                Object.entries(options).forEach(([key, value]) => {
                    if (value === edit_ans) {
                        edit_ans = key;
                    }
                });

                if (question_type === 'alternate') {
                    $('#edit_alt_option_1').val(options.option1);
                    $('#edit_alt_option_2').val(options.option2);
                    $('#edit_alt_ans').val(edit_ans);

                    $('#edit-alternate-option').show();
                    $('#edit-theory-field').hide();
                    $('#edit-multiple-options').hide();

                    $('#edit-multiple-options input, #edit-multiple-options select').prop('disabled', true);
                    $('#edit-alternate-option input, #edit-alternate-option select').prop('disabled',
                        false);
                    $('#edit-theory-field textarea').prop('disabled', true);

                } else if (question_type === "multiple") {
                    $('#edit_option_1').val(options.option1);
                    $('#edit_option_2').val(options.option2);
                    $('#edit_option_3').val(options.option3);
                    $('#edit_option_4').val(options.option4);
                    $('#edit_ans').val(edit_ans);

                    $('#edit-alternate-option').hide();
                    $('#edit-theory-field').hide();
                    $('#edit-multiple-options').show();

                    $('#edit-multiple-options input, #edit-multiple-options select').prop('disabled',
                        false);
                    $('#edit-alternate-option input, #edit-alternate-option select').prop('disabled', true);
                    $('#edit-theory-field textarea').prop('disabled', true);
                } else {
                    $('#editor2').val(edit_ans);
                    $('#edit-alternate-option').hide();
                    $('#edit-theory-field').show();
                    $('#edit-multiple-options').hide();

                    $('#edit-multiple-options input, #edit-multiple-options select').prop('disabled', true);
                    $('#edit-alternate-option input, #edit-alternate-option select').prop('disabled', true);
                    $('#edit-theory-field textarea').prop('disabled', false);
                    if (window.CKEDITOR && CKEDITOR.instances.editor2) {
                        CKEDITOR.instances.editor2.setData(edit_ans);
                    } else {
                        $('#editor2').val('');
                    }
                }

                $('#subjectu_id').val(subjectu_id);
                $('#subjectu_name').val(subjectu_name);
                $('#edit-id').val(id);
                $('#edit-question').val(question);
                $('#edit-question-type').val(question_type);
                $('#edit-order').val(editorder);
                if (question_type === 'theory') {
                    $('#edit-mark1').val(edit_mark);
                } else if (question_type === 'alternate') {
                    $('#edit-mark3').val(edit_mark);

                } else {
                    $('#edit-mark2').val(edit_mark);
                }


            });



        });

        $(document).ready(function() {
            // Show/hide url/content fields based on content_type selection
            $("select[name='question_type']").on('change', function() {
                var val = $(this).val();
                if (val === 'alternate') {
                    $('#alternate-option').show();
                    $('#theory-field').hide();
                    $('#multiple-options').hide();

                    // When showing alternate
                    $('#multiple-options input, #multiple-options select').prop('disabled', true);
                    $('#alternate-option input, #alternate-option select').prop('disabled', false);
                    $('#theory-field textarea').prop('disabled', true);
                    if (window.CKEDITOR && CKEDITOR.instances.editor) {
                        CKEDITOR.instances.editor.setData('');
                    } else {
                        $('#editor').val('');
                    }
                } else if (val === 'theory') {
                    $('#theory-field').show();
                    $('#alternate-option').hide();
                    $('#multiple-options').hide();
                    // When showing theory
                    $('#multiple-options input, #multiple-options select').prop('disabled', true);
                    $('#alternate-option input, #alternate-option select').prop('disabled', true);
                    $('#theory-field textarea').prop('disabled', false);
                    if (window.CKEDITOR && CKEDITOR.instances.editor) {
                        CKEDITOR.instances.editor.setData('');
                    } else {
                        $('#editor').val('');
                    }

                } else {
                    $('#multiple-options').show();
                    $('#alternate-option').hide();
                    $('#theory-field').hide();

                    // When showing multiple choice
                    $('#multiple-options input, #multiple-options select').prop('disabled', false);
                    $('#alternate-option input, #alternate-option select').prop('disabled', true);
                    $('#theory-field textarea').prop('disabled', true);
                    // if (window.CKEDITOR && CKEDITOR.instances.editor) {
                    //     CKEDITOR.instances.editor.setData('');
                    // } else {
                    //     $('#editor').val('');
                    // }
                }
            });

            $("select[name='edit_question_type']").on('change', function() {
                var val = $(this).val();
                console.log(val);
                if (val === 'theory') {
                    $('#edit-theory-field').show();
                    $('#edit-alternate-option').hide();
                    $('#edit-multiple-options').hide();
                    $('#edit-multiple-options input, #edit-multiple-options select').prop('disabled', true);
                    $('#edit-alternate-option input, #edit-alternate-option select').prop('disabled', true);
                    $('#edit-theory-field textarea').prop('disabled', false);
                    if (window.CKEDITOR && CKEDITOR.instances.editor2) {
                        CKEDITOR.instances.editor2.setData(edit_ans);
                    } else {
                        $('#editor2').val('');
                    }
                } else if (val === 'alternate') {
                    $('#edit-alternate-option').show();
                    $('#edit-theory-field').hide();
                    $('#edit-multiple-options').hide();
                    $('#edit-multiple-options input, #edit-multiple-options select').prop('disabled', true);
                    $('#edit-alternate-option input, #edit-alternate-option select').prop('disabled',
                        false);
                    $('#edit-theory-field textarea').prop('disabled', true);
                } else {
                    $('#edit-multiple-options').show();
                    $('#edit-alternate-option').hide();
                    $('#edit-theory-field').hide();
                    $('#edit-multiple-options input, #edit-multiple-options select').prop('disabled',
                        false);
                    $('#edit-alternate-option input, #edit-alternate-option select').prop('disabled', true);
                    $('#edit-theory-field textarea').prop('disabled', true);
                }
            });

        });
    </script>

@endsection
