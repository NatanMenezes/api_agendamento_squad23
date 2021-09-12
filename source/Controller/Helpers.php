<?php

namespace Source\Controller;
use Source\Controller\Agendamento;

class Helpers
{
    static function juntarDataTurno ($data, $turno)
    {
        return "$data $turno";
    }

    static function separarDataTurno ($arr)
    {
        $res = [];
        foreach($arr as $el)
        {
            $el["turno"] = substr($el["data"], 11, 1);
            $el["data"] = substr($el['data'], 0, 10);
            array_push($res, $el);
        }
        return $res;
    }

    static function agendamentosPassados($arr)
    {
        $res = [];
        foreach($arr as $el) {
            $dataNovo = "".substr($el["data"], 6, 4)."-".substr($el["data"], 3, 2)."-".substr($el["data"], 0, 2)."";
            $time = strtotime($dataNovo);
            $hoje = time();
            if($time>$hoje){array_push($res, $el);}
        }
        return $res;
    }
}