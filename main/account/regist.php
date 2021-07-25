<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function AccountRegist($config){
        $checktoken = SessionGet("CreateUser_Token");
        $token = $config["URLQuery"]["token"];

        if($token == $checktoken){
            $ReturnScreen = array();
            $screen = new SingleScreen();
            
            DBAccessAccount_Registration($config);

            $ReturnScreen["ContentMain0"] = $screen->Fetch("createaccount_finish.tpl");

            return $ReturnScreen;
        }else{
            header("location: ?mode=domain&case=main");
            return "";
        }
    }
?>
