<?php

class artigoAdmin extends \classes\Controller\Admin{
    
    public $model_name = "blog/artigo";
    public function __construct($vars) {
        parent::__construct($vars);
    }
    
}