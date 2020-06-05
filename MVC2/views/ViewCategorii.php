<?php

class ViewCategorii{
        private $sablon;
        private $nr;
        private $lista_nume;
        private $lista_sume;

        public function __construct()
        {
            $this->sablon = DIRECTOR_SITE.SLASH.'views'.SLASH. 'templates' . SLASH . 'categorii_nationale.tpl';
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
            
            ob_start();
            $header=DIRECTOR_SITE.SLASH.'views'.SLASH. 'templates' . SLASH . 'header.tpl';
            include($header);
            include($this->sablon);          
            $output = ob_get_contents();
            
            
            ob_end_clean();
            return $output;
        }
}?>