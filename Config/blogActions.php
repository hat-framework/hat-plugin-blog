<?php

class blogActions extends classes\Classes\Actions{
    
    protected $permissions = array(
        
        "blog_CAT" => array(
            "nome"      => "blog_CAT",
            "label"     => "Gerenciar Categorias",
            "descricao" => "Permite adicionar e remover categorias do blog.",
            'default'   => 'n',
        ),
        
        "blog_ART" => array(
            "nome"      => "blog_ART",
            "label"     => "Gerenciar Artigos",
            "descricao" => "Permite adicionar e remover categorias do blog.",
            'default'   => 's',
        ),
        
        "blog_visualizar" => array(
            "nome"      => "blog_visualizar",
            "label"     => "Visualizar Artigos",
            "descricao" => "Permite visualizar artigos e categorias do blog.",
            'default'   => 's',
        ),
    
    );
    
    protected $actions = array( 
        'blog/index/inicial' => array(
            'label' => 'Página Inicial', 'publico' => 's', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_ART", 'needcod' => true,
        ),
        
        
        
        'blog/artigo/formulario' => array(
            'label' => 'Criar Artigo', 'publico' => 'n', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_ART",
            'menu' => array('blog/artigo/group')
        ),
        
        'blog/artigo/edit' => array(
            'label' => 'Editar Artigo', 'publico' => 'n', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_ART", 'needcod' => true,
            'menu' => array('blog/artigo/group', 'blog/artigo/show')
        ),

        'blog/artigo/apagar' => array(
            'label' => 'Apagar Artigo', 'publico' => 'n', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_ART", 'needcod' => true,
            'menu' => array('blog/artigo/group', 'blog/artigo/show')
        ),
        
        'blog/artigo/show' => array(
            'label' => 'Visualizar Artigo', 'publico' => 's', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_visualizar", 'needcod' => true,
            'menu' => array(
                'Opções' => array('blog/artigo/edit', 'blog/artigo/apagar')
             ),
            'breadscrumb' => array('blog/index/inicial', 'blog/categoria/index', 'blog/categoria/show', 'blog/artigo/show')
        ),
                
        'blog/categoria/index' => array(
            'label' => 'Categorias', 'publico' => 's', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_CAT",
            'menu' => array('blog/categoria/formulario', 'blog/artigo/formulario'),
            'breadscrumb' => array('blog/index/inicial', 'blog/categoria/index')
        ),
        
        'blog/categoria/show' => array(
            'label' => 'Visualizar Categoria', 'publico' => 's', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_visualizar", 'needcod' => true,
            'menu' => array('blog/artigo/formulario', 
                'Opções' => array('blog/categoria/edit', 'blog/categoria/apagar')
             ),
            'breadscrumb' => array('blog/index/inicial', 'blog/categoria/index', 'blog/categoria/show')
        ),
        
        'blog/categoria/formulario' => array(
            'label' => 'Nova Categoria', 'publico' => 'n', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_CAT",
            'menu'  => array('blog/categoria/index')
        ),
        
        'blog/categoria/edit' => array(
            'label' => 'Editar Categoria', 'publico' => 'n', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_CAT", 'needcod' => true,
            'menu' => array('blog/categoria/index', 'blog/categoria/show')
        ),

        'blog/categoria/apagar' => array(
            'label' => 'Apagar Categoria', 'publico' => 'n', "default_yes" => "s","default_no" => "n",
            "permission" => "blog_CAT", 'needcod' => true,
        ),
       
        
       
        
        
    );
}