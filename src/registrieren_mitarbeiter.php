<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    /**
     * Dieses File wird aufgerufen wenn der admin den submit button auf der Seite erfassen_mitarbeiter drückt. <br>
     * Es werden alle informationen aus dem Formular übernommen und in die Datenbank gespeichert. <br>
     * Danach wird der admin zu seiner auftragsübersicht zurück geleitet.
     */

    require_once "db_connection.php";

    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $abt = $_POST['abt'];

    $statement = $con->prepare("INSERT INTO Mitarbeiter (Mitarbeiter_Name, Mitarbeiter_Vorname, Abteilung, Passwort) VALUES ('$name', '$vorname', $abt, '$hashed_password')");
    if($statement->execute()){
        header("Location: index.php");
        die;
    }
    else{echo "Fehler Beim erstellen des neuen benutzers!!";}



    
?>