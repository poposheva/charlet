<?php
    require_once ROOT_DIRECTORY . "module/StoreImageStorage.php";
    require_once ROOT_DIRECTORY . "main/DBAccess/main.php";

    function TweetExecute($config){
        $tweet = $config["PostData"]["tweet"];
        $images = "";
        $poster = SessionGet("CharletLoginUserID");
        $time = time();
        $type = "";

        $tweet = str_replace("　"," ",$tweet);
        $HashTags = TweetDiscoveryHash($tweet);
        
        if($config["PostData"]["images_1"]){
            $images = TweetExecute_SettingImages($config);
        }
        
        if($config["PostData"]["reply"] != 0){
            $type = "REPLY";
        }
        
        DBAccessHashTag_Regist($config,$HashTags);
        DBAccessTweet_Regist($config,array(
            "tweet" => $tweet,
            "poster" => $poster,
            "time" => $time,
            "type" => $type,
            "images" => $images,
            "reply" => $config["PostData"]["reply"]
        ));

        header("Location:?mode=domain&case=main");
        return "";
    }

    function TweetExecute_SettingImages($config){
        $imagestore = new StoreImageStorage("userimage/");
        $imagedatas = "";
        for($i=1 ; $i <= 4 ; $i++){
            if($config["PostData"]["images_".$i]){
                $imagedatas .= $imagestore->StoreRepresented_IMAGEFILE($config["PostData"]["images_".$i]) . ",";
            }
        }

        return $imagedatas;
    }
?>
