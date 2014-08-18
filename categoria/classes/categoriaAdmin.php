<?php

class categoriaAdmin extends \classes\Controller\Admin{
    
    public $model_name = "blog/categoria";
    public function __construct($vars) {
        $this->LoadModel($this->model_name, "model");
        parent::__construct($vars);
    }
    
}