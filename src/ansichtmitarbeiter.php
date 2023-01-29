<?php session_start();
    if (!isset($_SESSION['userid']) || !$_SESSION['abteilung'] == 3){
        header("Location: index.php");
        die;
    }
?>