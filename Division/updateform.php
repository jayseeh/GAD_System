<?php 
  session_start();
  include "../connect.php";
  $user = $_SESSION['uid'];
  $loc = $_SESSION['loc'];
  $form_number = $_GET['id'];
  $query_division = mysqli_query($conn,"SELECT * FROM caps WHERE id='$user'");
  date_default_timezone_set("Asia/Singapore");
  $date = date('Y-m-d H-i-s');
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
    <script>
    $(document).ready(function(){
      var number;
      var d = new Date();
      var n = d.getTime();
      //console.log(n);
      $("#form_id").val("GAD-"+n);
      var number = parseInt($("#count_num").val())+1;
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
  padding: 6px 8px 6px 30px;
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


</style>

  </head>

  <body>

     <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="sidenav border-right">
          <div class="d-flex justify-content-center">
          <img src="imgdiv/01.png" style="max-width:100px;" alt="">
        </div><br><br>
<a data-toggle="modal" href="#edit"><?php echo $_SESSION['full_name']; ?></a>
  <a data-toggle="modal" href="#edit"><?php echo $_SESSION['ulvl']; ?></a><br><br>
  <a href="division.php">Home</a>

  <a href="gpb.php">Create GPB</a>
  <a href="pendingform.php">Submitted GPB</a>

  <a href="gadar.php">GAD AR</a>

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

  <h2>Division Home</h2>
         

  <div class="d-flex justify-content-center">
    <fieldset>

      

  <div class="row">
  <div class="col">
    <div class="card border-primary mb-3" >
  <h4 class="card-header">Submit Report</h4 >
  <div class="card-body">
    <form action="submitform.php" method="POST">
   <div class="mb-3">
    <label  class="col-sm-2 col-form-label">Form Number:</label>
    <div class="col-sm-5">
      <input type="text" name="form_id" id="form_id" readonly class="form-select form-control form-control-lg">
    </div>
    <label  class="col-sm-2 col-form-label">Division:</label><br>
    <div class="col-sm-5">
      <input type="text" name="division" id="division" readonly class="form-select form-control form-control-lg"  value="<?php echo $loc; ?>">
    </div>
    <div class="col-sm-2">  
      <br>
      <hr>
      <p>Please fill up below table.</p>
      <table class="table table-bordered col-sm-2"  id="table_gad">
        <tr>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Number</th> 
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Gender Issue/GAD Mandate</th>          
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Cause of the Gender Issue</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>GAD Result Statement/GAD Objective</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Relevant Organization MFO/PAP</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>GAD Activity</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Output Performance Indicator/ Target</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>GAD Budget</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Source of Budget</th>
            <th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Responsible Unit/ Office</th>   
          </tr>
          <?php
          		$query = mysqli_query($conn,"SELECT * FROM gad_table_entry_value WHERE form_number = '$form_number' ORDER BY row_number");

          		if(mysqli_num_rows($query)>0){
          			while($row=mysqli_fetch_assoc($query)){
          			
          	?>
		          <tr>
		            <td><input type="text" id="count_num"  name="number_rows" readonly value="<?php echo $row['row_number']; ?>" style="text-align: center;"></td>
		            <td><textarea rows="4" cols="15" name="val1-1" placeholder="Add text here"><?php echo $row['col1']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val2-1" placeholder="Add text here"><?php echo $row['col2']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val3-1" placeholder="Add text here"><?php echo $row['col3']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val4-1" placeholder="Add text here"><?php echo $row['col4']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val5-1" placeholder="Add text here"><?php echo $row['col5']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val6-1" placeholder="Add text here"><?php echo $row['col6']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val7-1" placeholder="Add text here"><?php echo $row['col7']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val8-1" placeholder="Add text here"><?php echo $row['col8']; ?></textarea></td>
		            <td><textarea rows="4" cols="15" name="val9-1" placeholder="Add text here"><?php echo $row['col9']; ?></textarea></td>
		          </tr>
          	<?php 
		          	}
				}
          	?>

          	
      </table>
    </div>
    <br>
    <input type="hidden" name="date_sub" value="<?php echo $date; ?>">
    <input type="hidden" name="numberOfRows" value="1" id="numberOfRows">
    <input type="button" name="add_rows" value="Add Row" id="add_rows">
    <input type="Submit" name="submit" value="Submit"> 

    </form>
  </div>
</div>
</div>
  <!--row-->
</div>

  
  </fieldset>
  </div> 
  <!--container--> 


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