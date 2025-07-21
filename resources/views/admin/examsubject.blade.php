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
            <h3 class="h3">Science Subjects</h3>
        </div>

<div class="row mt-3 gap-2 gap-lg-1 bg-white">


<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">ENGLISH LANGUAGE
    <span class = "float-end">10</span>
</h6>

</div>


<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">MATHEMATICS
    <span class = "float-end">10</span>
</h6>
</div>

<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">BIOLOGY
    <span class = "float-end">10</span>
</h6>
</div>

</div>



<div class="row mt-3 gap-2 gap-lg-1 bg-white">


<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">CHEMISTRY
    <span class = "float-end">10</span>
</h6>

</div>



<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">PHYSCIS
    <span class = "float-end">10</span>
</h6>

</div>



<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">ECONOMICS
    <span class = "float-end">10</span>
</h6>

</div>


</div>



<div class="row mt-3 gap-2 gap-lg-1 bg-white">


<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">AGRICULTURAL SCIENCE
    <span class = "float-end">10</span>
</h6>

</div>



<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">GEOGRAPHY
    <span class = "float-end">10</span>
</h6>

</div>



<div class = "col mx-auto mt-4 text-center ">
<h6 class = "h6">COMPUTER SCIENCE
    <span class = "float-end">10</span>
</h6>

</div>


</div>






</div>
@endsection


