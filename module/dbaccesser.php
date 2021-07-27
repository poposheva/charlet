<?php
    class DBAccesser{

        public $sequence;
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

            $this->sequence = "@";
        }

        public function SequenceConstruction($sql,...$params){
            $index = 1;
            foreach($params[0] as $value){
                $value = mysqli_real_escape_string($this->Access, $value);
                $sql = str_replace($this->sequence . $index,$value,$sql);
                $index += 1;
            }

            return $sql;
        }

        public function Query($sql,...$params){
            $sql = $this->SequenceConstruction($sql,$params);
            $result = $this->Access->query($sql);

            while ($row = $result->fetch_assoc()){
                $ret[] = $row;
            }

            $result->close();
            return $ret;
        }

        public function AutoIDQuery($sql,...$params){
            $sql = $this->SequenceConstruction($sql,$params);
            $this->Access->query($sql);

            return $this->Access->insert_id;
        }

        public function NoReturnValueQuery($sql,...$params){
            $sql = $this->SequenceConstruction($sql,$params);
            $this->Access->query($sql);
        }
        
        public function __destruct(){
            $this->Access->close();
        }
    }
?>
