<?php
    if(isset($_POST['registrieren']))
    {
        header("Location: erfassen_mitarbeiter.php");
    }
    elseif(isset($_POST['neuauftrag']))
    {
        header("Location: erfassen_auftrag.php");
    }
?>