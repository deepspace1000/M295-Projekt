<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="POST">
        <p>User ID</p>
        <input type="text" name="loginID"><br>
        <p>Password</p>
        <input type="password" name="loginPassword"><br>
        <input type="submit" name="sub" value="Anmelden">
    </form>
    
    <?php
        require_once "db_connection.php";

        $loginID = $_POST['loginID'];
        $loginpw = $_POST['loginPassword']:

        $query = "SELECT Passwort FROM Mitarbeiter WHERE MNR = '$loginID'";
        $ergebnis = $con->query($query);
        $row = $ergebnis->fetchObject();
        
        //test
        if()




        $sql = "SELECT * FROM Mitarbeiter";
        $ergebnis = $con->query($sql);
        
        echo "<table><tr><th>MNR</th><th>Name</th><th>Vorname</th><th>Abteilung</th><th>Passwort</th></tr>";
        while ($zeile = $ergebnis->fetchObject()){
            echo "<tr>";
            echo "<td>" . $zeile->MNR . "</td>";
            echo "<td>" . $zeile->Mitarbeiter_Name . "</td>";
            echo "<td>" . $zeile->Mitarbeiter_Vorname . "</td>";
            echo "<td>" . $zeile->Abteilung . "</td>";
            echo "<td>" . $zeile->Passwort . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    
</body>
</html>