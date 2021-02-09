<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {


    public function signin(){
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        } else {
            $flash = '' ;
        }
        $this->render('/signin', [
            'flash' => $flash
        ]);
    }


    public function signup_user(){
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        } else {
            $flash = '' ;
        }
        $this->render('/signup_user', [
            'flash' => $flash
        ]);
    }

    public function signup_colaborador(){
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        } else {
            $flash = '' ;
        }
        $this->render('/signup_colaborador', [
            'flash' => $flash
        ]);
    }




    public function signinAction(){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password){
            $token = LoginHandler::verifyLogin($email, $password);
            if($token){
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = "Email e/ou senha não conferem";
                $this->redirect('/signin');
            }

        } else {
            $_SESSION['flash'] = "Digite os campos de email e/ou senha";
            $this->redirect('/');
        }
    }



    public function signup_colaborador_action(){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $nome = filter_input(INPUT_POST, 'nome');
        $aniversario = filter_input(INPUT_POST, 'aniversario');


        if($nome && $email && $senha && $aniversario){
            if(LoginHandler::emailExists($email) === false){
                $token = LoginHandler::addColaborador($nome, $email, $senha, $aniversario);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = "E-mail já cadastrado!";
            } 

        } else {
            $this->redirect('/cadastro_colaborador');
        }


    }

}