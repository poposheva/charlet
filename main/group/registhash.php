<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function GroupRegistHash($config){
        
        if($config["PostData"]){
            if($config["PostData"]["group"]!=""){
                DBAccessGroup_AddHashTag($config,$config["PostData"]["group"],$config["PostData"]["hashid"]);

                $row = DBAccessHashTag_One($config,$config["PostData"]["hashid"]);
                header("Location: ?mode=hashtag&case=search&tag=" . str_replace("#","",$row["name"]));
                return "";
            }else{
                header("Location: ?mode=hashtag&case=page&select=".$config["PostData"]["hashid"]);
                return "";
            }
        }

        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        $screen->Assign("hashid",$config["URLQuery"]["hashid"]);
        $screen->Assign("grouplist",DBAccessGroup_AllList($config));

        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = $screen->Fetch("dialog/registhashdialog.tpl");

        return $ReturnScreen;
    }
?>