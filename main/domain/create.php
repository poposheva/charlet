<?php
    require_once ROOT_DIRECTORY . "module/SingleScreen.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";
    function DomainCreate($config){
        if($config["PostData"]){
            if($config["PostData"]["name"]!=""){
                DBAccessDomain_Create($config);

                header("Location: ?mode=domain&case=main");
                return "";
            }else{
                header("Location: ?mode=hashtag&case=page&select=".$config["PostData"]["hashid"]);
                return "";
            }
        }
        $ReturnScreen = array();
        $screen = new SingleScreen();

        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = $screen->Fetch("dialog/createdomain.tpl");

        return $ReturnScreen;
    }
?>
