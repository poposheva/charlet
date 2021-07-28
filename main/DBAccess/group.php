<?php
    define("GROUPTABLE","`group`");

    function DBAccessGroup_One($config,$id){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".GROUPTABLE." WHERE id=@1",$id);

        return $result[0];
    }

    function DBAccessGroup_AllList($config){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".GROUPTABLE."");

        return $result;
    }

    function DBAccessGroup_Create($config,$hashid){
        $DB = new DBAccesser($config);

        $name = $config["PostData"]["name"];
        $desc = $config["PostData"]["desc"];
        $hashids = $hashid;

        $parentid = $DB->AutoIDQuery("INSERT INTO ".GROUPTABLE."(name,description,hashtaglist) VALUES ('@1','@2','@3')",$name,$desc,$hashids);
        $DB->NoReturnValueQuery("UPDATE ".HASHTAGTABLE." SET parentgroup='@1' WHERE id=@2",$parentid,$hashid);
    }

    function DBAccessGroup_AddHashTag($config,$group,$hash){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".GROUPTABLE."WHERE id=@1",$group);
        $update_ids = $result[0]["hashtaglist"] . "," . $hash;

        $DB->NoReturnValueQuery("UPDATE ".GROUPTABLE." SET hashtaglist='@1' WHERE id=@2",$update_ids,$group);
        $DB->NoReturnValueQuery("UPDATE ".HASHTAGTABLE." SET parentgroup='@1' WHERE id=@2",$group,$hash);
    }

    function DBAccessGroup_RemoveHashTag($config,$hash){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".HASHTAGTABLE." WHERE id=@1",$hash);
        $group = $result[0]["parentgroup"];

        $result = $DB->Query("SELECT * FROM ".GROUPTABLE." WHERE id=@1",$group);
        $update_ids = str_replace(",".$hash,"","," . $result[0]["hashtaglist"]);

        $update_ids = substr_replace($update_ids,"",0,1);

        $DB->NoReturnValueQuery("UPDATE ".GROUPTABLE." SET hashtaglist='@1' WHERE id=@2",$update_ids,$group);
        $DB->NoReturnValueQuery("UPDATE ".HASHTAGTABLE." SET parentgroup='@1' WHERE id=@2","",$hash);
    }

?>