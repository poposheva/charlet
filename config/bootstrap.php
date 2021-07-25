<?php
    /*
        システム実行のために必要な前処理を行います
    */
    //Engineering
    //ini_set("display_errors","1");

    define("ROOT_DIRECTORY","./");

    require_once ROOT_DIRECTORY . "config/db.php";

    require_once ROOT_DIRECTORY . "supermodule/smarty/use_smarty.php";
    require_once ROOT_DIRECTORY . "supermodule/resultdisplay.php";
    require_once ROOT_DIRECTORY . "supermodule/asitis_doc.php";
    require_once ROOT_DIRECTORY . "supermodule/session.php";
    require_once ROOT_DIRECTORY . "supermodule/datetime.php";
    require_once ROOT_DIRECTORY . "supermodule/tweet.php";
    
    function ProgramPreprocessing(){
        //Dir
        $Config["RootDirectory"] = ROOT_DIRECTORY;

        //DB
        if (file_exists($DBDataFile = $Config["RootDirectory"] . "config/db_resource.txt")){
            $Config["DBInfomation"] = ProgramPreprocessing_DB($DBDataFile);
        }

        //Now URL
        $Config["NowURL"] = $_SERVER['REQUEST_URI'];

        //URL Query
        $Config["URLQuery"] = $_GET;

        //POST Data
        $Config["PostData"] = $_POST;

        //Smarty Template File
        $Config["SmartyTemplateFile"] = "basic.1.tpl";
        $Config["SmartyDialogTemplateFile"] = "basic.dialog.1.tpl";

        return $Config;
    }

?>
