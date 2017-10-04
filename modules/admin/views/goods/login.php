<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $admin
 * @var $login
 */
?>

<?php
if(isset($login['error'])){
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $login['error'] ?>
    </div>
    <?php
}

?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($admin, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($admin, 'password')->textInput(['maxlength' => true]) ?>

    <?= Html::submitButton('Войти',['class'=>'btn btn-success']);?>

    <?php ActiveForm::end(); ?>







