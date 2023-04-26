<?php 

require_once '../../model/message.php';

if (deleteMessage($_GET['id'])) {
    header('Location: ../../view/admin/showAllMessages');
}

 ?>
