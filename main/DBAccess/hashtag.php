<?php
    define("HASHTAGTABLE","hashtag");

    function DBAccessHashTag_One($config,$id){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".HASHTAGTABLE." WHERE id=".$id);
        
        return $result[0];
    }

    function DBAccessHashTag_Search($config,$tagname){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".HASHTAGTABLE." WHERE name='#".$tagname."'");

        return $result[0]["id"];
    }

    function DBAccessHashTag_BelongGroup($config,$hashtag){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT parentgroup FROM ".HASHTAGTABLE." WHERE id=".$hashtag);

        if($result[0]["parentgroup"]!=""){
            return intval($result[0]["parentgroup"]);
        }else{
            return 0;
        }
    }

    function DBAccessHashTag_Regist($config,$hashtags){
        $DB = new DBAccesser($config);
        foreach($hashtags as $tag){
            $result = $DB->Query("SELECT * FROM ".HASHTAGTABLE." WHERE name='".$tag."'");

            if(count($result)==0){
                $DB->NoReturnValueQuery("INSERT INTO ".HASHTAGTABLE."(name) VALUES ('".$tag."')");
            }
        }
    }
?>