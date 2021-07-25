<?php
    define("TWEETTABLE","tweet");

    function DBAccessTweet_AllList($config){
        $DB = new DBAccesser($config);

        return $DB->Query("SELECT * FROM ".TWEETTABLE."");
    }

    function DBAccessTweet_One($config,$id){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".TWEETTABLE." WHERE id=".$id);

        return $result[0];
    }

    function DBAccessTweet_ByDomain($config,$domain_id){
        $record = array();
        $DB = new DBAccesser($config);

        $domain = DBAccessDomain_One($config,$domain_id);
        
        $record["user"] = DBAccessAccount_ForDisplayTweet($config);

        if($domain[0]["grouplist"] == "all"){
            $record["tweet"] = DBAccessTweet_AllList($config);
        }else{
            if($domain[0]["grouplist"]!=""){
                $grouplist = $DB->Query("SELECT * FROM ".GROUPTABLE." WHERE id IN (".$domain[0]["grouplist"].")");
                $hashtaglist = $DB->Query("SELECT name FROM ".HASHTAGTABLE."WHERE id IN (".$domain[0]["hashtaglist"].")");
    
                foreach($hashtaglist as $value){
                    $part = $DB->Query("SELECT * FROM ".TWEETTABLE."WHERE tweet LIKE '%".$value."%' OR type='REPLY'");
                    foreach($part as $p){
                        $record["tweet"][] = $p;
                        $not_ids .= "," . $p["id"];
                    }
                }    
            }
        }

        return $record;
    }

    function DBAccessTweet_ByGroup($config,$id){
        $record = array();
        $not_ids = "";
        $DB = new DBAccesser($config);

        $Group = DBAccessGroup_One($config,$id);
        $HashTags = $DB->Query("SELECT * FROM ".HASHTAGTABLE." WHERE id IN (".$Group["hashtaglist"].")");

        $record["user"] = DBAccessAccount_ForDisplayTweet($config);
        foreach($HashTags as $tag){
            $part = $DB->Query("SELECT * FROM ".TWEETTABLE." WHERE (tweet LIKE '%".$tag["name"]."%' OR type='REPLY') AND id NOT IN(0".$not_ids.")");
            foreach($part as $p){
                $record["tweet"][] = $p;
                $not_ids .= "," . $p["id"];
            }
        }
        return $record;
    }

    function DBAccessTweet_ByHashTag($config,$id){
        $record = array();
        $DB = new DBAccesser($config);

        $HashTag = DBAccessHashTag_One($config,$id);

        $record["user"] = DBAccessAccount_ForDisplayTweet($config);

        $record["tweet"] = $DB->Query("SELECT * FROM ".TWEETTABLE." WHERE tweet LIKE '%".$HashTag["name"]."%' OR type='REPLY'");

        return $record;
    }

    function DBAccessTweet_ByAccount($config,$id){
        $record = array();
        $DB = new DBAccesser($config);

        $record["user"] = DBAccessAccount_ForDisplayTweet($config);

        $record["tweet"] = $DB->Query("SELECT * FROM ".TWEETTABLE." WHERE poster=".$id." OR type='REPLY' OR NOT retweet=0 ");

        return $record;
    }

    function DBAccessTweet_Regist($config,$option){
        $DB = new DBAccesser($config);
        $tweet = $option["tweet"];
        $poster = $option["poster"];
        $time = $option["time"];
        $type = $option["type"];
        $reply = ($option["reply"]!="")?$option["reply"]:"0";

        $DB->NoReturnValueQuery("INSERT INTO ".TWEETTABLE."(tweet,poster,time,type,reply) VALUES ('".$tweet."','".$poster."','".$time."','".$type."','".$reply."')");
    }

    function DBAccessTweet_Favorite($config,$id){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".TWEETTABLE." WHERE id=".$id);
        $DB->NoReturnValueQuery("UPDATE ".TWEETTABLE." SET favorite=".($result[0]["favorite"]+1)." WHERE id=".$id);

        return ($result[0]["favorite"]+1);
    }

    function DBAccessTweet_ReTweet($config,$id){
        $DB = new DBAccesser($config);

        $result = $DB->Query("SELECT * FROM ".TWEETTABLE." WHERE id=".$id);
        $DB->NoReturnValueQuery("UPDATE ".TWEETTABLE." SET retweet=".($result[0]["retweet"]+1)." WHERE id=".$id);

        return ($result[0]["retweet"]+1);
    }
