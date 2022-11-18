<?php
session_start();


if(empty($_SESSION['user'])){
    if($_SERVER["PHP_SELF"] != '/login.php'){
        header('Location: login.php');
        exit();
    }
}


?>
