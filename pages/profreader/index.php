<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Analisar</title>
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

    function allPostsForVerify(){
        $repository = new PdoPostRepository(CreateConnection::createConnection());
        $list = $repository->verifyPost();
        foreach ($list as $item) {
            echo "
                <div class='card'>
                    <input type='hidden' name='id' value='{$item->id()}'>
                    <div class='image_post'><img src='../../assets/{$item->image()}' alt='Imagem do Post'></div>
                    <div class='resource'>
                        <h4>{$item->category()}</h4>
                        <h3>{$item->title()}</h3>
                        <span>{$item->information()}</span>
                        <div class='infos'>
                            <span>{$item->date()->format('d-m-Y')}</span>
                            <span>{$item->status()}</span>
                        </div>
                    </div>
                    <div class='option'>
                        <div class='rej'>
                            <a href='../../src/Execution/rejPost.php?id={$item->id()}'><button>Rejeitar</button></a>
                        </div>       
                            <a href='../../src/Execution/accPost.php?id={$item->id()}'><button>Aceitar</button></a>
                    </div>
                </div>
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
                        <a href="../author"><li class="li_selected">AUTORES</li></a>
                        <a href="../help"><li class="li_selected">AJUDA</li></a>
                    </ul>
                </section>
                <section class="right">
                    <a href="pages/login" ><button class="button_white">ENTRAR</button></a>
                    <a href="pages/register"><button class="button_black">REGISTRAR-SE</button></a>
                </section>
                <section class="right_profile">
                    <section class="profile">
                        <span id="profile"><?php if(isset($_SESSION['id'])){ echo substr($author->name(), 0, 1);} ?></span>
                        <div id="dropdown" class="dropdown">
                            <a href="../profile">Meu Perfil</a>
                            <a href="../post">Postar</a>
                            <a href="#" class="profreader">Analisar</a>
                            <a href="../../src/Execution/Logout.php" class="logout">Sair</a>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </header>
    <main>
        <section class="initial">
            <img src="../../assets/ilust_profe.svg" alt="Ilustração de Analisar">
            <h1>Analise artigos de outros utilizadores para determinar se a informação é veridica.</h1>
        </section>
        <section class="info">
            <span>Publicações para análise</span>
            <div class="cards">
                <?php allPostsForVerify(); ?>
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
    <script src="../../utils/ModelOpen.js"></script>
    <script src="../../utils/OnlyNumbers.js"></script>
</body>
</html>
