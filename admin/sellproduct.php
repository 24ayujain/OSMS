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

// insert bill in db

if(isset($_REQUEST['psubmit'])){
    if(($_REQUEST['cname']=="" || $_REQUEST['cadd']=="" || $_REQUEST['pname']=="" || $_REQUEST['pquantity']=="" || $_REQUEST['psellcost']=="" || $_REQUEST['totalcost']=="" || $_REQUEST['selldate']=="")){
        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Fill all fields...</div>';

    }else{
        $pid = $_REQUEST['p_id'];
        $pava = $_REQUEST['pava']-$_REQUEST['pquantity'];
        $cname = $_REQUEST['cname'];
        $cpname = $_REQUEST['pname'];
        $cadd = $_REQUEST['cadd'];
        $pquantity = $_REQUEST['pquantity'];
        $cpeach = $_REQUEST['psellcost'];
        $cptotal = $_REQUEST['totalcost'];
        $cpdate = $_REQUEST['selldate'];

        $sql = "INSERT INTO `coustomerbill_tb` (`c_name`, `c_add`, `c_proname`, `c_quantity`, `c_each`, `c_total`, `c_date`) VALUES ('$cname', '$cadd', '$cpname', '$pquantity', '$cpeach', '$cptotal', ' $cpdate');";
        $result = $conn->query($sql);
            if($result==TRUE){
            $genid = mysqli_insert_id($conn);
           $_SESSION['myid']=$genid;
           echo "<script>location.href='productsellok.php';</script>";

            }else{
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Try Again!!!!</div>';
            
               }

    //update sql
    $upsql = "UPDATE `assetdb_tb` SET p_ava='$pava' WHERE p_id= '$pid'"; 
    $conn->quer($upsql);

    }
}

?>
<?php

define('TITLE', 'Sell Product');
include('includes/aheader.php');

?>
<div class="col-sm-6 mx-3 mt-5 jumbotron">
    <h3 class=" text-center">Customer Bill</h3>


    <?php
    if(isset($_REQUEST['bill'])){
        $sql="SELECT * FROM `assetdb_tb` WHERE p_id={$_REQUEST['idji']}" ;
        $result = $conn->query($sql);
        $row=$result->fetch_assoc();
     }   
   
    ?>


<form action="" method="post">
        <div class="form-group mb-4">
            <label for="pid">Product ID</label>
            <input type="text" class="form-control mb-2" name="p_id" value= "<?php if(isset($row['p_id'])){echo $row['p_id'];} ?>" readonly>
        </div>

        <div class="form-group mb-4">
            <label for="r_name">Customer Name</label>
            <input type="text" class="form-control mb-2" name="cname" >
        </div>

       

        <div class="form-group mb-4">
            <label for="r_city">Customer Address</label>
            <input type="text" class="form-control mb-2" name="cadd" >
        </div>

        <div class="form-group mb-4">
            <label for="p_name">Product Name</label>
            <input type="text" class="form-control mb-2" name="pname" value= "<?php if(isset($row['p_name'])){echo $row['p_name'];} ?>">
        </div>
        
        <div class="form-group mb-4" >
            <label for="rava">Available</label>
            <input type="number" class="form-control mb-2" name="pava" value= "<?php if(isset($row['p_ava'])){echo $row['p_ava'];} ?>" readonly >
        </div>

        <div class="form-group mb-4" >
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control mb-2" name="pquantity"  >
        </div>

        <div class="form-group mb-4" >
            <label for="psell">Price Each</label>
            <input type="number" class="form-control mb-2" name="psellcost" value= "<?php if(isset($row['p_sellingcost'])){echo $row['p_sellingcost'];} ?>" >
        </div>

        <div class="form-group mb-4" >
            <label for="total">Total Price</label>
            <input type="number" class="form-control mb-2" name="totalcost" >
        </div>

        <div class="form-group mb-4" >
            <label for="date">Date</label>
            <input type="date" class="form-control mb-2" name="selldate" >
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="psubmit">Submit</button>
            <a href="aassets.php" class="btn btn-secondary">Close</a>
        </div>
        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
    </form>



    <?php
include('includes/afooter.php');

?>