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

define('TITLE', 'Update Request');
include('includes/aheader.php');

?>
<!-- start 2nd column  -->
<div class="col-sm-6 mx-3 mt-5 jumbotron">
    <h3 class=" text-center">Update Requester</h3>
    <?php
    if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM `requesterlogin_tb` WHERE r_login_id={$_REQUEST['id']}" ;
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
     }
        //for updating
        if(isset($_REQUEST['requestupdate'])){
            if(($_REQUEST['rname']=="" ||$_REQUEST['remail']=="")){
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill all fields...</div>';
        
            }else{
            $rid = $_REQUEST['r_login_id'];
            $rname = $_REQUEST['rname'];
            $remail = $_REQUEST['remail'];
            $sql = "UPDATE `requesterlogin_tb` SET r_login_id = '$rid', r_name='$rname',r_email='$remail' WHERE r_login_id= '$rid'";
            if($conn->query($sql) == TRUE){
                $regmsg = '<div class="alert alert-success  mt-2" role="alert">Updation Successful...</div>';

            }
        }
    }
        
   
    ?>
    <form action="" method="post">
        <div class="form-group mb-4">
            <label for="r_login_id">Request ID</label>
            <input type="text" class="form-control mb-2" name="r_login_id" value= "<?php if(isset($row['r_login_id'])){echo $row['r_login_id'];} ?>" readonly>
        </div>

        <div class="form-group mb-4">
            <label for="r_name">Name</label>
            <input type="text" class="form-control mb-2" name="rname" value= "<?php if(isset($row['r_name'])){echo $row['r_name'];} ?>">
        </div>

        <div class="form-group mb-4" >
            <label for="r_email">Email</label>
            <input type="email" class="form-control mb-2" name="remail" value= "<?php if(isset($row['r_email'])){echo $row['r_email'];} ?>" >
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="requestupdate">Update</button>
            <a href="arequester.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
    </form>

<?php
include('includes/afooter.php');

?>