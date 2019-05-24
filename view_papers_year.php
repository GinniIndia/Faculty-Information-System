<?Php
ob_start();
session_start();
//Stroing year from Publications->view;
$_SESSION['year1']=$_POST['year1'];
$_SESSION['year2']=$_POST['year2'];
?>