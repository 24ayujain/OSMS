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

define('TITLE', 'Update Assets');
include('includes/aheader.php');

?>
<!-- start 2nd column  -->
<div class="col-sm-6 mx-3 mt-5 jumbotron">
    <h3 class=" text-center">Update Employee</h3>
    <?php
    if(isset($_REQUEST['edit'])){
        $sql="SELECT * FROM `assetdb_tb` WHERE p_id={$_REQUEST['id']}" ;
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
     }
        //for updating
        if(isset($_REQUEST['requestupdate'])){
            if(($_REQUEST['p_name']=="" ||$_REQUEST['p_dop']=="" ||$_REQUEST['p_ava']=="" ||$_REQUEST['p_total']=="" ||$_REQUEST['p_originalcost']=="" ||$_REQUEST['p_sellcost']=="")){
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill all fields...</div>';
        
            }else{
            $p_id = $_REQUEST['p_id'];
            $p_name = $_REQUEST['p_name'];
            $p_dop = $_REQUEST['p_dop'];
            $p_ava = $_REQUEST['p_ava'];
            $p_total = $_REQUEST['p_total'];
            $p_originalcost = $_REQUEST['p_originalcost'];
            $p_sellcost = $_REQUEST['p_sellcost'];

            $sql = "UPDATE `assetdb_tb` SET p_id = '$p_id', p_name='$p_name',p_dop='$p_dop' ,p_ava='$p_ava' ,p_total='$p_total' ,p_originalcost='$p_originalcost' ,p_sellingcost='$p_sellcost' WHERE p_id= '$p_id'";
            if($conn->query($sql) == TRUE){
                $regmsg = '<div class="alert alert-success  mt-2" role="alert">Updation Successful...</div>';

            }
        }
    }
        
   
    ?>
    <form action="" method="post">
        <div class="form-group mb-4">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control mb-2" name="p_id" value= "<?php if(isset($row['p_id'])){echo $row['p_id'];} ?>" readonly>
        </div>

        <div class="form-group mb-4">
            <label for="r_name">Product Name</label>
            <input type="text" class="form-control mb-2" name="p_name" value= "<?php if(isset($row['p_name'])){echo $row['p_name'];} ?>">
        </div>

       

        <div class="form-group mb-4">
            <label for="r_city">Date of Purchase</label>
            <input type="date" class="form-control mb-2" name="p_dop" value= "<?php if(isset($row['p_dop'])){echo $row['p_dop'];} ?>">
        </div>

        <div class="form-group mb-4">
            <label for="r_mobile">Availblity</label>
            <input type="number" class="form-control mb-2" name="p_ava" value= "<?php if(isset($row['p_ava'])){echo $row['p_ava'];} ?>">
        </div>
        
        <div class="form-group mb-4" >
            <label for="r_email">Total</label>
            <input type="number" class="form-control mb-2" name="p_total" value= "<?php if(isset($row['p_total'])){echo $row['p_total'];} ?>" >
        </div>

        <div class="form-group mb-4" >
            <label for="r_email">Original cost</label>
            <input type="number" class="form-control mb-2" name="p_originalcost" value= "<?php if(isset($row['p_originalcost'])){echo $row['p_originalcost'];} ?>" >
        </div>

        <div class="form-group mb-4" >
            <label for="r_email">Sell  Cost</label>
            <input type="number" class="form-control mb-2" name="p_sellcost" value= "<?php if(isset($row['p_sellingcost'])){echo $row['p_sellingcost'];} ?>" >
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="requestupdate">Update</button>
            <a href="aassets.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
    </form>

<?php
include('includes/afooter.php');

?>