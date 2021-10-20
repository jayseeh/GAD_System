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


  <a href="user.php" class="active">User Management</a>

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




        <!-- Content -->
        <div class="main">
<center><h2 style="color: black; background-color: #e6b800;">User Management</h2></center>

<div class="container-fluid">
  <a href="admin.php" class="btn rounded-pill" style="background-color: #3366ff; color: white;">Home</a>
</div>
         <section><br>
        <div class="row">
        <div class="col">
         <div class="card" style="width: 73rem;">
          <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true">List of Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deactuser.php">Deactivated Users</a>
      </li>
    </ul>
  </div>
         <div class="card-body">
              <div class="d-flex justify-content-end"> 
                <input class="form-control-lg " type="text" id="search" name="search" placeholder="Search">
              </div>
              <div class="d-flex justify-content-start"> 
                <a data-toggle="modal" href="#add" class="btn btn-success rounded-pill addUserButton">Add User</a>
              </div>             
              <br>

      <?php
        include("../connect.php");

        $sql="SELECT * FROM caps WHERE userlevel != 'Admin' and status='ACTIVE'";
        $result=mysqli_query($conn, $sql);

        echo "<table id='list' class='table table-hover'>";
        
          echo "<tr>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>ID</th>";           
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Username</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Password</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Lastname</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Firstname</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Middlename</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Userlevel</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Location</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Status</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Action</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>STATUS</th>";
                       
          echo "</tr>";
          echo "<tbody id='usertable'>";

        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            echo "<tr id=".$row['id'] .">";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tid'>".$row['id']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tusername'>".$row['username']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tpassword'>".$row['password']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tlastname'>".$row['lastname']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tfirstname'>".$row['firstname']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tmiddlename'>".$row['middlename']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tuserlevel'>".$row['userlevel']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tlocation'>".$row['location']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tstatus'>".$row['status']."</td>";?>

              <td><button class="btn btn-primary rounded-pill edit_user"  value="<?php echo $row['id']; ?>">
                  <i class="bi bi-pencil-square">Edit</i>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></button>
                
            </td>
            <td><button class="btn btn-primary edit_status"  value="<?php echo $row['id']; ?>">
                  <i class="bi bi-pencil-square">
                    <?php 
                      if ($row['status']=='ACTIVE'){
                        echo "Deactivate";      
                      }else {
                        echo "Activate";
                      }
                    ?>
                  
                  </i>
                  </button>
                
            </td>
              <?php
            echo "</tr>";
          }
        }
        echo "</tbody>";
        echo "</table";
      ?>
      </div>
      </div>
      </div>
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
    //Add New
    $(document).on('click', '.btncreate', function(){
      if ($('#addusername').val()=="" || $('#addpassword').val()=="" || $('#addlastname').val()=="" || $('#addfirstname').val()=="" || $('#addmiddlename').val()=="" || $('#adduserlevel').val()=="" || $('#addlocation').val()==""){
        alert('Please input data first');
         return false;
      }
      else{
      $addusername=$('#addusername').val();
      $addpassword=$('#addpassword').val();
      $addlastname=$('#addlastname').val();
      $addfirstname=$('#addfirstname').val();
      $addmiddlename=$('#addmiddlename').val();
      $adduserlevel=$('#adduserlevel').val();
      $addlocation=$('#addlocation').val();
      $addstatus=$('#addstatus').val();        
        $.ajax({
          type: "POST",
          url: "",
          data: {
            username: $addusername,
            password: $addpassword,
            lastname: $addlastname,
            firstname: $addfirstname,
            middlename: $addmiddlename,
            userlevel: $adduserlevel,
            location: $addlocation,
            status: $addstatus,
            add: 1,
          },
          success: function(){
            //showUser();
            $('#add').modal('hide');
            alert("User information successfully saved");
            window.location = "user.php";
          }
        });
      }
    });

    //Update
    $(document).on('click', '.update_user', function(){
      $uid=$("#uuid").val();
      $username=$('#username').val(); 
      $password=$('#password').val();
      $lastname=$('#lastname').val();
      $firstname=$('#firstname').val();
      $middlename=$('#middlename').val();
      $userlevel=$('#userlevel').val();
      $location=$('#location').val();
      $status=$('#status').val();
        
      //check ta nu maala na values bago ka ag ajaxstatus
      console.log($uid);
      console.log($username);
        $.ajax({
          type: "POST",
          url: "",
          data: {
            id: $uid,
            username: $username,
            password: $password,
            lastname: $lastname,
            firstname: $firstname,
            middlename: $middlename,
            userlevel: $userlevel,
            location: $location,
            status: $status,
            edit: 1,
          },
          success: function(){
            alert("User information successfully updated");
            window.location = "user.php";
          }
        });
    });

   
    
    $(document).on('click', '.edit_user', function(){
        
        var id = $(this).val();
        
        
         var username = $('#'+id).children('td[id = tusername]').text();
         var password = $('#'+id).children('td[id = tpassword]').text();
         var lastname = $('#'+id).children('td[id = tlastname]').text();
         var firstname = $('#'+id).children('td[id = tfirstname]').text();
         var middlename = $('#'+id).children('td[id = tmiddlename]').text();
         var userlevel = $('#'+id).children('td[id = tuserlevel]').text();
         var location = $('#'+id).children('td[id = tlocation]').text();
         var status = $('#'+id).children('td[id = tstatus]').text();

        console.log(id);
        console.log(username);
        console.log(userlevel);

        
        $("#username").val(username);
        $("#password").val(password);
        $("#lastname").val(lastname);
        $("#firstname").val(firstname);
        $("#middlename").val(middlename);
        $("#userlevel").val(userlevel);
        //$("#location").val(location);
        $("#status").val(status);
        $("#uuid").val(id);
        var lvlselected = $('#userlevel').val();
        if (lvlselected == "Regional GAD Coordinator") {
          $('#location').html('<option>Region 1</option>');
        }else if(lvlselected == "Division GAD Coordinator"){
          
          $.ajax({
                type: "POST",
                url: "locationoption.php",
                data: {
                  lvlselected: lvlselected
                },
                success: function(data){
                  $('#location').html(data);
                }
              });
          
          
        }else{
          $('#location').html('<option></option>');
        }

        
        $("#edit").modal('toggle');
      });
  
  });


   //EDIT STATUS OF THE USER
   $(document).on('click', '.edit_status', function(){
        
        var id = $(this).val();
        console.log(status);
        $("#uuid1").val(id);
        var status1 = $('#'+id).children('td[id = tstatus]').text();
        $("#status1").val(status1);
        if(status1=='ACTIVE'){
          $("#label_status").html("Are you sure you want to deactivate this account?");
          $("#submit_status").val("DEACTIVATE");
        }else{
          $("#label_status").html("Are you sure you want to activate this account?");
          $("#submit_status").val("ACTIVATE");
        }
        $("#editstatus").modal('toggle');
   });

