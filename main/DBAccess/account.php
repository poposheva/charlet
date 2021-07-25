<?php
    define("ACCOUNTTABLE","account");

    function DBAccessAccount_One($config,$id){
        $DB = new DBAccesser($config);

        $record = $DB->Query("SELECT * FROM ".ACCOUNTTABLE." WHERE id=".$id);

        return $record[0];
    }

    function DBAccessAccount_Login($config,$name,$pass){
        $DB = new DBAccesser($config);

        $record = $DB->Query("SELECT * FROM ".ACCOUNTTABLE." WHERE name='".$name."'");
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

        var_dump("INSERT INTO `".ACCOUNTTABLE."` (`name`, `mail`, `password`, `timeline`, `authority`) VALUES ('".$name."','".$mail."','".$pass."','','')");
        exit();
        $DB->NoReturnValueQuery("INSERT INTO `".ACCOUNTTABLE."` (`name`, `mail`, `password`, `timeline`, `authority`) VALUES ('".$name."','".$mail."','".$pass."','','')");
        
    }

    function DBAccessAccount_ForDisplayTweet($config){
        $ret = array();
        $DB = new DBAccesser($config);

        $record = $DB->Query("SELECT * FROM ".ACCOUNTTABLE);
        foreach($record as $value){
            $ret[$value["id"]] = $value;
        }

        return $ret;
    }
?>
