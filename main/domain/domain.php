<?php
    require_once ROOT_DIRECTORY . "main/ui/main.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function Domain($config){
        $ReturnSceen = array();
        $DomainInfo = DBAccessDomain_One($config,$config["URLQuery"]["select"]);

        $ReturnSceen["ContentHeader"] = UiHeader($config,array());

         $ReturnSceen["ContentMain0"] = UiSearchBox($config,array(
             "Word" => $config["Request"]["word"]
         ));
         $ReturnSceen["ContentMain1"] = UiPageHeader($config,array(
             "type" => "Domain",
             "data" => $DomainInfo,
             "link" => array("text"=>"グループに登録する","onclick"=>"")
         ));
         $ReturnSceen["ContentMain2"] = UiTweetList($TweetList,array(
            "Data" => DBAccessTweet_ByDomain($config,$config["URLQuery"]["select"])
         ));

        return $ReturnSceen;
    }

?>