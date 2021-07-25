<?php
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";
    
    function HashTagSearch($config){
        $hashtag = DBAccessHashTag_Search($config,$config["URLQuery"]["tag"]);
        if(($group = DBAccessHashTag_BelongGroup($config,$hashtag)) != 0){
            header("Location:?mode=group&case=page&select=".$group);
            return "";
        }else{
            header("Location:?mode=hashtag&case=page&select=".$hashtag);
            return "";
        }
    }

?>
