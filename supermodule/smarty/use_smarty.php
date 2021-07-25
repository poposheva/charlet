<?php
	
	require_once './supermodule/smarty/libs/Smarty.class.php';
	
	class UseSmarty{
		private $smarty;
		
		function __construct(){
			$this->smarty = new Smarty();
			
			$this->smarty->template_dir = "./templates/templates/";
			$this->smarty->compile_dir = "./templates/templates_c/";
		}
		
		function Assign($name,$data){
			$this->smarty->assign($name,$data);
		}
		
		function Display($tpl){
			if(file_exists($this->smarty->template_dir[0] . $tpl)){
				$this->smarty->display($tpl);
			}else{
				$this->smarty->display("unknow.tpl");
			}
		}
		
		function Fetch($tpl){
			if(file_exists($this->smarty->template_dir[0] . $tpl)){
				return $this->smarty->fetch($tpl);
			}else{
				$this->smarty->assign("file_name",$tpl);
				return $this->smarty->fetch("unknow.tpl");
			}
		}
	}
	
?>
