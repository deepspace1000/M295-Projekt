<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || $_POST['sub'] == "abbrechen" || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $abt = $_POST['abt'];



    
?>