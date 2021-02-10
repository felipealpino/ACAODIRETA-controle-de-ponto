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
<span>Id Usuário:</span> <?=$loggedUser->getId();?> <br>
<span>E-mail Usuário :</span> <?=$loggedUser->getEmail();?> <br>
<span>Seja bem-vindo,</span> <?=$loggedUser->getNome();?> <br><br>






<?php
$horas = '00';
$minutos = '00';
$segundos = '00';

$tempoAtual = new DateTime();
$id_colaborador = '';
$started_at = ''; 
$finished_at = '';


//Se data retornar o objeto, significa que temos um ponto em aberto
$data = ColaboradoresHandler::getPontoAberto($loggedUser->getId());


/**
 * Verificando quanto tempo temos de ponto em aberto
 * escrevendo mensagens na tela e caputrando preenchendo variaveis úteis
 */
if($data){
    $tempoInicial = new DateTime($data['started_at']);
    $intervalo = $tempoAtual->diff($tempoInicial);
    $tempoAtual = date_format($tempoAtual, 'Y-m-d H:i:s');
    
    $horas = ($intervalo->h);
    $minutos = $intervalo->i;
    $segundos = $intervalo->s;

    $id_colaborador = $data['id_colaborador'];
    $started_at = $data['started_at'];

    echo '<span class="info"> Existe um ponto em aberto: </span>'.'<br>';
    $p = new Ponto();
        $p->setIdColaborador($data['id_colaborador']);
        $p->setStartedAt($data['started_at']);
        $p->setId($data['id']);
        
    echo "Id ponto: ".$p->getId()."<br>";
    echo "Id colaborador: ".$p->getIdColaborador()."<br>";
    echo "Inicio ponto: ".$p->getStartedAt()."<br>";
} else {
    echo '<span class="info"> Não existe nenhum ponto em aberto </span>';
}   

//Capturando todos os Pontos que ja foram finalizados para colocar na table
$pontosFinalizados = ColaboradoresHandler::getFinalizados($loggedUser->getId());

?>



<body>

    <div class="content-cronometro">
        <div class="cronometro-count-numbers">
            <h1 class="time"><?php echo $horas.":".$minutos.":".$segundos?></h1>
        </div>

        <div class="cronometro-buttons">
            <!-- BOTAO PLAY -->
            <?php if(!$data) : ?>
                <form action="<?=$base;?>/colaboradores/start" method="post">
                    <input type="hidden" name="id_colaborador" value="<?php echo $loggedUser->getId(); ?>" >
                    <input type="hidden" name="tempoAtual" value="<?php echo date_format($tempoAtual, 'Y-m-d H:i:s'); ?>" >
                    <input type="submit" class="btn btn-success btn-play" value="Play">
                    <!-- <button type="button" class="btn btn-success btn-play"> Play </button> -->
                </form>
            <?php endif ?>

            <!-- BOTAO END -->
            <?php if($id_colaborador != ''): ?>
                <form action="<?=$base;?>/colaboradores/end" method="post">
                    <input type="hidden" name="id_colaborador" value="<?php echo $id_colaborador;?> ">
                    <input type="hidden" name="tempoAtual" value="<?php echo $tempoAtual;?> ">
                    <input type="submit" class="btn btn-danger btn-end" value="End" >
                    <!-- <button type="button" class="btn btn-success btn-play"> Play </button> -->
                </form>
            <?php endif ?>
            
        </div>
    </div> <br><br> 

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
                <td class="text-center"> <?=number_format($ponto->getTotalHoras(),2,',','.');?> </td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    <script src="assets/js/colaboradoresHome.js"></script>
    <script src="<?=$base;?>/../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>