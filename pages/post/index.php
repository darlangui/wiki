<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postar</title>
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../fonts/Fonts/WEB/css/satoshi.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assets/logo_wk.svg">
</head>
<?php
    use  \pdo\Infrastructure\Repository\PdoUserRepository;
    use \pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Infrastructure\Repository\PdoPostRepository;
    use pdo\Domain\Model\Post;
    include_once('../../vendor/autoload.php');
    session_start();
    if(isset($_SESSION['id'])){
        $author = new PdoUserRepository(CreateConnection::createConnection());
        $style = $author->verifyTypeUser($_SESSION['id']);
        $author = $author->verifyUser($_SESSION['id']);
    }else{
        $style = 'isUser';
        session_destroy();
        header('Location: ../404');
    }

    function allposts(){
        $repository = new PdoUserRepository(CreateConnection::createConnection());

        foreach ($repository->fillPost($_SESSION['id']) as $item){
            echo "
                <form class='card' action='../../src/Execution/upPost.php' method='post' enctype='multipart/form-data'>
                    <label>
                        <input type='hidden' name='id_code' value='{$item->id()}'>
                    </label>
                    <label class='image_post'>
                        <input type='file' name='image_alter' id='image_alter'><img src='../../assets/{$item->image()}' alt=''>
                    </label>
                    <div class='resource'>
                        <label>
                            <input type='text' name='categoria' id='categoria' class='cat_inpu' value='{$item->category()}'>
                        </label>
                        <label>
                            <input type='text' name='title' id='title'  class='title_input' value='{$item->title()}'>
                        </label>
                        <label>
                            <textarea name='desc_input' class='desc_input'> {$item->information() }</textarea>
                        </label>
                        <div class='dateStatus'>
                             <label>
                                <span>{$item->date()->format('d-m-Y')}</span>
                            </label>
                            <label>
                                <span>{$item->status()}</span>
                            </label>
                        </div>
                        <div class='option'>
                            <a href='../../src/Execution/deletePost.php?id={$item->id()}'>Excluir</a>
                            <button type='submit'>Alterar</button>
                        </div>  
                    </div>
                </form>
            ";
        }
    }
?>
<body>
    <header>
        <div class="<?php echo $style; ?>"> <!-- Tags content: isLogged or isAdmin or isUser -->
            <div class="content">
                <section class="left">
                    <a href="../../index.php"><img src="assets/logo_wiki.svg" alt="Logo da WIKING"></a>
                </section>
                <section class="center">
                    <ul>
                        <a href="../../"><li class="li_selected">BOAS VINDAS</li></a>
                        <a href="../posts"><li class="li_selected">POSTS</li></a>
                        <a href="#"><li class="li_selected">AUTORES</li></a>
                        <li class="li_selected">AJUDA</li>
                    </ul>
                </section>
                <section class="right">
                    <a href="../login" ><button class="button_white">ENTRAR</button></a>
                    <a href="../register"><button class="button_black">REGISTRAR-SE</button></a>
                </section>
                <section class="right_profile">
                    <section class="profile">
                        <span id="profile"><?php if(isset($_SESSION['id'])){ echo substr($author->name(), 0, 1);} ?></span>
                        <div id="dropdown" class="dropdown">
                            <a href="../profile">Meu Perfil</a>
                            <a href="#">Postar</a>
                            <a href="../profreader" class="profreader">Analisar</a>
                            <a href="../../src/Execution/Logout.php" class="logout">Sair</a>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </header>
    <main>
        <section class="initial">
            <img src="../../assets/card_publi.svg" alt="Ilustração de publicação">
            <h1>Adicione sua publicação para que todos possam ler</h1>
        </section>
        <section class="add_publi">
            <form class="form" action="../../src/Execution/insertPost.php" method="post" enctype="multipart/form-data">
                <span class="title">Informe os dados necessários para a publicação</span>
                <label>
                    <span>Categoria :</span>
                    <input type="text" name="cat" id="cat" placeholder="Digite a categoria da informação" required>
                </label>
                <label>
                    <span>Título :</span>
                    <input type="text" name="title" id="title" placeholder="Digite o título da informação" required>
                </label>
                <label class="textarea">
                    <span>Informação :</span>
                    <textarea name="info" id="info" placeholder="Digite a informação a ser publicada" required></textarea>
                </label>
                <label>
                    <span>Imagem :</span>
                    <input type="file" name="image" id="image">
                </label>
                <button type="submit">Publicar</button>
            </form>
        </section>
        <section class="publi">
            <span>Suas Publicações</span>
            <div class="containt_card">
                <?php allposts(); ?>
            </div>
        </section>
    </main>
    <footer>
        <section class="option_content">
            <a href="index.php"><img src="assets/logo_wiki_white.svg" alt="Logo da WIKING"></a>
            <ul>
                <li><span>info</span></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">Autores</a></li>
                <li><a href="#">Ajuda</a></li>
            </ul>
            <ul>
                <li><span>social</span></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </section>
        <section class="last_linear_content">
            <div class="linear"></div>
            <div class="last">
                <h3>2023</h3>
                <h3>Tamplete by Darlan</h3>
                <h3>2023</h3>
            </div>
        </section>
    </footer>
    <script src="../../utils/DropDownProfile.js"></script>
</body>
</html>