<?php
    namespace app\lib;

    use app\core\Config;
    use \app\helpers\Validator;
    use \app\core\ErrorInfo;
    use \app\helpers\Ajax;


    class Site extends \app\core\Page{

        private $validator;
        private $response;

        public function __construct(){
            parent::__construct();
            $this->validator = new Validator();
            $this->response = new Ajax();
        }

        public function AddPost(){
            $data = $this->Param('UserData');
            $this->validator->Validate($data);

            if(!$this->validator->IsValid()){
                $this->response->SetError($this->validator->ErrorReporting());
            }
            else {
                $data = Validator::CleanKey($data);

                $site = new \app\data\Site();

                $site->Insert($data)->Run();

                if($site->IsSuccess()){
                    $this->response->SetSuccess();
                }
                else{
                    $this->response->SetRedirect(\app\helpers\Html::ActionPath('Error','Index', $site->ErrorReporting()));
                }
            }
            $this->response->GetResponse();
        }

        public function Update(){

            $this->Set('content', $this->Param(0) . ' тест обновления');
        }

        public function UpdatePost(){

        }

        public function DeletePost(){

        }

        public function PausePost(){

        }

    }