<?php session_start(); 

if(empty($_SESSION['ulvl'])){
  echo "<script>window.location = '../index.php';</script>";}

  require('../connect.php');
 $un = $_SESSION['uid'];

  $queryprofile = "SELECT * FROM caps WHERE id = '$un'";
  $sqlprofile = mysqli_query($conn, $queryprofile);
  $rowprofile = mysqli_fetch_array($sqlprofile);

//attendees functions 
$query_at = mysqli_query($conn,"SELECT * FROM attendees ORDER BY id");
$query_male = mysqli_query($conn,"SELECT * FROM attendees WHERE gender='Male'");
$query_female = mysqli_query($conn,"SELECT * FROM attendees WHERE gender='Female'");
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
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){
  $("#position").change(function(){
    //alert($(this).val());
    console.log($(this).val());
    var pos = $(this).val();
    var loc = $("#location").val();
    $.post("filterattendees.php",
    {
      position: $(this).val(),
      location: $("#location").val()
    },
    function(data){
      console.log(data);
      $("#table_gad").html(data);
      var count = $("#total_count").val();
      $("#view_pos").html("Total Number of <b>"+pos+"</b>: <b>"+count+"</b>");
      //alert("Data: " + data + "\nStatus: " + status);
    });
  });
  $("#location").change(function(){
    //alert($(this).val());
    console.log($(this).val());
    var loc = $(this).val();
    //$("#position").val("All");
    $.post("filterattendees.php",
    {
      location: $(this).val(),
      position: $("#position").val()
    },
    function(data){
      console.log(data);
      $("#table_gad").html(data);
      var count = $("#total_count").val();
      $("#view_pos").html("Total Number of <b>"+loc+"</b>: <b>"+count+"</b>");
      //alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>
<script>
      function generatePDF(){
        const element = document.getElementById('invoice');
        var opt = {
          margin:       .5,
          jsPDF:        {orientation: 'portrait' }
        };

        html2pdf().set(opt).from(element).save();
      }
    </script>

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
width: 1150px;

}

.navbar {
  color: black;
}


</style>


  </head>

  <body>

    <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidenav">
         <div class="d-flex justify-content-center">
          <img src="imgdiv/01.png" style="max-width:90px;" alt="">
        </div><br>
<center><h6 style="color: white;"><?php echo $_SESSION['full_name']; ?></h6></center>
  <center><p style="color: white; font-size: 13px;"><?php echo $_SESSION['ulvl']; ?></p></center>
  <hr style="height:2px;color:gray;background-color:gray">

  
   <a data-toggle="modal" href="#editprof" style="font-size: 15px;">Profile</a>

  <a data-toggle="modal" href="#changepassword" style="font-size: 15px;">Change password</a>

  <a href="mandates.php" style="font-size: 15px;">DepEd Mandates</a>

  <a href="gpb.php" style="font-size: 15px;">GPB</a>

  <a href="gadar.php" class="active" style="font-size: 15px;">GAD AR</a>

  <a data-toggle="modal" href="#logout" style="font-size: 15px;">Logout</a>

  <a href="/GAD_System/User_manual.pdf" style="font-size: 15px;">Help</a>
</div>


        <!-- Content -->
        <div class="main">
                
<center><h2 style="color: black; background-color: #e6b800;">GAD Accomplishment Report <br> <p style="font-size: 20px;">ACTIVE FISCAL YEAR:&nbsp;<?php echo $_SESSION['code']; ?></p></h2></center>
 <br>     

<div class="container-fluid">

 <a href="division.php" class="btn rounded-pill" style="background-color: #3366ff; color: white;">Home</a>
  <a class="btn btn-warning rounded-pill" href="../Regional/print-personnel.php" target="_blank">Print</a>
 <br><br>   
        
  
  <div class="d-flex justify-content-center">
 
    <fieldset>
  <div class="row">
    

    <div class="row">
  <div class="col">
 <div class="card" style="width: 72rem;">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
     <li class="nav-item">
        <a class="nav-link" href="gadar.php">Submit GAD AR</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gadpendingform.php">Pending GAD AR</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gad_action_required.php">Action Required</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gadapprovedform.php">Approved GAD AR</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="generateform.php?id=GAD">Generate Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="true">SDD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="download.php">Templates</a>
      </li>
    </ul>
  </div>
    <div class="mb-3">
      <label  class="col-sm-4 col-form-label">Total Number of Attendees: <b><?php echo mysqli_num_rows($query_at); ?></b></label>
    </div>
    <div class="mb-3">
      <label  class="col-sm-4 col-form-label">Total Number of Male: <b><?php echo mysqli_num_rows($query_male); ?></b></label>
    </div>
    <div class="mb-3">
      <label  class="col-sm-4 col-form-label">Total Number of Female: <b><?php echo mysqli_num_rows($query_female); ?></b></label>
    </div>
    <div class="mb-3">
      <label  class="col-sm-4 col-form-label">Select Position to Filter</label>
      <select style="height: 30px; width: 520px;" name="position" id="position" >

                 <option selected>All</option>

                  <?php

                  $sqlOffice="SELECT DISTINCT position FROM position";
                  $office=mysqli_query($conn, $sqlOffice);
                  if(mysqli_num_rows($office)>0){
                    while($divrow=mysqli_fetch_assoc($office)){
                      if ( $divrow['position'] == $rowprofile['position']){?>
                        <option value="<?php echo $divrow['position']; ?>" selected><?php echo $divrow['position']; ?></option>
                      <?php }else{ ?>
                        <option value="<?php echo $divrow['position']; ?>"><?php echo $divrow['position']; ?></option>
                      <?php } 
                      }
                    }else{
                    ?>
                    <option value="" disabled>Add position first</option>
                    <?php
                  } 
                  ?>
              </select>
    </div>
    <div class="mb-3">
  <label  class="col-sm-4 col-form-label">Select Division to Filter</label>
              <select style="height: 30px; width: 220px;" name="location" id="location" >

                 <option selected>All</option>

                  <?php

                  $sqlOffice="SELECT DISTINCT division FROM division";
                  $office=mysqli_query($conn, $sqlOffice);
                  if(mysqli_num_rows($office)>0){
                    while($divrow=mysqli_fetch_assoc($office)){
                      if ( $divrow['division'] == $rowprofile['location']){?>
                        <option value="<?php echo $divrow['division']; ?>" selected><?php echo $divrow['division']; ?></option>
                      <?php }else{ ?>
                        <option value="<?php echo $divrow['division']; ?>"><?php echo $divrow['division']; ?></option>
                      <?php } 
                      }
                    }else{
                    ?>
                    <option value="" disabled>Add division first</option>
                    <?php
                  } 
                  ?>
              </select>

    </div>
    <div class="mb-3">
      <label  class="col-sm-4 col-form-label" id="view_pos"></label>
    </div>
 <hr style="height:2px;color:gray;background-color:gray">
 
  <div class="card-body" id="invoice">
<img src="imgreg/deped.png" style="width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;">
    <center><p style="font-family: Old English Text MT;"><b><text style="font-size: 12px;">Republic of the Philippines</text><br><text style="font-size: 18px;">Department of Education</text></b><br><text style="font-size: 11px; font-family: Times New Roman;">Region I</text></p>
    <table class="table table-bordered col-sm-10"  id="table_gad">
        <tr>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;' class="fonts-fam">Number</th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;' class="fonts-fam">Name</th> 
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;' class="fonts-fam">Position</th>          
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;' class="fonts-fam">Gender</th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;' class="fonts-fam">Division</th>  
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 20px;' class="fonts-fam">Mandate</th>     
          </tr>
          <?php
            $count=1;
            while($row = mysqli_fetch_assoc($query_at)){
              echo "<tr>";
              echo "<td style='font-size: 15px' class='fonts-fam'>".$count."</td>";
              echo "<td style='font-size: 15px' class='fonts-fam'>".$row['name']."</td>";
              echo "<td style='font-size: 15px' class='fonts-fam'>".$row['position']."</td>";
              echo "<td style='font-size: 15px' class='fonts-fam'>".$row['gender']."</td>";
              echo "<td style='font-size: 15px' class='fonts-fam'>".$row['division']."</td>";  
              echo "<td style='font-size: 15px' class='fonts-fam'>".$row['mandate']."</td>";  
              echo "</tr>";
              $count++;
            }
          ?>

          <tr>
            <td colspan="5" class="fonts-fam"><b>Total:</b></td>
            <td class="fonts-fam"><b><?php echo mysqli_num_rows($query_at); ?></b></td>
          </tr>
          <tr>
             <td colspan="5" class="fonts-fam"><b>Total Number of Male:</b></td>
             <td class="fonts-fam"><b><?php echo mysqli_num_rows($query_male); ?></b></td>
          </tr>
           <tr>
             <td colspan="5" class="fonts-fam"><b>Total Number of Female:</b></td>
             <td class="fonts-fam"><b><?php echo mysqli_num_rows($query_female); ?></b></td>
          </tr>
      </table></center>

  </div>
 
    


  </div>
</div>
  
   </div>
 </fieldset>
</div>    
</div>
</div> 
  </div> 
   </div>

   

<!-- update user info and password-->

        <!-- update user info -->
  <script type = "text/javascript">
  $(document).ready(function(){


    //Update
    $(document).on('click', '.update_user', function(){
      $uid=$("#uuidupdate").val();
      $usernameinfo=$('#usernameinfo').val();      
      $lastnameinfo=$('#lastnameinfo').val();
      $firstnameinfo=$('#firstnameinfo').val();
      $middlenameinfo=$('#middlenameinfo').val();
      $userlevelinfo=$('#userlevelinfo').val();
      $locationinfo=$('#locationinfo').val();
             
      //check ta nu maala na values bago ka ag ajaxstatus
      console.log($uid);
      console.log($username);
        $.ajax({
          type: "POST",
          url: "",
          data: {
            id: $uid,
            username: $usernameinfo,           
            lastname: $lastnameinfo,
            firstname: $firstnameinfo,
            middlename: $middlenameinfo,
            userlevel: $userlevelinfo,
            location: $locationinfo, 
            edit: 1,
          },
          success: function(){
            window.location = "../index.php";
           
          }
        });
    });

   
  
  });

  
  
</script>



 <!-- Updateinfo Modal --> 
<form class="" action="updateinfo.php" method="POST">
<div class="modal fade" id="editprof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-success modal-title">Update Profile</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>
    <div class="modal-body">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <label>Username:</label>
                  <input type="text" class="form-control" type="text" name="username" id="usernameinfo" value="<?php echo $rowprofile['username'];?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Lastname:</label>
                <input type="text" class="form-control" name="lastname" id="lastnameinfo" value="<?php echo $rowprofile['lastname'];?>"> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Firstname:</label>
                <input type="text" class="form-control" name="firstname" id="firstnameinfo" value="<?php echo $rowprofile['firstname'];?>">  
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Middlename:</label>
                <input type="text" class="form-control" name="middlename" id="middlenameinfo" value="<?php echo $rowprofile['middlename'];?>">   
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Userlevel:</label>
                <input type="text" class="form-control" name="userlevel" id="userlevelinfo" value="<?php echo $rowprofile['userlevel'];?>" readonly>   
            </div>
        </div>
          <div class="form-group">
            <div class="col-sm-9">
              <label>Location:</label>
                <input type="text" class="form-control" name="location" id="locationinfo" value="<?php echo $rowprofile['location'];?>" readonly>   
            </div>
        </div>
<br>
 </div>
</div>
<div class="modal-footer">
        <input type="hidden" name="id" id="uuidupdate" value="<?php echo $rowprofile['id'];?>">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> |
        <a data-toggle="modal" name="Update" href="#updateinfo" class="btn btn-primary">Update</a>
</div>

  </div>
 </div>
</div>

 <!-- Update Verification Modal -->
 
<div class="modal fade" id="updateinfo" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class = "modal-header">   
    </div>
    <div class="modal-body">
    <center>  
<h4>Are you sure you want to save this update?</h4><br>

<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;No&nbsp;&nbsp;</button> |
<input type="submit" name="submit" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-dark btn-md update_user">
</center>
</div>
         
       </div>
      </div>
    </div>
</form>




<script type="text/javascript">


    var passwordValidate = function() {
  if (document.getElementById('new_pword').value ==
    document.getElementById('confirm_pword').value) {

    document.getElementById('confirm-message').style.color = 'green';
    document.getElementById('confirm-message').innerHTML = 'Password Matched';
    document.getElementById('btnupdate').disabled=false;
    document.getElementById('btnupdate').style.background='#ee0979';
    document.getElementById('btnupdate').style.color='white';

  } else if (document.getElementById('new_pword').value !=
    document.getElementById('confirm_pword').value)  {

    document.getElementById('confirm-message').style.color = 'red';
    document.getElementById('confirm-message').innerHTML = 'Password not Match';
    document.getElementById('btnupdate').disabled=true;
    document.getElementById('btnupdate').style.background='white';
    document.getElementById('btnupdate').style.color='black';

  } 
}

</script>



<!-- Hide/unhide password --> 
<script type="text/javascript">
  
function myFunction() {
  var x = document.getElementById("current_pword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction2() {
  var y = document.getElementById("new_pword");
  

  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }

}
  
</script>


<!-- update password -->
  <script type = "text/javascript">
  $(document).ready(function(){

$(document).on('click', '.btnSubmit', function(){
  event.preventDefault();

$uid = $('#uid').val();
$passW = $('#confirm_pword').val();

      if ($('.current_pw').val()=="" || $('#new_pword').val()=="" || $('#confirm_pword').val()==""){/*=========incomplte input */
      alert("Please fill out all fields!");

       }else if ($('.real_pw').val()!=$('.current_pw').val()){
      alert("Incorrect Password!");
    }else{
         $('.changepass').submit();
  }
  });

  });
 
</script>


<!-- Change Password Modal --> 
<form class="changepass" action="updatepword.php" method="POST">
<div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-primary modal-title">Update Password</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>     
    </div>
    <div class="modal-body">
      <div class="container">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <label>Current Password:</label>
              <input type="hidden" id="real_pword" class="real_pw" name="real_pword" value="<?php echo $rowprofile['password'];?>">
              <input type="hidden" id="uid" name="uid" value="<?php echo $rowprofile['id'];?>"> 
                  <input type="password" class="form-control current_pw" name="current_pword" id="current_pword" required>
                  <input type="checkbox" onclick="myFunction()">Show Password
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>New Password:</label>
                  <input type="password" class="form-control" name="new_pword" onkeyup="passwordValidate()"id="new_pword" required>
                  <input type="checkbox" onclick="myFunction2()">Show Password
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Confirm Password:</label>
                  <input type="password" class="form-control" name="confirm_pword" onkeyup="passwordValidate()"id="confirm_pword" required>
                  <i id="confirm-message" style="font-size: 20px;"></i>
            </div>
        </div>
<br>
 </div>
</div>
</div>
<div class="modal-footer">
        <input type="hidden" name="id" id="uuid" value="<?php echo $rowprofile['id'];?>">
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> |
        <input type="button" class="btn btn-primary btnSubmit" id="btnupdate" value="Update">
</div>

  </div>
 </div>
</div>
</form>

     
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