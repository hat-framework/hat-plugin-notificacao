<?php
class notificacaoInstall extends classes\Classes\InstallPlugin{
    protected $dados = array(
        "pluglabel" => "Notifica��o",
        "isdefault" => "n",
        "system"    => "n",
        "detalhes"  => "",
    );
    public function install(){return true;}
    public function unstall(){return true;}
}
