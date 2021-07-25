<?php
    class WebForm{
        private $index;
        private $formhead;
        private $formdata;

        public function __construct($method,$action){
            $this->index = -1;
            $this->formdata = array();
            $this->formhead = array();
            $this->formhead["method"] = $method;
            $this->formhead["action"] = $action;
        }

        public function HeaderText($text){
            $this->formhead["headertext"] = $text;
        }

        public function Part($label,$name,$type){
            $this->index += 1;
            $this->formdata[$this->index]["label"] = $label;
            $this->formdata[$this->index]["name"] = $name;
            $this->formdata[$this->index]["type"] = $type;

            return $this;
        }

        public function AddValue($value){
            $this->formdata[$this->index]["Value"] = $value;

            return $this;
        }

        public function AddRequired(){
            $this->formdata[$this->index]["required"] = true;

            return $this;
        }

        public function AddAutoFocus(){
            $this->formdata[$this->index]["autofocus"] = true;

            return $this;
        }
        
        public function AddPlaceHolder($message){
            $this->formdata[$this->index]["placeholder"] = $message;

            return $this;
        }

        public function AddErrorMessage($message){
            $this->formdata[$this->index]["errormessage"] = $message;

            return $this;
        }

        public function SubmitButton($text){
            $this->formhead["submit"] = $text;
        }

        public function AuxiliaryLink($text,$link){
            $this->formhead["auxiliary_link"] .= "<a href=\"".$link."\">".$text."</a>";
        }

        public function ErrorMessage($text){
            $this->formhead["errormessage"] = $text;
        }

        public function ExecuteCheck($DATA){
            $CheckResult = true;

            foreach($this->formdata as $index=>$value){
                $key = $value["name"];
                if($value["required"]==true && $DATA[$key]==""){
                    $this->formdata[$index]["error"] = true;
                    $CheckResult = false;
                }
            }

            return $CheckResult;
        }

        public function CreateForm(){
            $screen = new SingleScreen();

            $screen->Assign("formhead",$this->formhead);
            $screen->Assign("formdata",$this->formdata);

            return $screen->Fetch("webform.tpl");
        }
    }

    function WebForm_TROMS($config){
        $Document = new AsItIs_Doc($config);
        $Document->Chapter("/module");
        $Document->Item("WebForm");
        $Document->Description("
            フォーム入力画面を表示させるためのクラスです
            入力値チェックもできます
        ");

        /*
        $test = new WebForm();
        
        $Document->TROMS(
            "\$SingleScreen_Object->Assign(\"hoge\",\"piyo\")"
            ,$test->Assign("hoge","piyo")
        );
        */

        $Document->Build("Module");
    }
?>