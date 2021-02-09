<?php
use src\models\Ponto;
use src\handlers\ColaboradoresHandler;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=$base;?>/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/colaboradoresHome.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title>Home - Colaboradores</title>
</head>

<a href="<?=$base;?>/sair">Sair</a> <br>
<span>Usuário logado:</span> <?=$loggedUser->getEmail();?> <br>
<span>Seja bem-vindo,</span> <?=$loggedUser->getNome();?> <br><br>

<?php

$horas = '00';
$minutos = '00';
$segundos = '00';

$data = ColaboradoresHandler::getPontoAberto($loggedUser->getId());

if($data){
    $tempoAtual = new DateTime();
    $tempoInicial = new DateTime($data['started_at']);
    $intervalo = $tempoAtual->diff($tempoInicial);
    $horas = ($intervalo->h) - 4;
    $minutos = $intervalo->i;
    $segundos = $intervalo->s;
} 

$pontosFinalizados = ColaboradoresHandler::getFinalizados($loggedUser->getId());


if($data){
    echo "Existe um ponto em aberto: "."<br>";
    // print_r($data);
    $p = new Ponto();
        $p->setIdColaborador($data['id_colaborador']);
        $p->setStartedAt($data['started_at']);
        $p->setId($data['id']);
    
    echo "Id ponto: ".$p->getId()."<br>";
    echo "Id colaborador: ".$p->getIdColaborador()."<br>";
    echo "Inicio ponto: ".$p->getStartedAt()."<br>";
    
} else {
    echo "Não existe nenhum ponto em aberto";
}   

?>



<body>
    <div class="content-cronometro">
        <div class="cronometro-count-numbers">
            <h1 class="time"><?php echo $horas.":".$minutos.":".$segundos?></h1>
        </div>

        <div class="cronometro-buttons">
            <button type="button" class="btn btn-success btn-play">Play</button>
            <button type="button" class="btn btn-danger btn-end" onclick="return confirm('Tem certeza que deseja finalizar?')">End</button>
        </div>

    </div>

    <br><br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center">id_ponto</th>
                <th scope="col" class="text-center">Inicio</th>
                <th scope="col" class="text-center">Fim</th>
                <th scope="col" class="text-center">Total em horas </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            for($i=0; $i<count($pontosFinalizados); $i++):
                $ponto = new Ponto();
                    $ponto->setId($pontosFinalizados[$i]['id']);
                    $ponto->setStartedAt($pontosFinalizados[$i]['started_at']);
                    $ponto->setFinishedAt($pontosFinalizados[$i]['finished_at']);
                    $ponto->setTotalHoras(); ?>     
            <tr>
                <td class="text-center"> <?=$ponto->getId();?> </th>
                <td class="text-center"> <?=$ponto->getStartedAt()?> </td>
                <td class="text-center"> <?=$ponto->getFinishedAt()?> </td>
                <td class="text-center"> <?=$ponto->getTotalHoras();?> </td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>


    <script src="<?=$base;?>/../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/colaboradoresHome.js"></script>
</body>
</html>