<?php

    require_once "functions/inputs.php";
    require_once "modeli/baza.php";

    checkInputs($_GET);

    $tekst = mysqli_real_escape_string($baza, $_GET["tekstZaPretragu"]);

    $rezultat = $baza -> query(" SELECT * FROM proizvodi WHERE ime LIKE '%$tekst%' OR opis LIKE '%$tekst%' ");

    if($rezultat -> num_rows == 0)
    {
        die("Ne postoje proizvodi koji se poklapaju sa pretragom.");
    }
    else
    {
        $proizvodi =  $rezultat -> fetch_all(MYSQLI_ASSOC);
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
    
</body>
</html>
    