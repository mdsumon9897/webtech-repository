
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
</head>
<body>

	<?php

     $fname = $lname = $dateofbirth = $gender = $degree  = $university = $credit = "";

    if(isset ($_POST['Submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dateofbirth = $_POST['dateofbirth'];
        $gender = $_POST['gender'];
        $degree = $_POST['degree'];
        $university = $_POST['university'];
        $credit = $_POST['credit'];

    
    }


	
?>

<form method= "post" action="<?php echo $_SERVER['PHP_SELF'];?>">

	<label for="fname"><h3>First Name</h3></label>
	<input type="text" name="fname" >
	<span style="color: red">*<br></span>
	<br>
	<label for="lname"><h3>Last Name</h3></label>
	<input type="text" name="lname">
    <span style="color: red">*<br></span>
    <br>

    <label for="dateofbirth"><h3>DATE OF BIRTH</h3></label>
    <input type="date" name="dob">
    <span style="color: red">*<br></span>
    <br>

    <label><h3>GENDER</h3></label>
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <input type="radio" name="gender" value="Other">Other
    <span style="color: red">*<br></span>
    <br>

    <label><h3>DEGREE</h3></label>
    <input type="checkbox" name="degree[]" value="SSC">
    <label for="SSC">SSC</label>
    <input type="checkbox" name="degree[]" value="HSC">
    <label for="HSC">HSC</label>
    <input type="checkbox" name="degree[]" value="BSc">
    <label for="BSc">BSc</label>
    <span style="color: red">*<br></span>
    <br>

    <label for="university"><h3>University</h3></label>
    <select name="university">
    <option selected disabled ></option>
    <option value="AUST">AUST</option>
    <option value="BUP">BUP</option>
    <option value="AIUB">AIUB</option>
    <option value="NSU">NSU</option>
    <option value="IUB">IUB</option>
    <option value="UIU">UIU</option>
    <option value="MIST">MIST</option>
    <option value="BRAC">BRAC</option>
    <option value="DU">DU</option>
    <option value="BUET">BUET</option>
    <option value="SUST">SUST</option>
    <option value="HUST">HUST</option>

    </select>
    <span style="color: red">*<br></span>
    <br>

    <label for ="credit"><h3>Credit complete</h3></label>
    <input type="number" name="credit" min="0">
    <br><br>

    <input type="submit" name="Submit" value="Submit" >


</form>

<?php
echo $fname;
echo "<br>";
echo $lname;
echo "<br>";
echo $dateofbirth; 
echo "<br>";
echo $gender; 
echo "<br>";
foreach ($degree as $key => $value) {
    echo $value . " ";
 } 
echo $university;
echo "<br>";
echo $credit;

?>

</body>
</html>
