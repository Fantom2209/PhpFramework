<h1><?php echo $this->Get('content');?></h1>

<p>Добавить</p>
<form action="<?php echo \app\helpers\Html::ActionPath('Site', 'Add')?>" method="POST" class="ajax-form">
    <input type="hidden" name="UserData[idUser]" value="<?php echo $this->Get('UserId');?>">
    <div>
        <input type="text" name="UserData[DefaultText:name]">
        <div class="error-box"></div>
    </div>
    <div>
        <input type="text" name="UserData[Link:url]">
        <div class="error-box"></div>
    </div>
    <button class="btn btn-primary">Добавить</button>
</form>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Сайт</th>
                <th colspan="3">Операции</th>
            </tr>
            <?php foreach($this->Get('sites') as $item):?>
                  <tr>
                      <td><?php echo $item['id']?></td>
                      <td><?php echo $item['name']?></td>
                      <td><?php echo $item['url']?></td>
                      <td><a href="<?php echo \app\helpers\Html::ActionPath('Site', 'Update', array($item['id']))?>">Обновить</a></td>
                      <td><a href="#">Удалить</a></td>
                      <td><a href="#">Пауза</a></td>
                  </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
