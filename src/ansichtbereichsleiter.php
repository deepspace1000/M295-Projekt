<?php session_start();
    if (!isset($_SESSION['userid']) || !$_SESSION['abteilung'] == 2){
        header("Location: index.php");
        die;
    }
?>