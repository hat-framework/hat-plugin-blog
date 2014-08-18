<?php

class blog_imagemModel extends \classes\Model\Model{
    protected $tabela = "blog_imagem";
    protected $pkey   = "cod_bimagem";
    protected $model_label       = "Imagem";
    protected $model_description = "";
    
    public function getFotos($cod, $campo = 'titulo'){
        $item = $this->getItem($cod, $campo);
        if(empty ($item)) return array();
        $this->LoadModel("galeria/album", 'galbum');
        $album = $item['album'];
        return $this->galbum->getFotos($album['cod_album']);
    }
   
    public function getDestaques($qtd = 3){
        //2 = número de albuns a serem excluídos da listagem, 3 é o número de albuns a ser exibido
        $max = $this->getCount() - 2 - $qtd;
        $offset = rand(0, $max);
        if($offset < 0) $offset = 0;
        return $this->selecionar(array(), "titulo != 'Tenap' AND titulo != 'Inexperientes'", $qtd, $offset);
    }
    
}