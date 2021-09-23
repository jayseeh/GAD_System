<?php session_start(); 

if(empty($_SESSION['ulvl'])){
  echo "<script>window.location = '../index.php';</script>";}

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GAD Monitoring and Mainstreaming System</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">


    <style type="text/css">
  
/* The sidebar menu */
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 200px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color:  #3366ff; /* Black */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover, .dropdown-btn:hover {
  color: black;
}

/* Style page content */
.main {
  margin-left: 200px; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
  border: none;
  background: none;
  width:100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}



/* Add an active class to the active dropdown button */
.active {
  background-color: #999999;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

</style>

  </head>

  <body>

    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidenav border-right">
          <div class="d-flex justify-content-center">
          <img src="imgreg/01.png" style="max-width:100px;" alt="">
        </div><br><br>

  <a href="regional.php">Home</a>

  <a href="#">Approved GPB</a>

  <a href="#">Generate List</a>

  <a data-toggle="modal" href="#logout">Logout</a>
  <a href="#">Help</a>
</div>




        <!-- Content -->
        <div class="main col py-3">

      <div class="container-fluid">
        
                 
                 <nav class="navbar  navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container">          
               <ul class="navbar">
                 <li class="nav-item">
                  <h2>Online Gender And Development Monitoring and Mainstreaming System<br>
                 </h2>
              <h3>Department of Education</h3><h5>Regional Office I</h5>
                </li>
               </ul>     
                   </div>
                </nav>
      </div>
    

<div class="container-fluid">

  <h2>Mandates</h2>

  <div class="d-flex justify-content-center">.
    <form action="uploadmandate.php" method="post">
    <fieldset>


<div class="row">
  <div class="col">
    <div class="card  border-primary mb-3" style="height: 25rem; width: 50rem;">

      <h4  class="card-header">DepEd Mandate</h4 >
  <div class="card-body">

    <div class=" row">
    <label  class="col-sm-3 col-form-label">DepEd Order No.:</label>
    <div class="col-sm-9">
      <input class="form-control form-control-lg" type="text" id="depedno" name="depedno">
    </div>
  </div><br><br>
  <div class=" row">
    <label  class="col-sm-4 col-form-label">DepdEd Order Content:</label>
    <div class="col-sm-12">
      <textarea class="form-control" id="depedcontent" name="depedcontent" rows="3"></textarea>
    </div>
  </div><br>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <input name="clear" type="reset" value=" Clear" class="btn btn-primary">&nbsp;
        <input name="submit" type="submit" value=" Upload " class="btn btn-primary">
      </div>
   
  </div>
    </div>
  </div>
  <!--row-->
</div>

  
  </fieldset>
  </form>
  </div> 






<!--Display mandate-->
<div class="container-fluid">
  <div class="d-flex justify-content-center">

    <div class="card border-primary mb-3" style="width: 60rem;">
  
  <div class="card-body">

     <tr>

                  <?php
                   include("../connect.php");
                   

                   $sql="SELECT * FROM mandate";
                   $result=mysqli_query($conn, $sql);
                       ?>                  
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;"><h4>DepEd Order No.</h4></th>

                                        <th style="padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;"><h4>DepEd Order Content</h4></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                   ?>
                                <tr>                                   
                                    <td><?php echo $row['depedno']; ?></td>

                                    <td><?php echo $row['depedcontent']; ?></td>
                                    
                                    
                                      
                                </tr>
                                <?php } ?>
                                 <?php } ?>
                                </tbody>
                            </table>
                        
           </tr>


    
           </div>
         </div>
       </div>
</div>


   </div><!--Container-->
   </div>
</div>
 </div>


   


     
<!-- Logout Modal -->
 <form class="" action="../logout.php" method="POST">
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class = "modal-header">
      <h3 class = "text-danger modal-title">Logout <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
</svg></h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
    </div>
    <div class="modal-body">
    <center>  
<h4>Are you sure you want to logout?</h4><br>

<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;No&nbsp;&nbsp;</button> |
<input type="submit" name="yes" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-dark btn-md ">
</center>
</div>
         
       </div>
      </div>
    </div>
    </form>


    
<br><br><br><br><br><br><br><br><br><br><br>
  <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small">GAD</p>
      </div>
      <!-- /.container -->
    </footer>


   

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>