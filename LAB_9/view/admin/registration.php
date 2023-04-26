<?php
session_start();
// error_reporting(0);  // This line will hide all the given errors in php


//  Variable Declarations
$nameError = "";
$emailError = "";
$passwordError = "";
$genderError = "";
$phoneError = "";
$addressError = "";
$professionError = "";

// $nameError = $_SESSION['S_nameError'];

if (isset($_SESSION['S_nameError'])) {
    // echo "<h1>Name Error found</h1>";
    $nameError = $_SESSION['S_nameError'];
    unset($_SESSION['S_nameError']);
}


if (isset($_SESSION['S_emailError'])) {
    $emailError = $_SESSION['S_emailError'];
    unset($_SESSION['S_emailError']);
}


if (isset($_SESSION['S_passwordError'])) {
    $passwordError = $_SESSION['S_passwordError'];
    unset($_SESSION['S_passwordError']);
}

if (isset($_SESSION['S_genderError'])) {
    $genderError = $_SESSION['S_genderError'];
    unset($_SESSION['S_genderError']);
}

if (isset($_SESSION['S_phoneError'])) {
    $phoneError = $_SESSION['S_phoneError'];
    unset($_SESSION['S_phoneError']);
}

if (isset($_SESSION['S_addressError'])) {
    $addressError = $_SESSION['S_addressError'];
    unset($_SESSION['S_addressError']);
}

if (isset($_SESSION['S_professionError'])) {
    $professionError = $_SESSION['S_professionError'];
    unset($_SESSION['S_professionError']);
}

// echo "<h1>Hii</h1>";


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
   

</head>

<body style="text-align: center; width:500px;position: absolute;top: 5%;
            left: 30%;" >

    <fieldset>
        <legend>
            <h2>Sign Up</h2>
        </legend>


        <form action="../../controller/admin/registration_handler.php" method="POST">


                <label>Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your name">
                <span class="required">&nbsp; * &nbsp;<?php echo $nameError; ?></span>
                <br><br>


                <label>E-mail</label>
                <input type="text" name="email" id="email" placeholder="Enter Your Email">
                <span class="required">&nbsp; * &nbsp;<?php echo $emailError; ?></span>
                <br><br>



                <label>Password</label>
                <input type="text" name="password" id="password" placeholder="Enter Your Password">
                <span class="required">&nbsp; * &nbsp;<?php echo $passwordError; ?></span>
                <br><br>




  

                <label>Phone</label>
                <input type="text" name="phone" id="phone" placeholder="Enter Your Phone">
                <span class="required">&nbsp; * &nbsp;<?php echo $phoneError; ?></span>
                <br><br>



                <button type="submit" class="signin-button">Signup</button>
                </span></p>

                <span><a href="../../index.php">HOME</a></span>
        </form>

    </fieldset>



</body>

</html>