<?php
ob_start();
session_start();
//Final submission of all the data of user newly registred ,Execute after the password submision by the user;
include 'function.php';
require_once 'config.php';
$name=$_SESSION['name'];
$dep=$_SESSION['dep'];
$des=$_SESSION['des'];
$email=$_SESSION['email'];
$pwd=$_SESSION['pwd'];
$pwd=my_simple_crypt($pwd,'e');
$kwd=$_SESSION['kwd'];
$kwd=  my_simple_crypt($kwd,'e');

mysqli_query($link,"insert into user_login(email,password,created_account_date,date_of_last_access,date_c_pwd,kwd) values ('$email','$pwd',NOW(),NOW(),NOW(),'$kwd')");
mysqli_query($link,"insert into user_details(name,dept,designation) values('$name','$dep','$des')");

header('Location:thankyou.php');
?>