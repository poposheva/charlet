<?php
    function UiHashTagList($config,$option){
        $screen = new SingleScreen();

        $screen->Assign("data",$option["Data"]);

        return $screen->Fetch("ui/hashtaglist.tpl");
    }
?>
