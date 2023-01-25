<?php
    include_once ('../../vendor/autoload.php');
    use pdo\Infrastructure\Persistence\CreateConnection;
    session_start();
    $inf = filter_input(INPUT_POST, 'info', FILTER_DEFAULT);
    $date = new \DateTimeImmutable();
    $date = $date->format('Y-m-d');
    $id = $_SESSION['id'];
    if(isset($_SESSION['id'])){
        $sqlQuery = "INSERT INTO feedback (description, date, user_id)VALUES ('$inf', '$date', '$id')";
        $stmt = CreateConnection::createConnection()->query($sqlQuery);
        $stmt->execute();
        header('Location: ../../');
    }else{
        header('Location: ../../pages/register');
    }
