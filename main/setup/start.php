<?php
    function SetupStart($config){
        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        $ReturnScreen["ContentMain0"] = $screen->Fetch("setup_start.tpl");

        $ReturnScreen["ContentDisplayOption"] = "nonheader";
        return $ReturnScreen;
    }

    function SetupStart_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("/main/setup");
        $Document->Item("SetupStart");
        $Document->Description("
            セットアップ開始画面を表示させます
        ");
        $Document->TROMS(
            "(条件指定なし)"
            ,SetupStart($config)
        );

        $Document->Build("Program");
    }
?>