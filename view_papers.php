<?php
ob_start();
session_start();
//Used to select the research paper details from Publications->view......
require_once 'config.php';
$year1 = $_SESSION['year1'];
$year2 = $_SESSION['year2'];
$id = $_SESSION['id'];
$flag=0;
$result_jnl = mysqli_query($link, "select * from pub_list_jnl where submittedby='$id' and (year='$year1' and month IN('July','August','September','October','November','December') or year='$year2' and month IN('January','Febuary','March','April','May','June'))");
if(mysqli_affected_rows($link)) {
    $flag=1;
}
$result_conf = mysqli_query($link, "select * from pub_list_conf where submittedby='$id' and (year='$year1' and month IN('July','August','September','October','November','December') or year='$year2' and month IN('January','Febuary','March','April','May','June'))");
if(mysqli_affected_rows($link)) {
    $flag=1;
}
$result_others = mysqli_query($link, "select * from pub_list_others where submittedby='$id' and (year='$year1' and month IN('July','August','September','October','November','December') or year='$year2' and month IN('January','Febuary','March','April','May','June'))");
if(mysqli_affected_rows($link)) {
    $flag=1;
}
$counter = 1;
if($flag==1) {
?>


<div class='col-md-12 table-responsive'>
    <table class='table  table-bordered'>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Authors</th>
                <th>Title of Paper</th>
                <th>Name of Journal/Conference</th>
                <th>Type of Publication</th>
                <th>Type of Indexing</th>
                <th>Month</th>
                <th>Year</th>
                <th>Vol_No.</th> 
                <th>Issue No.</th>
                <th>Page No.</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($data = mysqli_fetch_array($result_jnl)) {
                ?>
                <tr>
                    <td><?=
                        $counter;
                        $counter = $counter + 1;
                        ?></td>
                    <td><?php
                        echo $data[2];
                        if ($data[3] != "NULL") {
                            echo ',' . $data[3];
                        }
                        if ($data[4] != "NULL") {
                            echo ',' . $data[4];
                        }
                        ?>
                    </td>
                    <td><?= $data[5]; ?></td>
                    <td><?= $data[6]; ?></td>
                    <td><?= $data[7]; ?></td>
                    <td><?= $data[8]; ?></td>
                    <td><?= $data[9]; ?></td>
                    <td><?= $data[10]; ?></td>
                    <td><?= $data[11]; ?></td>
                    <td><?= $data[12]; ?></td>
                    <td><?= $data[13]; ?></td>
                </tr>
                <?php
            }
            ?>

            <?php
            while ($data = mysqli_fetch_array($result_conf)) {
                ?>
                <tr>
                    <td><?=
                        $counter;
                        $counter = $counter + 1;
                        ?></td>
                    <td><?php
                        echo $data[2];
                        if ($data[3] != "NULL") {
                            echo ',' . $data[3];
                        }
                        if ($data[4] != "NULL") {
                            echo ',' . $data[4];
                        }
                        ?>
                    </td>
                    <td><?= $data[5]; ?></td>
                    <td><?= $data[6]; ?></td>
                    <td><?= $data[7]; ?></td>
                    <td><?= $data[8]; ?></td>
                    <td><?= $data[9]; ?></td>
                    <td><?= $data[10]; ?></td>
                    <td><?= "NULL"; ?></td>
                    <td><?= "NULL" ?></td>
                    <td><?= $data[11]; ?></td>
                </tr>
                <?php
            }
            ?>

            <?php
            while ($data = mysqli_fetch_array($result_others)) {
                ?>
                <tr>
                    <td><?=
                        $counter;
                        $counter = $counter + 1;
                        ?></td>
                    <td><?php
                        echo $data[2];
                        if ($data[3] != "NULL") {
                            echo ',' . $data[3];
                        }
                        if ($data[4] != "NULL") {
                            echo ',' . $data[4];
                        }
                        ?>
                    </td>
                    <td><?= $data[5]; ?></td>
                    <td><?= $data[6]; ?></td>
                    <td><?= $data[7]; ?></td>
                    <td><?= $data[8]; ?></td>
                    <td><?= $data[9]; ?></td>
                    <td><?= $data[10]; ?></td>
                    <td><?= "NULL"; ?></td>
                    <td><?= "NULL" ?></td>
                    <td><?= $data[11]; ?></td>
                </tr>
                <?php
            }
            ?>  
        </tbody>
    </table>
</div>

<div class='col-md-8 col-md-offset-2' align='center'>
    <a href='doc_to_pdf/index2.php'  target="_blank" class='btn btn-danger' style='text-decoration:none;cursor:pointer'>Save as PDf In Tabular Form</a>
    <a href='doc_to_pdf/text.php' target="_blank" class='btn btn-danger' style='text-decoration:none;cursor:pointer'>Save as PDf In Text Form</a>
</div>

<?php
}
?>
  
