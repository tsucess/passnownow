@extends('layouts.dasboardtemp')

<style>
    .subject p {
        height: 3rem;
    }

    @media screen and (min-width: 768px) {
        .subject {
            width: 49% !important;
        }

    }

    @media screen and (min-width: 1024px) {
        .subject {
            width: 32% !important;
        }

    }

    #exam-instruction li {
        line-height: 1.5rem;
        margin-bottom: 0.5rem;
    }
</style>


@section('admincontent')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-3 pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Subjects</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                {{-- <a href="/adexams" class="btn btn-secondary p-1 px-5 shadow">Back</a> --}}
                <a href="{{ URL::previous() }}" class="btn btn-secondary p-1 px-5 shadow">Back</a>

            </div>
        </div>
    </div>

    @if (Auth::user()->role === 'user')
        <p class="px-3">Apply for your preferred subjects</p>
        @if ($userFetchSubjects->isNotEmpty())
            <div class = "row mt-3 gap-2 px-4">
                <?php
                $i = 0;
                ?>

                @foreach ($userFetchSubjects as $subject)
                    <div class = "col-12 col-md-6 col-lg-4 border bg-white rounded py-3 subject">
                        <div class="w-100 text-end pb-2 fs-3"><b>{{ $subject->questions_count }}</b></div>
                        <h5 class = "text-center fw-bold jss">{{ $subject->title }}</h5>
                        <p class = "text-center pt-2">
                            {{ $subject->description }}
                            {{-- Start Studying with our wide collection of
                        all Class Notes for all Terms and all Subjects --}}
                        </p>
                        <div class="d-flex justify-content-center mt-2">
                            @if (Auth::user()->status === 1)
                                @if ($result[$i++] === null)
                                    <button data-id="{{ $subject->id }}" data-exam_id="{{ $exam }}"
                                        class="btn btn-outline-primary mb-3 py-2 px-4 sub w-50 apply_exam"> Apply &nbsp;<i
                                            class="fas fa-arrow-circle-right"></i> </button>
                                @else
                                    {{-- <button class="btn btn-primary mb-3 py-2 px-4 sub start_exam" data-bs-toggle="modal"
                                        data-bs-target="#exam-instruction" data-id="{{ $subject->id }}">Start Exam &nbsp;<i
                                            class="fas fa-check"></i>
                                    </button> --}}
                                    <button class="btn btn-primary mb-3 py-2 px-4 sub start_exam" data-bs-toggle="modal"
                                        data-bs-target="#exam-instruction" data-subject-id="{{ $subject->id }}">
                                        Start Exam &nbsp;<i class="fas fa-play"></i>
                                    </button>
                                @endif
                            @else
                                <button type="button" class="btn btn-outline-primary sub" data-bs-toggle="modal"
                                    data-bs-target="#subscribeModal">Subscribe Now</button>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-primary text-center">
                <p>No Subjects uploaded yet check back later !</p>
            </div>
            {{-- <div class = "col-12 border bg-white rounded py-3 text-center">
                <p>No Exams uploaded yet! Check back later</p>
            </div> --}}
        @endif
    @endif






    <script src="{{ url('js/table/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('js/table/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('js/table/dataTables.bootstrap.min.js') }}"></script>

    <script>
        // $(document).on('click', '.start_exam', function() {
        //     var id = $(this).attr('data-subject_id');
        //     console.log(id);
        //     $.get(BASE_URL + '/start_exam/' + id, function(fb) {
        //         var resp = $.parseJSON(fb);
        //         if (resp.status == 'true') {
        //             alert('Do you want to start exam');
        //             setTimeout(() => {
        //                 window.location.href = resp.reload;
        //             }, 1000);
        //         } else {
        //             alert(resp.message);
        //         }
        //     })
        // })

        document.addEventListener('DOMContentLoaded', function() {
            const examModal = document.getElementById('exam-instruction');
            const startExamLink = document.getElementById('modal-start-exam-link');

            examModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // The button that triggered the modal
                const subjectId = button.getAttribute('data-subject-id');

                // Update the link in the modal
                startExamLink.setAttribute('href', `/start_exam/${subjectId}`);
            });
        });




        $(document).on('click', '.apply_exam', function() {
            var id = $(this).attr('data-id');
            var exam_id = $(this).attr('data-exam_id');
            $.get(BASE_URL + '/apply_exam/' + exam_id + '/' + id, function(fb) {
                var resp = $.parseJSON(fb);
                if (resp.status == 'true') {
                    alert(resp.message);
                    setTimeout(() => {
                        window.location.href = resp.reload;
                    }, 1000);
                } else {
                    alert(resp.message);
                }
            })
        })

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


    <!-- Large modal -->
    <div class="modal fade" id="exam-instruction" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close border-radius-50 p-2" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="row justify-content-start ms-2">
                    <div class="col-12 col-md-6 col-lg-6 mt-4">
                        <h3>Welcome {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}!</h3>
                    </div>
                </div>


                <div class = "container-fluid my-4">
                    <div class = "row">
                        <div class = "col-12 col-md-12 col-lg-12 bg-white d-flex flex-column p-5 w-100 h-75">
                            <h5 class = "fw-bold align-items-start">Instructions</h5>
                            <p>
                                Please read the following instructions carefully before starting your examination.
                            </p>
                            <ol>
                                <li>
                                    <strong>Timed Examination:</strong> The countdown will begin as soon as you start the
                                    exam.
                                    The exam duration is shown at the top left of your screen, and the live timer is
                                    displayed at the center.
                                </li>
                                <li>
                                    <strong>Answering Multiple-Choice & Alternate Questions:</strong> You may select only
                                    <em>one</em> answer per question.
                                    If you are unsure about a question, you can skip it using the <strong>Next</strong>
                                    button and return to it later using the <strong>Previous</strong> button.
                                </li>
                                <li>
                                    <strong>Answering Theory Questions:</strong> For theory questions, type your answer in
                                    the provided answer area (text box).
                                    Ensure your responses are clear and complete before moving to the next question.
                                </li>
                                <li>
                                    <strong>Submitting Your Exam:</strong> Once you have completed all questions, click the
                                    <strong>Submit</strong> button located at the bottom left of the last page.
                                    Please note that once you submit, your answers cannot be changed.
                                </li>
                            </ol>

                            <div class="text-center mt-4 startexambutton">
                                <a href="#" id="modal-start-exam-link" class="btn btn-primary mb-3 py-2 px-4 sub">
                                    Start Exam &nbsp;<i class="fas fa-check-circle"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="/checkoutdetails" class="btn upgrade-btn mx-auto w-50">Subscribe Now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
