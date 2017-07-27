<?php
	namespace app\lib;
	use \app\core\ErrorInfo;


	class Error extends \app\core\Page{
					
		public function Index(){
			$this->view->Set('layout', __DIR__ . '\\..\\view\\Shared\\errorLayout.php');
			$this->Set('title','Произошла ошибка');
			$this->Set('code','Ошибка с кодом: ' . $this->Param(0));
			$this->Set('msg','Сообщение: ' . ErrorInfo::GetMessage($this->Param(0)));
		}

	}