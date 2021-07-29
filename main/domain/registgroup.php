<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function DomainRegistGroup($config){
        
        if($config["PostData"]){
            if($config["PostData"]["domain"]!=""){
                DBAccessDomain_AddGroup($config,$config["PostData"]["domain"],$config["PostData"]["groupid"]);
                header("Location: ?mode=group&case=page&select=".$config["PostData"]["groupid"]);
                return "";
            }else{
                header("Location: ?mode=group&case=page&select=".$config["PostData"]["groupid"]);
                return "";
            }
        }

        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        $screen->Assign("groupid",$config["URLQuery"]["groupid"]);
        $screen->Assign("domainlist",DBAccessDomain_AllList($config));

        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = $screen->Fetch("dialog/registgroupdialog.tpl");

        return $ReturnScreen;
    }
?>