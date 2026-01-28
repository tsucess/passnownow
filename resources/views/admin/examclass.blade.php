@extends('layouts.dasboardtemp')

<style>
@media screen and (max-width: 320px){
    .myexam{
        width: 320px;
    }

}
    </style>

@section('admincontent')

<div class = "container-fluid" style="background: #f1f1f1;">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h3">Examination</h3>
        </div>


<div class="row mt-3 gap-2 gap-lg-1 bg-white">


<div class = "col pt-3 border text-center rounded">
<h3 class = "h3 text-primary">SCIENCES</h3>
<p>West African Examination Council</p>
</div>



<div class = "col pt-3 border text-center rounded">
<h3 class = "h3 text-primary">ART</h3>
<p>Joint Admission Examination Council</p>
</div>



<div class = "col pt-3 border text-center rounded">
<h3 class = "h3 text-primary">OTHERS</h3>
<p>National Examination Council</p>
</div>


</div>







</div>
@endsection


