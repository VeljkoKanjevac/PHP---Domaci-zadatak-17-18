<?php

    if(session_status()==PHP_SESSION_NONE)
    {
        session_start();
    }

    require_once "../functions/inputs.php";

    checkInputs($_POST);

    require_once "baza.php";
    require_once "../functions/user.php";

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $email = $_POST["email"];
    $lozinka = $_POST["lozinka"];
    $lozinkaPonovljeno = $_POST["lozinkaPonovljeno"];

    if(userExists($email, $baza)===true)
    {
        $_SESSION["postojeciEmail"];
        header("Location:../registration.php");
    }

    registerUser($ime,$prezime,$email,$lozinka,$lozinkaPonovljeno,$baza);