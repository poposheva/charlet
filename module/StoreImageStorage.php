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

        public function StoreRepresented_IMAGEFILE($value){
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $record = substr_replace($value,"",0,strpos($value,"base64,",0)+7);
            $data = base64_decode($record);
            
            $file_type = finfo_buffer($finfo,$data);
            $file_type = substr_replace($file_type,"",0,strpos($file_type,"/")+1);
            
            $id = 0;
            while(1){
                $filename = $this->path . uniqid() . "_" . $id . "." . $file_type;
                if(!file_exists($filename)){
                    file_put_contents($filename, $data);
                    
                    return $filename;
                }else{
                    $id += 1;
                }
            }
        }
    }
?>