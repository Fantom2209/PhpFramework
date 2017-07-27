<?php
	namespace app\data;
	use \app\core\Config;
	class User extends \app\core\Model{

	    private $id;
	    private $login;
	    private $role;

	    public function LoginFree($login){
	        return 0 == $this->GetCount($login, 'login');
        }

        public function EmailFree($email){
            return 0 == $this->GetCount($email, 'email');
        }

	    public function HashPassword($pass){
	        return MD5(MD5($pass . Config::APP_SECRET));
        }

        public function GetUser($login, $password){
	        $data = $this->Select(array('id', 'login', 'idRole'))->Where('`login` = ? and `password` = ?', array($login, $this->HashPassword($password)))->Build()->Run()->GetNext();
	        $this->id = !empty($data['id']) ? $data['id'] : '';
            $this->login = !empty($data['login']) ? $data['login'] : '';
            $this->role = !empty($data['idRole']) ? $data['idRole'] : '';
        }

        public function IsUser(){
            return $this->id != false;
        }

        public function Login(){
            $time = time()+ 3600 * 24 * 7;
            setcookie('UserId', $this->id, $time,'/');
            setcookie('UserName', $this->login, $time, '/');
            setcookie('UserRole', $this->role, $time, '/');
        }

        public function Logout(){
            setcookie('UserId', '' );
            setcookie('UserName', '' );
            setcookie('UserRole', '' );
        }

        public static function InRole($role = array()){
            $active = self::ActiveUserInfo('UserRole');
            return in_array($active ? $active : 0, $role);
        }

        public static function IsAuthorized(){
            return $_COOKIE['UserId'] != false;
        }

        public static function ActiveUserInfo($key){
            return $_COOKIE[$key];
        }
	}