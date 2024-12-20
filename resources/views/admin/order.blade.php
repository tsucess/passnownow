@extends('layouts.dasboardtemp')

@section('admincontent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2" id="topButton">
                <a href="/dashboard" class="btn btn-secondary p-1 px-5 shadow">Back</a>
            </div>
        </div>
    </div>
    <div class = "container-fluid">
        <div class = "row">
            <strong>Date range:</strong>

            <div class="dropdown mt-2 mb-3">

                {{-- <a class="btn btn-light dropdown-toggle" style = "margin-left:-13px;"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span><strong>Month to date(Sep 1 - 30, 2024)</span></strong><br>
            <span>vs Previous year(Sep 1 - 30, 2023)</span>
        </a> --}}
                <span class = "float-start me-3">Month to Date:</span><input type="date" /><br><br>
                <span class = "float-start me-3">Previous year:</span><input type="date" />
            </div>
        </div>
    </div>

    <!-- <div class = "container-fluid mt-2 mb-2">

            </div> -->

    <table class="table table-bordered">

        <tr>
            <td>
                <p class = "m-0 p-0 mt-2">Order</p>
                <span class = "float-start"><strong>2</strong></span>


                <span class = "float-end mb-2">
                    <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                        style="font-size: 30px; font-weight:bold; margin-top: -15px;">
                        <i class="fa-solid fa-receipt"></i>
                    </span>
                </span>
            </td>


            <td>
                <p class = "m-0 p-0 mt-2">Net Sales</p>
                <span class = "float-start"><strong>$23, 523</strong></span>
                <span class = "float-end mb-2">
                    <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                        style="font-size: 30px; font-weight:bold; margin-top: -15px;">
                        <i class="fa-solid fa-receipt"></i>
                    </span>
                </span>
            </td>
        </tr>
    </table>




    <table class="table table-bordered">

        <tr>
            <td>
                <p class = "m-0 p-0 mt-2">Average Order Value</p>
                <span class = "float-start"><strong>$25,523</strong></span>
                <span class = "float-end mb-2">
                    <span class = "float-end rounded-5 mb-2 text-bg-danger text-white p-2 bg-opacity-25 opacity-10 pe-3"
                        style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                            aria-hidden="true"></i>6.7%</span>
                </span>
            </td>


            <td>
                <p class = "m-0 p-0 mt-2">Average Items Order</p>
                <span class = "float-start"><strong>1</strong></span>
                <span class = "float-end mb-2">
                    <span class = "float-end rounded-5 mb-2 text-bg-danger text-white p-2 bg-opacity-25 opacity-10 pe-3"
                        style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                            aria-hidden="true"></i>6.7%</span>
                </span>
            </td>
        </tr>
    </table>


    <div class = "row ms-1 mt-2">
        <div class = "col">

            <label class="form-check-label mt-2" for="flexCheckChecked">
                <span><b>Order</b></span>
                <input class="form-check-input ms-5" type="checkbox" value="" id="flexCheckChecked" checked>
                Today(October 8, 2024)

            </label>
            <label class="form-check-label mt-2 ms-5" for="flexCheckChecked">
                <input class="form-check-input  show" type="checkbox" value="" id="flexCheckChecked" checked>
                Today(October 8, 2024)
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
        <div class="col mb-3">
            <canvas id="parabolaAreaChart" width="1300" height="400"></canvas>
        </div>
    </div>

    <div class = "row ms-1 mt-2 mb-3 border">
        <div>
            <span style = "font-size: 16px;"><strong>Order</strong></span>
            <span class = "float-end  mb-2"><i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
        </div>
    </div>

    <div class = "container-fluid table-responsive">
        <div class = "row">
            <table class="table">
                <thead>
                    <tr class = "table-secondary">
                        <th scope="col">Date</th>
                        <th scope="col">Orders #</th>
                        <th scope="col">Status</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Customer type</th>
                        <th scope="col">Product(s)</th>
                        <th scope="col">Item Sold</th>
                        <th scope="col">Net Sales</th>
                        <th scope="col">Attribution</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>October 8, 2024</td>
                        <td>222222</td>
                        <td>Completed</td>
                        <td>Winner Effiong</td>
                        <td>Returning</td>
                        <td>Daily</td>
                        <td>1</td>
                        <td>#100,000.00</td>
                        <td>Direct</td>
                    </tr>

                    <tr>
                        <td>October 8, 2024</td>
                        <td>222222</td>
                        <td>Completed</td>
                        <td>Winner Effiong</td>
                        <td>Returning</td>
                        <td>Daily</td>
                        <td>1</td>
                        <td>#100,000.00</td>
                        <td>Organic: Google</td>
                    </tr>

                    <tr>
                        <td>October 8, 2024</td>
                        <td>222222</td>
                        <td>Completed</td>
                        <td>Winner Effiong</td>
                        <td>Returning</td>
                        <td>Daily</td>
                        <td>1</td>
                        <td>#100,000.00</td>
                        <td>Direct</td>
                    </tr>

                    <tr>
                        <td>October 8, 2024</td>
                        <td>222222</td>
                        <td>Completed</td>
                        <td>Winner Effiong</td>
                        <td>Returning</td>
                        <td>Daily</td>
                        <td>1</td>
                        <td>#100,000.00</td>
                        <td>Organic:Google</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


<script>
const transactionData = @json($transactionData);

const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

const labels = transactionData.map(data => months[data.month - 1]); // Extract month numbers
const dataValues = transactionData.map(data => data.transaction_count); // Extract transaction counts
 // Monthly sales totals
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
                        stepSize: 10
                    }
                }
            }
        });
    </script>

    <!-- jQuery (necessary for Bootstrap's - 5JavaScript plugins) -->
    <!-- <script type="text/javascript" src="./bootstrap-5/js/bootstrap.js"></script>  -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@endsection
