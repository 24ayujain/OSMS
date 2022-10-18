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


//displayed data's query match
$sql = "SELECT a_password,a_email FROM adminlogin_tb WHERE a_email= '$aEmail'";
$result = $conn->query($sql);
if($result->num_rows==1){
    $row = $result->fetch_assoc();
    $aPassword = $row['a_password'];
}
//writing update query 

if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['aPassword']==""){
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill the field...</div>';

    }else{
       $aPassword = $_REQUEST['aPassword'];
       $sql = "UPDATE adminlogin_tb SET a_password = '$aPassword' WHERE a_email='$aEmail'";
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
define('PAGE','AdminChangePass');

include("includes/aheader.php");
?>



<!-- profile area start -->

<div class="col-sm-6" style="margin-top:6rem;">
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="rEmail">Email</label><input type="email" class="form-control" name="aEmail" id="aEmail" readonly
                value="<?php echo $aEmail; ?>">
        </div>
        <div class="form-group">
            <label for="rPassword" class="mt-2">New Password</label><input type="password" class="form-control"
                name="aPassword" id="aPassword" placeholder="New Password">
            <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
        </div>
        <button type="submit" class="btn btn-danger mt-3" name="passupdate">Update</button>
    </form>

</div>
<!-- profile area end -->

<?php
include("includes/afooter.php");
?>