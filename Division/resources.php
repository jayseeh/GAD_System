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

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container-fluid">
       <div class="col-lg-20 order-lg-20">
            <div class="p-15">
              <img src="imgdiv/01.png" style="max-width:100px;" alt="">
               <ul class="navbar-brand ml-auto">
                 <li class="nav-item">
                 <h3>Department of Education</h3><h5>Regional Office I</h5>
                </li>
               </ul>
            </div>
          </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
           <div class="container-fluid">
           <div class="p-4">  
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="btn btn-primary" href="#help" style="background-color: #4d4d4d; border: #4d4d4d;" type="button">              
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-question-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                  <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                </svg>
                 <i class="bi bi-question-circle">Help</i>
               </a>
            </li>
          </ul>
        </div>
        </div>
        <div class="container-fluid">
          <ul class="navbar-nav ml-auto">
             <li class="nav-item">
                <input class="form-control-lg me-2" type="text" id="search" name="search" placeholder="Search">
             </li>
          </ul>
        </div>
          <div class="container-fluid">
            <div class="p-4">
           <ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="btn btn-primary" href="division.php" style="background-color: #4d4d4d; border: #4d4d4d;" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-house" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
              </svg>
              <i class="bi bi-house">Home</i>
               </a>
            </li>
          </ul>
        </div>
        </div>             
        </div>
      </div>
    </nav>
    <br><br><br><br><br><br><br>

<?php
        $conn = mysqli_connect('localhost','root','','dbcaps');
        
        ?>


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



<!-- Template Table-->
    <div class="container-fluid">
      <form action="resources.php" method="post" enctype="multipart/form-data">
                        
                  
  <div class="d-flex justify-content-center">

    <div class="card border-primary mb-3" style="width: 60rem;">
  
  <div class="card-body">
    <tr>

                  <?php
                   include("../connect.php");

                   $sql="SELECT * FROM template";
                   $result=mysqli_query($conn, $sql);
                       ?>


                   
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;"><h4>Templates</h4></th>

                                        <th style="padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;"><h4>Date</h4></th>
                                        
                                        <th style="padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;"><h4>Download</h4></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                <?php

                                if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                   ?>
                                <tr>
                                    <td><?php echo $row['filename']; ?></td>

                                    <td><?php echo $row['date_temp']; ?></td>
                                    
                                    <td><a href="../Regional/Templates/<?php echo $row['filename']; ?>" download>Download</a></td>
                                      
                                </tr>
                                <?php } ?>
                                 <?php } ?>
                                </tbody>
                            </table>
                        

                   

           </tr>
           </div>
         </div>
       </div>
         </form>
</div>

<!--Search-->
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#temp_table tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

    
    

  
<section>
      <div class="container">
        <div class="d-flex justify-content-center">
          
          <div id="help" class="col-lg-6 order-lg-1">
            <div class="p-7">
              <h2 class="display-4">Help</h2>
              <p> ( this include the user manuals.how to do all the processes.assign to that user level)</p>
            </div>
          </div>
        </div>
      </div>
    </section>

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