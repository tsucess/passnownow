@extends('layouts.dasboardtemp')


@section('admincontent')
    <div class="row justify-content-start ms-2">
        <div class="col-12 col-md-6 col-lg-6 mt-4">
            <h3 >Welcome {{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name) }}!</h3>
        </div>
    </div>

    <div class = "container-fluid my-4">
        <div class = "row">
            <div class = "col-12 col-md-12 col-lg-12 bg-white d-flex flex-column p-5 w-100 h-75">
                <h5 class = "fw-bold align-items-start">Instructions</h5>
                <p>
                    Please read the instructions before starting your examination.
                </p>
                <p>
                    1. This is a timed examination. Your countdown begin as soon as
                    you begin the exam. The Exam time is located at the top left
                    corner of your screen and the timer at the center.
                </p>
                <p>
                    2. You can only select one answer per question. If you are not sure
                    of a question, you can skip by pressing the next button and
                    return by using the previous button.
                </p>
                <p>
                    3. Once you have completed your test, click the submit button
                    located at the last page of your exam on the left corner below your question.
                </p>
                <div class="text-center mt-4 startexambutton">
                    <button class = "btn p-2" style = "background:#1A69AF; color: #fff;">Start Examination</button>
                </div>
            </div>
        </div>
    </div>
@endsection
