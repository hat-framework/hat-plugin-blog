<?php

class novidadesComponent extends classes\Component\Component{
    public function index($artigos, $title = "", $class = ''){
        if(empty ($artigos)) return;
        $this->Html->LoadCss("blog/artigo");
        $this->LoadComponent("galeria/album", 'galbum');
        $i = 0;
        echo "<div class='artigo-title'>$title</div>
              <div class='artigos'>
                <ul>";
                    foreach($artigos as $art){
                        extract($art);
                        $link      = $this->Html->getLink(CURRENT_MODULE . "/novidades/show/$cod_novidade/".GetPlainName($titulo));
                        
                        //tratando o título
                        if(strlen($titulo) > 80) $titulo = html_entity_decode(Resume($titulo, 80), ENT_COMPAT, CHARSET);
                        
                        //tratando o resumo
                        $resumo    = html_entity_decode($resumo, ENT_COMPAT, CHARSET);
                        $resumo    = str_replace(array("&nbsp;", "  "), " ", $resumo);
                        $resumo    = ucfirst(strtolower($resumo)); 
                        
                        echo "<li class='artigo-item efeito'><a href='$link'><div class='artigo-conteudo'>";
                            echo "<h3>$titulo</h3><p>$resumo</p>";
                        echo "</div></a></li>";
                        if($i % 3 == 2) echo "<div class='clear'></div>"; 
                        $i++;
                    }
        echo   "</ul></div><div class='clear'></div>";
    }
}