<?php
    include_once ('../../vendor/autoload.php');
    use pdo\Infrastructure\Repository\PdoPostRepository;
    use pdo\Domain\Model\Post;
    use pdo\Infrastructure\Persistence\CreateConnection;

    $repository = new PdoPostRepository(CreateConnection::createConnection());
    $id = filter_input(INPUT_POST, 'id_code', FILTER_DEFAULT);
    $image = $_FILES['image_alter'];
    $cat = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);
    $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
    $desc = filter_input(INPUT_POST, 'desc_input', FILTER_DEFAULT);
    session_start();
    $iduser = $_SESSION['id'];

    try {
        if($image["size"] == 0){
            $connection = CreateConnection::createConnection();
            $stmt = $connection->query("SELECT post.image FROM post WHERE post.id = '$iduser'");
            foreach ($stmt->fetchAll() as $item) {
                $repository->alterPost(new Post($id, $title, $desc,new \DateTimeImmutable(),'', $item['image'],$cat));
                header('Location: ../../pages/post');
            }
        }else{
            $error = [];
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|svg|bmp)$/", $image["type"])){
                $_SESSION['image'] = "not image";
                $error[1] = "Não é uma imagem";
                echo 'Isso não é uma image';
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
                $stmt = $connection->query("SELECT user.image FROM user
                INNER JOIN author ON author.user_id = user.id WHERE user.id = '{$iduser}'");
                foreach ($stmt->fetchAll() as $item) {
                    echo 'aqui';
                    unlink("../../assets/".$item['image']."");
                    $repository->alterPost(new Post($id, $title, $desc,new \DateTimeImmutable(),'', $imageName,$cat));
                    header('Location: ../../pages/post');
                }
            }else{
                $_SESSION['image'] = "not image";
            }
        }
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }