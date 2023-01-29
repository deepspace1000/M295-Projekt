<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1 || $_POST['sub'] == "abbrechen" || !isset($_POST['sub'])){
        header("Location: index.php");
        die;
    }

    require_once "db_connection.php";

    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $abt = $_POST['abt'];

    $statement = $con->prepare("INSERT INTO Mitarbeiter (Mitarbeiter_Name, Mitarbeiter_Vorname, Abteilung, Passwort) VALUES ('$name', '$vorname', $abt, '$hashed_password')");
    if($statement->execute()){
        header("Location: index.php");
    }
    else{echo "Fehler Beim erstellen des neuen benutzers!!";}



    
?>