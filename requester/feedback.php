<?php
include('../dbConnection.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}
// }else{
//     $sql = "SELECT feed_email FROM `feedback_tb` where feed_email = '".$_REQUEST['email']."' ";
//     $result = $conn->query($sql);
//     if($result->num_rows == 1){
//         $regmsg = '<div class="alert alert-danger mt-2" role="alert">Feedback Form is filled already filled through this id!</div>';
//     }else{
//     echo "<script>location.href='RequesterLogin.php'</script>";
// }
//}
if(isset($_REQUEST['submitfeedback'])){
    if(( $_REQUEST['name']== "") || ( $_REQUEST['tagline']== "") ||  ( $_REQUEST['desc']== "") ||  ( $_REQUEST['rate']== "")){ 
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">ALL FIELDS ARE REQUIRED!!!!!</div>';
    }else{
    $email = $_REQUEST['email'];     
    $name = $_REQUEST['name']; 
    $tagline = $_REQUEST['tagline'];
    $desc = $_REQUEST['desc'];
    $rate = $_REQUEST['rate'];
    $sugg = $_REQUEST['sugg'];
 
    $sql = "INSERT INTO `feedback_tb` (`feed_email`, `feed_name`, `feed_tag`, `feed_desc`, feed_rate,feed_sugg) VALUES ('$email','$name', '$tagline', '$desc', '$rate', '$sugg')";
    if($conn->query($sql)==TRUE){
        $regmsg = '<div class="alert alert-success mt-2" role="alert">THANKS FOR YOUR TIME!!!!!</div>';
    }else{
     $regmsg = '<div class="alert alert-danger mt-2" role="alert">Please refill!!</div>';
 
    }
    }
 }


define('TITLE','Feedback');
define('PAGE','RequesterProfile');

include("includes/header.php");
?>


<div class="col-sm-10" style="margin-top:5rem;">
   
<!-- feedback form start -->
<div class="container pt-0" id="feedback">
    <h2 class="text-center">Feedback Form</h2>
    <!-- <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3"> -->
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-1x fa-user"></i>
                    <label for="name" class="font-weight-bold pl-2" style="padding:11px;">Registered Email</label><br>
                    <input type="text" class="form-control" readonly value = "<?php echo $rEmail; ?>" name="email">
                </div>
                <break>
                <div class="form-group">
                    <i class="fas fa-1x fa-user"></i>
                    <label for="name" class="font-weight-bold pl-2" style="padding:11px;">Name</label><br>
                    <input type="text" class="form-control" placeholder ="sir/mam" name="name">
                </div><br>
                    <div class="form-group">
                        <i class="fas fa-1x fa-user"></i>
                        <label for="tag" class="font-weight-bold pl-2" style="padding:11px;">Your tag comment</label><br>
                        <input type="text" class="form-control" placeholder="like Amazing!, Helpful..." name="tagline">
                        
                    </div>
                    <break>
                    <div class="form-group">
                        <i class="fas fa-1x fa-user"></i>
                        <label for="desc" class="font-weight-bold pl-2" style="padding:11px;">Describe your Experience</label><br>
                        <input type="text" class="form-control" placeholder="I am happy to choose you as ....." name="desc">
                        
                    </div><br>

                    <div class="form-group">
                        <i class="fas fa-1x fa-user"></i>
                        <label for="rate" class="font-weight-bold pl-2" style="padding:11px;">Rate Us</label><br>
                        <input type="radio"  value="Very Good" name="rate"><label for="1">Very Good</label>
                        <input type="radio"  value="Good" name="rate"><label for="1">Good</label>
                        <input type="radio"  value="Satisfactory" name="rate"><label for="1">Satisfactory</label>
                        <input type="radio"  value="Bad experience" name="rate"><label for="1">Bad experience</label>
                        <input type="radio"  value="Poor Services" name="rate"><label for="1">Poor Services</label>

                        
                    </div><br>

                    <div class="form-group">
                        <i class="fas fa-1x fa-user"></i>
                        <label for="desc" class="font-weight-bold pl-2" style="padding:11px;">Any Suggestions/Advice</label><br>
                        <input type="text" class="form-control" placeholder="(Optional) ....." name="sugg">
                        
                    </div><br>

                        <button type="submit" style="width:-webkit-fill-available;"
                            class="btn btn-danger shadow-sm font-weight-bold mt-5" name="submitfeedback">Submit</button>
                        <em style="font-size:10px;">We are highly obliged for your true feedback and continue to bring changes as per your requests and suggestions.</em><br>
                        <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
            </form>
        <!-- </div>
    </div> -->
</div>
<!-- feedback form end -->

</div>


<?php
include("includes/footer.php");
?>