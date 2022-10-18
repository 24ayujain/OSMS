<?php
include('../dbConnection.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script>location.href='RequesterLogin.php'</script>";
}
//displayed data's query match
$sql = "SELECT r_password,r_email FROM requesterlogin_tb WHERE r_email= '$rEmail'";
$result = $conn->query($sql);
if($result->num_rows==1){
    $row = $result->fetch_assoc();
    $rPassword = $row['r_password'];
}
//writing update query 

if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['rPassword']==""){
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill the field...</div>';

    }else{
       $rPassword = $_REQUEST['rPassword'];
       $sql = "UPDATE requesterlogin_tb SET r_password = '$rPassword' WHERE r_email='$rEmail'";
       if($conn->query($sql)==True){
        $regmsg = '<div class="alert alert-success mt-2" role="alert">Updation Successful...</div>';
  
       }else{
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Update...</div>';

       }
    }
}

?>

<?php
define('TITLE','Change Password');
define('PAGE','RequesterChangePass');

include("includes/header.php");
?>



<!-- profile area start -->

<div class="col-sm-6" style="margin-top:6rem;">
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="rEmail">Email</label><input type="email" class="form-control" name="rEmail" id="rEmail" readonly
                value="<?php echo $rEmail; ?>">
        </div>
        <div class="form-group">
            <label for="rPassword" class="mt-2">New Password</label><input type="password" class="form-control"
                name="rPassword" id="rPassword" placeholder="New Password">
            <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
        </div>
        <button type="submit" class="btn btn-danger mt-3" name="passupdate">Update</button>
    </form>

</div>
<!-- profile area end -->

<?php
include("includes/footer.php");
?>