<?php
    function DBResult_TimeSort_Callback($a,$b){
        return (intval($a["time"]) > intval($b["time"])) ? -1 : 1;
    }

    function DBResult_TimeSort($data){
        usort($data,"DBResult_TimeSort_Callback");
        return $data;
    }

    function DBResult_PopularSort_Callback($a,$b){
        if($a["retweet"] == $b["retweet"]){
            if($a["favorite"] == $b["favorite"]){
                return (intval($a["time"]) > intval($b["time"])) ? -1 : 1;
            }else{
                return ($a["favorite"] > $b["favorite"])?-1:1;
            }
        }else{
            return ($a["retweet"] > $b["retweet"])?-1:1;
        }
    }

    function DBResult_PopularSort($data){
        usort($data,"DBResult_PopularSort_Callback");
        return $data;
    }

    function DBResult_SearchWord($tweetdata,$word){
        if($word != ""){
            foreach($tweetdata["tweet"] as $key=>$value){
                if(strpos($value["tweet"],$word)===FALSE){
                    unset($tweetdata["tweet"][$key]);
                }
            }
        }
        return $tweetdata["tweet"];
    }
?>