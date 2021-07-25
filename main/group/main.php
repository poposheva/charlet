<?php
    function ExecutionGroup($config){
        $case = $config["URLQuery"]["case"];
        switch($case){
            case "registhash":
                require_once ROOT_DIRECTORY . "main/group/registhash.php";
                return GroupRegistHash($config);
                break;
            case "create":
                require_once ROOT_DIRECTORY . "main/group/create.php";
                return GroupCreate($config);
                break;
            case "page":
                require_once ROOT_DIRECTORY . "main/group/page.php";
                return GroupPage($config);
                break;
            default:
                header("Location: ?mode=domain&case=main");
                return "";
                break;
        }
        return "";
    }

    function ExecutionGroup_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("");
        $Document->Item("");
        $Document->Description("");
        $Document->TROMS(
            ""
            ,ExecutionGroup($config)
        );

        $Document->Build("Program");
    }
?>