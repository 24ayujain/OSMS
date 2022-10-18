<?php

include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script>location.href='RequesterLogin.php'</script>";
}
if(isset($_REQUEST['submitrequest'])){
    // check for empty fields
    if(($_REQUEST['requestinfo']=="") || ($_REQUEST['requestdesc']=="") || ($_REQUEST['requestername']=="") || 
    ($_REQUEST['requesteradd1']=="") || ($_REQUEST['requesteradd2']=="") || ($_REQUEST['requestercity']=="") || 
    ($_REQUEST['requesterstate']=="") || ($_REQUEST['requesterzip']=="") || ($_REQUEST['requesteremail']=="") || 
    ($_REQUEST['requestermobile']=="") || ($_REQUEST['requesterdate']=="")){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">Fill all fields...</div>';

    }else{
        //saving data in dbase
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
    $rdate = $_REQUEST['requesterdate'];
  
    $sql = "INSERT INTO `requestsubmit_tb` (`request_info`, `request_desc`, `request_name`, `request_add1`, `request_add2`, `request_city`, `request_state`, `request_zip`, `request_email`, `request_mobile`, `request_date`) VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";
    if($conn->query($sql)==TRUE){
        $genid = mysqli_insert_id($conn);
        $regmsg = '<div class="alert alert-success mt-2" role="alert">Request Submitted...</div>';
        $_SESSION['myid'] = $genid;
        echo "<script>location.href='RequestSuccess.php'</script>";


    }else{
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Submit, Try Again...</div>';

    }

    }
}

?>


<?php


define('TITLE','Your Request');
define('PAGE','SubmitRequest');

include("includes/header.php");

?>


<!-- <html><body> -->

<!-- start service request -->

<div class="col-sm-9 col-md-10" style="margin-top:100px;">

    <form class="mx-5" action="" method="post">
        <div class="form-group">
            <label for="inputRequestInfo">Request Data</label>
            <input type="text"  class="form-control" name="requestinfo" id="" placeholder="Request Info">
        </div><br>

        <div class="form-group">
            <label for="inputRequestDescription">Description</label>
            <input type="text" class="form-control" name="requestdesc" id="" placeholder="Describe your problem">
        </div><br>

        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" name="requestername" id="" placeholder="Name">
        </div><br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address Line 1</label>
                <input type="text" class="form-control" name="requesteradd1" id="" placeholder="House No. 123">
            </div>

            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" name="requesteradd2" id="" placeholder="NME Colony">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" name="requestercity" id="" placeholder="Erpur">
            </div>

            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" name="requesterstate" id="" placeholder="Bihar">
            </div>

            <div class="form-group col-md-2">
                <label for="inputState">Zip Code</label>
                <input type="text" class="form-control" name="requesterzip" id="" placeholder="123456"
                    onkeypress="isInputNumber(event)">
            </div>
        </div><br>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" name="requesteremail" id="" placeholder="Email">
            </div>

            <div class="form-group col-md-2">
                <label for="inputMobile">Mobile No.</label>
                <input type="text" class="form-control" name="requestermobile" id="" placeholder="Phone" onkeypress="isInputNumber(event)">
            </div>

            <div class="form-group col-md-2">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" name="requesterdate" id="">
            </div>

        </div><br>

        <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
        <button type="reset" class="btn btn-secondary" name="submitreset">Reset</button>
        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>


    </form><br><br>
</div>
<!-- end service request -->

<!-- </body></html> -->

<!-- only number for input fields -->
<script>
    function isInputNumber(evt){
        var ch  = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>

<?php
include("includes/footer.php");
?>