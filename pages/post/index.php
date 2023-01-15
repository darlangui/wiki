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
                        <span id="profile">D</span>
                        <div id="dropdown" class="dropdown">
                            <a href="../profile">Meu Perfil</a>
                            <a href="#">Postar</a>
                            <a href="#" class="logout">Sair</a>
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
            <form class="form">
                <span class="title">Informe os dados necessários para a publicação</span>
                <label>
                    <span>Categoria :</span>
                    <input type="text" name="cat" id="cat" placeholder="Digite a categoria da informação" required>
                </label>
                <label>
                    <span>Título :</span>
                    <input type="text" name="descri" id="descri" placeholder="Digite o título da informação" required>
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
            <form class="card">
                <label>
                    <input type="hidden" name="id" value="id">
                </label>
                <label class="image_post">
                    <input type="file" name="image_alter" id="image_alter"><img src="../../assets/image_woman.svg" alt="">
                </label>
                <div class="resource">
                    <label>
                        <input type="text" name="categoria" id="categoria" class="cat_inpu" value="Resource">
                    </label>
                    <label>
                        <input type="text" name="title" id="title"  class="title_input" value="Improving Your Site's SED">
                    </label>
                    <label>
                        <textarea class="desc_input"> Build a unique experience  by missing and matching components.</textarea>
                    </label>
                    <div class="option">
                        <a href="#">Excluir</a>
                        <button type="submit">Alterar</button>
                    </div>
                </div>
            </form>

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