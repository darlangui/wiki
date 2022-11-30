<?php

require_once 'autoload.php';

use \src\Modelo\User\Author;
use src\Modelo\User\Proofreader;

$user = new Author('1234','darl1203', '987654', 'Darlan', 'Teste', 'teste desc');
var_dump($user);

$user = new Proofreader('2','gui0000','1895','Guilherme', date('m/d/y'));
var_dump($user);
