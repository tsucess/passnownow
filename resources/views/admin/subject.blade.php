
@extends('layouts.dasboard3')

@section('admincontent')
    <div class = "row mt-3 ms-3">
    <div class = "col-sm-4">
    <img src="{{asset('/assets/images/englishlanguage.png')}}" class = "img-fluid mb-2" />
    <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">JSS 1 Class Note</span>
    <p class = "p text-md-start">Start Studying  with our wide collection of
        all Class Notes for all Terms and all Subjects
        </p>
        <div class="d-flex justify-content-start mb-3">
        <a class="btn btn-outline-primary mb-3" href = "{{ url('pastquestion') }}">VIEW NOTE</a>
    </div></div>


    <div class = "col-sm-4"><img src="{{asset('/assets/images/mathematics.png')}}" class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">JSS 2 Class Note</span>
    <p class = "p text-md-start">Start Studying  with our wide collection of
        all Class Notes for all Terms and all Subjects
        </p>
        <div class="d-flex justify-content-start mb-3">
            <a class="btn btn-outline-primary mb-3" href = "{{ url('pastquestion') }}">VIEW NOTE</a>
        </div>
    </div>


    <div class = "col-sm-4"><img src= "{{asset('/assets/images/computerscience.png')}}"  class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">JSS 3 Class Note</span>
        <p class = "p text-md-start">Start Studying  with our wide collection of
            all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-outline-primary mb-3" href = "{{ url('pastquestion') }}">VIEW NOTE</a>
            </div>
    </div>

    </div>



    <div class = "row ms-3">
        <div class = "col-sm-4">
        <img src="{{asset('/assets/images/businessstudies.png')}}" class = "img-fluid mb-2" />
        <span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">SS 1 Class Note</span>
        <p class = "p text-md-start">Start Studying  with our wide collection of
            all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-outline-primary mb-3" href = "{{ url('pastquestion') }}">VIEW NOTE</a>
            </div>
        </div>


        <div class = "col-sm-4"><img src="{{asset('/assets/images/homeeconomics.png')}}" class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">SS 2 Class Note</span>
        <p class = "p text-md-start">Start Studying  with our wide collection of
            all Class Notes for all Terms and all Subjects
            </p>
            <div class="d-flex justify-content-start mb-3">
                <a class="btn btn-outline-primary mb-3" href = "{{ url('pastquestion') }}">VIEW NOTE</a>
            </div>
        </div>


        <div class = "col-sm-4"><img src="{{asset('/assets/images/computerscience.png')}}"  class = "img-fluid mb-2" /><span class = "d-block fw-bold fs-sm-5 fs-md-6 fs-lg-7 text-start jss">SS 3 Class Note</span>
            <p class = "p text-md-start">Start Studying  with our wide collection of
                all Class Notes for all Terms and all Subjects
                </p>
                <div class="d-flex justify-content-start mb-3">
                    <a class="btn btn-outline-primary mb-3" href = "{{ url('pastquestion') }}">VIEW NOTE</a>
                </div>
        </div>

        </div>

@endsection
