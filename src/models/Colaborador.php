<?php
namespace src\models;
use \core\Model;

class Colaborador extends Model {
    
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $aniversario;
    private $token;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }


   
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }



    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }



    public function getAniversario(){
        return $this->aniversario;
    }
    public function setAniversario($dataAniversario){
        $this->aniversario = $dataAniversario;
    }



    public function getToken(){
        return $this->token;
    }


   
    
}