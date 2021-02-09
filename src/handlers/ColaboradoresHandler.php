<?php
namespace src\handlers;

use src\models\Ponto;

class ColaboradoresHandler {

    /**
     * Começou e não finalizou cronometro
     */
    public static function getPontoAberto($loggedUserId){
        $data = Ponto::select()
            ->where('id_colaborador', $loggedUserId)
            ->whereNotNull('started_at')
            ->whereNull('finished_at')    
        ->one();

        if($data){
            return $data;
        } else {
            return false;
        }
    }



    public static function getFinalizados($loggedUserId){
        $finalizados =  Ponto::select()
                        ->where('id_colaborador', $loggedUserId)
                        ->whereNotNull('started_at')
                        ->whereNotNull('finished_at')
                    ->execute();
        
        return $finalizados;
    }

}