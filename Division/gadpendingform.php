<?php 
  session_start();
  include "../connect.php";
  $user = $_SESSION['uid'];
  $loc = $_SESSION['loc'];
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
        table = $("#table_gad").html()+"<tr><td><center><input type='text' name='number_rows' readonly value='"+number+"' style='text-align: center;'></td><td><textarea rows='4' cols='20' name='val1-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val2-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val3-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val4-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val5-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val6-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val7-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val8-"+number+"'></textarea></td><td><textarea rows='4' cols='20' name='val9-"+number+"'></textarea></td></tr>";
        console.log(table);
        $("#table_gad").html(table);

        number = number +1;
      });
    });
    </script>
    
  </head>

  <body>

    <!-- Navigation -->
    <div class="container-fluid">
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
    <div class="row flex-nowrap">
        <div class="sidenav border-right">
          <div class="d-flex justify-content-center">
          <img src="imgdiv/01.png" style="max-width:100px;" alt="">
        </div><br><br>

  <a href="division.php">Home</a>

  <a href="gadar.php">Create GAD AR</a>
  <a href="gadpendingform.php">Submitted AR</a>

  <a data-toggle="modal" href="#logout">Logout</a>
  <a href="#">Help</a>
</div>
    <br><br><br><br><br><br><br>


    <div class="container-fluid ">
  <div class="d-flex justify-content-center">
    <fieldset>

      

  <div class="row">
  	<div class="container-fluid">

<h2>GAD FORMS</h2>
         <section><br><br><br>
              <legend>GAD FORMS YOU'VE SUBMITTED</legend>
              <div class="d-flex justify-content-end"> 
                <input class="form-control-lg " type="text" id="search" name="search" placeholder="Search">
              </div>
              <br>

      <?php
        include("../connect.php");

        $sql="SELECT * FROM gad_form WHERE requestor_id='$user' and form_number LIKE 'GAD%' ORDER BY date_submitted";
        $result=mysqli_query($conn, $sql);

        echo "<table id='list' class='table table-hover'>";
        
          echo "<tr>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Form Number</th>";           
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Form Status</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black;'>Date Submitted</th>";
            echo "<th style='padding: 10px; background-color: #3366ff; color: white; border-bottom: 2px solid black; text-align: center;' colspan='2'>ACTION</th>";
          echo "</tr>";
          echo "<tbody id='usertable'>";

        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            echo "<tr>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tid'>".$row['form_number']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tusername'>".$row['form_status']."</td>";
              echo "<td style='padding: 10px;border-bottom: 1px solid black;' id='tpassword'>".$row['date_submitted']."</td>";
              if($row['form_status']!='PENDING'){
      
              ?>
    	          <td style='padding: 10px;border-bottom: 1px solid black;'><a class="btn btn-primary edit_status"  href="viewapprovedform.php?id=<?php echo $row['form_number'] ?>">
                  <i class="bi bi-pencil-square">VIEW</i>
    	            </a>
    	           <?php
                 }else{
                 ?> 
                </td>
                <td style='padding: 10px;border-bottom: 1px solid black;'><a class="btn btn-primary edit_status"  href="updateform.php?id=<?php echo $row['form_number'] ?>">
                      <i class="bi bi-pencil-square">EDIT</i>
                      </a>    
                </td>
              <?php
              } 
            echo "</tr>";
          }
        }
        echo "</tbody>";
        echo "</table";
      ?>   
    </section>
  
   </div>
   </div>
</div>
    
</div>
  <!--row-->
</div>

  
  </fieldset>
  </div> 
  <!--container--> 
</div>
    

  
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