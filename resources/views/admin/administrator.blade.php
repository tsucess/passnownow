<!DOCTYPE html>
<html>

<head>
  <title>Administrator</title>
  

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
    <h4 class="h4 fs-3 fw-bold mb-0" style="font-family: Montserrat; font-weight: bold;">Administrator</h4>
  </div>
  <div class="col">
  <button type="button" class="btn btn-outline-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">
    Add Admin
  </button>
    
<!-- The modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-scollable">
      <div class="modal-content">


   <!-- Modal body -->
   <div class="modal-body">

    <div class = "container">
      <form action="#">
          <div class="mb-3 mt-3">
            <label for="firstName" class="form-label">Enter First Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="Winner" name="firstname">
          </div>
  
  
          <div class="mb-3 mt-3">
              <label for="LastName" class="form-label">Enter Last Name</label>
              <input type="text" class="form-control" id="LastName" placeholder="Effiong Duff" name="lastname">
            </div>
  
            <div class="mb-3 mt-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" placeholder="MajorSignature" name="username">
            </div>
  
            <div class = "mb-3 mt-3">
              Role
            <select class="form-select" aria-label="Default select example">
              <option selected>Admin</option>
              <option value="user">user</option>
              <option value="member">member</option>
              <option value="subscriber">subscriber</option>
            </select>
          </div>
  
            <div class="mb-3 mt-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="*******" name="password">
            </div>
  
            <div class="mb-3 mt-3">
              <label for="cpassword" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="cpassword" placeholder="*******" name="cpassword">
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
          Name 
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i> 
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i> 
        </th>
        
        <th scope="col" class="position-relative">
          Email
          <i class="fa fa-sort-asc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i> 
          <i class="fa fa-sort-desc position-absolute top-50 end-0 translate-middle" aria-hidden="true"></i> 
        </th>

        <th scope="col" class="position-relative pe-5">
          Username 
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

      <tr>
        <td>3</td>
        <td>Winner Effiong Duff</td>
        <td>rich</td>
        <td>dashboard</td>
        <td>tabular</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
      </tr>

      <tr>
        <td>4</td>
        <td>information</td>
        <td>placeholder</td>
        <td>illustrative</td>
        <td>data</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
      </tr>

      <tr>
        <td>5</td>
        <td>text</td>
        <td>random</td>
        <td>layout</td>
        <td>dashboard</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
      </tr>

      <tr>
        <td>6</td>
        <td>dashboard</td>
        <td>irrelevant</td>
        <td>text</td>
        <td>placeholder</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
      </tr>

      <tr>
        <td>7</td>
        <td>dashboard</td>
        <td>illustrative</td>
        <td>rich</td>
        <td>data</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
      </tr>

      <tr>
        <td>8</td>
        <td>placeholder</td>
        <td>tabular</td>
        <td>information</td>
        <td>irrelevant</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
      </tr>

      <tr>
        <td>9</td>
        <td>random</td>
        <td>data</td>
        <td>placeholder</td>
        <td>text</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
      </tr>

      <tr>
        <td>10</td>
        <td>placeholder</td>
        <td>irrelevant</td>
        <td>visual</td>
        <td>layout</td>
        <td><i class="fa fa-ellipsis-v" aria-hidden="true"></i></td>
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