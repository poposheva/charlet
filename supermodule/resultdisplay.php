<?php
    /*
        画面表示プログラムを実行します
        $key = ContentHeader で　ヘッダーエリアを
        $key = ContentMain0 - ContentMain6 で　メインコンテンツを
        $key = Header で　ヘッダー関連情報を
    */
    function ProgramResultDisplay($screen,$config){
        $smarty = new UseSmarty();

        foreach($screen as $key=>$value){
            $smarty->Assign($key,$value);
        }
        
        if($screen["DialogScreenOutput"]){
            $smarty->Display($config["SmartyDialogTemplateFile"]);
        }else{
            $smarty->Display($config["SmartyTemplateFile"]);
        }
    }
?>