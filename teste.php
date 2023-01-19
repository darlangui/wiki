<?php
include_once('vendor/autoload.php');

use \pdo\Infrastructure\Repository\PdoAuthorRepository;

$authors = new PdoAuthorRepository(\pdo\Infrastructure\Persistence\CreateConnectionPDO::createConnection());
$allAuthors = $authors->allAuthors();
    $user = $allAuthors[0];
    echo $user->name();