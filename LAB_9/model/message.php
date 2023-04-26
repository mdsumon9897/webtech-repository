<?php 

require_once 'db_connect.php';


function showAllMessages(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showMessage($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `user_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function addMessage($data){
	$conn = db_conn();
    $selectQuery = "INSERT into user_info (fName, lName, Phone, Email, Message)
VALUES (:fname, :lname, :phone, :email, :mess)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':fname' => $data['fname'],
        	':lname' => $data['lname'],
        	':phone' => $data['phone'],
        	':email' => $data['email'],
        	':mess' => $data['mess']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}



function deleteMessage($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
