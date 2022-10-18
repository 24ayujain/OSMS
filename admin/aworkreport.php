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

define('TITLE', 'Sell Product');
include('includes/aheader.php');

?>

<!--  -->

<div class="col-sm-9 col-md-10 text-center">
    <form action="" method="post" class="d-print-none" style="margin-top: 83px; ">
    <div class="row">
        <div class="form-group col-md-2 d-print-none">
        <input type="date" name="startdate" class="form-control">
        </div><span style="display: contents;">to</span>
        <div class="form-group col-md-2 d-print-none">
        <input type="date" name="enddate" class="form-control">
        </div>
        <div class="form-group buttonji" style="display: flex; margin-left: 10rem; margin-top: 1rem;">
            <input type="submit" class="btn btn-secondary " name="searchsubmit" value="Search">
        </div>
    </div>
   </form>

   <?php
   if(isset($_REQUEST['searchsubmit'])){
       $startdate = $_REQUEST['startdate'];
       $enddate = $_REQUEST['enddate'];
       $sql = "SELECT * FROM `assignwork_tb` Where request_date BETWEEN  '$startdate' and '$enddate' ";
       $result = $conn->query($sql);
       if($result->num_rows>0){
           echo '<p class="bg-dark text-white p-2 mt-4" >Details</p>';
           echo '<table class="table">';
           echo '<thead>';
           echo '<tr>';
           echo '<th scope="col">Request ID</th>';
           echo '<th scope="col">Request Info </th>';
           echo '<th scope="col">Name </th>';
           echo '<th scope="col">Address </th>';
           echo '<th scope="col">City </th>';
           echo '<th scope="col">Mobile </th>';
           echo '<th scope="col">Technician Cost</th>';
           echo '<th scope="col">Assigned Date </th>';
           
           echo '</tr>';
           echo '</thead>';

           echo '<tbody>';
           while ($row = $result->fetch_assoc()){
           echo '<tr>';
           echo '<td>'.$row['request_id'].'</td>';
           echo '<td>'.$row['request_info'].'</td>';
           echo '<td>'.$row['request_name'].'</td>';
           echo '<td>'.$row['request_add1'].','.$row['request_add2'].'</td>';
           echo '<td>'.$row['request_city'].'</td>';
           echo '<td>'.$row['request_mobile'].'</td>';
           echo '<td>'.$row['request_tech'].'</td>';
           echo '<td>'.$row['request_date'].'</td>';
       }
       echo '<tr>';
       echo '<td>';
       
       echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">';
      
       echo '</td>';
       echo '</tr>';
           echo '<tbody>';
           echo '</table>';
       }else{
           echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'>No Record Found</div>";
       }
   }
   
   ?>
   
</div>
<?php
include('includes/afooter.php');

?>