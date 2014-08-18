<?php

class categoriaController extends \classes\Controller\CatController{
    public $model_name = LINK;
    public function show($display = true, $link = "") {
        parent::show($display, LINK . "/show");
    }
    
    protected $sublistview = "blog/categoria/show";
    public function sublist() {
        parent::sublist();
    }
}