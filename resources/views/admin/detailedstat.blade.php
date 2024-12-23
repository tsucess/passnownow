@extends('layouts.dasboardtemp')


@section('admincontent')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Detailed Statistics</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2" id="topButton">
          <a href="/dashboard" class="btn btn-secondary p-1 px-5 shadow">Back</a>
      </div>
  </div>
</div>


    <span class = "float-start mt-2"><strong>Date range:</strong></span><br><br>


    <div class="dropdown">
        {{-- <a class="btn btn-light dropdown-toggle justify-content-between" style = "width: 350px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class = "float-start"><strong>Month to date(Sep 1 - 30, 2024)</span></strong><br>
            <span class = "float-start">vs Previous year(Sep 1 - 30, 2023)</span>
        </a> --}}

        <span class = "float-start me-3">Month to Date:</span> <input type = "date"><br><br>
        <span class = "float-start ms-2 me-3">Previous year:</span> <input type = "date">
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
                <td class = "profit w-50" >
                    <p class = "m-0 p-0 mt-2 "><a class = "text-decoration-none text-dark" href = "{{ url('order') }}">Total Sales</a></p>
                    <span class = "float-start"><a class = "text-decoration-none text-dark" href = "{{ url('order') }}" ><strong>N {{ number_format($totalAmount) }}</strong></a></span>
                    {{-- <span class = "float-end mb-2">
                      <a class = "text-decoration-none text-dark order" href = "{{ url('order') }}">
                      <span class = "float-end rounded-5 mb-2 text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px; background-color: red;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                      </a></span> --}}
                      <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                              style = "font-size: 30px; font-weight:bold; margin-top: -15px;">&#x20A6;
                              {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7% --}}
                          </span>
                </td>


                <td class = "w-50 profit">
                    <p class = "m-0 p-0 mt-2"><a class = "text-decoration-none text-dark profit" href = "{{ url('order') }}">Order</a></p>
                    <span class = "float-start ps-1"><a class = "text-decoration-none text-dark" href = "{{ url('product') }}"><b>{{ $successfulOrders }}</b></a></span>
                          <span class = "float-end rounded-5 mb-2 bg-opacity-25 opacity-10 pe-3"
                        style = "font-size: 30px; font-weight:bold; margin-top: -15px;">
                        <i class="fa-solid fa-receipt"></i>
                        {{-- <i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10"
                        aria-hidden="true"></i>6.7% --}}
                    </span>
                </td>
              </tr>
              </table>




              <table class="table table-bordered">
                </table>


                <div class = "row ms-1 mt-2">
                    <div>
                        <span style = "font-size: 16px;">Charts</span>
                        <span class = "float-end  mb-2">
                            {{-- <button class="btn btn-light dropdown-toggle mb-2 me-1 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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


                              {{-- <div class="d-flex">
                                <table class="table table-bordered w-50">
                                  <tr>
                                    <th><span class = "float-start ms-2"><a class = "text-decoration-none text-dark" href = "{{ url('adtotalsales') }}">Net Sales</a></span></th>
                                  </tr>
                                  <tr>
                                    <td>$20</td>
                                    </tr>
                                    <tr>
                                    <td>$20</td>
                                  </tr>
                                  <tr>
                                    <td>$20</td>
                                  </tr>
                                </table>


                                <table class="table table-bordered w-50 ms-3">
                                  <tr>
                                    <th><span class = "float-start ms-2"><a class = "text-decoration-none text-dark" href = "{{ url('order') }}">Orders</a></span></th>
                                  </tr>
                                  <tr>
                                    <td>$27</td>
                                    </tr>
                                    <tr>
                                    <td>$18</td>
                                  </tr>
                                  <tr>
                                    <td>9</td>
                                  </tr>
                                </table>
                              </div> --}}
                              {{-- <span>$20</span>
                              <span style = "padding-left: 450px;">9</span> --}}


                              <div class = "row">

                                <div class="col-4  w-50">
                                    <canvas id="parabolaAreaChart" width="1300" height="800"></canvas>
                                  </div>

                                  <div class="col-4  w-50">
                                    <canvas id="parabolaAreaCharts" width="1300" height="800"></canvas>
                                  </div>
                            </div>

                            <div class = "row container-fluid mt-3 ms-1">
                            <table class="col table table-bordered w-100 ">

                                <tr>
                                  <td>
                                      <span class = "float-start">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Month to date(Sep 1 - 30, 2024)
                                            </label><br>


                                            <input class="form-check-input" type="checkbox" value="" id="flexChecksChecked" checked>
                                            <label class="form-check-label" for="flexChecksChecked">
                                              Month to date(Sep 1 - 30, 2024)
                                            </label>
                                          </div>
                                        </span>


                                      <span class = "float-end mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              20, 000, 000
                                            </label><br>

                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              20, 000, 000
                                            </label>
                                          </div>
                                      </span>
                                  </td>
                                  </tr>
                                  </table>

<!-- Another table -->
<table class="col ms-5 w-100 table table-bordered">

    <tr>
      <td>
          <span class = "float-start">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  Month to date(Sep 1 - 30, 2024)
                </label><br>


                <input class="form-check-input" type="checkbox" value="" id="flexChecksChecked" checked>
                <label class="form-check-label" for="flexChecksChecked">
                  Month to date(Sep 1 - 30, 2024)
                </label>
              </div>
            </span>


          <span class = "float-end mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  199
                </label><br>

                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  100
                </label>
              </div>
          </span>
      </td>
      </tr>
      </table>


    </div>


    <div class = "row ms-1 mt-2">
        <div>
            <span style = "font-size: 16px;">Leaderboards</span>
            <span class = "float-end  mb-2"><i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
        </div>
        </div>



<div class = "row">
  <div class = "col-sm">
    <table class="table">
        <thead>
          <tr>
            <th colspan="3">Categories</th>
          </tr>
        </thead>

        <tbody>
          <tr class = "table-secondary" >
            <td>Category</td>
            <td>Services Rendered</td>
            <td>Net Sides</td>
          </tr>

          <tr>
            <td class = "text-primary">Resources</td>
            <td>{{$resources}}</td>
            <td>N {{number_format($netResources)}}</td>
          </tr>

          <tr>
            <td class="text-primary">Services</td>
            <td>{{$services}}</td>
            <td>N {{number_format($netServices)}}</td>
          </tr>

        </tbody>

      </table>
      </div>


      <!-- another selling table -->
       <div class = "col-sm mb-5">
      <table class="table">
        <thead>
          <tr>
            <th colspan="3">Services</th>
          </tr>
        </thead>
        <tbody>
          <tr class = "table-secondary">
            <td>Product</td>
            <td>Services Rendered</td>
            <td>Net Sides</td>
          </tr>
          <tr>
            <td class = "text-primary">Daily Plan</td>
            <td>{{$planDaily}}</td>
            <td>N {{number_format($netDaily)}}</td>
          </tr>


          <tr></tr>
            <td class="text-primary">Weekly plan</td>
            <td>{{$planWeekly}}</td>
            <td>N {{number_format($netWeekly)}}</td>
          </tr>


          <tr>
            <td class="text-primary">Monthly plan</td>
            <td>{{$planMonthly}}</td>
            <td>N {{number_format($netMonthly)}} </td>
          </tr>

          <tr></tr>
            <td class="text-primary">3 Months plan</td>
            <td>{{$planQuarterly}}</td>
            <td>N {{number_format($netQuarterly)}} </td>
          </tr>

          <tr></tr>
            <td class="text-primary">Annually plan</td>
            <td>{{$planAnnually}}</td>
            <td>N {{number_format($netYearly)}} </td>
          </tr>
        </tbody>
      </table>
    </div>

</div>

<script>

// Data for the first graph
const dataForFirstGraph = @json($dataForFirstGraph);

const monthss = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        const labels1 = dataForFirstGraph.map(item => monthss[item.month - 1]);
        const data1 = dataForFirstGraph.map(item => item.total_sales);

            const ctx = document.getElementById('parabolaAreaChart').getContext('2d');

const parabolaAreaChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: labels1, // X-axis labels
    datasets: [{
      label: '',
      data: data1, // Y-axis values forming parabolas
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
          display:false
      }
    },
    scales: {
      x: {
          grid: {display: false},
      },
      y: {
        ticks: {display: false},
        beginAtZero: true,
        suggestedMin: 0,
        suggestedMax: 10, // Adjusted Y-axis range for better visibility of parabola shapes
        stepSize: 10
      }
    }
  }
});
</script>




<script>

    const dataForSecondGraph = @json($dataForSecondGraph);

    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        const labels2 = dataForSecondGraph.map(item => months[item.month - 1]);
        const data2 = dataForSecondGraph.map(item => item.count);

        const ctxs = document.getElementById('parabolaAreaCharts').getContext('2d');

        const parabolaAreaCharts = new Chart(ctxs, {
          type: 'line',
          data: {
            labels: labels2, // X-axis labels
            datasets: [{
              label: '',
              data: data2, // Y-axis values forming parabolas
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
                  display:false
              }
            },
            scales: {
              x: {
                  grid: {display: false},
              },
              y: {
                  ticks: {display: false},
                beginAtZero: true,
                suggestedMax: 10,// Adjusted Y-axis range for better visibility of parabola shapes
                suggestedMin: 0,
                stepSize: 10
            }
            }
          }
        });
      </script>
  <!-- jQuery (necessary for Bootstrap's - 5JavaScript plugins) -->
  <!-- <script type = "text/javascript" src="./bootstrap-5/js/bootstrap.js"></script>  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  @endsection

