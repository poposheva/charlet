<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "module/webform.php";
    require_once ROOT_DIRECTORY . "module/mailsend.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";
    
    function AccountCreateForm($config){
        $Post = $config["PostData"];
        $ReturnScreen = array();
        $screen = new WebForm("POST","?mode=account&case=createform");
        
        $screen->HeaderText("新規登録");

        $screen->Part("アカウント名","acc_name","text")
            ->AddValue($Post["acc_name"])
            ->AddRequired()
            ->AddPlaceHolder("アカウント名")
            ->AddErrorMessage("必須事項です。記入してください");
        
        $screen->Part("メールアドレス","acc_mail","mail")
            ->AddValue($Post["acc_mail"])
            ->AddRequired()
            ->AddPlaceHolder("account@example.com")
            ->AddErrorMessage("必須事項です。記入してください");
        
        $screen->Part("パスワード","acc_pass","password")
            ->AddValue($Post["acc_pass"])
            ->AddRequired()
            ->AddErrorMessage("入力が正しくありません");

        $screen->Part("パスワード(確認用)","acc_repass","password")
            ->AddValue($Post["acc_repass"])
            ->AddRequired()
            ->AddErrorMessage("入力が正しくありません");
        
        $screen->SubmitButton("この情報で登録メールを受信する");

        if ($Post) {
            if ($screen->ExecuteCheck($Post)){
                if($Post["acc_pass"] == $Post["acc_repass"]){
                    $token = DBAccessAccount_TemporaryRegistration($Post);
                    MailSend_TemporaryRegistration($Post,$token);
                    header("Location: ?mode=account&case=mail");
                    return "";
                }
            }
        }

        $ReturnScreen["ContentMain0"] = $screen->CreateForm();

        return $ReturnScreen;
    }
?>