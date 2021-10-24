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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style type="text/css">
  
/* The sidebar menu */
.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 200px; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color:#0000b3; /* Blue */
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 35px;
}

/* The navigation menu links */
.sidenav a {
  padding: 6px 8px 6px 30px;
  text-decoration: none;
  font-size: 18px;
  color: white;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover, .dropdown-btn:hover {
  color: yellow;
}

/* Style page content */
.main {
  margin-left: 200px; /* Same as the width of the sidebar */
  padding: 0px 0px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.dropdown-btn {
  padding: 6px 8px 6px 30px;
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
  background-color: #1a1aff;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color:black;
  padding-left: 8px;
}

 /* Modify the background color */
 .navbar-custom {
background-color: #e6b800;

}

.navbar {
  color: black;
}

h1{
  font-size: 34px;
}

</style>

  </head>

  <body>

<?php
    include("../connect.php");
    if(isset($_GET['id'])){
      $id=$_GET['id'];


      $sql="SELECT * FROM caps WHERE id='$id'";
      $result=mysqli_query($conn, $sql);

      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){



    } 
  }
}
  
  ?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidenav">
          <div class="d-flex justify-content-center">
          <img src="img/01.png" style="max-width:90px;" alt="">
        </div><br><br>
  <center><h6 style="color: white;"><?php echo $_SESSION['ulvl']; ?></h6></center>
  <hr style="height:2px;color:gray;background-color:gray">

  <a href="user.php">User Management</a>

  <a href="division.php">Division Management</a>

  <button class="dropdown-btn dropdown-toggle">Database
    
  </button>
  <div class="dropdown-container">
    <a class="dropdown-item" href="backup.php">Backup</a>
    <a class="dropdown-item" href="restore.php">Restore</a>
  </div>

  <a data-toggle="modal" href="#logout">Logout</a>
  <a href="#">Help</a>
</div>


<!--invalid cridential-->
                <?php 
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if (strpos($fullUrl, "db_restored") == true){
                  echo "<script>Swal.fire({
                  icon: 'success',
                  title: 'Database successfully restored!',
                  showConfirmButton: true, 
                })</script>";
                }
                ?>
                <!--end of invalid cridential-->




        <!-- Content -->
        <div class="main">

 <nav class="navbar navbar-custom navbar-expand-lg border-bottom" style=" padding: 20px 15px 25px 15px;"> 
    <ul class="navbar-nav">
      <li class="nav-item">
      <h1>Online Gender And Development Monitoring and Mainstreaming System</h1>
      <hr style="height:2px;color:gray;background-color:gray">
      <h2>Department of Education</h2>
      <h3>Regional Office I</h3>
      </li>
    </ul>    
 </nav>

<div class="container-fluid">

 <h2>Welcome <?php echo $_SESSION['ulvl']; ?></h2>
         
  <section>
   
        <div class="row align-items-center">
          <div class="col-lg-5 order-lg-2">
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
     
    </section>

   </div>
   </div>
</div>
 </div>
    <br>
               
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>



<!--Dropdown-->

<script type="text/javascript">
  
  //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}

</script>

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
<input type="submit" name="yes" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-dark btn-md btnlogout">
</center>
</div>
         
       </div>
      </div>
    </div>
    </form>  

  

    


  

 
            


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