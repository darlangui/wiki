<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entrar</title>
    <link rel="stylesheet" href="../../global.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../fonts/Fonts/WEB/css/satoshi.css">
    <link rel="icon" href="../../assets/logo_wk.svg">
</head>
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
<body>
    <main>
        <section class="ilust_content"><div class="square"></div><div class="blur"></div><div class="blur_two"></div></section>
        <section class="content_main">
            <a href="../../"><img class="logo" src="../../assets/logo_wiki.svg" alt="Logo da WIKING"></a>
            <div class="form">
                <form action="../../src/Execution/verifyLogin.php" method="post">
                    <h2>BEM VINDO NOVAMENTE!</h2>
                    <div class="input-container">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" style="<?php echo $test; ?>" placeholder="email@email.com">
                    </div>
                    <div class="input-container">
                        <label for="password">Senha</label>
                        <input  type="password" name="password" style="<?php echo $test; ?>" id="password" placeholder="password">
                    </div>
                    <div class="button">
                        <button class="button_black" type="submit">Entrar</button>
                    </div>
                    <div class="redirect">
                        <span> Não possui conta? <a href="../register">Cadastre-se</a> </span>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>