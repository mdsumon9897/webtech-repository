<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<fieldset>
<label>
        <a href="dashboard.php"><h2>Admin</h2></a> 


        <?php
$adid=$_SESSION['pgasaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
        


        <h4 style="text-align: right;">
        <a href="admin-profile.php" style= "color:green;">Profile </a><br><a href="change-password.php" style= "color:green;">Change Password </a><br><a href="logout.php" style= "color:green;">Log Out </a></li>

</h4>
</label>
</fieldset>

