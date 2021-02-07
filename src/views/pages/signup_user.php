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
            <form method="POST" action="<?=$base;?>/login">
                <label for="inputEmail" class="visually-hidden">Email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Digite seu email" required autofocus name="email">
                <label for="inputPassword" class="visually-hidden">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Digite sua senha" required name="password">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            </form>
            <a href="<?=$base;?>/cadastro_user">Cadastrar um usuário</a> <br>
            <a href="<?=$base;?>/cadastro_colaborador">Cadastrar um colaborador</a>
        </div>
    </div>
  </body>
</html>