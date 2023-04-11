<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $statename=$_POST['statename'];
     $eid=$_GET['editid'];
    $query=mysqli_query($con, "update tblstate set StateName ='$statename' where ID=$eid");
    if ($query) {
   
    echo "<script>alert('State has been updated.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-state.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something went wrong. Please try again.');</script>";
    }

  
}
  ?>

<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Update Division  </title>

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

            <!-- page start-->
            
          

                    <section class="panel">
                        <header class="panel-heading">
                            Update Division
                           
                        </header>

                                 
   
                                <form class="cmxform form-horizontal " method="post" action="">
                                    <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblstate where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                                        <label for="adminname" class="control-label col-lg-3">State</label>

                                            <input class=" form-control" id="statename" name="statename" type="text" required="true" value="<?php  echo $row['StateName'];?>">


                                    <?php } ?>
                                   


                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Update</button></p>

                                </form>

                    </section>

</section>
 <!-- footer -->
		  <?php include_once('includes/footer.php');?>    
  <!-- / footer -->
</section>

</section>


</body>
</html>
<?php }  ?>