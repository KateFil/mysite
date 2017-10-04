<?php

use app\assets\TestAsset;
use yii\helpers\Html;

TestAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>

<?php $this->beginBody() ?>

    <div class="wrap">
        <div class="container">
<!--            <ul class="nav nav-pills">-->
<!--                <li class="active">-->
<!--                   --><?//=Html::a('Главная','../')?>
<!--                </li>-->
<!--                <li>--><?//=Html::a('Статьи','/test/index')?><!--</li>-->
<!--                <li>--><?//=Html::a('Статья', '/test/test')?><!--</li>-->
<!--            </ul>-->

            <?=$content?>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>