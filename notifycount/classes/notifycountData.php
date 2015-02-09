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
        
        'name' => array(
	    'name'     => 'Título',
	    'type'     => 'varchar',
            'size'     => 32,
	    'grid'    => true,
	    'display' => true,
	    'pkey'    => true,
        ),
        
        'common' => array(
	    'name'     => 'Comum',
	    'type'     => 'int',
            'size'     => 5,
            'default'  => 0,
            'notnull'  => true,
	    'grid'    => true,
	    'display' => true,
        ),
        'attention' => array(
	    'name'     => 'Atenção',
	    'type'     => 'int',
            'size'     => 5,
            'default'  => 0,
            'notnull'  => true,
	    'grid'    => true,
	    'display' => true,
        ),
        'important' => array(
	    'name'     => 'Importante',
	    'type'     => 'int',
            'size'     => 5,
            'default'  => 0,
            'notnull'  => true,
	    'grid'    => true,
	    'display' => true,
        ),
        
        'grupo' => array(
	    'name'     => 'Grupo',
	    'type'     => 'varchar',
            'size'     => 32,
	    'grid'    => true,
	    'display' => true,
        ),
        
        'button' => array(
            'button' => "Salvar Notificação",
        )
    );
    
}