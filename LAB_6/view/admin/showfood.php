<?php  
require_once '../../controller/admin/manage_action.php';

$food = fetchfood($_GET['id']);






?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php include '../admin/header.php'; ?>

    <?php include '../admin/sideber.php'; ?>


<fieldset>
    <legend><h3>Food Details</h3></legend>
    <label>Food Item : </label><a href="showfood.php?id=<?php echo $food['ID'] ?>"><?php echo $food['name'] ?></a><br><br>
    <label>Descriotion : </label><?php echo $food['description'] ?><br><br>
    <label>Pickup Date : </label><?php echo $food['date'] ?><br><br>
    <label>Pickup Address : </label><?php echo $food['address'] ?><br><br>
    <label>Contact Person : </label><?php echo $food ['person'] ?><br><br>
    <label>Phone Number : </label><?php echo $food ['phone'] ?><br><br>
    
    </fieldset><br>

<?php include '../admin/footer.php'; ?>


</body>
</html>
