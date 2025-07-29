@extends('layouts.dasboardtemp');

@section('admincontent')

<div class = "container-fluid" style="background: #f1f1f1;">

<div class = "row justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h3 class="h3">English Language</h3>
        </div>
    </div>


<form>
<div class = "row bg-white">

  <div class="mb-3 mt-3">
    <label for="question1" class="form-label fw-bold">Question</label>
    <input type="text" class="form-control" id="question1" aria-describedby="questionHelp">

    <select class="form-select w-25 mt-2" aria-label="Default select example">
  <option selected>Multiple Options</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>

  </div>



  {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}



</div>


</form>





</div>
@endsection
