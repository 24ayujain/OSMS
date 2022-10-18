<?php

session_start();
define('TITLE', 'Check Status');
include('../dbConnection.php');
if(isset($_SESSION['is_login'])) {
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script>  location.href = 'Requesterlogin.php'</script>";
}
include('includes/header.php');

?>

<!-- start 2nd col -->
<div class="col-sm-6">
    <form action="" method="post" class="form-inline d-print-none" style="margin-top: 83px; display:inline-flex;">
        <div class="form-group mr-3 d-print-none">
            <label for="checkid">Enter Request ID :</label>
        </div>
        <div style="margin-left:10px;">
            <input type="number" name="checkid" class="form-control">
        </div style="margin-left:10px;">
        <button type="submit" class="btn btn-danger ml-3" style="margin-left:4px;" name="search">Search</button>
    </form>
<?php
if(isset($_REQUEST['checkid'])){
    if($_REQUEST['checkid']==""){
        echo "<div class='alert alert-warning'>Fill All Fields</div>";

    }else{
    $sql ="SELECT * FROM `assignwork_tb` WHERE request_id = {$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if(($row['request_id']== $_REQUEST['checkid'])){

?>

<h3 class="text-center mt-5">Assigned Work Details</h3>
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
    <form action="" method="post" class="d-print-none">
        <input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
        <input type="submit" class="btn btn-secondary" value="Close">

    </form><br><br>
</div>


<?php
}else{
    
   echo "<div class='alert alert-warning'>Your Request is still Pending</div>";

}
    }
}
?>

</div>



<?php
include("includes/footer.php");
?>