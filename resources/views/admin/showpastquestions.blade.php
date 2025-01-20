@extends('layouts.dasboardtemp')

@section('admincontent')


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 ">Past Questions</h1>


        <div class="position-relative">
            <i class="fa-solid fa-magnifying-glass position-absolute top-50 start-0 translate-middle ms-3 text-muted"></i>
            <input type="text" class="form-control ps-5" id="yearFilterInput" placeholder="Search by Year">
          </div>

        {{-- <div class="col-12 col-md-6 ms-5 search__form">
            <form action="">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="number" id = "searchInput" value="" placeholder="Search by Year">
                <input type="button" value="Search">
            </form>
        </div> --}}

        {{-- <div class="mb-3">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="form-control" placeholder="Search by Year">
          </div> --}}

          {{-- <div class="mb-3 input-group">
            <span class="input-group-text">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search by Year">
          </div> --}}


          <script>
            document.getElementById('yearFilterInput').addEventListener('input', function () {
                const filterValue = this.value.trim().toLowerCase();
                const cards = document.querySelectorAll('.question-card');

                cards.forEach(card => {
                    const year = card.getAttribute('data-year').toLowerCase();
                    if (filterValue === '' || year.includes(filterValue)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        </script>


        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/adexams" class="btn btn-secondary p-1 px-5 shadow">Back</a>
            </div>
        </div>
    </div>

    @if (Auth::user()->role === 'user')
        <div class = "row mt-3 gap-2" id="questionCardsContainer">
            {{-- {{ $result }} --}}
            @foreach ($userFetchQuestions as $Question)
                {{-- <div class = "col-12 col-md-4 border rounded p-4" style="width: 32%"> --}}
                <div class = "col-12 col-md-4 border rounded p-4 question-card" style="width: 32%" data-year="{{ $Question[0]->year }}">
                    {{-- <img src="{{ asset('/images/jsce.png') }}" class = "img-fluid mb-2" style="height: 15rem" /> --}}
                    <h5 class = "text-center fw-bold jss px-4">{{ $Question[0]->year }}</h5>
                    <p class = "text-center px-5 py-2">
                        {{ $Question[0]->description }}
                        {{-- Start Studying with our wide collection of
                        all Class Notes for all Terms and all Subjects --}}
                    </p>
                    <div class="d-flex justify-content-center mt-5 mb-3">
                        @if (Auth::user()->status === 1)
                            <a href="{{ route('pqlearning', ['data' => $Question[0]]) }}"
                                class="btn btn-outline-primary mb-3 py-2 px-4 sub">VIEW ALL QUESTIONS</a>
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
