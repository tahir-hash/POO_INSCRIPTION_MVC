<?php

namespace App\Core;

class Constantes
{

    public const WEB_ROOT = "http://localhost:8000/";

    public static function ROOT()
    {
        return str_replace("public", "", $_SERVER["DOCUMENT_ROOT"]);
    }
    public const ENCODE_KEY="~nu!j_EBK,:XE2e{kQ!bhuQ9j]%SlF]z3L^Qy.Q[Gn?NCe&lt;BBy&gt;^LHv~1P]nq~&amp;;";
}
