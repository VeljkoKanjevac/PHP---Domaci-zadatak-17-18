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
    
    <?php if(isset($_SESSION["pogresnaLozinka"])): ?>
        <div class="alert alert-danger" role="alert">
            <div class="container">
                Uneli ste pogresnu lozinku! Pokusajte ponono.
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION["nepostojeciEmail"])): ?>
        <div class="alert alert-danger" role="alert">
            <div class="container">
                Uneti email ne postoji u bazi podataka! Pokusajte ponovo.
            </div>
        </div>
    <?php endif; ?>

    <form action="modeli/userLogin.php" method="post">
        <div class="container">
            <div class="mb-3 col-4">
                <label for="email" class="form-label">Email adresa</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3 col-4">
                <label for="lozinka" class="form-label">Lozinka</label>
                <input type="password" name="lozinka" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary col-4">Uloguj me</button>  
        </div>
    </form>
   
   

</body>

</html>