<?php

class plugins_blog_Config_blogtenapConfig extends \classes\Model\configModel {
    
    public $name = "Definições Gerais";
    public function  __construct() {
        $this->setFilename(__FILE__, __CLASS__);
    }

}

?>