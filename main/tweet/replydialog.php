<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    function TweetReplyDialog($config){
        if(!SessionGet("CharletLogin")){
            http_response_code(403);
            return "";
        }
        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        $screen->Assign("reply",$config["URLQuery"]["reply"]);

        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = $screen->Fetch("dialog/replytweetdialog.tpl");

        return $ReturnScreen;
    }
?>
