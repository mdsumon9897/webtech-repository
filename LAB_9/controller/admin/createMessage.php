<?php  
require_once '../../model/message.php';


if (isset($_POST['createMessage'])) {
	$data['fname'] = $_POST['fname'];
	$data['lname'] = $_POST['lname'];
	$data['phone'] = $_POST['phone'];
	$data['email'] = $_POST['email'];
    $data['mess'] = $_POST['mess'];


  if (addMessage($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>
