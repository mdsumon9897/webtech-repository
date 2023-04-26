<?php
session_start();
if (!isset($_SESSION["loginUser_Name"])) {
    // die("You are not logged in");
    header("Location: ../../view/admin/admin_login.php");
}


?>

<header>


            <ul>

                <li><a
                        href="../../view/admin/profile.php"><?php echo $_SESSION["loginUser_Name"]; ?></a>
                </li>
                <li><a href="../../controller/admin/logout_action.php">Logout</a></li>
            </ul>

    </header>