<?php
    function ExecutionAccount($config){
        $case = $config["URLQuery"]["case"];
        switch($case){
            case "loginform":
                require ROOT_DIRECTORY . "main/account/loginform.php";
                return AccountLoginForm($config);
                break;
            case "createform":
                require ROOT_DIRECTORY . "main/account/createform.php";
                return AccountCreateForm($config);
                break;
            case "mail":
                require ROOT_DIRECTORY . "main/account/mail.php";
                return AccountMail($config);
                break;
            case "regist":
                require ROOT_DIRECTORY . "main/account/regist.php";
                return AccountRegist($config);
                break;
            case "mypage":
                require ROOT_DIRECTORY . "main/account/mypage.php";
                return AccountMyPage($config);
                break;
            case "userpage":
                require ROOT_DIRECTORY . "main/account/userpage.php";
                return AccountUserPage($config);
                break;
            case "logout":
                require_once ROOT_DIRECTORY . "main/account/logout.php";
                return AccountLogout($config);
                break;
            case "main":
            default:
                require ROOT_DIRECTORY . "main/domain/domainmain.php";
                return DomainMain($config);
                break;
        }
        return "";
    }

    function ExecutionAccount_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("");
        $Document->Item("");
        $Document->Description("");
        $Document->TROMS(
            ""
            ,ExecutionAccount($config)
        );

        $Document->Build("Program");
    }
?>