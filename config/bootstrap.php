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
    require_once ROOT_DIRECTORY . "supermodule/ReadFileAgent.php";
    
    function ProgramPreprocessing(){
        //Dir
        $Config["RootDirectory"] = ROOT_DIRECTORY;
        $Config["ConfigDirectory"] = $Config["RootDirectory"] . "config/";

        //DB
        if (file_exists($DBDataFile = $Config["RootDirectory"] . "config/db_resource.txt")){
            $Config["DBInfomation"] = ProgramPreprocessing_DB($DBDataFile);
        }

        //URL
        $Config["SystemRootURL"] = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER["HTTP_HOST"] . $_SERVER['SCRIPT_NAME'];
        $Config["SystemRootURL_Protocol"] = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://');
        $Config["SystemRootURL_Domain"] = $_SERVER["HTTP_HOST"];
        $Config["SystemRootURL_Path"] = $_SERVER['SCRIPT_NAME'];

        //Now URL
        $Config["NowURL"] = $_SERVER['REQUEST_URI'];

        //URL Query
        $Config["URLQuery"] = $_GET;

        //POST Data
        $Config["PostData"] = $_POST;

        //Request Data
        $Config["Request"] = $_REQUEST;

        //Smarty Template File
        $Config["SmartyTemplateFile"] = "basic.1.tpl";
        $Config["SmartyDialogTemplateFile"] = "basic.dialog.1.tpl";

        return $Config;
    }

?>
