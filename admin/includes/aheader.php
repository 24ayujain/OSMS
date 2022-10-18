<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <style>
    .nav-item {
        padding: 0px;
    }
    label{color:grey; font-size:15px;}
    </style>
</head>

<body>
    <!-- Top navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow"><a href="adashboard.php"
            class="navbar-brand col-sm-3 col-md-2 mr-0 font-weight-bold text-lg"
            style="font-weight:bold; color:white; margin-left:10px;font-size:40px;">OSMS</a></nav>

    <div class="container-fluid">
        <div class="row">
            <!-- side bar -->
            <nav class="col-sm-2 bg-light sidebar d-print-none" style="padding:10px;margin-top: 80px;">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-dark" href="adashboard.php"><i
                                    class="fas fa-1x fa-user"></i>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="aworkorder.php"><i
                                    class="fab fa-1x fa-accessible-icon"></i>Work Order</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="arequests.php"><i
                                    class="fas fa-1x fa-align-center"></i>Requests</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="aassets.php"><i
                                    class="fas fa-1x fa-key"></i>Assets</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="atechnician.php"><i
                                    class="fas fa-1x fa-align-center"></i>Technician</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="arequester.php"><i
                                    class="fas fa-1x fa-users"></i>Requester</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="asellreport.php"><i
                                    class="fas fa-1x fa-table"></i>Sell Report</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="aworkreport.php"><i
                                    class="fab fa-1x fa-accessible-icon"></i>Work Report</a></li>
                        <li class="nav-item"><a class="nav-link text-dark " href="acontactform.php"><i
                                    class="fas fa-1x fa-user"></i>Contact Forms</a></li> 
                        <li class="nav-item"><a class="nav-link text-dark " href="afeedback.php"><i
                                    class="fas fa-1x fa-user"></i>Feedback Forms</a></li>            
                        <li class="nav-item"><a class="nav-link text-dark " href="achangepassword.php"><i
                                    class="fas fa-1x fa-key"></i>Change Password</a></li>

                        <li class="nav-item"><a class="nav-link text-dark" href="../logout.php"><i
                                    class="fas fa-1x fa-sign-out-alt"></i>Logout</a></li>




                    </ul>
                </div>
            </nav>
            <!-- end of first column -->