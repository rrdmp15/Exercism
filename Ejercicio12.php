<?php
function isIsogram(string $word): bool {
    $letters = [];
    $word = mb_strtolower($word);

    for ($i = 0; $i < mb_strlen($word); $i++) {
        $char = mb_substr($word, $i, 1);

        if ($char !== ' ' && $char !== '-') {
            if (isset($letters[$char])) {
                return false;
            }
            $letters[$char] = true;
        }
    }

    return true;
}
