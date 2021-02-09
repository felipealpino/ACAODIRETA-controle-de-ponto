<a href="<?=$base;?>/sair">Sair</a> <br><br>
Usuário logado: <?=$loggedUser->getEmail();?> <br>
Seja bem-vindo, <?=$loggedUser->getNome();?> <br><br>

<?php

        $inicio = new DateTime('09/02/2021 08:00:00');
        $inicio = date_format($inicio, 'Y-m-d H:i:s');
        $final = new DateTime('09/03/2021 16:00:00');
        $final = date_format($final, 'Y-m-d H:i:s');

        echo "Inicio: ".$inicio."<br>";
        echo "Final: ".$final."<br>";
        $diff = strtotime($final) - strtotime($inicio);
        $diff = $diff / 60 / 60;
        echo $diff." horas trabalhadas";

    ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/colaboradoresHome.css">
    <title>Home - Colaboradores</title>
</head>
<body>
    

    <div class="content-cronometro">
        <div class="cronometro-count">
            <div class="cronometro-count-numbers">
                <h1 class="time">00:00:00</h1>
            </div>
        </div>

        <div class="cronometro-buttons">
            <button type="button" class="btn btn-success btn-play">Play</button>
            <button type="button" class="btn btn-warning btn-end" onclick="return confirm('Tem certeza que deseja finalizar?')">End</button>
        </div>

    </div>


    

<script src="assets/js/colaboradoresHome.js"></script>
</body>
</html>