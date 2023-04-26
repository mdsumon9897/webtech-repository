<?php
session_start();
$_SESSION['status'] = false;
session_destroy();
header('Location:../../view/admin/admin_login.php');