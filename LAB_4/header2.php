<?php
$name =""; 
session_start();
if(isset( $_SESSION['username'])){
        $name = $_SESSION['username'];
}
if(empty($name)){
        header("location:Login.php");
}
?>
<header>
	<fieldset>
		<span> <h1 align="left">X Company</h1><h3 align="right">
            <a href='ProfilePage.php'>Logged in as <?php echo $name ?>, |</a> <a href='Logout.php'>Logout</a>
        </h3></span>
	</fieldset>
</header>