<?php 
require('connect.php');

session_start();

if (isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];

  /* Records */
  $queryValidate = "SELECT * FROM caps WHERE username = '$username' AND password = '$password'";
  $sqlValidate = mysqli_query($conn, $queryValidate);
  $rowValidate = mysqli_fetch_array($sqlValidate);

  /* validation of inputted data */
  if(mysqli_num_rows($sqlValidate) > 0){
    $_SESSION['uid'] = $rowValidate['id'];
    $_SESSION['user_password'] = $rowValidate['password'];
    $_SESSION['loc'] = $rowValidate['location'];
    $_SESSION['full_name'] = $rowValidate['firstname']." ".$rowValidate['lastname'];
 

    if($rowValidate['status'] == "ACTIVE"){

    /* Data use in welcome page */    
    $_SESSION['ulvl'] = $rowValidate['userlevel'];


      }else{    
          unset($_SESSION['ulvl']);
          echo "<script>window.location = 'index.php?inactive_credential'; </script>";
}

      }else{    
          unset($_SESSION['ulvl']);
          echo "<script>window.location = 'index.php?invalid_credential'; </script>";         
          
        }
      }
      if(!empty($_SESSION['ulvl'])){
        if($_SESSION['ulvl'] == 'Division GAD Coordinator'){
              echo "<script>window.location = 'Division/division.php';</script>";
          }elseif ($_SESSION['ulvl'] == 'Regional GAD Coordinator') {
            echo "<script>window.location = 'Regional/regional.php';</script>";
          }elseif ($_SESSION['ulvl'] == 'Admin') {
            echo "<script>window.location = 'Admin/admin.php';</script>";
          }
      }
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

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style type="text/css">
  
.form-rounded {
border-radius: 1rem;
}

body{
  background-color:#0000e6
}
header{
background-color:white;
}
.p1{
 
  font-size: 41px;
   
}

</style>

  </head>

  <body>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container-sm">      
               <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
               <p class="p1" style="color: white;">Online Gender And Development Monitoring and Mainstreaming System</p>
                </li>
               </ul>                 
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
            </li>
          </ul>
          <div class="container-sm">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="#about">About Us</a>
            </li>
          </ul>
        </div>
        </div>
      </div>
    </nav><br><br><br><br><br><br><br>




        <div class="container">
          
    <form action="index.php" method="post">
    <fieldset>

<center>
    <div class="card border border-warning" style="width: 28rem;">
     <div class="card-body">
      <div class="container-fluid">
        <img src="img/01.png" style="max-width:100px;" alt="">
              <h3>Department of Education</h3><h5>Regional Office I</h5>
      </div>
        <input class="form-control form-rounded border border-info" id="username" name="username" type="text" placeholder="Username"><br>
        <input class="form-control form-rounded border border-info"id="password" name="password" type="password" placeholder="Password"><br>
        <!--invalid cridential-->
                <?php 
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if (strpos($fullUrl, "invalid_credential") == true){
                  echo "<script>Swal.fire({
                  icon: 'warning',
                  title: 'Invalid User',
                  text: 'Please check your username/password',
                  showConfirmButton: true, 
                })</script>";
                }elseif (strpos($fullUrl, "inactive_credential") == true){
                  echo "<script>Swal.fire({
                  icon: 'warning',
                  title: 'Inactive User',
                  text: 'Your account is deactivated, please contact the admin to activate your account.',
                  showConfirmButton: true, 
                })</script>";
                }
                ?>
                <!--end of invalid cridential-->
        <!--Buttons-->
        <input name="login" type="submit" value=" Login " class="btn btn-warning rounded-pill"> 
        &nbsp;
        <input name="clear" type="reset" value=" Clear" class="btn btn-warning rounded-pill">
     </div>
    </div>
</center>
  </fieldset>
  </form>
  </div>
<br><br><br><br><br><br><br><br>

<header>
     <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img src="img/01.png" style="max-width:400px;" alt="">
            </div>
          </div>
          <div id="about" class="col-lg-6 order-lg-1">
            <div class="p-5">
              <h2 class="display-4">All about region I</h2>
              <p>The Ilocos Region lies on the northwestern coast of Luzon. It is bounded by Cagayan, Kalinga, Apayao, Abra, Mt. Province, Benguet and Nueva Vizcaya on the east; Nueva Ecija, Tarlac and Zambales on the south; and the China Sea on the northwest. Its strategic location has made it the gateway to East Asia.<br>

              Region 1 consists of four (4) provinces and eight (8) cities, namely: the province of Ilocos Norte, Ilocos Sur, La Union and Pangasinan; and the cities of Dagupan, San Carlos, Alaminos and Urdaneta in Pangasinan; Laoag in Ilocos Norte, Vigan and Candon in Ilocos Sur; San Fernando in La Union. The City of San Fernando is the center of the region.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    </header>


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
