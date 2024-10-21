@extends('layouts.dasboardtemp')

@section('admincontent')

{{-- <!DOCTYPE html>
<html>

<head>
  <title>Subjects</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!--- bootstrap-5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--- font-awesome --->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



  <style>
    @media (max-width: 576px) {
    body
    {
      margin: 0;
      padding: 0;
    }
  }
    * {
      border-collapse: border-box;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    #header {
      width: 100%;
      height: 70px;
    }

    #links {
      padding-left: 400px;
      padding-top: 20px;
    }

    #links li {
      padding-left: 15px;
      list-style-type: none;
      display: inline;
    }

    #links a {
      text-decoration: none;
      font-size: 20px;
      color: #000;
    }

    #section1 {
      width: 100%;
      height: 150px;
    }

    h3 {
      font-size: 14px;
      padding-left: 490px;
    }



    .heading-text {
      /* Additional custom styling if needed */
      color: #000;
      /* Adjust text color if needed */
    }


@media(max-width: 900px)
{
.myLogo
{
width: 120px;
height: 80px;
}
}

.footerLinks
{
    text-decoration: none;
    color: gray;
}

.jss
{
    color:#1A69AF;

}

.active, .b
{
  color: black;
}
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary" style="border-top: 1px solid gray; border-left: 1px solid gray; border-right: 1px solid gray;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="Images/logo.png" width="150px" height="50px" class = "myLogo"
          style="padding-left:30px; padding-top:3px; float: left;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">

        <div class="input-group mt-2 w-100 offset-md-3">
            <input type="search" class="form-control" placeholder="Search" aria-label="Search..." aria-describedby="searchIcon">
          </div>


          <div class = "container text-md-end">
            <span><img src="Images/imagenotification.png" width = "50px" height = "30px" /></span>
            <span><img src="Images/global.png" width = "50px" height = "40px" /></span>
            <span style = "border: 1px solid gray; border-radius: 10px; margin-top: 20px; padding: 6px; line-height: 2px;  justify-content: center; align-items: center;"><i class="fa fa-user-circle" aria-hidden="true"></i> <i class="fas fa-caret-down"></i></span>

        </div>



        </div>
    </div>
  </nav>




<div class = "container-fluid mb-3 ml-5" style = "border-top: 1px solid gray;">
<div class = "row">


<div class="col-sm-3 col-md-4 col-lg-2 col-xl-2 h-100 text-md-start mt-3">
  <nav class="nav flex-column">
    <a class="nav-link active" href="#">
      <i class="fa fa-th-large me-3"></i> Dashboard
    </a>
    <a class="nav-link active" href="#">
    <i class="fa fa-user-md me-3 ms-1" aria-hidden="true"></i>Admin
    </a>
    <a class="nav-link b" href="#">
      <i class="fa fa-user me-3"></i> Users
    </a>
    <a class="nav-link b" href="#">
      <i class="fa fa-calendar me-3"></i> Class
    </a>
    <a class="nav-link b" href="#">
    <i class="fa fa-book me-4" aria-hidden="true"></i>Subjects
    </a>
    <a class="nav-link b" href="#">
      <i class="fa fa-newspaper me-3"></i>Upload Past Questions
    </a>
    <a class="nav-link b" href="#">
      <i class="fa fa-headphones me-3"></i> Subscription
    </a>
    <a class="nav-link b" href="#">
        <i class="fa fa-history me-3"></i> History
      </a>
  </nav>
</div> --}}








@section('admincontent')
   {{-- <div class = "container-fluid col-sm-9" style = "border-left: 1px solid blue;" > --}}
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
                    <p class = "m-0 p-0 mt-2">Total Sales</p>
                    <span class = "float-start"><strong>$23,523</strong></span>
                    <span class = "float-end mb-2">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </td>


                <td>
                    <p class = "m-0 p-0 mt-2">Total Sales</p>
                    <span class = "float-start"><strong>$23,523</strong></span>
                    <span class = "float-end mb-2">
                      <span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                    </span>
                </td>
              </tr>
              </table>




              <table class="table table-bordered">

                <tr>
                  <td>
                      <p class = "m-0 p-0 mt-2">Order</p>
                      <span class = "float-start"><strong>18</strong></span>
                      <span class = "float-end mb-2">
                        <span class = "float-end rounded-5 mb-2 text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px; background-color: red;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
                      </span>
                  </td>


                  <td>
                      <p class = "m-0 p-0 mt-2">Product Sold</p>
                      <span class = "float-start"><strong>18</strong></span>
                      <span class = "float-end mb-2">
                        <span class = "float-end rounded-5 mb-2 text-white p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px; background-color: red;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
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


                              <div class="d-flex">
                                <table class="table table-bordered w-50">
                                  <tr>
                                    <th><span class = "float-start ms-2">Net Sales</span></th>
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
                                    <th><span class = "float-start ms-2">Orders</span></th>
                                  </tr>
                                  <tr>
                                    <td>$27</td>
                                    </tr>
                                    <tr>
                                    <td>$18</td>
                                  </tr>
                                </table>
                              </div>
                              <span>$20</span>
                              <span style = "padding-left: 450px;">9</span>


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


{{-- <div class="container mt-5">
  <div class="row">
    <div class="col pt-2">
      &copy;2023 Passnownow 2024, All Rights Reserved.
    </div>


    <div class="col text-center text-md-end">


        <button type="button" class="btn btn-link footerLinks">License</button>
        <button type="button" class="btn btn-link footerLinks">More Themes</button>
        <button type="button" class="btn btn-link footerLinks">Documentation</button>
        <button type="button" class="btn btn-link footerLinks">Support</button>


    </div>

  </div>
</div> --}}



{{-- </div>























</div>

   </div> --}}


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

