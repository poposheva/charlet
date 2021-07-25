<?php
    define("GROUPTABLE","`group`");

    function DBAccessGroup_One($config,$id){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".GROUPTABLE." WHERE id=".$id);

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

        $parentid = $DB->AutoIDQuery("INSERT INTO ".GROUPTABLE."(name,description,hashtaglist) VALUES ('".$name."','".$desc."','".$hashids."')");
        $DB->NoReturnValueQuery("UPDATE ".HASHTAGTABLE." SET parentgroup='".$parentid."' WHERE id=".$hashid);
    }

    function DBAccessGroup_AddHashTag($config,$group,$hash){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".GROUPTABLE."WHERE id=".$group);
        $update_ids = $result[0]["hashtaglist"] . "," . $hash;

        $DB->NoReturnValueQuery("UPDATE ".GROUPTABLE." SET hashtaglist='".$update_ids."' WHERE id=".$group);
        $DB->NoReturnValueQuery("UPDATE ".HASHTAGTABLE." SET parentgroup='".$group."' WHERE id=".$hash);
    }

?>