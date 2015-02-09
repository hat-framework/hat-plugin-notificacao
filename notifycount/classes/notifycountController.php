<?php 

class notifycountController extends \classes\Controller\Controller{
    public $model_name = "notificacao/notifycount";
    
    public function index(){
        $codUsuario = usuario_loginModel::CodUsuario();
        $this->LoadModel($this->model_name, 'nc')->addNotify($codUsuario, 'messages_2', 'attention');
        $this->nc->addNotify($codUsuario, 'messages_3', 'important');
        $this->nc->addNotify($codUsuario, 'messages_3');
    }
    
    public function load(){
        $filter = isset($this->vars[0])?$this->vars[0]:'';
        $cod_usuario = usuario_loginModel::CodUsuario();
        $this->LoadModel($this->model_name, 'nc');
        $data = ($filter === "")?$this->nc->getAll($cod_usuario):$this->nc->getGroup($cod_usuario, $filter);
        die(json_encode($data, JSON_NUMERIC_CHECK));
    }
    
    
}