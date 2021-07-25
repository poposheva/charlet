<?php
    /*
    Charlet Version 1
    -----------------
    */

    session_start();
    
    require_once "./config/bootstrap.php";
    require ROOT_DIRECTORY . "main/root.php";

    $config = ProgramPreprocessing();

    //プログラムの実行を開始します
    $screen = ProgramStartExecution($config);
    
    //空文字 = 表示処理なし(リダイレクトなどの用途向け)を意味します
    if($screen != ""){
        ProgramResultDisplay($screen,$config);
    }
?>
