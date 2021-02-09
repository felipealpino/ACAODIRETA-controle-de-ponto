<?php
namespace src\models;
use \core\Model;

class Ponto extends Model {

    private $id;
    private $id_colaborador;
    private $started_at;
    private $finished_at;



    public function __construct(){
    
    }


    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }



    public function getIdColaborador(){
        return $this->id_colaborador;
    }
    public function setIdColaborador($idColaborador){
        $this->id_colaborador = $idColaborador;
    }



    public function getStartedAt(){
        return $this->started_at;
    }
    public function setStartedAt($startedTime){
        $this->started_at = $startedTime;
    }



    public function getFinishedAt(){
        return $this->finished_at;
    }
    public function setFinishedAt($finishedTime){
        $this->finished_at = $finishedTime;
    }





}