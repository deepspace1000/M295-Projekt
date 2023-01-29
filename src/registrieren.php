<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || $_POST['sub'] == "abbrechen"){
        header("Location: index.php");
        die;
    }

    
?>