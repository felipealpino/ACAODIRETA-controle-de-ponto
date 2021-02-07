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
    }

    public function index() {
        $this->loggedUser->name;
        $this->render('home', ['nome' => 'Felipe']);
    }

    public function sobre() {
        $this->render('sobre');
    }

    public function sobreP($args) {
        print_r($args);
    }

}