@extends('layouts.dasboardtemp')

@section('admincontent')

        <div class = "row  justify-content-between ms-2 mt-3 rounded-2" style="background-color: #1A69AF;">

            <div class="col-4 mt-4 mb-3">
                <h1 class = "h1 text-white overflow-hidden">Hello, Winner!</h1>
                <p class = "text-white">Let`s learn something new today</p>

                <br><br>

                <p class = "text-white">Good luck with your studies</p>

            </div>

            <div class="col-4 mt-2">
                <img src = "{{ asset('assets/images/admin/greeting-img.png') }}" class = "img-fluid" />
            </div>


        </div>



        <div class ="row mb-3">

            <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary overflow-hidden">
                <a class = "text-decoration-none text-dark" href = "{{ url('adtotalsales') }}">
                <span class = "ms-2 mt-3">Total Profit</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">$23, 523</span><span
                    class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                        aria-hidden="true"></i>6.7%</span>

                <br><br>

                <span>Monthly goal</span>
                <span class = "float-end">70%</span>

                <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div>
            </a>
            </div>

            <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary overflow-hidden">
                <span class = "ms-2 mt-3">Total Administrators</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">100</span><span
                    class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3"
                    style = "font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                        aria-hidden="true"></i>6.7%</span>

                <br><br>

                <span>Monthly goal</span>
                <span class = "float-end">70%</span>

                <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div>
            </div>
            <div class = "col-sm ms-3 mt-3 p-3 mb-2 border border-primary overflow-hidden">
                <span class = "ms-2 mt-3">Total Users</span><br>
                <span class  = "ms-2 mb-4 fw-bold fs-5 ">100</span><span
                    class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3"
                    style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                        aria-hidden="true"></i>6.7%</span>

                <br><br>

                <span>Monthly goal</span>
                <span class = "float-end">70%</span>

                <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
                    <div class="progress-bar bg-primary" style="width: 75%"></div>
                </div>
            </div>
        </div>


        <div class = "row ms-2 border border-1 border-black p-2 mb-4">
            <div class = "border-bottom border-black border-1 ">
                <span>Stats Overview</span>
                <span class = "float-end  mb-2"><i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
            </div>

            <div class="d-flex justify-content-between border-bottom border-black border-1">
                <div class="m-0 pt-2 text-info" style = "width: 100px;">Today</div>
                <div class="p-2 text-black">Week to Date</div>
                <div class="p-2 text-black pe-5 float-start">Month to Date</div>
            </div>


            <div class="d-flex justify-content-between border-bottom border-black border-1">
                <div class=" col-6 me-3 mt-2 mb-3">
                    <a class = "text-decoration-none text-dark" href = "{{ url('adtotalsales') }}">
                    <span>Total Sales</span> <br>
                    <span class  = "fw-3 ">$23, 523</span><span
                        class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3"
                        style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                            aria-hidden="true"></i>6.7%</span>
                    </a>
                </div>

                <div class="col-6 border-start border-black border-1 me-5 ms-2 mt-2">
                    <a class = "text-decoration-none text-dark" href = "{{ url('order') }}">
                    <span class = "ms-2">Orders</span> <br>
                    <span class  = "fw-3 ms-2 ">10</span><span
                        class = "float-end rounded-5 mb-2  me-3 text-bg-success text-success p-2  bg-opacity-25 opacity-10 pe-3"
                        style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                            aria-hidden="true"></i>6.7%</span>
                    </a>
                </div>

            </div>

            <div class = "float-start  mt-2">
                <a href = "{{ url('addetailedstat') }}" class = "float-start mb-1">View detailed stats</a>
            </div>

        </div>

        <div class =" row border border-1 border-black mt-3 ms-2 mb-3 p-2">
            <span class = "float-start mt-2">Recent user
                <span class = "float-end mt-1 mb-1"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span></span>
        </div>
        <div class="table-responsive w-100 small float-start mt-2 ms-2 mb-5">
            <table class="table">
                <thead>
                    <tr>

                        <th scope = "col" class="position-relative pe-2">
                            S/N
                            <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                            <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>

                        </th>

                        <th scope = "col" class="position-relative">
                            Name
                            <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                            <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>

                        </th>

                        <th scope="col" class="position-relative">
                            Email
                            <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                            <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                        </th>

                        <th scope="col" class="position-relative pe-5">
                            Username
                            <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                            <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                        </th>

                        <th scope="col" class="position-relative">
                            Date
                            <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                            <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                        </th>

                        <th scope="col" class="position-relative pe-4">
                            Action
                            <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                            <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle"
                                aria-hidden="true"></i>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Winner Effiong Duff</td>
                        <td>data</td>
                        <td>placeholder</td>
                        <td>text</td>
                        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Winner Effiong Duff</td>
                        <td>irrelevant</td>
                        <td>visual</td>
                        <td>layout</td>
                        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
                    </tr>


                    <tr></tr>
                    <td>3</td>
                    <td>Winner Effiong Duff</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                    <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
                    </tr>


                    <tr></tr>
                    <td>4</td>
                    <td>Winner Effiong Duff</td>
                    <td>irrelevant</td>
                    <td>visual</td>
                    <td>layout</td>
                    <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>











        {{-- <div class="row mt-5">
            <div class="col pt-2">
                &copy;2023 Passnownow 2024, All Rights Reserved.
            </div>


            <div class="col">


                <button type="button" class="btn btn-link footerLinks">License</button>
                <button type="button" class="btn btn-link footerLinks">More Themes</button>
                <button type="button" class="btn btn-link footerLinks">Documentation</button>
                <button type="button" class="btn btn-link footerLinks">Support</button>


            </div>
        </div> --}}

{{--
    </div>

    </div>

    </div> --}}

@endsection

<!-- </div>







    <div class="container"> -->



<!-- jQuery (necessary for Bootstrap's - 5JavaScript plugins) -->
<!-- <script type="text/javascript" src="./bootstrap-5/js/bootstrap.js"></script>  -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html> --}}
