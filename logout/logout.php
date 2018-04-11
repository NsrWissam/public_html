<?php
/* Log out process sets report_code to logout for report.php to handel */
session_start();
$_SESSION['report_code']="logout";
$_SESSION['logged_in']=false;
header("location: http://localhost/public_html/");

?>
