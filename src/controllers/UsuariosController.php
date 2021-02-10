<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UsuariosHandler;
use \src\controllers\HomeController;


class UsuariosController extends Controller {

    public function gerarRelatorio(){
        $dataAtual = filter_input(INPUT_POST, 'data_atual');
        $dataInicial = filter_input(INPUT_POST, 'data_inicial');
        $dataFinal = filter_input(INPUT_POST, 'data_final');
        $ordenacao = filter_input(INPUT_POST, 'ordenacao');

        if($dataInicial == ''){
            $dataInicial = '1970-01-01 00:00:00';
        }
        if($dataFinal == ''){
            $dataFinal = $dataAtual;
        }

        $dados = UsuariosHandler::obterRelatorio($dataAtual, $dataInicial, $dataFinal, $ordenacao);
        
        $hc = new HomeController();
            $hc->indexUsuarios($dados);
    }

}