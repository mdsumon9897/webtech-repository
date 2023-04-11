<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['pgasaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
  ?>
<!DOCTYPE html>
<head>
<title>Food Donation Management System | Login Page</title>

</head>
<body >

<div style="background-color:  lightseagreen;">
	<h2 style="color:white;">Sign In Now</h2>
		<form action="#" method="post" name="login">
			<label>User Name</<label><br>
			<input type="text" class="ggg" name="username" placeholder="User Name" required="true"><br>
            <label>Password</<label><br>
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="true"><br>
			
			<a href="forgot-password.php">Forgot Password?</a>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>

   
     <i ><a href="../index.php">Home Page</a></i>


</body>
</html>

