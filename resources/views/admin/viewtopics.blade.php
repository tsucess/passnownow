@extends('layouts.dasboardtemp')

<style>
#form_add
{
    width: 100%;
}
</style>

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Topics</h1>
        <h1 class="h2">Topics</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/adsubjects" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                <button type="button" class="btn btn-md btn-outline-primary addTopic px-4"
                    data-subject_id="{{ $subject }}" data-id="{{ $sub_id }}" data-bs-toggle="modal"
                    data-bs-target="#addModal">Add topic</button>
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
                                            href="{{ route('viewtopics.destroy', ['data' => $Topic->id]) }}"
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
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" id="form_add">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add new topic</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('viewtopics.store') }}">
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


    <!-- Edit User Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" id="form">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit topic</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-form" method="POST" action="{{ route('viewtopics.update') }}">
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
                                        <select class="form-control py-2" name="edit_content_type" id="edit_content_type" required>
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
            var editorder = $(this).data('order');
            var editterm = $(this).data('term');

            $('#subjectu_id').val(subjectu_id);
            $('#edit-id').val(id);
            $('#edit-title').val(title);
            $('#edit-url').val(url);
            $('#edit-order').val(editorder);
            $('#prev-term').val(editterm);

        });



        });
    </script>





</script>
@endsection
