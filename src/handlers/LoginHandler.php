<?php
namespace src\handlers;

use \src\models\User;
use \src\models\Colaborador;

class LoginHandler {
    
    public static function checkLogin(){
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $data = Colaborador::select()->where('token', $token)->one();
            if(count($data) > 0){
                $loggedUser = new Colaborador();
                $loggedUser->setId($data['id']);
                $loggedUser->setEmail($data['email']);
                $loggedUser->setNome($data['nome']);
                $loggedUser->setAniversario($data['aniversario']);

                return $loggedUser;
                
            }
        }
            
        return false;
    }


    public static function verifyLogin($email, $password){
        $usuario = Colaborador::select()->where('email', $email)->one();

        if($usuario){
            if(password_verify($password, $usuario['senha'])){
                $token = md5(time().rand(0,9999).time());
                Colaborador::update()
                    ->set('token', $token)
                    ->where('email', $email)
                ->execute();
                return $token;
            }
        }   
    
        return false;
    }



    public static function emailExists($email){
        $user = Colaborador::select()->where('email', $email)->one();
        return $user ? true : false ;
    }

    public static function addColaborador($nome, $email, $senha, $aniversario){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());

        Colaborador::insert([
            'nome' => $nome,
            'email' => $email,
            'senha' => $hash,
            'aniversario' => $aniversario,
            'token' => $token
        ])->execute();
    }




}