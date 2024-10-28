@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Past Questions</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/adexams" class="btn btn-secondary p-1 px-5 shadow">Back</a>
                <button type="button" class="btn btn-md btn-outline-primary addExam px-4" data-exam_id="{{ $exam }}" data-id="{{ $ex_id }}" data-bs-toggle="modal" data-bs-target="#addModal">Add Question</button>
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
                    <th scope="col">Year</th>
                    <th scope="col">url</th>
                    <th scope="col">Order</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
                @php $sn = 0  @endphp
                @foreach ($fetchQuestions as $Question)
                <tr>
                    <th>{{ ++$sn }}</th>
                    <td>{{ $Question->title .' '. $exam }}</td>
                    <td>{{ $Question->year }}</td>
                    <td>{{ $Question->url }}</td>
                    {{-- <td>{{ $exam }}</td> --}}
                    <th>{{ $Question->order }}</th>
                    <td>{{ $Question->created_at }}</td>
                    <td>
                        <div class="form-check form-switch">
                            {{-- <input class="form-check-input enable-btn" value="<=$video['status'];?>" type="checkbox" data-value ="<=$video['id'];?>" <?php if($video['status'] == 1 ){echo 'checked';}?> > --}}
                            <input class="form-check-input enable-btn" value="" type="checkbox" data-value ="" checked >
                        </div>
                    </td>
                    <td>
                        <div class="action">
                            <i class="fa-solid fa-ellipsis-vertical align-text-bottom text-dark more-button"></i>
                            <ul class="more-options">
                                <li><button id="" class="btn btn-warning edit-btn p-1" data-id="{{ $Question->id }}" data-title="{{ $Question->title }}" data-url="{{ $Question->url }}" data-order="{{ $Question->order }}" data-examu_id="{{ $exam }}" data-year="{{ $Question->year }}"  data-bs-toggle="modal" data-bs-target="#editModal">edit</button></li>
                                <li><a onclick="validate(this)" href="{{ route('adpastquestions.destroy', ['data' => $Question->id]) }}" class="btn btn-danger p-1">delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <section>
        <iframe src="https://app.Lumi.education/api/v1/run/gWQ6dY/embed" width="1088" height="720" frameborder="0" allowfullscreen="allowfullscreen" allow="geolocation *; microphone *; camera *; midi *; encrypted-media *"></iframe>
        <script src="https://app.Lumi.education/api/v1/h5p/core/js/h5p-resizer.js" charset="UTF-8"></script>
    </section> --}}



    <!-- Add Questions Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="form_add">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Past Questions</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form method="POST" action="{{ route('adpastquestions.store') }}" >
                    @csrf

                    <div class="modal-body">
                        <x-text-input type="hidden" class="form-control" name="unique_id" value="{{ rand(time(), 10000000) }}" />
                        <x-text-input type="hidden" class="form-control" name="ex_id" id="ex_id" />
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Exam</label>
                                    <input type="text" name="exam_id" class="form-control py-2" id="exam_id"  readonly />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control py-2" id="title" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <x-input-label :value="__('Year')" class="form-label" />
                                    <select  class="form-control py-2" name = "year" >
                                        <option value ="">Select Exam Year</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="addInputUrl" class="form-label">Url</label>
                                    <input type="text" name="url" class="form-control py-2" id="url" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="order" class="form-label">Order</label>
                                    <input type="text" name="order" class="form-control py-2" id="order" required />
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
        <div class="modal-dialog">
            <div class="modal-content" id="form">
                <div class="form-response text-center mb-3">
                    <span class="error hidden"></span>
                </div>
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Past Question</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit-form" method="POST" action="{{ route('adpastquestions.update') }}" >
                    @csrf
                    @method('patch')

                    <div class="modal-body">
                        <input type="hidden" name="exam_id" id="examu_id" class="form-control py-2" />
                        <input type="hidden" name="id" id="edit-id" class="form-control py-2" />
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="edit-title" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control py-2" id="edit-title" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                        <x-input-label :value="__('Year')" class="form-label" />
                                        <input type="hidden" name="prevyear" id="prev-year" class="form-control py-2" />
                                        <select  class="form-control py-2" name = "year" >
                                            <option value ="">Select Exam Year</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="edit-url" class="form-label">Url</label>
                                    <input type="text" name="url" class="form-control py-2" id="edit-url">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="edit-order" class="form-label">Order</label>
                                    <input type="text" name="edit_order" class="form-control py-2" id="edit-order" >
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" id="updateUser" class="btn btn-success">Update changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>











    <script src="{{ url('assets/js/table/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('assets/js/table/jquery.dataTables.min.js')}}"></script>
    <script src="{{ url('assets/js/table/dataTables.bootstrap.min.js')}}"></script>


    <script>
        let table = new DataTable('#admin-table');
    </script>

<script>
    $(document).ready(function() {
        $('#topButton').on('click', '.addExam', function () {
            var exam_id = $(this).data('exam_id');
            var ex_id = $(this).data('id');
            $('#exam_id').val(exam_id);
            console.log(ex_id);
            $('#ex_id').val(ex_id);
        });


        $('#admin-table tbody').on('click', '.edit-btn', function() {
            var examu_id = $(this).data('examu_id');
            var id = $(this).data('id');
            var title = $(this).data('title');
            var url = $(this).data('url');
            var editorder = $(this).data('order');
            var edityear = $(this).data('year');

            console.log(examu_id);
        
            $('#examu_id').val(examu_id);
            $('#edit-id').val(id);
            $('#edit-title').val(title);
            $('#edit-url').val(url);
            $('#edit-order').val(editorder);
            $('#prev-year').val(edityear);
            
        });

     

    });

 
</script>
@endsection
