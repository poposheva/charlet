<?php
    function UiTweetList($config,$option){
        $screen = new SingleScreen();

        $screen->Assign("data",$option["Data"]);

        return $screen->Fetch("ui/tweetlist.tpl");
    }
?>