<?php
include('../dbConnection.php');

?>
<?php

session_start();
define('TITLE', 'Requests');

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}
include('includes/aheader.php');

?>
<!-- Start 2nd col -->
<div class="col-sm-4 mb-5 mt-4">
    <?php
    $sql="SELECT request_id,request_info,request_desc,request_date FROM `requestsubmit_tb` ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
        echo '<div class="card mt-5 mx-5">';
        echo '<div class="card-header">';
        echo 'Request ID:'.$row['request_id'];
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Request Info: '.$row['request_info'];
        echo '</h5>';
        echo '<p class="card-text">'.$row['request_desc'];
        echo '</p>';
        echo '<p class="card-text">'.$row['request_date'];
        echo '</p>';
        echo '<div style="float:right;">';
        echo '<form action="" method="POST">';
        echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
           echo '<input type="submit" class="btn btn-danger" style="margin-right:6px;" value="View" name="view">';
           echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        } 
    }
    ?>
</div>
<!-- end of 2nd column -->

<?php

if(isset($_REQUEST['view'])){
$sql = "SELECT * FROM `requestsubmit_tb` WHERE request_id = {$_REQUEST['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
}

//for deleting card on close button
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM `requestsubmit_tb` WHERE request_id = {$_REQUEST['id']}";
    if($conn->query($sql)==TRUE){
        echo '<meta htttp-equiv="refresh" content="0;URL?closed" />';
    }else{
        echo "Unable to delete!";
    }
}

//assigning sql and inserting
if(isset($_REQUEST['assign'])){
    if(($_REQUEST['assigntech']=="" ||$_REQUEST['inputdate']=="")){
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill all fields...</div>';

    }else{
        $rid = $_REQUEST['requestid'];
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rtech = $_REQUEST['assigntech'];
        $rdate = $_REQUEST['inputdate'];
        
        $sql="INSERT INTO `assignwork_tb` (`request_id`, `request_info`, `request_desc`, `request_name`, `request_add1`, `request_add2`, `request_city`, `request_state`, `request_zip`, `request_email`, `request_mobile`, `request_tech`, `request_date`) VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', ' $radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rtech', '$rdate')";
        if($conn->query($sql)==TRUE){
            $regmsg = '<div class="alert alert-success mt-2" role="alert">Work Assigned...</div>';

        }else{
            $regmsg = '<div class="alert alert-danger mt-2" role="alert">Not Assigned...</div>';

        }
    }

}

?>


<!-- Start assigned form -->

<div class="col-sm-5 jumbotron" style="background-color:#d8ebfc; margin-top:75px;">
    <form class="mx-5" action="" method="post">
        <h4 class="text-center text-danger">Assign Work Order Request</h4>

        <div class="form-group">
            <label for="request_id">Request ID</label>
            <input type="text" class="form-control" name="requestid" id=""
                value="<?php if(isset($_REQUEST['id']))echo $_REQUEST['id']; ?>" readonly>
        </div><br>

        <div class="form-group">
            <label for="inputRequestInfo">Request Data</label>
            <input type="text" class="form-control" name="requestinfo" id=""
                value="<?php if(isset($row['request_info']))echo $row['request_info']; ?>">
        </div><br>

        <div class="form-group">
            <label for="inputRequestDescription">Description</label>
            <input type="text" class="form-control" name="requestdesc" id=""
                value="<?php if(isset($row['request_desc']))echo $row['request_desc']; ?>">
        </div><br>

        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" name="requestername" id=""
                value="<?php if(isset($row['request_name']))echo $row['request_name']; ?>">
        </div><br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address Line 1</label>
                <input type="text" class="form-control" name="requesteradd1" id=""
                    value="<?php if(isset($row['request_add1']))echo $row['request_add1']; ?>">
            </div><br>

            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" name="requesteradd2" id=""
                    value="<?php if(isset($row['request_add2']))echo $row['request_add2']; ?>">
            </div><br>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="requestercity" id=""
                    value="<?php if(isset($row['request_city']))echo $row['request_city']; ?>">
            </div><br>

            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" name="requesterstate" id=""
                    value="<?php if(isset($row['request_state']))echo $row['request_state']; ?>">
            </div><br>

            <div class="form-group col-md-2">
                <label for="inputState">Zip Code</label>
                <input type="text" class="form-control" name="requesterzip" id=""
                    value="<?php if(isset($row['request_zip']))echo $row['request_zip']; ?>"
                    onkeypress="isInputNumber(event)">
            </div>
        </div><br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="requesteremail" id=""
                    value="<?php if(isset($row['request_email']))echo $row['request_email']; ?>">
            </div><br>

            <div class="form-group col-md-6">
                <label for="inputMobile">Mobile No.</label>
                <input type="text" class="form-control" name="requestermobile" id=""
                    value="<?php if(isset($row['request_mobile']))echo $row['request_mobile']; ?>"
                    onkeypress="isInputNumber(event)">
            </div><br>

        </div><br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="assigntech">Assign To Technician</label>
                <input type="text" class="form-control" name="assigntech" id="" placeholder="Technician">
            </div><br>
            <div class="form-group col-md-6">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" name="inputdate" id="">
            </div>
        </div><br>
        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
        <div style="float:right;">
            <button type="submit" class="btn btn-success" name="assign">Assign</button>
            <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
        </div><br>

    </form><br><br>
</div>



<?php
include('includes/afooter.php');

?>