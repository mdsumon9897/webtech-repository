<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Forgot Password</title>
</head>
<body style="width:800px;">

 <?php
$passwordErr = $l = "";
$password = "";
if(isset ($_POST['Submit'])){
 $p = $_POST['email'];

if(empty($password)){
  $passwordErr = "Please fill up all the informations!";
 }
 else{
  if(!preg_match( "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $password)){
  $passwordErr =" Invalid Email !";
      }
        else{
             $cu = "jb";
            $info = file_get_contents("data.json");
            $info = json_decode($info);
            foreach ($info as $Info) {
              $username = $Info->email;
              if($username==$password){
               $cu = "";
              }
            }
                        
            if(empty($cu)){
            $l = "There is an account with this email. ";
             }
        else{
          $l = "Sorry...There is no account with this email!";
         }
        }
 }
}
?>
     <?php include('./header.php');?>
     <fieldset>
      <legend>FORGOT PASSWORD</legend>
      <label for="email" >Enter Email :</label>
      <input type="text" name="email"><span style="color: red">*<?php echo $passwordErr?><br></span>  
        <span class="underline">__________________________________</span><br><br> 
        <input type="submit" name="Submit" value="Submit">
     </fieldset>

 <?php include('./footer.php'); ?>

</body>
</html>