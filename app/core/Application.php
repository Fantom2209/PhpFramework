<?php 
	namespace app\core;
	
	class Application{
		
		public static function run(){
			$elementURI = explode('/',$_GET['route']);
			$controllerName = !empty($elementURI[0]) ? $elementURI[0] : 'Home';
			$controllerNameFull = '\app\lib\\'. $controllerName;
			$action = !empty($elementURI[1]) ? $elementURI[1] : 'Index';	
			$controller = new $controllerNameFull;
			
			if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
				$action .= 'Post';
				$controller->SetParams(self::PostParam());
				$controller->$action();
			}
			else{
				$controller->SetParams(self::GetParam());
				$controller->$action();			
				$controller->show($controllerName, $action);
			}
		}
		
		private static function GetParam(){
			$elementURI = explode('/', $_GET['route']);
			$c = count($elementURI); 
			$result = array();
			if($c > 2){
				for($i = 2; $i < $c; $i++){
					if(!empty($elementURI[$i])){
						if(strpos($elementURI[$i],':') !== false){
							$x = explode(':',$elementURI[$i]);
							$result[$x[0]] = $x[1];
						}
						else{
							$result[] = $elementURI[$i];
						}
					}
				}
			}
			return $result;
		}
		
		private static function PostParam(){
			return $_POST;
		}
	}