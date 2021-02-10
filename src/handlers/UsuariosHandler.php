<?php
namespace src\handlers;

use src\models\Ponto;

class UsuariosHandler {

    public static function obterRelatorio($dataAtual, $dataInicial, $dataFinal, $ordenacao){
        $dados = Ponto::select()
            ->where('started_at','>', $dataInicial)   
            ->where('finished_at', '<', $dataFinal) 
        ->execute();

        return $dados;
    }


}