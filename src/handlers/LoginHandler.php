<?php
namespace src\handlers;

use \src\models\User;
use \src\models\Colaborador;

class LoginHandler {

    /**
     * A função veficica se existe algum usuario (usuario ou colaborador) já logado utilizando o token salvo no banco
     * primeiro ela verifica se o existe o token na table colaboradors 
     * se sim, é instanciado um new Colaborador e retorna o objeto
     * 
     * Caso não exista, ela verifica se há algum usuario na tabela users
     * se sim, instancia um new User e retorna o objeto
     * 
     * Caso nao encontre nada, retorna false e o é redirecionado pra /signin no __construct 
     */
    public static function checkLogin(){
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $data = Colaborador::select()->where('token', $token)->one();
            if($data){
                $loggedUser = new Colaborador();
                $loggedUser->setId($data['id']);
                $loggedUser->setEmail($data['email']);
                $loggedUser->setNome($data['nome']);
                $loggedUser->setAniversario($data['aniversario']);

                return $loggedUser;
            } 

            $data = User::select()->where('token', $token)->one();
            if($data){
                $loggedUser = new User();
                $loggedUser->setId($data['id']);
                $loggedUser->setEmail($data['email']);

                return $loggedUser;
            }

        }
        return false;
    }




    /**
     * Verificando login é valido (de acordo com a opção escolhida) 
     * Essa função verifica o option escolhido 'usuario' ou 'colaborador'
     * Verifica se o email e senha existem no banco de dados especifico
     * 
     */
    public static function verifyLogin($email, $password, $tipo_login){
        if($tipo_login === 'colaborador'){
            $colaborador = Colaborador::select()->where('email', $email)->one();
            if($colaborador){
                if(password_verify($password, $colaborador['senha'])){
                    $token = md5(time().rand(0,9999).time());
                    Colaborador::update()
                        ->set('token', $token)
                        ->where('email', $email)
                    ->execute();
                    return $token;
                }
            } 
        } elseif ($tipo_login === 'usuario'){
            $usuario = User::select()->where('email', $email)->one();
            if($usuario){
                if(password_verify($password, $usuario['senha'])){
                    $token = md5(time().rand(0,9999).time());
                    User::update()
                        ->set('token', $token)
                        ->where('email', $email)
                    ->execute();
                    return $token;    
                }   
            }
        }
    
        return false;
    }





    /**
     * funções estaticas que: 
     * 1) emailUsserExists - verifica se o email ja existe no banco de dados users
     * 2) addUser - adiciona um novo usuario caso emailUserExists retorne false 
     */
    public static function emailUserExists($email){
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false ;
    }

    public static function addUser($email, $senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());
        User::insert([
            'email' => $email,
            'senha' => $hash,
            'token' => $token
        ])->execute();
    }






    /**
     * funções estaticas que 
     * 1) emailColaboradorExists - verifica se o email ja existe no banco de dados colaboradors
     * 2) addColaborador - adiciona um novo colaborador caso emailColaboradorExists retorne false 
     */
    public static function emailColaboradorExists($email){
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