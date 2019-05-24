<?php
require_once 'config.php';
$title=mysqli_escape_string($link, $_POST['title']);
$title = preg_replace('!\s+!', ' ', $title);
/*$title=strtolower($title);*/
$result=mysqli_query($link,"select * from pub_list_jnl where title='$title'");
if(mysqli_affected_rows($link)) {
    echo "1";
    exit();
}
$result=mysqli_query($link,"select * from pub_list_conf where title='$title'");
if(mysqli_affected_rows($link)) {
    echo "1";
    exit();
}
$result=mysqli_query($link,"select * from pub_list_jnl where title='$title'");
if(mysqli_affected_rows($link)) {
    echo "1";
    exit();
}
echo "0";
?>