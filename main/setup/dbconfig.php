<?php
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function SetupDBConfig($config){
        $Post = $config["PostData"];
        
        $ReturnScreen = array();
        $screen = new WebForm("POST","?mode=setup&case=dbconfig");
        
        $screen->HeaderText("データベースの設定を行います。");

        $screen->Part("ホスト名 ポート番号","host","text")
            ->AddValue($Post["host"])
            ->AddRequired()
            ->AddPlaceHolder("localhost:3306")
            ->AddErrorMessage("必須事項です。記入してください");

        $screen->Part("接続に使用するデータベースのアカウント名","user","text")
            ->AddValue($Post["user"])
            ->AddRequired()
            ->AddPlaceHolder("sqluser")
            ->AddErrorMessage("必須事項です。記入してください");

        $screen->Part("接続に使用するデータベースのアカウントのパスワード","pass","password")
            ->AddValue($Post["pass"])
            ->AddRequired()
            ->AddErrorMessage("必須事項です。記入してください");

        $screen->SubmitButton("登録する");

        if ($Post) {
            if ($screen->ExecuteCheck($Post)){
                if(DBcreate_ConnectCheck($Post)){
                    SessionSet("SETUP_DB_HOST",$Post["host"]);
                    SessionSet("SETUP_DB_ACCOUNT",$Post["user"]);
                    SessionSet("SETUP_DB_PASSWORD",$Post["pass"]);
                    header("Location: ?mode=setup&case=rtaccount");
                    return "";
                }else{
                    $screen->ErrorMessage("接続できませんでした。");
                }
            }
        }

        $ReturnScreen["ContentDisplayOption"] = "nonheader";
        $ReturnScreen["ContentMain0"] = $screen->CreateForm();

        return $ReturnScreen;
    }

    function SetupDBConfig_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("/main/setup");
        $Document->Item("SetupDBConfig");
        $Document->Description("
            データベース情報の登録を行います。
            ---
            POSTデータがあった場合は入力値を記憶してcase=rtaccountにリダイレクトします
        ");
        
        $Document->TROMS(
            ""
            ,ExecutionGroup($config)
        );
        

        $Document->Build("Program");
    }
?>