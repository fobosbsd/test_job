<?php

use yii\bootstrap\Html,
    yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Settings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'p_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'p_value')->textarea(['rows' => 4]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-check"></i> ' . Yii::t('backend', 'Save'), ['class' => 'btn btn-dark']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
