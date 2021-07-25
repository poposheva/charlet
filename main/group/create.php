<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function GroupCreate($config){
        if($config["PostData"]){
            if($config["PostData"]["name"]!=""){
                DBAccessGroup_Create($config,$config["PostData"]["hashid"]);

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

        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = $screen->Fetch("dialog/creategroup.tpl");

        return $ReturnScreen;
    }
?>
