<?php

    function checkInputs($assocArray): void
    {
        foreach($assocArray as $inputName => $inputValue)
        {
            if(!isset($inputValue) || empty($inputValue))
            {
                die("Podatak [ $inputName ] nije prosledjen");
            }
        }
    }

    