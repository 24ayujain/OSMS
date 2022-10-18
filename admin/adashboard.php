<?php
include('../dbConnection.php');

?>
<?php
session_start();
define('TITLE', 'Dashboard');

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}

//for no. of requests
$sql = "SELECT max(request_id) FROM requestsubmit_tb";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$submitrequest = $row[0];//fetching column 0 which is id

//for no. of assigned
$sql = "SELECT max(request_id) FROM assignwork_tb";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$submitassign = $row[0];//fetching column 0 which is id

//for no. of technician
$sql = "SELECT max(emp_id) FROM techniciandb_tb";
$result = $conn->query($sql);
$row = mysqli_fetch_row($result);
$techassign = $row[0];//fetching column 0 which is id


include('includes/aheader.php');



?>



<!-- Start dashboard -->

<div class="col-sm-9 col-md-10">
    <div class="row text-center mx-5">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width:18rem; margin-top: 75px;">
                <div class="card-header">
                    Requests Received
                </div>
                <div class="card-body">
                    <div class="card-title"><?php echo $submitrequest; ?></div>
                    <a href="arequests.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width:18rem; margin-top: 75px;">
                <div class="card-header">
                    Requests Assigned
                </div>
                <div class="card-body">
                    <div class="card-title"><?php echo $submitassign; ?></div>
                    <a href="aworkorder.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width:18rem; margin-top: 75px;">
                <div class="card-header">
                    No. of Technicians
                </div>
                <div class="card-body">
                    <div class="card-title"><?php echo $techassign; ?></div>
                    <a href="atechnician.php" class="btn text-white">View</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end of dashboard boxes -->

    <div class="mx-5 mt-5 text-center">
        <p class="bg-dark text-white p-2">List of Requests</p>
        <?php
                    $sql = "SELECT * FROM `requesterlogin_tb`";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        echo '<table class="table">
                        <thead>
                        <tr>
                        <th scope="col">Requester ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        
                        </tr>
                        </thead>
                        <tbody>';
                        while($row = $result->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>'.$row["r_login_id"].'</td>';
                            echo '<td>'.$row["r_name"].'</td>';
                            echo '<td>'.$row["r_email"].'</td>';
                            echo '</tr>';
                        }
                        
                        echo '</tbody> 
                        </table>';
                    }else{
                        echo '0 Result';  
                    }
                    
                    ?>
    </div>
</div>

<?php
include('includes/afooter.php');

?>
