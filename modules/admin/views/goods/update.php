<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */

$this->title = 'Update';

?>

<h1><?=$this->title?></h1>


<?= Html::a('Вернуть на главную', Url::to(['/admin/goods/index']), ['class'=>'btn btn-default'])?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'price')->textInput() ?>

<?= $form->field($model, 'cat_id')->textInput() ?>

<?= Html::submitButton('Обновить',['class'=>'btn btn-success']);?>

<?php ActiveForm::end(); ?>

