<?php 
    /** 
     * Das Header File wird in verschiedene andere Files eingebunden und stellt den header dar <br>
     * es wird der Name des eingeloggten Users sowie ein ein logout button angezeigt <br>
     * der logout button ruft die logout.php datei auf
    */
?>
<table>
    <tr>
        <th><?php echo $_SESSION['vorname']; ?></th>
        <th><?php echo $_SESSION['name']; ?></th>
        <th><button onclick="window.location.href = 'logout.php';">Ausloggen</button></th>
    </tr>
</table>
