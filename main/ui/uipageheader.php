<?php
    function UiPageHeader($config,$option){
        $screen = new SingleScreen();

        $screen->Assign("type",$option["type"]);
        $screen->Assign("data",$option["data"]);
        $screen->Assign("link",$option["link"]);
        $screen->Assign("select",$option["select"]);

        $screen->Assign("category",$option["category"]);

        return $screen->Fetch("ui/uipageheader.tpl");
    }
?>