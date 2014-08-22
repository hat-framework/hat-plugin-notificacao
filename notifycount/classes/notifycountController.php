<?php 

class notifycountController extends \classes\Controller\Controller{
    public $model_name = "notificacao/notifycount";
    
    public function index(){
        
    }
    
    public function load(){
        $cod_usuario = usuario_loginModel::CodUsuario();
        $this->LoadModel($this->model_name, 'nc');
        //$this->nc->addNotify($cod_usuario, 'messages', 3);
        //$this->nc->addNotify($cod_usuario, 'notify', 5);
        //print_rd($this->nc->getMessages());
        die(json_encode($this->nc->getAll($cod_usuario), JSON_NUMERIC_CHECK));
    }
    
    
}