<?php

    require_once "baza.php";
    require_once "../functions/order.php";
    require_once "../functions/product.php";
    require_once "../functions/inputs.php";

    checkInputs($_POST);

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    $kolicina = $_POST["kolicina"];
    $id_proizvoda = $_POST["id_proizvoda"];
    $id_korisnika = $_SESSION["id"];

    if(productExists($id_proizvoda, $baza))
    {
        $proizvod = getProductById($id_proizvoda, $baza);
        $cena = $proizvod["cena"] * $kolicina;

        makeOrder($id_proizvoda, $id_korisnika, $cena, $kolicina, $baza );
    }
    else
    {
        die ("Proizvod ne postoji u bazi podataka");
    }