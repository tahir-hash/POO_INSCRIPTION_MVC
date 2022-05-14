<?php

namespace App\Model;

use App\Model\User;

class RP extends User
{
    public function __construct()
    {
        parent::$role = "ROLE_RP";
    }
    public static function getRole()
    {
        return parent::$role = 'ROLE_RP';
    }
    public static function findAll(): array
    {
        $sql = "select * from " . parent::table() . " where role  like ?";
        return parent::findBy($sql, [self::getRole()]);
    }
}
