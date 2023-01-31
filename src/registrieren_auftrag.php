<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || $_POST['sub'] == "abbrechen" || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    if(!isset($_POST['arbeit']))
    {
        $_SESSION['meldungen'] = "Keinen Auftrag asugewählt";
        header("Location: erfassen_auftrag.php"); 
        die;
    }

   
    unset($_SESSION['meldungen']);
    require_once "db_connection.php";

    $datum = $_POST['date'];
    $zeit = $_POST['time'];
    $kunde = $_POST['Kunde'];
    $checkbox = $_POST['arbeit'];
    $chk = "";
    $terminWunsch = $_POST['terminWunsch'];
    $kommentar = $_POST['Kommentar'];

    foreach($checkbox as $chkbox)
    {
        $chk .= $chkbox . ", ";
    }
    
    

    $statement = $con->prepare("INSERT INTO auftraege (Datum, Zeit, Kunde, Terminwunsch, Arbeit, Beschreibung, Freigegeben_Verrechnung, Verrechnet) VALUES ('$datum', $zeit, '$kunde', '$terminWunsch', '$chk', '$kommentar', 0, 0)");
    
    if($statement->execute()){
        header("Location: index.php");
        die;
    }
    else{echo "Fehler Beim erstellen eines neuen Auftrags!!";}
    

   



    
?>