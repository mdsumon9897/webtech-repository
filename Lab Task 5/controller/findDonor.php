<?php

require_once '../model/model.php';

if (isset($_POST['findUserDonor'])) {
	
		echo $_POST['user_name'];

    try {
    	
    	$allSearchedUsers = searchUser($_POST['user_name']);
    	require_once '../showSearchedDonor.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

