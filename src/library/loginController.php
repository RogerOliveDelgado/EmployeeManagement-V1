<?php
require_once('loginManager.php');

if(isset($_POST['login'])){
    authUser();
} else {
    logout();
    header("Location: ./../../index.php");
}