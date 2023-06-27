<?php
class Bob
{
    public function respondTo(string $input): string
    {
        $input = trim($input);

        if (preg_match('/^\s*$/', $input)) {
            return "Fine. Be that way!";
        } elseif (preg_match('/^[A-Z\s\d\W]+$/', $input) && preg_match('/[A-Z]/', $input)) {
            if (preg_match('/\?$/', $input)) {
                return "Calm down, I know what I'm doing!";
            }
            return "Whoa, chill out!";
        } elseif (preg_match('/\?$/', $input)) {
            return "Sure.";
        }

        return "Whatever.";
    }
}