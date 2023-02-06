<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 3){
        header("Location: index.php");
        die;
    } 
    
    /**
     * Mit diesem file wird die ansicht des Mitarbeiters dargestellt <br>
     * Er kann auch seine in der Aufgabe aufgeführten aufgaben ausführen <br>
     * Im angezeigten Formular kann er Aufträge als ausgehführt markieren und ein Auftragsblatt drucken. <br>
     * Bei ausführen von einer dieser Funktionen wird das file mitarbeiter_formaus aufgerufen.
     */
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auftrags Ansicht</title>
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <h1>Mitarbeiter</h1>

    <?php
        require_once "db_connection.php";
        $user = $_SESSION['userid'];

        //$query = "SELECT * FROM Mitarbeiter WHERE MNR = '$loginID'";
        $query = $con->prepare(
        "SELECT * 
        FROM Auftraege
        LEFT JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR
        LEFT JOIN Kunden
        ON Auftraege.Kunde = Kunden.KNR
        WHERE Auftraege.Mitarbeiter = $user AND Auftraege.Ausgefuehrt = 0");

        $query->execute();

        echo "<table>";
        echo "<tr><th>AufNr</th><th>Datum</th><th>Zeit</th><th>Kunde</th><th>Mitarbeiter</th><th>Arbeit</th><th>Beschreibung</th></tr>";
        while($row = $query->fetchObject()){
            echo "<form action='mitarbeiter_formaus.php' method='POST'>";
            echo "<tr>";
            echo "<td>" . $row->AuftragsNr . "</td>";
            echo "<td>" . $row->Datum . "</td>";
            echo "<td>" . $row->Zeit . "</td>";
            echo "<td>" . $row->Kunden_Vorname . " " . $row->Kunden_Name . "</td>";
            echo "<td>" . $row->Mitarbeiter_Vorname . " " . $row->Mitarbeiter_Name . "</td>";
            echo "<td>" . $row->Arbeit . "</td>";
            echo "<td>" . $row->Beschreibung . "</td>";
            echo "<td>" . "<input type='submit' name='sub' value='Ausgefuehrt'>" . "</td>";
            echo "<td>" . "<input type='submit' name='sub' value='pdf'>" . "</td>";
            echo "<td>" . "<input type='hidden' name='auftrag' value='$row->AuftragsNr'>" . "</td>";
            echo "</tr>";
            echo "</form>";
        }
        echo "</table>";

        
    ?>
    
</body>
</html>