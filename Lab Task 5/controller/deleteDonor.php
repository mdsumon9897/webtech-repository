<?php 

require_once '../model/model.php';

if (deleteDonor($_GET['id'])) {
    header('Location: ../showAllDonors.php');
}

 ?>
