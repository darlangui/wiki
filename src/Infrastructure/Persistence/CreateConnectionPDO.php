<?php

namespace pdo\Infrastructure\Persistence;
use PDO;

class CreateConnectionPDO
{
    public static function createConnection() : PDO
    {
        return new PDO('mysql:localhost;bdname=last_data_base','root','');
    }
}