<?php
namespace src\models;
use \core\Model;

class User extends Model {
    
    private $id;
    private $email;
    private $senha;
    private $token;


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }


   
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }


    
}