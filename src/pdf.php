<?php session_start();
    if (!isset($_SESSION['userid']) || !isset($_SESSION['auftragsnr'])){
        header("Location: index.php");
        die;
    }

    require_once "db_connection.php";
    $auftragsnr = $_SESSION['auftragsnr'];
    unset($_SESSION['auftragsnr']);

    $query = $con->prepare(
        "SELECT * 
        FROM Auftraege
        LEFT JOIN Mitarbeiter
        ON Auftraege.Mitarbeiter = Mitarbeiter.MNR
        LEFT JOIN Kunden
        ON Auftraege.Kunde = Kunden.KNR
        WHERE AuftragsNr = $auftragsnr");

    $query->execute();
    $row = $query->fetchObject();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <h1>SERVICEAUFTRAG</h1>
    <p>------------------</p>
    <p>Datum: <?php echo $row->Datum; ?></p>
    <p>Zeit: <?php echo $row->Zeit; ?></p>
    <p>Kunde/Kontaktperson:</p>
    <p><?php echo $row->Geschlecht . " " . $row->Kunden_Vorname . " " . $row->Kunden_Name . "<br>" . $row->Adresse . "<br>" . $row->PLZ . " " . $row ?></p>

</body>
</html>