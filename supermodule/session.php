<?php
    function SessionSet($name,$value){
        $_SESSION[$name] = $value;
    }

    function SessionGet($name){
        return $_SESSION[$name];
    }

?>
