<?php

    
    function insertProduct($name, $description, $price, $image, $amount, $sql)
    {
        $name = $sql -> real_escape_string($name);
        $description = $sql -> real_escape_string($description);
        $price = $sql -> real_escape_string($price);
        $image = $sql -> real_escape_string($image);
        $amount = $sql -> real_escape_string($amount);

        $sql -> query(" INSERT INTO proizvodi (ime, opis, cena, slika, kolicina) 
                        VALUES ('$name', '$description', $price, '$image', $amount) ");
    }

    function getProductById($id, $sql): mixed
    {
        $id = $sql -> real_escape_string($id);

        $result = $sql -> query(" SELECT * FROM proizvodi WHERE id_proizvoda = $id ");

        if($result -> num_rows == 0)
        {
            die("Ovaj proizvod ne postoji u bazi podataka.");
        }
        else
        {
            $product = $result -> fetch_assoc();

            return $product;
        }
    }

    function productExists($id, $sql): bool
    {
        $id = $sql -> real_escape_string($id);
        
        $rezultat = $sql -> query(" SELECT * FROM proizvodi WHERE id_proizvoda = '$id' ");
        
        if ($rezultat->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function getAllProducts($sql)
    {
        $result = $sql -> query(" SELECT * FROM proizvodi ");
    }