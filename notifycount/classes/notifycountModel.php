<?php

class notificacao_notifycountModel extends \classes\Model\Model {

    public $tabela = "notificacao_notifycount";
    public $pkey   = array('codusuario','name');

    public function subNotify($codUsuario, $notify_name, $camp = 'common'){
        $sql = "UPDATE $this->tabela SET $camp = $camp - 1 WHERE codusuario='$codUsuario' AND name='$notify_name'";
        if(true === $this->db->executeQuery($sql)){return true;}
        $group = explode("_", $notify_name);
        if(!isset($group[0])){$group[0] = $notify_name;}
        return $this->inserir(array($camp => 0, 'codusuario' => $codUsuario, 'name'=>$notify_name, 'grupo'=>$group[0]));
    }
    
    public function addNotify($codUsuario, $notify_name, $camp = 'common') {
        $sql = "UPDATE $this->tabela SET $camp = $camp + 1 WHERE codusuario='$codUsuario' AND name='$notify_name'";
        if(true === $this->db->executeQuery($sql)){return true;}
        $group = explode("_", $notify_name);
        if(!isset($group[0])){$group[0] = $notify_name;}
        return $this->inserir(array($camp => 1, 'codusuario' => $codUsuario, 'name'=>$notify_name, 'grupo'=>$group[0]));
    }
    
    public function dropNotify($codUsuario, $notify_name) {
        return $this->apagar(array($codUsuario, $notify_name));
    }
    
    public function getAll($codUsuario) {
        $data = $this->selecionar(array(
            "SUM(common) as common", 
            "SUM(attention) as attention",
            "SUM(important) as important",
            'grupo'
        ), "codusuario='$codUsuario' GROUP BY grupo");
        $out = array();
        foreach($data as $dt){
            if($dt['common']    != "") {$out[$dt['grupo']]['c'] = ($dt['common']    < 0)?0:$dt['common'];}
            if($dt['attention'] != "") {$out[$dt['grupo']]['a'] = ($dt['attention'] < 0)?0:$dt['attention'];}
            if($dt['important'] != "") {$out[$dt['grupo']]['i'] = ($dt['important'] < 0)?0:$dt['important'];}
        }
        return $out;
    }
    
    public function getGroup($codUsuario, $group) {
        $data = $this->selecionar(array("common", "attention","important",'name'), "codusuario='$codUsuario' AND grupo='$group'");
        $out = array();
        foreach($data as $dt){
            if($dt['common']    != 0) {$out[$dt['name']]['c'] = ($dt['common']    < 0)?0:$dt['common'];}
            if($dt['attention'] != 0) {$out[$dt['name']]['a'] = ($dt['attention'] < 0)?0:$dt['attention'];}
            if($dt['important'] != 0) {$out[$dt['name']]['i'] = ($dt['important'] < 0)?0:$dt['important'];}
        }
        return $out;
    }
    
    public function getNotify($codUsuario, $notify_name) {
        return $this->selecionar(array('common','attention','important'), "codusuario='$codUsuario' AND name='$notify_name'");
    }
    
}
