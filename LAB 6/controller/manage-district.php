<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{
    //
if(isset($_GET['del']))
{
  $rid=$_GET['del'];
  $query=mysqli_query($con,"delete from tbldistrict  where ID='$rid'");
  echo "<script>alert('Data Deleted');</script>";
}

?>


<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Manage district </title>

</head>
<body>

<?php include_once('includes/header.php');?>

<?php include_once('includes/sidebar.php');?>


<fieldset>
  <legend  style="text-align: center;"><h3>Manage District</h3></legend>

  
      <table >
        <thead>
          <tr>
            <th>Serial NO</th>
            <th>District Name</th>
            <th>Creation Date</th>
            <th>Action</th>

          </tr>
        </thead>
        <?php
$ret=mysqli_query($con,"select * from  tbldistrict");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr data-expanded="true">
            <td style="text-align: center;"><?php echo $cnt;?></td>
              
                  <td style="text-align: center;"><?php  echo $row['district'];?></td>
                  <td style="text-align: center;"><?php  echo $row['CreationDate'];?></td>
                  <td style="text-align: center;"><a href="edit-district.php?editid=<?php echo $row['ID'];?>">Edit district</a> | <a href="manage-district.php?del=<?php echo $row['ID'];?>">Delete</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
            </table>
            
</fieldset>
		 <?php include_once('includes/footer.php');?>  


</body>
</html>
<?php }  ?>
