<?php
    class DBAccesser{

        public $Access;
        public $Error;
        
        public function __construct($config){
            $info = $config["DBInfomation"];

              $host = $info["DB_HOST"];
               $acc = $info["DB_USER"];
               $pas = $info["DB_PASS"];
            $dbname = $info["DB_NAME"];

            $this->Access = new mysqli($host,$acc,$pas,$dbname);

            if ($this->Access->connect_error) {
                $this->Error = $this->Access->connect_error;
            } else {
                $this->Access->set_charset("utf8");
            }
        }

        public function Query($sql){
            $result = $this->Access->query($sql);

            while ($row = $result->fetch_assoc()){
                $ret[] = $row;
            }

            $result->close();
            return $ret;
        }

        public function AutoIDQuery($sql){
            $this->Access->query($sql);

            return $this->Access->insert_id;
        }

        public function NoReturnValueQuery($sql){
            $this->Access->query($sql);
        }
        
        public function __destruct(){
            $this->Access->close();
        }
    }
?>
