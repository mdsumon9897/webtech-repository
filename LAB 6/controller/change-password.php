<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['pgasaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
echo '<script>alert("Your password successully changed.")</script>'; 
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}



}

  
  ?>




<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Change Password  </title>


</head>
<body>

<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->



            <!-- page start-->
            
          <fieldset>
              <legend style="text-align:center;">Change Password</legend>
          

                  



               <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>                  

  <?php
  
$adminid=$_SESSION['pgasaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>

                                <form class="cmxform form-horizontal " method="post" action="" name="changepassword" onsubmit="return checkpass();">

                                        <label for="adminname" class="control-label col-lg-3">Current Password: </label>
                                            <input type="password" name="currentpassword" class=" form-control" required= "true" value="">

                                            <br>


                                        <label for="lastname" class="control-label col-lg-3">New Password:</label>

                                           <input type="password" name="newpassword" class="form-control" value="">

                                           <br>


                                        <label for="username" class="control-label col-lg-3">Confirm Password:</label>

                                            <input type="password" name="confirmpassword" class="form-control" value="">


                                   
                                    <?php } ?>
                        
                                  

                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Change</button></p>
                                           



                                </form>



</fieldset>

 <!-- footer -->
		  <?php include_once('includes/footer.php');?>    
  <!-- / footer -->





</body>
</html>
<?php }  ?>