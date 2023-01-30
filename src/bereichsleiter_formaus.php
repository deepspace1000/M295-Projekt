<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 2 || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    require_once "db_connection.php";

    if($_POST['sub'] == "Mitarbeiter Hinzufügen"){
        $mitarbeiterNr = $_POST['mitarbeiter'];
        $auftragsNr = $_POST['auftrag'];

        echo $mitarbeiterNr;
        echo $auftragsNr;

        $statement = $con->prepare("UPDATE Auftraege SET Mitarbeiter = $mitarbeiterNr WHERE AuftragsNr = $auftragsNr");

        if($statement->execute()){
            header("Location: index.php");
            die;
        }
        else{echo "Fehler Beim erstellen eines neuen Auftrags!!";}
    }
?>