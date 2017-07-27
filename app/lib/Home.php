<?php
	namespace app\lib;
	
	class Home extends \app\core\Page{
					
		public function Index(){
			
			$test = new \app\data\Test();
			/*var_dump($test->Insert(
				array(
					'name' => 'Макс',
					'email' => 'maks@gmail.com',
					'site' => 'http://maks.com'
				)
			)->Run());*/
			
			/*var_dump($test->Update(
				array(
					'email' => 'maksimus@gmail.com',
					'site' => 'http://maksimus.com'
				), 'id = ?', array(3)				
			)->Run());*/
			
			//var_dump($test->Delete()->Where('`id` = ?', array(3))->Build()->Run());
			
			/*var_dump($test->Select()->Build()->Run()->GetNext());
			echo '<hr>';
			var_dump($test->GetNext());
			echo '<hr>';
			var_dump($test->Run()->GetAll());
			echo '<hr>';
			var_dump($test->Run()->GetLast());
			echo '<hr>';*/

			$this->Set('title','Главная страница');
			$this->Set('content','Информация с главной страницы');
		}
		
		public function Users(){
			$this->Set('title','Пользователи');
			$this->Set('content','Список пользователей');
		}
		
		public function Test(){
			echo $this->Param(0) . '  -  ' . $this->Param(1);
			$this->Set('title','Тестовая страница');
			$this->Set('content','Страница для тестирования');
		}
		
		public function TestPost(){
			if($this->Param('name') == '404'){
				$this->NotFound();
			}
			
			if($this->Param('name') == '1'){
				$this->GenerateError(1);
			}
			
			echo 'Я по посту ' . $this->Param('name');
		}
		
		public function Test2Post(){		
			echo 'Я по посту 2  ' . $this->Param('name');
		}
	}