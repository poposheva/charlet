<?php
    function UiHeader($config,$option){
        $screen = new SingleScreen();

        $screen->Assign("CharletLogin",SessionGet("CharletLogin"));

        return $screen->Fetch("ui/header.tpl");
    }
?>