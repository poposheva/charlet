<?php
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function TweetReTweet($config){
        if(!SessionGet("CharletLogin")){
            http_response_code(403);
            return "";
        }
        $ReturnScreen = array();
        $time = time();
        
        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = DBAccessTweet_ReTweet($config,$config["URLQuery"]["id"]);

        $record = DBAccessTweet_One($config,$config["URLQuery"]["id"]);

        DBAccessTweet_Regist($config,array(
            "tweet" => $config["URLQuery"]["id"],
            "poster" => SessionGet("CharletLoginUserID"),
            "time" => $time,
            "type" => "RETWEET",
        ));

        return $ReturnScreen;
    }
?>