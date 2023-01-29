<?php session_start();

    
    require_once "db_connection.php";

    $loginID = $_POST['loginID'];
    $loginpw = $_POST['loginPassword'];


    $statement = $con->prepare("SELECT * FROM Mitarbeiter WHERE MNR = :mnr");
    $statement->bindParam(':mnr', $loginID);
    
    

    if ($statement->execute() && $statement->rowCount() == 1){
        $row = $statement->fetchObject();

        if (password_verify($loginpw, $row->Passwort)){
            $_SESSION['userid'] = $loginID;
            $_SESSION['abteilung'] = $row->Abteilung;
            $_SESSION['vorname'] = $row->Mitarbeiter_Vorname;
            $_SESSION['name'] = $row->Mitarbeiter_Name;
            unset($_SESSION['meldungen']);
            header("Location: auftragsansicht.php");
        } 
        else {
            $_SESSION['meldungen'] = "Falsches Passwort";
            header("Location: index.php");
        }
    } 
    else {
        $_SESSION['meldungen'] = "Dieser User existiert nicht";
        header("Location: index.php");
    }

?>
