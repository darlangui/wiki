<?php
    include_once('../../vendor/autoload.php');
    use pdo\Domain\Model\Post;
    use pdo\Infrastructure\Repository\PdoPostRepository;
    use pdo\Infrastructure\Persistence\CreateConnection;

    session_start();
    $id = $_SESSION['id'];
    $cat = filter_input(INPUT_POST, 'cat', FILTER_DEFAULT);
    $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
    $info = filter_input(INPUT_POST, 'info', FILTER_DEFAULT);
    $image = $_FILES['image'];
    $repository = new PdoPostRepository(CreateConnection::createConnection());

    try {
        if($image["size"] == 0){
            $repository->upPost(new Post(null,$title,$info,new \DateTimeImmutable(),'Em Analise','ilust_profe.svg',$cat), $id);
        }else{
            $error = [];
            if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|svg|bmp)$/", $image["type"])){
                $_SESSION['image'] = "not image";
                $error[1] = "Não é uma imagem";
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
                $repository->upPost(new Post(null,$title,$info,new \DateTimeImmutable(),'Em Analise',$imageName,$cat), $id);
                header('Location: ../../pages/post');
            }else{
                $_SESSION['image'] = "not image";
            }
        }
    }catch (PDOException $ex){
        echo $ex->getMessage();
    }