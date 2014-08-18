<?php 
class blog_artigoData extends \classes\Model\DataModel{
    public $dados = array(
        
        'cod_artigo' => array(
            'name'    => "Artigo",
            'pkey'    => true,
            'ai'      => true,
            'type'    => 'int',
            'size'    => '11',
            'grid'    => true,
            'display' => true,
            'private' => true,
            'notnull' => true
         ),
        
        'cod_categoria' => array(
            'name'        => 'Categoria',
            'notnull'     => true,
            'grid'        => true,
            'especial'    => 'session',
            'session'     => 'blog/categoria',
            'fkey'        => array(
                'model'         => 'blog/categoria',
                'cardinalidade' => '1n', //nn 1n 11
                'keys'          => array('cod_categoria', 'catnome')
            )
        ),
        
        'titulo' => array(
            'name'    => 'Titulo',
            'type'    => 'varchar',
            'search'  => true,
            'seo'     => array('titulo' => true),
            'size'    => '128',
            'grid'    => true,
            'display' => true,
            'notnull' => true
        ),
        
        'resumo' => array(
            'name'    => 'Resumo',
            'search'  => true,
            'seo'     => array('resumo' => true),
            'type'    => 'varchar',
            'size'    => '255',
            'especial'=> 'resumeof',
            'resumeof'=> 'conteudo',
            'display' => true,
            'notnull' => true
        ),

        'conteudo' => array(
            'search'  => true,
            'name'    => 'Conteúdo',
            'type'    => 'text',
            'especial'=> 'editor',
            //'editor'   => array('format', 'align', 'list', 'link', 'history', 'font-size', 'font-family', 'color'),
            'notnull' => true
        ),
        
        'blog_artigo_autor' => array(
	    'name'     => 'Autor do Artigo',
	    'type'     => 'int',
	    'size'     => '11',
            'search'  => true,
	    'grid'    => true,
            'especial' => 'autentication',
            'autentication' => array('needlogin' => true),
	    'notnull'  => true,
	    'fkey' => array(
	        'model' => 'usuario/login',
	        'cardinalidade' => '1n',
	        'keys' => array('cod_usuario', 'user_name'),
                'onupdate' => 'cascade',
                'ondelete' => 'restrict'
	    ),
         ),
        
        'blog_artigo_criadoem' => array(
	    'name'     => 'Data de Criação',
	    'type'     => 'timestamp',
	    'notnull' => true,
	    'grid'    => true,
	    'display' => true,
            'default' => "CURRENT_TIMESTAMP",
            'especial' => 'hide'
        ),
        
        'destaque' => array(
            'name'      => 'Destaque',
            'type'      => 'enum',
            'default'   => 'n',
            'options'   => array(
                's' => 'Sim',
                'n' => 'Não'
            ),
            'grid'    => true,
            'notnull'   => true,
            'feature' => array(
                'feature_name'  => 'BLOG_ARTIGO_DESTAQUE',
                'feature_value' => 'true'
            )
       	 ),
        
        'blog_artigo_exibir' => array(
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
    );
}
