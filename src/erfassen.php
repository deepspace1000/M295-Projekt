<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1){
        header("Location: index.php");
        die;
    }
    if(isset($_POST['registrieren']))
    {
        header("Location: erfassen_mitarbeiter.php");
    }
    elseif(isset($_POST['neuauftrag']))
    {
        header("Location: erfassen_auftrag.php");
    }
    else{
        header("Location: index.php");
    }
?>