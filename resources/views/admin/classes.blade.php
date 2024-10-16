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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
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
                {{ $sn = 0 }}
                @foreach ($fetchClasses as $Class)
                    <tr>
                        <th>{{ ++$sn }}</th>
                        <td>{{ $Class->title }}</td>
                        <td>{{ $Class->description }}</td>
                        <td>{{ $Class->created_at }}</td>
                        <td>
                            <div class="action">
                                <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                                {{-- <span class="align-text-bottom text-dark more-button"></span> --}}
                                <ul class="more-options">
                                    <li><button class="btn btn-warning user-edit-btn p-1" data-id="{{ $Class->id }}"
                                            data-title="{{ $Class->title }}" data-description="{{ $Class->description }}"
                                            data-bs-toggle="modal" data-bs-target="#editModal">edit</button>
                                    </li>
                                    <li><a href="{{ route('classes.destroy', ['data' => $Class->id]) }}"
                                            class="btn btn-danger p-1 px-3">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Add Class Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form_add">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Class</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('classes.store') }}">
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
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" name="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Class Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form">
                <div class="form-response text-center mb-3">
                    <span class="error hidden"></span>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Class</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-form" method="POST" action="{{ route('classes.update') }}">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id" class="form-control py-2" />
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <input type="hidden" name="user_id" class="form-control py-2" id="editInputId">
                                    <label for="editInputFirstname" class="form-label">Title</label>
                                    <input type="text" name="title" id="edit-title" class="form-control py-2" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="editInputLastname" class="form-label">Description</label>
                                    <input type="text" name="description" id="edit-description"
                                        class="form-control py-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" id="updateClass" class="btn btn-success">Update
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>











    <script src="{{ 'assets/js/table/jquery-3.3.1.min.js' }}"></script>
    <script src="{{ 'assets/js/jquery.min.js' }}"></script>
    <script src="{{ 'assets/js/table/jquery.dataTables.min.js' }}"></script>
    <script src="{{ 'assets/js/table/dataTables.bootstrap.min.js' }}"></script>




    <script>
        let table = new DataTable('#admin-table');
    </script>



    <script>
        $(document).ready(function() {

            $('#admin-table tbody').on('click', '.user-edit-btn', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');

                // console.log(id);
                // console.log(title);
                // console.log(description);
                // console.log("===================");

                $('#edit-id').val(id);
                $('#edit-title').val(title);
                $('#edit-description').val(description);
            });

        });

     
    </script>

@endsection
