<?php session_start();
    if (!isset($_SESSION['userid'])){
        header("Location: index.php");
        die;
    }
    switch($_SESSION['abteilung']){
        case 1:
            require "ansichtadmin.php";
            break;
        case 2:
            echo "Sie sind bereichsleiter";
            break;
        case 3:
            echo "Sie sind Mitarbeiter";
            break;
    }
?>