<?php 
use classes\Classes\Actions;   
class notificacaoActions extends Actions{
    protected $permissions = array(
        "notify_user" => array(
            "nome"      => "notify_user",
            "label"     => "Notifica��o para usu�rios",
            "descricao" => "Permite enviar notifica��es em tempo real para os usu�rios.",
            'default'   => 's',
        ),
    );
    protected $actions = array(
        'notificacao/notifycount/load' => array(
            'label' => 'Quantidade de Notifica��es', 'publico' => 's', "default_yes" => "s","default_no" => "n",
            "permission" => "notify_user", 'needcod' => false,
        ),
    );
}
