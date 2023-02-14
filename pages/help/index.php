<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajuda</title>
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
        <section class="feedback">
            <div class="card">
                <h1>Envie seu Feedback</h1>
                <form action="../../src/Execution/feedback.php" method="post">
                    <label>
                        <textarea name="info" placeholder="Digite as informações sobre o Feedback" required></textarea>
                    </label>
                    <button type="submit"> Enviar </button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>