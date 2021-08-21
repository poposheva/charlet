<?php
    class MetaTagControlForSEO{
        private $description;
        private $keyword;

        public function __construct(){
            $this->description = "";
            $this->keyword = "";
        }

        public function SetDescription($value){
            $this->description = $value;

            return $this;
        }

        public function SetKeyword($value){
            $this->keyword = $value;

            return $this;
        }

        public function BuildHTML(){
            $html = "";

            if($this->description){
                $html .= "<meta name=\"description\" content=\" ".$this->description." \">";
            }

            if($this->keyword){
                $html .= "<meta name=\"keywords\" content=\"" .$this->keyword. "\">";
            }

            return $html;
        }
    }
?>
