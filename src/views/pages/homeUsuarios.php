<?php

$dataAtual = new DateTime();
$dataAtual = date_format($dataAtual, 'Y-m-d H:i:s');

use src\models\Ponto;


?>

<a href="<?=$base;?>/sair">Sair</a> <br>

Seja bem-vindo, <?=$loggedUser->getEmail();?> <br>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
    <title>Home - Usuários</title>
</head>
<body>

    <a href="<?=$base;?>/cadastro_user">Cadastrar um usuário</a> <br>
    <a href="<?=$base;?>/cadastro_colaborador">Cadastrar um colaborador</a>


    <br><br><br><br>

    <form action="<?=$base;?>/usuarios/relatorio" method="post">
        <input type="hidden" name="data_atual" value="<?php echo $dataAtual ?>">

        <label for="">Data inicial</label><br>
        <input type="date" name="data_incial" > <br><br>

        <label for="">Data final</label><br>
        <input type="date" name="data_final" > <br><br>

        <label for="">Ordernação</label> <br>
        <select name="ordenacao" class="mb-3 rounded ">
            <option value="desc">Mais novo para mais antigo</option>
            <option value="asc">Mais antigo para mais novo</option>
        </select> <br><br>

        <input type="submit" value="Gerar relatório">

    </form>


    <?php if($dadosRelatorio): ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">Id_colaborador</th>
                <th scope="col" class="text-center">Inicio</th>
                <th scope="col" class="text-center">Fim</th>
                <th scope="col" class="text-center">Total em horas</th>
            </tr>
        </thead>

        <?php for($i = 0; $i<count($dadosRelatorio); $i++): ?>
            <?php 
            $p = new Ponto();
                $p->setIdColaborador($dadosRelatorio[$i]['id_colaborador']);
                $p->setStartedAt($dadosRelatorio[$i]['started_at']);
                $p->setFinishedAt($dadosRelatorio[$i]['finished_at']);
                $p->setTotalHoras();
            ?>

        <tbody>
            <tr>
                <th class="text-center"><?php echo $p->getIdColaborador(); ?></th>
                <td class="text-center"><?php echo $p->getStartedAt(); ?></td>
                <td class="text-center"><?php echo $p->getFinishedAt(); ?></td>
                <td class="text-center"><?php echo number_format($p->getTotalHoras(), 2, ',', '.');?></td>
        </tbody>
        <?php endfor ?>
    </table>
    <?php endif ?>

</body>
</html>

