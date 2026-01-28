@extends('layouts.dasboardtemp')


@section('admincontent')


<div class="row justify-content-start ms-2">
            <div class="col-12 col-md-6 col-lg-6 mt-3">
                <h3 class = "fw-bold">Welcome</h3>
                <p>Winner Effiong</p>
            </div>

            {{-- <div class="col-12 col-lg-6 col-md-6 d-flex justify-content-end" style = "height: 55px;">
                <button type="button" class="btn text-white" style = "background-color:#1A69AF">Add Administrator</button>
            </div> --}}

        </div>

<div class = "container-fluid mt-4">
<div class = "row">
    <div class = "col-12 col-md-12 col-lg-12 bg-white d-flex flex-column p-5 w-100 h-75">
        <h5 class = "fw-bold align-items-start">Instructions</h5>
        <p>
            Please read the instructions before starting your examination.
        </p>

        <p>
            1. This is a timed examination. Your countdown begin as soon as
you begin the exam. The timer is located at the top right hand
corner of your screen.
        </p>

        <p>
            1. You can only select one answer per question. If you are not sure
                of a question, you can skip by pressing the next button and
                return by using the previous button.
        </p>

        <p>
            1. Once you have completed your test, click the submit button
               located below your screen.
        </p>

            <div class="text-center mt-4 startexambutton">
            <button class = "btn p-2" style = "background:#1A69AF; color: #fff;">Start Examination</button>
            </div>
</div>

</div>
@endsection
