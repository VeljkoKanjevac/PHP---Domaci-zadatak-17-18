<?php

    require_once "../functions/inputs.php";

    checkInputs($_POST);

    $email = $_POST["email"];
    $password = $_POST["password"];

    require_once "../functions/user.php";
    require_once "baza.php";

    if(session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }

    unset($_SESSION["pogresnaLozinka"]);

    if(dataValidation($email, $password, $baza) === false)
    {
        $_SESSION["pogresnaLozinka"] = true;
        header("Location:../deleteAccount.php");
    }
    else
    {
        $baza->query(" DELETE FROM korisnici WHERE email = '$email' ");
        header("Location: logout.php");
    }
    