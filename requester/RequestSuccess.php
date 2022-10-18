<?php
define('TITLE','Your Receipt');
include("includes/header.php");
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script>location.href='RequesterLogin.php'</script>";
}
$sql = "SELECT * FROM `requestsubmit_tb` WHERE request_id = {$_SESSION['myid']} ";
$result= $conn->query($sql);
if($result->num_rows==1){
    $row = $result->fetch_assoc();
    echo "<div class='col-sm-9 col-md-10' style='margin-top:10px; @media (min-width: 768px) {
          width: 0%;'>
    <div class='mt-5 ml-5'>
    <div class='text-center'><h2>Confirmation Receipt</h2></div>

             <table class='table'>
             <tbody>
             <tr>
             <th>Request ID</th>
             <td>".$row['request_id']."</td>
             </tr>
             <tr>
             <th>Name</th>
             <td>".$row['request_name']."</td>
             </tr>
             <tr>
             <th>Description</th>
             <td>".$row['request_desc']."</td>
             </tr>
             <tr>
             <th>Address Line 1</th>
             <td>".$row['request_add1']."</td>
             </tr>
             <tr>
             <th>Address Line 2</th>
             <td>".$row['request_add2']."</td>
             </tr>
             <tr>
             <th>City</th>
             <td>".$row['request_city']."</td>
             </tr>
             <th>State</th>
             <td>".$row['request_state']."</td>
             </tr>
             <tr>
             <th>Mobile</th>
             <td>".$row['request_mobile']."</td>
             </tr>
             <tr>
             <th>Email</th>
             <td>".$row['request_email']."</td>
             </tr>
             <th>Email</th>
             <td>".$row['request_date']."</td>
             </tr>

             <tr>
             <th>Have a copy</th>
             <td>
             <form class='d-print-none'>
             <input type='submit' class='btn btn-danger' value='Print' onClick='window.print()'>
             <br><br>
             </form>
             </td>
             </tr>
             </tbody>
             </table>
         </div></div>";
         
}else{
    echo "Failed";
}

?>


<?php




?>

<?php
include("includes/footer.php");
?>