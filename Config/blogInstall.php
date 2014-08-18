<?php

class blogInstall extends classes\Classes\InstallPlugin{
    
    protected $dados = array(
        'pluglabel' => 'Blog',
        'isdefault' => 'n',
        'system'    => 'n',
    );
    
    public function install(){
        return true;
    }
    
    public function unstall(){
        return true;
    }
}
