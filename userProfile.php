<?php


    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    $id = $_SESSION["id"];
    $ime = $_SESSION["ime"];
    $prezime = $_SESSION["prezime"];
    $email = $_SESSION["email"];

?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once "index.php"  ?>

    <div class="d-flex justify-content-center">
        <div>
            <h3>ID: <?= $id ?></h3>
            <h3>Ime: <?= $ime ?></h3>
            <h3>Prezime: <?= $prezime ?></h3>
            <h4>Email: <?= $email ?></h4>
        </div>
    </div>

</body>
</html>