<?php 
class blog_imagemData extends \classes\Model\DataModel{
    public $dados = array(
        
        'cod_bimagem' => array(
            'name'    => "Imagem",
            'pkey'    => true,
            'type'    => 'int',
            'ai'      => true,
            'grid'    => true,
            'display' => true,
            'notnull' => true
         ),
        
        'titulo' => array(
            'name'    => 'Nome do Album',
            'type'    => 'varchar',
            'size'    => '50',
            'unique'  => array('model' => 'blog/artigo'),
            'grid'    => true,
            'display' => true,
            'notnull' => true
        ),
        
        'album' => array(
            'name'      => 'Fotos',
            'type' 	=> 'int',
            'notnull'   => true,
            'display' => true,
            'fkey'      => array(
                'model' 	=> 'galeria/album', 
                'cardinalidade' => '11',//nn 1n 11
                'dados'         => array('cod_album','cod_album'),
                'keys'          => array('cod_album', 'cod_album')
            )
         )
    );
}
