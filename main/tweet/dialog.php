<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    function TweetDialog($config){
        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        $ReturnScreen["DialogScreenOutput"] = true;
        $ReturnScreen["ContentMain0"] = $screen->Fetch("dialog/tweetdialog.tpl");

        return $ReturnScreen;
    }
?>
