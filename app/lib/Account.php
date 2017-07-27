<?php
	namespace app\lib;
	
	use app\core\Config;
    use \app\helpers\Validator;
	use \app\core\ErrorInfo;
	use \app\data\User;
	use \app\helpers\Ajax;
	
	class Account extends \app\core\Page{
        private $validator;
        private $response;

	    public function __construct(){
            $this->validator = new Validator();
            $this->response = new Ajax();
        }

        public function CreatePost(){
			$data = $this->Param('UserData');
			$this->validator->Validate($data);

			if(!$this->validator->IsValid()){
			    $this->response->SetError($this->validator->ErrorReporting());
			}
			else{
                $data = Validator::CleanKey($data);
                $user = new User();

			    if($data['password'] !== $data['confirmPass']){
                    $this->response->SetError(ErrorInfo::GetMetaErrorItem(ErrorInfo::FIELD_CONFIRM_PASSWORD_NOT_CORRECT,array('confirmPass')));
                }
                elseif(!$user->LoginFree($data['login'])){
                    $this->response->SetError(ErrorInfo::GetMetaErrorItem(ErrorInfo::FIELD_LOGIN_NOT_FREE,array('login')));
                }
                elseif(!$user->EmailFree($data['email'])){
                    $this->response->SetError(ErrorInfo::GetMetaErrorItem(ErrorInfo::FIELD_EMAIL_NOT_FREE,array('email')));
                }
                else {
                    $data['idRole'] = Config::CATEGORY_CLIENT;
                    $data['password'] = $user->HashPassword($data['password']);
                    unset($data['confirmPass']);
                    $user->Insert($data)->Run();
                    if($user->IsSuccess()){
                        $this->response->SetRedirect(\app\helpers\Html::ActionPath('Profile','Index'));
                    }
                    else{
                        $this->response->SetRedirect(\app\helpers\Html::ActionPath('Error','Index', $user->ErrorReporting()));
                    }
                }
			}
			$this->response->GetResponse();
		}
		
		public function LoginPost(){
            $data = $this->Param('UserData');
            $this->validator->Validate($data);

            if(!$this->validator->IsValid()){
                $this->response->SetError($this->validator->ErrorReporting());
            }
            else{
                $data = Validator::CleanKey($data);
                $user = new User();
                $user->GetUser($data['login'], $data['password']);
                if($user->IsUser()){
                    $user->Login();
                    $this->response->SetRedirect(\app\helpers\Html::ActionPath('Profile','Index'));
                }
                else{
                    $this->response->SetError(ErrorInfo::GetMetaErrorItem(ErrorInfo::USER_NOT_FOUND,array('login')));
                }
            }
            $this->response->GetResponse();
        }
		
		public function LogoutPost(){
			
		}
		
	}