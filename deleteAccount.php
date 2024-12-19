<?php

    if(session_status() === PHP_SESSION_NONE)
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
    
</body>

    <?php require_once "index.php"; ?>

    <?php if(isset($_SESSION["pogresnaLozinka"])): ?>
        <div class="alert alert-danger" role="alert">
            <div class="container">
                Uneli ste pogresnu lozinku! Pokusajte ponono.
            </div>
        </div>
    <?php endif; ?>
    
    <div class="container">
    <form action="modeli/removeAccount.php" method="post">
        <div class="mb-3 col-4">
            <label for="exampleInputPassword1" class="form-label">Unesite lozinku da biste obrisali nalog</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <input type="hidden" name="email" value="<?= $_SESSION["email"] ?>">
        <button type="submit" class="btn btn-primary col-4">Obrisi nalog</button>
    </form>
    </div>

</html>