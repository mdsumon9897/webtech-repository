<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['pgasaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    echo "<script>alert('Profile details updated successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'admin-profile.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
  }
  ?>

<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Admin Profile  </title>


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
		<div class="form-w3layouts">
            <!-- page start-->
            
          <fieldset>
            <legend>Admin Profile</legend>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        
                        <div class="panel-body">
                            <div class="form">
                               

   <?php
$adminid=$_SESSION['pgasaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<form  method="post" action="">
  <label for="adminname" >Admin Name</label>
  <input class=" form-control" id="adminname" name="adminname" type="text" value="<?php  echo $row['AdminName'];?>">
  <br>
  <label for="lastname" >User Name</label>
  <input  id="username" name="username" type="text" value="<?php  echo $row['UserName'];?>" required="true" readonly='true'>
  <label for="username" >Contact Number</label>
  <input id="contactnumber" name="contactnumber" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true">
  <label for="email">Email</label>
  <input   id="email" name="email" type="email" value="<?php  echo $row['Email'];?>" required="true" readonly='true'>
  <?php } ?>
  <p style="text-align: center;"> <button  type="submit" name="submit">Update</button></p>
</form>
</fieldset>
<?php include_once('./view/footer.php');?>   


</body>
</html>
<?php }  ?>