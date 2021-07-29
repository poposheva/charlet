<?php
    function ExecutionDomain($config){
        $case = $config["URLQuery"]["case"];
        switch($case){
            case "domainadd":
                require ROOT_DIRECTORY . "main/domain/domainadd.php";
                return DomainAdd($config);
                break;
            case "domain":
                require ROOT_DIRECTORY . "main/domain/domain.php";
                return Domain($config);
                break;
            case "create":
                require ROOT_DIRECTORY . "main/domain/create.php";
                return DomainCreate($config);
                break;
            case "registgroup":
                require ROOT_DIRECTORY . "main/domain/registgroup.php";
                return DomainRegistGroup($config);
                break;
            case "main":
            default:
                require ROOT_DIRECTORY . "main/domain/domainmain.php";
                return DomainMain($config);
                break;
        }
        return "";
    }

    function ExecutionDomain_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("/main/domain");
        $Document->Item("ExecuteMain");
        $Document->Description("
            ドメイン表示関連を行うプログラムをまとめています
            \$config[\"URLQuery\"][\"case\"]の値に応じてプログラムを切り替えます。
            ---
            case = domainadd ... ドメインを追加します(API向けです)
            case = domain    ... ドメインページを表示します
            case = main      ... ドメイン別に人気のあるツイートを表示させます(トップ画面表示)
        ");
        $Document->TROMS(
            ""
            ,ExecutionDomain($config)
        );

        $Document->Build("Program");
    }
?>