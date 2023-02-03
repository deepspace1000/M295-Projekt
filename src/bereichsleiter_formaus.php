<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 2 || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }
    
    /**
     * Dieses file wird aufgerufen wenn der admin einer der Buttons im Formular gedrückt hat. <br>
     * Es wird ausgehend vom Button welcher gedrückt worden ist entweder das file pdf aufgerufen <br>
     * welches den entsprechenden auftrag drucken kann oder der Auftrag wird in der DB als disponiert <br>
     * oder als zur verrechnung freigegeben gekennzeichnet.
     */

    require_once "db_connection.php";

    if($_POST['sub'] == "pdf"){
        $_SESSION['auftragsnr'] = $_POST['auftrag'];
        header("Location: pdf.php");
        die;
    }

    if($_POST['sub'] == "disponieren"){

        $auftragsNr = $_POST['auftrag'];
        $mitarbeiterNr = $_POST['mitarbeiter'];
        $datum = $_POST['date'];
        $time = $_POST['time'];

        $statement = $con->prepare("UPDATE Auftraege SET Mitarbeiter = $mitarbeiterNr, Datum = '$datum', Zeit = $time WHERE AuftragsNr = $auftragsNr");

        if($statement->execute()){
            header("Location: index.php");
            die;
        }
        else{echo "Fehler Beim erstellen eines neuen Auftrags!!";}
        
    }

    if($_POST['sub'] == "freigeben"){

        $auftragsNr = $_POST['auftrag'];
        
        $statement = $con->prepare("UPDATE Auftraege SET Freigegeben_Verrechnung = 1 WHERE AuftragsNr = $auftragsNr");

        if($statement->execute()){
            header("Location: index.php");
            die;
        }
        else{echo "Fehler Beim erstellen eines neuen Auftrags!!";}
    }
?>