</script>

<!--Add Modal-->
<form class="" action="create.php" method="POST">
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-primary modal-title">Add User</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <input type="text" name="username" class="form-control disableButton" id="addusername" placeholder="Username" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control disableButton" id="addpassword" placeholder="Password" required>
            </div>
        </div>
         <div class="form-group">
            <div class="col-sm-9">
              <input type="text" name="lastname" class="form-control disableButton" id="addlastname" placeholder="Lastname" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <input type="text" name="firstname" class="form-control disableButton" id="addfirstname" placeholder="Firstname" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <input type="text" name="middlename" class="form-control disableButton" id="addmiddlename" placeholder="Middlename" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Userlevel:</label>
            <div class="col-sm-9">
              <select class="form-control disableButton" name="userlevel" id="adduserlevel" required>
                <option value=""></option>
                <option value="Regional GAD Coordinator">Regional GAD Coordinator</option>
                <option value="Division GAD Coordinator">Division GAD Coordinator</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Location:</label>
            <div class="col-sm-9">
              <select class="form-control disableButton" name="location" id="addlocation" required>   
              </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <input type="hidden" name="status" class="form-control" id="addstatus" value="ACTIVE" readonly>
            </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | 
      <a data-toggle="modal" href="#save" class="btn btn-dark" id="submitButton">Save</a>

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
<h4>Are you sure you want to save this user?</h4><br>

<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;No&nbsp;&nbsp;</button> |
<input type="submit" name="submit" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-primary btn-md btncreate">
</center>
</div>        
       </div>
      </div>
    </div>
   </form>



 <!-- Edit Modal --> 
