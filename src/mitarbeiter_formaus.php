<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 3 || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    /**
     * Dieses file wird aufgerufen wenn der mitarbeiter einer der Buttons im Formular gedrückt hat. <br>
     * Es wird ausgehend vom Button welcher gedrückt worden ist entweder das file pdf aufgerufen <br>
     * welches den entsprechenden auftrag drucken kann oder der Auftrag wird in der DB als ausgeführt gekennzeichnet.
     */

    require_once "db_connection.php";

    if($_POST['sub'] == "pdf"){
        $_SESSION['auftragsnr'] = $_POST['auftrag'];
        header("Location: pdf.php");
        die;
    }

    if($_POST['sub'] == "Ausgefuehrt"){
        $auftragsNr = $_POST['auftrag'];

        $statement = $con->prepare("UPDATE Auftraege SET Ausgefuehrt = 1 WHERE AuftragsNr = $auftragsNr");

        if($statement->execute()){
            header("Location: index.php");
            die;
        }
        else{echo "Fehler Beim erstellen eines neuen Auftrags!!";}
    }

?>