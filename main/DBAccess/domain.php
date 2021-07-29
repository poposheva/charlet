<?php
    define("DOMAINTABLE","domain");

    function DBAccessDomain_GetList($config){
        $DB = new DBAccesser($config);

        //return $DB->Query("SELECT * FROM `".DOMAINTABLE."`");
        return $DB->Query("SELECT * FROM `@1`",DOMAINTABLE);
    }

    function DBAccessDomain_One($config,$id){
        $DB = new DBAccesser($config);
        if($id == "")$id = "1";

        return $DB->Query("SELECT * FROM ".DOMAINTABLE." WHERE id=@1",$id);
    }

    function DBAccessDomain_AllList($config){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".DOMAINTABLE."");

        return $result;
    }

    function DBAccessDomain_Create($config){
        $DB = new DBAccesser($config);

        $name = $config["PostData"]["name"];
        $desc = $config["PostData"]["desc"];
        
        $DB->NoReturnValueQuery("INSERT INTO ".DOMAINTABLE."(name,description,grouplist) VALUES ('@1','@2','')",$name,$desc);
    }

    function DBAccessDomain_AddGroup($config,$domain,$group){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".DOMAINTABLE." WHERE id=@1",$domain);
        $update_ids = $result[0]["grouplist"] . "," . $group;

        $DB->NoReturnValueQuery("UPDATE ".DOMAINTABLE." SET grouplist='@1' WHERE id=@2",$update_ids,$domain);
    }
?>