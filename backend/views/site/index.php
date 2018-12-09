<?php

use yii\bootstrap\Html;
use backend\widgets\TxtWidget;

$this->title = 'My Yii Application';
?>
<div class="clearfix m-b-20"></div>
<div class="row">
    <?=
    TxtWidget::widget([
        'headers' => [
            'Header1' => ['string1'],
        ]
    ])
    ?>
</div>
