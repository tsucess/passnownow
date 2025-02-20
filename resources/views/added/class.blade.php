
@extends('layouts.dasboard3')

@section('admincontent')
    <div class = "row mt-3 ml-5">
    <div class = "col-sm-4">
    <img src= "{{asset('/assets/images/js1.png')}}" class = "img-fluid mb-2" />
    <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JSS 1 Class Note</span>
    <p class = "p text-md-center ms-4 me-3">Start Studying  with our wide collection of
        all Class Notes for all Terms and all Subjects
        </p>
        <div class="d-flex justify-content-center mb-3">
        <a href = "{{ url('subject') }}" class = "view">VIEW ALL SUBJECTS</a>
    </div></div>


    <div class = "col-sm-4"><img src="{{asset('/assets/images/js2.png')}}" class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JSS 2 Class Note</span>
    <p class = "p text-md-center ms-4 me-3">Start Studying  with our wide collection of
        all Class Notes for all Terms and all Subjects
        </p>
        <div class="d-flex justify-content-center mb-3">
            <a href = "#" class = "view">VIEW ALL SUBJECTS</a>
        </div>
    </div>


    <div class = "col-sm-4"><img src="{{asset('/assets/images/js3.png')}}"  class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JSS 3 Class Note</span>
        <p class = "p text-md-center ms-4 me-3">Start Studying  with our wide collection of
            all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-center mb-3">
                <a href = "#" class = "view">VIEW ALL SUBJECTS</a>
            </div>
    </div>

    </div>



    <div class = "row mb-5">
        <div class = "col-sm-4">
        <img src="{{asset('/assets/images/ss1.png')}}" class = "img-fluid mb-2" />
        <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JSS 1 Class Note</span>
        <p class = "p text-md-center ms-4 me-3">Start Studying  with our wide collection of
            all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-center mb-3">
                <a href = "#" class = "view">VIEW ALL SUBJECTS</a>
            </div>
        </div>


        <div class = "col-sm-4"><img src="{{asset('/assets/images/ss2.png')}}" class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JSS 2 Class Note</span>
        <p class = "p text-md-center ms-4 me-3">Start Studying  with our wide collection of
            all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-center mb-3">
                <a href="#" class = "view">VIEW ALL SUBJECTS</a>
            </div>
        </div>


        <div class = "col-sm-4 mb-5"><img src="{{asset('/assets/images/ss3.png')}}"  class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-center jss">JSS 3 Class Note</span>

            <p class = "p text-md-center ms-4 me-3">Start Studying  with our wide collection of
                all Class Notes for all Terms and all Subjects
                </p>
                <div class="d-flex justify-content-center mb-3">
                    <a href = "#" class = "view">VIEW ALL SUBJECTS</a>
                </div>
        </div>

        </div>



@endsection





















