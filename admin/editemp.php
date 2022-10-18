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

define('TITLE', 'Update Employee');
include('includes/aheader.php');

?>
<!-- start 2nd column  -->
<div class="col-sm-6 mx-3 mt-5 jumbotron">
    <h3 class=" text-center">Update Employee</h3>
    <?php
    if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM `techniciandb_tb` WHERE emp_id={$_REQUEST['id']}" ;
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
     }
        //for updating
        if(isset($_REQUEST['requestupdate'])){
            if(($_REQUEST['emp_name']=="" ||$_REQUEST['emp_email']=="")){
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill all fields...</div>';
        
            }else{
            $rid = $_REQUEST['emp_id'];
            $rname = $_REQUEST['emp_name'];
            $remail = $_REQUEST['emp_email'];
            $rcity = $_REQUEST['emp_city'];
            $rmobile = $_REQUEST['emp_mobile'];
            $sql = "UPDATE `techniciandb_tb` SET emp_id = '$rid', emp_name='$rname',emp_email='$remail' ,emp_city='$rcity' ,emp_mobile='$rmobile' WHERE emp_id= '$rid'";
            if($conn->query($sql) == TRUE){
                $regmsg = '<div class="alert alert-success  mt-2" role="alert">Updation Successful...</div>';

            }
        }
    }
        
   
    ?>
    <form action="" method="post">
        <div class="form-group mb-4">
            <label for="r_login_id">Employee ID</label>
            <input type="text" class="form-control mb-2" name="emp_id" value= "<?php if(isset($row['emp_id'])){echo $row['emp_id'];} ?>" readonly>
        </div>

        <div class="form-group mb-4">
            <label for="r_name">Name</label>
            <input type="text" class="form-control mb-2" name="emp_name" value= "<?php if(isset($row['emp_name'])){echo $row['emp_name'];} ?>">
        </div>

       

        <div class="form-group mb-4">
            <label for="r_city">City</label>
            <input type="text" class="form-control mb-2" name="emp_city" value= "<?php if(isset($row['emp_city'])){echo $row['emp_city'];} ?>">
        </div>

        <div class="form-group mb-4">
            <label for="r_mobile">Mobile</label>
            <input type="text" class="form-control mb-2" name="emp_mobile" value= "<?php if(isset($row['emp_mobile'])){echo $row['emp_mobile'];} ?>">
        </div>
        
        <div class="form-group mb-4" >
            <label for="r_email">Email</label>
            <input type="email" class="form-control mb-2" name="emp_email" value= "<?php if(isset($row['emp_email'])){echo $row['emp_email'];} ?>" >
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="requestupdate">Update</button>
            <a href="atechnician.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
    </form>

<?php
include('includes/afooter.php');

?>