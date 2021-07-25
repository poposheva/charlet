<?php
    function ProgramStartExecution($config){
        if(!$config["DBInfomation"]["exists"]){
            require_once ROOT_DIRECTORY . "main/setup/main.php";
            return ExecutionSetup($config);
        }

        $mode = $config["URLQuery"]["mode"];

        switch($mode){
            case "setup":
                require_once ROOT_DIRECTORY . "main/setup/main.php";
                return ExecutionSetup($config);
                break;
            case "account":
                require_once ROOT_DIRECTORY . "main/account/main.php";
                return ExecutionAccount($config);
                break;
            case "domain":
                require_once ROOT_DIRECTORY . "main/domain/main.php";
                return ExecutionDomain($config);
                break;
            case "group":
                require_once ROOT_DIRECTORY . "main/group/main.php";
                return ExecutionGroup($config);
                break;
            case "hashtag":
                require_once ROOT_DIRECTORY . "main/hashtag/main.php";
                return ExecutionHashTag($config);
                break;
            case "tweet":
                require_once ROOT_DIRECTORY . "main/tweet/main.php";
                return ExecutionTweet($config);
                break;
            default:
	            require_once ROOT_DIRECTORY . "main/domain/main.php";
                return ExecutionDomain($config);
                break;
        }
    }

    function ProgramStartExecution_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("/main");
        $Document->Item("ProgramStartExecution");
        $Document->Description("
            全てのリクエストはこのポイントを通過します。
            ---
            データベースの存在が確認できない場合、必ずsetupのプログラムを実行します
            ---
            \$config[\"URLQuery\"][\"mode\"]の値に応じて移動先を切り替えます
            (domain)/setup   ... セットアップ用プログラムを実行します(システム初回起動時以降は無効になります)
            (domain)/account ... アカウント関連のプログラムを実行します
            (domain)/domain  ... ドメイン関連のプログラムを実行します
            (domain)/group   ... グループ関連のプログラムを実行します
            (domain)/hashtag ... ハッシュタグ関連のプログラムを実行します
            
            どれにも該当しない場合はdomainのプログラムを実行します
            ---
            なお、\$config[\"URLQuery\"][\"case\"] の 値がない場合については
            各移動先のプログラムに委任します
        ");
        
        $config["URLQuery"]["mode"] = "setup";
        $Document->TROMS(
            "mode = setup"
            ,ProgramStartExecution($config)
        );
        $config["URLQuery"]["mode"] = "account";
        $Document->TROMS(
            "mode = account"
            ,ProgramStartExecution($config)
        );
        $config["URLQuery"]["mode"] = "domain";
        $Document->TROMS(
            "mode = domain"
            ,ProgramStartExecution($config)
        );
        $config["URLQuery"]["mode"] = "group";
        $Document->TROMS(
            "mode = group"
            ,ProgramStartExecution($config)
        );
        $config["URLQuery"]["mode"] = "hashtag";
        $Document->TROMS(
            "mode = hashtag"
            ,ProgramStartExecution($config)
        );

        $Document->Build("Program");
    }

?>