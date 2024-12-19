<?php

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_SESSION["ulogovan"]))
    {
      $imePrezime = $_SESSION["ime"]." ".$_SESSION["prezime"];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img class="img-responsive" src="images/mobile-shop-logo.png" alt="mobile shop logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="showProducts.php">Prikaz proizvoda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productCreating.php">Kreiranje proizvoda</a>
        </li>
      </ul>
      <form action="searchProduct.php" method="get" class="d-flex">
        <input name="tekstZaPretragu" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Pretrazi</button>
      </form>
      <div class="nav-item dropdown">
          
          <?php if(isset($_SESSION["ulogovan"])): ?>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="orders.php">Korpa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <?php echo $imePrezime; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="modeli/logout.php">Log out</a></li>
                          <li><a class="dropdown-item" href="userProfile.php">Profil</a></li>
                          <li><a class="dropdown-item" href="changeAccount.php">Izmeni nalog</a></li>
                          <li><a class="dropdown-item" href="deleteAccount.php">Obrisi nalog</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

          <?php else:  ?>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Registracija/Login
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="registration.php">Registracija </a></li>
                                <li><a class="dropdown-item" href="login.php">Log in</a></li>
                          </ul>
                        </li>
                    </ul> 
              </div>

          <?php endif;  ?>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="login.php">Log in</a></li>
            <li><a class="dropdown-item" href="registration.php">Registracija</a></li>
          </ul>
        </div>
    </div>
  </div>
</nav>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>