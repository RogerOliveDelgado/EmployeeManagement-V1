<?php

require_once('loginManager.php');

if (isset($_SESSION['startTime'])){
    $sessionTime = $_SESSION['startTime'] + 210;
    if (time() >= $sessionTime) {
        logout("Location: ./../../index.php");
        echo "logout";
    }
} else {
    header("Location: ./../../index.php");
}