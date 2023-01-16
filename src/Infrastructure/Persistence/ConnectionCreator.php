<?php

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
        return new PDO('', '', '');
    }
}