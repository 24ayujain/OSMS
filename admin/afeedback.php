<?php
include('../dbConnection.php');

?>
<?php
session_start();
define('TITLE', 'Feedback Form');

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}

include('includes/aheader.php');

?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
        <p class="bg-dark text-white p-2">Feedback Form Details</p>

    <?php
    $sql = "SELECT * FROM `feedback_tb` ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Feedback ID </th>';
        echo '<th scope="col">Name </th>';
        echo '<th scope="col">Email </th>';
        echo '<th scope="col">Tag </th>';
        echo '<th scope="col">Description </th>';
        echo '<th scope="col">Rating </th>';
        echo '<th scope="col">Advice </th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['feed_id'].'</td>';
        echo '<td>'.$row['feed_name'].'</td>';
        echo '<td>'.$row['feed_email'].'</td>';
        echo '<td>'.$row['feed_tag'].'</td>';
        echo '<td>'.$row['feed_desc'].'</td>';
        echo '<td>'.$row['feed_rate'].'</td>';
        echo '<td>'.$row['feed_sugg'].'</td>';

    }
    echo '<tr>';
    echo '<td>';
    
    echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">';
   
    echo '</td>';
    echo '</tr>';
        echo '<tbody>';
        echo '</table>';
    
    }
    
    
    ?>    







</div>
<?php
include('includes/afooter.php');

?>        