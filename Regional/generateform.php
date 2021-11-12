<?php 
  session_start();
  include "../connect.php";
  $user = $_SESSION['uid'];
  $loc = $_SESSION['loc'];
  //$form_number = $_GET['id'];
  $query_division = mysqli_query($conn,"SELECT * FROM caps WHERE id='$user'");
  $query_form = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED'");
  $fetch_form = mysqli_fetch_assoc($query_form);
  date_default_timezone_set("Asia/Singapore");
  $date = date('Y-m-d H-i-s');
  $total_budget=0;
  $form_type = $_GET['id'];
  
  if(empty($_SESSION['ulvl'])){
  echo "<script>window.location = '../index.php';</script>";}

  require('../connect.php');
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
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function(){
      var number, total_budget;
      var d = new Date();
      var n = d.getTime();
      //console.log(n);
      //$("#form_id").val("GAD-"+n);
      var number = parseInt($("#count_num").val())+1;
      var total_budget = $("#total_budget").val();
      $("#viewtotal").html("Total GAA of Agency: &#8369;"+total_budget.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
      console.log(number);

      //ADD ROWS FUNCTION
      $("#add_rows").click(function(){
        $("#numberOfRows").val(number);
        table = $("#table_gad").html()+"<tr><td><center><input type='text' name='number_rows' readonly value='"+number+"' style='text-align: center;'></td><td><textarea rows='4' cols='15' name='val1-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val2-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val3-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val4-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val5-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val6-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val7-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val8-"+number+"'></textarea></td><td><textarea rows='4' cols='15' name='val9-"+number+"'></textarea></td></tr>";
        console.log(table);
        $("#table_gad").html(table);

        number = number +1;
      });
    });
    </script>
    <script>
      function generatePDF(){
        const element = document.getElementById('invoice');
        var opt = {
          margin:       .5,
          jsPDF:        {orientation: 'landscape' }
        };

        html2pdf().set(opt).from(element).save();
      }
    </script>
    <style>
    .tbl{
     width: 595pt;
     border: 1px solid #000;
    }
    </style>

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

.fonts-fam{
  font-family: Bookman Old Style;
}
</style>

  </head>

  <body>

     <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidenav">
            <div class="d-flex justify-content-center">
          <img src="imgreg/01.png" style="max-width:90px;" alt="">
        </div><br>
<center><h6 style="color: white;"><?php echo $_SESSION['full_name']; ?></h6></center>
  <center><p style="color: white; font-size: 13px;"><?php echo $_SESSION['ulvl']; ?></p></center>
  <hr style="height:2px;color:gray;background-color:gray">

  <a data-toggle="modal" href="#editprof">Profile</a>

  <a data-toggle="modal" href="#changepassword">Change password</a>

  <a href="divisionmanagement.php">Division User Management</a>

  <a href="mandates.php">DepEd Mandates</a>
  <?php
    if($form_type=='GPB'){
      echo '<a href="reggpb.php" class="active">GPB</a><a href="reggadar.php">GAD AR</a>';
    }else{
      echo '<a href="reggpb.php" >GPB</a><a href="reggadar.php" class="active">GAD AR</a>';
    }
  ?>  
  <a data-toggle="modal" href="#logout">Logout</a>

  <a href="#">Help</a>
</div>






        <!-- Content -->
        <div class="main">
 <?php
    if($form_type=='GPB'){
      echo '<center><h2 style="color: black; background-color: #e6b800;">GAD Plan And Budget</h2></center>';
    }else{
      echo '<center><h2 style="color: black; background-color: #e6b800;">GAD Accomplishment Report</h2></center>';
    }
  ?>
 <br>  

<div class="container-fluid">
 <a href="regional.php" class="btn rounded-pill" style="background-color: #3366ff; color: white;">Home</a>
  <button class="btn btn-warning rounded-pill" onclick="generatePDF()">Download Report</button>
  <?php 
  if($form_type=='GAD'){
  ?>
    <a class="btn btn-warning rounded-pill" href="print-pdf.php" target="_blank">Print</a>
  <?php
  }
  else{
    ?>
    <a class="btn btn-warning rounded-pill" href="print-gpb.php" target="_blank">Print</a>
    <?php
  }
  ?>
  <!--<button class="btn btn-warning rounded-pill" onclick="print()">Open as PDF</button>-->
  <br><br>
    <fieldset>

  <div class="row">
    <div class="container-fluid">

