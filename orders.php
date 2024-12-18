<?php

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    $id_korisnika = $_SESSION["id"];

    require_once "modeli/baza.php";
    require_once "functions/order.php";

    $narudzbine = getOrdersById($id_korisnika, $baza);
    $brojNarudzbina = sizeof($narudzbine);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <?php require_once "index.php"; ?>

    <?php if($brojNarudzbina == 0): ?>

        <p class="d-flex justify-content-center mt-5">Nema proizvoda u korpi.</p>

    <?php else:  ?>

        <?php foreach($narudzbine as $narudzbina): ?>

            <div class="d-flex justify-content-around mt-5">
                <p>Kolicina: <?= $narudzbina["kolicina"] ?> </p>
                <p>Cena: <?= $narudzbina["cena"] ?> </p>
            </div>
            
        <?php endforeach; ?>

    <?php endif; ?>

</body>

</html>