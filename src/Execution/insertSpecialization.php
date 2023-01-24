<?php
    include_once('../../vendor/autoload.php');
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Domain\Model\Specialization;
    use pdo\Domain\Model\User;

    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);