<?php

class artigoComponent extends classes\Component\Component{
    
    public function listar($model, $artigos, $title = "", $class = ''){
        if(empty ($artigos)) return;
        $this->Html->LoadCss("blog/artigo");
        $i = 0;
        echo "<div class='artigo-title'>$title</div>
              <div class='artigos'>
                <ul>";
                    $exibir = str_replace("/", "_", $model) . "_exibir";
                    foreach($artigos as $art){
                        extract($art);
                        if(array_key_exists($exibir, $art)&&$art[$exibir]=='n') continue;
                        $link      = $this->Html->getLink(CURRENT_MODULE . "/artigo/show/$cod_artigo/".GetPlainName($titulo));
                        
                        //tratando o título
                        if(strlen($titulo) > 80) $titulo = html_entity_decode(Resume($titulo, 80), ENT_COMPAT, CHARSET);
                        $titulo    = $titulo;//ucfirst(strtolower($titulo));
                        
                        //$resumo    = "";
                        $resumo    = html_entity_decode($resumo, ENT_COMPAT, CHARSET);

                        //tratando o resumo
                        $resumo    = str_replace(array("&nbsp;", "  "), " ", $resumo);
                        $resumo    = ucfirst(strtolower($resumo));
                        $capa      = "";
                        echo "<li class='artigo-item efeito'><a href='$link'>";
                            echo "<h3>$capa $titulo</h3> <p>$resumo</p>";
                        echo "</a></li>";
                        $i++;
                    }
        echo   "</ul></div><div class='clear'></div>";
    }
    
    public function show($model, $artigo, $class = ''){
        
        if(empty ($artigo)) return;
        if(!$this->pode_exibir($model, $artigo)) {
            $this->conteudo_bloqueado();
            return;
        }
        $this->LoadJsPlugin("galerias/lightbox", 'lb');
        $this->lb->start('conteudo');
        $this->lb->start('galeria');
        $this->Html->LoadCss("blog/artigo");
        extract($artigo);
        $autor_artigo = array_shift($artigo['blog_artigo_autor']);
        $autor_artigo = ($autor_artigo != "")? "Por: $autor_artigo":"";
        $blog_artigo_criadoem = \classes\Classes\timeResource::Date2StrBr($blog_artigo_criadoem);
        //$resumo = html_entity_decode($resumo);
        echo "<div class='artigo'>
                    <hr />
                    <h1>$titulo</h1>
                    <h2>$resumo</h2>
                    <hr />
                    <div class='conteudo' style='line-height:120%;'>$conteudo</div>
                    <div style='clear:both;'></div>
                    <hr />
                    <div class='blog_artigo_criadoem'>$blog_artigo_criadoem</div>
                    <div class='blog_artigo_autor'>$autor_artigo</div>
             </div>
             
              ";
    }
}

?>
