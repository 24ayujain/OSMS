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

if(isset($_REQUEST['requestsubmit'])){
    if(($_REQUEST['rName']=="" || $_REQUEST['rPassword']=="" || $_REQUEST['rEmail']=="")){
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill all fields...</div>';

    }else{
        $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email= '".$_REQUEST['rEmail']."'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $regmsg = '<div class="alert alert-danger mt-2" role="alert">Email Already Registered...</div>';

        }else{
            $rname = $_REQUEST['rName'];
            $remail = $_REQUEST['rEmail'];
            $rpassword = $_REQUEST['rPassword'];
            $sql = "INSERT INTO `requesterlogin_tb` (`r_name`, `r_email`, `r_password`) VALUES ('$rname', '$remail', '$rpassword')";
            $result = $conn->query($sql);
            if($result==TRUE){
                $regmsg = '<div class="alert alert-success mt-2" role="alert">User Registered...</div>';

            }else{
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Try Again!!!!</div>';
            
               }
        }

    }
}

define('TITLE', 'Insert User');
include('includes/aheader.php');

?>
<!-- 2nd colummn -->
<div class="col-sm-6 mx-3 mt-5 jumbotron">
    <h3 class=" text-center">Add Requester</h3>
    <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-1x fa-user"></i>
                    <label for="name" class="font-weight-bold pl-2" style="padding:11px;">Name</label><br>
                    <input type="text" class="form-control" placeholder="Name" name="rName">
                </div>
                <break>
                    <div class="form-group">
                        <i class="fas fa-1x fa-user"></i>
                        <label for="email" class="font-weight-bold pl-2" style="padding:11px;">Email</label><br>
                        <input type="email" class="form-control" placeholder="Email" name="rEmail">
                        <small>Wenever share your details with anyone else.</small>
                    </div>
                    <break>
                        <div class="form-group">
                            <i class="fas fa-1x fa-key"></i>
                            <label for="Password" class="font-weight-bold pl-2"
                                style="padding:11px;">Password</label><br>
                            <input type="password" class="form-control" placeholder="Password" name="rPassword">
                        </div>

                        <div class="text-center" style="margin-top: 30px;">
            <button type="submit" class="btn btn-danger" name="requestsubmit">Add</button>
            <a href="arequester.php" class="btn btn-secondary">Close</a>
        </div><br>
                        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
            </form>
</div>



<?php
include('includes/afooter.php');

?>