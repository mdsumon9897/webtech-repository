<?php  
require_once 'controller/donorInfo.php';

$student = fetchStudent($_GET['id']);


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
	<tr>
		<th>Name</th>
		<th>Surname</th>
		<th>Username</th>
        <th>Address</th>
		<th>Password</th>
		<th>Image</th>
	</tr>
	<tr>
		<td><a href="showDonor.php?id=<?php echo $donor['ID'] ?>"><?php echo $student['Name'] ?></a></td>
		<td><?php echo $donor['Surname'] ?></td>
		<td><?php echo $donor['Username'] ?></td>
		<td><?php echo $donor['Password'] ?></td>
		<td><img width="100px" src="uploads/<?php echo $donor['image'] ?>" alt="<?php echo $donor['Name'] ?>"></td>
	</tr>

</table>


</body>
</html>
