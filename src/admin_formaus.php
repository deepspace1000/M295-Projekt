<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    require_once "db_connection.php";

    $auftragsNr = $_POST['auftrag'];

    $statement = $con->prepare("UPDATE Auftraege SET Verrechnet = 1 WHERE AuftragsNr = $auftragsNr");

    if($statement->execute()){
        header("Location: index.php");
        die;
    }
    else{echo "Fehler Beim erstellen eines neuen Auftrags!!";}
?>