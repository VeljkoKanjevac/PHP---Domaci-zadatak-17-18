<?php

    require_once "modeli/baza.php";
    require_once "functions/product.php";

    $proizvodi = getAllProducts($baza);
    $brojProizvoda = sizeof($proizvodi);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<body>

    <?php require_once "index.php"; ?>

    <?php if($brojProizvoda == 0): ?>

        <p>Ne postoje proizvodi u bazi podataka.</p>

    <?php else:  ?>

        <div class="container col-10 mt-2 d-flex justify-content-evenly flex-wrap">
            <?php foreach($proizvodi as $proizvod): ?>

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

                        <a href="productPage.php?id=<?= $proizvod['id_proizvoda'] ?>" class="btn btn-primary align-self-end">Pogledaj proizvod</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif;?>
   
</body>

</html>

