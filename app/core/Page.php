<?php
	namespace app\core;
    use app\data\User;

	class Page{
		
		protected $view;
		protected $data;
		protected $params;

		protected $userGroups;

		public function __construct(){
			$this->view = new View();
			$this->userGroups = array(0,1,2);
		}

		public function DeleteUserGroup($data = array()){
		    $new = array();
		    foreach($this->userGroups as $item){
                if(in_array($item, $data)){
                    continue;
                }
                $new[] = $item;
            }
            $this->userGroups = $new;
        }

        public function SetUserGroup($data = array()){
		    $this->userGroups = $data;
        }

        public function HasAccess(){
            User::InRole($this->userGroups);
        }

		public function Get($name){
			return $this->data[$name];
		}
		
		public function Set($name, $value){
			return $this->data[$name] = $value;
		}
		
		public function SetParams($params){
			$this->params = $params;
		}
		
		public function Param($index){
			return $this->params[$index];
		}
		
		public function GenerateError($code = array()){
			$this->Redirect('Error', 'Index', $code);
		}
		
		public function NotFound(){
			$this->Redirect('Error', 'Index', array(404));
		}
		
		public function Redirect($controller = 'Home', $action = 'Index', $param = array()){
			$url = '/' . $controller . '/' . $action . '/';
            foreach($param as $val){
                if(!empty($val)){
                    $url .= $val . '/';
                }
            }
			$this->RedirectUrl($url);
		}
		
		public function RedirectUrl($url = '/Home/Index/'){
			header('Location: ' . $url);
			exit(); 
		}
		
		public function Show($controller, $action){

			if(!$this->view->HasLayout()){
				$this->view->Set('layout', Config::PATH_LAYOUT . 'mainLayout.php');
			}		
			
			if(!$this->view->HasTeamplate()){
				$this->view->Set('template', Config::PATH_VIEW . $controller . Config::PATH_SEPARATOR . $action .'.php');
				
			}
			
			require_once($this->view->Get('layout'));
		}
		
	}