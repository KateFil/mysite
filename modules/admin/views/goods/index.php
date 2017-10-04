<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin';
?>
<?php
    $this->registerJsFile('@web/js/scriptAdmin.js', ['depends'=>'yii\web\YiiAsset']);
?>

<h1><?= $this->title ?></h1>

<?php
    if(isset($list['error'])){
?>
<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    <?php echo $list['error'] ?>
</div>
<?php
    }
    else {
        ?>

        <?= Html::a('Выйти', Url::to(['/admin/goods/logout']), ['class'=>'btn btn-primary', 'id'=>'logout'])?>
        <?= Html::a('Создать новый товар', Url::to(['/admin/goods/create']), ['class'=>'btn btn-success', 'id'=>'create'])?>
        <ul class="adminCategories">
            <?php
            foreach ($list as $value) {
                ?>
                <li id="<?= $value['id'] ?>">
                    <?= Html::a($value['name'], Url::to(['#']), ['class'=>'category'])?>                             <table class="adminGoods table table-bordered">
                        <tr>
                            <th>Название</th>
                            <th>Модель</th>
                            <th>Описание</th>
                            <th>Цена</th>
                            <th></th>
                        </tr>
                        <?php
                        if (count($value['goods']) > 0) {
                            foreach ($value['goods'] as $key => $val) {
                                ?>
                                <tr data-good-id="<?= $val['id'] ?>">
                                    <td><?= $val['name'] ?></td>
                                    <td><?= $val['model'] ?></td>
                                    <td><?= $val['description'] ?></td>
                                    <td><?= $val['price'] ?></td>
                                    <td>
                                        <a href="/admin/goods/view?id=<?= $val['id'] ?>" class="management">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a href="/admin/goods/update?id=<?= $val['id'] ?>" class="management">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>
                                        <a href="/admin/goods/delete?id=<?= $val['id'] ?>" class="management" id="delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>

                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </li>
                <?php
            }
            ?>
        </ul>

        <?php
    }
    ?>
