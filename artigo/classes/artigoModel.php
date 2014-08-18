<?php

class blog_artigoModel extends \classes\Model\Model{
    protected $model_label       = "Artigo";
    protected $model_description = "";
    protected $tabela = "blog_artigo";
    protected $pkey   = "cod_artigo";
    
    public function __construct() {
        if(RESUMO_EDITAVEL){
            unset($this->dados['resumo']['especial']);
            unset($this->dados['resumo']['resumeof']);
        }
        parent::__construct();
    }
    
    public function getDestaques($qtd = 12){
        $where = "`destaque` = 's'";
        $var = $this->selecionar(array('cod_artigo', 'titulo'), $where, $qtd, 0);
        $num = count($var);
        if($num < $qtd){
            $where = "`destaque` = 'n'";
            $arr = $this->selecionar(array('cod_artigo', 'titulo'), $where, $qtd-$num, 0);
            $var = array_merge($var, $arr);
        }
        return $var;
    }
    
    public function inserir($post){
        if(!RESUMO_EDITAVEL){$post['resumo'] = Resume($post['conteudo'], 255);}
        return parent::inserir($post);
    }
    
    public function editar($id, $post, $camp = "") {
        if(!RESUMO_EDITAVEL){$post['resumo'] = Resume($post['conteudo'], 255);}
        return parent::editar($id, $post, $camp);
    }

}