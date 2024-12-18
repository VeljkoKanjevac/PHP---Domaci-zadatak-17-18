<?php

    require_once "../functions/inputs.php";

    checkInputs($_POST);

    require_once "baza.php";
    require_once "../functions/user.php";

    $email = $_POST["email"];
    $lozinka = $_POST["lozinka"];

    if(session_status() == PHP_SESSION_NONE)
    {
    session_start();
    }

    if(userExists($email, $baza) === false)
    {   
        $_SESSION["nepostojeciEmail"] = true;
        header("Location: ../login.php");
        exit();
    }
  
    if(dataValidation($email, $lozinka, $baza)===false)
    {
        $_SESSION["pogresnaLozinka"] = true;
        header("Location: ../login.php");
        exit();
    }
        
    $korisnik = getUserByEmail($email, $baza);

    $_SESSION["ulogovan"] = true;
    $_SESSION["id"] = $korisnik["id_korisnika"];
    $_SESSION["email"] = $korisnik["email"];
    $_SESSION["ime"] = $korisnik["ime"];
    $_SESSION["prezime"] = $korisnik["prezime"];

    header("Location: ../index.php");
