<?php
    function SetupRootAccount($config){
        $Post = $config["PostData"];
        
        $ReturnScreen = array();
        $screen = new WebForm("POST","?mode=setup&case=rtaccount");
        
        $screen->HeaderText("管理者アカウントの登録を行います。");

        $screen->Part("アカウント名","acc_name","text")
            ->AddValue($Post["acc_name"])
            ->AddRequired()
            ->AddPlaceHolder("charletter")
            ->AddErrorMessage("必須事項です。記入してください");

        $screen->Part("アカウントのメールアドレス","acc_mail","mail")
            ->AddValue($Post["acc_mail"])
            ->AddRequired()
            ->AddPlaceHolder("sqluser@example.com")
            ->AddErrorMessage("必須事項です。記入してください");

        $screen->Part("アカウントのパスワード","pass","password")
            ->AddValue($Post["pass"])
            ->AddRequired()
            ->AddErrorMessage("必須事項です。記入してください");

        $screen->Part("アカウントのパスワード(確認用)","repass","password")
            ->AddValue($Post["repass"])
            ->AddRequired()
            ->AddErrorMessage("必須事項です。記入してください");
        
        $screen->SubmitButton("登録する");
        $screen->AuxiliaryLink("データベース設定に戻る","?mode=setup&case=dbconfig");

        if ($Post) {
            if ($screen->ExecuteCheck($Post)){
                if($Post["pass"] == $Post["repass"]){
                    SessionSet("SETUP_RA_NAME",$Post["acc_name"]);
                    SessionSet("SETUP_RA_MAIL",$Post["acc_mail"]);
                    SessionSet("SETUP_RA_PASSWORD",$Post["pass"]);
                    SessionSet("SETUP_START",true);

                    header("Location: ?mode=setup&case=finish");
                    return "";
                }
            }
        }

        $ReturnScreen["ContentDisplayOption"] = "nonheader";
        $ReturnScreen["ContentMain0"] = $screen->CreateForm();

        return $ReturnScreen;
    }

    function SetupRootAccount_TROMS($config){
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