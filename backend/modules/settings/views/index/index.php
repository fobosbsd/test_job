<?php

use yii\bootstrap\Html,
    yii\helpers\Url,
    yii\widgets\Pjax;
use kartik\grid\GridView,
    kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row white-box no-margin no-padding">
    <div class="col-12">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(Yii::t('backend', 'Create Setting'), ['/testjob.test/settings/index/create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>


    <?php Pjax::begin(['enablePushState' => false, 'timeout' => 15000, 'options' => ['class' => 'col-12 no-border']]); ?>
    <div class="row white-box no-margin no-padding">
        <div class="col-12">
            <?=
            GridView::widget([
                'id' => 'kv-grid-demo',
                'dataProvider' => $dataProvider,
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true,
                'panel' => [
                    'type' => GridView::TYPE_INFO,
                    'heading' => '<i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title),
                ],
                'columns' => [
                    [
                        'class' => \kartik\grid\ActionColumn::className(),
                        'noWrap' => false,
                        'template' => '{edit}',
                        'buttons' => [
                            'edit' => function ($url, $model) {
                                return "<a href='" . Url::to(['/testjob.test/settings/index/update', 'id' => $model->id]) . "' title='Edit' class='glyphicon glyphicon-edit btn-lg'></a>";
                            },
                        ],
                    ],
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['class' => 'sorting'],
                        'hAlign' => 'left',
                        'vAlign' => 'middle',
                        'width' => '40px'
                    ],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'p_name',
                        'value' => function ($model) {
                            if (isset($model->p_name)) {
                                return $model->p_name;
                            }
                            return 'n/a';
                        },
                        'filter' => FALSE,
                        'editableOptions' => function($model, $key, $index) {
                            return [
                                'formOptions' => [
                                    'action' => Url::toRoute(['/testjob.test/settings/index/ajax-pname']),
                                ],
                                'beforeInput' => function ($form, $widget) use ($model, $index) {
                                    echo $form->field($model, "id")->hiddenInput()->label(false);
                                },
                                'header' => Yii::t('backend', 'Name'),
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'footer' => '
                            <button class="btn btn-sm btn-success spellCheckBtn" >Fix spelling</button>
                            <button type="button" class="btn btn-sm btn-default kv-editable-reset" title="Reset"><i class="glyphicon glyphicon-ban-circle"></i></button>
                            <button type="button" class="btn btn-sm btn-primary kv-editable-submit" title="Apply"><i class="glyphicon glyphicon-check"></i></button>
                            {loading}
                        ',
                            ];
                        },
                        'hAlign' => 'center',
                        'vAlign' => 'middle',
                        'width' => '40%',
                    ],
                    [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' => 'p_value',
                        'value' => function ($model) {
                            if (isset($model->p_value)) {
                                return $model->p_value;
                            }
                            return 'n/a';
                        },
                        'filter' => FALSE,
                        'editableOptions' => function($model, $key, $index) {
                            return [
                                'formOptions' => [
                                    'action' => Url::to(['/testjob.test/settings/index/ajax-pvalue'], true),
                                ],
                                'beforeInput' => function ($form, $widget) use ($model, $index) {
                                    echo $form->field($model, "id")->hiddenInput()->label(false);
                                },
                                'header' => Yii::t('backend', 'Name'),
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'footer' => '
                            <button class="btn btn-sm btn-success spellCheckBtn" >Fix spelling</button>
                            <button type="button" class="btn btn-sm btn-default kv-editable-reset" title="Reset"><i class="glyphicon glyphicon-ban-circle"></i></button>
                            <button type="button" class="btn btn-sm btn-primary kv-editable-submit" title="Apply"><i class="glyphicon glyphicon-check"></i></button>
                            {loading}
                        ',
                            ];
                        },
                        'hAlign' => 'center',
                        'vAlign' => 'middle',
                        'width' => '40%',
                    ],
                    [
                        'class' => \kartik\grid\ActionColumn::className(),
                        'noWrap' => false,
                        'template' => '{edit}{delete}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return "<a href='" . Url::toRoute(['/testjob.test/settings/index/delete', 'id' => $model->id]) . "' title='Paper and Site OFF' class='glyphicon glyphicon-remove btn-lg' data-confirm='Are you sure to delete this item?' data-method='post' data-pjax='1'></a>";
                            },
                            'edit' => function ($url, $model) {
                                //data-confirm='Are you sure to edit this item?'
                                return "<a href='" . Url::toRoute(['/testjob.test/settings/index/update', 'id' => $model->id]) . "' title='Edit' class='glyphicon glyphicon-edit btn-lg'></a>";
                            },
                        ],
                    ]
                ]
            ])
            ?>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>
