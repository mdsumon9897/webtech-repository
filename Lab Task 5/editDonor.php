<?php 

require_once 'controller/studentInfo.php';
$student = fetchStudent($_GET['id']);


 include "nav.php";



 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <form action="controller/updateDonor.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input value="<?php echo $donor['Name'] ?>" type="text" id="name" name="name"><br>
  <label for="surname">Surname:</label><br>
  <input value="<?php echo $donor['Surname'] ?>" type="text" id="surname" name="surname"><br>
  <label for="username">User Name:</label><br>
  <input value="<?php echo $donor['Username'] ?>" type="text" id="username" name="username"><br>

  <input type="file" name="image"><br><br>
  <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
  <input type="submit" name = "updateDonor" value="Update">
  <input type="reset"> 
</form> 

</body>
</html>

