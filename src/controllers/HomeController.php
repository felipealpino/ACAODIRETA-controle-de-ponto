<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;


class HomeController extends Controller {

    private $loggedUser; 

    public function __construct(){
        $this->loggedUser = LoginHandler::checkLogin();
        if(LoginHandler::checkLogin() === false){
            $this->redirect('/signin');
        }
        
        // if(LoginHandler::emailUserExists($this->loggedUser->getEmail())){
        //     $this->indexUsuarios();
        // } elseif(LoginHandler::emailColaboradorExists($this->loggedUser->getEmail())){
        //     $this->indexColaboradores();
        // }
    }

    public function indexUsuarios($dados = '') {
        if(LoginHandler::emailUserExists($this->loggedUser->getEmail())){
            $this->render('homeUsuarios', [
                'loggedUser' => $this->loggedUser,
                'dadosRelatorio' => $dados    
            ]);
        } else {
            $this->render('403');
        }
    }
    public function indexColaboradores() {
        if(LoginHandler::emailColaboradorExists($this->loggedUser->getEmail())){
            $this->render('homeColaboradores', ['loggedUser' => $this->loggedUser]);
        } else {
            $this->render('403');
        }
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}