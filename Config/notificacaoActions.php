<?php 
use classes\Classes\Actions;   
class notificacaoActions extends Actions{
    protected $permissions = array(
        "notify_user" => array(
            "nome"      => "notify_user",
            "label"     => "Notificação para usuários",
            "descricao" => "Permite enviar notificações em tempo real para os usuários.",
            'default'   => 's',
        ),
    );
    protected $actions = array(
        'notificacao/notifycount/load' => array(
            'label' => 'Quantidade de Notificações', 'publico' => 's', "default_yes" => "s","default_no" => "n",
            "permission" => "notify_user", 'needcod' => false,
        ),
    );
}
