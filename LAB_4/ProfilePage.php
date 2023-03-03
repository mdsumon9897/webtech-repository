<?php
$name = $name = $email = $gender = $dob = ""; 
session_start();
if(isset( $_SESSION['username'])){
    $name = $_SESSION['username'];
}
if(empty($name)){
    header("location:Login.php");
}

            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $username = $Info->username;
            if($username==$name){
               $name = $Info->name;
               $email = $Info->email ;
               $gender = $Info->gender ;
               $dob =$Info->dob ;


              }
            }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

</head>
<body style="width: 800px;" >
    <fieldset>
          <span> <h1 align="left">X Company</h1><h3 align="right">
            <a href='ProfilePage.php'>Logged in as <?php echo $username ?>, |</a> <a href='Logout.php'>Logout</a>
        </h3></span>
     </fieldset>

    <?php include ('./account.php'); ?>  

    <form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <fieldset>
        <legend> <h2 class="main-heading">Profile</h2> </legend>

        
        <label for="name">Name  : <?php echo $name?> </label><br>
        <span class="underline">______________________</span><br> 
        <label for="email">Email  : <?php echo $email?> </label><br>
        <span class="underline">______________________</span><br> 
        <label for="gender">Gender  : <?php echo $gender?> </label><br>
        <span class="underline">______________________</span><br>
        <label for="dob">Date of Birth  : <?php echo $dob?> </label><br>
        <span class="underline">______________________</span><br><br>          
        <a href="EditProfile.php" style= "color:cyan;">Edit Profile</a>
    </fieldset>


<?php include ('./footer.php'); ?>              
</body>
</html>