@extends('layouts.dasboardtemp');


@section('admincontent')


<div class="row justify-content-end">
            <div class="col-12 col-md-6 col-lg-6">
                <h3 class = "fw-bold">Administrator</h3>
            </div>

            <div class="col-12 col-lg-6 col-md-6 d-flex justify-content-end" style = "height: 55px;">
                <button type="button" class="btn text-white" style = "background-color:#1A69AF">Add Administrator</button>
            </div>

        </div>

<div class = "container-fluid text-center mt-4">
<div class = "row justify-content-center">
    <div class = "col-12 col-md-12 col-lg-12 bg-white d-flex flex-column justify-content-center align-items-center" style = "width: 100%; height:400px;">
        <h3>No Administrator</h3>
        <p>Welcome to Passnownow Admin</p>
</div>

</div>
@endsection
