<?php
include('dbConnection.php');

if(isset($_REQUEST['rSignup'])){
    //check empty fields
   if(( $_REQUEST['rName']== "") || ( $_REQUEST['rEmail']== "") ||  ( $_REQUEST['rPassword']== "")){ 
       $regmsg = '<div class="alert alert-warning mt-2" role="alert">ALL FIELDS ARE REQUIRED!!!!!</div>';
   }else{
       //check if email registerd
    $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email= '".$_REQUEST['rEmail']."'";
    $result = $conn->query($sql);

    if($result->num_rows==1){
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">You are Already Registered User!!!!!</div>';
    }else{
            //assign values of user

   $rName = $_REQUEST['rName'];     //rName in request is taken from name field in input tag and variable name $rName is choosen for convinence
   $rEmail = $_REQUEST['rEmail'];
   $rPassword = $_REQUEST['rPassword'];

   $sql = "INSERT INTO `requesterlogin_tb` (`r_name`, `r_email`, `r_password`) VALUES ('$rName', '$rEmail', '$rPassword')";
   if($conn->query($sql)==TRUE){
       $regmsg = '<div class="alert alert-success mt-2" role="alert">Successfully Signed Up!!!!!</div>';
   }else{
    $regmsg = '<div class="alert alert-danger mt-2" role="alert">Try Again!!!!</div>';

   }
}
}
}
?>

<!-- registration form start -->
<div class="container pt-5" id="Registration">
    <h2 class="text-center">Create Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
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

                        <button type="submit" style="width:-webkit-fill-available;"
                            class="btn btn-danger shadow-sm font-weight-bold mt-5" name="rSignup">Sign-up</button>
                        <em style="font-size:10px;">Note - By clicking Sign up you agree to out T&C and Cookie
                            Policy</em><br>
                        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
            </form>
        </div>
    </div>
</div>
<!-- registration form end -->