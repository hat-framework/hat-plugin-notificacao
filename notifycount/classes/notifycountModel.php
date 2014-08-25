<?php

class notificacao_notifycountModel extends \classes\Model\Model {

    public $tabela = "notificacao_notifycount";
    public $pkey   = 'codusuario';

    public function subNotify($codUsuario, $notify_name){
        $array               = $this->getArray($codUsuario);
        $method              = empty($array)?'insert':'editar';
        $array[$notify_name] = (isset($array[$notify_name]))?$array[$notify_name]-1:0;;
        $bool = $this->save($codUsuario, $array, $method);
        return $bool;
    }
    
    public function addNotify($codUsuario, $notify_name, $count = "") {
        $array               = $this->getArray($codUsuario);
        $method              = empty($array)?'insert':'editar';
        if($count === ""){
            $count = (isset($array[$notify_name]))?$array[$notify_name]+1:1;
        }
        $array[$notify_name] = $count;
        $bool = $this->save($codUsuario, $array, $method);
        return $bool;
    }
    
    public function dropNotify($codUsuario, $notify_name) {
        $array = $this->getArray($codUsuario);
        if(isset($array[$notify_name])){unset($array[$notify_name]);}
        return $this->save($codUsuario, $array);
    }
    
    public function getAll($codUsuario) {
        return $this->getArray($codUsuario);
    }
    
    public function getNotify($codUsuario, $notify_name) {
        $array = $this->getArray($codUsuario);
        return (isset($array[$notify_name]))?$array[$notify_name]:'';
    }
    
    private function save($cod_usuario, $array, $method = 'editar'){
        if($method === "editar"){
            return $this->editar($cod_usuario, array(
                'notifys'     => json_encode($array, JSON_NUMERIC_CHECK)
            ));
        }
        
        return $this->inserir(array(
            'codusuario' => $cod_usuario,
            'notifys'    => json_encode($array, JSON_NUMERIC_CHECK)
        ));
    }
   
    private function getArray($codUsuario){
        $item  = $this->getSimpleItem($codUsuario);
        $array = (!empty($item))?json_decode($item['notifys'], true): array();
        return $array;
    }
    
}
