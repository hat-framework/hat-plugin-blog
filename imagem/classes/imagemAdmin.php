<?php

class imagemAdmin extends \classes\Controller\Admin{
    
    public $model_name = "blog/imagem";
    public function __construct($vars) {
        parent::__construct($vars);
    }
    
    public function index(){
        $this->display("blog/imagem/ashow");
    }
    
    public function show(){        
        $album = array_shift($this->vars);
        $item = $this->model->getItem($album, "titulo");
        if(empty ($item)){$this->index();}
        $this->registerVar("formulario", $item);
        
        $this->vars[] = $item['cod_bimagem'];
        if(!empty ($_POST)) {
            unset($_POST['titulo']);
            parent::inserir();
        }
        
        $this->display("admin/auto/inserir");
    }
    
}