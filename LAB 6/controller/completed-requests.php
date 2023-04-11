<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{

?>


<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Completed Food Requests</title>


</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
     Food Take Away/ Request Completed Requests
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>Request Id</th>
            <th>Request By</th>
            <th>Requester Mobile Number</th>
            <th>Food Item</th>
            <th>Request Date</th>
            <th>Status</th>
            <th data-breakpoints="xs">Action</th>
           
           
          </tr>
        </thead>
        <tbody>
        <?php
$ret=mysqli_query($con,"select tblfoodrequests.id as frid,tblfood.ID as foodid,tblfood.FoodItems,tblfoodrequests.requestNumber,tblfoodrequests.fullName,tblfoodrequests.mobileNumber,tblfoodrequests.message,tblfoodrequests.requestDate,tblfoodrequests.status from
tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where (tblfoodrequests.status='Food Take Away/ Request Completed')");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
        
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <td><?php  echo $row['requestNumber'];?></td>
                  <td><?php  echo $row['fullName'];?></td>
                  <td><?php  echo $row['mobileNumber'];?></td>
                  <td><?php  echo $row['FoodItems'];?></td>
                  <td><?php  echo $row['requestDate'];?></td>
                   <?php if($row['status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['status'];?></td><?php } ?>
                  <td><a href="view-requestdetails.php?frid=<?php echo $row['frid'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}} else {?>
<tr>
  <td colspan="9" style="color:red">No Record Found</td>
</tr>

<?php } ?>  
 </tbody>
            </table>
            
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
		 <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>

</body>
</html>
<?php }  ?>