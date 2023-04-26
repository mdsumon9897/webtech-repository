<?php
// session_start();

require_once 'db_connect.php';



function show_all_data()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `admin` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}




function show_single_admin_data($colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `admin` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function update_admin_data($colName, $id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE admin SET 
                        `admin_mail` = :admin_mail, 
                        `password` = :password, 
                        `admin_name` = :admin_name, 
                        `admin_phone` = :admin_phone, 
                        `admin_image` = :admin_image 
                    WHERE $colName = $id";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':admin_mail' => $data['admin_mail'],
            ':password' => $data['password'],
            ':admin_name' => $data['admin_name'],
            ':admin_phone' => $data['admin_phone'],

            ':admin_image' => $data['admin_image']

        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}








function delete_admin($colName, $id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM 'admin' WHERE `$colName` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}


function search_specific_data($colNames, $tableName, $colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT $colNames FROM `$tableName` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function add_admin($data)
{

    $conn = db_conn();
    $selectQuery = "INSERT into admin (admin_mail, password, admin_name, admin_phone, admin_image)
    VALUES (:admin_mail, :password, :admin_name, :admin_phone,  :admin_image)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':admin_mail' => $data['admin_mail'],
            ':password' => $data['password'],
            ':admin_name' => $data['admin_name'],
            ':admin_phone' => $data['admin_phone'],
            ':admin_image' => $data['admin_image']
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}

















