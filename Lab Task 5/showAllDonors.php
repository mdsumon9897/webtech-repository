<?php  
require_once 'controller/donorInfo.php';

$students = fetchAllDonors();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Surname</th>
			<th>Username</th>
            <th>Address</th>
			<th>Password</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($donors as $i => $donor): ?>
			<tr>
				<td><a href="showDonor.php?id=<?php echo $donor['ID'] ?>"><?php echo $donor['Name'] ?></a></td>
				<td><?php echo $donor['Surname'] ?></td>
				<td><?php echo $donor['Username'] ?></td>
                <td><?php echo $donor['Address']?></td>
				<td><?php echo $donor['Password'] ?></td>
				<td><img width="100px" src="uploads/<?php echo $donor['image'] ?>" alt="<?php echo $donor['Name'] ?>"></td>
				<td><a href="editDonor.php?id=<?php echo $donor['ID'] ?>">Edit</a>&nbsp<a href="controller/deleteDonor.php?id=<?php echo $donor['ID'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>
