date_default_timezone_set("Asia/Singapore");
if(isset($_SESSION['code'])){
  $code = $_SESSION['code'];
}else{
  $code = date('Y');
}
$nowYear = date('Y');


a.date_submitted >= '$fiscal_start' and a.date_submitted <= '$fiscal_end'
