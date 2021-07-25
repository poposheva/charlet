<?php
    function ExecutionTweet($config){
        $case = $config["URLQuery"]["case"];
        switch($case){
            case "tweetdialog":
                require ROOT_DIRECTORY . "main/tweet/dialog.php";
                return TweetDialog($config);
                break;
            case "replytweetdialog":
                require ROOT_DIRECTORY . "main/tweet/replydialog.php";
                return TweetReplyDialog($config);
                break;
            case "favorite":
                require_once ROOT_DIRECTORY . "main/tweet/favorite.php";
                return TweetFavorite($config);
                break;
            case "retweet":
                require_once ROOT_DIRECTORY . "main/tweet/retweet.php";
                return TweetReTweet($config);
                break;
            case "execute":
                require ROOT_DIRECTORY . "main/tweet/execute.php";
                return TweetExecute($config);
                break;
            default:
                header("Location: ?mode=domain&case=main");
                return "";
                break;
        }
        return "";
    }
?>
