<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php
$nameErr = $emailErr = $genderErr = $degreeErr = $dobErr = $bloodErr = "";
$name = $email = $dateofbirth = $gender = $degree  = $bloodgroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
  if(empty($_POST["name"])){
    $nameErr = "Please Enter Your Name";
  }
  else{
    $name = $_POST['name'];
    if(!preg_match("/^[a-zA-Z- ]*$/", $name)){
    $nameErr =" Can contain a-z, A-Z, period, dash only. Please Re-enter Your Name";
    
       }
      else{
        if(str_word_count($name)<2){
            
          $nameErr = "Name should contains at least two words";
          if(!preg_match("/^[a-zA-Z]*$/", $name)){
            $nameErr="Name should be start letter";
          }
          else{
            $name = $_POST['name'];

          }
          
        
          
        }
       }
  }
  if (empty ($_POST['email'])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  
  if(empty($_POST['dateofbirth'])){
    $dobErr = "Please choose birth date ";
  }
  else{
    $dateofbirth = $_POST['dateofbirth'];
    if($dateofbirth<01-01-1953 && $dateofbirth>31-12-1998){
       $dobErr = "Enter a valid birth date "; 
    }
  }
  

  if(empty($_POST['gender'])){
    $genderErr = "Please select one option";
  }
  else{
    $gender = $_POST['gender'];
  }

  if(count($_POST['degree'])<2){ 
        $degreeErr = "Please select two of them ";
   }
   else{
    $degree = $_POST['degree'];
   }
  
  if(empty($_POST['bloodgroup'])){
    $bloodErr = "Please select one option";
  }
  else{
    $bloodgroup = $_POST['bloodgroup'];
  }
 }
  
?>
<form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">

     
        <label for="name"><b>NAME</b></label>
        <input type="text" name="name">
        <span style="color: red">*<?php echo $nameErr?><br></span><br>

  
        <label for="email"><b>EMAIL</b></label>
        <input type="text" name="email">
        <span style="color: red">*<?php echo $emailErr?><br></span><br>

    
        <label for="dateofbirth"><b>DATE OF BIRTH</b></label>
        <input type="date" name="dateofbirth" min="1953-01-01" max="1998-12-31">
        <span style="color: red">*<?php echo $dobErr?><br></span><br>
       

        <label for="gender">  <b>GENDER</b> </label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other
        <span style="color: red">*<?php echo $genderErr?><br></span><br>

      
        <label for= degree>  <b>DEGREE</b> </label>
        <input type="checkbox" name="degree[]" value="SSC">
        <label for="SSC">SSC</label>
        <input type="checkbox" name="degree[]" value="HSC">
        <label for="HSC">HSC</label>
        <input type="checkbox" name="degree[]" value="BSc">
        <label for="BSc">BSc</label>
        <input type="checkbox" name="degree[]" value="MSc">
        <label for="MSc">MSc</label>
        <span style="color: red">*<?php echo $degreeErr?><br></span><br>
   

        <label for= bloodgroup>  <b>BLOOD GROUP</b> </label>
          <select name="bloodgroup">
          <option selected disabled ></option>
          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="AB+">AB+</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="A-">A-</option>
          <option value="B-">B-</option>
          <option value="AB-">AB-</option>
          </select>
          <span style="color: red">*<?php echo $bloodErr?><br></span><br>

        <input type="submit" name="Submit" value="Submit">
    </fieldset>

</form>
<?php
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $dateofbirth; 
echo "<br>";
echo $gender; 
echo "<br>";
foreach ($degree as $key => $value) {
  echo $value . " ";
 } 
echo "<br>";
echo $bloodgroup; 


?>

</body>
</html>