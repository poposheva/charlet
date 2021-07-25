<?php
    require_once ROOT_DIRECTORY . "module/singlescreen.php";
    require_once ROOT_DIRECTORY . "module/webform.php";
    function ExecutionSetup($config){
        if ($config["DBInfomation"]["exists"]) {
            header("Location: ?mode=domain");
            return "";
        }

        $case = $config["URLQuery"]["case"];
        switch($case){
            case "dbconfig":
                require ROOT_DIRECTORY . "main/setup/dbconfig.php";
                return SetupDBConfig($config);
                break;
            case "rtaccount":
                require ROOT_DIRECTORY . "main/setup/rtaccount.php";
                return SetupRootAccount($config);
                break;
            case "finish":
                require ROOT_DIRECTORY . "main/setup/finish.php";
                return SetupFinish($config);
                break;
            case "main":
            default:
                require ROOT_DIRECTORY . "main/setup/start.php";
                return SetupStart($config);
                break;
        }

        return "";
    }

    function ExecutionSetup_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("/main/setup");
        $Document->Item("ExecutionSetup");
        $Document->Description("
            セットアップを行うプログラムをまとめています
            \$config[\"URLQuery\"][\"case\"]の値に応じてプログラムを切り替えます。
            ---
            case = dbconfig  ... データベースの設定を行います
            case = rtaccount ... Charletの管理者アカウントを作成します
            case = finish    ... セットアップが完了したことを通知する画面を表示します
            上記以外の場合はmain画面の表示を行います
            ---
            ※一度セットアップが完了した場合、このプログラムは起動しなくなります
            　(mode=domain に リダイレクトされるようになります)
        ");
        $config["URLQuery"]["case"] = "main";
        $Document->TROMS(
            "case = main"
            ,ExecutionSetup($config)
        );
        $config["URLQuery"]["case"] = "dbconfig";
        $Document->TROMS(
            "case = dbconfig"
            ,ExecutionSetup($config)
        );
        $config["URLQuery"]["case"] = "rtaccount";
        $Document->TROMS(
            "case = rtaccount"
            ,ExecutionSetup($config)
        );
        $config["URLQuery"]["case"] = "finish";
        $Document->TROMS(
            "case = finish"
            ,ExecutionSetup($config)
        );

        $Document->Build("Program");
    }
?>