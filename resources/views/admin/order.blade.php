@extends('layouts.dasboardtemp')

@section('admincontent')
<div class = "container-fluid">
    <div class = "row">
    Date range:

    <div class="dropdown mt-2 mb-3">

    <a class="btn btn-light dropdown-toggle" style = "margin-left:-13px;"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span><strong>Month to date(Sep 1 - 30, 2024)</span></strong><br>
            <span>vs Previous year(Sep 1 - 30, 2023)</span>
        </a>

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Action</a></li>

    </ul>


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
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </td>


                <td>
                    <p class = "m-0 p-0 mt-2">Net Sales</p>
                    <span class = "float-start"><strong>$23, 523</strong></span>
                    <span class = "float-end mb-2">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
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
                    <span class = "float-end rounded-5 mb-2 text-bg-danger text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                  </span>
              </td>


              <td>
                  <p class = "m-0 p-0 mt-2">Average Items Order</p>
                  <span class = "float-start"><strong>1</strong></span>
                  <span class = "float-end mb-2">
                    <span class = "float-end rounded-5 mb-2 text-bg-danger text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                  </span>
              </td>
            </tr>
            </table>


                <div class = "row ms-1 mt-2">
                    <div class = "col">
                            <label class="form-check-label mt-2" for="flexCheckChecked">
                                <span>Order</span>
                            </label>

                            <label>

                            <input class="form-check-input d" type="checkbox" value="" id="flexCheckChecked" checked>
                                Today(October 8, 2024)
                            </label>

                            <label class="form-check-label mt-2 d" for="flexCheckCheckeds">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckeds" checked>
                                    Today(October 8, 2024)
                                </label>

                        <label class = "float-end me-3">
                            <button class="btn btn-light dropdown-toggle mt-1 mb-2  p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                By day
                              </button>
                            <i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i>
</label>
                    </div>
                    </div>





                    <!-- <table class="table table-bordered w-50">
                        <tr>
                            <th>Net Sales</th>
                        </tr>

                        <tr>
                          <td>$20</td>
                          <td>$20</td>
                          </tr>
                          </table>


                          <table class="table table-bordered w-50">
                            <tr>
                                <th>Orders</th>
                            </tr>

                            <tr>
                              <td>$27</td>
                              <td>$18</td>
                              </tr>
                              </table> -->


                              <div class = "row">
                                <div class="col mb-3">
                                    <canvas id="parabolaAreaChart" width="1300" height="200"></canvas>
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
