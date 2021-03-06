<?php 
  session_start();
  require('../connect.php');
  date_default_timezone_set("Asia/Singapore");
  $nowYear = date('Y');
  $fetch_fiscal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM fiscal_year WHERE status='ACTIVE'"));
  $code = $fetch_fiscal['code'];
  $fiscal_start = $fetch_fiscal['start_date'];
  $fiscal_end = $fetch_fiscal['end_date'];
  $user = $_SESSION['uid'];
  $loc = $_SESSION['loc'];
  $query_division = mysqli_query($conn,"SELECT * FROM caps WHERE id='$user'");
  date_default_timezone_set("Asia/Singapore");
  $date = date('Y-m-d H:i:s');

  if(empty($_SESSION['ulvl'])){
  echo "<script>window.location = '../index.php';</script>";}

 $un = $_SESSION['uid'];

  $queryprofile = "SELECT * FROM caps WHERE id = '$un'";
  $sqlprofile = mysqli_query($conn, $queryprofile);
  $rowprofile = mysqli_fetch_array($sqlprofile);
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
    <script>
    $(document).ready(function(){
      //setTimeout(function(){
        start_f = $("#start_d").val();
        end_f = $("#end_d").val();
        console.log(start_f);
        console.log(end_f);
        $.ajax({
          type: "POST",
          url: "getduedate.php",
          data: {
            form_type: 'GPB'
          },
          success: function(data){
            console.log(data);
            if(data!='N'){
              $("#print_due").html("The due date is: "+data);
              $("#modal_due").modal({backdrop: 'static', keyboard: false}); 
              $("#modal_due").modal('show');
            }
          }
        });
        $.ajax({
          type: "POST",
          url: "due_date_notif.php",
          data: {
            form_type: 'GPB'
          },
          success: function(data){
            console.log(data);
            if(data!='N'){
              $("#print_due_notif").html(data);
              //$("#modal_due_notif").modal({backdrop: 'static', keyboard: false}); 
              $("#modal_due_notif").modal('show');
            }
          }
        });
      //},1000);
      $("#dismiss_due").click(function(){
        window.location.href='pendingform.php';
      });
      var number;
      var d = new Date();
      var n = d.getTime();
      //console.log(n);
      $("#form_id").val("GPB-"+n);
      var number = parseInt($("#count_num").val())+1;
      console.log(number);

      //ADD ROWS FUNCTION
      $("#add_rows").click(function(){
        $("#numberOfRows").val(number);
        table = $("#table_gad").html()+"<tr><td><center><input type='text' name='number_rows' readonly value='"+number+"' style='text-align: center; width: 30px;'></td><td><textarea rows='4' cols='6' name='val1-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val2-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val3-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val4-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val5-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val6-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val7-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val8-"+number+"'></textarea></td><td><textarea rows='4' cols='6' name='val9-"+number+"'></textarea></td><td><select name='cat-"+number+"' style='width: 120px;'><option value='CLIENT'>Client-Focused</option><option value='ORGANIZATION'>Organization-Focused</option></select></td></tr>";
        console.log(table);
        $("#table_gad").html(table);

        number = number +1;
      });
    });
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

  <a href="gpb.php" class="active" style="font-size: 15px;">GPB</a>

  <a href="gadar.php" style="font-size: 15px;">GAD AR</a>

  <a data-toggle="modal" href="#logout" style="font-size: 15px;">Logout</a>

  <a href="/GAD_System/User_manual.pdf" style="font-size: 15px;">Help</a>
</div>

        <!-- Content -->
        <div class="main">
                
 <center><h2 style="color: black; background-color: #e6b800;">GAD Plan And Budget <br> <p style="font-size: 20px;">ACTIVE FISCAL YEAR:&nbsp;<?php echo $_SESSION['code']; ?></p></h2></center>
 <br>

<div class="container-fluid">
  <a href="division.php" class="btn rounded-pill" style="background-color: #3366ff; color: white;">Home</a>
  <br>
  <br>      
  <div class="d-flex justify-content-center">
 <fieldset>

  <div class="row">
    

<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true">Submit GPB</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="pendingform.php">Pending GPB</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="action_required.php">Action Required</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="approvedform.php">Approved GPB</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="generateform.php?id=GPB">Generate Report</a>
      </li>
    </ul>
  </div>
  <div class="card-body">

 <form action="submitform.php" method="POST">
   <div class="mb-3">
    <label  class=" col-form-label">Form Number:</label>
    <div class="col-sm-0">
      <input type="text" name="form_id" id="form_id" readonly class="form-select form-control form-control-lg">
    </div>
    <label  class=" col-form-label">Division:</label><br>
    <div class="col-sm-0">
      <input type="text" name="division" id="division" readonly class="form-select form-control form-control-lg"  value="<?php echo $loc; ?>">
    </div>
    <div class="">  
      <br>
      
      <p>Please fill up below table.</p>
      <table class="table table-bordered"  id="table_gad">
        <tr>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Number</th> 
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Gender Issue/GAD Mandate</th>          
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Cause of the Gender Issue</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>GAD Result Statement/GAD Objective</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Relevant Organization MFO/PAP</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>GAD Activity</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Output Performance Indicator/ Target</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>GAD Budget</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Source of Budget</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Responsible Unit/ Office</th>   
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; font-size: 13px;'>Category</th>   
          </tr>
          <tr>
            <td><input type="text" id="count_num"  name="number_rows" readonly value="1" style="text-align: center; size: 1px; width: 30px;"></td>
            <td><textarea rows="4" cols="6" name="val1-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val2-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val3-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val4-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val5-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val6-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val7-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val8-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="6" name="val9-1" placeholder="Add text here"></textarea></td>
            <td>
              <select name="cat-1" style="width: 120px;">
                <option value="CLIENT">Client-Focused</option>
                <option value="ORGANIZATION">Organization-Focused</option>
              </select>
            </td>
          </tr>
      </table>
    </div>
    <br>
    <input type="hidden" name="form_type" value="GPB">
    <input type="hidden" id="start_d" value="<?php echo $fiscal_start; ?>">
    <input type="hidden" id="end_d" value="<?php echo $fiscal_end; ?>">
    <input type="hidden" name="date_sub" value="<?php echo $date; ?>">
    <input type="hidden" name="numberOfRows" value="1" id="numberOfRows">
    <?php
    if($nowYear==$code){
    ?>
      <input type="button" name="add_rows" value="Add Row" id="add_rows" class="btn rounded-pill">
      <!--<input type="Submit" name="submit" value="Submit" class="btn btn-dark rounded-pill">--> 
      <a data-toggle="modal" href="#submit_gpb" class="btn btn-dark rounded-pill">Submit</a>
      <?php
      }else{
    ?>
    <div class="d-grid gap-2 d-md-flex justify-content-md">
        <label>You can't submit form since the active fiscal year is not the same with the current year.</label>
      </div>
    <?php
  }
  ?>
