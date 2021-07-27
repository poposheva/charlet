<?php
    define("ACCOUNTTABLE","account");

    function DBAccessAccount_One($config,$id){
        $DB = new DBAccesser($config);

        $record = $DB->Query("SELECT * FROM @1 WHERE id=@2",ACCOUNTTABLE,$id);

        return $record[0];
    }

    function DBAccessAccount_Login($config,$name,$pass){
        $DB = new DBAccesser($config);

        $record = $DB->Query("SELECT * FROM @1 WHERE name='@2'",ACCOUNTTABLE,$name);
        $pass = md5($pass);//password_hash($pass,PASSWORD_DEFAULT);
        
        if($pass == $record[0]["password"]){
            SessionSet("CharletLogin",true);
            SessionSet("CharletLoginUserID",$record[0]["id"]);
            SessionSet("CharletLoginUser",$record[0]["name"]);
            SessionSet("CharletLoginTimeLine",$record[0]["timeline"]);
            SessionSet("CharletLoginAuthority",$record[0]["authority"]);

            return true;
        }else{
            return false;
        }
    }

    function DBAccessAccount_TemporaryRegistration($data){
        $token = password_hash(date("Y-m-d H:i:s:v").$acc_mail,PASSWORD_DEFAULT);
        
        SessionSet("CreateUser_Name",$data["acc_name"]);
        SessionSet("CreateUser_Mail",$data["acc_mail"]);
        SessionSet("CreateUser_Pass",md5($data["acc_pass"]));//password_hash($data["acc_pass"],PASSWORD_DEFAULT));
        SessionSet("CreateUser_Token",$token);

        return $token;
    }

    function DBAccessAccount_Registration($config){
        $DB = new DBAccesser($config);

        $name = SessionGet("CreateUser_Name");
        $mail = SessionGet("CreateUser_Mail");
        $pass = SessionGet("CreateUser_Pass");

        $DB->NoReturnValueQuery("INSERT INTO `@1` (`name`, `mail`, `password`, `timeline`, `authority`) VALUES ('@2','@3','@4','','')",ACCOUNTTABLE,$name,$mail,$pass);
    }

    function DBAccessAccount_ForDisplayTweet($config){
        $ret = array();
        $DB = new DBAccesser($config);

        $record = $DB->Query("SELECT * FROM @1",ACCOUNTTABLE);
        
        foreach($record as $value){
            $ret[$value["id"]] = $value;
        }

        return $ret;
    }
?>
