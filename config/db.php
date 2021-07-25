<?php
    /*
        データベースに関する登録情報を取得します
    */
    function ProgramPreprocessing_DB($file){
        $config = array();
        $fp = @fopen($file,"r") or die("Failed to read the file. [/config/db.php ProgramPreprocessing_DB()]");

        while($str = fgets($fp)){
            $record = explode(",", $str);
            $config[$record[0]] = $record[1];
        }
        fclose($fp);

        $config["exists"] = true;
        return $config;
    }

    /*
        データベースに関する登録情報を作成します
    */
    function ProgramPreprocessing_DBCreate($file,$data){
        $fp = @fopen($file,"a") or die("Failed to create file. [/config/db.php ProgramPreprocessing_DBCreate()]");

        foreach($data as $key=>$value){
            fwrite($fp,$key . "," . $value ."," ."\r\n");
        }

        fclose($fp);
        return true;
    }
?>
