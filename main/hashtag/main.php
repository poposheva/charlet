<?php
    function ExecutionHashTag($config){
        $case = $config["URLQuery"]["case"];
        switch($case){
            case "search":
                require_once ROOT_DIRECTORY . "main/hashtag/search.php";
                return HashTagSearch($config);
                break;
            case "page":
                require_once ROOT_DIRECTORY . "main/hashtag/page.php";
                return HashTagPage($config);
                break;
            default:
                header("Location:?mode=domain&case=main");
                return "";
        }

        return "";
    }

    function ExecutionHashTag_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("");
        $Document->Item("");
        $Document->Description("");
        $Document->TROMS(
            ""
            ,ExecutionHashTag($config)
        );

        $Document->Build("Program");
    }
?>