<?php
session_start();
error_reporting(0);
include('model/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
 header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['pgasaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];

 $query=mysqli_query($con,"update tblpages set PageTitle='$pagetitle',PageDescription='$pagedes' where  PageType='aboutus'");

    if ($query) {
    $msg="About Us has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
  ?>

<!DOCTYPE html>
<head>
<title>Food Donation Management System|| About US  </title>


</head>
<body>


<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>
<fieldset>
    <legend>Update About us</legend>

    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
}  ?> </p>

<form method="post" action="">

    <?php
    $ret=mysqli_query($con,"select * from  tblpages where PageType='aboutus'");

    $cnt=1;

    while ($row=mysqli_fetch_array($ret)) {

?>

<label for="adminname" class="control-label col-lg-3">Page Title</label>

<input id="pagetitle" name="pagetitle" type="text" required="true" value="<?php  echo $row['PageTitle'];?>">
<label for="adminname" class="control-label col-lg-3">Page Description </label>

<textarea id="pagedes" name="pagedes" type="text" required="true" value=""><?php  echo $row['PageDescription'];?></textarea>

<?php } ?>

<p style="text-align: center;"> <button type="submit" name="submit">Update</button></p>

</form>
</fieldset>

<?php include_once('./view/footer.php');?>    



</body>
</html>
<?php }  ?>