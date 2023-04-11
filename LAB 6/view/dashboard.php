<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE html>
<head>
<title>Food Donation Management System | dashboard </title>

</head>
<body>
<section id="container">
<!--header start-->

<!--header end-->
<?php include_once('includes/header.php');?>
<!--sidebar start-->

<!--sidebar end-->
<?php include_once('includes/sidebar.php');?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">

					<fieldset>
						<legend style="text-align: center;">Dashboard</legend>
						<?php $query1=mysqli_query($con,"Select * from  tbldivision");
$divisioncounts=mysqli_num_rows($query1);
?><h4><a href="manage-division.php" >Total Division</a></h4>
					<h3><?php echo $divisioncounts;?></h3>
		<!-- //market-->

	




					<?php $query2=mysqli_query($con,"Select * from  tbldistrict");
$districtcounts=mysqli_num_rows($query2);
?>

					<h4><a href="manage-district.php" >Total District</a></h4>
						<h3><?php echo $districtcounts;?></h3>




					<?php $query3=mysqli_query($con,"Select * from  tbldonor");
$donorcounts=mysqli_num_rows($query3);
?>

					<h4><a href="manage-donor-details.php" >Total Food Donor</a></h4>
						<h3><?php echo $donorcounts;?></h3>
						


					<?php 
					$query=mysqli_query($con,"Select tblfood.DonorID,tbldonor.ID from  tblfood join tbldonor on  tbldonor.ID=tblfood.DonorID");
$totallistedfood=mysqli_num_rows($query);
?>

					<h4><a href="all-listed-food.php" >Total Listed Food</a></h4>
						<h3><?php echo $totallistedfood;?></h3>



	<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId");
$allrequests=mysqli_num_rows($query);
?>

					<a href="all-requests.php"><h4>All Requests </h4></a>
						<h3><?php echo $allrequests;?></h3>



			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where   (tblfoodrequests.status is null || tblfoodrequests.status='')");
$newrequest=mysqli_num_rows($query);
?>

	

					<a href="new-requests.php"><h4>New Requests </h4></a>
						<h3><?php echo $newrequest;?></h3>



			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where  (tblfoodrequests.status='Request Rejected')");
$rejected=mysqli_num_rows($query);
?>


					<a href="rejected-requests.php"><h4>Rejected Requests </h4></a>
						<h3><?php echo $rejected;?></h3>



			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where (tblfoodrequests.status='Food Take Away/ Request Completed')");
$completed=mysqli_num_rows($query);
?>


					<a href="completed-requests.php"><h4>Food Take Away/ Request Completed </h4></a>
						<h3><?php echo $completed;?></h3>
					</fieldset>


</section>
 <!-- footer -->
	<?php include_once('includes/footer.php');?>	  
  <!-- / footer -->
</section>

</body>
</html>
