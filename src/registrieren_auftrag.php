<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || !isset($_POST['sub'])){
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

    $kunde = $_POST['Kunde'];
    $aObjekt = $_POST['aObjekt'];
    $checkbox = $_POST['arbeit'];
    $chk = "";
    $terminWunsch = $_POST['terminWunsch'];
    $kommentar = $_POST['Kommentar'];

    foreach($checkbox as $chkbox)
    {
        $chk .= $chkbox . ",";
    }
    
    

    $statement = $con->prepare("INSERT INTO auftraege (Kunde, Adresse_Objekt , Terminwunsch, Arbeit, Beschreibung, Ausgefuehrt, Freigegeben_Verrechnung, Verrechnet) VALUES ('$kunde', '$aObjekt','$terminWunsch', '$chk', '$kommentar', 0, 0, 0)");
    
    if($statement->execute()){
        header("Location: index.php");
        die;
    }
    else{echo "Fehler Beim erstellen eines neuen Auftrags!!";}
    

   



    
?>