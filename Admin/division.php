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


</style>
  </head>

  <body>

<?php
    include("../connect.php");
    if(isset($_GET['id'])){
      $id=$_GET['id'];


      $sql="SELECT * FROM division WHERE id='$id'";
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



<a href="user.php" style="font-size: 15px;">User Management</a>

  <a href="division.php"  class="active" style="font-size: 15px;">Division Management</a>

  <a href="position.php" style="font-size: 15px;">Position Management</a>

  <button class="dropdown-btn dropdown-toggle" style="font-size: 15px;">Database
    
  </button>
  <div class="dropdown-container">
    <a class="dropdown-item" href="backup.php" style="font-size: 15px;">Backup</a>
    <a class="dropdown-item" href="restore.php" style="font-size: 15px;">Restore</a>
  </div>

  <a data-toggle="modal" href="#logout" style="font-size: 15px;">Logout</a>

  <a href="#" style="font-size: 15px;">Help</a>

</div>




        <!-- Content -->
        <div class="main">
<center><h2 style="color: black; background-color: #e6b800;">Division Management</h2></center>

<div class="container-fluid">

   <div class="d-flex justify-content-start"> 
  <a href="admin.php" class="btn rounded-pill" style="background-color: #3366ff; color: white;">Home</a>
</div>
         <section><br>
         <div class="card" style="width: 70rem;">
         <div class="card-body">
              <legend>List of Divisions</legend>
              <div class="d-flex justify-content-end"> 
                <input class="form-control-lg " type="text" id="search" name="search" placeholder="Search">
              </div>
              <div class="d-flex justify-content-start"> 
                <a data-toggle="modal" href="#add" class="btn btn-success rounded-pill">Add Division</a>
              </div>
              <br>
  </div>
      <?php
        include("../connect.php");

        $sql="SELECT * FROM division";
        $result=mysqli_query($conn, $sql);

        echo "<table id='list' class='table table-bordered table-hover'>";
        
          echo "<tr>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; width: 80px;'><h5>ID</h5></th>";           
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'><h5>Division</h5></th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; width: 80px;'><h5>Action</h5></th>";
            
          echo "</tr>";
          echo "<tbody id='usertable'>";

        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            echo "<tr id=".$row['id'] .">";
              echo "<td style='padding: 10px; font-size: 20px;' id='tid'>".$row['id']."</td>";
              echo "<td style='padding: 10px; font-size: 20px;' id='tdivision'>".$row['division']."</td>";
              ?>

              <td><button class="btn btn-warning rounded-pill edit_user"  value="<?php echo $row['id']; ?>">
                  <i class="bi bi-pencil-square">Edit</i>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg>
                </button></td>
              <?php
            echo "</tr>";
          }
        }
        echo "</tbody>";
        echo "</table";
      ?>
    </div>    
    </section>

   </div>
   </div>
</div>
    <br>
  

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>


<!--Search-->
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#usertable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

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

  

    


  

  <!-- Modal Add User-->
<script type = "text/javascript">

  $(document).ready(function(){

$(document).on('click', '#submitButton', function(){

event.preventDefault();
    var validatecont =  $("#adddivision").val();
        if(validatecont == ""){
          $("#adddivision").focus();
        }else{
          $('#save').modal('toggle');
        }
});


    //Add New
    $(document).on('click', '.btncreate', function(){
      
      $adddivision=$('#adddivision').val();
          
        $.ajax({
          type: "POST",
          url: "adddiv.php",
          data: {
            division: $adddivision,
            add: 1,
          },
          success: function(){
            //showUser();
            $("#add").modal('hide');
            $("#save").modal('hide');
            Swal.fire({
                  icon: 'success',
                  title: 'New Division has been saved',
                  showConfirmButton: true, 
                }).then(function (){
                  location.reload()
                  });
          }
        });
      
    });

    //Update
    $(document).on('click', '.update_user', function(){
      $uid=$("#uuid").val();
      $division=$('#division').val(); 
      
        
      //check ta nu maala na values bago ka ag ajaxstatus
      console.log($uid);
      console.log($division);
        $.ajax({
          type: "POST",
          url: "updatediv.php",
          data: {
            id: $uid,
            division: $division,
            
            edit: 1,
          },
          success: function(){
            $("#edit").modal('hide');
            $("#update").modal('hide');
            Swal.fire({
                  icon: 'success',
                  title: 'Division has been updated!',
                  showConfirmButton: true, 
                }).then(function (){
                  location.reload()
                  });
          }
        });
    });

   
    
    $(document).on('click', '.edit_user', function(){
        
        var id = $(this).val();
              
         var division = $('#'+id).children('td[id = tdivision]').text();
        
        console.log(id);
        console.log(division);
        

        
        $("#division").val(division);
        $("#uuid").val(id);

        
        $("#edit").modal('toggle');
      });
  
  });

  
</script>


<!--Add Modal-->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-primary modal-title">Add Division</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <input type="text" name="division" class="form-control disableButton" id="adddivision">
            </div>
        </div>
        
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | 
      <button class="btn btn-primary" id="submitButton">Save</button>
    </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- Save Verification Modal -->
 
<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class = "modal-header">
      <h3 class = "text-danger modal-title"></h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
    </div>
    <div class="modal-body">
    <center>  
<h4>Are you sure you want to save this division?</h4><br>

<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;No&nbsp;&nbsp;</button> |
<input type="submit" name="submit" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-dark btn-md btncreate">
</center>
</div>        
       </div>
      </div>
    </div>
   



 <!-- Edit Modal --> 

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-primary modal-title">Update Division</h3>
      <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>
    <div class="modal-body">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <label>Division:</label>
                  <input type="text" class="form-control" type="text" name="division" id="division">
            </div>
        </div>
        
<div class="modal-footer">
        <input type="hidden" name="id" id="uuid" value="<?php echo $id;?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> |
         <a data-toggle="modal" href="#update" class="btn btn-primary" id="updateButton">Update</a>
    </div>
          
        </div>
      </div>
    </div>     
        </div>
    </div>

        <!-- Update Verification Modal -->
 
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class = "modal-header">
      <h3 class = "text-danger modal-title"></h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
    </div>
    <div class="modal-body">
    <center>  
<h4>Are you sure you want to update this Division?</h4><br>

<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;No&nbsp;&nbsp;</button> |
<input type="submit" name="submit" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-dark btn-md update_user">
</center>
</div>
         
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