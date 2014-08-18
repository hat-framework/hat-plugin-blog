<?php 
class blog_categoriaData extends \classes\Model\CatDataModel{
    public $dados             = array(
        '__artigos' => array(
            'name'      => 'Artigos',
            'private'   => true,
            'fkey'      => array(
                'model' 	=> 'blog/artigo',
                'keys'          => array('cod_artigo', 'titulo', 'resumo'),
                'cardinalidade' => 'n1'//nn 1n 11
            )
         )
    );
}
