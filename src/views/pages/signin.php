<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <div class="form-login-range">
        <div>
            <span>Login </span> <br><br>
            <?php
                if (!empty($flash)){
                    echo $flash;
                }
            ?>
            <form method="POST" action="<?=$base;?>/signin">
                <label for="inputEmail" class="visually-hidden">Email</label>
                
                <input type="email" id="inputEmail" class="form-control" placeholder="Digite seu email" required autofocus name="email">
                
                <label for="inputPassword" class="visually-hidden">Senha</label>
                
                <input type="password" id="inputPassword" class="form-control" placeholder="Digite sua senha" required name="password">
                
                <select name="tipo_login" class="mb-3 rounded border text-secondary">
                    <option value="usuario">Usuário</option>
                    <option value="colaborador">Colaborador</option>
                </select>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
            </form>
        </div>
    </div>
  </body>
</html>