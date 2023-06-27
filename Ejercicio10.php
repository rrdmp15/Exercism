<?php
function toRna(string $dna): string {
    $rna = '';
    $complement = [
        'G' => 'C',
        'C' => 'G',
        'T' => 'A',
        'A' => 'U'
    ];
    
    for ($i = 0; $i < strlen($dna); $i++) {
        $nucleotide = $dna[$i];
        if (array_key_exists($nucleotide, $complement)) {
            $rna .= $complement[$nucleotide];
        } else {
            throw new InvalidArgumentException('Invalid DNA sequence.');
        }
    }
    
    return $rna;
}