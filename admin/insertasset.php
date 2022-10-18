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
    if(($_REQUEST['pname']=="" || $_REQUEST['pdate']=="" || $_REQUEST['pava']=="" || $_REQUEST['ptotal']=="" || $_REQUEST['poriginal']=="" || $_REQUEST['psell']=="")){
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill all fields...</div>';

    }else{
        $sql = "SELECT p_name FROM assetdb_tb WHERE p_name= '".$_REQUEST['pname']."'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $regmsg = '<div class="alert alert-danger mt-2" role="alert">Product Already Added...</div>';

        }else{
            $pname = $_REQUEST['pname'];
            $pdate = $_REQUEST['pdate'];
            $pava = $_REQUEST['pava'];
            $ptotal = $_REQUEST['ptotal'];
            $poriginal= $_REQUEST['poriginal'];
            $psell= $_REQUEST['psell'];
            $sql = "INSERT INTO `assetdb_tb` (`p_name`, `p_dop`, `p_ava`, `p_total`, `p_originalcost`, `p_sellingcost`) VALUES ('$pname','$pdate','$pava', '$ptotal', '$poriginal', '$psell')";
            $result = $conn->query($sql);
            if($result==TRUE){
                $regmsg = '<div class="alert alert-success mt-2" role="alert">Priduct Added...</div>';

            }else{
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Try Again!!!!</div>';
            
               }
        }

    }
}

define('TITLE', 'Add Product');
include('includes/aheader.php');

?>
<!-- 2nd colummn -->
<div class="col-sm-6 mx-3 mt-5 jumbotron">
    <h3 class=" text-center">Add New Product</h3>
    <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-1x fa-user"></i>
                    <label for="name" class="font-weight-bold pl-2" style="padding:11px;">Product Name</label><br>
                    <input type="text" class="form-control" placeholder="" name="pname">
                </div>
                <break>
                    <div class="form-group">
                        <i class="fas fa-1x fa-user"></i>
                        <label for="dop" class="font-weight-bold pl-2" style="padding:11px;">Date of purchase</label><br>
                        <input type="date" class="form-control" placeholder="mm/dd/yyyy" name="pdate">
                    </div>
                    <break>
                    
                    <div class="form-group">
                    <i class="fas fa-1x fa-user"></i>
                    <label for="ava" class="font-weight-bold pl-2" style="padding:11px;">Availblity</label><br>
                    <input type="number" class="form-control" placeholder="" name="pava">
                </div>
                <break>   

                <div class="form-group">
                    <i class="fas fa-1x fa-user"></i>
                    <label for="name" class="font-weight-bold pl-2" style="padding:11px;">Total</label><br>
                    <input type="number" class="form-control" placeholder="" name="ptotal">
                </div>
                <break>

                        <div class="form-group">
                            <i class="fas fa-1x fa-key"></i>
                            <label for="Password" class="font-weight-bold pl-2"
                                style="padding:11px;">Original Cost</label><br>
                            <input type="number" class="form-control" placeholder="" name="poriginal">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-1x fa-key"></i>
                            <label for="Password" class="font-weight-bold pl-2"
                                style="padding:11px;">Selling Cost</label><br>
                            <input type="number" class="form-control" placeholder="" name="psell">
                        </div>

                        

                        <div class="text-center" style="margin-top: 30px;">
            <button type="submit" class="btn btn-danger" name="requestsubmit">Add</button>
            <a href="aassets.php" class="btn btn-secondary">Close</a>
        </div><br>
                        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
            </form>
</div>



<?php
include('includes/afooter.php');

?>