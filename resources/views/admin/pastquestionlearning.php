
<!DOCTYPE html>
<html>

<head>
  <title>Classes</title>
  
  <link rel="stylesheet" href="dashboard.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!--- bootstrap-5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--- font-awesome --->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
.row::after
{
    display: table;
    content: "";
    clear: both;
}

/* small device  small screen phone */
@media only screen and (min-width: 576px) and (max-width: 768px)
{
[class *= "col-"]
{
width: 100%;
}
}

@media only screen and (max-width: 575px)
{
[class *= "col-"]
{
width: 100%;
}
}

@media only screen and (max-width: 320px)
{
  .mobileFirst
  {
    display: flex;
    flex-direction: column-reverse;
  }
}


</style>

  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 border border-black" >
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="Images/logo.png" width="150px" height="50px" class = "img-fluid myLogo"
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

      <div class="container-fluid">
        <div class="row align-items-start mobileFirst">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4">
            <a href = "#" class = "btn btn-light w-100"><span class = "float-start ps-2"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i>Back</span></a>

            <h5 class = "h5 fw-bold ps-4 mb-3 mt-2">JSCE PAST QUESTION</h5>

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item d-flext justify-content-between w-100">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      <span class = "w-100">2022</span> <span class = "pe-2">20</span>
                      
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <strong>English</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>
                        
                        <strong>Mathematics</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                        <strong>Computer Science</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                        <strong>Home Economics</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <span class = "w-100">2023</span> <span class = "pe-2">20</span>
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <strong>English</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>
                        
                        <strong>Mathematics</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                        <strong>Computer Science</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                        <strong>Home Economics</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <span class = "w-100">2024</span> <span class = "pe-2">20</span>
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <strong>English</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>
                        
                        <strong>Mathematics</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                        <strong>Computer Science</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p>

                        <strong>Home Economics</strong> 
                        <p>Lorem ipsum dolorsit amec consecteur</p> 
                    </div>
                  </div>
                </div>
                <div class="accordion-item"></div>
              </div>

          </div>



          <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 col-8">
            <h6 class = "h6 mb-3 mt-3">English Language</h6>
            <div class="ratio ratio-16x9">

                <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" title = "YouTube video" allowfullscreen></iframe>
                
              </div>
              <p class = "justify-content mt-2">
                Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
                Lorem ipsum dolor sit amet consectetur.Lorem ipsum dolor sit amet consectetur.
            </p>

          </div>

    
       </div>


       <div class = "row justify-content-evenly mt-5">
        <div class="col-4">
            <p>&copy; Copyright Passnownow 2024, All Right Reserved</p>
          </div>
          <div class="col-4">
             <span>
                <a href = "#" class = "pe-3 text-decoration-none text-dark">License</a>
                <a href = "#" class = "pe-3 text-decoration-none text-dark">More Themes</a>
                <a href = "#" class = "pe-3 text-decoration-none text-dark">Documentation</a>
                <a href = "#" class = "pe-3 text-decoration-none text-dark">Support</a>
             </span>
          </div>

       </div>


    </div>


         <!-- jQuery (necessary for Bootstrap's - 5JavaScript plugins) -->
  <!-- <script type = "text/javascript" src="./bootstrap-5/js/bootstrap.js"></script>  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>