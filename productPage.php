<?php
    require_once "functions/inputs.php";

    checkInputs($_GET);

    require_once "modeli/baza.php";

    $id = mysqli_real_escape_string($baza, $_GET["id"]);

    $rezultat = $baza -> query("SELECT * FROM proizvodi WHERE id_proizvoda = '$id' ");

    $proizvod = $rezultat -> fetch_assoc();

    $ime = $proizvod["ime"];
    $opis = $proizvod["opis"];
    $cena = $proizvod["cena"];
    $slika = $proizvod["slika"];
    $kolicina = $proizvod["kolicina"];

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

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
    <div class="d-flex justify-content-center">
        <div class="card align-items-center" style="width:16rem;">
            <img style="height:50%" src="images/mobile-shop-logo.png" class="card-img-top" alt="mobile shop logo">
            <div class="card-body">
                <h5 class="card-title"> <?= $proizvod["ime"] ?> </h5>
                <p class="card-text"> <?= $proizvod["opis"] ?> </p>

                <?php if($proizvod['kolicina'] == 0): ?>
                    <p>Nema na stanju</p>
                <?php else: ?>
                    <p>Ima na stanju</p>
                <?php endif; ?>

                <p> <?= $proizvod["cena"] ?>&euro; </p>
            </div>
        </div>
    </div>


    <?php if(isset($_SESSION["ulogovan"])): ?>
        <div class="d-flex justify-content-center mt-3">
            <form action="modeli/makeOrder.php" method="post">
                <input type="number" name="kolicina" placeholder="Kolicina za narucivanje">
                <input type="hidden" name="id_proizvoda" value="<?= $proizvod["id_proizvoda"] ?>">
                <button class="btn btn-primary">Poruci</button>
            </form>
        </div>

    <?php else: ?>

        <a class="btn btn-primary" href="login.php">Ulogujte se da biste porucili</a>

    <?php endif; ?>
     
</body>
</html>

