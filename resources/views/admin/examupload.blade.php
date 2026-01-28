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
<p class = "float-end fw-bold">100</p>
<img src="{{ asset('images/WAEC.png') }}"  class = "w-25" alt="WAEC">
<p>West African Examination Council</p>
</div>



<div class = "col pt-3 border text-center rounded">
<p class = "float-end fw-bold">100</p>
<img src="{{ asset('images/JAMB.png') }}"  class = "w-25" alt="JAMB" >
<p>Joint Admission Examination Council</p>
</div>



<div class = "col pt-3 border text-center rounded">
<p class = "float-end fw-bold">100</p>
<img src="{{ asset('images/NECO.png') }}"  class = "w-25" alt="NECO">
<p>National Examination Council</p>
</div>


</div>





<div class="row mt-5 gap-2 gap-lg-1 bg-white">


<div class = "col pt-3 border text-center rounded" >
<p class = "float-end fw-bold">100</p>
<img src="{{ asset('images/TOEFL.png') }}"  class = "w-25" alt="TOEFL">
<p>Test of English as a Foreign Language</p>
</div>


<div class = "col pt-3 border text-center rounded">
<p class = "float-end fw-bold">100</p>
<img src="{{ asset('images/IELTS.png') }}"  class = "w-25" alt="IELTS" >
<p>International English Language Testing System</p>
</div>


<div class = "col pt-3 border text-center rounded">
<p class = "float-end fw-bold">100</p>
<img src="{{ asset('images/IGCSE.png') }}"  class = "w-25" alt="IGCSE">
<p>The International General Certificate of Secondary Education</p>
</div>

</div>

</div>
@endsection


