<?php
    function TweetDiscoveryHash($tweet){
        preg_match_all("/#[^\s#]*/",$tweet,$HashTags);
        return $HashTags[0];
    }

    function TweetTransform($tweetbody){
        $tweetbody = preg_replace_callback(
            "/#[^\s#]*/",
            function($m){
                if(preg_match("/#[^\s#]*/",$m[0])){
                    return "<a href=\"?mode=hashtag&case=search&tag=".str_replace("#","",$m[0])."\">" . $m[0] . "</a>";
                }else{
                    return $m[0];
                }
            },
            $tweetbody
        );
        $tweetbody = str_replace("\r\n","<br>",$tweetbody);

        return $tweetbody;
    }

    function TweetReplys($data,$reply){
        $record = array();
        $record["user"] = $data["user"];
        foreach($data["tweet"] as $value){
            if($value["reply"] == $reply){
                $value["type"] = "R";
                $record["tweet"][] = $value;
            }else if($value["type"] == "REPLY"){
                $record["tweet"][] = $value;
            }
        }
        return $record;
    }

    function TweetReTweetData($data,$id){
        $record = array();
        foreach($data["tweet"] as $value){
            if($value["id"] == $id){
                $record[] = $value;
            }
        }

        return $record[0];
    }
?>