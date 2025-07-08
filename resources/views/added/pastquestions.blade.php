<!DOCTYPE html>
<html>

<head>
  <title>Administrator</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}" />


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!--- bootstrap-5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--- font-awesome --->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 border border-1 border-black">
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




<!-- Main for Class Note -->
<div class = "container-fluid mb-3">
    <div class = "row align-items-start">

    <!-- <div class="col-xs-12 col-sm-3 col-md-4 col-lg-2 col-xl-2 h-100 text-md-start mt-1 border-end border-1 border-primary"> -->
      <div class="col-xs-12 col-sm-3 col-md-4 col-lg-2 col-xl-2 h-auto text-md-start mt-1 align-items-center">
      <nav class="nav flex-column">
        <a class="nav-link" href="#" style = "color: #000;">
          <i class="fa fa-th-large me-3"></i> Dashboard
        </a>

        <a class="nav-link b text-bg-primary" style = "color: #000;" href="#">
          <i class="fa fa-user me-3"></i> Admin
        </a>

        <a class="nav-link b" href="#" style = "color: #000;">
            <i class="fa fa-user-circle me-3"></i> Users
          </a>

          <a class="nav-link b" href="#" style = "color: #000;">
          <i class="fa fa-calendar me-3"></i> Class
        </a>

        <a class="nav-link b" href="#" style = "color: #000;">
            <i class="fa fa-book me-3"></i> Subject
          </a>

        <a class="nav-link b" href="#" style = "color: #000;">
          <i class="fa fa-newspaper me-3"></i> Upload Past Questions
        </a>

        <a class="nav-link" href="#" style = "color: #000;">
          <i class="fa fa-headphones me-3"></i> Subscription
        </a>

        <a class="nav-link" href="#" style = "color: #000;">
            <i class="fa fa-history me-3"></i> History
          </a>

      </nav>
    </div>



<div class = "col-sm-9 h-100 mx-1 border-start border-1 border-primary">

<!-- <h4 class = "h4 w-100  pb-3 float-start fs-3 fw-bold mb-3" style = "font-family: Montserrat; font-weight: bold; display: inline;">Administrator</h4>
<button type="button" class="btn btn-outline-primary">Add Admin</button> -->

<div class="row border-1 border-bottom border-black pb-3 mx-1 ">
  <div class="col">
    <h4 class="h4 fs-3 fw-bold mb-0" style="font-family: Montserrat; font-weight: bold;">Past Questions</h4>
  </div>
  <div class="col">
  <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">
    Upload Past Question
  </button>

<!-- The modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scollable">
      <div class="modal-content">

   <!-- Modal body -->
   <div class="modal-body">

    <div class = "container">
      <form action="#">

          <div class = "mb-3 mt-3">
            Past Question Title
          <select class="form-select" aria-label="Default select example">
            <option selected>SSCE PAST QUESTION</option>
            <option value="JSS2">JSCE PAST QUESTION</option>
            <option value="JSS3">JAMB PAST QUESTION</option>
          </select>
        </div>

        <div class = "mb-3 mt-3">
            Past Question Title
          <select class="form-select" aria-label="Default select example">
            <option selected>ENGLISH LANGUAGE</option>
            <option value="mathematics">MATHEMATICS</option>
            <option value="computer">COMPUTER SCIENCE</option>
          </select>
        </div>


        <div class = "mb-3 mt-3">
            Past Question Year
          <select class="form-select" aria-label="Default select example">
            <option selected>2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
          </select>
        </div>


        <div class="mb-3 mt-3">
            <label for="url" class="form-label">URL</label>
            <input type="url" class="form-control" id="url" placeholder="https://passnownow.com" name="url">
          </div>


            <div class = "d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary">Upload</button>
          </div>

      </form>
  </div>
  </div>

</div>
</div>
</div>










  </div>
</div>