</div>



<div class="modal fade" id="submit_gpb" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class = "modal-header">   
    </div>
    <div class="modal-body">
    <center>  
<h4>Are you sure you want to upload this report?</h4><br>

<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;No&nbsp;&nbsp;</button> |
<input type="Submit" name="submit" value="&nbsp;&nbsp;Yes&nbsp;&nbsp;" class="btn btn-dark btn-md">
</center>
</div>
         
       </div>
      </div>
    </div>
    </form>

  </div>
</div>
  
   
   </div>
    </fieldset>
</div>
  </div> 
  </div>
</div>
</div>


<!-- Swal -->
<?php 
  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  if (strpos($fullUrl, "upload_gpb") == true){
    echo "<script>Swal.fire({
    icon: 'success',
    title: 'GAD Plan and Budget successfully uploaded!',
    showConfirmButton: true, 
    }).then(function (){
    window.location.href = 'gpb.php';
    });</script>";
  }
  ?>


  
<!-- Update profile and password --> 

    <!-- update user info -->
  <script type = "text/javascript">
  $(document).ready(function(){


    //Update
    $(document).on('click', '.update_user', function(){
      $uid=$("#uuid").val();
      $username=$('#username').val();      
      $lastname=$('#lastname').val();
      $firstname=$('#firstname').val();
      $middlename=$('#middlename').val();
      $userlevel=$('#userlevel').val();
      $location=$('#location').val();
             
      //check ta nu maala na values bago ka ag ajaxstatus
      console.log($uid);
      console.log($username);
        $.ajax({
          type: "POST",
          url: "updateinfo.php",
          data: {
            id: $uid,
            username: $username,           
            lastname: $lastname,
            firstname: $firstname,
            middlename: $middlename,
            userlevel: $userlevel,
            location: $location,   
            edit: 1,
          },
          success: function(){
            $("#editprof").modal('hide');
            $("#updateinfo").modal('hide');
            Swal.fire({
                  icon: 'success',
                  title: 'User information successfully updated',
                  showConfirmButton: true, 
                }).then(function (){
                  location.reload()
                  });
          }
        });
    });

   
  
  });

  
  
</script>


 <!-- Updateinfo Modal --> 

<div class="modal fade" id="editprof" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class = "modal-header">
       <h3 class = "text-primary modal-title">Update Info</h3>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     
    </div>
    <div class="modal-body">
      <div class="form-horizontal">
        <div class="form-group">
            <div class="col-sm-9">
              <label>Username:</label>
                  <input type="text" class="form-control" type="text" name="username" id="username" value="<?php echo $rowprofile['username'];?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Lastname:</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $rowprofile['lastname'];?>"> 
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Firstname:</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $rowprofile['firstname'];?>">  
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Middlename:</label>
                <input type="text" class="form-control" name="middlename" id="middlename" value="<?php echo $rowprofile['middlename'];?>">   
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
              <label>Userlevel:</label>
              <input type="text" class="form-control" name="userlevel" id="userlevel" value="Division GAD Coordinator" readonly>
            </div>
        </div>
       <div class="form-group">
            <label class="control-label col-sm-3">Location:</label>
            <div class="col-sm-9">
              <select class="form-control disableButton" name="location" id="location" >

                 <label selected><?php echo $rowprofile['location'];?></label>

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
        </div>

       
<br>
 </div>
</div>
<div class="modal-footer">
        <input type="hidden" name="id" id="uuid" value="<?php echo $rowprofile['id'];?>">
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

<!-- MODAL OUT OF DUE DATE -->
    <div class="modal fade" id="modal_due" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class = "modal-header">
    <label>Notice!</label>   
    </div>
    <div class="modal-body">
    <center>  
<h4>Sorry! Submission of GPB Form is Already Closed!</h4>
<label id="print_due"></label><br><br>
<button type="button" class="btn btn-default btn-md" id="dismiss_due" >&nbsp;&nbsp;OK&nbsp;&nbsp;</button> 
</center>
</div>
         
       </div>
      </div>
    </div>
    <!-- MODAL OUT OF DUE DATE NOTIF-->
    <div class="modal fade" id="modal_due_notif" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class = "modal-header">
    <label><b>Be inform!</b></label>   
    </div>
    <div class="modal-body">
    <center>  
<h4 id="print_due_notif"></h4>
<!-- <label id="print_due_notif"></label> --><br><br>
<button type="button" class="btn btn-default btn-md" data-dismiss="modal">&nbsp;&nbsp;OK&nbsp;&nbsp;</button> 
</center>
</div>
         
       </div>
      </div>
    </div>




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