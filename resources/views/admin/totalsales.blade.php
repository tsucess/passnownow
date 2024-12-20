@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sales Analysis</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/dashboard" class="btn btn-secondary p-1 px-5 shadow">Back</a>
            </div>
        </div>
    </div>


    <span class = "float-start mt-2"><strong>Date range:</strong></span><br><br>


    <div class="dropdown">
        {{-- <a class="btn btn-light dropdown-toggle justify-content-between" style = "width: 300px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> --}}
        {{-- <span class = "float-start"><strong>Month to date(Sep 1 - 30, 2024)</span></strong><br> --}}
        <span class = "float-start me-3">Month to Date:</span> <input type = "date"><br><br>
        <span class = "float-start ms-2 me-3">Previous year:</span> <input type = "date">
        <br><br>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
        </ul>
    </div>

    <div class = "row ms-1 mt-2">
        <div>
            <span style = "font-size: 16px;">Performance</span>
            <span class = "float-end  mb-2"><i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
        </div>
    </div>

    <table class="table table-bordered">

        <tr>
            {{-- <td>
                    <p class = "m-0 p-0 mt-2">Gross Sales</p>
                    <span class = "float-start"><strong>$23, 523</strong></span>
                    <span class = "float-end mb-2">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </td> --}}

            <td>
                <div class="d-flex justify-content-between border-bottom border-black border-1 px-0">
                    <div class = "profit w-100 border-start border-black border-1 m-0">
                        <a class = "col-12 col-md-6  mt-2 mb-3  text-decoration-none text-dark"
                            href = "{{ url('totalsales') }}">
                            <div class="profit">
                                <span>Gross Sales</span> <br>
                                <span>&#x20A6; {{ number_format($totalAmount) }}</span>
                                <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                                    style = "font-size: 30px; font-weight:bold; margin-top: -15px;">&#x20A6;
                                    {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7% --}}
                                </span>
                            </div>
                        </a>
                    </div>
                    <div class = "profit w-100 border-start border-black border-1 m-0">
                        <a class = "col-12 col-md-6  mt-2 mb-3  text-decoration-none text-dark"
                            href = "{{ url('order') }}">
                            <div class="profit">
                                {{-- class  = "fw-3" --}}
                                <span class = "ms-2 ">Net Sales</span> <br>
                                <span class  = "ms-2">&#x20A6; {{ number_format($totalAmount) }}</span>
                                <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                                    style = "font-size: 30px; font-weight:bold; margin-top: -15px;">&#x20A6;
                                    {{-- <i class="fa-solid fa-receipt"></i> --}}
                                    {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                                        aria-hidden="true"></i>6.7% --}}
                                </span>

                            </div>
                        </a>
                    </div>
                </div>


            </td>

            {{-- <td>
                    <p class = "m-0 p-0 mt-2">Net Sales</p>
                    <span class = "float-start"><strong>$23, 523</strong></span>
                    <span class = "float-end mb-2">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </td> --}}
        </tr>
    </table>




    <table class="table table-bordered">

        <tr>
            <td class = "profit">

                {{-- <p class = "m-0 p-0 mt-2" ><a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">Total Sales</a></p>
                      <span class = "float-start"><strong><a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">$23, 523</a></strong></span>
                      <span class = "float-end mb-2">
                        <a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">
                        <span class = "float-end rounded-5 mb-2 text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px; background-color: red;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                        </a>
                    </span> --}}

                <a class = "col-12 col-md-6  mt-2 mb-3  text-decoration-none text-dark" href = "{{ url('totalsales') }}">
                    <div class="profit">
                        <span>Total Sales</span> <br>
                        <span>&#x20A6;{{ number_format($totalAmount) }}</span>
                        <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                            style = "font-size: 30px; font-weight:bold; margin-top: -15px;">&#x20A6;
                            {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7% --}}
                        </span>
                    </div>
                </a>

            </td>

        </tr>

    </table>


    <div class = "row ms-1 mt-2">
        <div class = "col">

            <label class="form-check-label mt-2" for="flexCheckChecked">
                <span><b>Gross sales</b></span>
                <input class="form-check-input ms-4" type="checkbox" value="" id="flexCheckChecked" checked>
                Month to date(Sep 1 - 30, 2024)

                <span class="form-check-label mt-2 ms-4 me-3" for="flexCheckChecked">20,000</span>
            </label>



            <label class="form-check-label mt-2" for="flexCheckChecked">
                <input class="form-check-input  show" type="checkbox" value="" id="flexCheckChecked" checked>
                Previous year(Sep 1 - 30, 2024)

                <span class="form-check-label mt-2 ms-4" for="flexCheckChecked">20,000</span>

            </label>



            <span class = "float-end  mb-2 me-2">
                {{-- <button class="btn btn-light dropdown-toggle mt-1 mb-2 me-1 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                By day
                              </button> --}}
                <select>
                    <option>By Day</option>
                    <option>By Month</option>
                    <option>By Year</option>
                </select>
                <i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
        </div>
    </div>




    <div class = "row">
        <div class="col mb-5">
            <canvas id="parabolaAreaChart" width="1300" height="400"></canvas>
        </div>

    </div>



          <!-- Pass sales data to JavaScript -->

          <script>
            const salesData = @json($salesData); // Data passed from the controller

            // Prepare data for Chart.js
            // const months = ['0',  'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            // var a = [0];
            // var b = [0];
            //var data = a.concat(salesData.map(data => months[data.month]));
            // const labels = data; // Extract month names


        // const labels = a.concat(salesData.map(data => months[data.month])); // Extract month names


        //     const dataValues = salesData.map(data => data.total_sales); // Extract sales totals

        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

// Ensure labels and dataValues align
const labels = salesData.map(data => months[data.month - 1]); // Map month index to names
const dataValues = salesData.map(data => data.total_sales); // Monthly sales totals


            // console.log(dataValues);

        </script>

    <script>
        const ctx = document.getElementById('parabolaAreaChart').getContext('2d');

        const parabolaAreaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels, // X-axis labels
                datasets: [{
                    label: '',
                    data: dataValues, // Y-axis values forming parabolas
                    borderColor: '#1699dd',
                    backgroundColor: '#1699dd',
                    fill: true,
                    tension: 0 // Smooth curve
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                    },
                    y: {
                        ticks: {
                            display: false
                        },
                        beginAtZero: true,
                        suggestedMin: 0,
                        suggestedMax: 10, // Adjusted Y-axis range for better visibility of parabola shapes

                    }
                }
            }
        });
    </script>

    <!-- Another chart -->
{{--
    <script>
        const ctxs = document.getElementById('parabolaAreaCharts').getContext('2d');

        const parabolaAreaCharts = new Chart(ctxs, {
            type: 'line',
            data: {
                labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 6, 0], // X-axis labels
                datasets: [{
                    label: '',
                    data: [0, 3, 2, 5, 3, 4, 5, 2, 2, 5, 5, 4, 0], // Y-axis values forming parabolas
                    borderColor: '#1699dd',
                    backgroundColor: '#1699dd',
                    fill: true,
                    tension: 0 // Smooth curve
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                    },
                    y: {
                        ticks: {
                            display: true,
                            stepSize: 20,
                            padding: 15
                        },
                        beginAtZero: true,
                        // Adjusted Y-axis range for better visibility of parabola shapes
                        suggestedMin: 0,
                        suggestedMax: 100

                    }
                }
            }
        });
    </script> --}}


    {{-- <script type="text/javascript" src="{{'./js/bootstrap.bundle.min.js'}}"></script>  --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@endsection
