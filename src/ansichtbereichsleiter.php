<?php session_start();
    if (!isset($_SESSION['userid']) || $_SESSION['abteilung'] != 2){
        header("Location: index.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <h1>bereichsleiter</h1>
    
</body>
</html>