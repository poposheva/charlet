<?php
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function TweetFavorite($config){
        if(!SessionGet("CharletLogin")){
            http_response_code(403);
            return "";
        }
        $ReturnScreen = array();
        
        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = DBAccessTweet_Favorite($config,$config["URLQuery"]["id"]);

        return $ReturnScreen;
    }
?>