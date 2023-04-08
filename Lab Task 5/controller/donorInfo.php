<?php 

require_once ('model/model.php');

function fetchAllDonors(){
	return showAllDonors();

}
function fetchDonor($id){
	return showDonor($id);

}
