<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <div class="form-login-range">
        <div>
            <a href="<?=$base;?>/signin">Retornar para login</a> <br>
            <span> Cadastro usuario</span> <br><br>
            <?php
                if (!empty($flash)){
                    echo $flash;
                }
            ?>
            <form method="POST" action="<?=$base;?>/cadastro_user">
                <input type="email" id="inputEmail" class="form-control" placeholder="Digite seu email" required autofocus name="email">
                <input type="password" id="inputPassword" class="form-control" placeholder="Digite sua senha" required name="senha">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            </form>
        </div>
    </div>
  </body>
</html>