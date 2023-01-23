<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authors</title>
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../fonts/Fonts/WEB/css/satoshi.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assets/logo_wk.svg">
</head>
<?php
    include_once('../../vendor/autoload.php');
    use pdo\Infrastructure\Repository\PdoUserRepository;
    use pdo\Infrastructure\Persistence\CreateConnection;
    function allAuthors(){
        $authors = new PdoUserRepository(CreateConnection::createConnection());
        $allAuthors = $authors->allUsersAreAuthors();
        foreach ($allAuthors as $author){
            echo "
                  <div class='card'>
                    <img src='../../assets/{$author->image()}' alt='Imagem do Author'>
                    <h4>{$author->name()}</h4>
                    <h5>{$author->description()}</h5>
                    <h5>Entre em contato <i>{$author->email()}</i></h5>
                    <a href='#'><span>Saiba mais</span></a>
                </div>
            ";
        }
    }
    session_start();
    if (isset($_SESSION['id'])) {
        $author = new PdoUserRepository(CreateConnection::createConnection());
        $style = $author->verifyTypeUser($_SESSION['id']);
        $author = $author->verifyUser($_SESSION['id']);
    } else {
        $style = 'isUser';
        session_destroy();
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
        <section class="content_author">
            <h3>Aqui tudo é rapido e prático</h3>
            <h1>Também deseja ser author</h1>
            <h1>de diversos artigos?</h1>
            <h2>Somente aqui pode compartilhar</h2>
            <h2>informações e dados de qualidade.</h2>
            <form action="#" method="post">
                <label for="email"></label><input type="email" name="email" id="email" placeholder="Digite seu email" required>
                <button type="submit">Começar</button>
            </form>
        </section>
        <section class="all_authors">
            <h2>Todos os Autores</h2>
            <h3>Os mais famosos e mais bem avaliados de toda a Internet.</h3>
            <div class="card_authors">
               <?php
                    allAuthors();
               ?>
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