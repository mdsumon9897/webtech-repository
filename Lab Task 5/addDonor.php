<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php 
        include "nav.php";

     ?>
   

 <form action="controller/createDonor.php" method="POST" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="surname">Surname:</label><br>
  <input type="text" id="surname" name="surname"><br>
  <label for="username">User Name:</label><br>
  <input type="text" id="username" name="username"><br>
  <label for="password">Address :</label><br>
<input type="text" id="address" name="address"><br>
<label for="password">Password:</label><br>
  <input type="password" id="password" name="password"><br>

  <input type="submit" name = "createDonor" value="Create">
  <input type="reset"> 
</form> 

</body>
</html>

