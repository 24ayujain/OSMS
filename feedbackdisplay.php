
<!-- Customer feedback_tb -->
<div class="">
        <div class="container text-center border-bottom">
            <h2 style="margin-top:30px;" class="text-center text-dark">Consumers Feedback</h2></div></div>
<?php
include('dbConnection.php');
    $sql="SELECT feed_name,feed_desc,feed_tag,feed_rate FROM `feedback_tb` ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        
        echo '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">';
        echo '<div class="carousel-inner" style="">';
        while($row=$result->fetch_assoc()){
        echo '<div class="carousel-item active mt-5" style="overflow:hidden; border-radius:10px;" data-bs-interval="2000">';
        echo '<div class="container shadow-lg bg-danger" style="height:50vh; width:50vw; border-radius:10px; display:grid; align-items:center;">';
        echo '<div>';
        echo '<h1 class="text-center text-light">`'.$row['feed_name'].'`</h1>';
        echo '<h3 class="text-center text-light">'.$row['feed_tag'].'</h3>';
        echo '<p class="text-center text-light">'.$row['feed_desc'].'</p>';
        echo '<p class="text-center text-light">Rating by Customer : '.$row['feed_rate'].'</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        }
        // echo '<div class="carousel-item" style="overflow:hidden;" data-bs-interval="10000">';
        // echo '<div class="container" style="background-color:pink; height:50vh; width:50vw; display:grid; align-items:center;">';
        // echo '<div>';
        // echo '<h1 class="text-center">1nd slide label</h1>';
        // echo '<p class="text-center">Some representative placeholder content for the third slide.</p>';
        // echo '</div>';
        // echo '</div>';
        // echo '</div>';

       echo '</div>';


        echo ' <button class="carousel-control-prev"  type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">';
        echo ' <span class="carousel-control-prev-icon bg-danger" aria-hidden="true">';
        echo '</span>';
        echo '<span class="visually-hidden">Previous</span>';
        echo ' </button>';

        echo ' <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">';
        echo ' <span class="carousel-control-next-icon bg-danger" aria-hidden="true">';
        echo '</span>';
        echo '<span class="visually-hidden">Next</span>';
        echo ' </button>';

       
        echo '</div>';



        // echo 'Request ID:'.$row['request_id'];
        // echo '</div>';
        // echo '<div class="card-body">';
        // echo '<h5 class="card-title">Request Info: '.$row['request_info'];
        // echo '</h5>';
        // echo '<p class="card-text">'.$row['request_desc'];
        // echo '</p>';
        // echo '<p class="card-text">'.$row['request_date'];
        // echo '</p>';
        // echo '<div style="float:right;">';
        // echo '<form action="" method="POST">';
        // echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
        //    echo '<input type="submit" class="btn btn-danger" style="margin-right:6px;" value="View" name="view">';
        //    echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';
        // echo '</form>';
        // echo '</div>';
        // echo '</div>';
        // echo '</div>';
        
    }
    ?>
<!-- 

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="">

            <div class="carousel-item active" style="overflow:hidden;" data-bs-interval="10000">

            <div class="container" style="background-color:green; height:50vh; width:50vw; display:grid; align-items:center;">
              <div> <h1 class="text-center">2nd slide label</h1>
                    <p class="text-center">Some representative placeholder content for the third slide.</p>
              </div>
            </div>
            </div>

            <div class="carousel-item" style="overflow:hidden;" data-bs-interval="10000">

            <div class="container" style="background-color:pink; height:50vh; width:50vw; display:grid; align-items:center;">
              <div> <h1 class="text-center">first slide label</h1>
                    <p class="text-center">Some representative placeholder content for the third slide.</p>
              </div>
            </div>
            </div>
           
            <div class="carousel-item" style="overflow:hidden;" data-bs-interval="10000">

            <div class="container" style="background-color:blue; height:50vh; width:50vw; display:grid; align-items:center;">
              <div> <h1 class="text-center">first slide label</h1>
                    <p class="text-center">Some representative placeholder content for the third slide.</p>
              </div>
            </div>
            </div>
           
            <div class="carousel-item" style="overflow:hidden;" data-bs-interval="10000">

            <div class="container" style="background-color:red; height:50vh; width:50vw; display:grid; align-items:center;">
              <div> <h1 class="text-center">first slide label</h1>
                    <p class="text-center">Some representative placeholder content for the third slide.</p>
              </div>
            </div>
            </div>
           
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->




