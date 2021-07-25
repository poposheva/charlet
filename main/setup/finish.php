<?php
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";
    function SetupFinish($config){
        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        if (SessionGet("SETUP_START")) {
            //セットアップ処理を開始する
            CreateDB();
            SessionSet("SETUP_START",false);
        }

        $ReturnScreen["ContentDisplayOption"] = "nonheader";
        $ReturnScreen["ContentMain0"] = $screen->Fetch("setup_finish.tpl");

        return $ReturnScreen;
    }

    function SetupFinish_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("");
        $Document->Item("");
        $Document->Description("");
        $Document->TROMS(
            ""
            ,ExecutionGroup($config)
        );

        $Document->Build("Program");
    }
?>