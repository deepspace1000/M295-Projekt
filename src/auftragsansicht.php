<?php session_start();
    if (!isset($_SESSION['userid'])){
        header("Location: index.php");
        die;
    }
    switch($_SESSION['abteilung']){
        case 1:
            echo "Sie sind Admin";
            break;
        case 2:
            echo "Sie sind bereichsleiter";
            break;
        case 3:
            echo "Sie sind Mitarbeiter";
            break;
    }
?>