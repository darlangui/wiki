<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscreva-se</title>
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../fonts/Fonts/WEB/css/satoshi.css">
    <link rel="icon" href="../../assets/logo_wk.svg">
</head>
<body>
<?php
    function testError() : string
    {
        session_start();
        $style = '';
        if(isset($_SESSION['error'])){
            $style = $_SESSION['error'];
            unset($_SESSION['error']);
            return $style;
        }
        return $style;
    }

    $test = testError();
?>
<main>
    <section class="ilust_content"><div class="square"></div><div class="blur"></div><div class="blur_two"></div></section>
    <section class="content_main">
        <a href="../../"><img class="logo" src="../../assets/logo_wiki.svg" alt="Logo da WIKING"></a>
        <div class="form">
            <form action="../../src/Execution/insertUser.php" method="post">
                <h2>Informe seus dados <img src="../../assets/icon_info.svg" alt="Icone de informações"></h2>
                <div class="input-container">
                    <label for="name">Seu Nome</label>
                    <input type="text" name="name_user" id="name_user" placeholder="Ex: Darlan Guimarães">
                </div>
                <div class="input-container">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" style="<?php echo $test;?>" placeholder="Ex: email@email.com">
                </div>
                <div class="input-container">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Ex: password">
                </div>
                <div class="button">
                    <button class="button_black" type="submit">Cadastrar</button>
                </div>
                <div class="redirect">
                    <span> Já possui uma conta? <a href="../login">Entrar</a> </span>
                </div>
            </form>
        </div>
    </section>
</main>
</body>
</html>