<?php
function isValid(string $number): bool
{
    $number = str_replace(' ', '', $number);

    if (strlen($number) <= 1 || !ctype_digit($number)) {
        return false;
    }

    $sum = 0;
    $digits = str_split(strrev($number));

    foreach ($digits as $key => $digit) {
        if ($key % 2 === 1) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        $sum += $digit;
    }

    return $sum % 10 === 0;
}
