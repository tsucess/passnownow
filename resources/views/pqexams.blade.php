@extends('layouts.dasboard3')

@section('admincontent')
    <div class = "row mt-3">
    <div class = "col-sm-4">
    <img src="{{asset('/assets/images/jsce.png')}}" class = "img-fluid mb-2" />
    <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JSCE Past Questions</span>
    <p class = "p text-md-center">
        Start Studying  with our wide collection of
        all Class Notes for all Terms and all Subjects
        </p>
        <div class="d-flex justify-content-center mb-3">
        <button type="button" class="btn btn-outline-primary mb-3 p-2">VIEW ALL QUESTIONS</button>
    </div></div>


    <div class = "col-sm-4"><img src="{{asset('/assets/images/ssce.png')}}" class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">SSCE Past Questions</span>
    <p class = "p text-md-center">
        Start Studying  with our wide collection of
        all Class Notes for all Terms and all Subjects
        </p>
        <div class="d-flex justify-content-center mb-3">
            <button type="button" class="btn btn-outline-primary mb-3 p-2">VIEW ALL QUESTIONS</button>
        </div>
    </div>


    <div class = "col-sm-4"><img src="{{asset('/assets/images/jamb.png')}}"  class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JAMB Past Questions</span>
        <p class = "p text-md-center">
            Start Studying  with our wide collection of
            all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-center mb-3">
                <button type="button" class="btn btn-outline-primary mb-3 p-2">VIEW ALL QUESTION</button>
            </div>
    </div>

    </div>



@endsection
