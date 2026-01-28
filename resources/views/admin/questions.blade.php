@extends('layouts.dasboardtemp')

@section('admincontent')
<div class = "container-fluid" style="background: #f1f1f1;">

{{-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mt-2 "> --}}
<div class = "row justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h3 class="h3">Questions</h3>
        </div>
    </div>


    <div class = "row justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2">
                    <div class = "table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Number of Questions</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>SSCE(WAEC) Exam for Senior Secondary School</td>
                                <td>majorsignature@gmail.com</td>
                                <td>1000</td>
                                <td>&hellip;</td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>Joint Admission Matriculation Board(UTME JAMB)</td>
                                <td>taofeeqbolaasiwaju@gmail.com</td>
                                <td>2000</td>
                                <td>&hellip;</td>
                            </tr>

                            <tr>
                                <th scope="row">3</th>
                                <td>National Examination Council</td>
                                <td>samuelahmedtinubu@gmail.com</td>
                                <td>4000</td>
                                <td>&hellip;</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

</div>
@endsection
