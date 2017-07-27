<?php
	namespace app\helpers;

	class Ajax{
		
		private $code;
		private $status;
		private $format;
		private $data;
		private $body;
		
		public function __construct(){
			$this->format = 'GetJSON';
			$this->code = 200;
			$this->status = 'success';
		}
		
		public function SetFormat($format){
			$this->format = 'Get'.$format;
		}

		public function SetError($data){
            $this->data['content'] = $data;
            $this->status = 'error';
            $this->code = 500;
        }

        public function SetSuccess($data = array()){
            $this->data['content'] = $data;
            $this->status = 'success';
            $this->code = 200;
        }

        public function SetRedirect($url = '/home/index/'){
            $this->status = 'redirect';
            $this->code = 301;
            $this->data['url'] = $url;
        }

		public function GetResponse(){
			$this->data['code'] = $this->code;
			$this->data['status'] = $this->status;
			$this->{$this->format}();
			if($this->body){
				echo $this->body;
			}
			else{
				echo '{"code": 500, status:"error"}';
			}
			exit;
		}
		
		public function GetJSON(){
			$result = json_encode($this->data);
			if(json_last_error() == JSON_ERROR_NONE){
				$this->body = $result;
			}
			else{
				$this->body = null;
			}
		}
		
	}