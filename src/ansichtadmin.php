<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 1){
        header("Location: index.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include "header.php"?>
    </header>
    <h1>admin</h1>
    
</body>
</html>