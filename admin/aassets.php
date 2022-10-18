<?php
include('../dbConnection.php');
// INSERT INTO `assetdb_tb` (`p_id`, `p_name`, `p_dop`, `p_ava`, `p_total`, `p_originalcost`, `p_sellingcost`) VALUES (NULL, 'holder', '2022-08-17', '45', '50', '50', '70');
?>
<?php

session_start();

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}
?>
<?php

define('TITLE', 'Assets');
include('includes/aheader.php');

?>

<!-- start 2nd column  -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white">Assets</p>
<?php
$sql="SELECT * FROM `assetdb_tb` ";
$result = $conn->query($sql);
    if($result->num_rows>0){
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Product ID</th>';
        echo '<th scope="col">Product Name </th>';
        echo '<th scope="col">Date of Purchase </th>';
        echo '<th scope="col">Availblity </th>';
        echo '<th scope="col">Total </th>';
        echo '<th scope="col">Original Cost </th>';
        echo '<th scope="col">Selling Cost </th>';
        echo '<th scope="col">Action </th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['p_id'].'</td>';
        echo '<td>'.$row['p_name'].'</td>';
        echo '<td>'.$row['p_dop'].'</td>';
        echo '<td>'.$row['p_ava'].'</td>';
        echo '<td>'.$row['p_total'].'</td>';
        echo '<td>'.$row['p_originalcost'].'</td>';
        echo '<td>'.$row['p_sellingcost'].'</td>';
        

        echo '<td>';
        echo '<form action="editasset.php" method="post" class="d-inline mr-2" style="margin-right:6px;">';
        echo '<input type="hidden" name="id" value='.$row['p_id'].'><button type="submit" class="btn btn-warning" name="edit" value="Edit"><i class="fas fa-1x fa-sign-out-alt"></i></button>';
        echo '</form>';

        echo '<form action="" method="post" class="d-inline mr-2" style="margin-right: 4px;">';
        echo '<input type="hidden" name="id" value='.$row['p_id'].'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="fas fa-1x fa-align-center"></i></button>';
        echo '</form>';

        echo '<form action="sellproduct.php" method="post" class="d-inline">';
        echo '<input type="hidden" name="idji" value='.$row['p_id'].'><button type="submit" class="btn btn-success" name="bill" value="bill"><i class="fas fa-1x fa-align-center"></i></button>';
        echo '</form>';
        echo '</td>';
    }
        echo '<tbody>';
        echo '</table>';
    
    }
   
?>
 </div>
<?php
if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM `assetdb_tb` WHERE `p_id` = {$_REQUEST['id']}";
    if($conn->query($sql)==TRUE){
        echo '<meta htttp-equiv="refresh" content="0;URL?closed" />';
    }else{
        echo "Unable to delete";
    }
}

?>
<!-- adding insertion button -->
<div class="float-right" style="display: grid; justify-items: end; margin-top:140px;" ><a href="insertasset.php" class="btn btn-danger float-right"><i class="fas fa-2x fa-user"></i></a></div>




<?php
include('includes/afooter.php');

?>