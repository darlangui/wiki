<?php
    include_once('../../vendor/autoload.php');
    use pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use pdo\Domain\Model\User;

    $name = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
    $image = $_FILES["image"];
    session_start();
    $id = $_SESSION['id'];
    $userRepository = new PdoUserRepository(CreateConnection::createConnection());
    try {
        if($image["size"] == 0){
            $connection = CreateConnection::createConnection();
            $stmt = $connection->query("SELECT user.name, user.email, user.password, user.image, author.description FROM user
            INNER JOIN author ON author.user_id = user.id WHERE user.id = '$id'");
            foreach ($stmt->fetchAll() as $item) {
                $userRepository->save(new User($id, $name, $item['email'], $item['password'], $item['description'], $item['image']));
                header('Location: ../../pages/profile');
            }
        }else{
            $error = [];
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|svg|bmp)$/", $image["type"])){
                $_SESSION['image'] = "not image";
                $error[1] = "Não é uma imagem";
                header('Location: ../../pages/profile');
            }
            $tam = 1000000;

            if($image["size"] > $tam) { // Verifica se o tamanho da imagem é maior que o tamanho permitido
                $error[1] = "A imagem deve ter no máximo ".$tam." bytes";
            }

            if(count($error) == 0){
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $image["name"], $ext);
                $imageName = md5(uniqid(time())) . "." . $ext[1];
                $hell = "../../assets/" . $imageName;
                move_uploaded_file($image["tmp_name"], $hell);
                $connection = CreateConnection::createConnection();
                $stmt = $connection->query("SELECT user.name, user.email, user.password, user.image, author.description FROM user
                INNER JOIN author ON author.user_id = user.id WHERE user.id = '$id'");
                foreach ($stmt->fetchAll() as $item) {
                    if($item['image'] == 'pattern_user.svg'){
                        $userRepository->save(new User($id, $name, $item['email'], $item['password'], $item['description'], $imageName));
                        header('Location: ../../pages/profile');
                    }else{
                        unlink("../../assets/".$item['image']."");
                        $userRepository->save(new User($id, $name, $item['email'], $item['password'], $item['description'], $imageName));
                        header('Location: ../../pages/profile');
                    }
                }
            }else{
                $_SESSION['image'] = "not image";
                header('Location: ../../pages/profile');
            }
        }
    }catch (PDOException $ex){
        echo $ex->getMessage();
        header('Location: ../../pages/profile');
    }