<!DOCTYPE html>
<html lang="en">

<head>

<!--
Started on: 19-August-2022
End on : 1-September-2022
Duration : 2 weeks
Tools Used : HTML,CSS,JS,SQL,PHP
Made by : Ayush Jain
Help Source : You Tube 
-->


<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>OSMS</title>
</head>

<body>
    <!-- start navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger fixed-top">
        <a href="index.php" class="navbar-brand">OSMS</a>
        <span class="navbar-text">Customer's Happiness is our Aim</span>
        <!-- Buttn hamburgur -->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="myMenu">
            <ul class="navbar-nav navi">
                <li class="nav-item" id="ol"><a href="index.php">Home</a></li>
                <li class="nav-item"><a href="#Services">Service</a></li>
                <li class="nav-item"><a href="#Registration">Registration</a></li>
                <li class="nav-item"><a href="requester/RequesterLogin.php">Login</a></li>
                <li class="nav-item"><a href="#Contact">Contact</a></li>

            </ul>
        </div>
    </nav>
    <!-- end navbar -->


    <!-- Start header Jumboron -->
    <header class="jumbotron back-img"
        style="background-image:url(image/img2.png);display: flex;background-size: cover; background-position: center center; min-height: 95vh; background-repeat: no-repeat;">

        <div class="introinner" style="display: block;margin-top: 142px;margin-left: 40px;">
            <h1 class="text-uppercase text-danger">Welcome to OSMS</h1>
            <p class="font-italic" style="color:white;">Customer's happiness is our aim</p>
            <a href="requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
            <a href="#Registration" class="btn btn-danger mr-4">Sign up</a>


        </div>
    </header>
    <!-- end header Jumboron -->

    <!-- start intro of website -->
    <div class="container" style="align-items: center; display: flex;margin-top: 50px;">
        <div class="ourservice" style="width: 80vw; align-items: center;background-color: rgb(192, 192, 181);">
            <h3 class="text-center" style="margin:10px;">OSMS Services</h3>
            <p style="margin:5px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab assumenda non at eos ex
                quod sapiente, vero excepturi Ab assumenda non at eos ex quod sapiente, vero excepturi Ab assumenda non
                at eos ex quod sapiente, vero excepturi Ab assumenda non at eos ex quod sapiente, vero excepturi Ab
                assumenda non at eos ex quod sapiente, vero excepturi Ab assumenda non at eos ex quod sapiente, vero
                excepturi Ab assumenda non at eos ex quod sapiente, vero excepturi Ab assumenda non at eos ex quod
                sapiente, vero excepturi Ab assumenda non at eos ex quod sapiente, vero excepturi Ab assumenda non at
                eos ex quod sapiente, vero excepturi itaque nihil eaque, error corrupti dolor maiores repudiandae unde
                possimus, tenetur reprehenderit debitis. Eaque, delectus natus. Repudiandae minus consectetur deserunt
                rem, at modi voluptatibus culpa ducimus delectus ullam quae sed quibusdam dolorem atque voluptates
                exercitationem corrupti sit. Magnam voluptatem voluptas nihil nesciunt deleniti quo deserunt, a atque
                provident. Assumenda dignissimos, deserunt illum consectetur enim veritatis ut tempore maxime rem odio
                sunt cupiditate provident dicta perferendis atque facere beatae libero. Laborum, omnis, ad illo nulla
                ipsum cum vitae vel autem cumque voluptatem reiciendis?</p>
        </div>
    </div>
    <!-- end intro of website -->

    <!-- start services -->

    <div class="container text-center border-bottom" id="Services">
        <h3 style="margin-top:15px;"> Our Services</h3>
        <div class="row mt-4">
            <div class="col-sm-4 mb-4">
                <a href="electronicapp.php"><i class="fas fa-6x fa-tv text-success"></i></a>
                <h5 class="ml-4">Electronic Appliances</h5>
            </div>

            <div class="col-sm-4 mb-4">
                <a href="electronicmaintain.php"><i class="fas fa-6x fa-sliders-h text-primary"></i></a>
                <h5 class="ml-4">Electronic Maintainace</h5>
            </div>

            <div class="col-sm-4 mb-4">
                <a href="repair.php"><i class="fas fa-6x fa-cogs text-info"></i></a>
                <h5 class="ml-4">Fault Repair</h5>
            </div>

        </div>
    </div>

    <!-- end services -->

    <!-- <i class="fas fa-3x fa-trophy"></i> -->

    <!-- registration form start -->

    <?php
include('userRegistration.php');

?>



    <!-- registration form end -->


    <!-- Happy customer start -->

    <?php
include('feedbackdisplay.php');

?>
    <!-- Happy customer end-->


    <!-- contact form start -->
    <div class="container" id="Contact">
        <h2 class="text-center mb-4" style="margin: 60px">Contact Us</h2>
        <div class="row">
            <?php
    include('contactform.php');
    
    ?>

            <div class="col-md-4 text-center">
                <strong>Headquarter:</strong><br>
                OSMS Pvt. Ltd.
                Ashoknagar, Lucknow <br>
                Uttar Pradesh - 123455 <br>
                Phone: 8978643542 <br>
                <a href="#" target="_blank" style="color:#dc3545; text-decoration:none;">www.OSMS.com</a><br><br><br>

                <strong>Branch 1:</strong><br>
                OSMS Pvt. Ltd.
                Rashiagar,Allahbad <br>
                Uttar Pradesh - 156755 <br>
                Phone: 897788692 <br>
                <a href="#" target="_blank" style="color:#dc3545; text-decoration:none;">www.OSMS.com</a><br><br><br>


                <strong>Branch 2:</strong><br>
                OSMS Pvt. Ltd.
                Ektanagar,Tapri <br>
                Uttar Pradesh - 178755 <br>
                Phone: 87894322 <br>
                <a href="#" target="_blank" style="color:#dc3545; text-decoration:none;">www.OSMS.com</a><br><br><br>

            </div>
        </div>
    </div>

    <!-- contact form end 
height:40vh; -->






    <!-- footer start -->

    <footer class="container-fluid bg-dark mt-5">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6">
                    <span class="pr-2 text-light">Follow Us :</span>
                    <a href="#" class="pr-2 fi-color"><i class="fab fa-1x fa-twitter"
                            style="color:#dc3545; margin-right:3px;"> </i></a>
                    <a href="#" class="pr-2 fi-color"><i class="fab fa-1x fa-facebook"
                            style="color:#dc3545; margin-right:3px;"> </i></a>
                    <a href="#" class="pr-2 fi-color"><i class="fab fa-1x fa-youtube"
                            style="color:#dc3545; margin-right:3px;"> </i></a>
                    <a href="#" class="pr-2 fi-color"><i class="fas fa-1x fa-rss"
                            style="color:#dc3545;margin-right:3px;"> </i></a>

                </div>
                <div class="col-md-6">
                    <small class="text-light">Designed by AYUSH JAIN &copy; 2022</small>
                    <small class="ml-2"><a href="admin/alogin.php" style="color:#dc3545; text-decoration:none;">Admin
                            Login</a></small>
                </div>
            </div>
        </div>
    </footer>

    <!-- footer end -->




    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>