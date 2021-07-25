<?php
    function UiDomainList($config,$option){
        $screen = new SingleScreen();

        $screen->Assign("data",$option["Data"]);
        $screen->Assign("selector",$option["Selector"]);
        $screen->Assign("authority",strpos($option["Authority"],"DOMAIN_EDIT"));

        return $screen->Fetch("ui/domainlist.tpl");
    }
?>