<?php

class ViewCategorii{
        private $sablon;
        private $nr;
        private $lista_nume;
        private $lista_sume;

        public function __construct($categorie)
        {
            $this->sablon = DIRECTOR_SITE.SLASH.'views'.SLASH. 'templates' . SLASH . $categorie.'.tpl';
            
        }

        public function incarcaDatele($nr,$lista_nume,$lista_sume){
            $this->nr = $nr;
            
            $this->lista_nume=$lista_nume;
            $this->lista_sume=$lista_sume;
        }

        public function oferaVizualizare($edit=NULL){
            $lista_nume=$this->lista_nume;
            $lista_sume=$this->lista_sume;
            $nr = $this->nr;
            $header=DIRECTOR_SITE.SLASH.'views'.SLASH. 'templates' . SLASH . 'header.tpl';
            ob_start();
            
            include($this->sablon);
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        }
        public function crearePagina($i)
        {
        $harta= DIRECTOR_SITE.SLASH.'views'.SLASH. 'templates' . SLASH . 'harta.tpl';
        ob_start();
            $an=$i;
 
            include($harta);
            $output = ob_get_contents();
            file_put_contents($i.".html",$output);
            
            ob_end_flush();
		}
        public function oferaHarta($edit=NULL){
            $lista_nume=$this->lista_nume;
            $lista_sume=$this->lista_sume;
            $nr = $this->nr;
            $header=DIRECTOR_SITE.SLASH.'views'.SLASH. 'templates' . SLASH . 'header.tpl';
            $harta= DIRECTOR_SITE.SLASH.'views'.SLASH. 'templates' . SLASH . 'harta.tpl';
            ob_start();
            $template=ob_get_contents();
            ob_end_clean();
            for($i=2015;$i<2020;$i++)
            {
              ob_start();
              echo $template;
              $an=$i;
              include($harta);
              $output = ob_get_contents();
              file_put_contents($i.".html",$template.$output);
              ob_end_clean();
            
            }
            
            $output = file_get_contents($header);
            $output=$output.file_get_contents($this->sablon);
            return $output;
        }
}?>