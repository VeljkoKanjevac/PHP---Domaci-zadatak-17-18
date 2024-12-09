<?php

    function makeOrder( $productId, $userId, $amount, $price, $sql)
    {
        $user_id = $sql -> real_escape_string($userId);
        $productId = $sql -> real_escape_string($productId);
        $amount = $sql -> real_escape_string($amount);
        $price = $sql -> real_escape_string($price);
        
        $sql -> query(" INSERT INTO narudzbine (id_proizvoda, id_korisnika, cena, kolicina)
                        VALUES ($productId, $user_id, $price, $amount) ");
    }

   function getOrdersById( $userId, $sql)
   {
        $user_id = $sql -> real_escape_string($userId);
        
        $rezultat = $sql -> query(" SELECT * FROM narudzbine WHERE id_korisnika = $user_id ");
    
        $orders = $rezultat -> fetch_all(MYSQLI_ASSOC);

        return $orders;
    }