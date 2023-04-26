<?php
session_start();

// Variable Declaration

require_once '../../model/admin.php';

if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:../view/admin/admin_login.php');
}


// Variables Declaration
$name = "";
$nameError = "";

$email = "";
$emailError = "";

$password = "";
$passwordError = "";



$phone = "";
$phoneError = "";

$JSON_Message = "";
$JSON_Error = "";

$everythingOK = FALSE;
$everythingOKCounter = 0;


$_SESSION['S_nameError'] = "";
$_SESSION['S_emailError'] = "";
$_SESSION['S_passwordError'] = "";
$_SESSION['S_phoneError'] = "";



$delete_flag_mail = $_SESSION["P_mail"];
$email = $_SESSION["P_mail"];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //TODO Validation for Name
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $wordCount = str_word_count($name);
        // echo $wordCount;
        if (empty($name)) {
            $nameError = "Name is required";
            $_POST['name'] = "";
            $name = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
            // echo "Name Error 1";
        } elseif ($wordCount < 2) {
            $nameError = "Write at least 2 words";
            $_POST['name'] = "";
            $name = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
            // echo " Error 2";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameError = "Only letters and white space and dash allowed";
            $_POST['name'] = "";
            $name = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
            // echo " Error 3";
        } else {
            $everythingOK = TRUE;
        }
    }







    //TODO  Validation for Phone

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $phone = $_POST['phone'];
        if (empty($phone)) {
            $phoneError = "Phone is required";
            $_POST['phone'] = "";
            $phone = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;


        } else {
            $everythingOK = TRUE;
        }
    }




    if ($everythingOK && $everythingOKCounter == 0) {



        $new_data = array(
            'admin_mail'          =>      $email,
            'password'     =>     $_SESSION['P_password'],
            'admin_name'               =>     $_POST['name'],
            'admin_phone'     =>     $_POST['phone'],

        );

        $copiedData = $new_data;
        $isSuccessful = update_admin_data("admin_id ", $_SESSION["P_id"], $new_data);
        if ($isSuccessful) {
            header("Location: ../../view/admin/admin_login.php");
        } else {
            header("Location: ../../view/admin/profile.php");
        }

        // #endregion ################################################################






    } else {

        $_SESSION['S_nameError'] = $nameError;
        $_SESSION['S_emailError'] = $emailError;
 
        $_SESSION['S_phoneError'] = $phoneError;
        // $_SESSION['S_addressError'] = $addressError;
        // $_SESSION['S_professionError'] = $professionError;
        echo "Everything is Not ok, There are errors and we are sending to the front page <br>";
        header('Location:../view/admin/profile.php');
    }
}
