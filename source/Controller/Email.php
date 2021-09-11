<?php

namespace Source\Controller;

class Email
{
    static function PegaEmail($emails)
    {
        $recipiente = [];
        $emails = explode(',', $_POST['emails'], 3);
        foreach ($emails as $value) {
            array_push($recipiente, $value);
        }
        return $recipiente;
    }
}
