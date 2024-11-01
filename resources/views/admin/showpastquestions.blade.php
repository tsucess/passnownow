@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Past Questions</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/adexams" class="btn btn-secondary p-1 px-5 shadow">Back</a>
            </div>
        </div>
    </div>

    @if (Auth::user()->role === 'user')
        <div class = "row mt-3 gap-2">
            @foreach ($userFetchQuestions as $Question)
                <div class = "col-12 col-md-4 border rounded p-4">
                    {{-- <img src="{{ asset('/assets/images/jsce.png') }}" class = "img-fluid mb-2" style="height: 15rem" /> --}}
                    <h5 class = "text-center fw-bold jss px-4">{{ $Question->year }}</h5>
                    <p class = "text-md-center px-5 py-2">
                        {{ $Question->description }}
                        Start Studying with our wide collection of
                        all Class Notes for all Terms and all Subjects
                    </p>
                    <div class="d-flex justify-content-center mt-5 mb-3">
                        <a href="{{ url('pqlearning', ['data' => $Question]) }}" class="btn btn-outline-primary mb-3 py-2 px-4">VIEW ALL QUESTIONS</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif











    <script src="{{ url('assets/js/table/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('assets/js/table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/js/table/dataTables.bootstrap.min.js') }}"></script>


    <script>
        let table = new DataTable('#admin-table');
    </script>

    <script>
        $(document).ready(function() {
            $('#topButton').on('click', '.addExam', function() {
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
