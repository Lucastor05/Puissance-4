<?php
session_start();


if($_SESSION['user'] == null){
    header('Location: login.php');
    exit();   
}
?>