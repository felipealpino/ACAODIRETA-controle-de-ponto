<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\ColaboradoresHandler;


class ColaboradoresController extends Controller {

    public function finishPonto(){
        $id_colaborador = filter_input(INPUT_POST, 'id_colaborador');
        $tempoAtual = filter_input(INPUT_POST, 'tempoAtual');

        $result = ColaboradoresHandler::finalizarPonto($id_colaborador, $tempoAtual);
        $this->redirect('/colaboradores');
        // header("Refresh: 0");
    }

    public function startPonto(){
        $id_colaborador = filter_input(INPUT_POST, 'id_colaborador');
        $tempoAtual = filter_input(INPUT_POST, 'tempoAtual');
        $result = ColaboradoresHandler::iniciarPonto($id_colaborador, $tempoAtual);
        $this->redirect('/colaboradores');
        // header("Refresh: 0");
    }


}