<div class="card text-center" style="width: 70rem;">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      
        <?php echo ($form_type == 'GPB') ? '<li class="nav-item"><a class="nav-link" href="reggpb.php">Pending Forms</a></li><li class="nav-item"><a class="nav-link" href="approvedform.php">Approved GPB</a></li>' : '<li class="nav-item"><a class="nav-link" href="reggadar.php">Pending Forms</a></li><li class="nav-item"><a class="nav-link" href="approvedgad.php">Approved GAD AR</a></li>'; ?>
       <li class="nav-item">
        <a class="nav-link active" aria-current="true">Generate Report</a>
      </li>
      <li class="nav-item">
        <?php echo ($form_type == 'GPB') ? '<a class="nav-link" href="generatelist.php?id=GPB">Generate List</a>' : '<a class="nav-link " href="generatelist.php?id=GAD">Generate List</a><li class="nav-item"><a class="nav-link" href="viewpersonnels.php">Trained Personnel</a></li><li class="nav-item"><a class="nav-link" href="templates.php">Upload Template</a></li>';?>
        
      </li>
      
    </ul>
  </div>
  <div class="card-body">

     <h2><center>All Approved <?php echo $form_type; ?> </center></h2>


    <div class="col-sm-12" id="invoice">  
      <img src="imgreg/deped.png" style="width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;">
      <center><p style="font-family: Old English Text MT;"><b><text style="font-size: 12px;">Republic of the Philippines</text><br><text style="font-size: 18px;">Department of Education</text></b><br><text style="font-size: 11px; font-family: Times New Roman;">Region I</text></p>
      <p style="font-family: Bookman Old Style;"><b><?php echo ($form_type == 'GPB') ? 'ANNUAL GENDER AND DEVELOPMENT (GAD) PLAN AND BUDGET' : 'ANNUAL GENDER AND DEVELOPMENT (GAD) ACCOMPLISHMENT REPORT'; ?></b></p></center>
      <table class="table" style="font-family: Bookman Old Style;">
        <tr>
          <td style="line-height: 1px; font-family: Bookman Old Style; font-size: 11px;">Agency: Department of Education - Region 1</td>
          <td style="line-height: 1px; font-family: Bookman Old Style; font-size: 11px; text-align: right;">Department (Central Office): Department of Education</td>
        </tr>
        <?php
          if($form_type=='GPB'){
        ?>
        <tr>
          <td style="line-height: 1px; font-family: Bookman Old Style; font-size: 11px;" id="viewtotal"></td>
          <td></td>
        </tr>
        <?php
          }
        ?>
      </table>
      <table class="table table-bordered"  id="table_gad" CELLSPACING='0'>
        <tr>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam">Gender Issue/GAD Mandate</th>          
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam">Cause of the Gender Issue</th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam">GAD Result Statement/GAD Objective</th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam">Relevant Organization MFO/PAP</th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam">GAD Activity</th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam"><?php echo ($form_type == 'GPB') ? 'Output Performance Indicator/ Target' : 'Performance Indicator'; ?></th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam"><?php echo ($form_type == 'GPB') ? 'GAD Budget' : 'Actual Result (Outputs/Outcomes)'; ?></th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam"><?php echo ($form_type == 'GPB') ? 'Source of Budget' : 'Total Agency Approved Budget'; ?></th>
            <th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class="fonts-fam"><?php echo ($form_type == 'GPB') ? 'Responsible Unit/ Office' : 'Actual Cost/ Expenditure'; ?></th>   
            <?php
              if($form_type=='GAD'){
                echo "<th style='padding: 10px; border-bottom: 2px solid black; font-size: 11px;' class='fonts-fam'>Variance/ Remarks</th>";
              }
            ?>
          </tr>
          <tr>
            <td colspan="10" style="line-height: 1px; font-size: 11px;" class="fonts-fam"><b>CLIENT-FOCUSED</b></td>
          </tr>
          <?php
              $query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED' AND gad_table_entry_value.category_focused='CLIENT' AND gad_form.form_number LIKE '%".$form_type."%' ORDER BY gad_form.form_number");

              if(mysqli_num_rows($query)>0){
                while($row=mysqli_fetch_assoc($query)){
                if($form_type=='GPB'){
                   $total_budget = $total_budget + $row['col7'];
                }
            ?>
              <tr>
                <!-- class="html2pdf__page-break" -->
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col1']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col2']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col3']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col4']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col5']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col6']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col7']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col8']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col9']; ?></td>
                <?php
                if($form_type=='GAD'){
                  ?>
                  <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col10']; ?></td>
                  <?php
                }
                ?>
              </tr>
            <?php 
                }
              }else{
                echo "<tr><td colspan='10' style='font-size: 10px' class='fonts-fam'>None</td></tr>";
              }
            ?>

          <tr>
            <td colspan="10" style="line-height: 1px; font-size: 11px;" class="fonts-fam"><b>ORGANIZATION-FOCUSED</b></td>
          </tr>
          <?php
              $query = mysqli_query($conn,"SELECT * FROM gad_form INNER JOIN gad_table_entry_value ON gad_form.form_number=gad_table_entry_value.form_number WHERE gad_form.form_status='APPROVED' AND gad_table_entry_value.category_focused='ORGANIZATION' AND gad_form.form_number LIKE '%".$form_type."%' ORDER BY gad_form.form_number");

              if(mysqli_num_rows($query)>0){
                while($row=mysqli_fetch_assoc($query)){
                  if($form_type=='GPB'){
                   $total_budget = $total_budget + $row['col7'];
                  }
                
            ?>
              <tr>
                <!-- class="html2pdf__page-break" -->
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col1']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col2']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col3']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col4']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col5']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col6']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col7']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col8']; ?></td>
                <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col9']; ?></td>
                <?php
                if($form_type=='GAD'){
                  ?>
                  <td style="font-size: 10px" class="fonts-fam"><?php echo $row['col10']; ?></td>
                  <?php
                }
                ?>
              </tr>
              <input type="hidden" name="total_budget" id="total_budget" value="<?php echo $total_budget; ?>">
            <?php 
                }
            }else{
                echo "<tr><td colspan='10' style='font-size: 10px' class='fonts-fam'>None</td></tr>";
              }
            ?>

            
      </table>
    </div>

  </div>
</div>
  
   </div>
   </div>
 </fieldset>


  
 
  </div> 
  <!--container--> 


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
       <h3 class = "text-success modal-title">Update Password</h3>
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