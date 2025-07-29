@extends('layouts.dasboardtemp')

@section('admincontent')
<div class = "container-fluid" style="background: #f1f1f1;">

{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mt-2 "> --}}
<div class = "row justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h3 class="h3">SSCE(WAEC) Exam for Senior Secondary School</h3>
        </div>
    </div>


    <div class = "row justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                    <div class = "table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Exam Year</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Question</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1990</td>
                                <td>English Language</td>
                                <td>Lorem ipsum quam velit tristique mattis egestas consectetur mauris etiam pellentesque tortor ma</td>
                                <td>&hellip;</td>
                            </tr>

                            <tr>
                                <td>2000</td>
                                <td>Mathematics</td>
                                <td>Lorem ipsum quam velit tristique mattis egestas consectetur mauris etiam pellentesque tortor ma</td>
                                <td>&hellip;</td>
                            </tr>

                            <tr>
                                <td>1990</td>
                                <td>Computer Science</td>
                                <td>Lorem ipsum quam velit tristique mattis egestas consectetur mauris etiam pellentesque tortor ma</td>
                                <td>&hellip;</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

</div>
@endsection
