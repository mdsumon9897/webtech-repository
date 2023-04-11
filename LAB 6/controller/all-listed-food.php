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
<title>Food Donation Management System|| All Listed Food Requests</title>


</head>
<body>
<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>

<fieldset>
  <legend style="text-align: center;"><h3>All Listed Food Requests</h3></legend>

      <table >
        <thead>
          <tr>
            <th data-breakpoints="xs">Serial NO</th>
            <th>Food Id</th>
            <th>Register By</th>
            <th>Register Mobile Number</th>
            <th>Contact Person Number</th>
            <th>Contact Person Mobile Number</th>
            <th>Food Items</th>
            <th>Request Date</th>
            <th data-breakpoints="xs">Action</th>
           
           
          </tr>
        </thead>
        <?php
        $oid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select tblfood.ID,tblfood.foodId,tblfood.ContactPerson,tblfood.CPMobNumber,tblfood.CreationDate,tblfood.FoodItems,tbldonor.FullName,tbldonor.MobileNumber from  tblfood join tbldonor on tblfood.DonorID=tbldonor.ID");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<tbody>
  <tr data-expanded="true">
    <td style="text-align:center;"><?php echo $cnt;?></td>
    <td style="text-align:center;"><?php  echo $row['foodId'];?></td>
    <td style="text-align:center;"><?php  echo $row['FullName'];?></td>
    <td style="text-align:center;">+880 <?php  echo $row['MobileNumber'];?></td>
    <td style="text-align:center;"><?php  echo $row['ContactPerson'];?></td>
    <td style="text-align:center;"><?php  echo $row['CPMobNumber'];?></td>
    <td style="text-align:center;"><?php  echo $row['FoodItems'];?></td>
    <td style="text-align:center;"><?php  echo $row['CreationDate'];?></td>
             
    <td><a href="food-details.php?viewid=<?php echo $row['ID'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
            </table>
            
            
</fieldset>
<?php include_once('./view/footer.php');?>   


</body>
</html>
<?php }  ?>
