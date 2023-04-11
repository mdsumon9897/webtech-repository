<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $donorid=$_SESSION['pgasoid'];
    $divisionname=$_POST['division'];
    $districtname=$_POST['district'];
    $description=$_POST['description'];
    $pdate=$_POST['pdate'];
    $padd=$_POST['padd'];
    $contactperson=$_POST['contactperson'];
    $cpmobnum=$_POST['cpmobnum'];
    $fid=mt_rand(100000000, 999999999);
     $pic=$_FILES["images"]["name"];
     $extension = substr($pic,strlen($pic)-4,strlen($pic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$foodpic=md5($pic.time()).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$foodpic);

//Getting post values
$fitem=$_POST["fitem"]; 
$fitemarray=implode(",",$fitem);
    $query=mysqli_query($con, "insert into tblfood(DonorID,foodId,divisionName, districtName, FoodItems, Description, PickupDate,PickupAddress,ContactPerson,CPMobNumber,Image) value('$donorid','$fid','$divisionname','$districtname','$fitemarray','$description','$pdate','$padd','$contactperson','$cpmobnum','$foodpic')");

    if ($query) {
    echo "<script>alert('Food Detail added successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'add-food-details.php'; </script>";
  }
  else
    {
     echo "<script>alert('Something went wrong. Please try again.');</script>";
    }

}
}
  ?>
<!DOCTYPE html>
<head>
<title>Food Donation Management System  | Add Food Detail </title>



</head>
<body>

<?php include_once('includes/header.php');?>

<?php include_once('includes/sidebar.php');?>

<fieldset>
    <legend>List Your Food Details</legend>

    <label >Food Item</label>
    <tr>
        <td><input type="text" name="fitem[]" placeholder="Enter Food Items" class="form-control name_list" /></td>
        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
    </tr>
</table>
<label>Description</label>

<textarea  id="description" name="description" type="text" required="true" value="">
</textarea>
<label >Pickup Date</label>

<input id="pdate" name="pdate" type="date" required="true" value="">
<label >Pickup Address</label>
<textarea class="form-control" id="padd" name="padd" type="text" required="true" value="">
</textarea>

<label for="inputSuccess">Choose Division</label>

<select name="division" id="division" onChange="getdistrict(this.value);">

    <option value="">Choose Division</option>
    <?php $query=mysqli_query($con,"select * from tbldivision");
     while($row=mysqli_fetch_array($query))
        {
        ?>
        <option value="<?php echo $row['divisionName'];?>"><?php echo $row['divisionName'];?></option>
        <?php } ?> 
    </select>
    <label for="inputSuccess">Choose District</label>
    <select name="district" id="district" required="true">
        
    </select>
    <label >Contact Person</label>
    <input  id="contactperson" name="contactperson" type="text" required="true" value="">

    <label >Contact Person Mobile Number</label>
    <input type="text" class="form-control" name="cpmobnum" id="cpmobnum" required="true" value="" maxlength="11" pattern="[0-9]+">

    <label>Pictures</label>
    <input type="file" class="form-control" name="images" id="images" value="">

    <br>
    <button type="submit" name="submit">Submit</button>
</form>
</fieldset>
<?php include_once('./view/footer.php');?>   


</body>
</html>
<?php  } ?>
