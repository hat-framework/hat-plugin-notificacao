<?php
class notificacaoInstall extends classes\Classes\InstallPlugin{
    protected $dados = array(
        "pluglabel" => "Notificação",
        "isdefault" => "n",
        "system"    => "n",
        "detalhes"  => "",
    );
    public function install(){return true;}
    public function unstall(){return true;}
}
