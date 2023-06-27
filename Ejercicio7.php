<?php
class SimpleCipher {
    public $key;

    public function __construct($key = null) {
        if ($key === null) {
            $key = $this->generateRandomKey();
        } else {
            $this->validateKey($key);
        }

        $this->key = $key;
    }

    public function encode($plaintext) {
        $ciphertext = '';
        $plaintext = strtolower($plaintext);

        for ($i = 0; $i < strlen($plaintext); $i++) {
            $char = $plaintext[$i];
            $keyChar = $this->key[$i % strlen($this->key)];
            $shift = ord($keyChar) - ord('a');
            $encodedChar = chr((ord($char) - ord('a') + $shift) % 26 + ord('a'));
            $ciphertext .= $encodedChar;
        }

        return $ciphertext;
    }

    public function decode($ciphertext) {
        $plaintext = '';

        for ($i = 0; $i < strlen($ciphertext); $i++) {
            $char = $ciphertext[$i];
            $keyChar = $this->key[$i % strlen($this->key)];
            $shift = ord($keyChar) - ord('a');
            $decodedChar = chr((ord($char) - ord('a') - $shift + 26) % 26 + ord('a'));
            $plaintext .= $decodedChar;
        }

        return $plaintext;
    }

    private function generateRandomKey() {
        $length = 100;
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomKey = '';

        for ($i = 0; $i < $length; $i++) {
            $randomKey .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomKey;
    }

    private function validateKey($key) {
        if (!preg_match('/^[a-z]+$/', $key)) {
            throw new InvalidArgumentException('Invalid key. Key must contain only lowercase letters.');
        }
    }
}