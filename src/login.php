<?php session_start();
     if(isset($_SESSION['userid'])){
        header("Location: index.php");
        die;
    }
    /**
     * Das login.php file wird von der index Seite aufgerufen wenn der Submit Button gedrückt wurde<br>
     * Hier wird überprüft ob ein User mit der eigegebenen Mitarbeiter nummer exestiert und er das Richtige Passwort eingegeben hat<br>
     * ansonsten wird eine Fehler über die Session zurückgegeben und der User wird auf die Indexseite zurück geleitet<br>
     * Wenn ein User mit dieser Nummer exestiert und das richtige Passwort eigegeben wurde<br>
     * wird der Name, die Abteilungsnummer und die Mitarbeiternummer in die Session gespeichert und er wird zum<br>
     * auftragsansicht file geleitet.
     */
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
            die;
        }
        else {
            $_SESSION['meldungen'] = "Falsches Passwort";
            header("Location: index.php");
            die;
        }
    }
    else {
        $_SESSION['meldungen'] = "Dieser User existiert nicht";
        header("Location: index.php");
        die;
    }

?>
