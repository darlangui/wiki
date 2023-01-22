<?php
    include_once('../../vendor/autoload.php');
    use \pdo\Domain\Model\User;
    use \pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Infrastructure\Repository\PdoUserRepository;

    $name = filter_input(INPUT_POST, "name_user", FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, "email", FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

    $connection = CreateConnection::createConnection();

    $userRepository = new PdoUserRepository($connection);

    $connection->beginTransaction();
    try{
        $newUser = new User(null, "$name", "$email", "$password", '', 'pattern_user.svg');
        session_start();
        if($userRepository->save($newUser)){
            $connection->commit();
            $_SESSION['email'] = $email;
            header('Location: ../../pages/login');
        }else{
            $_SESSION['error'] = 'border-color : red;';
            header('Location: ../../pages/register');
        }
    }catch (\PDOException $ex){
        echo $ex->getMessage();
        $connection->rollBack();
    }