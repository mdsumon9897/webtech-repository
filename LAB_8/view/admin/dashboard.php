<?php

require_once '../../model/admin.php';

error_reporting(0);
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    header('Location:login.php');
}


$P_id = $_SESSION["P_id"];



?>

<html>
    <head>
        <title>admin Dashboard</title>
    </head>
    <body>
    <?php include '../admin/header.php'; ?>

    <?php include '../admin/sideber.php'; ?>
    

    <p style="text-align: center;"><b>Welcome </b> to <b>Food Donation Management System</b></p>

    <?php include '../admin/footer.php'; ?>
    </body>
</html>