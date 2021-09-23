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
               <a class="btn btn-primary" href="resources.php" style="background-color: #4d4d4d; border: #4d4d4d; color: white;"type="button">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-download" viewBox="0 0 16 16">
                   <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                   <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                 </svg>
                 <i class="bi bi-upload">Resource</i>
               </a>                  
            </li>
          </ul>
        </div>
        <div class="container-fluid">
          <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="btn btn-primary" href="pendingform.php" style="background-color: #4d4d4d; border: #4d4d4d; color: white;"type="button">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-download" viewBox="0 0 16 16">
                   <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                   <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                 </svg>
                 <i class="bi bi-upload">PENDING FORM</i>
               </a>                  
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


    <div class="container-fluid ">
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
      <table width="100%" class="col-sm-2" id="table_gad">
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
          <tr>
            <td><input type="text" id="count_num"  name="number_rows" readonly value="1" style="text-align: center;"></td>
            <td><textarea rows="4" cols="20" name="val1-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val2-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val3-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val4-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val5-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val6-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val7-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val8-1" placeholder="Add text here"></textarea></td>
            <td><textarea rows="4" cols="20" name="val9-1" placeholder="Add text here"></textarea></td>
          </tr>
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