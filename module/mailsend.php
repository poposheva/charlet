<?php
    function MailSend_TemporaryRegistration($data,$token){
        $screen = new SingleScreen();
        $URL = "http://localhost/project/source/?mode=account&case=regist&token=".$token;

        $screen->Assign("name",$data["acc_name"]);
        $screen->Assign("url",$URL);

        mail(
            $data["acc_mail"],
            "Charlet Account Registration Information",
            $screen->Fetch("mail/temporaryregistration.tpl")
        );
    }
?>