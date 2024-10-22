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
                    <a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">
                    <p class = "m-0 p-0 mt-2">Item Sold</p>
                </a>

                    <a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">
                    <span class = "float-start"><strong>2</strong></span>
                    </a>

                    <span class = "float-end mb-2">
                        <a class = "text-decoration-none text-dark profit" href = "{{ url('adtotalsales') }}">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </a>
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



              <a class = "text-decoration-none text-dark profit" href = "{{ url('order') }}">
              <table class="table table-bordered">

                <tr>
                  <td>
                  <a href = "{{ url('/order') }}" class = "text-decoration-none text-black order">
                      <p class = "m-0 p-0 mt-2">Order</p>
                      <span class = "float-start"><strong>18</strong></span>
                      <span class = "float-end mb-2">
                        <span class = "float-end rounded-5 mb-2 text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px; background-color: red;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                      </span>
</a>                  </a>
                  </td>
                </tr>
                </table>
            </a>


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





                              <div class = "row">
                                <div class="col mb-3">
                                    <canvas id="parabolaAreaChart" width="1300" height="200"></canvas>
                                  </div>

                            </div>


                            <div class = "row ms-1 mt-2 mb-3 border">
        <div>
            <span style = "font-size: 16px;"><strong><a class = "text-decoration-none text-dark" href = "{{ url('order') }}">Order</a></strong></span>
            <span class = "float-end  mb-2"><i class="fa fa-ellipsis-v mt-2" aria-hidden="true"></i></span>
        </div>
        </div>



<div class = "container-fluid table-responsive">
<div class = "row">
                            <table class="table">
                              <thead>
                                <tr class = "table-secondary">
                                  <th scope="col">Product Title</th>
                                  <th scope="col">Item Sold</th>
                                  <th scope="col">Net Sides</th>
                                  <th scope="col">Category</th>
                                  <th scope="col">Order</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Monthly Plan</td>
                                  <td>7</td>
                                  <td>#7, 000.00</td>
                                  <td>webpay</td>
                                  <td>7</td>
                                </tr>
                                <tr>
                                  <td>Weekly Plan</td>
                                  <td>5</td>
                                  <td>#7,000.00</td>
                                  <td>Bank Deposit</td>
                                  <td>5</td>
                                </tr>

                                <tr>
                                  <td>Daily Plan</td>
                                  <td>4</td>
                                  <td>7,000.00</td>
                                  <td>Webpay</td>
                                  <td>4</td>
                                </tr>

                                <tr>
                                  <td>3 Months Plan</td>
                                  <td>2</td>
                                  <td>#7,000.00</td>
                                  <td>Bank Deposit</td>
                                  <td>2</td>
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
