<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $divisionid=$_POST['divisionname'];
    $eid=$_GET['editid'];
    $district=$_POST['district'];
    $query=mysqli_query($con, "update tbldistrict set divisionID='$divisionid',district='$district' where ID='$eid'");
    if ($query) {
   echo "<script>alert('district has been updated.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-district.php'; </script>";
  }
  else
    {
     echo "<script>alert('Something went wrong. Please try again.');</script>";
    }

  
}
  ?>

<!DOCTYPE html>
<head>
<title>Food Donation Management System || Update District  </title>

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
                            Update District

                        </header>

                                 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

   
                                <form class="cmxform form-horizontal " method="post" action="">
                                   <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select tbldistrict.ID as ctyid,tbldistrict.district as districtname,tbldivision.divisionName as stname,tbldivision.ID as stid from tbldistrict join tbldivision on tbldivision.id=tbldistrict.divisionID where tbldistrict.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<div class="form-group ">
                                        <label for="adminname" class="control-label col-lg-3">division</label>

                                             <select name="divisionname" class="form-control wd-450" required="true" >
                    <option value="<?php echo $row['stid'];?>"><?php echo $row['stname'];?></option>
              <?php $query=mysqli_query($con,"select * from tbldivision");
              while($rw=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $rw['ID'];?>"><?php echo $rw['divisionName'];?></option>
                  <?php } ?>
                  </select>

                                        <label for="adminname" class="control-label col-lg-3">district</label>
 
                                            <input class=" form-control" id="district" name="district" type="text" required="true" value="<?php  echo $row['districtname'];?>">
    
                                          <p style="text-align: center;"> <button class="btn btn-primary" type="submit" name="submit">Update</button></p>

                                </form>
                                <?php } ?>

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