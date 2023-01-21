<?php
    include_once('../../vendor/autoload.php');


    $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

    $user = new \pdo\Infrastructure\Repository\PdoUserRepository(\pdo\Infrastructure\Persistence\CreateConnection::createConnection());
    if($user->login($email, $password)){
        header('Location: ../../');
    }else{
        session_start();
        $_SESSION['error'] = "border-color : red;";
        header('Location: ../../pages/login');
    }

