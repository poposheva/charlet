<?php
    class SingleScreen{
        public $smarty;

        public function __construct(){
            global $SMARTY_OBJECT;
            $this->smarty = new UseSmarty();
        }

        public function Assign($key,$value){
            $this->smarty->Assign($key,$value);
            return true;
        }

        public function Fetch($tpl_file){
            return $this->smarty->Fetch($tpl_file);
        }
    }

    function SingleScreen_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("/module");
        $Document->Item("SingleScreen");
        $Document->Description("
            単一画面を表示させるクラスです
            ---
            Assignで変数セット、Fetchで結果取得
            Smartyと使い方はほとんど同じです
            ---
            ※存在しないtplファイルを指定した場合、自動でunknow.tplが表示される仕組みとなっています
              (クラス内で使用しているUseSmartyクラスの仕様です)
        ");

        $test = new SingleScreen();
        
        $Document->TROMS(
            "\$SingleScreen_Object->Assign(\"hoge\",\"piyo\")"
            ,$test->Assign("hoge","piyo")
        );

        $Document->TROMS(
            "\$SingleScreen_Object->Fetch(\"test.tpl\")"
            ,$test->Fetch("test.tpl")
        );

        $Document->TROMS(
            "\$SingleScreen_Object->Fetch(\"sonzaisimasen.tpl\")"
            ,$test->Fetch("test.tpl")
        );

        $Document->Build("Module");
    }
?>
