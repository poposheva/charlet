<?php
    require_once ROOT_DIRECTORY . "main/ui/main.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function GroupPage($config){
        $ReturnSceen = array();
        $GroupInfomation = DBAccessGroup_One($config,$config["URLQuery"]["select"]);

        $ReturnSceen["ContentHeader"] = UiHeader($config,array());

         $ReturnSceen["ContentMain0"] = UiSearchBox($config,array(
             "Word" => $config["PostData"]["word"]
         ));

         $ReturnSceen["ContentMain1"] = UiPageHeader($config,array(
             "type" => "Group",
             "data" => $GroupInfomation,
             "select" => $config["URLQuery"]["select"],
             "category" => $config["URLQuery"]["category"]
         ));

         $tweetdata = DBAccessTweet_ByGroup($config,$config["URLQuery"]["select"]);
         switch($config["URLQuery"]["category"]){
            case "2":
                $tweetdata["tweet"] = DBResult_PopularSort($tweetdata["tweet"]);
                break;
            case "1":
            default:
                $tweetdata["tweet"] = DBResult_TimeSort($tweetdata["tweet"]);
                break;
         }
         $tweetdata["tweet"] = DBResult_SearchWord($tweetdata,$config["PostData"]["word"]);
         $ReturnSceen["ContentMain2"] = UiTweetList($config,array(
            "Data" => $tweetdata
         ));

        return $ReturnSceen;
    }
?>