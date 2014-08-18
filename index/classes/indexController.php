<?php

class indexController extends classes\Controller\CController{
    
    public $model_name = "blog/artigo";    
    public function index(){
        if($_SERVER['HTTP_HOST'] == 'www.tenap.com.br')$this->indextenap();
        Redirect('blog/categoria/');
        //$this->index2();
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

    public function indextenap(){
        $this->LoadModel("blog/imagem", 'img');
        $tenap = $this->img->getItem("tenap", "titulo");
        $inexp = $this->img->getItem("inexperientes", "titulo");
                
        $tenap = (empty ($tenap))?array():$tenap['album'];
        $inexp = (empty ($inexp))?array():$inexp['album'];
        $this->registerVar('tenap', $tenap);
        $this->registerVar('inexp', $inexp);
        $this->display("blog/index/indextenap");
    }
    
    public function inicial() {
         Redirect('empresa/index/index');
    }
    
}

?>
