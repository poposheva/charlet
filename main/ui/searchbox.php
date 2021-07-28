<?php
    function UiSearchBox($config,$option){
        $screen = new SingleScreen();

        $screen->Assign("nowurl",$config["NowURL"]);
        $screen->Assign("searchword",htmlspecialchars($option["Word"]));

        return $screen->Fetch("ui/searchbox.tpl");
    }
?>