<?php
session_start();
error_reporting(0);
include('./model/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $divisionid=$_POST['divisionname'];
    $district=$_POST['district'];
    $query=mysqli_query($con, "insert into  tbldistrict(divisionID,district) value('$divisionid','$district')");
    if ($query) {
    
    echo "<script>alert('district has been added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-district.php'; </script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }

  
}
  ?>

<!DOCTYPE html>
<head>
<title>Food Donation Management System|| Add district  </title>


</head>
<body>

<?php include_once('./view/header.php');?>

<?php include_once('./view/sidebar.php');?>
<fieldset>
    <legend>Add District</legend>
    
    <form method="post" action="">

        <label for="adminname" >Division</label>
        <select name="divisionname" class="form-control wd-450" required="true" >
                    <option value="">Select Category</option>
              <?php $query=mysqli_query($con,"select * from tbldivision");
              while($row=mysqli_fetch_array($query))
              {
              ?>      
                  <option value="<?php echo $row['ID'];?>"><?php echo $row['divisionName'];?></option>
                  <?php } ?>
                  </select>
                  <label for="adminname" >district</label>
                  
                  <input  id="district" name="district" type="text" required="true" value="">
                  <p style="text-align: center;"> <button type="submit" name="submit">Add</button></p>

                </form>
                <?php include_once('./view/footer.php');?>   


</body>
</html>
<?php }  ?>