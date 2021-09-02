<?php
    class ReadFileAgent{
        public function GetContentAsText($file){
            if(file_exists($file)){
                return file_get_contents($file);
            }else{
                return "";
            }
        }
    }
?>