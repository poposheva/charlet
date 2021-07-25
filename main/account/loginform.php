<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "module/webform.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";
    
    function AccountLoginForm($config){
        $Post = $config["PostData"];
        $ReturnScreen = array();
        $screen = new WebForm("POST","?mode=account&case=loginform");
        
        $screen->HeaderText("ログイン");

        $screen->Part("アカウント名","acc_name","text")
            ->AddValue($Post["acc_name"])
            ->AddRequired()
            ->AddPlaceHolder("アカウント名")
            ->AddErrorMessage("必須事項です。記入してください");
        
        $screen->Part("パスワード","acc_pass","password")
            ->AddValue($Post["acc_pass"])
            ->AddRequired()
            ->AddErrorMessage("必須事項です。記入してください");

        $screen->SubmitButton("ログインする");
        $screen->AuxiliaryLink("アカウントを新規登録する","?mode=account&case=createform");
        $screen->AuxiliaryLink("パスワードを忘れた","");

        if ($Post) {
            if ($screen->ExecuteCheck($Post)){
                if(DBAccessAccount_Login($config,$Post["acc_name"],$Post["acc_pass"])){
                    header("Location: ?mode=domain&case=main");
                    return "";
                }
            }
        }

        $ReturnScreen["ContentMain0"] = $screen->CreateForm();

        return $ReturnScreen;
    }
?>