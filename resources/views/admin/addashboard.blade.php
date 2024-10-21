<!DOCTYPE html>
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




<div class = "container-fluid ml-5" style = "border-top: 1px solid gray;">
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
</div>





    

   
   
   <div class = "container-fluid col-sm-9" style = "border-left: 1px solid blue;" >
    <div class = "row  justify-content-between ms-2 mt-3 rounded-2" style="background-color: #1A69AF;">

        <div class="col-4 mt-4 mb-3">
            <h1 class = "h1 text-white overflow-hidden">Hello, Winner!</h1>
            <p class = "text-white">Let`s learn something new today</p>

            <br><br>

            <p class = "text-white">Good luck with your studies</p>
        
          </div>

          <div class="col-4 mt-2">
            <img src = "Images/gretting-img.png.png" class = "img-fluid" />
          </div>


    </div>



    <div class ="row mb-3">

        <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary overflow-hidden">
            <span class = "ms-2 mt-3">Total Profit</span><br>
            <span class  = "ms-2 mb-4 fw-bold fs-5 ">$23, 523</span><span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style = "font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
        
            <br><br>

        <span>Monthly goal</span>
        <span class = "float-end">70%</span>
        
        <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
            <div class="progress-bar bg-primary" style="width: 75%"></div>
            </div>
        
        </div>

        

        <div class = "col-sm ms-3 mt-3 mb-2 p-3 border border-primary overflow-hidden">
            <span class = "ms-2 mt-3">Total Administrators</span><br>
            <span class  = "ms-2 mb-4 fw-bold fs-5 ">100</span><span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style = "font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
        
            <br><br>

        <span>Monthly goal</span>
        <span class = "float-end">70%</span>
        
        <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
            <div class="progress-bar bg-primary" style="width: 75%"></div>
            </div>
        
        </div>





        <div class = "col-sm ms-3 mt-3 p-3 mb-2 border border-primary overflow-hidden">
            <span class = "ms-2 mt-3">Total Users</span><br>
            <span class  = "ms-2 mb-4 fw-bold fs-5 ">100</span><span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
        
            <br><br>

        <span>Monthly goal</span>
        <span class = "float-end">70%</span>
        
        <div class="progress mb-3 mt-1" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style = "height: 5px;">
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
               <span>Total Sales</span> <br>
               <span class  = "fw-3 ">$23, 523</span><span class = "float-end rounded-5 mb-2 text-bg-success text-success p-2 bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
   
            </div>
            
            <div class="col-6 border-start border-black border-1 me-5 ms-2 mt-2">
                <span class = "ms-2">Orders</span> <br>
                <span class  = "fw-3 ms-2 ">10</span><span class = "float-end rounded-5 mb-2  me-3 text-bg-success text-success p-2  bg-opacity-25 opacity-10 pe-3" style="font-size: 8px;"><i class="fa fa-arrow-up pe-3 ps-2 bg-opacity-10" aria-hidden="true"></i>6.7%</span>
    
            </div>

          </div>

          <div class = "float-start  mt-2">
            <a href = "admindashboard2.html" class = "float-start mb-1" >View detailed stats</a>
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











<div class="row mt-5">
  <div class="col pt-2">
    &copy;2023 Passnownow 2024, All Rights Reserved.
  </div>
  
  
  <div class="col">


      <button type="button" class="btn btn-link footerLinks">License</button>
      <button type="button" class="btn btn-link footerLinks">More Themes</button>
      <button type="button" class="btn btn-link footerLinks">Documentation</button>
      <button type="button" class="btn btn-link footerLinks">Support</button>


  </div>
</div>


</div>

</div>

   </div>

<!-- </div>







    <div class="container"> -->
  
  

  <!-- jQuery (necessary for Bootstrap's - 5JavaScript plugins) -->
  <!-- <script type = "text/javascript" src="./bootstrap-5/js/bootstrap.js"></script>  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>