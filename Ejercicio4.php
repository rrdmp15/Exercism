<?php
function distance(string $strand1, string $strand2): int
{
    if (strlen($strand1) !== strlen($strand2)) {
        throw new InvalidArgumentException('DNA strands must be of equal length.');
    }
    $hammingDistance = 0;
    $length = strlen($strand1);
    for ($i = 0; $i < $length; $i++) {
        if ($strand1[$i] !== $strand2[$i]) {
            $hammingDistance++;
        }
    }
    return $hammingDistance;
}
