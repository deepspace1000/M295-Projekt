<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

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