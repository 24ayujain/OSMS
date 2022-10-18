<?php
include('../dbConnection.php');

?>
<?php

session_start();

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}

define('TITLE', 'Requester');
include('includes/aheader.php');

?>

<!-- start 2nd column  -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white">List of Requester</p>
<?php
$sql="SELECT * FROM `requesterlogin_tb` ";
$result = $conn->query($sql);
    if($result->num_rows>0){
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Request ID </th>';
        echo '<th scope="col">Name </th>';
        echo '<th scope="col">Email </th>';
        echo '<th scope="col">Action </th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['r_login_id'].'</td>';
        echo '<td>'.$row['r_name'].'</td>';
        echo '<td>'.$row['r_email'].'</td>';

        echo '<td>';
        echo '<form action="editreq.php" method="post" class="d-inline mr-2" style="margin-right:6px;">';
        echo '<input type="hidden" name="id" value='.$row['r_login_id'].'><button type="submit" class="btn btn-warning" name="edit" value="Edit"><i class="fas fa-1x fa-sign-out-alt"></i></button>';
        echo '</form>';

        echo '<form action="" method="post" class="d-inline">';
        echo '<input type="hidden" name="delete" value='.$row['r_login_id'].'><button type="submit" class="btn btn-secondary" name="close" value="Delete"><i class="fas fa-1x fa-align-center"></i></button>';
        echo '</form>';
        echo '</td>';
    }
        echo '<tbody>';
        echo '</table>';
    
    }
?>
<?php
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM `requesterlogin_tb` WHERE `r_login_id` = {$_REQUEST['delete']}";
    if($conn->query($sql)==TRUE){
        echo '<meta htttp-equiv="refresh" content="0;URL?closed" />';
    }else{
        echo "Unable to delete";
    }
}

?>
<!-- adding insertion button -->
<div class="float-right" style="float: right; margin-top:140px;" ><a href="insertreq.php" class="btn btn-danger float-right"><i class="fas fa-2x fa-user"></i></a></div>

<?php
include('includes/afooter.php');

?>