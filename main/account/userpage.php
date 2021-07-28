<?php
    require_once ROOT_DIRECTORY . "main/ui/main.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function AccountUserPage($config){
        $ReturnSceen = array();
        $AccountInfo = DBAccessAccount_One($config,$config["URLQuery"]["select"]);

        $ReturnSceen["ContentHeader"] = UiHeader($config,array());

         $ReturnSceen["ContentMain0"] = UiSearchBox($config,array(
             "Word" => $config["Request"]["word"]
         ));
         $ReturnSceen["ContentMain1"] = UiPageHeader($config,array(
             "type" => "Account",
             "data" => $AccountInfo,
             "category" => $config["URLQuery"]["category"],
             "select" => $config["URLQuery"]["select"],
             "link" => array("text"=>"ログアウトする","href"=>"?mode=account&case=logout")
         ));
         $tweetdata = DBAccessTweet_ByAccount($config,$config["URLQuery"]["select"]);
         switch($config["URLQuery"]["category"]){
            case "2":
                $tweetdata["tweet"] = DBResult_PopularSort($tweetdata["tweet"]);
                break;
            case "1":
            default:
                $tweetdata["tweet"] = DBResult_TimeSort($tweetdata["tweet"]);
                break;
         }
         $tweetdata["tweet"] = DBResult_SearchWord($tweetdata,$config["Request"]["word"]);
         $ReturnSceen["ContentMain2"] = UiTweetList($config,array(
            "Data" => $tweetdata
         ));

        return $ReturnSceen;
    }
?>
