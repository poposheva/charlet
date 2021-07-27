<?php
    require_once ROOT_DIRECTORY . "main/ui/main.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function DomainMain($config){
        $ReturnSceen = array();

        $ReturnSceen["ContentHeader"] = UiHeader($config,array());

         $ReturnSceen["ContentMain0"] = UiSearchBox($config,array(
             "Word" => $config["PostData"]["word"]
         ));
         $ReturnSceen["ContentMain1"] = UiDomainList($config,array(
            "Data" => DBAccessDomain_GetList($config),
            "Authority" => SessionGet("CharletLoginAuthority"),
            "Selector" => $config["URLQuery"]["select"]
         ));
         $tweetdata = DBAccessTweet_ByDomain($config,$config["URLQuery"]["select"]);
         $tweetdata["tweet"] = DBResult_TimeSort($tweetdata["tweet"]);
         $tweetdata["tweet"] = DBResult_SearchWord($tweetdata,$config["PostData"]["word"]);
         $ReturnSceen["ContentMain2"] = UiTweetList($config,array(
            "Data" => $tweetdata
         ));

        return $ReturnSceen;
    }
?>