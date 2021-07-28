<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function GroupRemoveHashTag($config){
        if($config["PostData"]){
            if($config["PostData"]["enable"]=="1"){
                DBAccessGroup_RemoveHashTag($config,$config["URLQuery"]["id"]);
                header("Location: ?mode=domain&case=main");
                return "";
            }else{
                http_response_code(403);
                return "";
            }
        }
        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        $screen->Assign("id",$config["URLQuery"]["id"]);

        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = $screen->Fetch("dialog/removehashtag.tpl");

        return $ReturnScreen;
    }
?>
