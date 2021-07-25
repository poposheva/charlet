<?php
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function TweetExecute($config){
        $tweet = $config["PostData"]["tweet"];
        $poster = SessionGet("CharletLoginUserID");
        $time = time();
        $type = "";

        $tweet = str_replace("　"," ",$tweet);
        $HashTags = TweetDiscoveryHash($tweet);
        if($config["PostData"]["reply"] != 0){
            $type = "REPLY";
        }
        
        DBAccessHashTag_Regist($config,$HashTags);
        DBAccessTweet_Regist($config,array(
            "tweet" => $tweet,
            "poster" => $poster,
            "time" => $time,
            "type" => $type,
            "reply" => $config["PostData"]["reply"]
        ));

        header("Location:?mode=domain&case=main");
        return "";
    }
?>
