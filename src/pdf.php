<?php session_start();
    if (!isset($_SESSION['userid'])){
        header("Location: index.php");
        die;
    }

    require_once "db_connection.php";
?>