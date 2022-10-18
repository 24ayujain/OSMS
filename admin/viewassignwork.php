<?php
include('../dbConnection.php');

?>

<?php

session_start();
define('TITLE', 'View Work');

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}

define('TITLE', 'Work Order');
include('includes/aheader.php');
 
?>

<!-- start 2nd column -->

<div class="col-sm-9 col-md-10 mt-5">
   <h3 class="text-center">Assigned Work Details</h3>
   <?php
   if(isset($_REQUEST['view'])){
    $sql ="SELECT * FROM `assignwork_tb` WHERE request_id = {$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <table class="table table-bordered">
    <tbody>
        <tr>
            <td>Request ID:</td>
            <td><?php
            if(isset($row['request_id'])){echo $row['request_id'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Request Info:</td>
            <td><?php
            if(isset($row['request_info'])){echo $row['request_info'];}
            
            ?></td>
        </tr>
        <tr>
            <td>Request Description:</td>
            <td><?php
            if(isset($row['request_desc'])){echo $row['request_desc'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Requester Name:</td>
            <td><?php
            if(isset($row['request_name'])){echo $row['request_name'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Address:</td>
            <td><?php
            if(isset($row['request_add1'])){echo $row['request_add1'].",".$row['request_add2'].",".$row['request_city'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Email:</td>
            <td><?php
            if(isset($row['request_email'])){echo $row['request_email'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Mobile:</td>
            <td><?php
            if(isset($row['request_mobile'])){echo $row['request_mobile'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Technician Assign:</td>
            <td><?php
            if(isset($row['request_tech'])){echo $row['request_tech'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Date Assigned:</td>
            <td><?php
            if(isset($row['request_date'])){echo $row['request_date'];}
            
            ?></td>
        </tr>

        <tr>
            <td>Customer Signature:</td>
            <td></td>
        </tr>

        <tr>
            <td>Technician Signature:</td>
            <td></td>
        </tr>


    </tbody>
</table>
<div class="text-center">
    <form action="" method="post" class="d-print-none d-inline">
        <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
        </form>
        <form action="aworkorder.php" method="post" class="d-print-none d-inline">
        <input type="submit" class="btn btn-secondary" value="Close">
        </form>    
        
   <br><br>
</div>



    <?php
    }
    ?>
   
   
   


</div>

<?php
include('includes/afooter.php');

?>