<form class="" action="update.php" method="POST">
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-primary modal-title">Update User</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>
    <div class="modal-body">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <label>Username:</label>
                  <input type="text" class="form-control disableButton" type="text" name="username" id="username" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Password:</label>
                  <input type="text" class="form-control disableButton" type="password" name="password" id="password"> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Lastname:</label>
                <input type="text" class="form-control disableButton" type="text" name="lastname" id="lastname"> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Firstname:</label>
                <input type="text" class="form-control disableButton" type="text" name="firstname" id="firstname">  
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Middlename:</label>
                <input type="text" class="form-control disableButton" type="text" name="middlename" id="middlename">   
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Userlevel:</label>
            <div class="col-sm-9">
              <select class="form-control disableButton" name="userlevel" id="userlevel">
                <option value="Regional GAD Coordinator">Regional GAD Coordinator</option>
                <option value="Division GAD Coordinator">Division GAD Coordinator</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Location:</label>
            <div class="col-sm-9">
              <select class="form-control disableButton" name="location" id="location" >   
              </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <input type="hidden" name="status" class="form-control" id="status" value="ACTIVE" readonly>
            </div>
        </div>

<br>
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
<h4>Are you sure you want to update this user?</h4><br>

<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;No&nbsp;&nbsp;</button> |
<input type="submit" name="submit" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-primary btn-md update_user">
</center>
</div>
         
       </div>
      </div>
    </div>    
</form>

 <!-- DEACT Modal --> 
<form class="" action="changestatus.php" method="POST">
<div class="modal fade" id="editstatus" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-primary modal-title">USER STATUS</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>
    <div class="modal-body">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <label id="label_status"></label>
            </div>
        </div>
<br>
 </div>
</div>
<div class="modal-footer">
        <input type="hidden" name="id" id="uuid1">
        <input type="hidden" name="status" id="status1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> |
         <input type="submit"  class="btn btn-primary" id="submit_status">      
    </div>         
       </div>
      </div>
    </div>    
</form>
<!-- END MODAL FOR DEACTIVATE ACCOUNT Modal -->

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






<!--On Change add-->
<script>
  $(document).ready(function(){
    $('#adduserlevel').change(function(){
      var lvlselected = $('#adduserlevel').val();
      

      if (lvlselected == "Regional GAD Coordinator") {
        $('#addlocation').html('<option>Region 1</option>');
      }else if(lvlselected == "Division GAD Coordinator"){
        
        $.ajax({
              type: "POST",
              url: "locationoption.php",
              data: {
                lvlselected: lvlselected
              },
              success: function(data){
                $('#addlocation').html(data);
              }
            });
        
        
      }else{
        $('#addlocation').html('<option>loc</option>');
      }
    })

  });
</script>

<!--On Change edit-->
<script>
  $(document).ready(function(){
    /*$('#userlevel').change(function(){
      var lvlselected = $('#userlevel').val();
      

      if (lvlselected == "Regional GAD Coordinator") {
        $('#location').html('<option>Region 1</option>');
      }else if(lvlselected == "Division GAD Coordinator"){
        
        $.ajax({
              type: "POST",
              url: "locationoption.php",
              data: {
                lvlselected: lvlselected
              },
              success: function(data){
                $('#location').html(data);
              }
            });
        
        
      }else{
        $('#location').html('<option></option>');
      }
    })*/
    /*setInterval(function(){
      console.log("TIme");
      if($('.disableButton').val()==""){
        $("#submitButton").hide();
      }else{
        $("#submitButton").show();
      }
    }, 1000);*/
  });
  //Disable button when fields is empty

  $(".disableButton").keyup(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#updateButton").hide();
      $("#submitButton").hide();
      //alert("Please don't leave blank");
    }else {
        $('#updateButton').show();
        $("#submitButton").show();
    }
  });
  $(".addUserButton").click(function(){
    console.log("TTTT");
    var val = $(".disableButton").val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
  $("#addusername").click(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
  $("#addlocation").click(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
  $("#adduserlevel").click(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
  $("#addmiddlename").click(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
  $("#addfirstname").click(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
  $("#addpassword").click(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
  $("#addlastname").click(function(){
    console.log("TTTT");
    var val = $(this).val();
    if(val==""){
      $("#submitButton").prop('disabled', true);
    }else {
        $("#submitButton").prop('disabled', false);
    }
  });
</script>




            
        </div>
    </div>
</div>

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