<?php
include('../dbConnection.php');

session_start();
if(!isset($_SESSION['is_adminlogin'])){   //it will default true in first cycle

if(isset($_REQUEST['aEmail'])){

$aEmail =mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
$aPassword = mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));

$sql = "SELECT a_email,a_password FROM adminlogin_tb WHERE a_email= '".$aEmail."' AND a_password= '".$aPassword."' limit 1";
$result = $conn->query($sql);

if($result->num_rows == 1){

    $_SESSION['is_adminlogin']=true;    //sessions are set so that if user is revisiting on same browser yet having logged in in pvs windows then it will directly proceed to output window, he will not be able to re login again 
    $_SESSION['aEmail']=$aEmail;

    echo "<script> location.href='adashboard.php';</script>";
    exit;
}else{
    $regmsg = '<div class="alert alert-danger mt-2" role="alert">Wrong id or password !!!!!</div>';

}
}
}else{

    echo "<script> location.href='adashboard.php';</script>";

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Login</title>
</head>

<body>
    <div class="mt-5 mb-3 text-center" style="font-size:30px;">
        <i class="fas fa-2x fa-sethoscope text-success"></i>
        <!--fa-sethoscope -->
        <span>ONLINE SERVICE MAINTAINANCE SYSTEM</span>

    </div>
    <p class="text-center" style="font-size:20px;"><i class="fas fa-1x fa-user-secret text-danger"></i>Admin Login</p>
    <!-- fa-user-secret -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-4">
                <form class="shadow-lg p-3" action="" method="POST">
                    <div class="form-group">
                        <i class="fas fa-1x fa-user text-dark"></i> <label for="email"
                            class="font-weight-bold pl-2 mb-3">Email</label> <input type="email" class="form-control"
                            placeholder="Email" name="aEmail">
                        <small>Welcome dear ADMIN</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-1x fa-key text-dark"></i> <label for="pass"
                            class="font-weight-bold pl-2 mb-3">Password</label> <input type="password"
                            class="form-control" placeholder="Password" name="aPassword">
                    </div>
                    <button type="submit"
                        class="btn btn-outline-danger mt-4 font-weight-bold btn-block shadow-sm">Login</button> <br>
                    <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
                </form>

                <div class="text-center"><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm"
                        style="color:white; font-weight:bold;">Back to Home</a></div>
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>