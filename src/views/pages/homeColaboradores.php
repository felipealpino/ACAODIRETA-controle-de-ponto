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

<a href="<?=$base;?>/sair">Sair</a> <br>
Usuário logado: <?=$loggedUser->getEmail();?> <br>
Seja bem-vindo, <?=$loggedUser->getNome();?> <br><br>

<?php
use src\models\Ponto;
$horas = 0;
$minutos = 0;
$segundos = 0;

/**
 * Começou e não finalizou cronometro
 */
$data = Ponto::select()
            ->where('id_colaborador', $loggedUser->getId())
            ->whereNotNull('started_at')
            ->whereNull('finished_at')    
        ->one();

if($data){
    echo "Existe um ponto em aberto: "."<br>";
    print_r($data);

    $tempoAtual = new DateTime();
    $tempoInicial = new DateTime($data['started_at']);
    $intervalo = $tempoAtual->diff($tempoInicial);
    $horas = $intervalo->h;
    $minutos = $intervalo->i;
    $segundos = $intervalo->s;

} else {
    echo "Não existe nenhum ponto em aberto";
}
   
$finalizados =  Ponto::select()
                    ->where('id_colaborador', $loggedUser->getId())
                    ->whereNotNull('started_at')
                    ->whereNotNull('finished_at')
                ->execute();

?>



<body>
    

    <div class="content-cronometro">
        <div class="cronometro-count-numbers">
            <h1 class="time"><?php echo $horas.":".$minutos.":".$segundos?></h1>
        </div>

        <div class="cronometro-buttons">
            <button type="button" class="btn btn-success btn-play">Play</button>
            <button type="button" class="btn btn-warning btn-end" onclick="return confirm('Tem certeza que deseja finalizar?')">End</button>
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
        for($i=0; $i<count($finalizados); $i++):
            $ponto = new Ponto();
                $ponto->setId($finalizados[$i]['id']);
                $ponto->setStartedAt($finalizados[$i]['started_at']);
                $ponto->setFinishedAt($finalizados[$i]['finished_at']);
                $ponto->setTotalHoras();
    ?>     
        <tr>
        <td class="text-center"> <?=$ponto->getId();?> </th>
        <td class="text-center"> <?=$ponto->getStartedAt()?> </td>
        <td class="text-center"> <?=$ponto->getFinishedAt()?> </td>
        <td class="text-center"> <?=$ponto->getTotalHoras();?> </td>
        </tr>
    <?php endfor; ?>
  </tbody>
</table>


    
<script src="assets/js/colaboradoresHome.js"></script>
</body>
</html>