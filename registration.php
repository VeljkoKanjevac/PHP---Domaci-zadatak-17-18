<?php

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

    <?php if(isset($_SESSION["postojeciEmail"])): ?>
        <div class="alert alert-danger" role="alert">
            <div class="container">
                Email vec postoji u bazi podataka! Pokusajte ponono.
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <form action="modeli/userRegistration.php" method="post">
    
        <div class="mb-3 col-4">
            <label for="ime" class="form-label">Ime korisnika</label>
            <input type="text" name="ime" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="prezime" class="form-label">Prezime korisnika</label>
            <input type="text" name="prezime" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="email" class="form-label">Email adresa</label>
            <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="lozinka" class="form-label">Unesite lozinku</label>
            <input type="password" name="lozinka" class="form-control" >
        </div>
        <div class="mb-3 col-4">
            <label for="lozinkaPonovljeno" class="form-label">Ponovite unos lozinke</label>
            <input type="password" name="lozinkaPonovljeno" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary col-4">Registruj me</button>  
    
        </form>
    </div>
    
</body>

</html>