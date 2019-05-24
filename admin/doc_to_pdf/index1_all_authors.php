<?php
//used for the printing pdf in tabular form....

ob_start();
session_start();
require_once '../../config.php';
$year1 = $_SESSION['year1'];
$year2 = $_SESSION['year2'];
$result_jnl = mysqli_query($link, "select * from pub_list_jnl where (year='$year1' and month IN('July','August','September','October','November','December') or year='$year2' and month IN('January','Febuary','March','April','May','June'))");
$result_conf = mysqli_query($link, "select * from pub_list_conf where  (year='$year1' and month IN('July','August','September','October','November','December') or year='$year2' and month IN('January','Febuary','March','April','May','June'))");
$result_others = mysqli_query($link, "select * from pub_list_others where  (year='$year1' and month IN('July','August','September','October','November','December') or year='$year2' and month IN('January','Febuary','March','April','May','June'))");
?>


<?php

require('mc_table.php');


$pdf = new PDF_MC_Table();
$pdf->AddPage("L");
$pdf->SetFont('Arial', '', 10);
//Table with 20 rows and 4 columns
$pdf->SetWidths(array(10, 25, 30, 40, 40, 40, 35, 20, 30,10,5));
$pdf->Row(array("SN.","Author","Title","Name Pub.","Type Pub.","Type Indexing","Mon&Yr.","VolNo.","IssueNo.","Pg"));
//srand(microtime() * 1000000); $counter=1
 $counter=1;
while ($data = mysqli_fetch_array($result_jnl)) {
   
    $value=$data[2];
    if($data[3]!="NULL") {
        $value=$value . ',' .$data[3];
    }
    if($data[4]!="NULL") {
        $value=$value . ',' .$data[4];
    }
    $pdf->Row(array($counter,$value,$data[5],$data[6],$data[7],$data[8],$data[9] .$data[10],$data[11],$data[12],$data[13]));
    $counter=$counter+1;
}
while ($data = mysqli_fetch_array($result_conf)) {
   
    $value=$data[2];
    if($data[3]!="NULL") {
        $value=$value . ',' .$data[3];
    }
    if($data[4]!="NULL") {
        $value=$value . ',' .$data[4];
    }
    $pdf->Row(array($counter,$value,$data[5],$data[6],$data[7],$data[8],$data[9] .$data[10],"NULL","NULL",$data[11]));
     $counter=$counter+1;
}
while ($data = mysqli_fetch_array($result_others)) {
   
    $value=$data[2];
    if($data[3]!="NULL") {
        $value=$value . ',' .$data[3];
    }
    if($data[4]!="NULL") {
        $value=$value . ',' .$data[4];
    }
    $pdf->Row(array($counter,$value,$data[5],$data[6],$data[7],$data[8],$data[9] .$data[10],"NULL","NULL",$data[11]));
     $counter=$counter+1;
}

$pdf->Output();
?>