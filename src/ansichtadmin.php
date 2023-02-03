<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1){
        header("Location: index.php");
        die;  
    }
    
    /**
     * Mit diesem file wird die ansicht des Admins dargestellt <br>
     * Er kann auch seine in der Aufgabe aufgeführten aufgaben ausführen <br>
     * Es befinden sich auch zwei Buttons auf der Seite mit welchen der Admin 
     * einen neuen Mitarbeiter oder einen neuen Auftrag erfassen kann er wird 
     * dafür auf die entsprechenden Seiten geleitet. <br>
     * Im angezeigten Formular kann er Aufträge verrechnen und ein Auftragsblatt drucken. 
     * Bei ausführen von einer dieser Funktionen wird das file admin_formaus aufgerufen.
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
    <h1>admin</h1>
    <button onclick="window.location.href = 'erfassen_mitarbeiter.php';">Neuer Mitarbeiter</button>
    <button onclick="window.location.href = 'erfassen_auftrag.php';">Neuer Auftrag</button>

    <?php
        require_once "db_connection.php";

        //$query = "SELECT * FROM Mitarbeiter WHERE MNR = '$loginID'";
        $query = $con->prepare(
        "SELECT * 
        FROM Auftraege
        LEFT JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR
        LEFT JOIN Kunden
        ON Auftraege.Kunde = Kunden.KNR");

        $query->execute();

        echo "<table>";
        echo "<tr><th>AufNr</th><th>Datum</th><th>Zeit</th><th>Kunde</th><th>Mitarbeiter</th><th>Arbeit</th><th>Beschreibung</th><th>Freigegeben</th><th>Verrechnet</th></tr>";
        while($row = $query->fetchObject()){
            echo "<form action='admin_formaus.php' method='POST'>";
            echo "<tr>";
            echo "<td>" . $row->AuftragsNr . "</td>";
            echo "<td>" . $row->Datum . "</td>";
            echo "<td>" . $row->Zeit . "</td>";
            echo "<td>" . $row->Kunden_Vorname . " " . $row->Kunden_Name . "</td>";
            echo "<td>" . $row->Mitarbeiter_Vorname . " " . $row->Mitarbeiter_Name . "</td>";
            echo "<td>" . $row->Arbeit . "</td>";
            echo "<td>" . $row->Beschreibung . "</td>";
            if($row->Freigegeben_Verrechnung == 0){
                echo "<td> <input type='checkbox' disabled='disabled'></td>";
            } else {echo "<td> <input type='checkbox' disabled='disabled' checked='checked'></td>";}
            if($row->Verrechnet == 0 && $row->Freigegeben_Verrechnung == 1){
                echo "<td> <input type='submit' name='sub' value='verrechnen'></td>";
            }elseif($row->Verrechnet == 0 && $row->Freigegeben_Verrechnung == 0){
                echo "<td> <input type='checkbox' disabled='disabled'></td>";
            }else {echo "<td> <input type='checkbox' disabled='disabled' checked='checked'></td>";}
            echo "<td>" . "<input type='submit' name='sub' value='pdf'>" . "</td>";
            echo "<td>" . "<input type='hidden' name='auftrag' value='$row->AuftragsNr'>" . "</td>";
            echo "</tr>";
            echo "</form>";
            
        }
        echo "</table>";

        
    ?>
    
</body>
</html>