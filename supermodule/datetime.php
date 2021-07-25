<?php
    function TimeRelationship($timestamp){
        $time = time();

        if($time - $timestamp<3600){
            return intdiv(($time - $timestamp) , 60) . "分前";
        }elseif($time - $timestamp<86400){
            return intdiv(($time - $timestamp) , 3600) . "時間前";
        }elseif($time - $timestamp<604800){
            return intdiv(($time - $timestamp) , 86400) . "日前";
        }else{
            return date("Y年m月d日 h:i:s",$timestamp);
        }
    }
?>