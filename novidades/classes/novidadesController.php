<?php

class novidadesController extends \classes\Controller\Controller{
    
    public function __construct($vars) {
        parent::__construct($vars);
        $this->LoadModel("blog/novidades", "model");
    }
    
    public function index(){
        $page = array_shift($this->vars);
        $this->registerVar("item", $this->model->paginate($page));
        $this->display("blog/novidades/index");
    }
    
    public function show(){
        $cod  = array_shift($this->vars);
        $nome = array_shift($this->vars);
        if($cod == "") Redirect(CURRENT_MODULE);
        
        $item      = $this->model->getItem($cod);
        $conf_nome = GetPlainName($item['titulo']);
        if($conf_nome != $nome) Redirect(CURRENT_PAGE . "$cod/$conf_nome");
        
        $this->genTags($item['titulo'] , $item['resumo'], str_replace(" ", " ,", $item['titulo']));
        //$this->registerVar("links"     , $this->model->getHierarqName($cod_cat));

        $this->registerVar("item"   , $item);
    	$this->display("blog/novidades/show");
    }
    
}