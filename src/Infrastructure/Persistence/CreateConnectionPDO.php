<?php

namespace pdo\Infrastructure\Persistence;
use PDO;

class CreateConnectionPDO
{
    public static function createConnection() : PDO
    {
        $connection = new PDO('mysql:host=localhost;dbname=last_data_base','root','');

        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connection;
    }
}