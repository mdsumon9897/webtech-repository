<?php  
require_once '../../controller/donor/manage_action.php';

$foods = fetchAllfoods();



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<?php include './header.php'; ?>

    <?php include './sideber.php'; ?>
    

<fieldset>
    <legend>
        <h3>Manage Food</h3>
    </legend>


<table>
	<thead>
		<tr>

			<th>Food Items</th>
			<th>Description</th>
			<th>Pickup Date</th>
			<th>Pickup Address</th>
			<th>Contact Person</th>
			<th>Phone Number</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody style="text-align: center;">
        
		<?php foreach ($foods as $i => $food): ?>
			<tr>
				<td><?php echo $food['name'] ?></a></td>
				<td><?php echo $food['description'] ?></td>
				<td><?php echo $food['date'] ?></td>
				<td><?php echo $food['address'] ?></td>
				<td><?php echo $food ['person'] ?></td>
				<td><?php echo $food ['phone'] ?></td>
				<td><a href="showfood.php?id=<?php echo $food['ID'] ?>">Food Details</a></td>
			</tr>
		<?php endforeach; ?>
	

	</tbody>
	

</table>

</fieldset><br>
<?php include './footer.php'; ?>
</body>
</html>
