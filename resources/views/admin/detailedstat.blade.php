@extends('layouts.dasboardtemp')

@section('admincontent')


    <span class = "float-start mt-2">Date range:</span><br><br>


    <div class="dropdown">
        <a class="btn btn-light dropdown-toggle justify-content-between" style = "width: 350px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class = "float-start"><strong>Month to date(Sep 1 - 30, 2024)</span></strong><br>
            <span class = "float-start">vs Previous year(Sep 1 - 30, 2023)</span>
        </a>

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
                <td>
                    <p class = "m-0 p-0 mt-2"><a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">Total Sales</a></p>
                    <span class = "float-start profit"><strong>$23,523</strong></span>
                    <span class = "float-end mb-2">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </td>


                <td>
                    <p class = "m-0 p-0 mt-2" ><a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">Total Sales</a></p>
                    <span class = "float-start profit"><strong>$23,523</strong></span>
                    <span class = "float-end mb-2 profit">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </td>
              </tr>
              </table>




              <table class="table table-bordered">

                <tr>
                  <td>
                      <p class = "m-0 p-0 mt-2" ><a class = "text-decoration-none text-dark order" href = "{{ url('order') }}">Order</a></p>
                      <span class = "float-start"><strong><a class = "text-decoration-none text-dark order" href = "{{ url('order') }}">18</a></strong></span>
                      <span class = "float-end mb-2">
                        <a class = "text-decoration-none text-dark order" href = "{{ url('order') }}">
                        <span class = "float-end rounded-5 mb-2 text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px; background-color: red;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                        </a>
                    </span>
                  </td>


                  <td>
                      <p class = "m-0 p-0 mt-2"><a class = "text-decoration-none text-dark product" href = "{{ url('product') }}">Product Sold</a></p>
                      <span class = "float-start"><strong><a class = "text-decoration-none text-dark order" href = "{{ url('product') }}">18</a></strong></span>
                      <span class = "float-end mb-2">
                        <a class = "text-decoration-none text-dark order" href = "{{ url('product') }}">
                        <span class = "float-end rounded-5 mb-2 text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px; background-color: red;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                        </a>
                    </span>
                  </td>
                </tr>
                </table>


                <div class = "row ms-1 mt-2">
                    <div>
                        <span style = "font-size: 16px;">Charts</span>
                        <span class = "float-end  mb-2">
                            <button class="btn btn-light dropdown-toggle mb-2 me-1 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                By day
                              </button>
                            <i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
                    </div>
                    </div>


                              <div class="d-flex">
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
                              </div>
                              {{-- <span>$20</span>
                              <span style = "padding-left: 450px;">9</span> --}}


                              <div class = "row">

                                <div class="col-4  w-50">
                                    <canvas id="parabolaAreaChart" width="1300" height="200"></canvas>
                                  </div>

                                  <div class="col-4  w-50">
                                    <canvas id="parabolaAreaCharts" width="1300" height="200"></canvas>
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
            <th colspan="3">Top categories - Item sold</th>
          </tr>
        </thead>

        <tbody>
          <tr class = "table-secondary" >
            <td>Category</td>
            <td>Item sold</td>
            <td>Net Sides</td>
          </tr>

          <tr>
            <td class = "text-primary">webpay</td>
            <td>100</td>
            <td>#100,000.00</td>
          </tr>

          <tr>
            <td class="text-primary">Bank deposit</td>
            <td>200</td>
            <td>#100,000.00</td>
          </tr>

        </tbody>

      </table>
      </div>


      <!-- another selling table -->
       <div class = "col-sm mb-5">
      <table class="table">
        <thead>
          <tr>
            <th colspan="3">Top products - Items sold</th>
          </tr>
        </thead>
        <tbody>
          <tr class = "table-secondary">
            <td>Product</td>
            <td>Item sold</td>
            <td>Net Sides</td>
          </tr>
          <tr>
            <td class = "text-primary">Daily Plan</td>
            <td>100</td>
            <td>#100,000.00</td>
          </tr>

          <tr>
            <td class="text-primary">Monthly plan</td>
            <td>200</td>
            <td>#100,000.00</td>
          </tr>

          <tr></tr>
            <td class="text-primary">Weekly plan</td>
            <td>200</td>
            <td>#100,000.00</td>
          </tr>

          <tr></tr>
            <td class="text-primary">3 Months plan</td>
            <td>200</td>
            <td>#100,000.00</td>
          </tr>

          <tr></tr>
            <td class="text-primary">Annually plan</td>
            <td>200</td>
            <td>#100,000.00</td>
          </tr>
        </tbody>
      </table>
    </div>

</div>


    <script>
        const ctx = document.getElementById('parabolaAreaChart').getContext('2d');

        const parabolaAreaChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], // X-axis labels
            datasets: [{
              label: '',
              data: [0, 3, 2, 5, 3, 4, 5, 2, 2, 5, 5, 4, 0], // Y-axis values forming parabolas
              borderColor: '#1699dd',
              backgroundColor: '#1699dd',
              fill: true,
              tension: 0.8 // Smooth curve
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
                suggestedMax: 10 // Adjusted Y-axis range for better visibility of parabola shapes
              }
            }
          }
        });
      </script>

      <!-- Another chart -->
      <script>
        const ctxs = document.getElementById('parabolaAreaCharts').getContext('2d');

        const parabolaAreaCharts = new Chart(ctxs, {
          type: 'line',
          data: {
            labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], // X-axis labels
            datasets: [{
              label: '',
              data: [0, 3, 2, 5, 3, 4, 5, 2, 2, 5, 5, 4, 0], // Y-axis values forming parabolas
              borderColor: '#1699dd',
              backgroundColor: '#1699dd',
              fill: true,
              tension: 0.8 // Smooth curve
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
                suggestedMax: 10 // Adjusted Y-axis range for better visibility of parabola shapes
              }
            }
          }
        });
      </script>
  <!-- jQuery (necessary for Bootstrap's - 5JavaScript plugins) -->
  <!-- <script type = "text/javascript" src="./bootstrap-5/js/bootstrap.js"></script>  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  @endsection

