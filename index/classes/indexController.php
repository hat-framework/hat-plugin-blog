<?php

class indexController extends classes\Controller\CController{
    
    public $model_name = "blog/artigo";    
    public function index(){
        //Redirect('blog/categoria/');
        $this->index2();
    }

    public function index2(){
        $this->setPage();
        $this->genTags(BLOG_NAME ." ", BLOG_NAME);
        $this->registerVar("item"        , $this->model->paginate($this->page, "blog/index/index"));
        $this->registerVar("comp_action" , 'listar');
        $this->registerVar("show_links"  , '');
        $this->registerVar('component', $this->model_name);
    	$this->display("admin/auto/areacliente/page");
    }
    
}
