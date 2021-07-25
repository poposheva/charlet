<?php
    require ROOT_DIRECTORY . "module/singlescreen.php";
    
    function AccountMail($config){
        $ReturnScreen = array();
        $screen = new SingleScreen();
        
        $ReturnScreen["ContentMain0"] = $screen->Fetch("mailsend.tpl");

        return $ReturnScreen;
    }
?>