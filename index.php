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
 

    if($rowValidate['status'] == "ACTIVE"){

    /* Data use in welcome page */    
    $_SESSION['ulvl'] = $rowValidate['userlevel'];


      }else{    
          unset($_SESSION['ulvl']);
          echo "<script>alert('Inactive User!'); window.location = 'index.php'; </script>";
}

      }else{    
          unset($_SESSION['ulvl']);
          echo "<script>alert('Invalid User!'); window.location = 'index.php'; </script>";         
          
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

  </head>

  <body style="background-color:#0000e6">


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container-fluid">
      <div class="col-lg-20 order-lg-20">
            <div class="p-15">
               <ul class="navbar-brand ml-auto">
                 <li class="nav-item">
               <a class="nav-link"><h3>Online Gender And Development Monitoring and <br> Mainstreaming System</h3></a>
                </li>
               </ul>
            </div>
          </div>
        <a class="navbar-nav"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
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
    <div class="card" style="width: 30rem;">
     <div class="card-body">
      <div class="container-fluid">
        <img src="img/01.png" style="max-width:100px;" alt="">
              <h3>Department of Education</h3><h5>Regional Office I</h5>
      </div>
    <legend><b>Login Form</b></legend>
        <label>Username: &nbsp;</label><input id="username" name="username" type="text"><br><br>
        <label>Password: &nbsp;</label><input id="password" name="password" type="password"><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
        <input name="login" type="submit" value=" Login " class="btn btn-warning"> 
        &nbsp;
        <input name="clear" type="reset" value=" Clear" class="btn btn-warning">
     </div>
    </div>
</center>
  </fieldset>
  </form>
  </div>
<br><br><br><br><br><br><br><br>

<header style="background-color:white;">
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
