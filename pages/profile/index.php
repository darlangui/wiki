<!doctype html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../fonts/Fonts/WEB/css/satoshi.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../assets/logo_wk.svg">
</head>
<?php
    use  \pdo\Infrastructure\Repository\PdoUserRepository;
    use \pdo\Infrastructure\Persistence\CreateConnection;
    include_once('../../vendor/autoload.php');
    session_start();
    if(isset($_SESSION['id'])){
        $author = new PdoUserRepository(CreateConnection::createConnection());
        $author1 = $author;
        $style = $author->verifyTypeUser($_SESSION['id']);
        $author = $author->verifyUser($_SESSION['id']);
    }else{
        $style = 'isUser';
        session_destroy();
    }

    function Specialization(PdoUserRepository $author){
        $specialization = $author->fillSpecialization($_SESSION['id']);
        foreach ($specialization as $item) {
            $date = $item->date();
            echo "
                    <div class='card'>
                    <form class='card_form' action='../../src/Execution/upSpecialization.php' method='post'>
                        <input type='hidden' value='{$item->id()}' name='id'>
                        <label for='name_formation'>
                            <input type='text' id='name_formation' name='name_formation' class='name_formation' value='{$item->name()}' required>
                        </label>
                        <label for='cod'>
                            <span>Código</span>
                            <input type='text' name='code' id='cod' class='cod' value='{$item->code()}' required>
                        </label>
                        <label for='date'>
                            <span>Data</span>
                            <input type='date' id='date' name='date' class='date' value='{$date->format("Y-m-d")}' required>
                        </label>
                        <label id='label_desc' for='descript'>
                            <span>Descrição</span>
                            <textarea type='text' id='descript' name='descript' class='descript' placeholder='Digite a descrição de sua formação'>{$item->description()}</textarea>
                        </label>
                        <div class='option'>
                            <a href='../../src/Execution/deleteSpecialization.php?id={$item->id()}'>Excluir</a>
                            <button type='submit'>Alterar</button>
                        </div>
                    </form>
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
                        <li class="li_selected">AJUDA</li>
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
                            <a href="#">Meu Perfil</a>
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
        <section class="content_profile">
            <img src="../../assets/<?php echo $author->image(); ?>" alt="Imagem do usuário">
            <span><span class="purplu">Olá,</span> <?php echo $author->name(); ?></span>
        </section>
        <section class="info_basic">
            <h1>Informações básicas</h1>
            <span>Algumas informações básicas sobre a sua conta.</span>
            <form method="post" action="../../src/Execution/upInfo.php" enctype='multipart/form-data' class="form_name">
                <label for="name" class="name">
                    <span> Nome </span>
                    <input type="text" id="name" class="input-name" name="name" value="<?php echo $author->name(); ?>" required>
                </label>
                <div class="alter_image">
                    <label for="image" class="image">
                        <span> Foto de Perfil </span>
                        <img src="../../assets/<?php echo $author->image(); ?>" alt="Foto de pefil">
                        <input type="file" id="image" name="image">
                    </label>
                    <button type="submit">Alterar</button>
                </div>
            </form>
        </section>
        <section class="info_basic">
            <h1>Informações de contato</h1>
            <span>Algumas informações de contato sobre a sua conta.</span>
            <form method="post" class="form_name" action="../../src/Execution/upContactInfo.php">
                <label for="email" class="name">
                    <span> E-mail </span>
                    <input type="text" id="email" name="email" class="input-name" value="<?php echo $author->email(); ?>" required>
                </label>
                <div class="alter_image">
                    <label for="desc" class="image">
                        <span> Descrição </span>
                        <input type="text" name="description" id="desc"  value="<?php echo $author->description(); ?>" placeholder="Descrição de sua conta">
                    </label>
                    <button type="submit">Alterar</button>
                </div>
            </form>
        </section>
        <section class="formations">
            <section class="add_forma">
                <h2>Formações e Especializações</h2>
                <a class="openModal" id="openModal"><button>Adicionar +</button></a>
            </section>
            <section class="cards_formations">
                <?php Specialization($author1); ?>
            </section>
        </section>

        <section id="modal" class="modal off">
            <div class="modal_content">
                <section class="exit">
                    <span>Adicionar Formação/Especialização</span><img src="../../assets/exit.svg" alt="Sair" id="exit"></section>
                <section class="main">
                    <form class="main" method="post" action="../../src/Execution/insertSpecialization.php">
                        <label>
                            <span>Nome:</span>
                            <input type="text" name="name" placeholder="Digite o nome da Especialização/Formação" required>
                        </label>
                        <label>
                            <span>Código:</span>
                            <input type="text" name="cod" onkeypress="return onlyNumbers()" placeholder="Digite o código da Especialização/Formação">
                        </label>
                        <label>
                            <span>Data:</span>
                            <input type="date" name="dat" placeholder="Digite a data de conclusão" required>
                        </label>
                        <label>
                            <span>Descrição:</span>
                            <input type="text" name="desc" placeholder="Comente um pouco sobre a descrição de sua Especialização/Formação">
                        </label>
                        <div class="option_main">
                            <button type="submit">Adicionar</button>
                        </div>
                    </form>
                </section>
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