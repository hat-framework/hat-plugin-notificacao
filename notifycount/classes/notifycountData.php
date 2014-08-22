<?php

class notificacao_notifycountData extends \classes\Model\DataModel{
    
    protected $dados  = array(
        
        'codusuario' => array(
	    'name'     => 'Codigo de usuário',
	    'type'     => 'int',
	    'size'     => '11',
	    'notnull' => true,
	    'grid'    => true,
	    'display' => true,
	    'especial' => 'session',
	    'session'  => 'usuario/login',
	    'pkey'    => true,
	    'fkey' => array(
	        'model' => 'usuario/login',
	        'cardinalidade' => '1n',
	        'keys' => array('cod_usuario', 'user_name'),
	    ),
        ),
        
        'notifys' => array(
	    'name'     => 'Notificações',
	    'type'     => 'text',
	    'grid'    => true,
	    'display' => true,
        ),
        
        'button' => array(
            'button' => "Salvar Notificação",
        )
    );
    
}