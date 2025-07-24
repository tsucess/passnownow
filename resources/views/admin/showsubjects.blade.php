@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subjects</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/adexams" class="btn btn-secondary p-1 px-5 shadow">Back</a>
            </div>
        </div>
    </div>
    
    @if (Auth::user()->role === 'user')
    <p>Apply for your preferred subjects</p>
    <div class = "row mt-3 gap-2">

        {{-- {{ $result }} --}}
            @foreach ($userFetchSubjects as $subject)
                {{-- <div class = "col-12 col-md-4 border rounded p-4" style="width: 32%"> --}}
                <div class = "col-12 col-md-4 border rounded p-4" style="width: 32%">
                    {{-- <img src="{{ asset('/images/jsce.png') }}" class = "img-fluid mb-2" style="height: 15rem" /> --}}
                    <h5 class = "text-center fw-bold jss px-4">{{ $subject->title }}</h5>
                    <p class = "text-center px-5 py-2">
                        {{ $subject->description }}
                        {{-- Start Studying with our wide collection of
                        all Class Notes for all Terms and all Subjects --}}
                    </p>
                    <div class="d-flex justify-content-center mt-5 mb-3">
                        @if (Auth::user()->status === 1)
                            <a href="{{ route('pqlearning', ['data' => $subject]) }}"
                                class="btn btn-outline-primary mb-3 py-2 px-4 sub">Apply</a>
                        @else
                            <button type="button" class="btn btn-outline-primary sub" data-bs-toggle="modal"
                                data-bs-target="#subscribeModal">Subscribe Now</button>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    @endif

   




        <script src="{{ url('js/table/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ url('js/table/jquery.dataTables.min.js') }}"></script>
        <script src="{{ url('js/table/dataTables.bootstrap.min.js') }}"></script>


        <script>
            let table = new DataTable('#admin-table');
        </script>

        <script>
            $(document).ready(function() {
                $('#topButton').on('click', '.addExam', function() {
                    var exam_id = $(this).data('exam_id');
                    $('#exam_id').val(exam_id);
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

         <!-- Subscribe Modal -->
    <div class="modal fade" id="subscribeModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 mx-auto text-center">
                            <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""
                                    class="mb-3 w-50"></a>
                            <h5>You do not have an active subscription</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/checkoutdetails" class="btn upgrade-btn mx-auto">Subscribe Now</a>
            </div>
        </div>
    </div>
    @endsection
