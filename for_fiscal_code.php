require('../connect.php');
date_default_timezone_set("Asia/Singapore");
if(isset($_SESSION['code'])){
  $code = $_SESSION['code'];
}else{
  $code = date('Y');
}
$nowYear = date('Y');
$fetch_fiscal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM fiscal_year WHERE code='$code'"));
$fiscal_start = $fetch_fiscal['start_date'];
$fiscal_end = $fetch_fiscal['end_date'];


a.date_submitted >= '$fiscal_start' and a.date_submitted <= '$fiscal_end'



date_default_timezone_set("Asia/Singapore");
  $nowYear = date('Y');
  $fetch_fiscal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM fiscal_year WHERE status='ACTIVE'"));
  $code = $fetch_fiscal['code'];
  $fiscal_start = $fetch_fiscal['start_date'];
  $fiscal_end = $fetch_fiscal['end_date'];
