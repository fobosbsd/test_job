<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Settings */

$this->title = Yii::t('backend', 'Create Setting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-red">
            <div class="panel-heading"> <?= Html::encode($this->title) ?></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">

                <?=
                $this->render('_form', [
                    'model' => $model
                ])
                ?>
            </div>
        </div>
    </div>
</div>
