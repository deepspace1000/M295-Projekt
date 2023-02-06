<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1){
        header("Location: index.php");
        die;
    }
    /**
     * Diese Seite wird aufgerufen wenn der Admin auf seiner Auftragsansicht den entsprechenden button gedrückt hat. <br>
     * In diesem formular kann der Admin einen Auftrag annehmen und einen Kunden auswählen <br>
     * fals der Kunde noch nicht im System ist kann er über einen Button einen Neuen Kunden erfassen. <br>
     * Wenn der Submit Button gedrückt wird, wird das file registrieren_auftrag aufgerufen.
     */
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
                    <label for="kunde">Kunde: </label>
                </td>
                <td>
                    <select name="Kunde" id="kunde">
                    <?php
                        require "db_connection.php";

                        $abfrage = $con->prepare("SELECT * FROM Kunden");
                        $abfrage->execute();
                     

                        while($row = $abfrage->fetchObject()){
                            echo "<option value='$row->KNR'>" . $row->Kunden_Vorname . " " . $row->Kunden_Name . "</option>";
                        }
                    ?>
                    </select>
                </td>
                
            </tr>
            <tr>
                    <td>
                        <label for="Objekt">Adresse Objekt: </label>
                    </td>
                    <td>
                        <input type="text" value="dito" name="aObjekt" id="Objekt" required>
                    </td>
            </tr>
            <tr id="Arbeit">
                <td>
                    <label for="Arbeit">Abreit: </label>
                </td>
                <td>
                    <input type="checkbox" name="arbeit[]" value="Reparatur" id="Reparatur"> <label for="Reparatur">Reparatur</label>
                </td>
                <td>
                    <input type="checkbox" name="arbeit[]" id="Sanitaer" value="Sanitaer"> <label for="Sanitaer">Sanitär</label>
                </td>
            </tr>
            <tr id="Arbeit">
                <td></td>
                <td>
                    <input type="checkbox" name="arbeit[]" id="Heizung" value="Heizung"> <label for="Heizung">Heizung</label>
                </td>
                <td>
                    <input type="checkbox" name="arbeit[]" id="Garantie" value="Garantie"> <label for="Garantie">Garantie</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="terminWunsch">Terminwunsch: </label>
                </td>
                
                <td>
                    <input type="text" id="terminWunsch" name="terminWunsch" maxlength="50" required>
                </td>
            </tr>
            <tr>
                
                <td >
                    <label for="Kommentar">Kommentar: </label>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                    <textarea name="Kommentar" id="Kommentar" cols="30" rows="5" style="resize: none;" maxlength="255"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="sub" value="erfassen">
                </td>
            </tr>
        </table>
    </form>
        <button onclick="window.location.href = 'erfassen_kunde.php';">Neuer Kunde</button>
        <button onclick="window.location.href = 'index.php';">abbrechen</button>
        

        <?php
            if(isset($_SESSION['meldungen'])){
                echo "<p>" . $_SESSION['meldungen'] . "</p>";
            }
        ?>
        
       
    
</body>
</html>
</body>
</html>