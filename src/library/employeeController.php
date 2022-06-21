<?php

include_once('employeeManager.php');

$db = '../../resources/employees.json';

if(isset($_POST['action'])){
    if($_POST['action'] === 'getAllEmployees'){
        $response = getAllEmployees($db);
    } else if ($_POST['action'] === 'update') {
        $response = updateEmployee($_POST['user'], $db);
    } else if ($_POST['action'] === 'delete') {
        $response = deleteEmployee($_POST['user']['id'], $db);
    } else if ($_POST['action'] === 'add'){
        $response = addEmployee($_POST['user'], $db);
    }
} else if (isset($_POST['id'])){
    if($_POST['id'] !== ''){
        $response = updateEmployee($_POST, $db);
        header("Location: ./../dashboard.php");
    } else {
        $response = addEmployee($_POST, $db);
    }
}

echo json_encode($response);