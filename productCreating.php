
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>

    <?php require_once "index.php"; ?>

    <div class="container">
        <form action="modeli/createProduct.php" method="post">
    
        <div class="mb-3 col-4">
            <label for="ime" class="form-label">Unesite ime proizvoda</label>
            <input type="text" name="ime" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="opis" class="form-label">Unesite opis proizvoda</label>
            <input type="text" name="opis" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="cena" class="form-label">Unesite cenu proizvoda</label>
            <input type="number" name="cena" class="form-control" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 col-4">
            <label for="slika" class="form-label">Unesite sliku proizvoda</label>
            <input type="text" name="slika" class="form-control">
        </div>
        <div class="mb-3 col-4">
            <label for="kolicina" class="form-label">Unesite kolicinu proizvoda</label>
            <input type="number" name="kolicina" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary col-4">Kreiraj proizvod</button>  
    
        </form>
    </div>
    
</body>

</html>

