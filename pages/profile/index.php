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
<body>
    <header>
        <div class="isLogged"> <!-- Tags content: isLogged or isAdmin or isUser -->
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
                        <span id="profile">D</span>
                        <div id="dropdown" class="dropdown">
                            <a href="#">Meu Perfil</a>
                            <a href="../post">Postar</a>
                            <a href="#" class="logout">Sair</a>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </header>
    <main>
        <section class="content_profile">
            <img src="../../assets/image_woman.svg" alt="Imagem do usuário">
            <span><span class="purplu">Olá,</span> Sofia Ester</span>
        </section>
        <section class="info_basic">
            <h1>Informações básicas</h1>
            <span>Algumas informações básicas sobre a sua conta.</span>
            <form method="post" class="form_name">
                <label for="name" class="name">
                    <span> Nome </span>
                    <input type="text" id="name" class="input-name" value="Sofia Ester" required>
                </label>
                <div class="alter_image">
                    <label for="image" class="image">
                        <span> Foto de Perfil </span>
                        <img src="../../assets/image_woman.svg" alt="Foto de pefil">
                        <input type="file" id="image">
                    </label>
                    <button type="submit">Alterar</button>
                </div>
            </form>
        </section>
        <section class="info_basic">
            <h1>Informações de contato</h1>
            <span>Algumas informações de contato sobre a sua conta.</span>
            <form method="post" class="form_name">
                <label for="email" class="name">
                    <span> E-mail </span>
                    <input type="text" id="email" class="input-name" value="sofiaester@gmail.com" required>
                </label>
                <div class="alter_image">
                    <label for="desc" class="image">
                        <span> Descrição </span>
                        <input type="text" name="desc" id="desc" placeholder="Descrição de sua conta">
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
                <div class="card">
                    <form class="card_form">
                        <label for="name_formation">
                            <input type="text" id="name_formation" name="name_formation" class="name_formation" value="Jornalismo" required>
                        </label>
                        <label for="type">
                            <span>Tipo</span>
                            <input type="text" id="type" class="type" value="Graduação" required>
                        </label>
                        <label for="cod">
                            <span>Código</span>
                            <input type="text" id="cod" class="cod" value="3643786" required>
                        </label>
                        <label for="date">
                            <span>Data</span>
                            <input type="date" id="date" class="date" value="2003-06-01" required>
                        </label>
                        <label id="label_desc" for="descript">
                            <span>Descrição</span>
                            <input type="text" id="descript" class="descript" value="Curso de graduação para jornalistas na UFSM" placeholder="Digite a descrição de sua formação">
                        </label>
                        <div class="option">
                            <a href="#">Excluir</a>
                            <button type="submit">Alterar</button>
                        </div>
                    </form>
                </div>
            </section>
        </section>

        <section id="modal" class="modal off">
            <div class="modal_content">
                <section class="exit">
                    <span>Adicionar Formação/Especialização</span><img src="../../assets/exit.svg" alt="Sair" id="exit"></section>
                <section class="main">
                    <form class="main">
                        <label>
                            <span>Nome:</span>
                            <input type="text" name="nome" placeholder="Digite o nome da Especialização/Formação" required>
                        </label>
                        <label>
                            <span>Tipo:</span>
                            <input type="text" name="tipo" placeholder="Digite o tipo de Especialização/Formação" required>
                        </label>
                        <label>
                            <span>Código:</span>
                            <input type="text" name="tipo" onkeypress="return onlyNumbers()" placeholder="Digite o código da Especialização/Formação">
                        </label>
                        <label>
                            <span>Data:</span>
                            <input type="date" name="tipo" placeholder="Digite a data de conclusão" required>
                        </label>
                        <label>
                            <span>Descrição:</span>
                            <input type="text" name="tipo" placeholder="Comente um pouco sobre a descrição de sua Especialização/Formação">
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