<?php

ob_start();
session_start();
//Storing globally info of first step of form to store in DB later
require_once 'config.php';
$year = mysqli_real_escape_string($link, $_POST['year']);
$author1 = mysqli_real_escape_string($link, $_POST['author1']);
if(!empty($_POST['author2'])) {
$author2 = mysqli_real_escape_string($link, $_POST['author2']);
}
else {
$author2 = 'NULL';
}
if(!empty($_POST['author3'])) {
$author3 = mysqli_real_escape_string($link, $_POST['author3']);
}
else {
$author3 = "NULL";
}
$title = mysqli_real_escape_string($link, $_POST['title']);
$title = preg_replace('!\s+!', ' ', $title);
/*$title = strtolower($title);*/

/*
 * removing unwanted spaces
 */

$name = mysqli_real_escape_string($link, $_POST['name']);
$type = mysqli_real_escape_string($link, $_POST['type']);
$indexing = mysqli_real_escape_string($link, $_POST['index']);
$month = mysqli_real_escape_string($link, $_POST['month']);
if(!empty($_POST['vol'])) {
$vol = mysqli_real_escape_string($link, $_POST['vol']);
}
if(!empty($_POST['issue'])) {
$issue = mysqli_real_escape_string($link, $_POST['issue']);
}
$pages = mysqli_real_escape_string($link, $_POST['page']);

$id = $_SESSION['id'];

$result = mysqli_query($link, "select NOW()");
$now = mysqli_fetch_array($result);
$now = $now[0];
$month = explode(" ", $month);
$year = $month[1];
$month = $month[0];

$type = explode(" ", $type);
if($type[1]=='Journal') {
mysqli_query($link, "insert into pub_list_jnl(submittedby,author1,author2,author3,title,name,type,indexing,month,year,vol,issue,pages,dos) values('$id','$author1','$author2','$author3','$title','$name','$type','$indexing','$month','$year','$vol','$issue','$pages','$now')");
}

else if($type[0]=='others') {
mysqli_query($link, "insert into pub_list_others(submittedby,author1,author2,author3,title,name,type,indexing,month,year,pages,dos) values('$id','$author1','$author2','$author3','$title','$name','$type','$indexing','$month','$year','$pages','$now')");
}

else {
mysqli_query($link, "insert into pub_list_conf(submittedby,author1,author2,author3,title,name,type,indexing,month,year,pages,dos) values('$id','$author1','$author2','$author3','$title','$name','$type','$indexing','$month','$year','$pages','$now')");
}

$flag = $_POST['submit'];
$_SESSION['flag'] = 1;
if($flag=="submit" ) {
header('Location:welcome.php');
}
else if($flag=="Submit & Add more") {
header('Location:submit_welcome.php');
}
?>