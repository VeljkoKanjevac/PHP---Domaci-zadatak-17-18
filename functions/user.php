<?php


    function userExists($email, $sql): bool 
    {
        $email = $sql -> real_escape_string($email);

        $rezultat = $sql -> query(" SELECT * FROM korisnici WHERE email = '$email' ");
        
        if ($rezultat->num_rows == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function registerUser($name, $surname, $emailAdress, $password, $passwordAgain, $sql): void
    {   
        if($password === $passwordAgain)
        {
            $name = $sql -> real_escape_string($name);
            $surname = $sql -> real_escape_string($surname);
            $email = $sql -> real_escape_string($emailAdress);
            $password = $sql -> real_escape_string($password);
    
            $password = password_hash($password, PASSWORD_BCRYPT);
    
            $sql -> query(" INSERT INTO korisnici (ime, prezime, email, sifra) 
                            VALUES ('$name', '$surname', '$email', '$password') ");

            echo"Novi korisnik je uspesno registrovan";
        }
        else
        {
            echo "Lozinke se ne poklapaju, pokusajte ponovo";
        }
     }
       


    function dataValidation($emailAdress, $password, $sql): bool     
    {
        $email = $sql -> real_escape_string($emailAdress);
        $password = $sql -> real_escape_string($password);

        $rezultat = $sql -> query(" SELECT * FROM korisnici WHERE email = '$email' ");

        $korisnik = $rezultat -> fetch_assoc();
    
        if (password_verify($password, $korisnik["sifra"]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function getUserById($id, $sql): mixed
    {
        $userId = $sql -> real_escape_string($id);

        $result = $sql -> query(" SELECT * FROM korisnici WHERE id_korisnika = $userId ");

        $user = $result -> fetch_assoc();

        return $user;
        
    }

    function getUserByEmail($emailAdress, $sql):array
    {
    
        $email = $sql -> real_escape_string($emailAdress);

        $result = $sql -> query( " SELECT * FROM korisnici WHERE email = '$email' ");

        $user = $result -> fetch_assoc();

        return $user;
        
    }