<?php

class artigosComponent extends classes\Component\Component{
    public function draw($artigos, $title = "", $class = ''){
        $tres = 180;
        if(empty ($artigos)) return;
        $this->Html->LoadCss("blog/artigo");
        $i = 0;
        echo "<div class='artigo-title'>$title</div>
              <div class='artigos'>
                <ul>";
                    foreach($artigos as $art){
                        extract($art);
                        $link      = $this->Html->getLink(CURRENT_MODULE . "/artigo/show/$cod_artigo/".GetPlainName($titulo));
                        
                        //tratando o título
                        if(strlen($titulo) > $tres) $titulo = html_entity_decode(Resume($titulo, $tres), ENT_COMPAT, CHARSET);
                        
                        //tratando a capa
                        //$resumo    = "";
                        $resumo    = html_entity_decode($resumo, ENT_COMPAT, CHARSET);

                        //tratando o resumo
                        $resumo    = str_replace(array("&nbsp;", "  "), " ", $resumo);
                        
                        echo "<li class='artigo-item efeito'><a href='$link'>";
                            echo "<h3>$titulo</h3> <p>$resumo</p>";
                        echo "</a></li>";
                        $i++;
                    }
        echo   "</ul></div><div class='clear'></div>";
        $this->print_paginator_if_exists($this->LoadModel('blog/artigo', 'art'));
    }
}