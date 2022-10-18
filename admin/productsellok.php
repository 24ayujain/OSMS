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

define('TITLE', 'Sell Product');
include('includes/aheader.php');
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <p class="bg-dark text-white">Your Bill</p>

    
    <?php
$sql = "SELECT * FROM `coustomerbill_tb` WHERE c_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row= $result->fetch_assoc();
    echo '<div class="ml-5 mt-5">'; 
    echo '<h3 class="tex-center">BILL</h3>';
    echo '<table class="table">';

    echo '<tbody>
    <tr><th>Customer ID</th><td>'.$row['c_id'].'</td></tr>
    <tr><th>Customer Name</th><td>'.$row['c_name'].'</td></tr>
    <tr><th>Address</th><td>'.$row['c_add'].'</td></tr>
    <tr><th>Product</th><td>'.$row['c_proname'].'</td></tr>
    <tr><th>Quantity</th><td>'.$row['c_quantity'].'</td></tr>
    <tr><th>Cost of each</th><td>'.$row['c_each'].'</td></tr>
    <tr><th>Total Cost</th><td>'.$row['c_total'].'</td></tr>
    <tr><th>Date</th><td>'.$row['c_date'].'</td></tr>';
    
    echo '<tr>';
    echo '<td>';
    
    echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" style="margin-right:4px;" onClick="window.print()">';
    echo '<a href="aassets.php"><input type="submit" class="btn btn-secondary d-print-none" value="Close"></a>';
   
    echo '</td>';
    echo '</tr>';
   
    echo '</tbody>';
    echo '</table>';
    echo'</div>';
 }



include('includes/afooter.php');

?>
