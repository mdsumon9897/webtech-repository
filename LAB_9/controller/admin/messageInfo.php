<?php 

require_once ('../../model/message.php');

function fetchAllMessages(){
	return showAllMessages();

}
function fetchMessage($id){
	return showMessage($id);

}