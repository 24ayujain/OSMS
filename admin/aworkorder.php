<?php
include('../dbConnection.php');

?>

<?php

session_start();
define('TITLE', 'Work Order');

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}

define('TITLE', 'Work Order');
include('includes/aheader.php');
 
?>

<!-- start 2nd col -->
<div class="col-sm-9 col-md-10 mt-5">
    <?php
    $sql = "SELECT * FROM `assignwork_tb`";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Request ID </th>';
        echo '<th scope="col">Request Info </th>';
        echo '<th scope="col">Name </th>';
        echo '<th scope="col">Address </th>';
        echo '<th scope="col">Mobile </th>';
        echo '<th scope="col">Technician </th>';
        echo '<th scope="col">Assigned Date </th>';
        echo '<th scope="col">Action </th>';
        
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['request_id'].'</td>';
        echo '<td>'.$row['request_info'].'</td>';
        echo '<td>'.$row['request_name'].'</td>';
        echo '<td>'.$row['request_add2'].'</td>';
        echo '<td>'.$row['request_mobile'].'</td>';
        echo '<td>'.$row['request_tech'].'</td>';
        echo '<td>'.$row['request_date'].'</td>';
        echo '<td>';
        echo '<form action="viewassignwork.php" method="post" class="d-inline mr-2" style="margin-right:6px;">';
        echo '<input type="hidden" name="id" value='.$row['request_id'].'><button type="submit" class="btn btn-warning" name="view" value="View"><i class="fas fa-1x fa-sign-out-alt"></i></button>';
        echo '</form>';

        echo '<form action="" method="post" class="d-inline">';
        echo '<input type="hidden" name="id" value='.$row['request_id'].'><button type="submit" class="btn btn-secondary" name="close" value="Delete"><i class="fas fa-1x fa-align-center"></i></button>';
        echo '</form>';
        echo '</td>';
  




        echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

    }else{echo "0 result";}
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM `assignwork_tb` WHERE request_id = {$_REQUEST['id']} ";
    if($conn->query($sql)==TRUE){
        echo '<meta htttp-equiv="refresh" content="0;URL?closed" />';
    }else{
        echo "Unable to delete";
    }
}


    ?>
</div>



<?php
include('includes/afooter.php');

?>