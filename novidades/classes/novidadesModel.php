<?php

class blog_novidadesModel extends \classes\Model\Model{
    protected $tabela            = "blog_novidades";
    protected $pkey              = "cod_novidade";
    protected $model_label       = "Novidades";
    protected $model_description = "";
    
    
    public function inserir($post){
        $post['resumo'] = Resume($post['conteudo'], 255);
        return parent::inserir($post);
    }
    
    public function editar($id, $post, $camp = "") {
        $post['resumo'] = Resume($post['conteudo'], 255);
        return parent::editar($id, $post, $camp);
    }
    
    public function getDestaques($qtd = 3){
        return $this->selecionar(array('cod_novidade', 'titulo', 'album'), "", $qtd, 0);
    }
    
}

?>