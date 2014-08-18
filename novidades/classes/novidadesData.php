<?php 
class blog_novidadesData extends \classes\Model\DataModel{
    protected $dados = array(
        
        'cod_novidade' => array(
            'name'    => "Artigo",
            'pkey'    => true,
            'ai'      => true,
            'type'    => 'int',
            'grid'    => true,
            'display' => true,
            'notnull' => true
         ),
        
        'titulo' => array(
            'name'    => 'Titulo',
            'type'    => 'varchar',
            'size'    => '50',
            'unique'  => array('model' => 'blog/artigo'),
            'grid'    => true,
            'display' => true,
            'notnull' => true
        ),

        'conteudo' => array(
            'name'    => 'Conteúdo',
            'type'    => 'text',
            //'search'  => true,
            'especial'=> 'editor',
            'notnull' => true
        ),

        'resumo' => array(
            'name'    => 'Resumo',
            'type'    => 'varchar',
            'size'    => '255',
            'especial'=> 'resumeof',
            'resumeof'=> 'conteudo',
            'display' => true,
            'notnull' => true
        ),
        
        'exibir' => array(
            'name'      => 'Exibir/Esconder',
            'type'      => 'enum',
            'default'   => 'exibir',
            'options'   => array(
                'exibir'   => 'Exibir',
                'esconder' => 'Esconder'
            ),
            'grid'    => true,
            'notnull'   => true
       	 ),
        
        'album' => array(
            'name'      => 'Fotos',
            'type' 	=> 'int',
            'notnull'   => true, 
            'fkey'      => array(
                'model' 	=> 'galeria/album', 
                'cardinalidade' => '11',//nn 1n 11
                'keys'          => array('cod_album', 'cod_album')
            )
         )
    );
}
