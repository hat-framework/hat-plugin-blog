<?php

class blogLoader extends classes\Classes\PluginLoader{
        
    public function setCommonVars(){
        $this->LoadModel("blog/categoria", 'cat');
        $menu = $this->cat->geraMenu();
        $this->LoadJsPlugin('menu/multiple', 'menu_sec_obj');
        $this->menu_sec_obj->imprime();
        $this->menu_sec_obj->addTitle(TITULO_DO_MENU_ARTIGO);
        $var = $this->menu_sec_obj->draw($menu);
        \classes\Classes\EventTube::addEvent('menu-lateral', $var);
    }
    
    public function setAdminVars(){

    }
    
}

?>