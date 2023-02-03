<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    /**
     * Dieses File wird aufgerufen wenn der admin den submit button auf der Seite erfassen_kunde drückt. <br>
     * Es werden alle informationen aus dem Formular übernommen und in die Datenbank gespeichert. <br>
     * Danach wird der admin zur erfassen_auftrag zurück geleitet.
     */

    require_once "db_connection.php";

    $name = $_POST['kname'];
    $vorname = $_POST['kvorname'];
    $geschlecht = $_POST['kgeschlecht'];
    $telefon = $_POST['ktelefon'];
    $natel = $_POST['knatel'];
    $adresse = $_POST['kadresse'];
    $plz = $_POST['kplz'];
    $ort = $_POST['kort'];

    $statement = $con->prepare("INSERT INTO Kunden (Kunden_Name, Kunden_Vorname, Geschlecht, Telefon, Natel, Adresse, PLZ, Ort) VALUES ('$name', '$vorname', '$geschlecht', '$telefon', '$natel', '$adresse', $plz, '$ort')");
    
    if($statement->execute()){
        header("Location: erfassen_auftrag.php");
        die;
    }
    else{echo "Fehler Beim erstellen des neuen Kunden!!";}



    
?>