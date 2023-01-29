<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1){
        header("Location: index.php");
        die;
    }

    require "db_connection.php";

    $abfrage = $con->prepare("SELECT * FROM kunden");
    $abfrage->execute();

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neuer Auftrag erfassen</title>
</head>
<body>
    <h1>Neuer Auftrag erfassen</h1>

    <form action="registrieren_auftrag.php" method="POST">
        <table>
            <tr>
                <td>
                    <label for="dateTime">Datum und Zeit: </label>
                </td>
                <td>
                    <input type="datetime-local" id="dateTime" name="dateTime" maxlength="25">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="kunde">Kunde: </label>
                </td>
                <td>
                    <select name="Kunde" id="kunde">
                        <?php

                            while($kunde = $abfrage->fetchAll(PDO::FETCH_ASSOC)):;

                        ?>
                            

                            <?php 
                                for($i = 0;$i<count($kunde);$i++){
                                    echo "<option>" . $kunde[$i]["Kunden_Vorname"] . " " . $kunde[$i]["Kunden_Name"]. "</option>";
                                }
                                
                            ?>
                            
                            
                            <?php
                                endwhile;
                            ?>
                    </select>
                </td>
                <td>

                </td>
            </tr>
            <tr id="Arbeit">
                <td>
                    <label for="Arbeit">Abreit: </label>
                </td>
                <td>
                    <input type="checkbox" name="Reparatur" id="Reparatur"> <label for="Reparatur">Reparatur</label>
                </td>
                <td>
                    <input type="checkbox" name="Sanitaer" id="Sanitaer"> <label for="Sanitaer">Sanitär</label>
                </td>
            </tr>
            <tr id="Arbeit">
                <td></td>
                <td>
                    <input type="checkbox" name="Heizung" id="Heizung"> <label for="Heizung">Heizung</label>
                </td>
                <td>
                    <input type="checkbox" name="Garantie" id="Garantie"> <label for="Garantie">Garantie</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="terminWunsch">Terminwunsch: </label>
                </td>
                
                <td>
                    <input type="text" id="terminWunsch" name="terminWunsch">
                </td>
            </tr>
            <tr>
                
                <td>
                    <label for="Kommentar">Kommentar: </label>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <textarea name="Kommentar" id="Kommentar" cols="30" rows="5" style="resize: none;"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="sub" value="erfassen">
                </td>
                <td>
                    <input type="submit" name="sub" value="abbrechen">
                </td>
            </tr>
        
    </form>
        <tr>
            <td>
                <button onclick="window.location.href = 'erfassen_kunde.php';">Neuer Kunde</button>
            </td>
        </tr>         
    </table>
</body>
</html>
</body>
</html>