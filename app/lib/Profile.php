<?php
    namespace app\lib;
    use \app\data\User;
    use \app\data\Site;
    class Profile extends \app\core\Page{

        public function Index(){
            //var_dump(User::IsAuthorized());

            $site = new Site();


            $this->Set('sites', $site->Select()->Build()->Run()->GetAll());
            $this->Set('content','Главная профиля');
            $this->Set('UserId',User::ActiveUserInfo('UserId'));
        }

    }