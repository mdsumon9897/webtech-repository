<?php
session_start();
// error_reporting(0);  // This line will hide all the given errors in php

// echo "<h1>Hello Login</h1>";
require_once '../../model/admin.php';

$everythingOK = FALSE;
$everythingOKCounter = 0;
$emailError = "";
$passwordError = "";

$email = "";
$password = "";
$_SESSION['emailError'] = "";
$_SESSION['passwordError'] = "";

$_SESSION['cookie_mail'] = "";
$_SESSION['cookie_pass'] = "";




if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Mail Validation
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['mail'];
        if (empty($email)) {
            $emailError = "Email is required";
            $_POST['mail'] = "";
            $email = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;

            echo "Mail error 1";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format";
            $email = "";
            $everythingOK = FALSE;
            $everythingOKCounter += 1;
            echo "Mail error 2";
        } else {
            $everythingOK = TRUE;
        }


        //* Password Validation
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = $_POST['password'];
            if (empty($password) || strlen($password) < 8) {
                // check if password size in 8 or more and  check if it is empty
                $passwordError = "Write at least 8 Character";
                $_POST['password'] = "";
                $password = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                echo "Pass error 1";
            } else if (!preg_match('/[@#$%]/', $password)) {
                // check if password contains at least one special character
                $passwordError = "Password must contain at least one special character (@, #, $, %).";
                $_POST['password'] = "";
                $password = "";
                $everythingOK = FALSE;
                $everythingOKCounter += 1;
                echo "Pass error 2";
            } else {
                $everythingOK = TRUE;
            }
        }




        // Remember Me
        // * Cookie Setting
        if (isset($_POST['rememberMe'])) {
            // Set the cookie for 1 day
            $email = $_POST['mail'];
            $password = $_POST['password'];
            setcookie('email', $email, time() + 100, '/');                         //(86400 * 1)); // 86400 seconds = 1 day
            setcookie('password', $password, time() + 100, '/');                   //(86400 * 1));
            echo 'rememberMe set';
        }

        // echo "Line 94";
        if ($everythingOK && $everythingOKCounter == 0) {
            // Check that id and password are correct
            // if correct, redirect to the home page

            // * issues Solved
            $data = show_single_admin_data("admin_mail", $email);
            $isadmin = FALSE;
            if (isset($data)) {


                if ($data["admin_mail"] === $email && $data["password"] === $password) {

                    $_SESSION["loginUser_Name"] = $data["admin_name"];
                    $_SESSION["loginUser_mail"] = $data["admin_mail"];
                    $_SESSION['mail'] = $email;
                    $_SESSION['password'] = $password;

                    $_SESSION["P_mail"] = $data["admin_mail"];
                    $_SESSION["P_password"] = $data["password"];
                    $_SESSION["P_name"] = $data["admin_name"];
                    $_SESSION["P_phone"] = $data["admin_phone"];
                    $_SESSION["P_id"] = $data["admin_id"];



                    echo "Working well 1<br>";
                    // header('Location:AdopterDashboard.php');
                    // header('Location: ../Views/Adopter/AdopterDashboard.php');
                    $isadmin = TRUE;
                    // break;
                } else {
                    // echo "ISSUES FOUND";
                }
                // }
                // If the code Comes here that means it could not find the id and password in the database.
                // So, Redirect the user to the login page
            }
            // header('Location: ../Views/Adopter/Login.php');
            //header('Location:Login.php');
            if ($isadmin) {
                header('Location: ../../view/admin/dashboard.php');
            } else {
                header('Location: ../../view/admin/admin_login.php');
            }
        } else {
            $_SESSION['emailError'] = $emailError;
            $_SESSION['passwordError']  = $passwordError;
            header('Location: ../../view/admin/admin_login.php');
        }
    }
}
