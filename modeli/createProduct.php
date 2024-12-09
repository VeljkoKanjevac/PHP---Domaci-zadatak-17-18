<?php

    require_once "../functions/inputs.php";

    
    checkInputs($_POST);

    require_once "baza.php";
    require_once "../functions/product.php";
   
    $ime = $_POST["ime"];
    $opis = $_POST["opis"];
    $cena = $_POST["cena"];
    $slika = $_POST["slika"];
    $kolicina = $_POST["kolicina"];

    insertProduct($ime, $opis, $cena, $slika, $kolicina, $baza);

    echo "Uspesno ste kreirali novi proizvod";

?>
