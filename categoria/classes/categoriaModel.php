<?php

class blog_categoriaModel extends \classes\Model\CatModel{
    
    protected $tabela            = "blog_categoria";
    protected $pkey              = "cod_categoria";
    protected $categorized_model = "blog/artigo";
    protected $model_label       = "Categoria";
    protected $model_description = "";

    private function gerar($menu, &$out, $cod_cat){

        if(!array_key_exists($cod_cat, $menu)){
            return;
        }

        $nome    = $menu[$cod_cat]['catnome'];
        $link = "$this->model_name/show/$cod_cat/".  GetPlainName($nome);
        $cod_pai = $menu[$cod_cat]['cod_pai'];
        $this->gerar($menu, $out, $cod_pai);
        $out[$cod_cat] = array('catnome' => $nome, 'link' => $link);

    }

    private function getChildrens($cod_cat){
        $menu = $this->genLista();
        if(!array_key_exists($cod_cat, $menu)){
            $item = $this->getItem($cod_cat);
            if(empty ($item)) return array();
            else return array($cod_cat => $cod_cat);
        }
        $menu           = array_keys($menu[$cod_cat]);
        $menu[$cod_cat] = $cod_cat;
        $out  = $menu;
        foreach($menu as $m){
            if($m != $cod_cat && !in_array($cod_cat, $out))
                $out = array_merge_recursive($this->getChildrens($m), $out);
        }
        return $out;
    }

    public function getArtigos($cod_cat, $link, $page){
        $this->LoadModel($this->categorized_model, 'art');
        return $this->art->paginate($page, $link, "", "cod_categoria", 20);
    }

}
