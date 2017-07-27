<h1><?php echo $this->Get('content');?></h1>

<p>Регистрация</p>
<form action="<?php echo \app\helpers\Html::ActionPath('Account', 'Create')?>" method="POST" class="ajax-form">
    <div>
        <input type="text" name="UserData[Login:login]">
        <div class="error-box"></div>
    </div>
    <div>
        <input type="text" name="UserData[Email:email]">
        <div class="error-box"></div>
    </div>
    <div>
        <input type="password" name="UserData[Password:password]">
        <div class="error-box"></div>
    </div>
    <div>
        <input type="password" name="UserData[confirmPass]">
        <div class="error-box"></div>
    </div>
	<button>Регистрация</button>
</form>

<hr>

<p>Авторизация</p>
<form>
	<input type="text">
</form>