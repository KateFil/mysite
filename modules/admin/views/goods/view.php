<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'View';
?>

<h1><?= $this->title?></h1>

<?php
    if(isset($good['error'])){
?>
        <div class="alert alert-danger alert-dismissible"><?= $good['error']?></div>
<?php
    }
    else{
?>
        <?= Html::a('Вернуть на главную', Url::to(['/admin/goods/index']), ['class'=>'btn btn-default'])?>
        <?= Html::a('Обновить', Url::to(['/admin/goods/update?id='.$good['id']]), ['class'=>'btn btn-primary', 'id'=>'update'])?>
        <?= Html::a('Удалить', Url::to(['/admin/goods/delete?id='.$good['id']]), ['class'=>'btn btn-danger', 'id'=>'delete'])?>

        <table class="adminGood table table-bordered">
            <tr>
                <th>Название</th>
                <td><?= $good['name'] ?></td>
            </tr>
            <tr>
                <th>Модель</th>
                <td><?= $good['model'] ?></td>
            </tr>
            <tr>
                <th>Описание</th>
                <td><?= $good['description'] ?></td>
            </tr>
            <tr>
                <th>Цена</th>
                <td><?= $good['price'] ?></td>
            </tr>
            <tr>
                <th>Категория</th>
                <td><?= $good['cat']['name'] ?></td>
            </tr>
        </table>

<?php
    }
?>





