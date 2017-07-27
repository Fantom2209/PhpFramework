<?php 
	namespace app\core;
	
	class Application{

	    private static $controller;
	    private static $action;

		public static function run(){
			self::Init();

		    $controllerFull = '\app\lib\\'. self::$controller;
			$controller = new $controllerFull;
			
			if(strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
				self::$action .= 'Post';
				$controller->SetParams(self::PostParam());
				$controller->{self::$action}();
			}
			else{
				$controller->SetParams(self::GetParam());
				$controller->{self::$action}();
				$controller->show(self::$controller, self::$action);
			}
		}

		private static function Init(){
            $elementURI = explode('/',$_GET['route']);
            self::$controller = !empty($elementURI[0]) ? $elementURI[0] : 'Home';
            self::$action = !empty($elementURI[1]) ? $elementURI[1] : 'Index';
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