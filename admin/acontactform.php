<?php
include('../dbConnection.php');

?>
<?php
session_start();
define('TITLE', 'Details Contact Form');

if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
}else{
    echo "<script>  location.href = 'alogin.php'</script>";
}

include('includes/aheader.php');

?>

<div class="col-sm-9 col-md-10 mt-5 text-center">
        <p class="bg-dark text-white p-2">Contact Form Details</p>

    <?php
    $sql = "SELECT * FROM `coontactform_tb` ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Contact ID </th>';
        echo '<th scope="col">Name </th>';
        echo '<th scope="col">Subject </th>';
        echo '<th scope="col">Email </th>';
        echo '<th scope="col">Description </th>';
        
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['contact_id'].'</td>';
        echo '<td>'.$row['contact_name'].'</td>';
        echo '<td>'.$row['contact_subject'].'</td>';
        echo '<td>'.$row['contact_email'].'</td>';
        echo '<td>'.$row['contact_comment'].'</td>';

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