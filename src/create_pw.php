<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create pw</title>
</head>
<body>
    <?php
        $plain = "test";

        $hashed_password = password_hash($plain, PASSWORD_DEFAULT);

        echo $hashed_password;
    ?>
    
</body>
</html>