    <!-- contact form start -->


    <?php
    if(isset($_REQUEST['submitform'])){
        if($_REQUEST['name'] == "" || $_REQUEST['subject'] == "" || $_REQUEST['email'] == "" || $_REQUEST['message'] == "" ){
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">Please ALL FIELDS ARE REQUIRED!!!!!</div>';

        }else{
            $sql = "SELECT contact_email FROM `coontactform_tb` where contact_email = '".$_REQUEST['email']."' ";
            $result = $conn->query($sql);
            if($result->num_rows == 1){
                $regmsg = '<div class="alert alert-warning mt-2" role="alert">Contact Form is filled already through this email ID!!!!!</div>';
            }else{
                $contactname = $_REQUEST['name'];
                $contactsubject = $_REQUEST['subject'];
                $contactemail = $_REQUEST['email'];
                $contactmessage = $_REQUEST['message'];
                $sql = "INSERT INTO `coontactform_tb` (`contact_name`, `contact_subject`, `contact_email`, `contact_comment`) VALUES ('$contactname', '$contactsubject', '$contactemail', '$contactmessage')";
                $result = $conn->query($sql);
                if($result==TRUE){
                    $regmsg = '<div class="alert alert-success mt-2" role="alert">Your Form is submitted we will contact you via email.</div>';
                }
            }
        }


    }
    
    ?>
            <div class="col-md-8">
                <form action="" method="POST">
                    <input type="text" class="form-control" name="name" placeholder="Name"><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                    <input type="email" class="form-control" name="email" placeholder="Email"><br>
                    <textarea name="message" id="" cols="20" rows="10" class="form-control"
                        placeholder="How can we help you?"></textarea><br>
                    <input type="submit" class="btn btn-primary" name="submitform" value="Send"><br><br>
                    <?php
                            if(isset($regmsg)){echo $regmsg ;}
                            
                            ?>
                </form>
            </div>
    <!-- contact form end -->