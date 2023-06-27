<?php
    function reverseString(string $text): string{
        $reverse = strrev($text);
        return $reverse;
    }

    reverseString("cool");
?>