<div class = "row justify-content-evenly">

  <div class="col-6">
    <span>
      <span>Section</span>
      <select class="form-select form-select-md mt-2" aria-label=".form-select-md example" style="display: inline; width: 20px;">
      <option value="10">25</option>
      <option value="25">50</option>
      <option value="50">100</option>
    </select>
  </span>
  <span class = "mx-3">entries</span>

  </div>

  <div class="col-6 text-md-end mt-2">
    <input type="search" class="form-control" placeholder="Search" aria-label="Search..." aria-describedby="searchIcon">
  </div>

</div>


<div class="table-responsive w-100 small float-start mt-2">
  <table class="table">
    <thead>
      <tr>

        <th scope = "col" class="position-relative pe-4">
         S/N
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>

        </th>

        <th scope = "col" class="position-relative">
          Subject
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
        </th>

        <th scope="col" class="position-relative">
          Year
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
        </th>

        <th scope="col" class="position-relative pe-5">
          Url
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
        </th>

        <th scope="col" class="position-relative">
          Date
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
        </th>

        <th scope="col" class="position-relative pe-4">
          Action
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i>
        </th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>

        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

      <tr>
        <td>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                1
            </div>
        </td>
        <td>English</td>
        <td>2024</td>
        <td>majorsignature</td>
        <td>25-9-2024</td>
        <td>
            <div class="form-check form-switch ps-5">
                <input class="form-check-input" type="checkbox" id="mySwitch" value="yes" checked>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </div>
        </td>
      </tr>

    </tbody>
  </table>
</div>

<div class = "row justify-content-evenly">
<div class = "col-6">
  Showing 1 to 10 entries
</div>

<div class = "col-6">
  <nav aria-label="..." >
    <ul class="pagination float-end rounded-5">
      <li class="page-item text-bg-secondary" style="opacity: 0.6;">
        <a class="page-link text-bg-secondary" style="opacity: 0.6;">Previous</a>
      </li>
      <li class="page-item active" aria-current="page">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item text-bg-secondary" style="opacity: 0.6;">
        <a class="page-link text-bg-secondary" href="#" style="opacity: 0.6;">Next</a>
      </li>
    </ul>
  </nav>
</div>

</div>


        <!-- <div class="container">
            <p class="d-flex justify-content-between align-items-center ps-5">
              &copy; Copyright Passnownow 2024, All Rights Reserved
              <span class="d-flex justify-content-center align-items-center pe-5">
                <a href="#" class="text-dark text-decoration-none me-3">License</a>
                <a href="#" class="text-dark text-decoration-none me-3">More Themes</a>
                <a href="#" class="text-dark text-decoration-none me-3">Documentation</a>
                <a href="#" class="text-dark text-decoration-none">Support</a>
              </span>
            </p>
          </div> -->


          <!-- <div class="container">
            <p class="d-flex justify-content-between align-items-center ps-5">
              &copy; Copyright Passnownow 2024, All Rights Reserved
              <span class="d-flex justify-content-center align-items-center pe-5">
                <a href="#" class="text-dark text-decoration-none me-3">License</a>
                <a href="#" class="text-dark text-decoration-none me-3">More Themes</a>
                <a href="#" class="text-dark text-decoration-none me-3">Documentation</a>
                <a href="#" class="text-dark text-decoration-none">Support</a>
              </span>
            </p>
          </div> -->



          <div class="container row justify-content-evenly mx-2">
            <div class="col-6 align-items-center">
              &copy; Copyright Passnownow 2024, All Rights Reserved
            </div>
            <div class="col-6 ">
              <a href="#" class="text-dark text-decoration-none">License</a>
              <a href="#" class="text-dark text-decoration-none">More Themes</a>
              <a href="#" class="text-dark text-decoration-none">Documentation</a>
              <a href="#" class="text-dark text-decoration-none">Support</a>
            </div>
          </div>


    </div>
    </div>


    </div>
    </body>

    </html>
