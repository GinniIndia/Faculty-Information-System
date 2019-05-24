<?php
ob_start();
session_start();
//Used to destroy data stored in session 
$_SESSION['year1']=$_POST['year1'];
$_SESSION['year2']=$_POST['year2'];
?>