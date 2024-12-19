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
                Trenutna lozinka nije ispravna! Pokusajte ponono.
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION["razliciteLozinke"])): ?>
        <div class="alert alert-danger" role="alert">
            <div class="container">
                Lozinke se ne poklapaju! Pokusajte ponono.
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
    <form action="modeli/changePassword.php" method="post">

        <div class="mb-3 col-4">
            <label for="exampleInputPassword1" class="form-label">Unesite trenutnu lozinku</label>
            <input name="trenutnaLozinka" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 col-4">
            <label for="exampleInputPassword1" class="form-label">Unesite novu lozinku</label>
            <input name="novaLozinka" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 col-4">
            <label for="exampleInputPassword1" class="form-label">Ponovo unesite novu lozinku</label>
            <input name="novaLozinkaPonovljeno" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <input type="hidden" name="email" value="<?= $_SESSION["email"] ?>">
        <button type="submit" class="btn btn-primary col-4">Promeni lozinku</button>

    </form>
    </div>
    
    
</body>

</html>