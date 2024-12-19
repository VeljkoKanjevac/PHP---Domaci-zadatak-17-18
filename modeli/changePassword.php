<?php

    require_once "../functions/inputs.php";

    checkInputs($_POST);

    $email = $_POST["email"];
    $currentPassword = $_POST["trenutnaLozinka"];
    $newPassword = $_POST["novaLozinka"];
    $newPasswordAgain = $_POST["novaLozinkaPonovljeno"];

    require_once "baza.php";
    require_once "../functions/user.php";

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    } 

    unset($_SESSION["pogresnaLozinka"]);
    unset( $_SESSION["razliciteLozinke"]);

    if(dataValidation($email, $currentPassword, $baza) === false) 
    {
        $_SESSION["pogresnaLozinka"] = true;
        header("Location:../changeAccount.php");
        exit();
    }

    if($newPassword != $newPasswordAgain)
    {
        $_SESSION["razliciteLozinke"] = true;
        header("Location:../changeAccount.php");
        exit();
    }

    $password = password_hash($newPassword, PASSWORD_BCRYPT);

    $email = $baza -> real_escape_string($email);
    $password = $baza -> real_escape_string($password);

    $baza -> query(" UPDATE korisnici SET sifra = '$password' WHERE email = '$email' ");

    
    