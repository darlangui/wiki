<?php
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use pdo\Domain\Model\User;
    use pdo\Infrastructure\Persistence\CreateConnection;
    include_once('../../vendor/autoload.php');

    $name = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
    $type = filter_input(INPUT_POST, "tipo", FILTER_DEFAULT);
    $cod = filter_input(INPUT_POST, "cod", FILTER_DEFAULT);
    $date = filter_input(INPUT_POST, "dat", FILTER_DEFAULT);
    $desc = filter_input(INPUT_POST, "desc", FILTER_DEFAULT);

    echo $name.$type;