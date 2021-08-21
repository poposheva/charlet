<?php
    class StoreImageStorage{
        private $path;

        public function __construct($path){
            $this->path = $path;
        }

        public function StoreRepresented_BASE64($value){
            $id = 0;
            while(1){
                $filename = $this->path . uniqid() . "_" . $id . ".b64";
                if(!file_exists($filename)){
                    $fp = @fopen($filename,"a");

                    fwrite($fp,$value);

                    fclose($fp);
                    return $filename;
                }else{
                    $id += 1;
                }
            }
        }

    }
?>