<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiking</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="fonts/Fonts/WEB/css/satoshi.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="assets/logo_wk.svg">
</head>
<body>
    <header>
        <div class="isLogged Admin"> <!-- Tags content: isLogged or isAdmin or isUser -->
            <div class="content">
                <section class="left">
                    <a href="index.php"><img src="assets/logo_wiki.svg" alt="Logo da WIKING"></a>
                </section>
                <section class="center">
                    <ul>
                        <li class="li_selected">BOAS VINDAS</li>
                        <a href="pages/posts"><li class="li_selected">POSTS</li></a>
                        <a href="pages/author"><li class="li_selected">AUTORES</li></a>
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
                            <a href="pages/profile">Meu Perfil</a>
                            <a href="pages/post">Postar</a>
                            <a href="pages/profreader" class="profreader">Analisar</a>
                            <a href="#" class="logout">Sair</a>
                        </div>
                    </section>
                </section>
            </div>
        </div>
    </header>
    <main>
        <section class="initial_content">
            <h1>Escreva.</h1>
            <h1>Publique.</h1>
            <h1>Leia.</h1>
        </section>
        <section class="animation_content"></section>
        <section class="block_content">
            <div class="writer_content">
                <h2>Uma enciclopédia online e gratuita, criada e editada</h2>
                <h2>por voluntários de todo o mundo.</h2>
            </div>
            <div class="buttons_content">
                <a href="#"><button class="button_black">Últimos Posts</button></a>
                <a href="#"><button class="button_white">Views</button></a>
            </div>
        </section>
        <section class="cards_content">
            <div class="cards">
                <div class="card">
                    <div class="header">
                        <img src="assets/image_woman.svg" alt="Imagem do usuario">
                        <span>Sofia Sterm</span>
                    </div>
                    <div class="main">
                        <span>O termo "butterfly" foi originado a partir da palavra inglesa antiga "butter-fleoge", que significa "borboleta de manteiga". Isso se deve ao fato de que as pessoas acreditavam que as borboletas eram criadas a partir de manteiga quando elas saíam de seus casulos.</span>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <img src="assets/image_man.svg" alt="Imagem do usuario">
                        <span>Nathan David Thompson.</span>
                    </div>
                    <div class="main">
                        <span>Os elefantes são os únicos animais com quatro joelhos visíveis. As outras três pernas estão escondidas dentro de suas pernas dianteiras e são usadas para se apoiar quando estão deitados.</span>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <img src="assets/image_man2.svg" alt="">
                        <span>Liam Jameson Williams</span>
                    </div>
                    <div class="main">
                        <span>O formigueiro mais alto já registrado mediu 30 metros de altura e foi encontrado na África. Ele foi construído por uma colônia de formigas saúva e levou cerca de 30 anos para ser completado.</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="big_cards_content">
            <div class="big_card">
                <img src="assets/posts_one.svg" alt="" class="img_content">
                <div>
                    <h1>Qualidade de Informações</h1>
                    <h2>Informações dos mais diversos continentes do mundo com a maior qualidade e integridade de todos os tempos.</h2>
                </div>
            </div>
            <div class="big_card_two">
                <div>
                    <h1>Dados em Tempo Real</h1>
                    <h3>24h por dia</h3>
                    <h2>Atualizações a cada instante em todo o planeta com as mais diversas informações do mundo.</h2>
                </div>
                <img src="assets/posts_two.svg" alt="" class="img_content">
            </div>
            <div class="big_card">
                <img src="assets/posts_tree.svg" alt="" class="img_content">
                <div>
                    <h1>Publicação de Todo o Mundo</h1>
                    <h2>Dados trazidos de todos os lugares em todo momento importante da história do mundo.</h2>
                </div>
            </div>
        </section>
        <section class="authors_content">
            <h2>Interrese em ser autor de</h2>
            <h2>diversas publicações?</h2>
            <h3>Somente aqui você estuda e aprende com diversas</h3>
            <h3>pessoas de todo o mundo.</h3>
            <a href="pages/register"><button class="button_white">Registre-se</button></a>
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
    <script src="utils/DropDownProfile.js"></script>

</body>
</html>