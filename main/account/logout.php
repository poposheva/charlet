<?php
    function AccountLogout($config){
        $_SESSION = array();

        header("Location: ?mode=domain&case=main");

        return "";
    }
?>
