<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../fonts/Fonts/WEB/css/satoshi.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assets/logo_wk.svg">
</head>
<?php
    use \pdo\Infrastructure\Repository\PdoUserRepository;
    use \pdo\Infrastructure\Persistence\CreateConnection;
    use pdo\Infrastructure\Repository\PdoPostRepository;
    include_once('../../vendor/autoload.php');
    session_start();
    if(isset($_SESSION['id'])){
        $author = new PdoUserRepository(CreateConnection::createConnection());
        $style = $author->verifyTypeUser($_SESSION['id']);
        $author = $author->verifyUser($_SESSION['id']);
    }else{
        $style = 'isUser';
        session_destroy();
    }

    function allPosts() : void
    {
        $postRepository = new PdoPostRepository(CreateConnection::createConnection());
        $allPosts = $postRepository->allPostsAndAuthors();
        foreach ($allPosts as $post){
            $postOne = $post->posts();
            foreach ($postOne as $row){
                $date = $row->date();
                echo "
                    <div class='card'>
                        <div class='image_post'><img src='../../assets/{$row->image()}' alt='img post'></div>
                        <div class='resource'>
                            <h4>{$row->category()}</h4>
                            <h3>{$row->title()}</h3>
                            <span>{$row->information()}</span>
                            <div class='h5'>
                                <h5>{$date->format('d-m-Y')}</h5>   
                                <h5>{$post->name()}</h5>                     
                            </div>
                        </div>
                    </div>
            ";
            }
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
                        <a href="#"><li class="li_selected">POSTS</li></a>
                        <a href="../author"><li class="li_selected">AUTORES</li></a>
                        <a href="../help"><li class="li_selected">AJUDA</li></a>
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
                            <a href="../post">Postar</a>
                            <a href="../profreader" class="profreader">Analisar</a>
                            <a href="../../src/Execution/Logout.php" class="logout">Sair</a>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </header>
    <main>
        <section class="writer_content">
            <h1> POSTS </h1>
            <h2> As mais diversas informações sobre o mundo.</h2>
        </section>
        <section class="cards_content">
            <div class="left">
                <div class="card">
                    <h3>Resources</h3>
                    <span>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ipsum lectus, ltrices venenatis.
                    </span>
                </div>
            </div>
            <div class="right">
                <span> Tudo somente aqui </span>
                <div class="card">
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ipsum lectus, ltrices</h3>
                </div>
                <div class="card">
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ipsum lectus, ltrices</h3>
                </div>
                <div class="card">
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ipsum lectus, ltrices</h3>
                </div>
            </div>
        </section>
        <section class="main_content">
            <h3>Todas as Publicações</h3>
            <section class="content_card">
                <?php allPosts(); ?>
            </section>
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