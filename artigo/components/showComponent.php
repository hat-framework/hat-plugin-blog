<?php

class showComponent extends classes\Component\Component{
    public function draw($artigo, $class = ''){
        
        if(empty ($artigo)) return;
        $this->LoadJsPlugin("galerias/lightbox", 'lb');
        $this->LoadComponent("galeria/album", 'galbum');
        $this->lb->start('conteudo');
        $this->lb->start('galeria');
        
        $this->Html->LoadCss("blog/artigo");
        extract($artigo);
        //$resumo = html_entity_decode($resumo);
        echo "<div class='artigo'>
                    <h1>$titulo</h1>
                    <div class='conteudo' style='line-height:120%;'>$conteudo</div>
             </div>
             <div class='clear'></div><hr/>
              ";
    }
}
